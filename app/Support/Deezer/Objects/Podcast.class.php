<?php

namespace app\Support;

class Podcast extends DeezerObject
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


    function getPodcast($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'episodes', $parameters);
        $podcastEpisodes = $this->communicate('', 'GET', $request);

        return $podcastEpisodes;
    }



}
