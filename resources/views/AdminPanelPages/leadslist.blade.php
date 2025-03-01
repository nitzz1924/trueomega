{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Leads')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title')- ({{$leadcount}})</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center gap-1">
                        <div class="" data-bs-toggle="tooltip" title="Switch to Kanban">
                            <a href="{{ route('admin.leadslistkaban') }}" class="btn btn-outline-dark">
                                <i class="ti ti-layout-kanban"></i>
                            </a>
                        </div>
                        <div class="" data-bs-toggle="tooltip" title="Switch to List">
                            <a href="{{ route('admin.leadslist') }}" class="btn btn-outline-dark">
                                <i class="ti ti-list"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-sm position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-3">
                        <label class="mb-2">Filter by Date</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control daterange" id="dateinput" name="date" />
                            <span class="input-group-text">
                                <i class="ti ti-calendar fs-5"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <label for="exampleInputdate" class="mb-2">Filter by Status</label>
                        </div>
                        <div class="">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.leadslist') }}" class="btn {{ request()->routeIs('admin.leadslist') ? 'btn-dark' : 'btn-light' }}">All</a>
                                <a href="{{ route('admin.leadstatusfilter', ['status' => 'New']) }}" class="btn {{ request()->route('status') == 'New' ? 'btn-dark' : 'btn-light' }}">New</a>
                                <a href="{{ route('admin.leadstatusfilter', ['status' => 'Qualified']) }}" class="btn {{ request()->route('status') == 'Qualified' ? 'btn-dark' : 'btn-light' }}">Qualified</a>
                                <a href="{{ route('admin.leadstatusfilter', ['status' => 'Not Responded']) }}" class="btn {{ request()->route('status') == 'Not Responded' ? 'btn-dark' : 'btn-light' }}">Not Responded</a>
                                <a href="{{ route('admin.leadstatusfilter', ['status' => 'Final']) }}" class="btn {{ request()->route('status') == 'Final' ? 'btn-dark' : 'btn-light' }}">Final</a>
                                <a href="{{ route('admin.leadstatusfilter', ['status' => 'Won']) }}" class="btn {{ request()->route('status') == 'Won' ? 'btn-dark' : 'btn-light' }}">Won</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="">
                <div class="p-4">
                    <table id="file_export" class="table  table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Lead Date</th>
                                <th>Mobile No.</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Property Type</th>
                                <th>City of Property</th>
                                <th>Follow Up Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($leaddata as $data)
                            <tr>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->created_at->format('d M Y | h:i A')}}</td>
                                <td>{{ $data->mobilenumber}}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->city}}</td>
                                <td>{{ $data->housecategory}}</td>
                                <td>{{ $data->inwhichcity}}</td>
                                <td>
                                    <span class="mb-1 badge 
                                    @if($data->status == 'New') text-bg-primary 
                                    @elseif($data->status == 'Qualified') text-bg-secondary 
                                    @elseif($data->status == 'Not Responded') text-bg-danger 
                                    @elseif($data->status == 'Final') text-bg-info 
                                    @elseif($data->status == 'Won') text-bg-dark 
                                    @else text-bg-danger 
                                    @endif">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="#" data-car-list="{{ json_encode($data) }}" class="link-primary fs-6 editbtnmodal" data-bs-toggle="modal" data-bs-target="#primary-header-modal"><i class="ti ti-table-plus" data-bs-toggle="tooltip" title="Add Follow Up Status"></i></a>
                                        <a href="#" data-record="{{ json_encode($data) }}" data-bs-toggle="modal" data-bs-target="#primary-header-modaledit" class="link-dark editbtnmodalnew  fs-6" data-bs-toggle="tooltip" title="Edit"><i class="ti ti-edit"></i></a>
                                        <button data-bs-toggle="tooltip" title="Delete" onclick="confirmDelete('{{ $data->id }}')" class="link-danger  fs-6"><i class="ti ti-trash"></i></button>
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
    <div id="primary-header-modal" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Follow Up Details
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.insertfollowup') }}" class="" method="POST" enctype="multipart/form-data">
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
    <div id="primary-header-modaledit" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">
                        Edit Details
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.updatelead') }}" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbodynew">

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
                    , html: "You want to delete ?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/deletelead/" + id;
                    }
                });
        }

    </script>

    {{-- Follow Up History Code--}}
    <script>
        $('#table-body').on('click', '.editbtnmodal', function() {
            let masterdata = $(this).data('car-list');
            let followhistory = masterdata.followupdetails != null ? JSON.parse(masterdata.followupdetails) : [];
            console.log(followhistory);
            $('#modalbodyedit').empty();
            // Initialize follow-up history HTML
            let followUpHistoryHTML = '';
            if (followhistory.length > 0) {
                followUpHistoryHTML = followhistory
                    .map(list => `
                <li class="list-group-item d-flex justify-content-between align-items-start m-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">${list.description}</div>
                    </div>
                    <span class="badge bg-primary">${moment(list.date).format('Do MMM YY')}</span>
                </li>
            `).join('');
            } else {
                followUpHistoryHTML = `
                <li class="list-group">
                    <div class="text-muted">No follow-up history available</div>
                </li>
        `;
            }

            // Populate modal with data

            $('#modalbodyedit').html(`
                    <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-0">
                                        <div class="">
                                            <label class="mb-2">Follow Up Status</label>
                                            <select name="followupstatus" class="form-select" data-placeholder="Choose a Category" tabindex="1">
                                                <option value="Master">--select status--</option>
                                                @foreach ($followupstatus as $row)
                                                    <option value="{{ ucfirst(strtolower($row->label)) }}">{{ ucfirst(strtolower($row->label)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="recordid" class="" value="${masterdata.id}">
                                    </div>
                                    <div class="mt-3">
                                        <label class="mb-2">Follow Up Date</label>
                                        <input type="text" class="form-control" name="followupdate" placeholder="2024-06-04" id="mdate" />
                                    </div>
                                    <div class="mt-3">
                                        <label class="mb-2">Follow Up Description</label>
                                        <textarea class="form-control" placeholder="Follow Up Description" name="followupdesciption" rows="4" id="input7" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title mb-3">Follow Up History</h4>
                                    <ol class="list-group list-group-numbered">
                                        ${followUpHistoryHTML}
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);

            // Initialize datepicker scripts
            $.getScript("{{ asset('assets/js/moment.min.js') }}", function() {
                $.getScript("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js", function() {
                    $.getScript("{{ asset('assets/js/material-datepicker-init.js') }}");
                });
            });
        });

    </script>

    {{-- Edit Functionality Code--}}
    <script>
        $('#table-body').on('click', '.editbtnmodalnew', function() {
            const rowdata = $(this).data('record');
            console.log(rowdata);
            $('#modalbodynew').empty();
            $('#modalbodynew').html(`
                     <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Customer Name
                                        </label>
                                        <input type="text" name="customername" placeholder="Customer Name" class="form-control" value="${rowdata.name}" >
                                    </div>
                                    <input type="hidden" name="leadid" class="" value="${rowdata.id}">
                                </div>
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Mobile Number
                                        </label>
                                        <input type="text" name="mobilenumber" placeholder="Mobile Number" class="form-control" value="${rowdata.mobilenumber}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="">
                                        <label class="mb-2">Email
                                        </label>
                                        <input type="text" name="email" placeholder="Email" class="form-control" value="${rowdata.email}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="mt-3">
                                        <label class="mb-2">City
                                        </label>
                                        <input type="text" name="city" placeholder="City" class="form-control" value="${rowdata.city}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="mt-3">
                                        <label class="mb-2">City of Property
                                        </label>
                                        <input type="text" name="cityofproperty" placeholder="City of Property" class="form-control" value="${rowdata.inwhichcity}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
        });

    </script>

    {{-- Date filter Functionality Code--}}
    <script>
        $(document).ready(function() {
            /*
            var dataTableCustomer = $('#file_export').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }
                }
            });*/

            $('.daterange').on('change', function() {
                var date = $('#dateinput').val();
                var dates = date.split(" - ");
                var startDate = dates[0].trim();
                var endDate = dates[1].trim();

                console.log("Start Date:", startDate);
                console.log("End Date:", endDate);

                $.ajax({
                    url: '/admin/datefilterleads'
                    , method: 'POST'
                    , data: {
                        datefrom: startDate
                        , dateto: endDate
                    , }
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        console.log("Filtered data:", response);

                        // Clear DataTable before appending new data
                        var dataTableCustomer = $('#file_export').DataTable().clear().destroy();
                        $('#table-body').empty();

                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(row) {
                                var dateObj = new Date(row.created_at);
                                var formattedDate = dateObj.toLocaleDateString('en-GB', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric'
                                });
                                var formattedTime = dateObj.toLocaleTimeString('en-US', {
                                    hour: 'numeric',
                                    minute: '2-digit',
                                    hour12: true
                                });
                                var formattedDateTime = formattedDate + ' | ' + formattedTime;

                                var html = `
                        <tr>
                            <td>${row.name}</td>
                            <td>${formattedDateTime}</td>
                            <td>${row.mobilenumber}</td>
                            <td>${row.email}</td>
                            <td>${row.city}</td>
                            <td>${row.housecategory}</td>
                            <td>${row.inwhichcity}</td>
                            <td>
                                <span class="mb-1 badge 
                                ${row.status === 'New' ? 'text-bg-primary' : 
                                  row.status === 'Qualified' ? 'text-bg-success' : 
                                  row.status === 'Not Responded' ? 'text-bg-warning' : 
                                  row.status === 'Payment Mode' ? 'text-bg-info' : 
                                  row.status === 'Won' ? 'text-bg-success' : 
                                  'text-bg-danger'}">
                                    ${row.status.charAt(0).toUpperCase() + row.status.slice(1)}
                                </span>
                            </td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="#" data-car-list='${JSON.stringify(row)}' class="link-primary fs-6 editbtnmodal" data-bs-toggle="modal" data-bs-target="#primary-header-modal"><i class="ti ti-table-plus" data-bs-toggle="tooltip" title="Add Follow Up Status"></i></a>

                                    <a href="#" data-record='${JSON.stringify(row)}' data-bs-toggle="modal" data-bs-target="#primary-header-modaledit" class="link-dark editbtnmodalnew fs-6" data-bs-toggle="tooltip" title="Edit"><i class="ti ti-edit"></i></a>

                                    <button data-bs-toggle="tooltip" title="Delete" onclick="confirmDelete('${row.id}')" class="link-danger fs-6"><i class="ti ti-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        `;
                                $('#table-body').append(html);
                            });

                            // Reinitialize DataTable
                            $('#file_export').DataTable({
                                dom: "Bfrtip"
                                , buttons: ["copy", "csv", "excel", "pdf", "print"]
                            , });
                        } else {
                            $('#table-body').html('<tr><td colspan="9">No orders found for the selected date range.</td></tr>');
                        }
                    }
                });
            });
        });

    </script>
</x-app-layout>
