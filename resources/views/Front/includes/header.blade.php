<?php
    $user = Session::get('user');
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
    <body class="sb-nav-fixed">
        <div class="clientMessage"></div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand text-front" href="{{route('front.home')}}">deezer-api-project</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Space-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw text-front"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('front.home.deezer.logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-footer d-flex justify-content-center">
                        <div class="d-block">
                            <div class="row">
                                <img src="{{ $user->picture }}" title="{{'@'. $user->name }} profile picture"  width="150px" style="border-radius: 50%">
                            </div>
                            <div class="row">
                                <span class="text-white my-2">{{ $user->firstname }} {{ $user->lastname }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="{{route('front.home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{route('front.home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-solar-panel"></i></div>
                                Painel
                            </a>
                            <a class="nav-link" href="{{route('front.home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Pessoal
                            </a>
{{--
                            <div class="sb-sidenav-menu-heading">Cadastros</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Cadastros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('front.home')}}">Usuários</a>
                                    <a class="nav-link" href="{{route('front.home')}}">Equipes</a>
                                    <a class="nav-link" href="{{route('front.home')}}">Categorias</a>
                                    <a class="nav-link" href="{{route('front.home')}}">Tarefas</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Relatórios</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRel" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Gráficos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRel" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('front.home')}}">Individual</a>
                                    <a class="nav-link" href="{{route('front.home')}}">Equipe</a>
                                </nav>
                            </div> --}}

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                    </div>
                </nav>
            </div>

