<?php
require_once('MY_Service.php');

class user_service extends MY_Service{
    const PAGE_CASE_COUNT = 20; //每页显示数量
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_user_model');
        $this->load->library('email');
    }
    public function getAllUser(){
        $search = array();
        $search['chooseY'] = $this->input->get('chooseY') ? intval($this->input->get('chooseY')) : 2017;
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $search['payStatus'] = $this->input->get('payStatus') ? intval($this->input->get('payStatus')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;//页数
        $result = $this->user_model->get_All_user($search,$page);
        $sumpage = ceil($result[0]/user_model::PAGE_USER_COUNT);
        return array('case'=>$result[1],'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $userinfo = $this->user_model->get_userinfo_by_name($username);
        if (!empty($userinfo)){
            if ($userinfo['password'] == md5($password)){
                set_cookie('userinfo', serialize($userinfo), 86400);
                set_cookie('username', $username, 86400);
                set_cookie('uid', $userinfo['uid'], 86400);
                return true;
            }
        }
        return false;
    }
    public function wlogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $userinfo = $this->user_model->get_userinfo_by_name($username);
        if (!empty($userinfo)){
            if ($userinfo['password'] == md5($password)){
                return $userinfo['uid'];
            }
        }
        return 0;
    }
    public function admin_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
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
                return true;
            }
        }
        return false;
    }
    public function get_admin_list(){
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $result = $this->admin_user_model->get_admin_list($page);
        $res = $this->admin_user_model->get_admin_sum();
        $sumpage = ceil($res['count']/admin_user_model::PAGE_ADMIN_COUNT);
        return array('list'=>$result,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function get_admin_type(){
        return $this->admin_user_model->get_type();
    }
    public function add_admin(){
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
    public function register(){
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->user_model->get_userinfo_by_name($username);
        if (!empty($user)){
            return false;
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
        }
        return $result;
    }
    public function wregister(){
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->user_model->get_userinfo_by_name($username);
        if (!empty($user)){
            return 0;
        }
        $userinfo = array();
        $userinfo['username'] = $username;
        $userinfo['password'] = md5($password);
        $userinfo['create_time'] = time();
        $result = $this->user_model->add($userinfo);
        if (!empty($result)){
            $res = $this->user_model->get_userinfo_by_name($username);
            return $res['uid'];
        }else {
            return 0;
        }
        
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
    public function wupdate(){
        $uid = $this->input->post('uid');
        $contact = $this->input->post('contact');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $userinfo = array();
        if (empty($uid)){
            
            return false;
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
        $userinfo['flag'] = 1;
        $userinfo['update_time'] = time();
        $rs = $this->user_model->update($uid,$userinfo);
        return $rs;
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
    public function userlist(){
        $search = array();
        $search['username'] = $this->input->get('username') ? $this->input->get('username') : '';
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        
        $result = $this->user_model->get_users($search,$page);
        $res = $this->user_model->get_users_num($search);
        $sumpage = ceil($res['count']/user_model::PAGE_USER_COUNT);
        return array('users'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
        
    }
    public function get_user_sum(){
        $search = array();
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2017;
        return $this->user_model->get_users_num($search);
    }
    public function findpwd(){
        $username = $this->input->post('email');
        $user = $this->user_model->get_userinfo_by_name($username);
        //var_dump($user);exit();
        if (empty($user)){
            return false;
        }
        $newpwd = $this->resetpwd();
        $userinfo = array();
        $userinfo['password'] = md5($newpwd);
        $this->user_model->update($user['uid'],$userinfo);
        $this->send_email($username,$newpwd);
        return true;
    }
    public function get_userinfo_by_uid($uid){
        return $this->user_model->get_userinfo_by_uid($uid);
    }
    //通过Uid获取用户信息
    public function get_userinfo_by_uid_2017(){
        $uid = $this->input->get('uid');
        return $this->user_model->get_userinfo_by_uid($uid);
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
//        var_dump($this->email);exit();
        $this->email->from('goldenawards@imcc.org.cn', '金网奖');
        $this->email->to($email);
        $this->email->subject('金网奖密码');
        $this->email->message($message);
//        var_dump($this->email);exit();
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径
        $result = $this->email->send();
//        echo $this->email->print_debugger();
//        exit;
        return $result;
        //echo $this->email->print_debugger();
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
    public function get_company(){
        $keywords = $_POST['keyword'];
        return $this->user_model->get_company($keywords);
    }
    //获取支票信息
    public function get_invoice_info(){
        $uid = $this->input->get('uid');
        return $this->user_model->get_invoice_info($uid);
    }
    //获取物流信息
    public function get_logistics_info(){
        $uid = $this->input->get('uid');
        return $this->user_model->get_logistics_info($uid);
    }
    //修改用户支付状态
    public function revisePayInfo(){
        $uid = $this->input->get('uid');
        $status = $this->input->get('status');
        var_dump($uid);
        var_dump($status);
        $result = $this->user_model->change_pay_info($uid,$status);
        return $result;
    }
}