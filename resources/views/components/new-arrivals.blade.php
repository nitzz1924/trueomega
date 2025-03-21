<section class="new-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>
        <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2" data-owl-options="{
        'dots': false,
        'nav': true,
        'responsive': {
            '992': {
                'items': 4
            },
            '1200': {
                'items': 5
            }
        }
        }">
           @foreach ($products as $row)
            <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                <figure>
                    <a href="#">
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
                        <a href="#">{{$row->productname}}</a>
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
                        <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                        <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                        <a href="#" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

       <div class="banner banner-big-sale appear-animate" data-animation-delay="200" data-animation-name="fadeInUpShorter" style="background: #2A95CB center/cover url('{{asset('assets/images/Media/'.$websitedata->firstofferimage)}}');">
            <div class="banner-content row align-items-center mx-0">
                <div class="col-md-9 col-sm-8">
                    <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                        <b class="d-inline-block mr-3 mb-1 mb-md-0">Aviation Excellence</b>  
                        Leading Supplier of OEM-Certified Aviation Products & Consumables 
                        <small class="text-transform-none align-middle">Quality & Reliability for Your Aerospace Needs</small>
                    </h2>
                </div>
                <div class="col-md-3 col-sm-4 text-center text-sm-right">
                    <a class="btn btn-light btn-white btn-lg" href="{{ route('website.aboutpage') }}">Learn More</a>
                </div>
            </div>
        </div>


        <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
        </h2>

        <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
         @foreach ($categories as $cat)  
            <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                <a href="category.html">
                    <figure>
                        <img src="{{asset('assets/images/Categories/'.$cat->categoryimage)}}" alt="category" width="280" height="240" />
                    </figure>
                    <div class="category-content">
                        <h3>{{$cat->label}}</h3>
                        <span><mark class="count">3</mark> products</span>
                    </div>
                </a>
            </div>
         @endforeach
        </div>
    </div>
</section>