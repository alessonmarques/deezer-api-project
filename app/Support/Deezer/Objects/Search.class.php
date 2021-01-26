<?php

namespace app\Support;

class Search extends DeezerObject
{
    const OBJECT_SERVICE = 'search';

    protected $id;

    function __construct()
    {
        parent::__construct();
    }

    function getBroad($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', '', $parameters);
        $searchAlbum = $this->communicate('', 'GET', $request);

        return $searchAlbum;
    }

    function getAlbum($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'album', $parameters);
        $searchAlbum = $this->communicate('', 'GET', $request);

        return $searchAlbum;
    }

    function getArtist($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'artist', $parameters);
        $searchArtist = $this->communicate('', 'GET', $request);

        return $searchArtist;
    }

    function getHistory($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'history', $parameters);
        $searchHistory = $this->communicate('', 'GET', $request);

        return $searchHistory;
    }

    function getPlaylist($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'playlist', $parameters);
        $searchPlaylist = $this->communicate('', 'GET', $request);

        return $searchPlaylist;
    }

    function getPodcast($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'podcast', $parameters);
        $searchPodcast = $this->communicate('', 'GET', $request);

        return $searchPodcast;
    }

    function getRadio($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'radio', $parameters);
        $searchRadio = $this->communicate('', 'GET', $request);

        return $searchRadio;
    }

    function getTrack($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'track', $parameters);
        $searchTrack = $this->communicate('', 'GET', $request);

        return $searchTrack;
    }

    function getUser($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, '', 'user', $parameters);
        $searchUser = $this->communicate('', 'GET', $request);

        return $searchUser;
    }


}
