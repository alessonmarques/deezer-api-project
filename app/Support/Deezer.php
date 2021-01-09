<?php

namespace App\Support;

use Exception;
use App\Support\ApiUrn;

class Deezer extends ApiStandard
{
    function __construct()
    {
        $baseUrl          =   'https://api.deezer.com/';
        $sslStatus        =   true;

        parent::__construct($baseUrl, $sslStatus);
    }

    function getUser($userId)
    {
        $request = new ApiUrn('user', $userId);
        $userInfo = $this->communicate('', 'GET', $request);

        return $userInfo;
    }

    function getUserPlaylists($userId)
    {
        $request = new ApiUrn('user', $userId, 'playlists');
        $userPlaylist = $this->communicate('', 'GET', $request);

        return $userPlaylist;
    }

}
