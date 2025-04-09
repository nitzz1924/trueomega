<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\InvestSetting;
use App\Models\Lead;
use App\Models\Nortification;
use App\Models\Order;
use App\Models\PolicyPage;
use App\Models\Project;
use App\Models\PropertyListing;
use App\Models\RegisterCompany;
use App\Models\Notification;
use App\Models\RegisterUser;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use App\Models\Master;
use Exception;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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
                'gstpercentage' => $request->gstpercentage,
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

    public function updateUserStatus(Request $request)
    {
        $userdata = RegisterUser::find($request->id);
        if ($userdata) {
            $userdata->userstatus = $request->status;
            $userdata->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function insertMedia(Request $request)
    {
        try {
            $mediaImages = [];
            if ($request->hasFile('mediaImages')) {
                $request->validate([
                    'mediaImages.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);

                $files = $request->file('mediaImages');
                foreach ($files as $file) {
                    $imageFullName = time() . '_' . $file->getClientOriginalName();
                    $uploadedPath = public_path('assets/images/Media');
                    $file->move($uploadedPath, $imageFullName);
                    $mediaImages[] = asset('assets/images/Media/' . $imageFullName);
                    $Imagenames[] = $imageFullName;
                }
            }

            return response()->json([
                'message' => 'Media inserted successfully!',
                'images' => $mediaImages, // Return images list to AJAX
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
    public function showMediaGallery()
    {
        $directory = public_path('assets/images/Media');
        $storedImages = [];
        $Imagesnames = [];

        if (File::exists($directory)) {
            $files = File::files($directory);
            foreach ($files as $file) {
                $storedImages[] = asset('assets/images/Media/' . $file->getFilename());
                $Imagesnames[] = $file->getFilename();
            }
        }
        return response()->json(['storedImages' => $storedImages, 'Imagesnames' => $Imagesnames]);
    }
    public function removegalleryitem(Request $request)
    {
        $filename = public_path('assets/images/Media/' . basename($request->url));
        if (File::exists($filename)) {
            File::delete($filename);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function insertProduct(Request $request)
    {
        try {
            // Handle the thumbnail image
            $thumbnailFilename = null;
            if ($request->hasFile('thumbnailImages')) {
                $request->validate([
                    'thumbnailImages' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('thumbnailImages');
                $thumbnailFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Products'), $thumbnailFilename);
            }

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
                    $uploadedPath = public_path('assets/images/Products');

                    // Move the file to the desired location
                    $file->move($uploadedPath, $imageFullName);

                    // Store the path for the image
                    $galleryImages[] = 'assets/images/Products/' . $imageFullName;
                }
                //    dd( $galleryImages);
            }

            // Create the product
            $data = AllProduct::create([
                'productname' => $request->productname,
                'regularprice' => $request->regularprice,
                'category' => $request->category,
                'saleprice' => $request->saleprice,
                'description' => $request->description,
                'thumbnailImages' => $thumbnailFilename,
                'galleryImages' => json_encode($galleryImages),
                'productstatus' => $request->status
            ]);

            return response()->json(['data' => $data, 'message' => 'Product inserted successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
    public function deleteProduct($id)
    {
        try {
            $data = AllProduct::find($id);
            $data->delete();
            return back()->with('success', "Deleted..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function filterbycategory($category)
    {
        $data = AllProduct::where('category', $category)->get();
        return response()->json(['data' => $data]);
    }
    public function filterbystatus($status)
    {
        $data = AllProduct::where('productstatus', $status)->get();
        return response()->json(['data' => $data]);
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

    public function submitWebsiteSettings(Request $request)
    {

        try {
            $firstofferimage = null;
            if ($request->hasFile('firstofferimage')) {
                $request->validate([
                    'firstofferimage' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('firstofferimage');
                $firstofferimage = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Media/'), $firstofferimage);
            }
            $secondofferimage = null;
            if ($request->hasFile('secondofferimage')) {
                $request->validate([
                    'secondofferimage' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('secondofferimage');
                $secondofferimage = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Media/'), $secondofferimage);
            }

            $mainslideriamges = [];
            if ($request->hasFile('mainslideriamges')) {
                $request->validate([
                    'mainslideriamges.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('mainslideriamges');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Media/');
                    $file->move($uploadedPath, $imageFullName);
                    $mainslideriamges[] = 'assets/images/Media/' . $imageFullName;
                }
            }
            $offersliderimages = [];
            if ($request->hasFile('offersliderimages')) {
                $request->validate([
                    'offersliderimages.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('offersliderimages');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Media/');
                    $file->move($uploadedPath, $imageFullName);
                    $offersliderimages[] = 'assets/images/Media/' . $imageFullName;
                }
            }
            // Create the property listing
            $data = WebsiteSetting::create([
                'mainslideriamges' => json_encode($mainslideriamges) ?? NULL,
                'offersliderimages' => json_encode($offersliderimages) ?? NULL,
                'firstofferimage' => $firstofferimage,
                'secondofferimage' => $secondofferimage,
            ]);
            return response()->json(['data' => $data, 'message' => 'Website Settings Updated.....!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deleteSliderImage(Request $request)
    {
        $image = $request->image;
        $websitedata = WebsiteSetting::first(); // Fetch the website data (modify based on your logic)

        if ($websitedata) {
            $images = json_decode($websitedata->mainslideriamges, true);

            // Remove the image from the array
            if (($key = array_search($image, $images)) !== false) {
                unset($images[$key]);
            }
            // dd( $images);
            // Update the database with the new images array
            $websitedata->mainslideriamges = json_encode(array_values($images));
            $websitedata->save();

            // Delete image file from public/assets/images/Media directory
            $publicImagePath = public_path('assets/images/Media/' . basename($image));
            if (File::exists($publicImagePath)) {
                File::delete($publicImagePath);
            }
            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Image not found'], 404);
    }

    public function updateWebsiteSettings(Request $request)
    {
        try {
            $websitedata = WebsiteSetting::first(); // Fetch the existing website settings

            $firstofferimage = $websitedata->firstofferimage ?? null;
            if ($request->hasFile('firstofferimage')) {
                $request->validate([
                    'firstofferimage' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('firstofferimage');
                $firstofferimage = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Media/'), $firstofferimage);
            }

            $secondofferimage = $websitedata->secondofferimage ?? null;
            if ($request->hasFile('secondofferimage')) {
                $request->validate([
                    'secondofferimage' => 'required|mimes:jpeg,png,jpg',
                ]);

                $file = $request->file('secondofferimage');
                $secondofferimage = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Media/'), $secondofferimage);
            }

            $mainslideriamges = json_decode($websitedata->mainslideriamges, true) ?? [];
            if ($request->hasFile('mainslideriamges')) {
                $request->validate([
                    'mainslideriamges.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('mainslideriamges');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Media/');
                    $file->move($uploadedPath, $imageFullName);
                    $mainslideriamges[] = 'assets/images/Media/' . $imageFullName;
                }
            }

            $offersliderimages = json_decode($websitedata->offersliderimages, true) ?? [];
            if ($request->hasFile('offersliderimages')) {
                $request->validate([
                    'offersliderimages.*' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $files = $request->file('offersliderimages');
                foreach ($files as $file) {
                    $imageName = md5(rand(1000, 10000));
                    $extension = strtolower($file->getClientOriginalExtension());
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadedPath = public_path('assets/images/Media/');
                    $file->move($uploadedPath, $imageFullName);
                    $offersliderimages[] = 'assets/images/Media/' . $imageFullName;
                }
            }

            // Update the website settings
            $websitedata->update([
                'mainslideriamges' => json_encode($mainslideriamges),
                'offersliderimages' => json_encode($offersliderimages),
                'firstofferimage' => $firstofferimage,
                'secondofferimage' => $secondofferimage,
            ]);

            return response()->json(['data' => $websitedata, 'message' => 'Website Settings Updated Successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deleteOfferSliderImage(Request $request)
    {
        $image = $request->image;
        $websitedata = WebsiteSetting::first(); // Fetch the website data (modify based on your logic)

        if ($websitedata) {
            $images = json_decode($websitedata->offersliderimages, true);

            // Remove the image from the array
            if (($key = array_search($image, $images)) !== false) {
                unset($images[$key]);
            }
            // dd( $images);
            // Update the database with the new images array
            $websitedata->offersliderimages = json_encode(array_values($images));
            $websitedata->save();

            // Delete image file from public/assets/images/Media directory
            $publicImagePath = public_path('assets/images/Media/' . basename($image));
            if (File::exists($publicImagePath)) {
                File::delete($publicImagePath);
            }

            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Image not found'], 404);
    }

    public function policypagesinsert(Request $request)
    {
        try {
            // Create the property listing
            $data = PolicyPage::updateOrCreate(
                ['pagename' => $request->pagename],  // this is checking duplicacy
                ['pagediscription' => $request->pagediscription ?? '']
            );
            return response()->json(['data' => $data, 'message' => 'Page Created.!!!!!!']);

        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function policypagesgetdata(Request $request)
    {
        $data = PolicyPage::where('pagename', $request->pagename)->first();
        return response()->json(['data' => $data]);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        try {
            $order = Order::find($id);
            if ($order) {
                $order->orderstatus = $request->status;
                $order->save();
                return back()->with('success', "Order status updated successfully!");
            }
            return back()->with('error', "Order not found.");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
