{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Login')
@section('content')
<div class="py-5" style="background-image: url('{{asset('websiteAssets/images/post-3.jpg')}}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="property-single-content">
                    <div class="about-property wow" data-wow-delay="0.75s">
                        <div class="property-single-subtitle text-center">
                            <h3 class="mb-3 loginhead">Your Trusted Partner in Real Estate</h3>
                            <p>Enter Details to Login</p>
                        </div>
                        <div class="property-inquiry-box wow" data-wow-delay="0.5s">
                            <div class="property-inquiry-form">
                                <form id="" action="{{ route('website.loginuser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-responseAgent">
                                    <div class="row">
                                        <!-- Email Field -->
                                        <div class="form-group col-md-12 mb-4">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" required>
                                        </div>

                                        <!-- Password Field -->
                                        <div class="form-group col-md-12 mb-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="password" class="form-label mb-0">Password</label>
                                                <a href="{{ route('website.resetpassword') }}" class="text-muted text-decoration-underline" style="font-size: smaller;">Reset Password</a>
                                            </div>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password" required>
                                        </div>

                                        <!-- Login Button -->
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn-default btn-lg w-100">Login</button>
                                        </div>

                                        <!-- Divider -->
                                        <div class="col-md-12 my-3 text-center">
                                            <hr class="text-muted">
                                        </div>

                                        <!-- Google Login Button -->
                                        <div class="col-md-12 text-center">
                                            <a href="{{ route('auth.google')}}" class="btn btn-outline-primary btn-lg w-100 d-flex align-items-center justify-content-center">
                                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/google-icon.svg" alt="Google Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                                                Login with Google
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Sign Up Link -->
                            <div class="col-md-12 text-center mt-4">
                                <p>New here? <a class="text-decoration-underline" href="{{ route('website.registration')}}">Sign Up</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
