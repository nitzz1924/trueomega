<?php

namespace App\Http\Controllers;

use App\Models\Nortification;
use Illuminate\Http\Request;
use Session;
use Auth, Validator, Hash, Http;
use App\Models\RegisterUser;
use Exception;
use App\Models\Master;
use App\Models\PropertyListing;
use Log;
use Illuminate\Support\Facades\Cookie;
class UserViews extends Controller
{
    public function dashboard()
    {
        return view('UserPanelPages.dashboard');
    }

    public function logoutuserpanel()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
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

    public function userloginpage()
    {
        if (Cookie::has('auth_token')) {
            $user = RegisterUser::where('remember_token', Cookie::get('auth_token'))->first();
            if ($user) {
                Auth::guard('customer')->login($user);
                return redirect('/');
            }
        }
        return view('auth.UserPanel.login');
    }
    public function userregistration()
    {
        return view('auth.UserPanel.registration');
    }

    public function registeruser(Request $request)
    {
        // dd($request->all());
        try {
            // Validate all input fields including reCAPTCHA
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:register_users',
                'mobile' => 'required|unique:register_users|digits:10',
                'sponserid' => 'required|nullable',
                'fullname' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Create user record
            RegisterUser::create([
                'name' => $request->fullname,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'sponserid' => $request->sponserid ?? 1001,
                'company_name' => $request->company_name,
                'password' => Hash::make($request->password),
                'profile_photo_path' => 'defaultuser.png',
                'userstatus' => 'disabled',
                'commission_status' => 'not eligible',
            ]);

            return back()->with('success', 'You have been registered successfully!');

        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function loginuser(Request $rq)
    {
        try {
            $user = RegisterUser::where('email', $rq->email)->first();
            if ($user) {
                if (Hash::check($rq->password, $user->password)) {
                    Auth::guard('customer')->login($user);
                    if (Auth::guard('customer')->check()) {
                        $user->verification_status = 1;

                        // Generate and store auth token in cookies
                        $minutes = 43200; // 30 days
                        $token = bin2hex(random_bytes(32)); // Generate secure token
                        Cookie::queue('auth_token', $token, $minutes);
                        Log::info('Auth token stored in cookies successfully for user: ' . $user->id);

                        // Save the token in the database
                        $user->remember_token = $token;
                        $user->save();

                        return redirect('/');
                    } else {
                        return back()->with('error', "Invalid Credentials..!!!");
                    }
                } else {
                    return back()->with('error', "Invalid Password..!!!");
                }
            } else {
                return back()->with('error', "Invalid Email..!!!");
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updatepassword(Request $request)
    {
        try {
            $user = Auth::guard('customer')->user();

            if (Hash::check($request->oldpassword, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->newpassword),
                ]);
                return back()->with('success', "Password Updated..!!!");
            } else {
                return back()->with('error', "Old password is incorrect.");
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}
