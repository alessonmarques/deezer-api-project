<?php

namespace App\Support;

class Podcast extends Deezer
{
    const OBJECT_SERVICE = 'podcast';

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


    function getPodcast($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'episodes', $parameters);
        $podcastEpisodes = $this->communicate('', 'GET', $request);

        return $podcastEpisodes;
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
