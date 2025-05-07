{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Commissions & Withdrawls')
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
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill mt-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#navpill-111" role="tab">
                                    <span>Commissions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#navpill-222" role="tab">
                                    <span>Withdrawl Requests</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content border mt-2">
                            <div class="tab-pane active p-3" id="navpill-111" role="tabpanel">
                                <div class="">
                                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Registered On</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Refered Users</th>
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
                                                <td>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <a href="{{ route('user.mycommissions',['id'=>$data->id,'username'=>$data->name])}}" class="btn btn-outline-info btn-sm"><i class="ti ti-currency-rupee"></i> View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
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
                                    <td>₹ {{ $com->comm_amount}} /-</td>
                                    <td>₹ {{ $com->order_amount}} /-</td>
                                    <td>{{ $com->comm_month}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table> --}}
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="navpill-222" role="tabpanel">
                                <div class="">
                                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Withdrawl Request Sent On</th>
                                                <th>Request Sent By</th>
                                                <th>Withdrawl Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            @foreach ($withdrawlrequests as $index => $with)
                                            <tr>
                                                <td>{{ $index + 1}}</td>
                                                <td>{{ $with->created_at->format('d M Y | h:i A')}}</td>
                                                <td>{{ $with->username}}</td>
                                                <td>₹ {{ $with->withdrawl_amt}} /-</td>
                                                <td>
                                                    <select class="form-select" id="statusdrop">
                                                        <option value="pending" {{ $with->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="completed" {{ $with->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                        <option value="rejected" {{ $with->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                                <input type="hidden" id="useridinput" name="userid" value="{{ $with->userid}}">
                                                <input type="hidden" id="requestid" name="requestid" value="{{ $with->id}}">
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                html: "You want to delete?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#222222",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/admin/deleteProduct/" + id;
                }
            });
        }

        $(document).on('change', '#statusdrop', function() {
            const selectedStatus = $(this).val();
            const row = $(this).closest('tr');
            const id = row.find('td:first').text(); // Assuming the first column contains the ID
            const userid = $("#useridinput").val();
            const requestid = $("#requestid").val();
            console.log(requestid);
            updateStatus(id, selectedStatus, userid, requestid);
        });

        function updateStatus(id, status, userid,requestid) {
            console.log(id, status);
            Swal.fire({
                title: "Update Withdrawl Status",
                html: `
                    <div style="display: ${status === 'rejected' || status === 'pending' ? 'none' : 'block'};">
                        <label for="paymentMode" class="form-label">Payment Mode</label>
                        <select id="paymentMode" class="form-select">
                            <option value="cash">Cash</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div class="mt-3" style="display: ${status === 'rejected' || status === 'pending' ? 'none' : 'block'};">
                        <label for="accountOrUpi" class="form-label">Account Number / UPI ID</label>
                        <input type="text" id="accountOrUpi" class="form-control" placeholder="Enter Account Number or UPI ID">
                    </div>
                    <div class="mt-3" id="rejectionReasonContainer" style="display: ${status === 'rejected' || status === 'pending' ? 'block' : 'none'};">
                        <label for="rejectionReason" class="form-label">Reason:</label>
                        <textarea id="rejectionReason" class="form-control" placeholder="Enter reason for rejection"></textarea>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: "Submit",
            }).then((result) => {
                if (result.isConfirmed) {
                    const paymentMode = document.getElementById('paymentMode') ? document.getElementById('paymentMode').value : null;
                    const accountOrUpi = document.getElementById('accountOrUpi') ? document.getElementById('accountOrUpi').value : null;
                    const rejectionReason = document.getElementById('rejectionReason') ? document.getElementById('rejectionReason').value : null;

                    $.ajax({
                        url: "{{ route('admin.updateWithdrawlStatus') }}",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            withdrawl_id: requestid,
                            user_id: userid,
                            status: status,
                            paymentMode: paymentMode,
                            accountOrUpi: accountOrUpi,
                            rejectionReason: rejectionReason
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Success",
                                text: "Status updated successfully!",
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: "Error",
                                text: "Failed to update status.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });
                }
            });
        }
    </script>
</x-app-layout>
