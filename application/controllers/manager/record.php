<?php

class record extends MY_Controller{
    
    
    function __construct(){
        parent::__construct();
        $this->load->service('judges_service');
        $this->load->service('record_service');
        $this->load->service('user_service');
        $this->check();
    }
    
    
    
    public function index(){
        /* $usersum = $this->user_service->get_user_sum();
        $result = $this->case_service->get_cases_num();
        $this->assign('usersum', $usersum['count']);
        $this->assign('casesum', $result['casesum']);
        $this->assign('sums', $result['sums']); */
        $result = $this->user_service->userlist();
        $this->assign('users', $result['users']);
        $this->assign('page', $result['page']);
        $this->assign('search', $result['search']);
        $this->assign('sumpage', $result['sumpage']);
        $this->display('manager/common/header.html');
        //$this->display('manager/user/index.html');
        $this->display('manager/judges/index.html');
    }
    
    public function recordlist(){
        var_dump("评分记录");
        exit();
        $result = $this->record_service->recordlist();
        //var_dump($result);exit();
        $this->assign('records', $result['records']);
        $this->assign('page', $result['page']);
        $this->assign('search', $result['search']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('sum', $result['sum']);
        $this->display('manager/common/header.html');
        //$this->display('manager/user/index.html');
        $this->display('manager/record/recordlist.html');
    }
    
    public function updatestatus(){
        $result = $this->record_service->updatestatus();
        redirect('manager/judges/judgeslist');
    }
    public function updatejsstatus(){
        $result = $this->record_service->updatejsstatus();
        redirect('manager/record/recordlist');
    }
    
    function getcompany(){
        $result = $this->user_service->get_company();
        foreach($result as $v){
            $suggestions[]= array('title' => $v['company']);
        }
        echo json_encode(array('data' => $suggestions));
    }
    
    
    
    
    
}