<?php

namespace App\Support;

class User extends Deezer
{
    const OBJECT_SERVICE = 'user';

    protected $id;

    function __construct($id = 0)
    {
        parent::__construct();

        if(isset($id) && !empty($id))
        {
            $this->setId($id);
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function get()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id);
        $userInfo = $this->communicate('', 'GET', $request);
        $this->set($userInfo);

        return $userInfo;
    }

    function getPermissions()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'permissions');
        $userPermissions = $this->communicate('', 'GET', $request);

        return $userPermissions;
    }

    function getFlow()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'flow');
        $userFlow = $this->communicate('', 'GET', $request);

        return $userFlow;
    }

    function getPlaylists()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'playlists');
        $userPlaylist = $this->communicate('', 'GET', $request);

        return $userPlaylist;
    }

    private function set($userInfo)
    {
        $userInfo = json_decode($userInfo);
        foreach($userInfo as $attribute => $value)
        {
            $this->$attribute = $value;
        }
    }

}
