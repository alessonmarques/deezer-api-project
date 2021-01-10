<?php

namespace App\Support;

class Radio extends Deezer
{
    const OBJECT_SERVICE = 'radio';

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
        $artistInfo = $this->communicate('', 'GET', $request);
        $this->set($artistInfo);

        return $artistInfo;
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
    private function set($classInfo)
    {
        $classInfo = json_decode($classInfo);
        foreach($classInfo as $attribute => $value)
        {
            $this->$attribute = $value;
        }
    }

}
