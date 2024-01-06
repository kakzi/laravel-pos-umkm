@extends('layouts.app')

@section('title', 'Order Detail')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Invoice</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                    <h2>Invoice</h2>
                    <div class="invoice-number">{{ $order->invoice }}</div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-6">
                        <address>
                        <strong>Billed To:</strong><br>
                            Showroom UMKM<br>
                            Jln. Raya Ringin Tunggal No.01<br>
                            Desa Ringin Tunggal - Gayam<br>
                            Jawa Timur, Indonesia
                        </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <address>
                        <strong>Shipped To:</strong><br>
                        Muhamad Nauval Azhar<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Bogor Barat, Indonesia
                        </address>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <address>
                        <strong>Payment Method:</strong><br>
                        {{ $order->payment_method }}<br>
                        </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <address>
                        <strong>Order Date:</strong><br>
                        {{ $order->transaction_time }}<br><br>
                        </address>
                    </div>
                    </div>
                </div>
                </div>
                
                <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Semua data pesanan tidak bisa di hapus!</p>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <tr>
                        {{-- <th data-width="40">#</th> --}}
                        <th>Product Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Totals</th>
                        </tr>
                        @foreach ($orderItems as $item)
                        <tr>
                            {{-- <td>{{ $i=1; $i++ }}</td> --}}
                            <td>{{ $item->product->name }}</td>
                            </td>
                            <td class="text-center">
                                @currency($item->product->price)
                            </td>
                            <td class="text-center">
                                {{ $item->quantity }}
                            </td>
                            <td class="text-right">
                                @currency($item->total_price)
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    </div>
                    <div class="row mt-4">
                    <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                        <div class="images">
                        <img src="{{ asset('/img/qris_logo.png') }}" width="150" alt="qris">
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Total Item</div>
                        <div class="invoice-detail-value">{{ $order->total_item }}</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Total</div>
                        <div class="invoice-detail-value invoice-detail-value-lg">@currency($order->total_price)</div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                </div>
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
