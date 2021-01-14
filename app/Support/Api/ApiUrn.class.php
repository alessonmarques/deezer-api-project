<?php

    namespace app\Support;

    class ApiUrn
    {
        private $service;
        private $id;
        private $method;
        private $parameters;

        private $path;

        function __construct($service = '', $id = '', $method = '', $parameters = [])
        {
            $this->service      =   $service;
            $this->id           =   $id;
            $this->method       =   $method;
            $this->parameters   =   $this->constructParameterQueryString($parameters);

            $this->constructPath();
        }

        public function setService($service)
        {
            $this->service      =   $service;
            $this->constructPath();
        }

        public function setId($id)
        {
            $this->id           =   $id;
            $this->constructPath();
        }

        public function setMethod($method)
        {
            $this->method       =   $method;
            $this->constructPath();
        }

        public function setParameters($parameters)
        {
            $this->parameters   =   $this->constructParameterQueryString($parameters);
            $this->constructPath();
        }

        public function getUrn()
        {
            return $this->path;
        }

        private function constructParameterQueryString($parameters)
        {
            $queryString = [];

            foreach($parameters as $parameterName => $parameterValue)
            {
                $queryString[] = "{$parameterName}={$parameterValue}";
            }
            $queryString = implode('&', $queryString);
            $queryString = "?{$queryString}";

            return $queryString;
        }

        private function constructPath()
        {
            $this->path         =   implode('/', array_filter([$this->service, $this->id, $this->method, $this->parameters]));
        }

    }
