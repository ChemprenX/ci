<?php

class myerror extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
   
    public function index(){
        $this->display('api/common/header_user.html');
        $this->display('api/404.html');
    }
}