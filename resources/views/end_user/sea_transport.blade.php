@extends('layouts.customer.app')
@section('content')
<!-- Internet Connection Status-->
<!-- Setting Popup Card-->
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Paste your Header Content from here-->
        <!-- Header Content-->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button-->

            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-1">Invoice</h6>
            </div>
            <!-- Settings-->

            <defs>
                <linearGradient spreadMethod="pad" id="gradientSettings" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0" style="stop-color: #0134d4; stop-opacity:1;" />
                    <stop offset="100%" style="stop-color: #28a745; stop-opacity:1;" />
                </linearGradient>
            </defs>
            <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
            <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
            </svg><span></span></a>
        </div>
    </div>
</div>
<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card invoice-card shadow">
            <div class="card-body">
                <!-- Download Invoice-->
                <!-- Invoice Info-->
                <div class="invoice-info text-end mb-4">
                    <h5 class="mb-1">Orders</h5>
                </div>
                <!-- Invoice Table-->
                <div class="invoice-table">
                    <div class="table-responsive">
                        @if(count($batch))
                            <table class="table table-bordered caption-top">
                                <caption>List of orders</caption>
                                <thead class="table-light">
                                    <tr>
                                        <th>Patch No.</th>
                                        <th>Order No.</th>
                                        <th>Date</th>
                                        <th>Desc.</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     
                                        @foreach($batch as $batchId => $batch_val)
                                            <tr>
                                                <td>{!! $batchId !!}</td>
                                                <td>{!! implode('<br>',$batch_val['order_number']) !!}</td>
                                                <td>{!! $batch_val['date'] !!}</td>
                                                <td>{!! $batch_val['description'] !!}</td>
                                                <td>
                                                    <div class="alert alert-primary" role="alert"><?php echo config('shipment.keyStatus.' . $batch_val['status']); ?></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Record Found</p> 
                        @endif
                    </div>
                </div>
                <p class="mb-0">Notice:</p>
            </div>
        </div>
    </div>
</div>
@include('end_user.footer')
@endsection