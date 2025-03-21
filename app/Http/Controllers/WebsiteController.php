<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
}
