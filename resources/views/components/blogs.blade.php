<style>
.blog-img {
    height: 180px;
    object-fit: cover;
    width: 100%;
    display: block;
    border-radius: 10px;
}

</style>
<section class="blog-section pb-0">

    <div class="container">
        <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
            Latest News</h2>

        <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							},
                            '1200':{
                                'items': 5
                            }
						}
					}">
            @foreach ($blogs as $data)
                <article class="post">
                    <div class="post-media">
                        <a href="{{route('website.blogdetails',['id'=> $data->id])}}">
                          <img src="{{asset('assets/images/Blogs/'.$data->blogthumbnail)}}" alt="Post" width="100%" height="280" class="blog-img">
                        </a>
                        <div class="post-date">
                            <div class="post-date">
                                <span class="day">{{$data->created_at->format('d')}}</span>
                                <span class="month">{{$data->created_at->format('M')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="{{route('website.blogdetails',['id'=> $data->id])}}">{{$data->blogname}}</a>
                        </h2>
                        <div class="post-content">
                            <p>{{ Str::limit(strip_tags($data->blogdescription),40)}}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>
