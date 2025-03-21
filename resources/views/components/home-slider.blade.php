<div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">
    @foreach (json_decode($websitedata->mainslideriamges) as  $row)  
    <div class="home-slide home-slide1 banner">
        <img class="slide-bg" src="{{asset($row)}}" width="1903" height="499" alt="slider image">
        <div class="container d-flex align-items-center">
            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                <h2 class="text-transform-none mb-0">Summer Sale</h2>
                <h3 class="m-b-3">70% Off</h3>
                <h5 class="d-inline-block mb-0">
                    <span>Starting At</span>
                    <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em class="align-text-top">199</em><sup>99</sup></b>
                </h5>
                <a href="category.html" class="btn btn-dark btn-lg">Shop Now!</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
