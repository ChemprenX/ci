<?php
class user_service extends MY_Service {
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('email');
    }
    
    //登录接口
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (empty($username)){
            return array('code'=>user_model::USER_NAME_NOT_NULL,'data'=>'');
        }
        if (empty($password)){
            return array('code'=>user_model::USER_PASSWORD_NOT_NULL,'data'=>'');
        }
        $userinfo = $this->user_model->get_userinfo_by_name($username);
        if (!empty($userinfo)){
            if ($userinfo['password'] == md5($password)){
                set_cookie('userinfo', serialize($userinfo), 86400);
                set_cookie('username', $username, 86400);
                set_cookie('uid', $userinfo['uid'], 86400);
                return array('code'=>user_model::REQUEST_SUCCESS,'data'=>$userinfo);
            }
            return array('code'=>user_model::PASSWORD_ERROR,'data'=>'');
        }
        return array('code'=>user_model::USER_IS_NULL,'data'=>'');
    }
    
    //注册接口
    public function register(){
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        if (empty($username)){
            return array('code'=>user_model::USER_NAME_NOT_NULL,'data'=>'');
        }
        if (empty($password)){
            return array('code'=>user_model::USER_PASSWORD_NOT_NULL,'data'=>'');
        }
        $user = $this->user_model->get_userinfo_by_name($username);
        if (!empty($user)){
            return array('code'=>user_model::USER_EXIST,'data'=>'');
        }
        $userinfo = array();
        $userinfo['username'] = $username;
        $userinfo['password'] = md5($password);
        $userinfo['create_time'] = time();
        $result = $this->user_model->add($userinfo);
        if (!empty($result)){
            $res = $this->user_model->get_userinfo_by_name($username);
            set_cookie('userinfo', serialize($res), 86400);
            set_cookie('username', $username, 86400);
            set_cookie('uid', $res['uid'], 86400);
            return array('code'=>user_model::REQUEST_SUCCESS,'data'=>$res);
        }
        return array('code'=>user_model::SYSTEM_ERROR,'data'=>'');
    }
    //找回密码
    public function findpwd(){
        $username = $this->input->post('email');
        $user = $this->user_model->get_userinfo_by_name($username);
        if (empty($user)){
            return array('code'=>user_model::USER_EXIST,'data'=>'');
        }
        $newpwd = $this->resetpwd();
        $userinfo = array();
        $userinfo['password'] = md5($newpwd);
        $this->user_model->update($user['uid'],$userinfo);
        $this->send_email($username,$newpwd);
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>'');
    }
    public function resetpwd(){
        $array = array('Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M','1','2','3','4','5','6','7','8','9');
        $array =array_flip($array);
        $newpwd = array_rand($array,8);
        $newpwd = implode('', $newpwd);
        return $newpwd;
    }
    public function send_email($email,$newpwd){
        $message = "
                        您申请重设如下账号的密码：             <br />
                         用户名：$email        <br />
                        重置密码是：$newpwd        <br />
                        您可以在个人信息中修改该密码。    <br />

                        若这不是您本人申请的，请忽略本邮件，一切如常。    <br />
                        
        ";
        $this->email->from('goldenawards@imcc.org.cn', '金网奖');
        $this->email->to($email);
        $this->email->subject('金网奖密码');
        $this->email->message($message);
        $result = $this->email->send();
        return $result;
    }
    //退出登录
    //退出登录只需要清空cookie
    public function logout(){
        delete_cookie('userinfo');
        delete_cookie('username');
        delete_cookie('uid');
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>"");
    }
    //获取用户信息
    //先去cookie获取当前使用者的uid,去数据库检索,并返回用户的全部信息
    public function get_userinfo_by_uid(){
        $this->_year = $this->input->get('year') ? intval($this->input->get('year')) : 2017;
        //$uid = get_cookie('uid');
        $uid = $this->input->post('uid');
        if (empty($uid)){
            return array('code'=>user_model::USER_ID_NOT_NULL,'data'=>'');
        }
        $userinfo = $this->user_model->get_userinfo_by_uid($uid,$this->_year);
        if (empty($userinfo)){
            return array('code'=>user_model::USER_IS_NULL,'data'=>'');
        }
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>$userinfo);
    }
    //更新用户信息
    public function update_userinfo(){
        $this->_year = $this->input->get('year') ? intval($this->input->get('year')) : 2017;
        $uid = $this->input->post('uid');
        if (empty($uid)){
            return array('code'=>user_model::USER_ID_NOT_NULL,'data'=>'');
        }
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
        $remark = $this->input->post('remark');
        $status = $this->input->post('status');
        $userinfo = array();
        if ($password){
            $user = $this->user_model->get_userinfo_by_uid($uid);
            if ($user['password'] == md5($oldpassword)){
                $userinfo['password'] = md5($password);
            }else {
                return array('code'=>user_model::PASSWORD_ERROR,'data'=>'');
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
        if ($remark){
            $userinfo['remark'] = $remark;
        }
        if ($status){
            $userinfo['status'] = $status;
        }
        $userinfo['update_time'] = time();
        $result = $this->user_model->update($uid,$this->_year,$userinfo);
        if (empty($result)){
            return array('code'=>user_model::SYSTEM_ERROR,'data'=>'');
        }
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>'');
    }
    
    public function user_list(){
        $search = array();
        $search['username'] = $this->input->get('username') ? $this->input->get('username') : '';
        $result = $this->user_model->get_users($search);
        return array('code'=>user_model::REQUEST_SUCCESS,'data'=>$result);
    }

}