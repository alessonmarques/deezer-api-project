<?php

namespace App\Support;

class DeezerObject extends Deezer
{
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
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, '', ['access_token' => $this->token]);
        $classInfo = $this->communicate('', 'GET', $request);
        $this->set($classInfo);

        return $classInfo;
    }

    private function set($classInfo)
    {
        $classInfo = json_decode($classInfo);
        foreach($classInfo as $attribute => $value)
        {
            $this->$attribute = $value;
        }
    }

}
