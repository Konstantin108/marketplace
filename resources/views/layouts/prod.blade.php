<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://kit.fontawesome.com/4bd251a57a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <div class="top">

        <x-header></x-header>
        <x-prod-navigation></x-prod-navigation>
        
        <!-- Page content-->
        @yield('content')

    </div>

    <x-footer></x-footer>
</div>
</body>
</html>


