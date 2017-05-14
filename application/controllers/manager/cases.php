<?php

class cases extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('case_service');
        $this->load->service('image_service');
        $this->load->service('award_service');
        $this->load->service('beyond_service');
        $this->check();
    }
    public function invoicesubmitact(){
        $this->case_service->add_invoice();
        $this->display('api/handleSucc.html');
        $this->display('api/common/header.html');
    }
    /*old list*/
    public function caselist(){
        $result = $this->case_service->get_cases();
        $awards = $this->award_service->get_award_all();
        $status = $this->case_service->get_status();
        $this->assign('cases', $result['case']);
        $this->assign('cidArray',$result['cidArray']);
        $this->assign('status', $status);
        $this->assign('awards', $awards);
        $this->assign('page', $result['page']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('search', $result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/case/caselist.html');
    }
    /*查看今年的案例---旧方法*/
    public function caselist2017_old(){
        $result = $this->case_service->get_cases_2017_old();
        $awards = $this->award_service->get_award_all();
        $status = $this->case_service->get_status();
        $this->assign('cases', $result['case']);
        $this->assign('cidArray',$result['cidArray']);
        $this->assign('status', $status);
        $this->assign('awards', $awards);
        $this->assign('page', $result['page']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('search', $result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/case/caselist2017.html');
    }
    public function caseopen(){
        $allResult = $this->case_service->get_case_by_cid_2017();
        $case = $allResult[0];
        $nextCid = $allResult[1];
        $lastCid = $allResult[2];
        if(!$case['title']){
            $type = 2;
        }else{
            $type = 1;
        }
        $case['swf_url'] = image_service::SWF_URL . $case['swf_url'];
        $userinfo = $this->user_service->get_userinfo_by_uid($case['uid']);
        $award= $this->award_service->get_award_by_aid($case['aid']);
        $awards = $this->award_service->get_award_all();
        $award_group= $this->award_service->get_award_group_by_agid($award['agid']);
        $temp = explode( '.',$case['video_url']);
        $suffix = '';
        if (!empty($temp[1])){
            $suffix = $temp[1];
        }
        //获取案例对应的评分
        $scores = $this->beyond_service->get_score_buy_cid();
        $this->assign('scores',$scores);
        $this->assign('type',$type);
        $this->assign('nextCid', $nextCid);
        $this->assign('lastCid', $lastCid);
        $this->assign('suffix', $suffix);
        $this->assign('case', $case);
        $this->assign('userinfo', $userinfo);
        $this->assign('award', $award);
        $this->assign('awards', $awards);
        $this->assign('awardgroup', $award_group);
        $this->display('manager/common/header.html');
        $this->display('manager/case/caseopen.html');
    }
    public function oldcaselist(){
        $result = $this->case_service->get_old_cases();
        //var_dump($result);exit();
        //$status = $this->case_service->get_status();
        $this->assign('cases', $result['case']);
        //$this->assign('status', $status);
        $this->assign('page', $result['page']);
        $this->assign('sumpage', $result['sumpage']);
        $this->assign('search', $result['search']);
        $this->display('manager/common/header.html');
        $this->display('manager/case/oldcaselist.html');
    }
    public function changestatus(){
        $result = $this->case_service->change_status();
        echo json_encode($result);
        exit();
    }
    //改变状态并增加备注
    public function changeStatusRemark(){
        $result = $this->case_service->change_status_remark();
        echo json_encode($result);
        exit();
    }
    //修改用户备注
    public function changeRemark(){
        $result = $this->case_service->change_user_remark();
        echo json_encode($result);
        exit();
    }
    public function searchAllcase(){
        $result = $this->case_service->search_allcase();
        echo json_encode($result);
        exit();
    }
    public function caseimagedata(){
        
    }
    public function casegroup(){
        $cases = $this->case_service->get_cases_by_export();
        //var_dump(count($cases));
        $arr = array();
        foreach ($cases as $case){
            $arr[$case['aid']][] = $case['cid'];
        }
        //var_dump($arr);exit();
        $arr['10'] = array_merge($arr['10'],$arr['15'],$arr['18']);
        $arr['9'] = array_merge($arr['9'],$arr['12']);
        $arr['6'] = array_merge($arr['6'],$arr['13']);
        $arr['4'] = array_merge($arr['4'],$arr['14']);
        $arr['5'] = array_merge($arr['5'],$arr['16']);
        $arr['8'] = array_merge($arr['8'],$arr['11'],$arr['17']);
        unset($arr['11']);
        unset($arr['12']);
        unset($arr['13']);
        unset($arr['14']);
        unset($arr['15']);
        unset($arr['16']);
        unset($arr['17']);
        unset($arr['18']);
        foreach($arr as $key => $value){
            foreach ($value as $v){
                $sql = 'INSERT INTO jwj_group_case (group_id,case_id) values("' . $key . '","' . $v . '")';
                $rs = mysql_query($sql);
                var_dump($rs);
            }
        } 
        /* $cases = $this->case_service->get_cases_by_export();
        $arr = array();
        foreach ($cases as $case){
            $arr[$case['aid']][] = $case['cid'];
        }
        $arr['11'] = array_merge($arr['11'],$arr['15'],$arr['16'] ,$arr['17'],$arr['13'] );
        
        unset($arr['15']);
        unset($arr['16']);
        unset($arr['17']);
        unset($arr['13']);
        //$group = array(1,2,3,4,5,6,7,8,9,10);
        $temp = array();
        $gtemp = array();
        foreach ($arr as $value){
            $count = floor(count($value)/10);
            $yu = count($value) % 10;
            if ($yu > 0){
                for ($i = 1; $i <= $yu; $i++){
                    $temp[] = array_pop($value);
                }
            }
            $gtemp[] = array_chunk($value, $count);
            
        }
        $ftemp = array();
        $count = floor(count($temp)/10);
        $yu = count($temp) % 10;
        if ($yu > 0){
            for ($i = 1; $i <= $yu; $i++){
                $ftemp[] = array_pop($temp);
            }
        }
        $gtemp[] = array_chunk($temp, $count);
       
        $gtemp[] = array_chunk($ftemp, 1);
        foreach ($gtemp as $value){
            
            for ($i = 0; $i < 10; $i++){
                //var_dump($v[$i]);exit();
                if (!empty($value[$i])){
                    foreach ($value[$i] as $v){
                        $group[$i+1][] = $v;
                    }
                     
                }
                
            }
        }
        
        //var_dump($ftemp);
        //var_dump($gtemp);
        //var_dump($group);
        foreach($group as $key => $value){
            foreach ($value as $v){
                $sql = 'INSERT INTO jwj_group_case (group_id,case_id) values("' . $key . '","' . $v . '")';
                $rs = mysql_query($sql);
            }
        } */
    }
    public function caseexport(){
        
        $con = mysql_connect("219.239.88.57","tmg","tmgzcb!");
        //$con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }else{
            echo 'aa';
        }
        mysql_select_db('jinwangjiang',$con);
        mysql_query("set names utf8");
        
        $result = $this->case_service->get_cases_by_export();
        //var_dump($result);exit();
        $datas = array();
        foreach ($result as $value){
            $data = array();
            $data['case_id'] = $value['cid'];
            $data['company'] = $value['company'];
            $data['company_short'] = '';
            $data['company_profile'] = '';
            $data['contact'] = $value['contact'];
            $data['phone'] = $value['telephone'];
            $data['email'] = $value['email'];
            $data['award_id'] = $value['aid'];
            $data['award_code'] = $value['atitle'];
            $data['advertiser'] = $value['advertiser'];
            $data['advertiser_logo'] = $value['advertiser_logo'];
            $data['agency_company'] = $value['agency_company'];
            $data['agency_company_logo'] = $value['agency_company_logo'];
            $data['title'] = $value['title'];
            $data['description'] = '';
            $data['visual_url'] = $value['visual_url'];
            $data['url'] = $value['url'];
            $data['video_url'] = $value['video_url'];
            $data['flash_url'] = $value['swf_url'];
            $data['create_time'] = $value['create_time'];
            $data['create_time_str'] = ''; 
            $data['client_ip'] = '';
            $data['order'] = '0';
            $data['status'] = '1';
            $data['score'] = $value['score'];
            //$datas[] = $data;
            $sql = "INSERT INTO jwj_case set ";
            foreach ($data as $k => $v){
                $sql .= "`".$k."`" . "='".$v."',";
            }
            $sql = trim($sql,',');
            mysql_query($sql);
            //$sql = 'INSERT INTO jwj_group_case (group_id,case_id,create_by) values("' . $value['aid'] . '","' . $value['cid'] . '","1")';
            //$rs = mysql_query($sql);
            //var_dump($rs);
            var_dump(mysql_error());
        }
        //var_dump($datas);
        /* $sql = "INSERT INTO jwj_case set ";
        foreach ($case as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,','); */
        $sql = "select * from `jwj_case`";
        $result=mysql_query($sql);
        $arr = array();
        while ($rs = mysql_fetch_array($result, MYSQL_ASSOC)){
            $arr[] = $rs;
        }
        
        var_dump($arr);exit; 
    }
    public function addLogistics(){
        $this->case_service->add_logistics_again();
        /*$this->display('api/handleSucc.html');
        $this->display('api/common/header.html');*/
    }
}