{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Shop | '. env('APP_NAME'))
@section('content')
<div class="category-banner-container bg-gray">
    <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{ asset('assets/images/Media/1742534407_your1site-software-company-syria-dubai-slider-1.jpg') }}');">
        <div class="container position-relative">
            <div class="row">
                <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                    <h3>Aviation Supplies<br>Best Deals</h3>
                </div>
                <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                    <div class="coupon-sale-content">
                        <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Special Discounts</h4>
                        <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i> <b class="text-dark">15% OFF</b> on select aviation consumables</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container p-3">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-9 main-content">
            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggle">
                        <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                            <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                            <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                        </svg>
                        <span>Filter</span>
                    </a>

                    <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>

                        <div class="select-custom">
                            <select name="sortbydrop" class="form-control" id="sortbydrop">
                                <option selected>--select to sort--</option>
                                <option value="lowtohigh">Sort By Price Low to High</option>
                                <option value="hightolow">Sort By Price High to Low</option>
                            </select>
                        </div>

                    </div>
                </div>
            </nav>

            <div class="row" id="productContainer">
                @foreach ($featuredproducts->take(6) as $row)
                <div class="col-6 col-sm-4">
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
                                <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                <a href="{{route('website.productdetails',['id'=>$row->id])}}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="post-pagination wow fadeInUp" data-wow-delay="1.5s">
                        {{ $featuredproducts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                    </h3>

                    <div class="collapse show" id="widget-body-2">
                        <div class="widget-body">
                            <ul class="cat-list">
                                @foreach($featuredproducts->unique('category') as $key => $value)
                                <li><a class="category-onclick" data-categoryname="{{$value->category}}">{{$value->category}}<span class="products-count">({{$value->category_count}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="widget widget-featured">
                    <h3 class="widget-title">Featured</h3>

                    <div class="widget-body">
                        <div class="owl-carousel widget-featured-products">
                            @foreach($featuredproducts as $key => $row)
                            <div class="featured-col">
                                <div class="product-default left-details product-widget">
                                    <figure>
                                        <a href={{route('website.productdetails',['id'=>$row->id])}}">
                                            <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="75" height="75" alt="product" />
                                            <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="75" height="75" alt="product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title">
                                            <a href="{{route('website.productdetails',['id'=>$row->id])}}">{{$row->productname}}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">₹ {{$row->saleprice}} /-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="widget widget-block">
                    <h3 class="widget-title">Why Choose Truomega?</h3>
                    <h5>Discover high-quality products with the best deals and seamless shopping experience.</h5>
                    <p>✅ <strong>Fast & Secure Shipping</strong> – Get your orders delivered quickly and safely.</p>
                    <p>✅ <strong>100% Authentic Products</strong> – We ensure premium quality in every purchase.</p>
                    <p>✅ <strong>24/7 Customer Support</strong> – Have questions? We're here to help anytime!</p>
                    <p>✅ <strong>Exclusive Discounts</strong> – Unlock special offers and seasonal sales.</p>
                    <p>Shop now and enjoy a hassle-free experience !</p>
                </div>
            </div>
        </aside>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- Filter by Category --}}
<script>
    $(document).ready(function() {
        $('.category-onclick').click(function() {
            var category = $(this).data('categoryname');
            let productContainer = $('#productContainer');

            // Show loader
            productContainer.html(
                '<div id="loader" class="d-flex justify-content-center align-items-center"><div><img src="/website-assets/images/loading.gif" alt="Loading..." width="100"></div>'
            );

            $('#loader').show();

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('website.shopcategoryfilter') }}"
                    , type: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                    , data: {
                        category: category
                    }
                    , success: function(data) {
                        console.log("Received Data:", data);
                        let products = data.data;
                        productContainer.empty();

                        if (Array.isArray(products) && products.length > 0) {
                            products.forEach(function(product) {
                                let productHTML = `
                                    <div class="col-6 col-sm-4">
                                        <div class="product-default" data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="/product-details/${product.id}">
                                                    <img src="/assets/images/Products/${product.thumbnailImages}" width="280" height="280" alt="${product.productname}">
                                                    <img src="/assets/images/Products/${product.thumbnailImages}" width="280" height="280" alt="${product.productname}">
                                                </a>
                                                <div class="label-group">
                                                    <div class="product-label label-hot">HOT</div>
                                                    <div class="product-label label-sale">-20%</div>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">${product.category}</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/product-details/${product.id}">${product.productname}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <del class="old-price">₹ ${product.regularprice} /-</del>
                                                    <span class="product-price">₹ ${product.saleprice} /-</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                                    <a href="/product-details/${product.id}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                productContainer.append(productHTML);
                                console.log("Product container after append:", productContainer.html());
                            });
                        } else {
                            productContainer.html('<p class="text-center">No products found in this category.</p>');
                        }
                    }
                    , error: function(xhr) {
                        console.error("Error fetching data:", xhr.responseText);
                        productContainer.html('<p class="text-center text-danger">Failed to load products.</p>');
                    }
                });
            }, 500);
        });
    });

</script>

{{-- Filter by Category --}}
<script>
    $(document).ready(function() {
        $('#sortbydrop').change(function() {
            var filtername = $(this).val();
            let productContainer = $('#productContainer');
            productContainer.html(
                '<div id="loader" class="d-flex justify-content-center align-items-center"><div><img src="/website-assets/images/loading.gif" alt="Loading..." width="100"></div></div>'
            );
            $('#loader').show();

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('website.sortByPriceFilter') }}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        filtername: filtername
                    },
                    success: function(data) {
                        console.log("Received Data:", data);
                        let products = data.data;
                        productContainer.empty();

                        if (Array.isArray(products) && products.length > 0) {
                            products.forEach(function(product) {
                                let productHTML = `
                                    <div class="col-6 col-sm-4">
                                        <div class="product-default" data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="/product-details/${product.id}">
                                                    <img src="/assets/images/Products/${product.thumbnailImages}" width="280" height="280" alt="${product.productname}">
                                                    <img src="/assets/images/Products/${product.thumbnailImages}" width="280" height="280" alt="${product.productname}">
                                                </a>
                                                <div class="label-group">
                                                    <div class="product-label label-hot">HOT</div>
                                                    <div class="product-label label-sale">-20%</div>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">${product.category}</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/product-details/${product.id}">${product.productname}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <del class="old-price">₹ ${product.regularprice} /-</del>
                                                    <span class="product-price">₹ ${product.saleprice} /-</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                                    <a href="/product-details/${product.id}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                productContainer.append(productHTML);
                            });
                        } else {
                            productContainer.html('<p class="text-center">No products found for the selected filter.</p>');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching data:", xhr.responseText);
                        productContainer.html('<p class="text-center text-danger">Failed to load products.</p>');
                    }
                });
            }, 300);
        });
    });
</script>
@endsection
