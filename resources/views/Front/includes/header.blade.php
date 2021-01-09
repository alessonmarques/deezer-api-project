<?php

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

    <body class="d-flex h-100 text-center text-white bg-dark text-white">
        <div class="clientMessage"></div>
