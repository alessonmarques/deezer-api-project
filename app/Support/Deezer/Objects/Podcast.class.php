<?php

namespace app\Support;

class Podcast extends DeezerObject
{
    const OBJECT_SERVICE = 'podcast';
    const OBJECT_PLAYER_TYPE = 'podcast';

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


    function getPodcast($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'episodes', $parameters);
        $podcastEpisodes = $this->communicate('', 'GET', $request);

        return $podcastEpisodes;
    }

    //
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->picture_medium;
        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);
        $gridObjectData->title         = $item->title;
        $gridObjectData->information   = $item->description;
        $gridObjectData->description   = "{$item->fans} fans";

        return $gridObjectData;
    }
}
