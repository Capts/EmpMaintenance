<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body class="hold-transition{{ Auth::check() ? ' sidebar-mini' : ' login-page' }}">
    <div id="app" class="wrapper">
        @if(!Auth::guest())
            @include('partials._nav')
            @include('partials._admin-sidebar')
        @endif
        <div class="{{ Auth::check() ? ' content-wrapper p-0' : '' }}">
          
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/fastclick/fastclick.js')}}"></script>
    @stack('scripts')
    
</body>
</html>
