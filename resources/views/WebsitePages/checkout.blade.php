{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Checkout | '. env('APP_NAME'))
@section('content')
<div class="container checkout-container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li>
            <a href="{{route('website.mycart')}}">Shopping Cart</a>
        </li>
        <li class="active">
            <a href="{{route('website.checkout')}}">Checkout</a>
        </li>
        <li class="disabled">
            <a href="#">Order Complete</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-7">
            <ul class="checkout-steps">
                <li>
                    <h2 class="step-title">Billing details</h2>
                    <form action="#" id="billing-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="b-first-name" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="b-last-name" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company name (optional)</label>
                            <input type="text" name="b-company-name" class="form-control" />
                        </div>

                        <div class="select-custom">
                            <label>Country / Region
                                <abbr class="required" title="required">*</abbr></label>
                            <select name="b-country" class="form-control">
                                <option value="" selected="selected">--select-country</option>
                                @foreach ($countries as $name)
                                <option value="{{$name}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-1 pb-2">
                            <label>Street address
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="b-street-address" class="form-control" placeholder="House number and street name" required />
                        </div>

                        <div class="form-group">
                            <input type="text" name="b-apartment" class="form-control" placeholder="Apartment, suite, unite, etc. (optional)" required />
                        </div>

                        <div class="form-group">
                            <label>Town / City
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="b-city" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>State
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="b-state" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Postcode / Zip
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="b-postcode" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Phone <abbr class="required" title="required">*</abbr></label>
                            <input type="tel" name="b-phone" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Email address
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="email" name="b-email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="order-comments">Order notes (optional)</label>
                            <textarea name="b-order-notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                        </div>
                    </form>


                    <div class="form-group">
                        <div class="custom-control custom-checkbox mt-0">
                            <input type="checkbox" class="custom-control-input" id="different-shipping" />
                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping">Ship to a
                                different
                                address?</label>
                        </div>
                    </div>

                    <div id="collapseFour" class="collapse">
                        <form action="#" id="shipping-form">
                            <div class="shipping-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name="s-first-name" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name="s-last-name" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="s-company-name" class="form-control">
                                </div>

                                <div class="select-custom">
                                    <label>Country / Region <span class="required">*</span></label>
                                    <select name="s-country" class="form-control">
                                        <option value="" selected="selected">--select-country</option>
                                        @foreach ($countries as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-1 pb-2">
                                    <label>Street address <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="s-street-address" class="form-control" placeholder="House number and street name" required />
                                </div>

                                <div class="form-group">
                                    <input type="text" name="s-apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" required />
                                </div>

                                <div class="form-group">
                                    <label>State
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="s-state" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="s-city" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="s-postcode" class="form-control" required />
                                </div>


                                <div class="form-group">
                                    <label class="order-comments">Order notes (optional)</label>
                                    <textarea name="s-order-notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                </li>
            </ul>
        </div>

        <div class="col-lg-5">
            <form action="">
                <div class="order-summary">
                    <h3>YOUR ORDER</h3>

                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2">Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mycartproducts as $data)
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        {{$data->productname}} ×
                                        <span class="product-qty">{{$data->quantity}}</span>
                                    </h3>
                                </td>

                                <td class="price-col">
                                    <span>₹ {{ $data->price * $data->quantity }} /-</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td>
                                    <h4>Subtotal</h4>
                                </td>

                                <td class="price-col">
                                    <span>₹ {{ $mycartproducts->sum(fn($data) => $data->price * $data->quantity) }} /-</span>
                                </td>
                            </tr>
                            <tr class="order-shipping">
                                <td class="text-left" colspan="2">
                                    <h4 class="m-b-sm">Shipping</h4>

                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio d-flex">
                                            <input type="radio" class="custom-control-input" name="radio" checked />
                                            <label class="custom-control-label">Local Pickup</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-custom-control mb-0">
                                        <div class="custom-control custom-radio d-flex mb-0">
                                            <input type="radio" name="radio" class="custom-control-input">
                                            <label class="custom-control-label">Flat Rate</label>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <tr class="order-total">
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <b class="total-price"><span>₹ {{ $mycartproducts->sum(fn($data) => $data->price * $data->quantity) }} /-</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    {{-- <div class="payment-methods">
                    <h4 class="">Payment methods</h4>
                    <div class="info-box with-icon p-0">
                        <p>
                            Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.
                        </p>
                    </div>
                </div> --}}
                    <input type="hidden" name="grandtotal" value="{{ $mycartproducts->sum(fn($data) => $data->price * $data->quantity) }}">
                    <button type="button" id="submitAllForms" class="btn btn-dark btn-place-order">
                        Place order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        const products = {{ Js::from($mycartproducts) }};
        console.log("Products in JSON format:", JSON.stringify(products, null, 2));

        $("#submitAllForms").click(function(event) {
            event.preventDefault();
            const combinedFormData = new FormData();
            const forms = document.querySelectorAll("form");
            forms.forEach(form => {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                    combinedFormData.append(key, value);
                }
            });

            // Add products to the combined form data
            combinedFormData.append('products', JSON.stringify(products));

            // Log the combined form data to the console
            for (let [key, value] of combinedFormData.entries()) {
                console.log(key, value);
            }

            $.ajax({
                url: '/completeCheckout',
                method: 'POST',
                data: combinedFormData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log("%cRaw response:", "background: black; color: green; font-size: 14px;", data);
                    try {
                        if (data.success) {
                            window.location.href = "/confirm-order";
                        } else {
                            alert(data.message || "An error occurred while processing your request.");
                        }
                    } catch (e) {
                        console.error("Failed to parse response:", e);
                        alert("The response from the server is not valid JSON.");
                    }
                }
            });
        });
    });
</script>
@endsection
