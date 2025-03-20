{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Contact Us | '. env('APP_NAME'))
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="demo4.html"><i class="icon-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Contact Us
            </li>
        </ol>
    </div>
</nav>
<div class="container-fluid">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.3544003150832!2d77.15845366202625!3d28.498983225636547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1e433e6ab3a5%3A0x1386cfe6a066843f!2sSultanpur%20Metro%20Station!5e0!3m2!1sen!2sin!4v1742457140781!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="container contact-us-container mt-4">
    <div class="contact-info">
        <div class="row">
            <div class="col-12">
                <h2 class="ls-n-25 m-b-1">
                    Contact Info
                </h2>

                <p>
                    We’re Here to Help! Whether you have a question, need support, or want to discuss a project, our team is here to assist you.
                </p>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="feature-box text-center">
                    <i class="sicon-location-pin"></i>
                    <div class="feature-box-content">
                        <h3>Address</h3>
                        <h5>Near Sultanpur Metro Station, New Delhi, Delhi</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature-box text-center">
                    <i class="fa fa-mobile-alt"></i>
                    <div class="feature-box-content">
                        <h3>Phone Number</h3>
                        <h5>(91) 8302389039</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature-box text-center">
                    <i class="far fa-envelope"></i>
                    <div class="feature-box-content">
                        <h3>E-mail Address</h3>
                        <h5><a href="#" class="" data-cfemail="86f6e9f4f2e9c6f6e9f4f2e9f2eee3ebe3a8e5e9eb">info@truomega.in</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature-box text-center">
                    <i class="far fa-calendar-alt"></i>
                    <div class="feature-box-content">
                        <h3>Working Days/Hours</h3>
                        <h5>Mon - Sun / 9:00AM - 8:00PM</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h2 class="mt-6 mb-2">Send Us a Message</h2>

            <form class="mb-0" action="#">
                <div class="form-group">
                    <label class="mb-1" for="contact-name">Your Name
                        <span class="required">*</span></label>
                    <input type="text" class="form-control" id="contact-name" name="contact-name" required />
                </div>

                <div class="form-group">
                    <label class="mb-1" for="contact-email">Your E-mail
                        <span class="required">*</span></label>
                    <input type="email" class="form-control" id="contact-email" name="contact-email" required />
                </div>

                <div class="form-group">
                    <label class="mb-1" for="contact-message">Your Message
                        <span class="required">*</span></label>
                    <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                </div>

                <div class="form-footer mb-0">
                    <button type="submit" class="btn btn-dark font-weight-normal">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            <h2 class="mt-6 mb-1">Frequently Asked Questions</h2>
            <div id="accordion">
                <div class="card card-accordion">
                    <a class="card-header" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Are your products OEM-certified?
                    </a>

                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <p>Yes, all our products are OEM-certified to ensure the highest quality and compliance with aviation industry standards.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        Do you provide bulk orders for aviation consumables?
                    </a>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <p>Absolutely! We specialize in catering to bulk requirements for airlines, maintenance facilities, and other aviation industry sectors.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      What industries do you serve?
                    </a>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <p>We primarily serve the aviation industry, including airlines, MRO (Maintenance, Repair, and Overhaul) facilities, and aerospace manufacturers across India.</p>
                    </div>
                </div>

                <div class="card card-accordion">
                    <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
                        How can I place an order with Truomega?
                    </a>

                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <p>You can place an order by contacting our sales team via email at sales@truomega.com or calling us at +91 98765 43210. Our team will guide you through the process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-8"></div>
@endsection
