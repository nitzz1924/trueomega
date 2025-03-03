@extends('auth.UserPanel.layouts.userauthmain')
@push('title')
<title>Sign In | User Panel</title>
@endpush
@section('auth-section')
<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
    <div class="position-relative z-index-5">
        <div class="row">
            <div class="col-xl-7 col-xxl-8" style="background-image: url('{{asset('assets/images/registration.jpg')}}'); background-size: cover; background-position: left;">
            </div>
            <div class="col-xl-5 col-xxl-4">
                <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                    <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/images/omegafinallogo.png')}}" class="rounded-pill" alt="" height="100px" width="100px">
                        </div>
                        <div class="mt-3">
                            <h2 class="mb-1 fs-5 fw-bolder text-center">Register Yourself with Truomega Tech</h2>
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
                            <div class="mt-4">
                                <form action="{{ route('user.registeruser') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" placeholder="Enter your Name" class="form-control" id="exampleInputtext" aria-describedby="textHelp" name="fullname">
                                        @error('fullname')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" placeholder="Enter your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                        <input type="text" placeholder="Enter your Phone Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mobile">
                                    </div>
                                    @error('mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Sponser ID</label>
                                        <input type="text" placeholder="Enter your Sponser ID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sponserid">
                                    </div>
                                    @error('sponserid')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" placeholder="Enter your Passoword" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                                </form>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-3 mb-0 text-dark">Already have an Account? <a class="text-primary text-docoration-underline ms-1" href="{{ route('user.userloginpage')}}">Sign In</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 3000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 3000);

</script>
@endsection
