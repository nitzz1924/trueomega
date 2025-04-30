<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\Commission;
use App\Models\Country;
use App\Models\Master;
use App\Models\MyCart;
use App\Models\Order;
use App\Models\PolicyPage;
use App\Models\RegisterUser;
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
                'status' => 'addedtocart',
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
        $mycartproducts = MyCart::where('userid', Auth::guard('customer')->user()->id)
        ->where('status', 'addedtocart')->get();
        return view('WebsitePages.cart', compact('mycartproducts'));
    }
    public function removeFromCart()
    {
        $cartid = request()->input('cartid');
        try {
            MyCart::where('id', $cartid)->delete();
            return response()->json([
                'success' => true,
                'message' => "Product removed from cart successfully!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to remove product from cart.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function updateQuantity()
    {
        $cartid = request()->input('cartid');
        $quantity = request()->input('quantity');
        try {
            MyCart::where('id', $cartid)->update([
                'quantity' => $quantity,
            ]);
            return response()->json([
                'success' => true,
                'message' => "Updated"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to update",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function checkout()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $mycartproducts = MyCart::where('userid', $loggedinuser->id)->get();
        $countries = Country::pluck('nicename');
        return view('WebsitePages.checkout', compact('countries','mycartproducts'));
    }
    public function completeCheckout(Request $request)
    {
        // dd($request->all());
        $loggedinuser = Auth::guard('customer')->user();
        $billingData = [];
        $shippingData = [];

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'b-')) {
                $billingData[$key] = $value;
            } elseif (str_starts_with($key, 's-')) {
                $shippingData[$key] = $value;
            }
        }
        try {
            $data = Order::create([
                'userid' => $loggedinuser->id ?? '',
                'billing_address' => json_encode($billingData) ?? '',
                'shipping_address' => json_encode($shippingData) ?? '',
                'grandtotal' => $request->input('grandtotal'),
                'products' => $request->input('products'),
                'orderstatus' => 'processing',
            ]);
            $cartItems = MyCart::where('userid', $loggedinuser->id)->update([
                'status' => 'purchased'
            ]);
            $Commission_status = RegisterUser::where('id', $loggedinuser->id)->update([
                'commission_status' => 'eligible'
            ]);
            
            $commissionLevels = [
                1 => 0.2, // 20% for level 1
                2 => 0.12, // 12% for level 2
                3 => 0.08, // 8% for level 3
                4 => 0.05, // 5% for level 4
            ];

            $currentUser = $loggedinuser;
            foreach ($commissionLevels as $level => $percentage) {
                $parentUser = RegisterUser::where('id', $currentUser->sponserid)->first();
                Commission::create([
                    'user_id' => $loggedinuser->id,
                    'parent_id' => $parentUser->id,
                    'comm_amount' => $request->input('grandtotal') * $percentage,
                    'order_amount' => $request->input('grandtotal'),
                    'comm_month' => now()->format('F'),
                    'comm_percentage' => $percentage * 100,
                ]);
                $currentUser = $parentUser; // Move to the next parent in the hierarchy
            }
            // dd($data);
            return response()->json([
                'success' => true,
                'message' => "Order placed successfully!",
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
    public function confirmorder()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $mycartproducts = MyCart::where('userid', $loggedinuser->id)->get();
        return view('WebsitePages.orderconfirmation', compact('mycartproducts'));
    }
}




