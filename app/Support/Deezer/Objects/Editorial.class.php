<?php

namespace App\Support;

class Editorial extends Deezer
{
    const OBJECT_SERVICE = 'editorial';

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

    function getSelection($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'selection', $parameters);
        $editorialSelection = $this->communicate('', 'GET', $request);
        $this->set($editorialSelection);

        return $editorialSelection;
    }

    function getCharts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'charts', $parameters);
        $editorialCharts = $this->communicate('', 'GET', $request);
        $this->set($editorialCharts);

        return $editorialCharts;
    }

    function getReleases($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'releases', $parameters);
        $editorialReleases = $this->communicate('', 'GET', $request);
        $this->set($editorialReleases);

        return $editorialReleases;
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
