<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
    }
    /*登录接口*/
    public function login(){
        $result = $this->user_service->login();
        echo json_encode($result);
        exit();
    }
    /*注册接口*/
    public function register(){
        $result = $this->user_service->register();
        echo json_encode($result);
        exit();
    }
    /*找回密码*/
    public function findpwd(){
        $result = $this->user_service->findpwd();
        echo json_encode($result);
        exit();
    }
    /*退出接口*/
    public function logout(){
        $result = $this->user_service->logout();
        echo json_encode($result);
        exit();
    }
    /*展示个人信息*/
    public function userinfo(){
        $result = $this->user_service->get_userinfo_by_uid();
        echo json_encode($result);
        exit();
    }
    /*编辑个人信息*/
    public function updateuser(){
        $result = $this->user_service->update_userinfo();
        echo json_encode($result);
        exit();
    }

}
