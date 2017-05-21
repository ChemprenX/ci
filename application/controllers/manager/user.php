<?php

class user extends MY_Controller{
    
    private $_fname;
    private $_nologin = array(
            'login',
    );
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('case_service');
        $this->load->service('award_service');
        $this->load->service('beyond_service');
        $this->load->service('admin_service');
        $this->_fname = $this->ci->router->fetch_method();
        $this->init();
    }
    private function init(){
        if (!in_array($this->_fname, $this->_nologin)){
            $this->check();
        }
    }
    public function login(){
        $result = $this->admin_service->login();
        echo json_encode($result);
        exit();
    }
    public function index(){
        $usersum = $this->user_service->get_user_sum();
        $result = $this->case_service->get_cases_num();
        //获取评委的总数
        $pingweiNum = $this->beyond_service->get_pingwei_sum();
        $this->assign('pingweiNum', $pingweiNum[0]['count']);
        $this->assign('usersum', $usersum['count']);
        $this->assign('casesum', $result['casesum']);
        $this->assign('search',$result['search']);
        $this->assign('sums', $result['sums']);
        $this->display('manager/common/header.html');
        $this->display('manager/user/index.html');
    }
    public function adminlist(){
        $result = $this->admin_service->admin_list();
        echo json_encode($result);
        exit();
    }
    public function addadmin(){
        $result = $this->admin_service->add();
        echo json_encode($result);
        exit();
    }
    public function editadmin(){
        $result = $this->admin_service->update();
        echo json_encode($result);
        exit();
    }
    public function logout(){
        $result = $this->admin_service->logout();
        echo json_encode($result);
        exit();
    }
    public function userlist(){
        $result = $this->user_service->user_list();
        echo json_encode($result);
        exit();
    }
}