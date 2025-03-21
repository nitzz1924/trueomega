{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title', $blogname . ' | ' . env('APP_NAME'))
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('website.homepage')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Post</li>
        </ol>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <article class="post single">
                <div class="post-media">
                    <img src="{{asset('assets/images/Blogs/'.$blogdata->blogthumbnail)}}" alt="Post">
                </div>

                <div class="post-body">
                    <div class="post-date">
                        <span class="day">{{$blogdata->created_at->format('d')}}</span>
                        <span class="month">{{$blogdata->created_at->format('M')}}</span>
                    </div><!-- End .post-date -->

                    <h2 class="post-title">{{$blogdata->blogname}}</h2>

                    {{-- <div class="post-meta">
                        <a href="#" class="hash-scroll">0 Comments</a>
                    </div> --}}

                    <div class="post-content">
                        @php
                        $cleanedContent = preg_replace('/contenteditable="[^"]*"/', '', $blogdata->blogdescription);
                        @endphp
                        <p> {!! $cleanedContent !!}</p>
                    </div>

                    <div class="post-share">
                        <h3 class="d-flex align-items-center">
                            <i class="fas fa-share"></i>
                            Share this post
                        </h3>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook" target="_blank" title="Facebook">
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="#" class="social-icon social-linkedin" target="_blank" title="Linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                <i class="icon-mail-alt"></i>
                            </a>
                        </div><!-- End .social-icons -->
                    </div><!-- End .post-share -->

                    <div class="comment-respond">
                        <h3>Leave a Reply</h3>

                        <form action="#">
                            <p>Your email address will not be published. Required fields are marked *</p>

                            <div class="form-group">
                                <label>Comment</label>
                                <textarea cols="30" rows="1" class="form-control" required></textarea>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Website</label>
                                <input type="url" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group-custom-control mb-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="save-name">
                                    <label class="custom-control-label" for="save-name">Save my name, email,
                                        and website in this browser for the next time I comment.</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-group-custom-control -->

                            <div class="form-footer my-0">
                                <button type="submit" class="btn btn-sm btn-primary">Post
                                    Comment</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .comment-respond -->
                </div><!-- End .post-body -->
            </article><!-- End .post -->

            <hr class="mt-2 mb-1">

            <div class="related-posts">
                <h4>Related <strong>Posts</strong></h4>

                <div class="owl-carousel owl-theme related-posts-carousel" data-owl-options="{
								'dots': false
							}">
                    <article class="post">
                    <div class="post-media">
                        <a href="{{route('website.blogdetails',['id'=> $blogdata->id])}}">
                          <img src="{{asset('assets/images/Blogs/'.$blogdata->blogthumbnail)}}" alt="Post" width="100%" height="280" class="blog-img">
                        </a>
                        <div class="post-date">
                            <div class="post-date">
                                <span class="day">{{$blogdata->created_at->format('d')}}</span>
                                <span class="month">{{$blogdata->created_at->format('M')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="{{route('website.blogdetails',['id'=> $blogdata->id])}}">{{$blogdata->blogname}}</a>
                        </h2>
                        <div class="post-content">
                            <p class="text-start">{{ Str::limit(strip_tags($blogdata->blogdescription),40)}}</p>
                        </div>
                    </div>
                </article>
                </div>
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
                        @php
                        $categories = json_decode($blogdata->blogcategories ?? '[]', true);
                        @endphp

                        @foreach ($categories as $category)
                        <li>{{ $category }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
