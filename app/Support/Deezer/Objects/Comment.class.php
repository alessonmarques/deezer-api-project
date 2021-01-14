<?php

namespace app\Support;

class Comment extends DeezerObject
{
    const OBJECT_SERVICE = 'comment';

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
