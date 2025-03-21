<section class="featured-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>
        <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{'dots': false,'nav':true}">
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
    </div>
</section>
