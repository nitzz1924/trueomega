{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Company Profile')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if($companydata == null)
                <form action="{{ route('admin.addcompanydetails')}}" class="floating-labels" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Company Details</h4>
                            <div class="d-flex justify-content-end">
                                <a href="">
                                    <button type="submit" class="btn rounded-pill waves-effect waves-light btn-success">
                                        Save Company Details
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="companyname" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Logo</label>
                                        <input onchange="readURL(this);" class="form-control" name="companylogo" type="file" id="formFile" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img-preview">
                                        <a href="#" download="">
                                            <img id="imagemain" src="" width="100" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Registered Office Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="city" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">City</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="state" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">State/Province</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="country" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="pincode" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Postal Code/ZIP Code</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="contactnumber" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Contact Number</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="email" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Office Address" name="officeaddress" rows="4" id="input7"></textarea>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex p-3">
                            {{-- <h4 class="card-title mb-0 flex-grow-1">Upload Company Documents</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input class="form-control" name="registrationimage" type="file" id="formFile" />
                                        <label for="formFile" class="form-label">Company Registration
                                            Document/GST</label>
                                    </div>
                                    <div class="img-preview mt-3">
                                        <a href="#" download="#">
                                            <img src="#" width="300" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="pancardimage" id="formFile" />
                                        <label for="formFile" class="form-label">PAN Card</label>
                                    </div>
                                    <div class="img-preview mt-3">
                                        <a href="#" download="#">
                                            <img src="#" width="300" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <form action="{{ route('admin.updateregistercompany')}}" class="floating-labels" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Company Details</h4>
                            <div class="d-flex justify-content-end">
                                <a href="">
                                    <button type="submit" class="btn rounded-pill waves-effect waves-light btn-success">
                                        Update Company Details
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->companyname}}" name="companyname" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Company Name</label>
                                    </div>
                                </div>
                                <input type="hidden" name="recordid" value="{{$companydata->id}}">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Logo</label>
                                        <input onchange="readURL(this);" class="form-control" name="companylogo" type="file" id="formFile" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img-preview">
                                        <a href="{{ asset('assets/images/Services/'.$companydata->companylogo) }}" download="{{ $companydata->companylogo }}">
                                            <img id="imagemain" src="{{ asset('assets/images/Services/'.$companydata->companylogo) }}" width="100" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Registered Office Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->city}}" name="city" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">City</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->state}}" name="state" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">State/Province</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->country}}" name="country" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->pincode}}" name="pincode" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Postal Code/ZIP Code</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->contactnumber}}" name="contactnumber" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Contact Number</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" value="{{$companydata->email}}" name="email" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Office Address" name="officeaddress" rows="4" id="input7">{{$companydata->officeaddress}}</textarea>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header align-items-center d-flex p-3">
                            {{-- <h4 class="card-title mb-0 flex-grow-1">Upload Company Documents</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input class="form-control" name="registrationimage" type="file" id="formFile" />
                                        <label for="formFile" class="form-label">Company Registration
                                            Document/GST</label>
                                    </div>
                                    <div class="img-preview mt-3">
                                        <a href="{{ asset('assets/images/Services/'.$companydata->registrationimage) }}" download="{{ $companydata->registrationimage }}">
                                            <img src="{{ asset('assets/images/Services/'.$companydata->registrationimage) }}" width="300" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="pancardimage" id="formFile" />
                                        <label for="formFile" class="form-label">PAN Card</label>
                                    </div>
                                    <div class="img-preview mt-3">
                                        <a href="{{ asset('assets/images/Services/'.$companydata->pancardimage) }}" download="{{ $companydata->pancardimage }}">
                                            <img src="{{ asset('assets/images/Services/'.$companydata->pancardimage) }}" width="300" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        // Show image preview for uploaded file
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
</x-app-layout>
