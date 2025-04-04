{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','My Cart | '. env('APP_NAME'))
@section('content')
<div class="container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li class="active">
            <a href="cart.html">Shopping Cart</a>
        </li>
        <li>
            <a href="checkout.html">Checkout</a>
        </li>
        <li class="disabled">
            <a href="cart.html">Order Complete</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <form action="#" method="POST">
                    @csrf
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="thumbnail-col"></th>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Quantity</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mycartproducts as $data)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="{{route('website.productdetails',['id'=>$data->id])}}" class="product-image">
                                            <img src="{{asset('assets/images/Products/'.$data->productimage)}}" alt="product">
                                        </a>

                                        <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td class="product-col">
                                    <h5 class="product-title">
                                        <a href="{{route('website.productdetails',['id'=>$data->id])}}">{{$data->productname}}</a>
                                    </h5>
                                </td>
                                <td>₹ {{ $data->price }} /-</td>
                                <td>
                                    <div class="input-group">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="btn btn-outline-dark p-3 border border-secondary decrease-btn" type="button" id="decrease">−</button>
                                            <input type="text" class="quantity-input text-black py-2 form-control border border-secondary text-center mb-0 bg-transparent" id="numberInput" value="{{$data->quantity}}" readonly style="width: 60px; height: 42px;">
                                            <button class="btn btn-outline-dark p-3 border border-secondary increase-btn" type="button" id="increase">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><span class="subtotal-price">₹ {{$data->price * $data->quantity}}/-</span></td>    
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-shop btn-update-cart">
                                            Update Cart
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3>CART TOTALS</h3>

                <table class="table table-totals">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>$17.90</td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-left">
                                <h4>Shipping</h4>

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="radio" checked>
                                        <label class="custom-control-label">Local pickup</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-custom-control mb-0">
                                    <div class="custom-control custom-radio mb-0">
                                        <input type="radio" name="radio" class="custom-control-input">
                                        <label class="custom-control-label">Flat rate</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Shipping to <strong>NY.</strong></label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="USA">United States (US)</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="NY">New York</option>
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <input type="text" class="form-control form-control-sm" placeholder="Town / City">
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <input type="text" class="form-control form-control-sm" placeholder="ZIP">
                                    </div><!-- End .form-group -->

                                    <button type="submit" class="btn btn-shop btn-update-total">
                                        Update Totals
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>$17.90</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <a href="cart.html" class="btn btn-block btn-dark">Proceed to Checkout
                        <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(".increase-btn, .decrease-btn").click(function () {
            var row = $(this).closest("tr"); // Find the closest row
            var quantityInput = row.find(".quantity-input"); // Quantity input
            var subtotalElement = row.find(".subtotal-price"); // Subtotal price element
            var unitPrice = parseFloat(subtotalElement.data("price")); // Get unit price from data attribute
            var quantity = parseInt(quantityInput.val());

            // Check if the increase or decrease button was clicked
            if ($(this).hasClass("increase-btn")) {
                quantity += 1;
            } else if ($(this).hasClass("decrease-btn") && quantity > 1) {
                quantity -= 1;
            }

            // Update quantity input field
            quantityInput.val(quantity);

            // Update subtotal price dynamically
            var newSubtotal = quantity;
        });
    });
</script>

@endsection
