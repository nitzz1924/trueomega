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
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td>#Pro00{{ $row->id}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="{{asset('assets/images/Products/'.$row->thumbnailImages)}}" width="45" class="rounded">
                                        <h6 class="mb-0">{{ $row->productname}}</h6>
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
</x-app-layout>
