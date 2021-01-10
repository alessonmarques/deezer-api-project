<?php

namespace App\Support;

class Chart extends Deezer
{
    const OBJECT_SERVICE = 'chart';

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
        $albumInfo = $this->communicate('', 'GET', $request);
        $this->set($albumInfo);

        return $albumInfo;
    }

    function getTracks($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'tracks', $parameters);
        $chartTracks = $this->communicate('', 'GET', $request);

        return $chartTracks;
    }

    function getAlbums($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'albums', $parameters);
        $chartAlbums = $this->communicate('', 'GET', $request);

        return $chartAlbums;
    }

    function getArtists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'artists', $parameters);
        $chartArtists = $this->communicate('', 'GET', $request);

        return $chartArtists;
    }

    function getPlaylists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'playlists', $parameters);
        $chartPlaylists = $this->communicate('', 'GET', $request);

        return $chartPlaylists;
    }

    function getPodcasts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'podcasts', $parameters);
        $chartPodcasts = $this->communicate('', 'GET', $request);

        return $chartPodcasts;
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
