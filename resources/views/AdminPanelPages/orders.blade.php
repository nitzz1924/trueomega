{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'All Orders')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                       <h4 class="fw-semibold mb-8">@yield('title') - ({{ $filteredOrderCount }})</h4>

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
                    <table id="file_export" class="table  table-hover table-bordered display text-nowrap py-3">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Billing Address</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                            @foreach ($orderdata as $row)
                            @php
                                $shippingaddress = json_decode($row->shipping_address, true);
                                $billingaddress = json_decode($row->billing_address, true);
                            @endphp
                            <tr>
                                <td><a href="{{ route('admin.editorder',['id' => $row->id]) }}" class="text-primary">#00{{ $row->id}} - {{$billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name']}}</a></td>
                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('M d, Y') }}</td>
                                <td>{{ $billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name'] . ', ' . ucwords($billingaddress['b-street-address']) . ', ' . ucfirst($billingaddress['b-city']) . ' ' . $billingaddress['b-postcode'] . ', ' . $billingaddress['b-state'] . ', ' . $billingaddress['b-country'] }}</td>
                                <td>₹ {{ $row->grandtotal}} /-</td>
                                <td><span class="badge text-bg-light">{{ $row->orderstatus}}</span></td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ route('admin.orderinvoice',['id' => $row->id]) }}" class="link-primary fs-6" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Invoice"><i class="ti ti-file-invoice"></i></a>
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete('{{ $row->id }}')" class="link-danger fs-6"><i class="ti ti-trash"></i></button>
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
