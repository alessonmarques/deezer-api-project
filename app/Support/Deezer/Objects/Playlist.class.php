<?php

namespace app\Support;

class Playlist extends DeezerObject
{
    const OBJECT_SERVICE        = 'playlist';
    const OBJECT_PLAYER_TYPE    = 'playlist';

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

    //
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->picture_medium;
        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);
        $gridObjectData->title         = $item->title;
        $gridObjectData->description   = "{$item->nb_tracks} tracks";

        return $gridObjectData;
    }


}
