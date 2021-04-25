@extends('layouts.customer.app')
@section('content')
 <!-- Preloader-->
 <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Setting Popup Card-->
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container">
        <!-- Header Content-->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
          <!-- Back Button-->
          <div class="back-button"><a href="{{ route('baseurl') }}"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
</svg></a></div>
          <!-- Page Title-->

          <!-- Settings-->
<defs>
<linearGradient spreadMethod="pad" id="gradientSettings" x1="0%" y1="0%" x2="100%" y2="100%">
<stop offset="0" style="stop-color: #0134d4; stop-opacity:1;"/>
<stop offset="100%" style="stop-color: #28a745; stop-opacity:1;"/>
</linearGradient>
</defs>
<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg><span></span></a></div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Contact Form-->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="mb-3">Erbil - Warehouse</h5>
            <p>Erbil </br>Phone : +964 751 023 9649 </br> Phone : +964 750 472 44 82 </br> Email : info@chinazebraft.com </br> Website : www.chinazebraft.com</p>
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d716.8184866661927!2d44.02188042171499!3d36.18208226457432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x400723a77b7d486d%3A0x8aa3fcdff1e25e5a!2sSaidawa%2C%20Erbil!3m2!1d36.182521799999996!2d44.022107899999995!5e0!3m2!1sen!2siq!4v1616617973542!5m2!1sen!2siq" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- Contact Form-->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="mb-3">China - Air</h5>
            <p>收货人：胡先生 </br>收货地址：广东省 深圳市 龙华区 龙华三联路弓村17巷3号</br> 手机：18576414610 </br> Email: andy@chinazebraft.com</br> Website : www.chinazebraft.com</p>
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.8322851351027!2d114.02536531542347!3d22.66004093546495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34038c8c8f471a63%3A0x1e3f4f2efb9673f0!2sGongcun%20Villa!5e0!3m2!1sen!2siq!4v1616617646216!5m2!1sen!2siq" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

          </div>
        </div>

        <!-- Contact Form-->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="mb-3">China - Sea</h5>
            <p>收货人：赵霞 （rola)</br>收货地址：浙江省 义乌市 苏溪大道530号 6号仓库 </br> 手机：13819953069 </br> Email: andy@chinazebraft.com</br> Website : www.chinazebraft.com</p>
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3475.9992166558795!2d120.12622831510012!3d29.399578982121547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x344bffd93f99bb59%3A0xa43988b57d08199c!2s530%20Suxi%20Ave%2C%20Yiwu%20Shi%2C%20Jinhua%20Shi%2C%20Zhejiang%20Sheng%2C%20China%2C%20322010!5e0!3m2!1sen!2siq!4v1616618547535!5m2!1sen!2siq" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
