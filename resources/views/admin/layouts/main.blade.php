<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('landing/img/favicon.png') }}" type="image/png">
    <!-- Datatable -->
    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/vendor/select2/css/select2.min.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.partials.navbar')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        @include('admin.partials.sidebar')

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.partials.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>



    <!-- Datatable -->
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/datatables.init.js') }}"></script>
    {{-- Sweet Alert --}}
    <script src="{{ asset('admin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/sweetalert.init.js') }}"></script>

    {{-- Select2 --}}

    <script src="{{ asset('admin/vendor/select2/js/select2.full.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/plugins-init/select2-init.js') }}"></script> --}}


    @yield('scripts')

</body>

</html>
