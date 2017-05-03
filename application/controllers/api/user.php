<?php
header('content-type:application:json;charset=utf8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class user extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('case_service');
    }
    public function login(){
        /*$this->display('api/common/header.html');*/
        $type = $this->input->get('type') ? $this->input->get('type') : '';
        $this->assign('type', $type);
        $this->display('api/user/login.html');
    }
    public function loginact(){
        $result = $this->user_service->login();
        $type = $this->input->post('type');
        if ($result){
           /* if ($type == 'twenty'){
                redirect('api/cases/twentyCasesubmit');
            }else {
//                redirect('api/cases/casesubmit');
                redirect('api/user/static_home');
            }*/
           redirect('api/user/static_home');

        }else {
            $this->assign('result', '登陆失败！');
            $this->display('api/common/header.html');
            $this->display('api/result.html');
        }
    }
    public function wloginact(){
        $result = $this->user_service->wlogin();
        echo json_encode($result);
    }
    public function register(){
        /*$this->display('api/common/header.html');*/
        $this->display('api/user/register.html');
    }
    public function registeract(){
        $result = $this->user_service->register();
        if ($result){
            redirect('api/user/edit');
            //$this->assign('result', '注册成功！');
        }else {
            $this->assign('result', '注册失败！');
        }
        $this->display('api/common/header.html');
        $this->display('api/result.html');
    }
    public function wregisteract(){
        $result = $this->user_service->wregister();
        echo json_encode($result);
    }
    //找回密码
    public function findpwd(){
        $this->display('api/common/header.html');
        $this->display('api/user/findpwd.html');
    }
    public function update(){
        $result = $this->user_service->update();
        if ($result){
            $this->assign('result', '修改成功！');
        }else {
            $this->assign('result', '修改失败！');
        }
        $this->display('api/common/header.html');
        $this->display('api/result.html');
    }
    public function wupdate(){
        $result = $this->user_service->wupdate();
        echo json_encode($result);
    }
    //找回密码操作
    public function findpwdact(){
        //$this->user_service->send_email();
        $result = $this->user_service->findpwd();
        if ($result){
            $this->assign('result', '找回成功！');
        }else {
            $this->assign('result', '找回失败！');
        }
        $this->display('api/common/header.html');
        $this->display('api/result.html');
    }
    public function logout(){
        delete_cookie('userinfo');
	    delete_cookie('username');
	    delete_cookie('uid');
	    redirect('api/user/login');
    }
    public function mycase(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login');
        }
        $status = $this->input->get('status');
        $cases = $this->case_service->get_case_by_uid_test($uid,$status);
        $this->assign('cases', $cases);
        $this->assign('status', $status);
        $this->display('api/common/header.html');
        $this->display('api/user/mycase.html');
    }
    public function test_mycase(){
        $uid = "424";
        $status = "";
        $cases = $this->case_service->get_case_by_uid_test($uid,$status);
        echo json_encode($cases);
        exit;
    }
    public function checkemail(){
        echo $this->user_service->checkemail();;
        exit();
    }
    public function userinfo(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login');
        }
        $userinfo = $this->user_service->get_userinfo_by_uid($uid);
        $this->assign('userinfo', $userinfo);
        $this->display('api/common/header.html');
        $this->display('api/user/userinfo.html');
    }
    public function edit(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login');
        }
        $userinfo = $this->user_service->get_userinfo_by_uid($uid);
        $this->assign('userinfo', $userinfo);
        $this->display('api/common/header.html');
        $this->display('api/user/edit.html');
    }
    public function notfound(){
        $this->display('api/common/header_user.html');
        $this->display('api/404.html');
    }
    public function static_home(){
        $this->display('api/static/index.html');
    }
    public function static_partner(){
        $this->display('api/static/partner.html');
    }
    public  function static_peak(){
        $this->display('api/static/peak.html');
    }
    public function static_forum(){
        $query = $_SERVER["QUERY_STRING"];
        //主论坛
        if($query == 'main'){
            $this->display('api/static/forum.html');
        }
        //分论坛
        else if ($query == 'other'){
            $this->display('api/static/otherForum.html');
        }
    }
    public function static_caseCollection(){
        $this->display('api/static/caseCollection.html');
    }
    public function static_twentyYears(){
        $this->display('api/static/time.html');
    }
}