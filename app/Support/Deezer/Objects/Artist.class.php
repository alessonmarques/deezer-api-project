<?php

namespace App\Support;

class Artist extends Deezer
{
    const OBJECT_SERVICE = 'artist';

    protected $id;

    function __construct($id = 0)
    {
        parent::__construct();

        if(isset($id) && !empty($id))
        {
            $this->setId($id);
            $this->get();
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function get()
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id);
        $artistInfo = $this->communicate('', 'GET', $request);
        $this->set($artistInfo);

        return $artistInfo;
    }


    function getTop($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'top', $parameters);
        $artistTop = $this->communicate('', 'GET', $request);

        return $artistTop;
    }

    function getAlbums($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'albums', $parameters);
        $artistAlbums = $this->communicate('', 'GET', $request);

        return $artistAlbums;
    }

    function getComments($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'comments', $parameters);
        $artistComments = $this->communicate('', 'GET', $request);

        return $artistComments;
    }

    function getFans($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'fans', $parameters);
        $artistFans = $this->communicate('', 'GET', $request);

        return $artistFans;
    }

    function getRelated($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'related', $parameters);
        $artistRelated = $this->communicate('', 'GET', $request);

        return $artistRelated;
    }

    function getRadio($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'radio', $parameters);
        $artistRadio = $this->communicate('', 'GET', $request);

        return $artistRadio;
    }

    function getPlaylists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'playlists', $parameters);
        $artistPlaylists = $this->communicate('', 'GET', $request);

        return $artistPlaylists;
    }

    //
    private function set($classInfo)
    {
        $classInfo = json_decode($classInfo);
        foreach($classInfo as $attribute => $value)
        {
            $this->$attribute = $value;
        }
    }

}
