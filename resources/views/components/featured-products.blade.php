<section class="featured-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>
        <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{'dots': false,'nav':true}">
            @foreach ($products as $row)
            <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                <figure>
                    <a href="{{route('website.productdetails',['id'=>$row->id])}}">
                        <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="280" height="280" alt="product">
                        <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="280" height="280" alt="product">
                    </a>
                    <div class="label-group">
                        <div class="product-label label-hot">HOT</div>
                        <div class="product-label label-sale">-20%</div>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="category-list">
                        <a href="#" class="product-category">{{$row->category}}</a>
                    </div>
                    <h3 class="product-title">
                        <a href="{{route('website.productdetails',['id'=>$row->id])}}">{{$row->productname}}</a>
                    </h3>
                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:80%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                    </div>
                    <div class="price-box">
                        <del class="old-price">₹ {{$row->regularprice}} /-</del>
                        <span class="product-price">₹ {{$row->saleprice}} /-</span>
                    </div>
                    <div class="product-action">
                        @if(Auth::guard('customer')->check())
                        <a href="" class="btn-icon btn-add-cart product-type-simple addtoCartbtn" data-product='@json($row)'><i class="icon-shopping-cart"></i>ADD TO CART</a>
                        @else
                        <a href="javascript:void(0)" class="btn-icon btn-add-cart disabled" data-toggle="tooltip" title="You need to login first"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                        @endif
                        <a href="{{route('website.productdetails',['id'=>$row->id])}}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- Add to Cart --}}
        <script>
            $(document).ready(function() {
                $(document).on('click', '.addtoCartbtn', function(e) {
                    e.preventDefault();
                    var productdata = $(this).data('product');
                     if (typeof productdata === "string") {
                        productdata = JSON.parse(productdata);
                    }
                    console.log(productdata);
                    var _token = "{{ csrf_token() }}";

                    $.ajax({
                        url: "{{ route('website.addtocart') }}" ,
                        type: "POST",
                         data: {
                            productid: productdata.id,
                            productname: productdata.productname,
                            productimage: productdata.thumbnailImages,
                            price: productdata.saleprice,
                            quantity: 1,
                            _token: _token
                        },
                        success: function(response) {
                            console.log(response);
                            $('#cartCount').html(response.count);
                            $('#cartTotal').html(response.total);
                            Toastify({
                                node: createCustomToast(productdata),
                                duration: 4000,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                stopOnFocus: true,
                                style: {
                                    background: "#fff",
                                    borderRadius: "8px",
                                    boxShadow: "0px 0px 10px rgba(0, 0, 0, 0.1)",
                                    padding: "20px",
                                    minWidth: "280px"
                                }
                            }).showToast();
                        }
                    });
                });
                    // Function to create custom toast HTML structure
                        function createCustomToast(product) {
                            let toast = document.createElement("div");
                            toast.innerHTML = `
                                <div style="display: flex; align-items: center;">
                                    <img src="assets/images/Products/${product.thumbnailImages}" alt="${product.productname}" 
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
                                    <div>
                                        <strong style="color: #333;">${product.productname}</strong>
                                        <p style="margin: 0; font-size: 14px; color: #777;">has been added to your cart.</p>
                                    </div>
                                </div>
                                <div style="margin-top: 10px; display: flex; justify-content: center;">
                                    <a href="cart.html" class="btn btn-dark viewcart btn-sm" style="margin-right: 10px;">View Cart</a>
                                    <a href="checkout.html" class="btn btn-dark checkout btn-sm">Checkout</a>
                                </div>
                            `;
                            return toast;
                        }
            });

        </script>
</section>
