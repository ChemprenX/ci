<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends MY_Controller

{

    public function index()

    {

        $test='ci + smarty 配置成功';
        $tt='4445455';

        $this->assign('test',$test);
        $this->assign('tt',$tt);

        $this->display('test.html');

    }

}