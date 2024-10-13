<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <title>CBT| {{ $title ?? '' }}</title>
    <link data-navigate-once rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link data-navigate-once rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <script data-navigate-once src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/js/config.js') }}"></script>
    <link data-navigate-once rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    @stack('css')
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <x-sidebar/>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <x-navbar/>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                CBT /<span class="text-muted fw-light">Nama Halaman</span>
              </h4>
                {{ $slot }}
            </div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Layout wrapper -->
    <!-- / Layout wrapper -->

    {{-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> --}}

    <!-- Core JS -->
    {{-- <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script> --}}

    <script data-navigate-once src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script data-navigate-once src="{{ asset('assets/js/navigate.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script data-navigate-once src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script data-navigate src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/js/main.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script data-navigate-once async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <script data-navigate-once src="{{ asset('assets/js/notif.js') }}"></script>
    @stack('js')
  </body>
</html>
