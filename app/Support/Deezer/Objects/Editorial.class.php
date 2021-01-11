<?php

namespace App\Support;

class Editorial extends DeezerObject
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

    function getSelection($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'selection', $parameters);
        $editorialSelection = $this->communicate('', 'GET', $request);

        return $editorialSelection;
    }

    function getCharts($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'charts', $parameters);
        $editorialCharts = $this->communicate('', 'GET', $request);

        return $editorialCharts;
    }

    function getReleases($parameters = [])
    {
        $request = new ApiUrn($this::OBJECT_SERVICE, $this->id, 'releases', $parameters);
        $editorialReleases = $this->communicate('', 'GET', $request);

        return $editorialReleases;
    }




}
