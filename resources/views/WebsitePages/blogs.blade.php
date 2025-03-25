{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title','Blogs | '. env('APP_NAME'))
@section('content')
<style>
.blog-img {
    height: 180px;
    object-fit: cover;
    width: 100%;
    display: block;
    border-radius: 10px;
}

</style>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="blog-section row">
                @foreach ($blogs as $data)
                <div class="col-md-6 col-lg-4">
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
                </div>
                @endforeach
            </div>
        </div>

        <div class="sidebar-toggle custom-sidebar-toggle">
            <i class="fas fa-sliders-h"></i>
        </div>
        <div class="sidebar-overlay"></div>
        <aside class="sidebar mobile-sidebar col-lg-3">
            <div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
                <div class="widget widget-categories">
                    <h4 class="widget-title">Blog Categories</h4>
                    <ul class="list">
                    @foreach ($blogcategories as $data)
                        <li><a href="#">{{$data->label}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
