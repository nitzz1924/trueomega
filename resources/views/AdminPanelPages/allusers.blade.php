{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Customers')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')- ({{$userscnt}})</h4>
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
        <div class="card">
            <div class="">
                <div class="p-4">
                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Registered On</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Verification Status</th>
                                <th>Set Status</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($allusers as $index => $data)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->mobile}}</td>
                                <td>{{ $data->email}}</td>
                                <td> <span class="badge {{$data->verification_status == 1 ? 'text-bg-success' : 'text-bg-danger' }}"> {{ $data->verification_status == 1 ? 'Verified' : 'Not Verified' }}</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $data->id }}" class="form-check-input success" type="checkbox" id="color-success{{ $data->id }}" switch="bool"  {{ $data->userstatus == 'enabled' ? 'checked' : '' }}  />
                                        <label class="form-check-label  {{ $data->userstatus == 'enabled' ? 'text-success' : 'text-danger' }}" for="color-success{{ $data->id }}">
                                             {{ $data->userstatus == 'enabled' ? 'Enabled' : 'Disabled' }}
                                        </label>
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
        $(document).ready(function() {
            $('input[type="checkbox"][switch="bool"]').change(function() {
                var blogId = $(this).data('id');
                var status = $(this).is(':checked') ? 'enabled' : 'disabled';
                console.log(blogId, status);

                 $.ajax({
                    url: '{{ route('admin.updateUserStatus') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: blogId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "User is " + status+"!!"
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
</x-app-layout>
