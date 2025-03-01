<?php

namespace App\Http\Controllers;

use App\Models\Nortification;
use Illuminate\Http\Request;
use Session;
use Auth;
use Exception;
use App\Models\Master;
use App\Models\PropertyListing;
class UserViews extends Controller
{
    public function dashboard()
    {
        $authuser = Auth::guard('customer')->user();
        $allproperties = PropertyListing::where('roleid', $authuser->id)->orderBy('created_at', 'DESC')->get();
        $mylistingscnt = PropertyListing::where('roleid', $authuser->id)->count();
        return view('UserPanelPages.dashboard', compact('allproperties', 'mylistingscnt'));
    }

    public function logoutuserpanel()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('website.userlogin');
    }

    public function myprofile()
    {
        $userdata = Auth::guard('customer')->user();
        return view('UserPanelPages.myprofile', compact('userdata'));
    }

    public function updateuserprofile(Request $request)
    {
        // dd($request->all());
        try {
            $user = Auth::guard('customer')->user();
            $filenameprofileimage = "";
            $thumbnailFilename = null;

            if ($request->hasFile('myprofileimage')) {
                $request->validate([
                    'myprofileimage' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);
                $profileimage = $request->file('myprofileimage');
                $filenameprofileimage = time() . '_' . $profileimage->getClientOriginalName();
                $profileimage->move(public_path('assets/images/Users'), $filenameprofileimage);
            }

            if ($request->hasFile('company_document')) {
                $request->validate([
                    'company_document' => 'required|mimes:jpeg,pdf,jpg',
                ]);

                $file = $request->file('company_document');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Users'), $thumbnailFilename);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'company_name' => $request->companyname,
                'profile_photo_path' => $filenameprofileimage == null ? $user->profile_photo_path : $filenameprofileimage,
                'company_document' => $thumbnailFilename == null ? $user->company_document : $thumbnailFilename,
            ]);

            return back()->with('success', "Profile Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function mylistings()
    {
        $authuser = Auth::guard('customer')->user();
        $allproperties = PropertyListing::where('roleid', $authuser->id)->orderBy('created_at', 'DESC')->get();
        $allpropertiescnt = PropertyListing::where('roleid', $authuser->id)->count();
        return view('UserPanelPages.mylistings', compact('allproperties', 'allpropertiescnt', 'authuser'));
    }

    public function addlisting()
    {
        $categories = Master::where('type', 'Property Categories')->get();
        return view('UserPanelPages.addproperty', compact('categories'));
    }

    public function insertuserlisting(Request $request)
    {
        //dd($request->all());
        $authuser = Auth::guard('customer')->user();
        $datareq = $request->all();

        try {
            // Handle the thumbnail image
            $thumbnailFilename = null;
            if ($request->hasFile('thumbnailImages')) {
                $request->validate([
                    'thumbnailImages' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('thumbnailImages');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Listings'), $thumbnailFilename);
            }


            // Handle the Master Plan Doc
            $masterdoc = null;
            if ($request->hasFile('masterplandocument')) {
                $request->validate([
                    'masterplandocument' => 'required|mimes:pdf,jpeg,jpg',
                ]);

                $file = $request->file('masterplandocument');
                $masterdoc = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Listings'), $masterdoc);
            }
            // dd($masterdoc);




            // Handle multiple gallery images
            $galleryImages = [];
            if ($request->hasFile('galleryImages')) {
                $request->validate([
                    'galleryImages.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('galleryImages');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;

                    // Define the upload path
                    $uploadedPath = public_path('assets/images/Listings');

                    // Move the file to the desired location
                    $file->move($uploadedPath, $imageFullName);

                    // Store the path for the image
                    $galleryImages[] = 'assets/images/Listings/' . $imageFullName;
                }
                //    dd( $galleryImages);
            }


            // Handle multiple documents
            $documents = [];
            if ($request->hasFile('documents')) {
                $request->validate([
                    'documents.*' => 'required|mimes:pdf,jpeg,jpg',
                ]);

                $files = $request->file('documents');
                foreach ($files as $file) {
                    $documentname = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $documentfullname = $documentname . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Listings');
                    $file->move($uploadedPath, $documentfullname);
                    $documents[] = 'assets/images/Listings/' . $documentfullname;
                }
                // dd($documents);
            }

            // Handle multiple Videos
            $Videos = [];
            if ($request->hasFile('propertyvideos')) {
                $request->validate([
                    'propertyvideos.*' => 'required|mimes:mp4,mov,avi',
                ]);

                $videofiles = $request->file('propertyvideos');
                foreach ($videofiles as $file) {
                    $videoname = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $videofullname = $videoname . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Listings');
                    $file->move($uploadedPath, $videofullname);
                    $Videos[] = 'assets/images/Listings/' . $videofullname;
                }
                // dd($Videos);
            }

            // Create the property listing
            $data = PropertyListing::create([
                'usertype' => 'Admin',
                'roleid' => $authuser->id,
                'property_name' => $datareq['property_name'],
                'nearbylocation' => $datareq['nearbylocation'],
                'approxrentalincome' => $datareq['approxrentalincome'],
                'discription' => strip_tags($datareq['description'] ?? ''), // Remove HTML tags
                'price' => $datareq['price'],
                'pricehistory' => $datareq['historydate'],
                'squarefoot' => $datareq['sqfoot'],
                'bedroom' => $datareq['bedroom'],
                'bathroom' => $datareq['bathroom'],
                'floor' => $datareq['floor'],
                'city' => $datareq['city'],
                'address' => $datareq['officeaddress'],
                'thumbnail' => $thumbnailFilename,
                'masterplandoc' => $masterdoc,
                'maplocations' => $datareq['location'],
                'category' => $datareq['category'],
                'gallery' => json_encode($galleryImages),
                'documents' => json_encode($documents),
                'amenties' => $datareq['amenities'],
                'videos' => json_encode($Videos),
                'status' => $datareq['status'],
            ]);
            return response()->json(['data' => $data, 'message' => 'Listing inserted successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function viewlisting($id)
    {
        $listingdata = PropertyListing::find($id);
        $propertyName = $listingdata->property_name;
        return view('UserPanelPages.viewlisting', compact('listingdata', 'propertyName'));
    }

    public function editlisting($id)
    {
        // dd($id);
        $listingdata = PropertyListing::find($id);
        $categories = Master::where('type', 'Property Categories')->get();
        return view('UserPanelPages.editlisting', compact('listingdata', 'categories'));
    }

    public function updateuserlisting(Request $request)
    {
        //dd($request->all());
        $authuser = Auth::guard('customer')->user();
        $datareq = $request->all();

        try {
            // Handle the thumbnail image
            $thumbnailFilename = null;
            if ($request->hasFile('thumbnailImages')) {
                $request->validate([
                    'thumbnailImages' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('thumbnailImages');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Listings'), $thumbnailFilename);
            }
            // dd($thumbnailFilename);

            // Handle the Master Plan Doc
            $masterdoc = null;
            if ($request->hasFile('masterplandocument')) {
                $request->validate([
                    'masterplandocument' => 'required|mimes:pdf,jpeg,jpg',
                ]);

                $file = $request->file('masterplandocument');
                $masterdoc = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Listings'), $masterdoc);
            }
            // dd($masterdoc);

            // Handle multiple gallery images
            $galleryImages = [];
            if ($request->hasFile('galleryImages')) {
                $request->validate([
                    'galleryImages.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('galleryImages');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;

                    // Define the upload path
                    $uploadedPath = public_path('assets/images/Listings');

                    // Move the file to the desired location
                    $file->move($uploadedPath, $imageFullName);

                    // Store the path for the image
                    $galleryImages[] = 'assets/images/Listings/' . $imageFullName;
                }
                //    dd( $galleryImages);
            }

            // Handle multiple documents
            $documents = [];
            if ($request->hasFile('documents')) {
                $request->validate([
                    'documents.*' => 'required|mimes:pdf,jpeg,jpg',
                ]);

                $files = $request->file('documents');
                foreach ($files as $file) {
                    $documentname = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $documentfullname = $documentname . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Listings');
                    $file->move($uploadedPath, $documentfullname);
                    $documents[] = 'assets/images/Listings/' . $documentfullname;
                }
                // dd($documents);
            }

            // Handle multiple Videos
            $Videos = [];
            if ($request->hasFile('propertyvideos')) {
                $request->validate([
                    'propertyvideos.*' => 'required|mimes:mp4,mov,avi',
                ]);

                $videofiles = $request->file('propertyvideos');
                foreach ($videofiles as $file) {
                    $videoname = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $videofullname = $videoname . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Listings');
                    $file->move($uploadedPath, $videofullname);
                    $Videos[] = 'assets/images/Listings/' . $videofullname;
                }
                // dd($Videos);
            }

            $olddata = PropertyListing::find($request->listingid);

            $updatedhistory = "null";
            if ($datareq['historydate']) {
                // dd($datareq['historydate']);
                $updatedhistory = array_merge(json_decode($olddata->pricehistory), json_decode($datareq['historydate']));
            }
            // dd( $updatedhistory);
            $data = PropertyListing::where('id', $request->listingid)->update([
                'usertype' => 'Admin',
                'roleid' => $authuser->id,
                'property_name' => $datareq['property_name'],
                'nearbylocation' => $datareq['nearbylocation'],
                'approxrentalincome' => $datareq['approxrentalincome'],
                'discription' => strip_tags($datareq['description'] ?? ''), // Remove HTML tags
                'price' => $datareq['price'],
                'pricehistory' => $updatedhistory == "null" ? $olddata->pricehistory : json_encode($updatedhistory),
                'squarefoot' => $datareq['sqfoot'],
                'bedroom' => $datareq['bedroom'],
                'bathroom' => $datareq['bathroom'],
                'floor' => $datareq['floor'],
                'city' => $datareq['city'],
                'address' => $datareq['officeaddress'],
                'thumbnail' => $thumbnailFilename ?? $olddata->thumbnail,
                'masterplandoc' => $masterdoc ?? $olddata->masterdoc,
                'maplocations' => $datareq['location'] ?? $olddata->maplocations,
                'category' => $datareq['category'],
                'gallery' => !empty($galleryImages) ? json_encode($galleryImages) : $olddata->gallery,
                'documents' => !empty($documents) ? json_encode($documents) : $olddata->documents,
                'amenties' => $datareq['amenities'] ?? $olddata->amenities,
                'videos' => !empty($Videos) ? json_encode($Videos) : $olddata->videos,
                'status' => $datareq['status'],
            ]);

            return response()->json(['data' => $data, 'message' => 'Listing Updated..!']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deletelisting($id)
    {
        try {
            $data = PropertyListing::find($id);
            $data->delete();
            return back()->with('success', "Listing Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateaduserlistingstatus(Request $request)
    {
        $lisdata = PropertyListing::find($request->id);
        if ($lisdata) {
            $lisdata->status = $request->status;
            $lisdata->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function notifications()
    {
        // dd('$authuser');
        $authuser = Auth::guard('customer')->user();
        $notifications = Nortification::where('sendto', $authuser->user_type)
        ->orWhere('sendto', 'all')
        ->orderBy('created_at', 'DESC')->get();
        $notifycnt = Nortification::where('sendto', $authuser->user_type)->orWhere('sendto', 'all')->count();
        return view('UserPanelPages.allnotifications', compact('notifications', 'notifycnt'));
    }

}
