<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
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
}
