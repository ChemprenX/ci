<?php

class judges extends MY_Controller{
    
    
    function __construct(){
        parent::__construct();
        $this->load->service('judges_service');
        $this->load->service('user_service');
        $this->load->service('record_service');
        $this->check();
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
    public function judgeslist(){
        $result = $this->judges_service->judgeslist();
        $group = $this->judges_service->get_judges_group();
        $this->assign('judgess', $result['judgess']);
        $this->assign('group', $group);
        $this->assign('page', $result['page']);
        $this->assign('search', $result['search']);
        $this->assign('sumpage', $result['sumpage']);
        $this->display('manager/common/header.html');
        $this->display('manager/judges/judgeslist.html');
    }
    public function addjudges(){
        $grouplist = $this->judges_service->get_judges_grouplist();
        $this->assign('grouplist', $grouplist);
        $this->display('manager/common/header.html');
        $this->display('manager/judges/addjudges.html');
    }
    public function addjudgesact(){
        $rs = $this->judges_service->add_judges();
        redirect('manager/judges/judgeslist');
    }
    public function setjudges(){
        $judgesinfo = $this->judges_service->get_judgesinfo_by_uid();
        $grouplist = $this->judges_service->get_judges_grouplist();
        $result = $this->record_service->get_case_by_uid();
        $this->assign('grouplist', $grouplist);
        $this->assign('judgesinfo', $judgesinfo);
        $this->assign('records', $result['records']);
        $this->assign('search',$result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/judges/setjudges.html');
    }
    public function setjudgesact(){
        $result = $this->judges_service->judges_update();
        redirect('manager/judges/judgeslist');
    }
    //获取厂商
    function getcompany(){
        $result = $this->user_service->get_company();
        foreach($result as $v){
            $suggestions[]= array('title' => $v['company']);
        }
        echo json_encode(array('data' => $suggestions));
    }
    public function addadmin(){
        $type = $this->user_service->get_admin_type();
        $this->assign('type', $type);
        $this->display('manager/common/header.html');
        $this->display('manager/user/addadmin.html');
    }
    //ASHH52159715E3721674
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
    public function deletejudges(){
        $result = $this->judges_service->delete_judges();
        redirect('manager/judges/judgeslist');
    }
    public function scoredlist(){
        $result = $this->record_service->get_record_by_uid();
        //var_dump($result);exit();
        $this->assign('records', $result['records']);
        $this->assign('page', $result['page']);
        $this->assign('search', $result['search']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('sum', $result['sum']);
        $this->display('manager/common/header.html');
        //$this->display('manager/user/index.html');
        $this->display('manager/judges/scored.html');
    }
    public function logout(){
        delete_cookie('admin_userinfo');
	    delete_cookie('admin_username');
	    delete_cookie('type');
	    delete_cookie('auid');
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
}