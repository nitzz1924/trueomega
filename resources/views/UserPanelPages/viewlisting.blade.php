{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title', $propertyName.' | Details',)
@section('user-content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="fw-semibold mb-8">@yield('title')</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-center">
                    <div class="">
                        <span class="mb-1 badge {{$listingdata->status == 'published' ? 'text-bg-success' : 'text-bg-danger' }}">
                            {{ ucfirst($listingdata->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-detail">
        <div class="card shadow-none border">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div id="sync1" class="owl-carousel owl-theme">
                            @if ($listingdata->gallery)
                            @foreach (json_decode($listingdata->gallery) as $galleryimg)
                            <div class="item rounded-4 overflow-hidden">
                                <img src="{{ asset($galleryimg) }}" alt="modernize-img" class="img-fluid">
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <div id="sync2" class="owl-carousel owl-theme">
                            @if ($listingdata->gallery)
                            @foreach (json_decode($listingdata->gallery) as $galleryimg2)
                            <div class="item rounded-4 overflow-hidden">
                                <img src="{{ asset($galleryimg2) }}" alt="modernize-img" class="img-fluid">
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-content">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge text-bg-success fs-2 fw-semibold">{{$listingdata->category}}</span>
                                <span class="fs-2">Category</span>
                            </div>
                            <h4>{{$listingdata->property_name}}</h4>
                            <p class="text-muted"><i class="ti ti-map-pin"></i> {{$listingdata->city}}</p>
                            <h4 class="mb-3">
                                <del class="fs-5 text-muted">₹ {{$listingdata->price}}</del> ₹ {{$listingdata->price}}/-
                            </h4>
                            <div class="bg-light-subtle p-2 mt-3 rounded border border-dashed">
                                <div class="row align-items-center text-center g-2">
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-bed fs-5"></i>{{$listingdata->bedroom}} Bedrooms
                                        </p>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-bath"></i>{{$listingdata->bathroom}} Bathrooms
                                        </p>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-square-toggle-horizontal"></i>{{$listingdata->squarefoot}} sqft
                                        </p>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-stairs-up"></i>{{$listingdata->floor}} Floor
                                        </p>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-discount"></i> For Sale
                                        </p>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
                                        <p class="text-muted mb-0 fs-3 fw-medium d-flex align-items-center justify-content-center gap-1">
                                            <i class="ti ti-map-pin"></i> {{$listingdata->city}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 href="#" class="fw-bold mb-3">Property Details :</h4>
                                <p class="mb-3">{{$listingdata->discription}}</p>
                            </div>
                            <div class="bg-light-subtle p-2 d-flex align-items-center justify-content-between">
                                <div class="fw-bold">Listed On:</div>
                                <div class="">{{ $listingdata->created_at->format('d M Y | h:i A') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border">
            <div class="card-body p-4">
                <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                            Description
                        </button>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                        <p class="mb-7">
                            {{$listingdata->discription}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-7">
                                <h4 class="card-title">Property Views</h4>
                            </div>
                            <div class="row">
                                @if ($listingdata->videos)
                                @foreach (json_decode($listingdata->videos) as $videopart)
                                <div class="col-md-6">
                                    <div class="item rounded-4 overflow-hidden">
                                        <video controls class="img-fluid">
                                            <source src="{{ asset($videopart) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                       <p class="text-center text-muted">No Videos Found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
