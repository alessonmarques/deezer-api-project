<?php

namespace app\Support;

class Artist extends DeezerObject
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
}
