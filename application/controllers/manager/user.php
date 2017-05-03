<?php

class user extends MY_Controller{
    
    private $_fname;
    private $_nologin = array(
            'login',
            'loginact'
    );
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('case_service');
        $this->load->service('award_service');
        $this->load->service('beyond_service');
        $this->_fname = $this->ci->router->fetch_method();
        $this->init();
    }
    private function init(){
        if (!in_array($this->_fname, $this->_nologin)){
            $this->check();
        }
    }
    public function login(){
        $this->display('manager/common/header.html');
        $this->display('manager/user/login.html');
    }
    public function loginact(){
        $result = $this->user_service->admin_login();
        if ($result){
            redirect('manager/user/index');
        }else {
            redirect('manager/user/login');
        }
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
        $result = $this->user_service->get_admin_list();
        $type = $this->user_service->get_admin_type();
        $this->assign('list', $result['list']);
        $this->assign('page', $result['page']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('type', $type);
        $this->display('manager/common/header.html');
        $this->display('manager/user/adminlist.html');
    }
    public function addadmin(){
        $type = $this->user_service->get_admin_type();
        $this->assign('type', $type);
        $this->display('manager/common/header.html');
        $this->display('manager/user/addadmin.html');
    }
    public function addadminact(){
        $result = $this->user_service->add_admin();
        if ($result){
            redirect('manager/user/adminlist');
        }else {
            $this->assign('result', '添加失败！');
            $this->display('manager/common/header.html');
            $this->display('manager/result.html');
        }
    }
    public function editadmin(){
        $userinfo = $this->user_service->get_admin_by_uid();
        $type = $this->user_service->get_admin_type();
        $this->assign('userinfo', $userinfo);
        $this->assign('type', $type);
        $this->display('manager/common/header.html');
        $this->display('manager/user/editadmin.html');
    }
    public function editadminact(){
        $result = $this->user_service->admin_update();
        if ($result){
            $this->assign('result', '修改成功！');
        }else {
            $this->assign('result', '修改失败！');
        }
        $this->display('manager/common/header.html');
        $this->display('manager/result.html');
    }
    public function deleteadmin(){
        $result = $this->user_service->delete_admin();
        if ($result){
            $this->assign('result', '删除成功！');
        }else {
            $this->assign('result', '删除失败！');
        }
        $this->display('manager/common/header.html');
        $this->display('manager/result.html');
    }
    public function logout(){
        delete_cookie('admin_userinfo');
	    delete_cookie('admin_username');
	    delete_cookie('type');
	    delete_cookie('auid');
        delete_cookie('cidArray');
	    redirect('manager/user/login');
    }
    public function userlist(){
        $result = $this->user_service->userlist();
        //var_dump($result);exit();
        //$type = $this->user_service->get_admin_type();
        $this->assign('users', $result['users']);
        $this->assign('page', $result['page']);
        $this->assign('search', $result['search']);
        $this->assign('sumpage', $result['sumpage']);
        //$this->assign('type', $type);
        $this->display('manager/common/header.html');
        $this->display('manager/user/userlist.html');
    }
    //用户管理界面
    public function userAdmin(){
        $result = $this->user_service->getAllUser();
        $this->assign('allUser', $result['case']);
        $this->assign('page', $result['page']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('search', $result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/user/useradmin2017.html');
    }
    public function indeximg(){
        include_once ('ofc/open-flash-chart.php'); //调用OFC库文件
        //设置图表标题
        $title = new title( '案例类型分布图'.date('Y-m-d') );
        $title->set_style("font-size:12px; font-weight:bold;");
        $pie = new pie();
        $pie->set_alpha(0.6);
        $pie->set_start_angle( 32 );
        $pie->add_animation( new pie_fade() );
        //$pie->set_tooltip( '#val# of #total##percent# of 100%' );
        $pie->set_colours( array('#00B4FF','#FFBE41','#FF3E43','#d853ce','#ff7400','#006e2e',
                '#d15600','#4096ee','#c79810') );
        //读取各区域信息
        $result = $this->case_service->get_cases_num();
        $t=$result['sums'];
        $name = '未知';
        //var_dump($result);
        foreach ($result['casesum'] as $key => $value){
            if(!empty($t)){
                $v=round($value/$t,4)*100;
            }else{
                $v=0;
            }
            
            switch ($key){
                case 1:
                    $name = '待审核';
                    break;
                case 2:
                    $name = '已审核';
                    break;
                case 3:
                    $name = '未通过';
                    break;
                default:
                    break;
            }
            $dis[]=array("name"=>$name,"total"=>$value,"v"=>$v);
        }
        //var_dump($dis);exit();
        $len_dis=count($dis);
        for($i=0;$i<$len_dis;$i++){
            $dis_value[]=new pie_value(intval($dis[$i]['total']),$dis[$i]['name']."(".$dis[$i]['v']."%)");
        }
        $pie->set_values($dis_value);
        
        $chart = new open_flash_chart();
        $chart->set_title( $title );
        $chart->add_element( $pie );
        $chart->x_axis = null;
        echo $chart->toPrettyString(); //生成json数据
    }
    public function openUserInfo(){
        $type = $this->input->get('type');
        $this->assign('type',$type);
        $uid = $this->input->get('uid');
        $this->assign('Uid',$uid);
        $userInfo = $this->user_service->get_userinfo_by_uid_2017();//获取对应用户信息
        $case = $this->case_service->getCase_by_cid_2017();//通过cid获取对应的案例
        $result = $this->case_service->get_case_by_uid_2017();//获取对应用户的案例
        $awards = $this->award_service->get_award_all();//获取所有奖项
        $status = $this->case_service->get_status();//获取审核状态
        $invoices = $this->user_service->get_invoice_info();//获取支票信息
        $logistics = $this->user_service->get_logistics_info();//获取物流信息
        $time = $case["create_time"];
        $this->assign('logistics',$logistics);
        $this->assign('userinfo',$userInfo);
        $this->assign('case',$case);
        $this->assign('cases',$result['case']);
        $this->assign('awards', $awards);
        $this->assign('status', $status);
        $this->assign('invoices',$invoices);
        $this->assign('year',date("Y"),$time);
        $this->assign('search', $result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/case/usercase2017.html');
    }
    public function changePayInfo(){
        $this->case_service->changePayInfo();//修改支付状态
    }
    public function revisePayInfo(){
        $this->user_service->revisePayInfo();//修改支付状态
    }
}