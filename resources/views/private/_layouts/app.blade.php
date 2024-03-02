<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titre')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets_private/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_private/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets_private/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets_private/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets_private/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @if(request()->routeIs('public.inscription') == false)
        @include('private._layouts.navbar')
        @endif
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->

            @if(request()->routeIs('public.inscription') == false)
            @include('private._layouts.sidebar')
            @endif

            <!-- partial -->
            @yield('contenu')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('assets_private/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('assets_private/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets_private/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets_private/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets_private/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets_private/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets_private/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets_private/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets_private/js/data-table.js') }}"></script>
    <script src="{{ asset('assets_private/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets_private/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->

    <script src="{{ asset('assets_private/js/jquery.cookie.js') }}" type="text/javascript"></script>
</body>

</html>