<?php
    $data = [];
?>
<!DOCTYPE html>
<html lang="en">

        @include('front.includes.header', $data)

        @yield('content')

        @include('front.includes.footer', $data)

</html>
