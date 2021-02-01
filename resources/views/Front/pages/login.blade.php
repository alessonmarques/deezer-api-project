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

</head>
<body class="sb-nav-fixed bg-dark">

    <div class="card-md">
        <div id="layoutSidenav_content">

            <div class="row d-flex vh-100">
                <div class="container d-flex align-items-center justify-content-center">
                    <div>
                        <div class="row">
                            <div class="logo">
                                <span class="h1 text-front text-center bold">deezer-api-project</span>
                            </div>
                        </div>
                        <div class="row card p-5">
                            <div class="form-group my-3">
                                <a href="{{ route('front.access.login') }}"
                                    target="popup"
                                    class="btn btn-block btn-front"
                                    onclick="window.open('{{route('front.access.login')}}','popup','width=800,height=475'); return false;">
                                    Login
                                </a>
                            </div>
                        </div>
                        <div class="row d-block text-light text-center">
                            Developed by <a href="https://alesson.com.br/" class="text-front">www.<b>alesson</b>.com.br</a>
                        </div>
                    </div>
                </div>
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
