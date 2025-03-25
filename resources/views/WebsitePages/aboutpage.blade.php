{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','About Us | '. env('APP_NAME'))
@section('content')
<div class="page-header page-header-bg text-left" style="background: 50%/cover #D4E1EA url('website-assets/images/page-header-bg.jpg');">
    <div class="container">
        <h1><span>ABOUT US</span>
            OUR COMPANY</h1>
        <a href="{{route('website.contactpage')}}" class="btn btn-dark">Contact</a>
    </div>
</div>
<div class="about-section">
    <div class="container">
        <h1 class="">Truomega Tech Private Limited</h1>
        <p class="text-black fs-2">Welcome to Truomega, a leading supplier and distributor of aviation products and consumables across India. With a commitment to quality and reliability, we specialize in OEM-certified consumables and expendables essential for the aviation industry.</p>

        <p class="text-black fs-2">Our extensive product range includes chemicals, paints, coatings, fasteners, seals, electrical parts, and much more. We pride ourselves on delivering top-notch products that meet the stringent requirements of the aerospace sector.</p>

        <p class="text-black fs-2">At Truomega, we are dedicated to providing exceptional customer service and support, ensuring our clients have access to the highest quality products to keep their operations running smoothly.</p>

        <p class="lead">Discover the difference with Truomega – your trusted partner in aviation excellence.</p>
    </div>
</div>

<div class="features-section bg-gray">
    <div class="container">
        <h2 class="subtitle">WHY CHOOSE US</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="feature-box bg-white">

                    <div class="feature-box-content p-0">
                        <h3>OEM-Certified Products</h3>
                        <p>We provide only OEM-certified aviation consumables and expendables, ensuring the highest quality and compliance with industry standards.</p>
                    </div><!-- End .feature-box-content -->
                </div><!-- End .feature-box -->
            </div><!-- End .col-lg-4 -->

            <div class="col-lg-4">
                <div class="feature-box bg-white">

                    <div class="feature-box-content p-0">
                        <h3>Extensive Product Range</h3>
                        <p>From chemicals and coatings to fasteners and electrical parts, we offer a comprehensive selection of aviation products to meet your needs.</p>
                    </div><!-- End .feature-box-content -->
                </div><!-- End .feature-box -->
            </div><!-- End .col-lg-4 -->

            <div class="col-lg-4">
                <div class="feature-box bg-white">

                    <div class="feature-box-content p-0">
                        <h3>Reliable Customer Support</h3>
                        <p>Our dedicated support team ensures prompt assistance, helping you keep your aviation operations running efficiently and without delays.</p>
                    </div><!-- End .feature-box-content -->
                </div><!-- End .feature-box -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>


<div class="testimonials-section">
    <div class="container">
        <h2 class="subtitle text-center">HAPPY CLIENTS</h2>

        <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
                        'margin': 20,
                        'lazyLoad': true,
                        'autoHeight': true,
                        'dots': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '992': {
                                'items': 2
                            }
                        }
                    }">
            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{asset('website-assets/images/clients/client1.png')}}" alt="client">
                    </figure>

                    <div>
                        <strong class="testimonial-title">John Smith</strong>
                        <span>SMARTWAVE CEO</span>
                    </div>
                </div>

                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                        dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                </blockquote>
            </div>

            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{asset('website-assets/images/clients/client2.png')}}" alt="client">
                    </figure>

                    <div>
                        <strong class="testimonial-title">Bob Smith</strong>
                        <span>SMARTWAVE CEO</span>
                    </div>
                </div>

                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                        dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                </blockquote>
            </div>

            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{asset('website-assets/images/clients/client1.png')}}" alt="client">
                    </figure>

                    <div>
                        <strong class="testimonial-title">John Smith</strong>
                        <span>SMARTWAVE CEO</span>
                    </div>
                </div>

                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                        dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="counters-section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4 count-container">
                <div class="count-wrapper">
                    <span class="count-to" data-from="0" data-to="500" data-speed="2000" data-refresh-interval="50">500</span>+
                </div><!-- End .count-wrapper -->
                <h4 class="count-title">SATISFIED CLIENTS</h4>
            </div><!-- End .col-md-4 -->

            <div class="col-6 col-md-4 count-container">
                <div class="count-wrapper">
                    <span class="count-to" data-from="0" data-to="1500" data-speed="2000" data-refresh-interval="50">1500</span>+
                </div><!-- End .count-wrapper -->
                <h4 class="count-title">PRODUCTS DELIVERED</h4>
            </div><!-- End .col-md-4 -->

            <div class="col-6 col-md-4 count-container">
                <div class="count-wrapper line-height-1">
                    <span class="count-to" data-from="0" data-to="24" data-speed="2000" data-refresh-interval="50">24</span><span>HR</span>
                </div><!-- End .count-wrapper -->
                <h4 class="count-title">CUSTOMER SUPPORT</h4>
            </div><!-- End .col-md-4 -->

            <div class="col-6 col-md-4 count-container">
                <div class="count-wrapper">
                    <span class="count-to" data-from="0" data-to="300" data-speed="2000" data-refresh-interval="50">300</span>+
                </div><!-- End .count-wrapper -->
                <h4 class="count-title">AVIATION PARTNERS</h4>
            </div><!-- End .col-md-4 -->

            <div class="col-6 col-md-4 count-container">
                <div class="count-wrapper line-height-1">
                    <span class="count-to" data-from="0" data-to="99" data-speed="2000" data-refresh-interval="50">99</span><span>%</span>
                </div><!-- End .count-wrapper -->
                <h4 class="count-title">ON-TIME DELIVERY</h4>
            </div><!-- End .col-md-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>

{{-- {{asset('website-assets/images/omegafinallogo.png')}}

follow this structure in src dont change anything just follow this structure and keep paths same and remove comments --}}
@endsection
