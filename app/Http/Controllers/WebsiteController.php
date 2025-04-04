<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\Master;
use App\Models\MyCart;
use App\Models\PolicyPage;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Exception;
use Auth;
class WebsiteController extends Controller
{
    public function homepage()
    {
        $websitedata = WebsiteSetting::first();
        // dd($websitedata);
        return view('WebsitePages.homepage', compact('websitedata'));
    }
    public function aboutpage()
    {
        return view('WebsitePages.aboutpage');
    }
    public function contactpage()
    {
        return view('WebsitePages.contactus');
    }
    public function blogdetails($id)
    {
        $blogdata = Blog::find($id);
        $blogname = $blogdata->blogname;
        return view('WebsitePages.blogdetails', compact('blogdata', 'blogname'));
    }
    public function policies(Request $request)
    {
        $pagname = $request->query('p');
        $privacydata = PolicyPage::where('pagename', $pagname)->first();
        return view('WebsitePages.policies', compact('privacydata', 'pagname'));
    }
    public function productdetails($id)
    {
        $productdata = AllProduct::find($id);
        $relatedproducts = AllProduct::where('category', $productdata->category)->where('id', '!=', $id)->get();
        $productreviews = Review::where('productid', $id)->get();
        $productreviewscnt = Review::where('productid', $id)->count();
        return view('WebsitePages.productDetails', compact('productdata', 'relatedproducts', 'productreviews', 'productreviewscnt'));
    }
    public function shop()
    {
        $featuredproducts = AllProduct::orderBy('created_at', 'desc')
            ->where('productstatus', '=', 'published')
            ->paginate(6)
            ->through(function ($product) { // Use `through()` instead of `map()`
                $product->category_count = AllProduct::where('category', $product->category)
                    ->where('productstatus', '=', 'published')
                    ->count();
                return $product;
            });

        return view('WebsitePages.shop', compact('featuredproducts'));
    }
    public function shopcategoryfilter(Request $request)
    {
        $category = $request->input('category');
        $products = AllProduct::orderBy('created_at', 'desc')
            ->where('category', $category)
            ->where('productstatus', '=', 'published')
            ->paginate(6);
        return response()->json($products);
    }
    public function sortByPriceFilter(Request $request)
    {
        $filtername = $request->input('filtername');
        if ($filtername === 'lowtohigh') {
            $products = AllProduct::orderByRaw('CAST(regularprice AS UNSIGNED) ASC')    //This will cast the regularprice as unsigned integer and then sort it
                ->where('productstatus', '=', 'published')
                ->paginate(6);
        } elseif ($filtername === 'hightolow') {
            $products = AllProduct::orderByRaw('CAST(regularprice AS UNSIGNED) DESC')
                ->where('productstatus', '=', 'published')
                ->paginate(6);
        }
        return response()->json($products);
    }
    public function blogs()
    {
        $blogcategories = Master::where('type', 'Blog Categories')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        return view('WebsitePages.blogs', compact('blogs', 'blogcategories'));
    }
    public function giveProductReview(Request $request)
    {
        try {
            $data = Review::create([
                'ratings' => $request->input('rating'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'reviewtxt' => $request->input('reviewtxt'),
                'productid' => $request->input('productid'),
                'userid' => $request->input('userid'),
            ]);
            // dd($data);
            return back()->with('success', "Your Review has been added.!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function addtoCart(Request $request)
    {
        $loggedinUser = Auth::guard('customer')->user();
        try {
            $data = MyCart::create([
                'userid' => $loggedinUser->id ?? '',
                'productid' => $request->input('productid'),
                'productname' => $request->input('productname'),
                'productimage' => $request->input('productimage'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
            ]);
            return response()->json([
                'success' => true,
                'message' => "Product added to cart successfully!",
                'cart' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to add product to cart.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function mycart()
    {
        $mycartproducts = MyCart::where('userid', Auth::guard('customer')->user()->id)->get();
        return view('WebsitePages.cart',compact('mycartproducts'));
    }
}




