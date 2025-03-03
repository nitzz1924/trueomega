{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Admin Dashboard')
<x-app-layout>
    <div class="container-fluid">
        <!--  Owl carousel -->
        <div class="row">
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/house.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                    Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(10)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/leadership.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                      Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(20)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/team.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                    Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(30)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/real-estate-agent.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                     Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(40)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/blog.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                     Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(50)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('assets/images/listing.png')}}" width="50" height="50" class="mb-3" alt="modernize-img" />
                                <p class="fw-semibold fs-4 text-black text-center mb-1">
                                  Dummy
                                </p>
                                <h5 class="fw-semibold text-black text-center mb-0">(60)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fw-semibold mb-0">Recent Properties</h4>
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
                                            <th>Property Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($allproperties->take(4) as $data)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.viewproperty',['id' => $data->id]) }}">
                                        <div class="d-flex align-items-center gap-6">
                                            <img src="{{asset('assets/images/Listings/'.$data->thumbnail)}}" width="45" class="rounded">
                                            <h6 class="mb-0">{{ $data->property_name}}</h6>
                                        </div>
                                        </a>
                                        </td>
                                        <td>{{ $data->category}}</td>
                                        <td>{{ $data->price}}</td>
                                        <td>{{ $data->city}}</td>
                                        <td>{{ $data->address}}</td>
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
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fw-semibold mb-0">Registered Users</h4>
                        </div>
                        <div class="card-body mydashboardscroll">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-bordered display text-nowrap py-3">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Registered On</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        {{-- @foreach ($allcustomers->take(10) as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1}}</td>
                                        <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                                        <td>{{ ucwords($data->name)}}</td>
                                        <td>{{ $data->mobile}}</td>
                                        <td>{{ $data->email}}</td>
                                        <td> <span class="badge {{$data->verification_status == 1 ? 'text-bg-success' : 'text-bg-danger' }}"> {{ ucfirst('Verified') }}</span></td>
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
    </div>
</x-app-layout>
