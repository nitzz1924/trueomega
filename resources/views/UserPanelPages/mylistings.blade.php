{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','My Listings')
@section('user-content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="fw-semibold mb-8">@yield('title')- ({{$allpropertiescnt}})</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                    <div class="">
                        <a onclick="copyToClipboard(event)" href="{{ route('user.mylistings',['username' => $authuser->name, 'userid' => $authuser->id]) }}" class="btn btn-outline-primary">
                            <i class="ti ti-copy"></i> My Listings Link
                        </a>
                    </div>
                    <div class="">
                        <a href="{{ route('user.addlisting') }}" class="btn btn-outline-primary">
                            <i class="ti ti-plus"></i> Add New Property
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
                            <th>Properties Photo & Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>City</th>
                            <th>Property Address</th>
                            <th>Description</th>
                            <th>Property Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allproperties as $data)
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
                                    <input data-id="{{ $data->id }}" class="form-check-input success" type="checkbox" id="color-success{{ $data->id }}" switch="bool" {{ $data->status == 'published' ? 'checked' : '' }} />
                                    <label class="form-check-label  {{ $data->status == 'published' ? 'text-success' : 'text-danger' }}" for="color-success{{ $data->id }}">
                                        {{ $data->status == 'published' ? 'Published' : 'Upublished' }}
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="{{ route('user.viewlisting',['id' => $data->id]) }}" class="link-primary  fs-6"><i class="ti ti-eye-share"></i></a>
                                    <a href="{{ route('user.editlisting',['id' => $data->id]) }}" class="link-dark  fs-6"><i class="ti ti-edit"></i></a>
                                    <button onclick="confirmDelete('{{ $data->id }}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
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
                    window.location.href = "/user/deletelisting/" + id;
                }
            });
    }

</script>
<script>
    function copyToClipboard(event) {
        event.preventDefault();
        const link = event.currentTarget.getAttribute('href'); // Get the href value
        navigator.clipboard.writeText(link)
            .then(() => {
                toastr.success("Link copied to clipboard!");
            })
            .catch(err => {
                console.error('Failed to copy text: ', err);
            });
    }

</script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"][switch="bool"]').change(function() {
            var blogId = $(this).data('id');
            var status = $(this).is(':checked') ? 'published' : 'unpublished';
            console.log(blogId, status);

                $.ajax({
                url: '{{ route('user.updateaduserlistingstatus') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: blogId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Status Updated!"
                            , text: data.message
                            , icon: "success"
                            , confirmButtonText: "OK"
                            , customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2"
                            }
                            , buttonsStyling: true
                            , showCancelButton: true
                            , showCloseButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Status Not Updated!!"
                            , text: data.message
                            , icon: "error"
                            , confirmButtonText: "OK"
                            , customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2"
                            }
                            , buttonsStyling: true
                            , showCancelButton: true
                            , showCloseButton: true
                        });
                    }
                },
                error: function() {
                    swal("Error", "An error occurred.", "error");
                }
            });
        });
    });

</script>
@endsection
