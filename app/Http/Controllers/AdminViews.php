<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\Master;
use App\Models\Nortification;
use App\Models\Order;
use App\Models\Project;
use App\Models\PropertyListing;
use App\Models\RegisterCompany;
use App\Models\RegisterUser;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Auth, Carbon\Carbon;
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
    public function allusers()
    {
        $allusers = RegisterUser::orderBy('created_at', 'desc')->get();
        $userscnt = RegisterUser::count();
        return view('AdminPanelPages.allusers', compact('allusers', 'userscnt'));
    }
    public function media()
    {
        return view('AdminPanelPages.media');
    }
    public function addProduct()
    {
        $categories = Master::where('type', 'Product Categories')->get();
        return view('AdminPanelPages.addProduct', compact('categories'));
    }
    public function allproducts()
    {
        $data = AllProduct::orderBy('created_at', 'DESC')->get();
        $productcnt = AllProduct::count();
        $categories = Master::where('type', 'Product Categories')->get();
        return view('AdminPanelPages.allproducts', compact('data', 'productcnt', 'categories'));
    }
    public function editproduct($id)
    {
        $categories = Master::where('type', 'Product Categories')->get();
        $data = AllProduct::find($id);
        $productname = $data->productname;
        return view('AdminPanelPages.editproduct', compact('data', 'categories', 'productname'));
    }
    public function blogslist()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        $blogcount = Blog::count();
        return view('AdminPanelPages.bloglists', compact('blogs', 'blogcount'));
    }

    public function addblog()
    {
        $categories = Master::where('type', 'Blog Categories')->get();
        return view('AdminPanelPages.addblog', compact('categories'));
    }

    public function editblog($id)
    {
        // dd($id);
        $blogs = Blog::find($id);
        $categories = Master::where('type', 'Blog Categories')->get();
        return view('AdminPanelPages.editblog', compact('blogs', 'categories'));
    }

    public function websitesettings()
    {

        return view('AdminPanelPages.websiteSettings');
    }

    public function editWebsiteSettings(Request $request)
    {
        $id = $request->query('id');
        $websitedata = WebsiteSetting::find($id);
        return view('AdminPanelPages.editWebsiteSettings', compact('websitedata'));
    }

    public function policypages()
    {

        return view('AdminPanelPages.policypages');
    }

    public function orders(Request $request)
    {
        $orderdata = Order::query();

        $ordercnt = Order::count();
        $MasterOrderStatus = Master::where('type', 'Order Status')->get();

        $filter = $request->input('filterby');
        $filteredOrderCount = $ordercnt;

        if ($filter === 'todayorder') {
            $orderdata->whereDate('created_at', Carbon::today());
            $filteredOrderCount = $orderdata->count();
        } elseif ($filter === 'cancelledorders') {
            $orderdata->where('orderstatus', '=', 'Cancelled');
            $filteredOrderCount = $orderdata->count();
        } elseif ($filter === 'completedorders') {
            $orderdata->where('orderstatus', '=', 'Completed');
            $filteredOrderCount = $orderdata->count();
        }

        $orderdata = $orderdata->orderBy('created_at', 'DESC')->get();

        return view('AdminPanelPages.orders', compact('orderdata', 'ordercnt', 'MasterOrderStatus', 'filteredOrderCount'));
    }
    public function editorder($id)
    {
        $order = Order::find($id);
        $gstpercent = RegisterCompany::first()->gstpercentage;
        $MasterOrderStatus = Master::where('type', 'Order Status')->get();
        return view('AdminPanelPages.editorder', compact('order', 'gstpercent', 'MasterOrderStatus'));
    }

    public function orderinvoice($id){
        $order = Order::find($id);
        $gstpercent = RegisterCompany::first()->gstpercentage;
        return view('AdminPanelPages.orderinvoice', compact('order', 'gstpercent'));
    }
}
