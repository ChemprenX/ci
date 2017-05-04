<?php
require_once ('MY_Service.php');

class judges_service extends MY_Service{

    function __construct(){
        parent::__construct();
        $this->load->model('judges_model');
        $this->load->model('admin_user_model');
        $this->load->model('group_model');
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
    public function get_judges_group(){
        $grouplist = $this->group_model->get_group_all();
        $group = array();
        foreach ($grouplist as $value){
            $group[$value['group_id']] = $value['group_title'];
        }
        return $group;
    }
    public function get_judges_grouplist(){
        return $this->group_model->get_group_all();
    }
    public function judgeslist(){
        $search = array();
        $search['realname'] = $this->input->get('title') ? $this->input->get('title') : '';
        //$search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $result = $this->judges_model->get_judgess($search,$page);
        $res = $this->judges_model->get_judgess_num($search);
        $sumpage = ceil($res['count']/user_model::PAGE_USER_COUNT);
        return array('judgess'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function get_judgesinfo_by_uid(){
        $uid = $this->input->get('uid');
        return $this->judges_model->get_judgesinfo_by_uid($uid);
    }
    public function get_judges_num(){
        return $this->judges_model->get_judges_num();
    }
}    
