{{----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------}}
@section('title', 'Order - '.'#00'.$order->id)
<x-app-layout>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h4 class="fw-semibold mb-8">@yield('title') Details</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center">
                        <div class="">
                            <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary">
                                <i class="ti ti-arrow-narrow-left"></i> All Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @php
                        $shippingaddress = json_decode($order->shipping_address, true);
                        $billingaddress = json_decode($order->billing_address, true);
                        $products = json_decode($order->products, true);
                        @endphp
                        <div class="row">
                            <!-- General -->
                            <div class="col-md-4">
                                <h5 class="mb-3">General</h5>
                                <p><strong>Date created:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</p>
                                <p><strong>Customer:</strong> {{ ucwords($billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name']) }}</p>
                            </div>

                            <!-- Billing -->
                            <div class="col-md-4">
                                <h5 class="mb-3">Billing Address</h5>
                                <p><strong>Name:</strong> {{ $billingaddress['b-first-name'] . ' ' . $billingaddress['b-last-name'] }}</p>
                                <p><strong>Company:</strong> {{ $billingaddress['b-company-name'] }}</p>
                                <p>{{ $billingaddress['b-street-address'] }}</p>
                                <p>{{ $billingaddress['b-apartment'] }}</p>
                                <p>{{ $billingaddress['b-city'] . ' ' . $billingaddress['b-postcode'] }}</p>
                                <p>{{ $billingaddress['b-state'] }}</p>
                                <p><strong>Email:</strong> <a href="mailto:{{ $billingaddress['b-email'] }}">{{ $billingaddress['b-email'] }}</a></p>
                                <p><strong>Phone:</strong> <a href="tel:{{ $billingaddress['b-phone'] }}">{{ $billingaddress['b-phone'] }}</a></p>
                            </div>

                            <!-- Shipping -->
                            @if ($shippingaddress)
                            <div class="col-md-4">
                                <h5 class="mb-3">Shipping Address</h5>
                                <p><strong>Name:</strong> {{ $shippingaddress['s-first-name'] . ' ' . $shippingaddress['s-last-name'] }}</p>
                                <p>{{ $shippingaddress['s-street-address'] }}</p>
                                <p>{{ $shippingaddress['s-apartment'] }}</p>
                                <p>{{ $shippingaddress['s-city'] . ' ' . $shippingaddress['s-postcode'] }}</p>
                                <p>{{ $shippingaddress['s-state'] }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Items</h5>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th class="text-end">Cost</th>
                                        <th class="text-end">Qty</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/images/Products/' . $product['productimage']) }}" alt="{{ $product['productname'] }}" width="50" class="me-3 rounded">
                                                <div>
                                                    <a href="#" class="fw-bold text-decoration-none">{{ $product['productname'] }}</a><br>
                                                    <small class="text-muted">Product ID: {{ $product['productid'] }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">₹{{ $product['price'] }}</td>
                                        <td class="text-end">× {{ $product['quantity'] }}</td>
                                        <td class="text-end fw-semibold">₹{{ $product['price'] * $product['quantity'] }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Items Subtotal:</strong></td>
                                        <td class="text-end fw-semibold">₹{{ array_sum(array_map(fn($product) => $product['price'] * $product['quantity'], $products)) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                        <td class="text-end fw-semibold">₹100</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>GST ({{ $gstpercent }}%):</strong></td>
                                        <td class="text-end fw-semibold">₹{{ round(array_sum(array_map(fn($product) => $product['price'] * $product['quantity'], $products)) * ($gstpercent / 100), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Order Total:</strong></td>
                                        <td class="text-end fw-bold fs-6">₹{{ array_sum(array_map(fn($product) => $product['price'] * $product['quantity'], $products)) + 100 + round(array_sum(array_map(fn($product) => $product['price'] * $product['quantity'], $products)) * ($gstpercent / 100), 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="card">
                        <form action="{{route('admin.updateOrderStatus',['id'=>$order->id])}}" method="POST" class="form-horizontal">
                        @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-7">
                                    <h4 class="card-title">Set Order Status</h4>
                                    <div class="p-2 h-100  rounded-circle"></div>
                                </div>
                                <div>
                                    <select name="status" class="form-select mr-sm-2 mb-2" id="inlineFormCustomSelect" required>
                                        <option selected="">--select status--</option>
                                        @foreach($MasterOrderStatus as $key => $row)
                                        <option value="{{$row->label}}" {{$row->label == $order->orderstatus ? 'selected' : ''}}>{{$row->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="submitAllForms" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</x-app-layout>
