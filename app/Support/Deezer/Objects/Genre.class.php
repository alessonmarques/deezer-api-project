<?php

namespace App\Support;

class Genre extends DeezerObject
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

    function getArtists($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'artists', $parameters);
        $data = json_encode([]);
        $genreArtists = $this->communicate($data, 'POST', $request);

        return $genreArtists;
    }

    function getPodcasts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'podcasts', $parameters);
        $data = json_encode([]);
        $genrePodcasts = $this->communicate($data, 'POST', $request);

        return $genrePodcasts;
    }

    function getRadios($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'radios', $parameters);
        $data = json_encode([]);
        $genreRadios = $this->communicate($data, 'POST', $request);

        return $genreRadios;
    }




}
