<?php

namespace App\Support;

class User extends Deezer
{
    const OBJECT_SERVICE = 'user';

    function __construct() { parent::__construct(); }

    function getUser($userId)
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $userId);
        $userInfo = $this->communicate('', 'GET', $request);

        return $userInfo;
    }

    function getUserPlaylists($userId)
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $userId, 'playlists');
        $userPlaylist = $this->communicate('', 'GET', $request);

        return $userPlaylist;
    }

}
