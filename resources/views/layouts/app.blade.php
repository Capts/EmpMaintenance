<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>
    <div id="app">
       @if(Auth::guest())
       @else
        @include('partials._nav')
       @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
