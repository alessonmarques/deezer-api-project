<?php
    $data = [];
?>
<!DOCTYPE html>
<html lang="pt-BR">

        @include('front.includes.header', $data)

        @yield('content')

        @include('front.includes.footer', $data)

</html>
