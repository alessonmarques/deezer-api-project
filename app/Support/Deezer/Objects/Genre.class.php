<?php

namespace app\Support;

class Genre extends DeezerObject
{
    const OBJECT_SERVICE        = 'genre';
    const OBJECT_PLAYER_TYPE    = 'genre';

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

    function getArtists($parameters = [])
    {

        $request = new ApiUrn($this::OBJECT_SERVICE, 'id', 'artists', $parameters);
        $data = json_encode([]);
        $genreArtists = $this->communicate($data, 'GET', $request);

        return $genreArtists;
    }

    function getPodcasts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, 'id', 'podcasts', $parameters);
        $data = json_encode([]);
        $genrePodcasts = $this->communicate($data, 'GET', $request);

        return $genrePodcasts;
    }

    function getRadios($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, 'id', 'radios', $parameters);
        $data = json_encode([]);
        $genreRadios = $this->communicate($data, 'GET', $request);

        return $genreRadios;
    }


    //
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->picture_medium;
        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);
        $gridObjectData->title         = $item->title;
        $gridObjectData->description   = "{$item->fans} fans";

        return $gridObjectData;
    }


}
