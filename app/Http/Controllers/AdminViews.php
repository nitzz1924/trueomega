<?php

namespace App\Http\Controllers;

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
        $propertyCount = PropertyListing::count();
        $leadCount = Lead::count();
        $userCount = RegisterUser::where('user_type', 'user')->count();
        $agentCount = RegisterUser::where('user_type', 'agent')->count();
        $blogCount = Blog::count();
        $mylistingCount = PropertyListing::where('usertype', 'Admin')->count();
        $allproperties = PropertyListing::orderBy('created_at', 'DESC')->get();
        $leaddata = Lead::join('property_listings', 'leads.userid', '=', 'property_listings.roleid')
            ->select('leads.*', 'property_listings.property_name as propertyname')
            ->orderBy('leads.created_at', 'DESC')->get();
        $allcustomers = RegisterUser::where('user_type', 'user')->orderBy('created_at', 'DESC')->get();
        $allagents = RegisterUser::where('user_type', 'agent')->orderBy('created_at', 'DESC')->get();
        // dd( $leaddata);
        $data = [
            'propertyCount' => $propertyCount,
            'leadCount' => $leadCount,
            'userCount' => $userCount,
            'agentCount' => $agentCount,
            'blogCount' => $blogCount,
            'mylistingCount' => $mylistingCount,
        ];

        return view('AdminPanelPages.dashboard', compact('data', 'allproperties', 'leaddata', 'allcustomers', 'allagents'));
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

    public function addproperty()
    {
        $categories = Master::where('type', 'Property Categories')->get();
        return view('AdminPanelPages.addproperty', compact('categories'));
    }

    public function editproperty($id)
    {
        // dd($id);
        $listingdata = PropertyListing::find($id);
        if (!empty($listingdata->amenties) && is_string($listingdata->amenties)) {
            $listingdata->amenties = json_decode($listingdata->amenties, true);
        }
        $listingdata->amenties = is_array($listingdata->amenties) ? $listingdata->amenties : [];

        $categories = Master::where('type', 'Property Categories')->get();
        return view('AdminPanelPages.editproperty', compact('listingdata', 'categories'));
    }

    public function allproperties()
    {
        $agentListings = PropertyListing::join('register_users', 'property_listings.roleid', '=', 'register_users.id')
            ->select('property_listings.*', 'register_users.name as username')
            ->orderBy('property_listings.created_at', 'DESC')
            ->get();

        $adminListings = PropertyListing::join('users', 'property_listings.roleid', '=', 'users.id')
            ->select('property_listings.*', 'users.name as username')
            ->orderBy('property_listings.created_at', 'DESC')
            ->get();

        $allproperties = $agentListings->merge($adminListings);
        // dd( $allproperties);
        $allpropertiescnt = PropertyListing::count();
        return view('AdminPanelPages.allproperties', compact('allproperties', 'allpropertiescnt'));
    }

    public function viewproperty($id)
    {
        $listingdata = PropertyListing::find($id);
        $propertyName = $listingdata->property_name;
        return view('AdminPanelPages.viewproperty', compact('listingdata', 'propertyName'));
    }

    public function leadslist()
    {
        $leaddata = Lead::orderBy('created_at', 'DESC')->get();
        $leadcount = Lead::count();
        $followupstatus = Master::where('type', 'Follow Up Status')->get();
        return view('AdminPanelPages.leadslist', compact('leaddata', 'followupstatus', 'leadcount'));
    }

    public function leadstatusfilter($status)
    {
        $leaddata = Lead::where('status', $status)->get();
        $leadcount = Lead::count();
        $followupstatus = Master::where('type', 'Follow Up Status')->get();
        return view('AdminPanelPages.leadslist', compact('leaddata', 'leadcount', 'followupstatus'));
    }

    public function datefilterleads(Request $request)
    {

        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');

        // Convert the request dates to the database format (Y-m-d)
        $datefromFormatted = \Carbon\Carbon::createFromFormat('m/d/Y', $datefrom)->format('Y-m-d');
        // dd( $datefromFormatted);
        $datetoFormatted = \Carbon\Carbon::createFromFormat('m/d/Y', $dateto)->format('Y-m-d');

        // Query the database using the formatted dates
        $data = Lead::whereDate('created_at', '>=', $datefromFormatted)
            ->whereDate('created_at', '<=', $datetoFormatted)
            ->orderby('created_at', 'desc')
            ->get();

        return response()->json($data);
    }

    public function leadslistkaban()
    {
        $newleads = Lead::where('status', '=', 'new')->orderBy('created_at', 'DESC')->get();
        $qualified = Lead::where('status', '=', 'qualified')->orderBy('created_at', 'DESC')->get();
        $notresponded = Lead::where('status', '=', 'not responded')->orderBy('created_at', 'DESC')->get();
        $paymentmode = Lead::where('status', '=', 'Final')->orderBy('created_at', 'DESC')->get();
        $won = Lead::where('status', '=', 'won')->orderBy('created_at', 'DESC')->get();
        $leadcount = Lead::count();
        $followupstatus = Master::where('type', 'Follow Up Status')->get();
        return view('AdminPanelPages.leadslistkaban', compact('newleads', 'qualified', 'notresponded', 'paymentmode', 'won', 'followupstatus', 'leadcount'));
    }

    public function updateLeadStatusKanban(Request $request)
    {
        $data = $request->all();

        $lead = Lead::find($data['card_id']);
        if ($lead) {
            $lead->update([
                'status' => $data['box_status'],
            ]);
            return response()->json(['success' => true, 'message' => 'Lead status updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Lead not found.'], 404);
        }
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

    public function allcustomers()
    {
        $allcustomers = RegisterUser::where('user_type', 'user')->orderBy('created_at', 'DESC')->get();
        $allcustomerscnt = RegisterUser::where('user_type', 'user')->count();
        return view('AdminPanelPages.allcustomers', compact('allcustomers', 'allcustomerscnt'));
    }
    public function allagents()
    {
        $allagents = RegisterUser::where('user_type', 'agent')->orderBy('created_at', 'DESC')->get();
        $allagentscnt = RegisterUser::where('user_type', 'agent')->count();
        return view('AdminPanelPages.allagents', compact('allagents', 'allagentscnt'));
    }

    public function notifications()
    {
        $allnotificaitons = Nortification::orderBy('created_at', 'DESC')->get();
        $notificationcount = Nortification::count();
        return view('AdminPanelPages.allnotifications', compact('allnotificaitons', 'notificationcount'));
    }

    public function investpagesettings(){
        return view('AdminPanelPages.investpagesettings');
    }

    public function projects(){
        $data = Project::orderBy('created_at', 'DESC')->get();
        $projectcnt = Project::count();
        return view('AdminPanelPages.all-projects',compact('data','projectcnt'));
    }
    public function addproject(){
        $categories = Master::where('type', 'Property Categories')->get();
        return view('AdminPanelPages.addproject',compact('categories'));
    }

    public function editproject($id)
    {
        // dd($id);
        $project = Project::find($id);
        $categories = Master::where('type', 'Property Categories')->get();
        return view('AdminPanelPages.editproject', compact('project', 'categories'));
    }
}
