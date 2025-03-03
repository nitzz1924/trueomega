@extends('auth.UserPanel.layouts.userauthmain')
@push('title')
<title>Sign In | User Panel</title>
@endpush
@section('auth-section')
<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
    <div class="position-relative z-index-5">
        <div class="row">
            <div class="col-xl-7 col-xxl-8" style="background-image: url('{{asset('assets/images/aviationlogin.jpg')}}'); background-size: cover; background-position: left;">
            </div>
            <div class="col-xl-5 col-xxl-4">
                <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                    <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/images/omegafinallogo.png')}}" class="rounded-pill" alt="" height="100px" width="100px">
                        </div>
                        <div class="mt-3">
                            <h2 class="mb-1 fs-7 fw-bolder">Welcome to Truomega Tech </h2>
                            <p class="mb-7 text-center">Your User Dashboard</p>
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
                            <form action="{{ route('user.loginuser') }}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="d-flex align-items-center justify-content-end mb-4">
                                    <a class="text-primary fw-medium fs-2" href="#">Forgot Password ?</a>
                                </div>
                                 <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">New to Truomega?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{route('user.userregistration')}}">Create an
                                        account</a>
                                </div>
                            </form>
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
