<?php
require_once('MY_Service.php');

class record_service extends MY_Service{

    function __construct(){
        parent::__construct();
        $this->load->model('judges_model');
        $this->load->model('record_model');
        $this->load->model('admin_user_model');
    }
    
    public function test(){
        return $this->judges_model->test();
    }
    
    public function add_judges(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $realname = $this->input->post('realname');
        $company = $this->input->post('company');
        $jianshen = $this->input->post('jianshen');
        $pingshenzhuxi = $this->input->post('pingshenzhuxi');
        $group = $this->input->post('group');
        $judges = $this->judges_model->get_judges_by_name($username);
        if (!empty($judges)){
            return false;
        }
        $judgesinfo = array();
        $judgesinfo['username'] = $username;
        //$judgesinfo['password'] = md5($password);
        $judgesinfo['password'] = $password;
        $judgesinfo['realname'] = $realname;
        $judgesinfo['company'] = $company;
        $judgesinfo['jianshen'] = $jianshen;
        $judgesinfo['pingshenzhuxi'] = $pingshenzhuxi;
        $judgesinfo['group'] = $group;
        $judgesinfo['create_time'] = time();
        $result = $this->judges_model->add($judgesinfo);
        return $result;
    }
    
    public function judges_update(){
        //var_dump($_REQUEST);exit();
        $uid = $this->input->post('uid');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $realname = $this->input->post('realname');
        $company = $this->input->post('company');
        $jianshen = $this->input->post('jianshen');
        $pingshenzhuxi = $this->input->post('pingshenzhuxi');
        $group = $this->input->post('group');
        $password = $this->input->post('password');
        $judgesinfo = array();
        $judgesinfo['username'] = $username;
        //$judgesinfo['password'] = md5($password);
        $judgesinfo['realname'] = $realname;
        $judgesinfo['company'] = $company;
        $judgesinfo['jianshen'] = $jianshen;
        $judgesinfo['pingshenzhuxi'] = $pingshenzhuxi;
        $judgesinfo['group'] = $group;
        if (!empty($password)){
            //$judgesinfo['password'] = md5($password);
            $judgesinfo['password'] = $password;
        }
        //var_dump($judgesinfo);exit();
        return $this->judges_model->update($uid,$judgesinfo);
    }
    
    public function delete_judges(){
        $uid = $this->input->post('deluid');
        $judgesinfo = array();
        $judgesinfo['status'] = admin_user_model::DELETE_STATUS;
        return $this->judges_model->update($uid,$judgesinfo);
    }
    
    public function recordlist(){
        $search = array();
        $search['title'] = $this->input->get('title') ? $this->input->get('title') : '';
        //$search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        /* if (!empty($search)){
            $cids = $this->record_model->get_cids_by_title($search);
            var_dump($cids);
        }
        exit(); */
        $result = $this->record_model->get_records($search,$page);
        $res = $this->record_model->get_records_num($search);
        $sumpage = ceil($res['count']/user_model::PAGE_USER_COUNT);
        return array('records'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage,'sum'=>$res['count']);
    }
    public function get_case_by_uid(){
        $search = array();
        $search['user_id'] = $this->input->get('uid');
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2016;
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $result = $this->record_model->get_cases($search);
        return array('records'=>$result,'search'=>$search);
    }
    //get_record_by_uid
    public function get_record_by_uid(){
        $uid = $this->input->get('uid');
        $type = $this->input->get('type');
        $search = array();
        $search['title'] = $this->input->get('title') ? $this->input->get('title') : '';
        $search['user_id'] = $uid;
        $search['type'] = $type;
        //$search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        /* if (!empty($search)){
         $cids = $this->record_model->get_cids_by_title($search);
        var_dump($cids);
        }
        exit(); */
        $result = $this->record_model->get_records($search,$page);
        $res = $this->record_model->get_records_num($search);
        $sumpage = ceil($res['count']/user_model::PAGE_USER_COUNT);
        return array('records'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage,'sum'=>$res['count']);
    }
    public function updatejsstatus(){
        $id = $this->input->get('id');
        $rs = $this->record_model->get_recordinfo_by_id($id);
        $recordinfo = array();
        if ($rs['jsstatus'] == 1){
            $recordinfo['jsstatus'] = 0;
        }else {
            $recordinfo['jsstatus'] = 1;
        }
        $this->record_model->update($id,$recordinfo);
    }
    public function updatestatus(){
        $id = $this->input->get('id');
        $rs = $this->record_model->get_recordinfo_by_id($id);
        $recordinfo = array();
        if ($rs['status'] == 1){
            $recordinfo['status'] = 0;
        }else {
            $recordinfo['status'] = 1;
        }
        $this->record_model->update($id,$recordinfo);
    }
    public function get_judgesinfo_by_uid(){
        $uid = $this->input->get('uid');
        return $this->judges_model->get_judgesinfo_by_uid($uid);
    }
    
}    
