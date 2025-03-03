{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','User Dashboard')
@section('user-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 bg-primary-subtle overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    @if(Auth::guard('customer')->user()->profile_photo_path)
                                        @if(Str::startsWith(Auth::guard('customer')->user()->profile_photo_path, 'https://'))
                                            <img src="{{ Auth::guard('customer')->user()->profile_photo_path }}" alt="modernize-img" width="40" height="40">
                                        @else
                                            <img src="{{ asset('assets/images/Users/' . Auth::guard('customer')->user()->profile_photo_path) }}" alt="modernize-img" width="40" height="40">
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/images/defaultuser.png') }}" alt="modernize-img" width="40" height="40">
                                    @endif
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back {{ucwords(Auth::guard('customer')->user()->name)}}</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><i class="ti ti-home-down"></i>&nbsp;&nbsp;000
                                    </h3>
                                    <p class="mb-0 text-dark">My Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-bottom border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title fs-7">120</h4>
                            <p class="card-subtitle text-info">News Feed</p>
                        </div>
                        <div class="ms-auto">
                            <span class="text-info display-6">
                                <i class="ti ti-file-text"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-bottom border-primary">
                <div class="card-body">
                    <div class="d-flex  align-items-center">
                        <div>
                            <h4 class="card-title fs-7">150</h4>
                            <p class="card-subtitle text-primary">Invoices</p>
                        </div>
                        <div class="ms-auto">
                            <span class="text-primary display-6">
                                <i class="ti ti-clipboard"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-bottom border-success">
                <div class="card-body">
                    <div class="d-flex  align-items-center">
                        <div>
                            <h4 class="card-title fs-7">450</h4>
                            <p class="card-subtitle text-success">Revenue</p>
                        </div>
                        <div class="ms-auto">
                            <span class="text-success display-6">
                                <i class="ti ti-credit-card"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-bottom border-danger">
                <div class="card-body">
                    <div class="d-flex  align-items-center">
                        <div>
                            <h4 class="card-title fs-7">100</h4>
                            <p class="card-subtitle text-danger">Sales</p>
                        </div>
                        <div class="ms-auto">
                            <span class="text-danger display-6">
                                <i class="ti ti-chart-pie"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0">Recent Properties Listed</h4>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="" class="table  table-hover table-bordered display text-nowrap py-3">
                            <thead>
                                <tr>
                                    <th>Properties Photo & Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>City</th>
                                    <th>Property Address</th>
                                    <th>Description</th>
                                    <th>Property Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($allproperties as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-6">
                                            <img src="{{asset('assets/images/Listings/'.$data->thumbnail)}}" width="45" class="rounded">
                                            <h6 class="mb-0">{{ $data->property_name}}</h6>
                                        </div>
                                    </td>
                                    <td>{{ $data->category}}</td>
                                    <td>{{ $data->price}}</td>
                                    <td>{{ $data->city}}</td>
                                    <td>{{ $data->address}}</td>
                                    <td>{{ Str::limit($data->discription, 20) }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <span class="mb-1 badge {{$data->status == 'published' ? 'text-bg-success' : 'text-bg-danger' }}">
                                                {{ ucfirst($data->status) }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
