<?php

namespace App\Support;

class Episode extends DeezerObject
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

    function getBookmark($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'bookmark', $parameters);
        $data = json_encode([]);
        $episodeBookmark = $this->communicate($data, 'POST', $request);

        return $episodeBookmark;
    }



}
