<?php

namespace app\Support;

class Radio extends DeezerObject
{
    const OBJECT_SERVICE = 'radio';
    const OBJECT_PLAYER_TYPE    = 'radios';

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

    function getGenres($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'genres', $parameters);
        $radioGenres = $this->communicate('', 'GET', $request);

        return $radioGenres;
    }

    function getTop($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'top', $parameters);
        $radioTop = $this->communicate('', 'GET', $request);

        return $radioTop;
    }

    function getTracks($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'tracks', $parameters);
        $radioTracks = $this->communicate('', 'GET', $request);

        return $radioTracks;
    }

    function getLists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'lists', $parameters);
        $radioLists = $this->communicate('', 'GET', $request);

        return $radioLists;
    }

    //
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->picture_medium;
        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]); //FIX IT
        $gridObjectData->title         = $item->title;
        $gridObjectData->description   = '';

        return $gridObjectData;
    }


}
