{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Change Password')
@section('content')
<div class="py-5" style="background-image: url('{{asset('websiteAssets/images/post-3.jpg')}}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="property-single-content">
                    <div class="about-property wow" data-wow-delay="0.75s">
                        <div class="property-single-subtitle text-center">
                            <h3 class="mb-3 loginhead">Your Trusted Partner in Real Estate</h3>
                            <p>Enter your new Password for Email : <strong class="text-black">{{$decrypedmail}}</strong></p>
                        </div>
                        <div class="property-inquiry-box wow" data-wow-delay="0.5s">
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
                            <div class="property-inquiry-form">
                                <form id="" action="{{ route('website.updatePassword')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-4">
                                            <div class="">
                                                <label for="password" class="form-label mb-0">Password</label>
                                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password" required>
                                            </div>
                                            <input type="hidden" name="email" value="{{$decrypedmail}}">
                                        </div>
                                        <div class="form-group col-md-12 mb-4">
                                            <div class="">
                                                <label for="password" class="form-label mb-0">Confirm Password</label>
                                                <input type="password" name="confirmpassword" class="form-control form-control-lg" id="confirmpass" placeholder="Confirm your password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn-default btn-lg w-100">Update Password</button>
                                        </div>
                                    </div>
                                </form>
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
