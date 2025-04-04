{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','My Cart | '. env('APP_NAME'))
@section('content')
<div class="container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li class="active">
            <a href="{{route('website.mycart')}}">Shopping Cart</a>
        </li>
        <li>
            <a href="{{route('website.checkout')}}">Checkout</a>
        </li>
        <li class="disabled">
            <a href="cart.html">Order Complete</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                @if($mycartproducts->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                    <p class="text-center text-muted">No products are added in the cart yet.</p>
                </div>
                <div class="mt-4 d-flex justify-content-center align-items-center ms-2">
                    <a href="{{ route('website.homepage') }}" class="btn btn-primary">Go to Home</a>
                    <a href="{{ route('website.shop') }}" class="btn btn-secondary">Go to Shop</a>
                </div>
                @else
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
                                        <a href="#" class="btn-remove icon-cancel removeFromCart" title="Remove Product"></a>
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
                                            <button data-quantityid="{{ $data->id }}" class="btn btn-outline-dark p-3 border border-secondary decrease-btn" type="button" id="decrease">−</button>
                                            <input type="text" class="quantity-input text-black py-2 form-control border border-secondary text-center mb-0 bg-transparent" id="numberInput" value="{{$data->quantity}}" readonly style="width: 60px; height: 42px;">
                                            <button data-quantityid="{{ $data->id }}" class="btn btn-outline-dark p-3 border border-secondary increase-btn" type="button" id="increase">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><span class="subtotal-price" data-price="{{$data->price}}">₹ {{$data->price * $data->quantity}}/-</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3>CART TOTALS</h3>

                <table class="table table-totals">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right"><strong class="grand-total"></strong></td>
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
                            </td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td class="text-right"><strong class="grand-total"></strong></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <a href="{{route('website.checkout')}}" class="btn btn-block btn-dark">Proceed to Checkout
                        <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        function updateGrandTotal() {
            var grandTotal = 0;

            $(".subtotal-price").each(function() {
                var subtotal = parseFloat($(this).text().replace(/[^0-9.-]+/g, "")); // Extract numeric value
                grandTotal += subtotal;
            });

            // Update the Grand Total in the respective <td>
            $(".grand-total").text(`₹ ${grandTotal}/-`);
        }

        $(".increase-btn, .decrease-btn").click(function() {
            var row = $(this).closest("tr");
            var quantityInput = row.find(".quantity-input");
            var subtotalElement = row.find(".subtotal-price");
            var unitPrice = parseFloat(subtotalElement.data("price"));
            var quantity = parseInt(quantityInput.val());
            var buttonid = $(this).data("quantityid");

            if ($(this).hasClass("increase-btn")) {
                quantity += 1;
            } else if ($(this).hasClass("decrease-btn") && quantity > 1) {
                quantity -= 1;
            }
            quantityInput.val(quantity);
            var newSubtotal = unitPrice * quantity;
            subtotalElement.text(`₹ ${newSubtotal}/-`);

            // Update the grand total
            updateGrandTotal();

            // Update the Quantity in the database
            $.ajax({
                url: "{{ route('website.updateQuantity') }}"
                , method: "POST"
                , data: {
                    _token: "{{ csrf_token() }}"
                    , cartid: buttonid
                    , quantity: quantity
                , }
                , success: function(response) {
                    if (response.success) {
                        updateGrandTotal();
                    } else {
                        alert("failed to update the quantity");
                    }
                }
                , error: function() {
                    alert("error occurred");
                }
            });


        });


        //Remove Product from Cart
        $(".removeFromCart").click(function(e) {
            e.preventDefault();
            var row = $(this).closest("tr");
            var productId = row.find(".product-image-container a").attr("href").split('/').pop();
            $.ajax({
                url: "{{ route('website.removeFromCart') }}"
                , method: "POST"
                , data: {
                    _token: "{{ csrf_token() }}"
                    , cartid: productId
                }
                , success: function(response) {
                    if (response.success) {
                        row.remove();
                        updateGrandTotal();
                    } else {
                        alert("Failed to remove the product from the cart.");
                    }
                }
                , error: function() {
                    alert("An error occurred while removing the product.");
                }
            });
        });

        // Initial Grand Total Calculation
        updateGrandTotal();
    });

</script>

@endsection
