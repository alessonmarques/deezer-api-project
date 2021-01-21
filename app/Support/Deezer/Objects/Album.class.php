<?php

namespace app\Support;

use stdClass;

class Album extends DeezerObject
{
    const OBJECT_SERVICE        = 'album';
    const OBJECT_PLAYER_TYPE    = 'album';

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
    //
    function getComments($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'comments', $parameters);
        $albumComments = $this->communicate('', 'GET', $request);

        return $albumComments;
    }

    function getTracks($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'tracks', $parameters);
        $artistTracks = $this->communicate('', 'GET', $request);

        return $artistTracks;
    }

    function getFans($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'fans', $parameters);
        $artistFans = $this->communicate('', 'GET', $request);

        return $artistFans;
    }

    //
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->cover_medium;
        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);
        $gridObjectData->title         = $item->title;
        $gridObjectData->description   = "{$item->nb_tracks} tracks";

        return $gridObjectData;
    }

}
