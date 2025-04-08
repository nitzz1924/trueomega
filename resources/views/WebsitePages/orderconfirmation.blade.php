{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Thank You!! | '. env('APP_NAME'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 confirmation-card d-md-flex justify-content-between">

            <!-- Left Column: Thank You -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="fw-bold">Thank you for your purchase!</h2>
                <p class="text-muted">Your order will be processed within 24 hours. We’ll notify you via email when it ships.</p>

                <h5 class="mt-4">Billing Address</h5>
                <ul class="list-unstyled">
                    <li><strong>Name:</strong> Jane Smith</li>
                    <li><strong>Address:</strong> 634 Cole St #643, San Francisco, CA 94117, United States</li>
                    <li><strong>Phone:</strong> +1 415-555-1134</li>
                    <li><strong>Email:</strong> jane.smith@email.com</li>
                </ul>

                <a href="{{url('/')}}" class="btn btn-danger mt-3">Go To Home</a>
            </div>

            <!-- Right Column: Receipt -->
            <div class="col-md-5 receipt">
                <h5 class="fw-bold mb-3">Order Summary</h5>
                <div class="d-flex justify-content-between text-muted mb-2">
                    <span>Date:</span><span>03 May 2023</span>
                </div>
                <div class="d-flex justify-content-between text-muted mb-2">
                    <span>Order Number:</span><span>124-11247802</span>
                </div>
                <div class="d-flex justify-content-between text-muted mb-4">
                    <span>Payment Method:</span><span>Mastercard</span>
                </div>

                <!-- Product 1 -->
                <div class="d-flex align-items-center mb-3">
                    <img src="https://via.placeholder.com/50" alt="Product 1" class="product-img me-3">
                    <div class="flex-grow-1">
                        <div><strong>All In One Chocolate Cookies</strong></div>
                        <small class="text-muted">Pack of 3</small>
                    </div>
                    <span>$99.00</span>
                </div>

                <!-- Product 2 -->
                <div class="d-flex align-items-center mb-3">
                    <img src="https://via.placeholder.com/50" alt="Product 2" class="product-img me-3">
                    <div class="flex-grow-1">
                        <div><strong>Order Of Hearts</strong></div>
                        <small class="text-muted">Pack of 2</small>
                    </div>
                    <span>$199.00</span>
                </div>

                <!-- Totals -->
                <hr>
                <div class="d-flex justify-content-between mb-1"><span>Sub Total</span><span>$298.00</span></div>
                <div class="d-flex justify-content-between mb-1"><span>Shipping</span><span>$9.00</span></div>
                <div class="d-flex justify-content-between mb-3"><span>Tax</span><span>$30.00</span></div>
                <h5 class="d-flex justify-content-between"><span>Order Total</span><span>$337.00</span></h5>
            </div>

        </div>
    </div>
</div>
@endsection
