<?php

namespace app\Support;

class Playlist extends DeezerObject
{
    const OBJECT_SERVICE = 'playlist';

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


    function getSeen($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'seen', $parameters);
        $playlistSeen = $this->communicate('', 'GET', $request);

        return $playlistSeen;
    }

    function getComments($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'comments', $parameters);
        $playlistComments = $this->communicate('', 'GET', $request);

        return $playlistComments;
    }

    function getFans($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'fans', $parameters);
        $playlistFans = $this->communicate('', 'GET', $request);

        return $playlistFans;
    }

    function getTracks($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'tracks', $parameters);
        $playlistTracks = $this->communicate('', 'GET', $request);

        return $playlistTracks;
    }

    function getRadio($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'radio', $parameters);
        $playlistRadio = $this->communicate('', 'GET', $request);

        return $playlistRadio;
    }



}
