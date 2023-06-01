<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- devtools -->
    <script src="http://localhost:8097"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">


    <!-- Scripts -->
    import './resources/css/app.css';
    import './resources/js/app.js';

<!-- @vite([
            'resources/css/app.css',
            'resources/js/app.js'         
           ]) -->

             @livewireStyles
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="wrapper">
       <!--  ========== Left Sidebar Start ========== --> 
        @include('layouts.shared.leftsidebar')
        <div class="content-page">
            <div class="content">

                <!-- Topbar Start -->
                @include('layouts.shared.navbar')

                <!-- Start Content-->
                
                <main>
                    {{ $slot }}
                </main>

            </div>

            <!-- Footer Start -->
            @include('layouts.shared.footer')
        </div>


    </div>
    <!-- Right Sidebar -->
    @include('layouts.shared.rightsidebar')

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

     <!-- bundle -->
     <script src="{{URL::asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{URL::asset('assets/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{URL::asset('assets/js/pages/demo.dashboard.js')}}"></script>
        <!-- end demo js-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @livewireScripts
       
        @yield('custom_script')
</body>

</html>