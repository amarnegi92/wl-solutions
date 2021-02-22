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
    <div class="container">
        <!-- Timeline Content-->
        <div class="card timeline-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">21/1/2020 </span>
                        <h6>Order No. : 3545</h6>
                    </div>
                    <div class="timeline-icon mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#4a90e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
                <p class="mb-2">Text description one is ready and there are more space to wirte the description</p>
                <div class="timeline-tags"><span class="badge bg-light text-dark">Arrived To Erbil</span></div>
            </div>
        </div>
        <!-- Timeline Content-->
        <div class="card timeline-card bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">21/1/2020</span>
                        <h6>Order No. : 5412</h6>
                    </div>
                    <div class="timeline-icon mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f8e71c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                </div>
                <p class="mb-2">Website design and development.</p>
                <div class="timeline-tags"><span class="badge bg-light text-dark">In Transet</span></div>
            </div>
        </div>

        <!-- Timeline Content-->
        <div class="card timeline-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">21/1/2020 </span>
                        <h6>Order No. : 3545</h6>
                    </div>
                    <div class="timeline-icon mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#4a90e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
                <p class="mb-2">Text description one is ready and there are more space to wirte the description</p>
                <div class="timeline-tags"><span class="badge bg-light text-dark">Arrived To Erbil</span></div>
            </div>
        </div>
        <!-- Timeline Content-->
        <div class="card timeline-card bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">21/1/2020</span>
                        <h6>Order No. : 5412</h6>
                    </div>
                    <div class="timeline-icon mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f8e71c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                </div>
                <p class="mb-2">Website design and development.</p>
                <div class="timeline-tags"><span class="badge bg-light text-dark">In Transet</span></div>
            </div>
        </div>
        <!-- Timeline Content-->

    </div>
</div>
@include('end_user.footer')
@endsection