<div class="container">
    <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
                    'dots': false,
                    'loop': false,
                    'responsive': {
                        '576': {
                            'items': 2
                        },
                        '992': {
                            'items': 3
                        }
                    }
                }">
        <div class="info-box info-box-icon-left">
            <i class="icon-shipping"></i>

            <div class="info-box-content">
                <h4>FREE SHIPPING &amp; RETURN</h4>
                <p class="text-body">Free shipping on all orders over $99.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left">
            <i class="icon-money"></i>

            <div class="info-box-content">
                <h4>MONEY BACK GUARANTEE</h4>
                <p class="text-body">100% money back guarantee</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left">
            <i class="icon-support"></i>

            <div class="info-box-content">
                <h4>ONLINE SUPPORT 24/7</h4>
                <p class="text-body">Lorem ipsum dolor sit amet.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->
    </div>

    <div class="banners-container mb-2">
        <div class="banners-slider owl-carousel owl-theme" data-owl-options="{'dots': false }">
         @foreach (json_decode($offersliderdata->offersliderimages) as $data)
            <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                <figure class="w-100">
                    <img src="{{asset($data)}}" alt="banner" width="380" height="175" />
                </figure>
                <div class="banner-layer">
                    <a href="#" class="btn btn-sm btn-dark">Shop Now</a>
                </div>
            </div>
         @endforeach
        </div>
    </div>
</div>
