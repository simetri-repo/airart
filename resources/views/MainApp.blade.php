<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    AIRARTIKENNELS
  </title>
  <!--     Fonts and icons     -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
  {{-- <script src="https://kit.fontawesome.com/60a76559cb.js" crossorigin="anonymous"></script> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
  {{-- <style>
    html,
    body {
      margin: 0;
      max-height: 100% !important;
      overflow: hidden
    }
  </style> --}}
  @yield('style')
</head>

<body class="g-sidenav-show  bg-gray-100">
  {{-- <nav class="navbar navbar-dark bg-light sticky-top ">
    <div class="container-fluid align-items-center justify-content-center">
      <a class="navbar-brand my-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html"
        target="_blank">
        <img src="{{ asset('assets/img/airarti/LOGO_AIRARTIKENNELS.png') }}" class="navbar-brand-img"
          style="height: 80px;" alt="main_logo">
      </a>
    </div>
  </nav> --}}
  {{-- header --}}

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl mt-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100 py-3 bg-dark" style="border-radius: 10px"
      id="sidenav-collapse-main">
      <div class=" bg-transparent mt-1 left-2" align="center">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/img/airarti/LOGO_AIRARTIKENNELS.jpeg') }}" class="navbar-brand-img" alt="main_logo"
            style="border-radius: 20px; width:40%;">
        </a>
      </div>

      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <a class="nav-link  @yield('dashboard') text-light" href="{{ url('/') }}">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-home text-dark fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link @yield('about_us') text-light" href="{{ url('about_us') }}">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-paw text-dark fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">About Us</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link @yield('trah') text-light" href="{{ url('trah') }}">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-stream text-dark fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Trah</span>
          </a>
        </li>
        <li class="nav-item mb-2  ">
          <a class="nav-link @yield('showing') text-light" href="{{ url('showing') }}">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tv text-dark fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Showing</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link  @yield('contact') text-light" href="{{ url('show_contact') }}">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-address-book text-dark fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Contact Us</span>
          </a>
        </li>
      </ul>
      <hr>
      <div class="docs-info p-3 laptop ctc">
        <h6 class="text-white up mb-0">Contact Us : </h6>
        <br>
        {{-- <p class="text-sm text-white">
          <i class="fa fa-map"> </i>
          <xx class="text-bold"> Alamat</xx> : <br> Aries Niaga Blok A1 No. 3A-3B, Jalan Taman Aries, Meruya Utara,
          Kembangan,
          Jakarta Barat,
          DKI 11620, Indonesia
        </p> --}}
        <p class="text-sm text-white">
          <i class="fa fa-envelope"></i>
          <xx class="text-bold"> Email</xx> : <br> marketing@airartikennels.co.id
        </p>
        <p class="text-sm text-white">
          <i class="fa fa-phone"></i>
          <xx class="text-bold"> No</xx> Tlp : <br> +6281 2100 77177
        </p>
        <hr>
      </div>
      <div class="col-sm-12 mx-auto p-2 text-center">
        <!-- Facebook -->
        <a style="color: #3b5998;" href="https://web.facebook.com/airarti.kennels" target="_blank" class="p-2"
          role="button"><i class="fab fa-facebook-f fa-lg"></i></a>

        <!-- Twitter -->
        <a style="color: #55acee;" href="#!" class="p-2" role="button"><i class="fab fa-twitter fa-lg"></i></a>

        <!-- Google -->
        <a style="color: #dd4b39;" href="#!" class="p-2" role="button"><i class="fab fa-google fa-lg"></i></a>

        <!-- Instagram -->
        <a style="color: #ac2bac;" href="https://instagram.com/airartikennels" target="_blank" class="p-2"
          role="button"><i class="fab fa-instagram fa-lg"></i></a>
      </div>
    </div>



  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100  border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-dark px-0 mx-4 mb-4 mt-3 shadow-none border-radius-xl"
      id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-0 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-light">Pages </li>
            <li class="breadcrumb-item text-sm text-light active" aria-current="page">@yield('breadcrumbs')</li>
          </ol>
        </nav>
        <li class="nav-item d-xl-none ps-3 d-flex  align-items-center ">
          <a href="javascript:;" class="nav-link p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="text-light sidenav-toggler-line"></i>
              <i class="text-light sidenav-toggler-line"></i>
              <i class="text-light sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid ">
      @include('sweetalert::alert')
      {{-- start content --}}
      @yield('content')
      {{-- end content--}}
    </div>
  </main>
  {{-- footer --}}
  {{-- <nav class="navbar fixed-bottom navbar-dark bg-dark none-t">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Fixed bottom</a>
    </div>
  </nav> --}}
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>

  @yield('script')

</body>

</html>