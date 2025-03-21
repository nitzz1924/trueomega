{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Products')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')- ({{$productcnt}})</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center">
                        <div class="">
                            <a href="{{ route('admin.addProduct') }}" class="btn btn-outline-primary">
                                <i class="ti ti-plus"></i> Add New Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('error'))
        <div class="alert alert-danger rounded  fs-5" style="height: 120px; overflow-y: auto;">
            {!! session('error') !!}
        </div>
        @endif
        <div class="card bg-white shadow-sm position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-7 d-flex">
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-muted">Filter by category</label>
                            <select name="category" class="form-select mr-sm-2  mb-2" id="categorydropdown" required>
                                <option value="3" selected="">--Filter by category--</option>
                                @foreach ($categories as $datacat)
                                <option value="{{$datacat->label}}">{{$datacat->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ms-3 mb-3">
                            <label for="formFile" class="form-label text-muted">Filter by Product Status</label>
                            <select name="status" class="form-select mr-sm-2  mb-2" id="statusdropdown" required>
                                <option selected="">--Filter by Product Status--</option>
                                <option value="unpublished">Unpublished</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <label for="formFile" class="form-label text-muted">Bulk Upload</label>
                            <div class="input-group mb-3">
                                <input class="form-control" name="file" type="file" id="formFile" />
                                <button type="submit" id="" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                             @error('file')
                            <div class="text-danger fs-5">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <table id="file_export" class="table  table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Thumbnail & Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Property Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                            @foreach ($data as $row)
                            <tr>
                                <td>#Pro00{{ $row->id}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="45" class="rounded">
                                        <h6 class="mb-0">{{ Str::limit($row->productname,20)}}</h6>
                                    </div>
                                </td>
                                <td>{{ $row->category}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <div class="text-muted text-decoration-line-through">₹{{ $row->regularprice}}/-</div>
                                        <div class="fw-bold text-primary">₹{{ $row->saleprice}}/-</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <span class="mb-1 badge {{$row->productstatus == 'published' ? 'text-bg-success' : 'text-bg-danger' }}">
                                            {{ ucfirst($row->productstatus) }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ route('admin.editproduct',['id' => $row->id]) }}" class="link-dark  fs-6"><i class="ti ti-edit"></i></a>
                                        <button onclick="confirmDelete('{{ $row->id }}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/deleteProduct/" + id;
                    }
                });
        }

    </script>

    {{-- Filter By category--}}
    <script>
        $(document).ready(function() {
            $('#categorydropdown').change(function() {
                var category = $("#categorydropdown").val();
                console.log(category);

                //Ajax call
                var finalurl = '{{ route("admin.filterbycategory", ":category") }}'.replace(':category', category);
                $.ajax({
                    url: finalurl
                    , type: 'GET'
                    , data: {
                        _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        console.log("Filtered Data : ", response);
                        $("#tablebody").empty();
                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                var editUrl = '{{ route("admin.editproduct", ":id") }}'.replace(':id', item.id);
                                var tr = `
                                        <tr>
                                        <td>#Pro00${item.id}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-6">
                                                <img src="{{asset('assets/images/Media/${item.thumbnailImages}')}}" width="45" class="rounded">
                                                <h6 class="mb-0">${item.productname}</h6>
                                            </div>
                                        </td>
                                        <td>${item.category}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-6">
                                                <div class="text-muted text-decoration-line-through">₹${item.regularprice}/-</div>
                                                <div class="fw-bold text-primary">₹${item.saleprice}/-</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <span class="mb-1 badge ${item.productstatus == 'published' ? 'text-bg-success' : 'text-bg-danger' }">
                                                    ${item.productstatus}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="${editUrl}" class="link-dark  fs-6"><i class="ti ti-edit"></i></a>
                                                <button onclick="confirmDelete('${item.id}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    `;
                                $("#tablebody").append(tr);
                            });
                        } else {
                            var noDataTr = `
                                    <tr>
                                        <td colspan="6" class="text-center">No products found</td>
                                    </tr>
                                `;
                            $("#tablebody").append(noDataTr);
                        }
                    }
                });
            });
        });

    </script>

    {{-- Filter By Status--}}
    <script>
        $(document).ready(function() {
            $('#statusdropdown').change(function() {
                var status = $("#statusdropdown").val();
                console.log(status);

                //Ajax call
                var finalurl = '{{ route("admin.filterbystatus", ":status") }}'.replace(':status', status);
                $.ajax({
                    url: finalurl
                    , type: 'GET'
                    , data: {
                        _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        console.log("Filtered Data : ", response);
                        $("#tablebody").empty();
                        $.each(response.data, function(index, item) {
                            var editUrl = '{{ route("admin.editproduct", ":id") }}'.replace(':id', item.id);
                            if (response.data.length > 0) {
                                $.each(response.data, function(index, item) {
                                    var editUrl = '{{ route("admin.editproduct", ":id") }}'.replace(':id', item.id);
                                    var tr = `
                                        <tr>
                                        <td>#Pro00${item.id}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-6">
                                                <img src="{{asset('assets/images/Media/${item.thumbnailImages}')}}" width="45" class="rounded">
                                                <h6 class="mb-0">${item.productname}</h6>
                                            </div>
                                        </td>
                                        <td>${item.category}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-6">
                                                <div class="text-muted text-decoration-line-through">₹${item.regularprice}/-</div>
                                                <div class="fw-bold text-primary">₹${item.saleprice}/-</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <span class="mb-1 badge ${item.productstatus == 'published' ? 'text-bg-success' : 'text-bg-danger' }">
                                                    ${item.productstatus}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="${editUrl}" class="link-dark  fs-6"><i class="ti ti-edit"></i></a>
                                                <button onclick="confirmDelete('${item.id}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    `;
                                    $("#tablebody").append(tr);
                                });
                            } else {
                                var noDataTr = `
                                    <tr>
                                        <td colspan="6" class="text-center">No products found</td>
                                    </tr>
                                `;
                                $("#tablebody").append(noDataTr);
                            }
                        });
                    }
                });
            });
        });

    </script>
</x-app-layout>
