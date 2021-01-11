<?php

namespace App\Support;

class Options extends DeezerObject
{
    const OBJECT_SERVICE = 'options';

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



}
