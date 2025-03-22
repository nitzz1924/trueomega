{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.website')
@section('title',ucwords($pagname) .' | '. env('APP_NAME'))
@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="demo4.html"><i class="icon-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                @yield('title')
            </li>
        </ol>
    </div>
</nav>
<div class="container mt-4">
    <div class="contact-info">
        <div class="row">
            <div class="col-lg-12">
                  @php
                    $cleanedContent = preg_replace('/contenteditable="[^"]*"/', '', $privacydata->pagediscription);
                @endphp
                <p> {!! $cleanedContent !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="mb-8"></div>
@endsection
