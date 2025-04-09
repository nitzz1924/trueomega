{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Invoice')
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">Invoice for Order ID : #00{{$order->id}}</h4>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Invoice</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="card shadow-lg w-75 mx-auto p-4" id="printableArea" style="background-color:rgb(255, 255, 255); border-radius: 12px;">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <div>
                        <img src="{{asset('assets/images/omegafinallogo.png')}}" alt="Truomega" style="height: 50px;">
                    </div>
                    <div class="text-danger fw-semibold fs-5">Invoice</div>
                </div>
                @php
                $shippingaddress = json_decode($order->shipping_address, true);
                $billingaddress = json_decode($order->billing_address, true);
                $products = json_decode($order->products, true);
                @endphp
                <p>Hello, <strong>{{ $billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name'] }}</strong>.<br>Thank you for shopping from our store and for your order.</p>

                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <small class="text-muted">ORDER #00{{$order->id}}</small><br>
                        <small class="text-muted"><strong>{{ $order->created_at->format('d M Y | h:i A') }}</strong></small>
                    </div>
                </div>

                <table class="table table-borderless mb-4">
                    <thead class="border-bottom">
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th></th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-primary fw-semibold">{{ $product['productname'] }}</td>
                            <td class="text-end">₹ {{ $product['price'] }}/-</td>
                            <td class="text-end">x</td>
                            <td class="text-end">{{ $product['quantity'] }}</td>
                            <td class="text-end">₹ {{ number_format($product['price'] * $product['quantity'], 2) }}/-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @php
                $subtotal = array_reduce($products, function ($carry, $product) {
                return $carry + ($product['price'] * $product['quantity']);
                }, 0);
                $gst = $subtotal * ($gstpercent / 100);
                $grandTotal = $subtotal + $gst;
                @endphp
                <div class="text-end mb-4">
                    <p>Subtotal ₹ {{ number_format($subtotal) }}/-</p>
                    <p>GST ({{ $gstpercent }}%) ₹ {{ number_format($gst) }}/-</p>
                    <h5><strong>Grand Total ₹ {{ number_format($grandTotal) }}/-</strong></h5>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <h6 class="fw-bold">BILLING INFORMATION</h6>
                        <p>
                            {{ $billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name'] }}<br>
                            {{ $billingaddress['b-street-address'] }}<br>
                            {{ $billingaddress['b-city'] }}, {{ $billingaddress['b-state'] }}<br>
                            {{ $billingaddress['b-postcode'] }}, {{ $billingaddress['b-country'] }}
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="fw-bold">PAYMENT METHOD</h6>
                        <p>Cash on Delivery</p>
                    </div>
                </div>

                @if ($shippingaddress)
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold">SHIPPING INFORMATION</h6>
                        <p>
                            <strong>Name:</strong> {{ $shippingaddress['s-first-name'] . ' ' . $shippingaddress['s-last-name'] }}<br>
                            {{ $shippingaddress['s-street-address'] }}<br>
                            {{ $shippingaddress['s-apartment'] }}<br>
                            {{ $shippingaddress['s-city'] . ' ' . $shippingaddress['s-postcode'] }}<br>
                            {{ $shippingaddress['s-state'] }}, {{ $shippingaddress['s-country'] }}
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="fw-bold">SHIPPING METHOD</h6>
                        <p>Truomega</p>
                    </div>
                </div>
                @endif


            </div>
            <div class="w-25">
                <div class="card-header">
                    <div class="text-center">
                        <a href="{{route('admin.orders')}}" class="btn btn-dark  print-page ms-6" type="button">
                            <span>
                                <i class="ti ti-arrow-left"></i>
                                Go back
                            </span>
                        </a>
                        <button onclick="printDiv('printableArea')" class="btn btn-primary btn-default print-page ms-6" type="button">
                            <span>
                                <i class="ti ti-printer fs-5"></i>
                                Print
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload(); // Reload to restore original state
        }

    </script>
</x-app-layout>
