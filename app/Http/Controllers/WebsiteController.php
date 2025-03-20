<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function homepage(){
        return view('WebsitePages.homepage');
    }
    public function aboutpage(){
        return view('WebsitePages.aboutpage');
    }
}
