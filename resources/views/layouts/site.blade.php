<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Marketplace</title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
{{--    <x-sidebar></x-sidebar>--}}

    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <x-navigation></x-navigation>

        <!-- Page content-->
        <div style="padding-left: 6px;">
            <h1>СТОРОНА ПОЛЬЗОВАТЕЛЯ</h1>
            {{ Auth::check() ? Auth::user()->name : "пользователь не найден" }}
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('myTasks', ['userId' => Auth::user()->id]) }}">перейти в админку</a>
            @endif
            @yield('content')
        </div>

    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>
