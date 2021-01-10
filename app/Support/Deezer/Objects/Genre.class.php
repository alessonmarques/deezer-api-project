<?php

namespace App\Support;

class Genre extends Deezer
{
    const OBJECT_SERVICE = 'genre';

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

    function getArtists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'artists', $parameters);
        $data = json_encode([]);
        $genreArtists = $this->communicate($data, 'POST', $request);
        $this->set($genreArtists);

        return $genreArtists;
    }

    function getPodcasts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'podcasts', $parameters);
        $data = json_encode([]);
        $genrePodcasts = $this->communicate($data, 'POST', $request);
        $this->set($genrePodcasts);

        return $genrePodcasts;
    }

    function getRadios($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'radios', $parameters);
        $data = json_encode([]);
        $genreRadios = $this->communicate($data, 'POST', $request);
        $this->set($genreRadios);

        return $genreRadios;
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
