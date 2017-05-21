<?php
class MY_Service
{
    protected $_year;
    public function __construct()
    {
        log_message('debug', "Service Class Initialized");
    }
    function __get($key)
    {
        $CI = & get_instance();
        return $CI->$key;
    }


}