<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\Master;
use App\Models\PolicyPage;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
class WebsiteController extends Controller
{
    public function homepage(){
        $websitedata = WebsiteSetting::first();
        // dd($websitedata);
        return view('WebsitePages.homepage',compact('websitedata'));
    }
    public function aboutpage(){
        return view('WebsitePages.aboutpage');
    }
    public function contactpage(){
        return view('WebsitePages.contactus');
    }
    public function blogdetails($id){
        $blogdata = Blog::find($id);
        $blogname = $blogdata->blogname;
        return view('WebsitePages.blogdetails',compact('blogdata','blogname'));
    }
    public function policies(Request $request){
        $pagname = $request->query('p');
        $privacydata = PolicyPage::where('pagename', $pagname)->first();
        return view('WebsitePages.policies',compact('privacydata','pagname'));
    }
    public function productdetails($id){
        $productdata = AllProduct::find($id);
        $relatedproducts = AllProduct::where('category',$productdata->category)->where('id','!=',$id)->get();
        return view('WebsitePages.productDetails',compact('productdata','relatedproducts'));
    }
    public function shop(){
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
    public function shopcategoryfilter(Request $request){
        $category = $request->input('category');
        $products = AllProduct::orderBy('created_at', 'desc')
            ->where('category', $category)
            ->where('productstatus', '=', 'published')
            ->paginate(6);
        return response()->json( $products);
    }
}
