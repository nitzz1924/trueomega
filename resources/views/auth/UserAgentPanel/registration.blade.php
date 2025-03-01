{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Sign Up')
@section('content')
<div class="py-5" style="background-image: url('{{asset('websiteAssets/images/post-3.jpg')}}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="property-single-content">
                    <div class="about-property wow" data-wow-delay="0.75s">
                        <div class="property-single-subtitle text-center">
                            <h3 class="mb-3 loginhead">Join Us and Explore New Opportunities</h3>
                            <p>Register as :</p>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert border-0 alert-success text-center" role="alert" id="successAlert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert border-0 alert-danger text-center" role="alert" id="dangerAlert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="property-inquiry-box wow" data-wow-delay="0.5s">
                            <div class="property-inquiry-form">
                                <!-- Tabs Navigation -->
                                <ul class="nav nav-pills nav-fill  mb-4" id="userAgentTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#userForm" type="button" role="tab" aria-controls="userForm" aria-selected="true">
                                            User
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="agent-tab" data-bs-toggle="tab" data-bs-target="#agentForm" type="button" role="tab" aria-controls="agentForm" aria-selected="false">
                                            Agent
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="userAgentTabsContent">
                                    <div class="tab-pane fade show active" id="userForm" role="tabpanel" aria-labelledby="user-tab">
                                        <form action="{{ route('website.registeruser') }}" method="POST">
                                            @csrf
                                             <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="user_name" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control form-control-lg" id="user_name" placeholder="Enter your Name" required>
                                                </div>
                                                <input type="hidden" name="user_type" value="user">
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="user_mobile" class="form-label">Mobile No.</label>
                                                    <input type="text" name="mobile" class="form-control form-control-lg" id="user_mobile" placeholder="Enter your Mobile No." required>
                                                </div>
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="user_email" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control form-control-lg" id="user_email" placeholder="Enter your email" required>
                                                </div>

                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="user_password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control form-control-lg" id="user_password" placeholder="Enter your password" required>
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn-default btn-lg w-100">Register</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-3 text-center">
                                                <hr class="text-muted">
                                            </div>

                                            <!-- Google Login Button -->
                                            <div class="col-md-12 text-center">
                                                <a href="{{ route('auth.registration', ['usertype' => 'user']) }}" class="btn btn-outline-primary btn-lg w-100 d-flex align-items-center justify-content-center">
                                                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/google-icon.svg" alt="Google Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                                                    Sign In with Google
                                                </a>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Agent Form -->
                                    <div class="tab-pane fade" id="agentForm" role="tabpanel" aria-labelledby="agent-tab">
                                        <form action="{{ route('website.registeruser') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-responseAgent">
                                            <div class="row">
                                                <!-- Name Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="agent_name" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control form-control-lg" id="agent_name" placeholder="Enter your Name" required>
                                                </div>
                                                <input type="hidden" name="user_type" value="agent">
                                                <!-- Mobile No. Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="agent_mobile" class="form-label">Mobile No.</label>
                                                    <input type="text" name="mobile" class="form-control form-control-lg" id="agent_mobile" placeholder="Enter your Mobile No." required>
                                                </div>

                                                <!-- Email Address Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="agent_email" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control form-control-lg" id="agent_email" placeholder="Enter your email" required>
                                                </div>

                                                <!-- Password Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="agent_password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control form-control-lg" id="agent_password" placeholder="Enter your password" required>
                                                </div>

                                                <!-- Agency Name Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="agency_name" class="form-label">Company Name</label>
                                                    <input type="text" name="company_name" class="form-control form-control-lg" id="agency_name" placeholder="Enter your Company Name" required>
                                                </div>
                                                <!-- Company Document Upload Field -->
                                                <div class="form-group col-md-6 mb-4">
                                                    <label for="company_document" class="form-label">Company Document</label>
                                                    <input type="file" name="company_document" class="form-control form-control-lg" id="company_document" required>
                                                </div>

                                                <!-- Register Button -->
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn-default btn-lg w-100">Register</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-3 text-center">
                                                <hr class="text-muted">
                                            </div>

                                            <!-- Google Login Button -->
                                            <div class="col-md-12 text-center">
                                                <a href="{{ route('auth.registration', ['usertype' => 'agent']) }}" class="btn btn-outline-primary btn-lg w-100 d-flex align-items-center justify-content-center">
                                                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/google-icon.svg" alt="Google Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                                                     Sign In with Google
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Sign In Link -->
                                <div class="col-md-12 text-center mt-4">
                                    <p>I already have an account <a class="text-decoration-underline" href="{{ route('website.userlogin')}}">Sign In</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 3000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 3000);

</script>
@endsection
