{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Commissions')
<x-app-layout>
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
                                <th>Commission To</th>
                                <th>Commission By</th>
                                <th>Commission Amount</th>
                                <th>On Amount</th>
                                <th>Given in</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($commissions as $index => $com)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>{{ $com->parent_name }}</td>
                                <td>{{ $com->child_name  }}</td>
                                <td>₹ {{ $com->comm_amount}} /--</td>
                                <td>₹ {{ $com->order_amount}} /--</td>
                                <td>{{ $com->comm_month}}</td>
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
