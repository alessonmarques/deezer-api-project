<?php

namespace App\Support;

class Album extends Deezer
{
    const OBJECT_SERVICE = 'album';

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
    private function set($classInfo)
    {
        $classInfo = json_decode($classInfo);
        foreach($classInfo as $attribute => $value)
        {
            $this->$attribute = $value;
        }
    }

}
