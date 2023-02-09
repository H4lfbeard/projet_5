<?php

class Globals
{
    private $GET;
    private $POST;
    private $SERVER;

    public function __construct()
    {
        $this->GET = filter_input_array(INPUT_GET);
        $this->POST = filter_input_array(INPUT_POST);
        $this->SERVER = filter_input_array(INPUT_SERVER);
    }

    public function getGET()
    {
        return $this->GET;
    }

    public function getPOST()
    {
        return $this->POST;
    }

    public function getSERVER()
    {
        return $this->SERVER;
    }

}
