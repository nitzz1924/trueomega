{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','My Refered Users')
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
                                    <a class="text-muted text-decoration-none" href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Registered On</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($referedusers as $index => $data)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->mobile}}</td>
                                <td>{{ $data->email}}</td>
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
@endsection
