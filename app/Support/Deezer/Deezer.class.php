<?php

namespace App\Support;

class Deezer extends ApiStandard
{
    function __construct()
    {
        $baseUrl          =   'https://api.deezer.com/';
        $sslStatus        =   true;

        parent::__construct($baseUrl, $sslStatus);
    }

}
