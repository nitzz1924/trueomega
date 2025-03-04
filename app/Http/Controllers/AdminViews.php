<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\Master;
use App\Models\Nortification;
use App\Models\Project;
use App\Models\PropertyListing;
use App\Models\RegisterCompany;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Auth;
use Notification;
class AdminViews extends Controller
{
    public function admindashboard()
    {
        
        return view('AdminPanelPages.dashboard');
    }
    public function master()
    {
        $data = Master::where('type', 'Master')->get();
        $allcategories = Master::orderBy('created_at', 'desc')->get();

        return view('AdminPanelPages.master', compact('data', 'allcategories'));
    }
    public function companyprofile()
    {
        $companydata = RegisterCompany::first();
        return view('AdminPanelPages.companyprofile', compact('companydata'));
    }
    public function myprofile()
    {
        $userdata = auth()->user();
        // dd($userdata);
        return view('AdminPanelPages.myprofile', compact('userdata'));
    }
    public function allusers(){
        $allusers = RegisterUser::orderBy('created_at', 'desc')->get();
        $userscnt = RegisterUser::count();
        return view('AdminPanelPages.allusers', compact('allusers','userscnt'));
    }
    public function media(){
        return view('AdminPanelPages.media');
    }
    public function addProduct(){
        $categories = Master::where('type', 'Product Categories')->get();
        return view('AdminPanelPages.addProduct',compact('categories'));
    }
    public function allproducts(){
        $data = AllProduct::orderBy('created_at','DESC')->get();
        $productcnt = AllProduct::count();
        return view('AdminPanelPages.allproducts',compact('data','productcnt'));
    }
    public function editproduct($id){
        $categories = Master::where('type', 'Product Categories')->get();
        $data = AllProduct::find($id);
        $productname = $data->productname;
        return view('AdminPanelPages.editproduct',compact('data','categories','productname'));
    }
}
