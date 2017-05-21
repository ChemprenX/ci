<?php

class admin_service extends MY_Service{
    
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_user_model');
    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (empty($username)){
            return array('code'=>admin_user_model::ADMIN_NAME_NOT_NULL,'data'=>'');
        }
        if (empty($password)){
            return array('code'=>admin_user_model::ADMIN_PASSWORD_NOT_NULL,'data'=>'');
        }
        $userinfo = $this->admin_user_model->get_userinfo_by_name($username);
        if (!empty($userinfo)){
            if ($userinfo['password'] == md5($password)){
                $updateinfo = array();
                $updateinfo['last_login_time'] = time();
                $this->admin_user_model->update($userinfo['auid'],$updateinfo);
                set_cookie('admin_userinfo', serialize($userinfo), 86400);
                set_cookie('admin_username', $username, 86400);
                set_cookie('type', $userinfo['type'], 86400);
                set_cookie('auid', $userinfo['auid'], 86400);
                return array('code'=>admin_user_model::REQUEST_SUCCESS,'data'=>$userinfo);
            }
            return array('code'=>admin_user_model::PASSWORD_ERROR,'data'=>'');
        }
        return array('code'=>admin_user_model::ADMIN_IS_NULL,'data'=>'');
    }
    
    public function logout(){
        delete_cookie('admin_userinfo');
	    delete_cookie('admin_username');
	    delete_cookie('type');
	    delete_cookie('auid');
        return array('code'=>admin_user_model::REQUEST_SUCCESS,'data'=>"");
    }
    
    public function admin_list(){
        $result = $this->admin_user_model->get_admin_list();
        print_r(array('code'=>user_model::REQUEST_SUCCESS,'data'=>$result));exit;
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>$result);
    }
    public function add(){
        $username = $this->input->post('name');
        $password = $this->input->post('password');
        $type = $this->input->post('type');
        $user = $this->admin_user_model->get_userinfo_by_name($username);
        if (!empty($user)){
            return false;
        }
        $userinfo = array();
        $userinfo['username'] = $username;
        $userinfo['password'] = md5($password);
        $userinfo['type'] = $type;
        $userinfo['create_time'] = time();
        $result = $this->admin_user_model->add($userinfo);
        return $result;
        
        
        $username = $this->input->post('name');
        $password = $this->input->post('password');
        $type = $this->input->post('type');
        if (empty($username)){
            return array('code'=>admin_user_model::ADMIN_NAME_NOT_NULL,'data'=>'');
        }
        if (empty($password)){
            return array('code'=>admin_user_model::ADMIN_PASSWORD_NOT_NULL,'data'=>'');
        }
        if ($type != admin_user_model::EXAMINE_TYPE && $type != admin_user_model::SUPER_TYPE){
            return array('code'=>admin_user_model::ADMIN_TYPE_ERROR,'data'=>'');
        }
        $user = $this->admin_user_model->get_userinfo_by_name($username);
        if (!empty($user)){
            return array('code'=>admin_user_model::ADMIN_EXIST,'data'=>'');
        }
        $userinfo = array();
        $userinfo['username'] = $username;
        $userinfo['password'] = md5($password);
        $userinfo['type'] = $type;
        $userinfo['create_time'] = time();
        $result = $this->admin_user_model->add($userinfo);
        if (!empty($result)){
            return array('code'=>user_model::REQUEST_SUCCESS,'data'=>'');
        }
        return array('code'=>user_model::SYSTEM_ERROR,'data'=>'');
    }
    public function get_admin_by_uid(){
        $auid = $this->input->get('auid');
        return $this->admin_user_model->get_userinfo_by_auid($auid);
    }
    public function admin_update(){
        $auid = $this->input->post('auid');
        $password = $this->input->post('password');
        $userinfo = array();
        $userinfo['password'] = md5($password);
        return $this->admin_user_model->update($auid,$userinfo);
    }
    public function delete_admin(){
        $auid = $this->input->post('auid');
        $userinfo = array();
        $userinfo['status'] = admin_user_model::DELETE_STATUS;
        return $this->admin_user_model->update($auid,$userinfo);
    }
    public function update(){
        $uid = $this->input->post('uid');
        $password = $this->input->post('password');
        $oldpassword = $this->input->post('oldpassword');
        $company = $this->input->post('company');
        $contact = $this->input->post('contact');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $qq = $this->input->post('qq');
        $position = $this->input->post('position');
        $profile = $this->input->post('profile');
        $userinfo = array();
        if ($password){
            $user = $this->user_model->get_userinfo_by_uid($uid);
            if ($user['password'] == md5($oldpassword)){
                $userinfo['password'] = md5($password);
            }else {
                return false;
            }
        }
        if ($company){
            $userinfo['company'] = $company;
        }
        if ($contact){
            $userinfo['contact'] = $contact;
        }
        if ($telephone){
            $userinfo['telephone'] = $telephone;
        }
        if ($email){
            $userinfo['email'] = $email;
        }
        if ($mobile){
            $userinfo['mobile'] = $mobile;
        }
        if ($qq){
            $userinfo['qq'] = $qq;
        }
        if ($position){
            $userinfo['position'] = $position;
        }
        if ($profile){
            $userinfo['profile'] = $profile;
        }
        $userinfo['update_time'] = time();
        return $this->user_model->update($uid,$userinfo);
    }
    public function checkemail(){
        $email = $this->input->get('email');
        $user = $this->user_model->get_userinfo_by_name($email);
        if (empty($user)){
            return false;
        }else {
            return true;
        }
    }
    public function get_user_sum(){
        $search = array();
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2017;
        return $this->user_model->get_users_num($search);
    }
    public function check(){
        $userinfo = unserialize(get_cookie('admin_userinfo'));
        if (!empty($userinfo['username'])){
            $rs = $this->admin_user_model->get_userinfo_by_name($userinfo['username']);
            if (empty($rs)){
                return false;
            }
            if ($userinfo['password'] !== $rs['password']){
                return false;
            }
            return true;
        }
        return false;
    }
}