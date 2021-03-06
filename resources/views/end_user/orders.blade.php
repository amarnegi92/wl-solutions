@extends('layouts.customer.app')
@section('content')
<!-- Setting Popup Card-->
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content-->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button-->
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Orders</h6>
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
        <!-- Element Heading-->
        <div class="element-heading">
            <h6>List Of Orderes</h6>
        </div>
    </div>
    <?php
    // dd($all_orders);
    // "id" => 1
    // "order_number" => "asdas"
    // "conf_date" => "2021-02-25"
    // "customer_code" => "1"
    // "status" => 0
    // "description" => "adsdasdasd"
    // "created_at" => "2021-02-24T07:27:30.000000Z"
    // "updated_at" => "2021-02-26T09:45:08.000000Z"
    $class = null;
    ?>
    <div class="container">
        @if(isset($all_orders) && is_array($all_orders))
        @foreach($all_orders as $order)
        @php
        if($order['status'] == '0'){
        $class = 'bg-info';
        } elseif($order['status'] == '1'){
        $class = 'bg-info';
        } elseif ($order['status'] == '2') {
        $class = 'bg-danger';
        } elseif ($order['status'] == '3') {
        $class = 'bg-info';
        } elseif ($order['status'] == '4') {
        $class = 'bg-info';
        }
        @endphp
        <!-- Timeline Content-->
        <div class="card timeline-card {!! $class !!}">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill"><?php echo date('d/m/Y', strtotime($order['conf_date'])); ?></span>
                        <h6>Order No. : {!! $order['order_number'] !!}</h6>
                    </div>
                    <div class="timeline-icon mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#4a90e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
                <p class="mb-2">{!! $order['description'] !!}</p>
            </div>
        </div>
        <!-- Timeline Content-->
        @endforeach
        @endif
    </div>
</div>
@include('end_user.footer')
@endsection