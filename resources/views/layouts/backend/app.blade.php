<!doctype html>
<html lang="en">
<head>
    @include('layouts.backend.partial.head')
   @stack('css')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    @include('layouts.backend.partial.header')
    @include('layouts.backend.partial.sidebar')
    @yield('content')

    @include('layouts.backend.partial.footer')
    @stack('js')

</div>
</body>
</html>