<?php
    use Illuminate\Support\Facades\Session;
    use app\Support\User;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>deezer-api-project</title>
    <link rel="stylesheet" href="{{ url(mix('front/css/reset.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('front/css/app.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('front/css/sb_admin.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('front/css/swal.css')) }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    @yield('head-private')
</head>
<body class="sb-nav-fixed bg-dark">

    <div class="card-md">
        <div id="layoutSidenav_content">
            <div class="container">
                <div class="row">
                    <a href="{{ route('front.home.deezer.login') }}"
                        target="popup"
                        onclick="window.open('{{route('front.home.deezer.login')}}','popup','width=800,height=475'); return false;">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url(mix('front/js/jquery.min.js')) }}"></script>
    <script src="{{ url(mix('front/js/bootstrap.bundle.min.js')) }}"></script>
    <script src="{{ url(mix('front/js/sb_admin.js')) }}"></script>
    <script src="{{ url(mix('front/js/swal.min.js')) }}"></script>
    <script src="{{ url(mix('front/js/bootstrap-select.js')) }}"></script>
    <script src="{{ url(mix('front/js/main.js')) }}"></script>

</body>
