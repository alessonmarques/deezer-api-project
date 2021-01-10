<?php

namespace App\Support;

class Episode extends Deezer
{
    const OBJECT_SERVICE = 'episode';

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

    function getBookmark($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'bookmark', $parameters);
        $data = json_encode([]);
        $episodeBookmark = $this->communicate($data, 'POST', $request);
        $this->set($episodeBookmark);

        return $episodeBookmark;
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
