{{------------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏---------------------------------------------------- --}}
@extends('layouts.UserPanelLayouts.user')
@section('title','My Wallet')
@section('user-content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="fw-semibold mb-8">₹ {{$totalCommission}} /-</h4>
                    <h4 class="fw-semibold mb-8">Wallet Amount</h4>
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
                                <span>Withdrawls</span>
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
                            <div class="row">
                                <div class="col-md-8">
                                    <p>
                                        Raw denim you probably haven't heard of them jean
                                        shorts Austin. Nesciunt tofu stumptown aliqua,
                                        retro synth master cleanse. Mustache cliche
                                        tempor, williamsburg carles vegan helvetica.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/blog/blog-img1.jpg" alt="modernize-img" class="img-fluid" />
                                </div>
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
