{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Categories')
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
                <form action="{{ route('admin.createmaster')}}" class="floating-labels" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <select name="type" class="select2 form-control border border-none">
                                            <option value="Master">--select a parent category--</option>
                                            <optgroup>
                                                @foreach ($data as $row)
                                                <option value="{{ $row->label}}">{{ $row->label}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        <span class="bar"></span>
                                        <label for="input1">Select Category</label>
                                    </div>
                                    <div class="form-group mt-5">
                                        <input type="text" class="form-control" name="label" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Category Label</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="thumbnailPreview" class="mt-3">
                                        <img id="imagePreview" src="{{asset('assets/images/Categories/placeholder.png')}}" alt="Thumbnail Preview" class="rounded-3" style="width: 150px; height: 150px;">
                                    </div>
                                    <div class="mt-3">
                                        <label for="example-search-input" class="mt-3">Category Image</label>
                                        <input class="form-control mt-3" placeholder="enter value" name="categoryimage" type="file" value="" onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn rounded-pill waves-effect waves-light btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">All Categories</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group">
                            <div class="">
                                <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Category Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        @foreach ($allcategories as $index => $rows)
                                        <tr>
                                            <td>{{ $index + 1}}</td>
                                            <td>{{ $rows->label}}</td>
                                            <td>
                                                @if($rows->type == 'Master')
                                                <span class="badge bg-secondary">Parent Category</span>
                                                @else
                                                <span class="badge bg-success">{{ $rows->type}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ $rows->categoryimage ? asset('assets/images/Categories/'.$rows->categoryimage) : asset('assets/images/Categories/placeholder.png') }}" class="rounded" alt="Category Image" width="50" height="50">
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <button  class="btn btn-outline-primary btn-border editbtnmodal" data-bs-toggle="modal" data-bs-target="#primary-header-modal" data-car-list="{{ json_encode($rows) }}"><i class="ti ti-edit"></i></button>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <button onclick="confirmDelete('{{ $rows->id }}')" class="btn btn-outline-danger btn-border"><i class="ti ti-trash"></i></button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="primary-header-modal" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Edit Details
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.updatemaster')}}" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbodyedit">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn bg-primary-subtle text-primary ">
                            Save changes
                        </button>
                    </div>
                </form>
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
                        window.location.href = "/admin/deletemaster/" + id;
                    }
                });
        }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Populate Edit Modal with Data
        $('#table-body').on('click', '.editbtnmodal', function() {
            const masterdata = $(this).data('car-list');
            console.log(masterdata);
            $('#modal-body').empty();
            const imageSrc = masterdata.categoryimage ? '{{ asset('assets/images/Categories/') }}/' + masterdata.categoryimage : '{{asset('assets/images/Categories/placeholder.png') }}';
            $('#modalbodyedit').html(`
                    <div class="">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group mt-0">
                                         <div class="">
                                            <label class="mb-2">Category</label>
                                            <select name="type" class="form-select" data-placeholder="Choose a Category" tabindex="1">
                                               <option value="Master">--select a parent category--</option>
                                            @foreach ($data as $row)
                                                <option value="{{ $row->label }}" ${masterdata.type === '{{ $row->label }}' ? 'selected' : ''}>{{ $row->label }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                      <div class="form-group mt-3">
                                        <label class="mb-2">Category Label</label>
                                        <input type="text" class="form-control" name="label" value="${masterdata.label}" id="input1" required>
                                    </div>
                                     <div class="mt-3">
                                        <label for="example-search-input" class="0">Category Image</label>
                                        <input class="form-control mt-3" placeholder="enter value" name="categoryimage" type="file" value="" onchange="previewImage(event)">
                                    </div>
                                    <input type="hidden" name="masterid" value="${masterdata.id}" id="">
                                </div>
                                <div class="col-md-6">
                                   <div id="thumbnailPreview" class="mt-3">
                                        <img id="imagePreview" src="${imageSrc}" alt="Thumbnail Preview" class="rounded-3 img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
        });

    </script>
</x-app-layout>
