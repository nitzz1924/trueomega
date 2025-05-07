{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','My Wallet')
@section('user-content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="fw-semibold mb-8">Wallet Amount</h4>
                    <h4 class="fw-semibold mb-8">₹ {{$totalwalletamount}} /-</h4>
                </div>
                @if($totalwalletamount > 0)
                <div class="col-md-2 d-flex justify-content-end align-items-center">
                    <div class="mt-0">
                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vertical-center-modal">
                            <i class="ti ti-wallet"></i> Withdrawl Amount
                        </a>
                    </div>
                </div>
                @else
                <div class="col-md-2 d-flex justify-content-end align-items-center">
                    <div class="mt-0">
                        <a href="#" class="btn btn-outline-primary disabled" data-bs-toggle="modal" data-bs-target="#vertical-center-modal">
                            <i class="ti ti-wallet"></i> Withdrawl Amount
                        </a>
                    </div>
                    @endif
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
                                    <span>My Withdrawls</span>
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
                                                <th>Given On</th>
                                                <th>Commission By</th>
                                                <th>Commission Amount</th>
                                                <th>Commission Percentage</th>
                                                <th>On Amount</th>
                                                <th>Given Month</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            @foreach ($mycommissions as $index => $com)
                                            <tr>
                                                <td>{{ $index + 1}}</td>
                                                <td>{{ $com->created_at->format('d M Y | h:i A')}}</td>
                                                <td>{{ $com->childname  }}</td>
                                                <td>₹ {{ $com->comm_amount}} /-</td>
                                                <td>{{ $com->comm_percentage}} %</td>
                                                <td>₹ {{ $com->order_amount}} /-</td>
                                                <td>{{ $com->comm_month}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="navpill-222" role="tabpanel">
                                <div class="">
                                    <table id="file_export" class="table table-hover table-bordered display text-nowrap py-3">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Withdrawl On</th>
                                                <th>Withdrawl Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            @foreach ($mywithdrawls as $index => $with)
                                            <tr>
                                                <td>{{ $index + 1}}</td>
                                                <td>{{ $with->created_at->format('d M Y | h:i A')}}</td>
                                                <td>₹ {{ $with->withdrawl_amt}} /-</td>
                                                <td>
                                                    @if($with->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                    @elseif($with->status == 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                    <span class="badge bg-info">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#transactionmodal" data-transaction="{{$with->transaction_details}}" data-status="{{$with->status}}" class="text-white text-decoration-none transactionbtn">
                                                            <i class="ti ti-credit-card-pay"></i> View Transaction Details
                                                        </a>
                                                    </span>
                                                    @elseif($with->status == 'rejected')
                                                    <span class="badge bg-danger">Rejected</span>
                                                    <i class="ti ti-help-circle text-dark ms-1  fs-6" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $with->transaction_details ?? 'No reason provided' }}"></i>
                                                    @endif
                                                </td>
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
    <!-- Vertically centered modal -->
    <div class="modal fade" id="transactionmodal" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                       Transaction Details
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalbodytran">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-center" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="vertical-center-modal" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Withdraw Amount
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Current Wallet Balance : <strong>₹ {{$totalwalletamount}} /-</strong> </h5>
                    <p></p>
                    <div class="mt-2 p-2">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="withdrawAmount" class="form-label">Withdraw Amount</label>
                                <input type="text" class="form-control" id="withdrawAmount" name="withdrawAmount" placeholder="Enter amount to withdraw" required>
                            </div>
                            <input type="hidden" id="useridinput" name="user_id" value="{{ Auth::guard('customer')->user()->id }}">
                            <button type="button" class="btn btn-primary sendreqbtn" onclick="validateWithdrawAmount()">Send Request</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-center" data-bs-dismiss="modal">
                        Close
                    </button>
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

        function validateWithdrawAmount() {
            const walletAmount = {{$totalwalletamount}};
            const withdrawAmount = parseFloat(document.getElementById('withdrawAmount').value);
            const userid = parseFloat(document.getElementById('useridinput').value);

            if (isNaN(withdrawAmount) || withdrawAmount <= 0) {
                Swal.fire({
                    title: "Invalid Amount",
                    text: "Please enter a valid amount to withdraw.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            if (withdrawAmount > walletAmount) {
                Swal.fire({
                    title: "Insufficient Balance",
                    text: "The withdrawal amount cannot be greater than the wallet balance.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            } else {
                $.ajax({
                    url: "{{ route('admin.withdrawrequest') }}", // Replace with your route
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        withdrawAmount: withdrawAmount,
                        user_id: userid
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Request Sent to Admin",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload(); // Reload the page to reflect changes
                        });
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.transactionbtn').on('click', function() {
                var transactionDetails = $(this).data('transaction');
                var status = $(this).data('status');
                console.log(transactionDetails);
                $('#modalbodytran').html(`
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Payment Mode</th>
                                <th>Account/UPI</th>
                                <th>Withdrawl Amount</th>
                                <th>Rejection Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${transactionDetails.paymentMode || 'N/A'}</td>
                                <td>${transactionDetails.accountOrUpi || 'N/A'}</td>
                                <td>₹ ${transactionDetails.withdrawl_amt || 'N/A'} /-</td>
                                <td>${status === 'pending' || status === 'rejected' ? transactionDetails.rejectionReason || 'N/A' : 'N/A'}</td>
                            </tr>
                        </tbody>
                    </table>
                `);
            });
        });
    </script>
    @endsection
