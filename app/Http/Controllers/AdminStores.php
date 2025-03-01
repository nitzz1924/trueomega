<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\InvestSetting;
use App\Models\Lead;
use App\Models\Nortification;
use App\Models\Project;
use App\Models\PropertyListing;
use App\Models\RegisterCompany;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Master;
use Exception;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminStores extends Controller
{

    public function createmaster(Request $rq)
    {
        // dd($rq->all());
        $filename = "";
        try {
            if ($rq->hasFile('categoryimage')) {
                $rq->validate([
                    'categoryimage' => 'image|mimes:jpeg,png,jpg',
                ]);
                $file = $rq->file('categoryimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Categories'), $filename);
            }
            $attributes = Master::create([
                'type' => $rq->type == 'Master' ? 'Master' : $rq->type,
                'label' => $rq->label,
                'categoryimage' => $filename,
            ]);
            return back()->with('success', "Category Added..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function deletemaster($id)
    {
        try {
            $data = Master::find($id);
            $data->delete();
            return back()->with('success', "Category Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updatemaster(Request $rq)
    {
        try {
            if ($rq->hasFile('categoryimage')) {
                $rq->validate([
                    'categoryimage' => 'image|mimes:jpeg,png,jpg',
                ]);
                $file = $rq->file('categoryimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Categories'), $filename);
            }
            $data = Master::find($rq->masterid);
            $data->type = $rq->type;
            $data->label = $rq->label;
            $data->categoryimage = $filename ?? $data->categoryimage;
            $data->save();
            return back()->with('success', "Category Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function addcompanydetails(Request $request)
    {
        try {
            if ($request->hasFile('companylogo')) {
                $request->validate([
                    'companylogo' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $companylogo = $request->file('companylogo');
                $filenamecompanylogo = time() . '_' . $companylogo->getClientOriginalName();
                $companylogo->move(public_path('assets/images/Services'), $filenamecompanylogo);
            }
            
            if ($request->hasFile('registrationimage')) {
                $request->validate([
                    'registrationimage' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $registrationimage = $request->file('registrationimage');
                $filenameregistrationimage = time() . '_' . $registrationimage->getClientOriginalName();
                $registrationimage->move(public_path('assets/images/Services'), $filenameregistrationimage);
            }
            if ($request->hasFile('pancardimage')) {
                $request->validate([
                    'pancardimage' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $pancardimage = $request->file('pancardimage');
                $filenamepancardimage = time() . '_' . $pancardimage->getClientOriginalName();
                $pancardimage->move(public_path('assets/images/Services'), $filenamepancardimage);
            }
            $data = RegisterCompany::create([
                'companyname' => $request->companyname,
                'companylogo' => $filenamecompanylogo,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pincode' => $request->pincode,
                'contactnumber' => $request->contactnumber,
                'email' => $request->email,
                'officeaddress' => $request->officeaddress,
                'registrationimage' => $filenameregistrationimage,
                'pancardimage' => $filenamepancardimage,
            ]);
            //dd($data);
            return back()->with('success', "Company Registered..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function updateregistercompany(Request $request)
    {
        // DD( $request->companylogo);
        try {
            if ($request->hasFile('companylogo')) {
                $request->validate([
                    'companylogo' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $companylogo = $request->file('companylogo');
                $filenamecompanylogo = time() . '_' . $companylogo->getClientOriginalName();
                $companylogo->move(public_path('assets/images/Services'), $filenamecompanylogo);
            }
            
            if ($request->hasFile('registrationimage')) {
                $request->validate([
                    'registrationimage' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $registrationimage = $request->file('registrationimage');
                $filenameregistrationimage = time() . '_' . $registrationimage->getClientOriginalName();
                $registrationimage->move(public_path('assets/images/Services'), $filenameregistrationimage);
            }
            if ($request->hasFile('pancardimage')) {
                $request->validate([
                    'pancardimage' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $pancardimage = $request->file('pancardimage');
                $filenamepancardimage = time() . '_' . $pancardimage->getClientOriginalName();
                $pancardimage->move(public_path('assets/images/Services'), $filenamepancardimage);
            }
            $data = RegisterCompany::where('id', $request->recordid)->update([
                'companyname' => $request->companyname,
                'companylogo' => $filenamecompanylogo ?? RegisterCompany::find($request->recordid)->companylogo,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pincode' => $request->pincode,
                'contactnumber' => $request->contactnumber,
                'email' => $request->email,
                'officeaddress' => $request->officeaddress,
                'registrationimage' => $filenameregistrationimage ?? RegisterCompany::find($request->recordid)->registrationimage,
                'pancardimage' => $filenamepancardimage ?? RegisterCompany::find($request->recordid)->pancardimage,
            ]);

            //dd($data);

            return back()->with('success', "Details Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function updatemyprofile(Request $request)
    {
        // dd($request->all());
        try {
            $user = auth()->user();
            $filenameprofileimage = "";
            if ($request->hasFile('myprofileimage')) {
                $request->validate([
                    'myprofileimage' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
                ]);
                $profileimage = $request->file('myprofileimage');
                $filenameprofileimage = time() . '_' . $profileimage->getClientOriginalName();
                $profileimage->move(public_path('assets/images/'), $filenameprofileimage);
            }

            if (Hash::check($request->oldpassword, $user->password)) {
                // Update user's password
                $udpatedpassword = $user->password = Hash::make($request->newpassword);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo_path' => $filenameprofileimage == null ? $user->profile_photo_path : $filenameprofileimage,
                'website_link' => $request->websitelink,
                'fulladdress' => $request->fulladdress,
                'password' => $udpatedpassword ?? $user->password,
            ]);

            return back()->with('success', "Profile Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function insertlisting(Request $request)
    {
        //dd($request->all());
        $authuser = auth()->user();
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
                'gallery' => json_encode($galleryImages) ?? NULL,
                'documents' => json_encode($documents) ?? NULL,
                'amenties' => $datareq['amenities'] ?? NULL,
                'videos' => json_encode($Videos) ?? NULL,
                'status' => $datareq['status'],
            ]);

            return response()->json(['data' => $data, 'message' => 'Listing inserted successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function updatelisting(Request $request)
    {
        //dd($request->all());
        $authuser = auth()->user();
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

    public function insertfollowup(Request $request)
    {
        try {
            $followupdetails = [
                'date' => $request->followupdate,
                'description' => $request->followupdesciption,
            ];
            $leads = Lead::find($request->recordid);
            $existingFollowups = $leads->followupdetails ? json_decode($leads->followupdetails, true) : [];
            $existingFollowups[] = $followupdetails;
            $leads->followupdetails = json_encode($existingFollowups);
            // dd( $existingFollowups);

            if ($request->followupstatus) {
                $leads->status = $request->followupstatus;
            }
            $leads->save();

            return back()->with('success', "Follow-up Added and Status Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deletelead($id)
    {
        try {
            $data = Lead::find($id);
            $data->delete();
            return back()->with('success', "Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updatelead(Request $request)
    {
        try {

            $data = Lead::find($request->leadid);
            $data->update([
                'name' => $request->customername,
                'mobilenumber' => $request->mobilenumber,
                'email' => $request->email,
                'city' => $request->city,
                'inwhichcity' => $request->cityofproperty,
            ]);

            return back()->with('success', "Lead Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function submitblog(Request $request)
    {
        $categories = json_decode($request->input('categories'), true);
        // dd($categories);
        $description = $request->input('blogdescription');
        $files = $request->file('blogthumbnail');
        $blogname = $request->input('blogname');

        try {
            $thumbnailFilename = null;
            if ($request->hasFile('blogthumbnail')) {
                $request->validate([
                    'blogthumbnail' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('blogthumbnail');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Blogs'), $thumbnailFilename);
            }
            // Create the property listing
            $data = Blog::create([
                'blogname' => $blogname,
                'blogcategories' => json_encode($categories),
                'blogthumbnail' => $thumbnailFilename,
                'blogdescription' => $description,
            ]);
            return response()->json(['data' => $data, 'message' => 'Listing inserted successfully!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function updateblog(Request $request)
    {
        $categories = json_decode($request->input('categories'), true);
        // dd($categories);
        $description = $request->input('blogdescription');
        $files = $request->file('blogthumbnail');
        $blogname = $request->input('blogname');

        try {
            $thumbnailFilename = null;
            if ($request->hasFile('blogthumbnail')) {
                $request->validate([
                    'blogthumbnail' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('blogthumbnail');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Blogs'), $thumbnailFilename);
            }
            $olddata = Blog::find($request->blogid);
            // Create the property listing
            $data = Blog::where('id', $request->blogid)->update([
                'blogname' => $blogname,
                'blogcategories' => json_encode($categories),
                'blogthumbnail' => $thumbnailFilename ?? $olddata->blogthumbnail,
                'blogdescription' => $description,
            ]);
            return response()->json(['data' => $data, 'message' => 'Blog Updated.....!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deleteblog($id)
    {
        try {
            $data = Blog::find($id);
            $data->delete();
            return back()->with('success', "Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateadminlistingstatus(Request $request)
    {
        $lisdata = PropertyListing::find($request->id);
        if ($lisdata) {
            $lisdata->status = $request->status;
            $lisdata->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function insertnotification(Request $request)
    {

        $description = $request->input('notificationdes');
        $files = $request->file('notificationimg');
        $notificationname = $request->input('notificationname');
        $sendtowhom = $request->input('sendto');

        try {
            $notificationimg = null;
            if ($request->hasFile('notificationimg')) {
                $request->validate([
                    'notificationimg' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('notificationimg');
                $notificationimg = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Notificaitons'), $notificationimg);
            }
            // Create the property listing
            $data = Nortification::create([
                'notificationname' => $notificationname,
                'notificationimg' => $notificationimg ?? 'placeholder.png',
                'notificationdes' => $description,
                'sendto' => $sendtowhom,
            ]);
            return response()->json(['data' => $data, 'message' => 'Notification inserted successfully!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deletenortification($id)
    {
        try {
            $data = Nortification::find($id);
            $data->delete();
            return back()->with('success', "Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function udpatenortification(Request $request)
    {

        $description = $request->input('notificationdesupdate');
        $files = $request->file('notificationimgupdate');
        $notificationname = $request->input('notificationnameupdate');
        $sendtoupdate = $request->input('sendtoupdate');

        try {
            $notificationimg = null;
            if ($request->hasFile('notificationimgupdate')) {
                $request->validate([
                    'notificationimgupdate' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('notificationimgupdate');
                $notificationimg = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Notificaitons'), $notificationimg);
            }
            $olddata = Nortification::find($request->nortiid);

            // Update the Nortification
            $data = Nortification::where('id', $request->nortiid)->update([
                'notificationname' => $notificationname,
                'notificationimg' => $notificationimg ?? $olddata->notificationimg,
                'notificationdes' => $description,
                'sendto' => $sendtoupdate,
            ]);
            return response()->json(['data' => $data, 'message' => 'Notification Updated....!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function submitinvestpagesettings(Request $request)
    {
        $description = $request->input('description');

        try {
            // Handle bannervideo images
            $thumbnailFilename = null;
            if ($request->hasFile('bannervideo')) {

                $file = $request->file('bannervideo');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Investsettings'), $thumbnailFilename);
            }


            // Handle multiple Images to Share images
            $imagestoshare = [];
            if ($request->hasFile('imagestoshare')) {
                $request->validate([
                    'imagestoshare.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('imagestoshare');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;

                    // Define the upload path
                    $uploadedPath = public_path('assets/images/Investsettings');

                    // Move the file to the desired location
                    $file->move($uploadedPath, $imageFullName);

                    // Store the path for the image
                    $imagestoshare[] = 'assets/images/Investsettings/' . $imageFullName;
                }
                //    dd( $imagestoshare);
            }


            // Handle multiple Videos
            $Videos = [];
            if ($request->hasFile('videostoshare')) {
                $request->validate([
                    'videostoshare.*' => 'required|mimes:mp4,mov,avi',
                ]);

                $videostoshare = $request->file('videostoshare');
                foreach ($videostoshare as $file) {
                    $videoname = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $videofullname = $videoname . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Investsettings');
                    $file->move($uploadedPath, $videofullname);
                    $Videos[] = 'assets/images/Investsettings/' . $videofullname;
                }
                // dd($Videos);
            }

            // Create the Invest Settings 
            $data = InvestSetting::create([
                'description' => strip_tags($description ?? ''),
                'bannervideo' => $thumbnailFilename,
                'imagestoshare' => json_encode($imagestoshare),
                'videostoshare' => json_encode($Videos),
            ]);

            return response()->json(['data' => $data, 'message' => 'Settings inserted successfully!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function submitproject(Request $request){
        $categories = json_decode($request->input('categories'), true);
        // dd($categories);
        $projectdescription = $request->input('projectdescription');
        $files = $request->file('projectthumbnail');
        $projectname = $request->input('projectname');

        try {
            $thumbnailFilename = null;
            if ($request->hasFile('projectthumbnail')) {
                $request->validate([
                    'projectthumbnail' => 'mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('projectthumbnail');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Projects'), $thumbnailFilename);
            }
            // Create the property listing
            $data = Project::create([
                'projectname' => $projectname,
                'categories' => json_encode($categories),
                'projectthumbnail' => $thumbnailFilename,
                'projectdescription' => strip_tags($projectdescription),
                'projectstatus' =>  $request->projectstatus,
            ]);
            return response()->json(['data' => $data, 'message' => 'Project inserted successfully!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function updateproject(Request $request)
    {
        $categories = json_decode($request->input('categories'), true);
        // dd($categories);
        $projectdescription = $request->input('projectdescription');
        $files = $request->file('projectthumbnail');
        $projectname = $request->input('projectname');

        try {
            $thumbnailFilename = null;
            if ($request->hasFile('projectthumbnail')) {
                $request->validate([
                    'projectthumbnail' => 'mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('projectthumbnail');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Projects'), $thumbnailFilename);
            }
            $olddata = Project::find($request->projectid);
            // Create the property listing
            $data = Project::where('id', $request->projectid)->update([
                'projectname' => $projectname,
                'categories' => json_encode($categories),
                'projectthumbnail' => $thumbnailFilename ?? $olddata->projectthumbnail,
                'projectdescription' => strip_tags($projectdescription),
                'projectstatus' =>  $request->projectstatus,
            ]);
            return response()->json(['data' => $data, 'message' => 'Project Updated.....!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

}
