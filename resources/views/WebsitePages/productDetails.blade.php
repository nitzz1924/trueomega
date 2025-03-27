{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title',$productdata->productname.' | '. env('APP_NAME'))
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
        </ol>
    </nav>

    <div class="product-single-container product-single-default">
        <div class="cart-message d-none">
            <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
            <span>has been added to your cart.</span>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-6 product-single-gallery">
                <div class="product-slider-container">
                    <div class="label-group">
                        <div class="product-label label-hot">HOT</div>

                        <div class="product-label label-sale">
                            -16%
                        </div>
                    </div>

                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                        @foreach (json_decode($productdata->galleryImages) as $main)
                        <div class="product-item">
                            <img class="product-single-image" src="{{asset('assets/images/Products/'.$main)}}" data-zoom-image="{{asset('assets/images/Products/'.$main)}}" width="468" height="468" alt="product" />
                        </div>
                        @endforeach
                    </div>
                    <!-- End .product-single-carousel -->
                    <span class="prod-full-screen">
                        <i class="icon-plus"></i>
                    </span>
                </div>

                <div class="prod-thumbnail owl-dots">
                    @foreach (json_decode($productdata->galleryImages) as $maintwo)
                    <div class="owl-dot">
                        <img src="{{asset('assets/images/Products/'.$maintwo)}}" width="110" height="110" alt="product-thumbnail" />
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-7 col-md-6 product-single-details">
                <h1 class="product-title">{{$productdata->productname}}</h1>

                <div class="ratings-container">
                    <div class="product-ratings">
                        <span class="ratings" style="width:60%"></span>
                        <!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                    </div>

                    <a href="#" class="rating-link">( 6 Reviews )</a>
                </div>

                <hr class="short-divider">

                <div class="price-box">
                    <span class="old-price">₹ {{$productdata->regularprice}}/-</span>
                    <span class="new-price">₹ {{$productdata->saleprice}}/-</span>
                </div>

                <div class="product-desc">
                    <p>
                        {{$productdata->description}}
                    </p>
                </div>

                <ul class="single-info-list">
                    <li>
                        CATEGORY: <strong><a href="#" class="product-category">{{$productdata->category}}</a></strong>
                    </li>
                </ul>

                <div class="product-action">
                    <div class="product-single-qty">
                        <input class="horizontal-quantity form-control" type="text">
                    </div>
                    <!-- End .product-single-qty -->

                    <a href="javascript:;" class="btn btn-dark add-cart mr-2 addtoCartbtn" data-product="{{$productdata}}" title="Add to Cart">Add to
                        Cart</a>
                </div>
                <!-- End .product-action -->

                <hr class="divider mb-0 mt-0">

                <div class="product-single-share mb-3">
                    <label class="sr-only">Share:</label>

                    <div class="social-icons mr-2">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End .product-single-container -->

    <div class="product-single-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                    Information</a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews ({{$productreviewscnt}})</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                <div class="product-desc-content">
                    <p> {{$productdata->description}}</p>
                </div>
            </div>

            {{-- <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                <table class="table table-striped mt-2">
                    <tbody>
                        <tr>
                            <th>Weight</th>
                            <td>23 kg</td>
                        </tr>

                        <tr>
                            <th>Dimensions</th>
                            <td>12 × 24 × 35 cm</td>
                        </tr>

                        <tr>
                            <th>Color</th>
                            <td>Black, Green, Indigo</td>
                        </tr>

                        <tr>
                            <th>Size</th>
                            <td>Large, Medium, Small</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}

            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                <div class="product-reviews-content">

                    <div class="comment-list">
                        <div class="comments">
                            @if ($productreviews->isNotEmpty())
                            @foreach ($productreviews as $review)
                            <div class="comment-block mt-1">
                                <div class="comment-header">
                                    <div class="comment-arrow"></div>
                                    <div class="ratings-container float-sm-right">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: {{ ($review->rating / 5) * 100 }}%">★★★★★</span> <!-- Filled stars -->
                                        </div>
                                    </div>
                                    <span class="comment-by">
                                        <strong>{{ $review->name }}</strong> – {{ \Carbon\Carbon::parse($review->created_at)->format('F d, Y') }}
                                    </span>
                                </div>

                                <div class="comment-content">
                                    <p>{{ $review->reviewtxt }}</p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No reviews for this product till now.</p>
                            @endif
                        </div>
                    </div>

                    <div class="divider"></div>
                    @if(Auth::guard('customer')->check())
                    <div class="add-product-review">
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
                        <h3 class="review-title">Add a review</h3>
                        <form action="{{route('website.giveProductReview')}}" class="comment-form m-0" method="POST">
                            @csrf
                            <div class="rating-form">
                                <label for="rating">Your rating <span class="required">*</span></label>
                                <span class="rating-stars">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span>
                                <input type="hidden" name="userid" value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : '' }}">
                                <input type="hidden" name="productid" value="{{$productdata->id}}">

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Your review <span class="required">*</span></label>
                                <textarea cols="5" rows="6" name="reviewtxt" class="form-control form-control-sm"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xl-12">
                                    <div class="form-group">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-12">
                                    <div class="form-group">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="products-section pt-0">
        <h2 class="section-title">Related Products</h2>

        <div class="products-slider owl-carousel owl-theme dots-top dots-small">
            @foreach($relatedproducts as $row)
            <div class="product-default">
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
                        <del class="old-price">₹ {{$row->regularprice}}</del>
                        <span class="product-price">₹ {{$row->saleprice}}</span>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- Add to Cart --}}
<script>
    $(document).ready(function() {
        $(document).on('click', '.addtoCartbtn', function(e) {
            e.preventDefault();
            var productdata = $(this).data('product');
            console.log("Product Details : ", productdata);
            var _token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('website.addtocart') }}"
                , type: "POST"
                , data: {
                    productid: productdata.id
                    , productname: productdata.productname
                    , productimage: productdata.thumbnailImages
                    , price: productdata.saleprice
                    , quantity: 1
                    , _token: _token
                }
                , success: function(response) {
                    console.log(response);
                    $('#cartCount').html(response.count);
                    $('#cartTotal').html(response.total);
                    Toastify({
                        node: createCustomToast(productdata)
                        , duration: 4000
                        , close: true
                        , gravity: "bottom"
                        , position: "right"
                        , stopOnFocus: true
                        , style: {
                            background: "#fff"
                            , borderRadius: "8px"
                            , boxShadow: "0px 0px 10px rgba(0, 0, 0, 0.1)"
                            , padding: "20px"
                            , minWidth: "280px"
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
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 3000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 3000);

</script>
@endsection
