{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Home | '. env('APP_NAME'))
@section('content')

{{-- This is Main Slider Component --}}
<x-home-slider />

{{-- This is Offer Slider Component --}}
<x-offer-slider />

{{-- This is Featured Products Component --}}
<x-featured-products />

{{-- This is New Arrivals Component --}}
<x-new-arrivals />

<section class="feature-boxes-container">
    <div class="container appear-animate" data-animation-name="fadeInUpShorter">
        <d<div class="row">
            <div class="col-md-4">
                <div class="feature-box px-sm-5 feature-box-simple text-center">
                    <div class="feature-box-icon">
                        <i class="icon-headset"></i>
                    </div>

                    <div class="feature-box-content p-0">
                        <h3>Dedicated Support</h3>
                        <h5>Expert Assistance, Anytime</h5>

                        <p>Our team is always ready to assist with your aviation needs. From product inquiries to technical support, we ensure seamless service.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box px-sm-5 feature-box-simple text-center">
                    <div class="feature-box-icon">
                        <i class="icon-wrench"></i>
                    </div>

                    <div class="feature-box-content p-0">
                        <h3>Quality Assurance</h3>
                        <h5>OEM-Certified Products</h5>

                        <p>We supply only high-quality, OEM-approved consumables and expendables, ensuring safety and reliability in aviation operations.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box px-sm-5 feature-box-simple text-center">
                    <div class="feature-box-icon">
                        <i class="icon-plane"></i>
                    </div>

                    <div class="feature-box-content p-0">
                        <h3>Fast & Reliable Delivery</h3>
                        <h5>Efficiency You Can Trust</h5>

                        <p>With a robust supply chain, we ensure timely delivery of aviation products, keeping your operations running without delays.</p>
                    </div>
                </div>
            </div>
    </div>

    </div>
</section>


<section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="{{asset('assets/images/Media/'.$websitedata->secondofferimage)}}">
    <div class="promo-banner banner container text-uppercase">
        <div class="banner-content row align-items-center text-center">
            <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                <h2 class="mb-md-0 text-black">Premium Aviation <br> Supplies</h2>
            </div>
            <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                <a href="{{route('website.shop')}}" class="btn btn-dark btn-black ls-10">Explore Now</a>
            </div>
            <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                    <b>Exclusive Offers</b>
                </h4>
                <h5 class="mb-1 coupon-sale-text text-black ls-10 p-0"><i class="ls-0">SAVE UP TO</i><b class="text-black bg-secondary ls-n-10">15%</b> ON BULK ORDERS</h5>
            </div>
        </div>
    </div>
</section>


{{-- This is Blogs Component --}}
<x-blogs />
@endsection
