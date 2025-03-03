{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','My Profile')
@section('user-content')
<div class="container-fluid">
    <form action="{{ route('user.updateuserprofile') }}" class="floating-labels" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">My Profile</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">My Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @if($userdata->user_type == 'agent')
            @if(empty($userdata->company_document) || empty($userdata->company_name) || empty($userdata->mobile))
            <div class="alert customize-alert alert-dismissible alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="d-flex align-items-center  me-3 me-md-0 fw-bolder">
                    <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                    Complete your Profile Details!!!!!!
                </div>
                <ol start="1" class="mt-2 text-black">
                    @if(empty($userdata->company_document))
                    <li>Company Document is missing</li>
                    @endif
                    @if(empty($userdata->company_name))
                    <li>Company Name is missing</li>
                    @endif
                    @if(empty($userdata->mobile))
                    <li>Mobile Number is missing</li>
                    @endif
                </ol>
            </div>
            @endif
            @elseif($userdata->user_type == 'user')
            @if(empty($userdata->mobile))
            <div class="alert customize-alert alert-dismissible alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="d-flex align-items-center  me-3 me-md-0 fw-bolder">
                    <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                    Complete your Profile Details!!!!!!
                </div>
                <ol start="1" class="mt-2 text-black">
                    @if(empty($userdata->mobile))
                    <li>Mobile Number is missing</li>
                    @endif
                </ol>
            </div>
            @endif
            @endif
            <div class="card overflow-hidden">
                <div class="card-body pt-0">
                    <div class="row align-items-center justify-content-start">
                        <div class="col-lg-3">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <div class="d-flex align-items-center justify-content-start round-110 position-relative">
                                        <div class="border border-4 border-white d-flex align-items-center justify-content-start rounded-circle overflow-hidden round-100">
                                            @if(Auth::guard('customer')->user()->profile_photo_path)
                                            @if(Str::startsWith(Auth::guard('customer')->user()->profile_photo_path, 'https://'))
                                            <img id="imagemain" src="{{ Auth::guard('customer')->user()->profile_photo_path }}" alt="modernize-img">
                                            @else
                                            <img id="imagemain" src="{{ asset('assets/images/Users/' . Auth::guard('customer')->user()->profile_photo_path) }}" alt="modernize-img">
                                            @endif
                                            @else
                                            <img id="imagemain" src="{{ asset('assets/images/Users/defaultuser.png') }}" alt="modernize-img">
                                            @endif
                                        </div>
                                        <a href="#" class="btn btn-primary btn-sm position-absolute top-0 end-0 m-2" style="display: none;"><i class="ti ti-pencil"></i></a>
                                        <input type="file" onchange="readURL(this);" id="profileImageInput" name="myprofileimage" style="display: none;">
                                        <a href="#" class="btn btn-primary btn-sm position-absolute top-0 end-0 m-2" onclick="document.getElementById('profileImageInput').click();"><i class="ti ti-pencil"></i></a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h5 class="mb-0">{{$userdata->name}}</h5>
                                    <p class="mb-0">{{ucfirst($userdata->user_type)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <h4 class="mb-3">My Info</h4>
                                    <p class="card-subtitle">Hello, {{$userdata->name}}. Welcome to the Property Listing Management Panel. Here, you can manage all property details efficiently.</p>
                                    <div class="vstack gap-3 mt-4">
                                        <div class="hstack gap-6">
                                            <i class="ti ti-mail text-dark fs-6"></i>
                                            <h6 class=" mb-0">{{$userdata->email}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">More Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control" value="{{$userdata->name}}" name="name" id="input1">
                                                <span class="bar"></span>
                                                <label for="input1">Name</label>
                                            </div>
                                            <div class="form-group mb-4 mt-4">
                                                <input type="text" class="form-control" value="{{$userdata->email}}" name="email" id="input1">
                                                <span class="bar"></span>
                                                <label for="input1">Email Address</label>
                                            </div>
                                            <div class="form-group mb-4 mt-4">
                                                <input type="text" class="form-control" value="{{$userdata->mobile}}" name="mobile" id="input1">
                                                <span class="bar"></span>
                                                <label for="input1">Mobile</label>
                                            </div>
                                            @if($userdata->user_type == 'agent')
                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control" value="{{$userdata->company_name}}" name="companyname" id="input1">
                                                <span class="bar"></span>
                                                <label for="input1">Company Name</label>
                                            </div>
                                            <div class="form-group col-md-6 mb-4">
                                                <div for="input1" class="mb-1">Company Document</div>
                                                <input type="file" name="company_document" class="form-control" id="company_document">
                                            </div>
                                            @endif
                                        </div>
                                        @if($userdata->user_type == 'agent')
                                        <div class="col-md-6">
                                            <div class="mx-2">
                                                @if (pathinfo("assets/images/Users/{$userdata->company_document}", PATHINFO_EXTENSION) == 'pdf')
                                                <iframe src="{{ asset("assets/images/Users/{$userdata->company_document}") }}" class="img-fluid" frameborder="0"></iframe>
                                                @else
                                                <img src="{{ asset("assets/images/Users/{$userdata->company_document}") }}" class="rounded-3 img-fluid" alt="Document" style="max-height: 100px;">
                                                @endif
                                                <a href="{{ asset("assets/images/Users/{$userdata->company_document}") }}" class="btn btn-outline-primary mt-2" download>Download</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a href="">
                                            <button type="submit" class="btn rounded-pill waves-effect waves-light btn-success">
                                                Update Details
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('user.updatepassword') }}" class="floating-labels" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Change Password</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="oldpassword" id="input1">
                            <span class="bar"></span>
                            <label for="input1">Old Password</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <input type="password" id="passwordfield" class="form-control" name="newpassword">
                            <span class="bar"></span>
                            <label for="passwordfield">New Password</label>
                            <span id="togglePassword" class="position-absolute" style="right: 61px; top: 53%; transform: translateY(-50%); cursor: pointer;">
                                <i id="eyeIcon" class="ti ti-eye-off fs-5"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <input type="password" id="passwordfield2" class="form-control" name="confirmpassword">
                            <span class="bar"></span>
                            <label for="passwordfield2">Confirm Password</label>
                            <span id="togglePassword2" class="position-absolute" style="right: 61px; top: 53%; transform: translateY(-50%); cursor: pointer;">
                                <i id="eyeIcon2" class="ti ti-eye-off fs-5"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-end">
                            <a href="">
                                <button type="submit" class="btn rounded-pill waves-effect waves-light btn-success">
                                    Update Password
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.querySelector('.round-110').addEventListener('mouseover', function() {
            this.querySelector('.btn').style.display = 'block';
        });
        document.querySelector('.round-110').addEventListener('mouseout', function() {
            this.querySelector('.btn').style.display = 'none';
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
    <script>
        // Password show/hide functionality
        const togglePassword = document.querySelector("#togglePassword");
        const togglePassword2 = document.querySelector("#togglePassword2");

        const passwordField = document.querySelector("#passwordfield");
        const passwordField2 = document.querySelector("#passwordfield2");

        const eyeIcon = document.querySelector("#eyeIcon");
        const eyeIcon2 = document.querySelector("#eyeIcon2");

        // Toggle visibility for the first password field
        togglePassword.addEventListener("click", function() {
            // Toggle the input type
            const type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            // Toggle the eye icon class
            if (type === "password") {
                eyeIcon.classList.remove("ti-eye");
                eyeIcon.classList.add("ti-eye-off");
            } else {
                eyeIcon.classList.remove("ti-eye-off");
                eyeIcon.classList.add("ti-eye");
            }
        });

        // Toggle visibility for the second password field
        togglePassword2.addEventListener("click", function() {
            // Toggle the input type
            const type = passwordField2.type === "password" ? "text" : "password";
            passwordField2.type = type;

            // Toggle the eye icon class
            if (type === "password") {
                eyeIcon2.classList.remove("ti-eye");
                eyeIcon2.classList.add("ti-eye-off");
            } else {
                eyeIcon2.classList.remove("ti-eye-off");
                eyeIcon2.classList.add("ti-eye");
            }
        });

    </script>
</div>
@endsection
