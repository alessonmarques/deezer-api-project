<?php

namespace app\Support;

class Track extends DeezerObject
{
    const OBJECT_SERVICE = 'track';
    const OBJECT_PLAYER_TYPE = 'tracks';

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
    function getGridData($item)
    {
        $gridObjectData = new \stdClass();

        $gridObjectData->cover         = $item->album->cover_medium;

        $gridObjectData->access_link   = route('front.home', []);
        $gridObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);

        $gridObjectData->title         = $item->title;

        $gridObjectData->description   = "";

        return $gridObjectData;
    }

    //
    function getListData($item)
    {
        $listObjectData = new \stdClass();

        $listObjectData->access_link   = route('front.home', []);
        $listObjectData->play_link     = route('front.home.deezer.play', ['type' => $this::OBJECT_PLAYER_TYPE, 'id' => $item->id]);

        $listObjectData->title         = $item->title;
        $listObjectData->arist         = $item->artist->name;
        $listObjectData->album         = $item->album->title;

        $listObjectData->duration      = date('i:s', $item->duration);

        return $listObjectData;
    }


}
