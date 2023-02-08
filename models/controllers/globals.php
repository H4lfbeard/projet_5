<?php

class Globals
{
    private $GET;
    private $POST;

    public function __construct()
    {
        $this->GET = filter_input_array(INPUT_GET);
        $this->POST = filter_input_array(INPUT_POST);
    }

    public function getGET()
    {
        return $this->GET;
    }

    public function getPOST()
    {
        return $this->POST;
    }

}
