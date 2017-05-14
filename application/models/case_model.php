<?php

class case_model extends CI_Model{
    //测试1386 411   线上1368 420
    const AUDIT_STATUS = 1;   //未审核
    const THROUGH_AUDIT_STATUS = 2;  //审核通过
    const NOT_PASS_AUDIT_STATUS = 3;  //审核未通过
    const DELETE_STATUS = 4;   //删除状态
    const PAGE_CASE_COUNT = 20; //每页显示数量
    const CASE_MONEY_A_430 = 2000;  //每项奖的费用
    const CASE_MONEY_A_531 = 2500;  //每项奖的费用
    const CASE_MONEY_A_930 = 3000;  //每项奖的费用
    const CASE_MONEY_B_531 = 8000;  //每项奖的费用
    const CASE_MONEY_B_930 = 10000;  //每项奖的费用
    const CASE_MONEY_C_930 = 30000;  //每项奖的费用
    const ALI_PAY = 1;  //支付宝支付
    const LINE_PAY = 2; //线下支付
    const TRADE_NO = '100000';//订单号
    const SUBJECT = '报名费'; //
    private $_table = 'jwj_case';
    private $_table1 = 'jwj_case_2016';
    private $_table2 = 'jwj_case_2015';
    private $_table3 = 'jwj_user';
    private $_table4 = 'jwj_user_2016';
    private $_table5 = 'jwj_user_2015';
    private $_invoiceTable = 'jwj_invoice_info';
    private $_logistics = 'jwj_logistics_info';
    private $_status = array(
            self::AUDIT_STATUS => '未审核',
            self::THROUGH_AUDIT_STATUS => '审核通过',
            self::NOT_PASS_AUDIT_STATUS => '审核未通过',
    );
    private $_money = array(
            'A' => array(
                '2017-05-01' => self::CASE_MONEY_A_430,
                '2017-06-01' => self::CASE_MONEY_A_531,
                '2017-08-01' => self::CASE_MONEY_A_930,
            ),
            'B' => array(
                '2017-06-01' => self::CASE_MONEY_B_531,
                '2017-08-01' => self::CASE_MONEY_B_930,
            ),
            'C' => array(
                '2017-10-01' => self::CASE_MONEY_C_930,
            ),
    );
    function __construct(){
        parent::__construct();
    }
    /*存储发票信息*/
    public function add_invoice($invoice){
        $sql = "INSERT INTO ".$this->_invoiceTable." set ";
        foreach ($invoice as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    public function get_status($status = null){
        if (!empty($status) && !empty($this->_status[$status])){
            return $this->_status[$status];
        }
        return $this->_status;
    }
    public function get_money($status = null){
        if (!empty($status) && !empty($this->_money[$status])){
            return $this->_money[$status];
        }
        return $this->_money;
    }
    /*** 增加案例*/
    public function add($case){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($case as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    /*** 修改案例*/
    public function update($cid, $case){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($case as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE cid = '$cid'";
        return $this->db->query($sql);
    }
    
    public function update_by_no($no, $case){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($case as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE out_trade_no = '$no'";
        return $this->db->query($sql);
    }
    /*** 修改案例--测试*/
    public function update_test($cid, $case){
        if($cid <500){
            $sql = "UPDATE " . $this->_table2 . " SET ";
        }elseif ($cid >1368){
            $sql = "UPDATE " . $this->_table . " SET ";
        }else{
            $sql = "UPDATE " . $this->_table1 . " SET ";
        }
        foreach ($case as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE cid = '$cid'";
        return $this->db->query($sql);
    }
    public function get_case_by_cid($cid){
        if ($cid <500){
            $sql = "SELECT * FROM " . $this->_table2 . " WHERE cid = '$cid'";
        }elseif ($cid >1368){
            $sql = "SELECT * FROM " . $this->_table . " WHERE cid = '$cid'";
        }else{
            $sql = "SELECT * FROM " . $this->_table1 . " WHERE cid = '$cid'";
        };
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_case_by_uid($uid, $status = NULL){
        if($uid < 177){
            $sql = "SELECT * FROM " . $this->_table2 . " WHERE uid = '$uid'";
        }elseif ($uid > 420){
            $sql = "SELECT * FROM " . $this->_table . " WHERE uid = '$uid'";
        }else{
            $sql = "SELECT * FROM " . $this->_table1 . " WHERE uid = '$uid'";
        }
        if (empty($status)){
            $sql .= " AND `status` != " . self::DELETE_STATUS;
        }else {
            $sql .= " AND `status` = $status";
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_case_by_uid_2017($search){
        $uid = $search['uid'];
        if($uid < 177){
            $sql = "SELECT * FROM " . $this->_table2 . " WHERE uid = '$uid'";
        }elseif ($uid > 420){
            $sql = "SELECT * FROM " . $this->_table . " WHERE uid = '$uid'";
        }else{
            $sql = "SELECT * FROM " . $this->_table1 . " WHERE uid = '$uid'";
        }
        if (!empty($search['commitTime'])){
            $sql .= ' AND create_time >= ' .$search['commitTime'];
        }
        //奖项类别
        if (!empty($search['awardType'])){
            $sql .= ' AND FIND_IN_SET('.$search['awardType'].', aid)';
        }
        //审核时间
        if (!empty($search['checkTime'])){
            $sql .= ' AND check_time >= ' .$search['checkTime'];
        }
        //审核状态
        if (!empty($search['status'])){
            $sql .= ' AND status = ' . $search['status'];
        }
        //评分排序
        if (!empty($search['sort'])){
            switch ($search['sort']){
                case '1':
                    $sql_sort = " ORDER BY score DESC";
                    break;
                case '2':
                    $sql_sort = " ORDER BY score ASC";
                    break;
                case '3':
                    $sql .= ' AND score Is NULL';
                    break;
                default:
                    break;
            }
        }
        $sql .= $sql_sort;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    /*修改支付状态*/
    public function change_pay_info($cid,$status){
        if ($cid <500){
            $sql = "UPDATE " . $this->_table2 . " SET pay_info = ".$status. " WHERE cid = '$cid'";
        }elseif ($cid >1368){
            $sql = "UPDATE " . $this->_table . " SET pay_info = ".$status. " WHERE cid = '$cid'";
        }else{
            $sql = "UPDATE " . $this->_table1 . " SET pay_info = ".$status. " WHERE cid = '$cid'";
        };
        $res = $this->db->query($sql);
        return $res;
    }
    public function get_cases($search = array(), $page = 1, $num = self::PAGE_CASE_COUNT){
        $sql = "SELECT jc.cid,jc.uid,jc.aid,jc.title,jc.create_time,jc.score,jc.status,jc.url,jc.no_case_advertiser,jc.no_case_advertiser_logo,jc.no_case_visual_url,jc.no_case_url,jwju.contact,jwju.company,jwja.title atitle FROM ". $this->_table ." jc 
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company FROM jwj_user ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award_2017 ja ) jwja ON jwja.aid = jc.aid";
        //$sql = "SELECT * FROM " . $this->_table;
        $sql_sort = " ORDER BY jc.create_time DESC"; 
        //$sql .= ' WHERE jc.uid > 0 AND jc.status != 4';
        if (!empty($search)){
            $sql .= ' WHERE jc.uid > 0 ';
            if (!empty($search['status'])){
                $sql .= 'AND jc.status = ' . $search['status'];
            }
            if (!empty($search['title'])){
                $sql .= 'AND jc.title LIKE ' . "'%" . $search['title'] ."%' OR jwju.company LIKE '%" . $search['title'] ."%' OR jwja.title LIKE '%" . $search['title'] ."%'";
            }
            if (!empty($search['uid'])){
                $sql .= 'AND jc.uid = ' . $search['uid'] ;
            }
            if (!empty($search['sort'])){
                switch ($search['sort']){
                    case '1':
                        $sql_sort = " ORDER BY jc.create_time ASC";
                        break;
                    case '2':
                        $sql_sort = " ORDER BY jc.score DESC";
                        break;
                    case '3':
                        $sql_sort = " ORDER BY jc.score ASC";
                        break;
                    default:
                        break;
                }
            }
        }
        $sql .= $sql_sort;
        $limit = ($page-1) * $num . ','.$num;
        $sql .= ' limit '.$limit;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_cases_2017($search = array(), $page = 1, $num = self::PAGE_CASE_COUNT){
        if ($search['commitY'] == '2017'){
            $sql = "SELECT jc.cid,jc.uid,jc.aid,jc.title,jc.create_time,jc.check_time,jc.score,jc.status,jc.url,jc.no_case_advertiser,jc.no_case_advertiser_logo,jc.no_case_visual_url,jc.no_case_url,jc.checkpeople,jwju.contact,jwju.company,jwju.username,jwju.mobile,jwja.title atitle FROM jwj_case jc 
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.username,ju.mobile FROM jwj_user ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award_2017 ja ) jwja ON jwja.aid = jc.aid";
        }elseif ($search['commitY'] == '2016'){
            $sql = "SELECT jc.cid,jc.uid,jc.aid,jc.title,jc.create_time,jc.check_time,jc.score,jc.status,jc.url,jc.no_case_advertiser,jc.no_case_advertiser_logo,jc.no_case_visual_url,jc.no_case_url,jc.checkpeople,jwju.contact,jwju.company,jwju.username,jwju.mobile,jwja.title atitle FROM jwj_case_2016 jc 
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.username,ju.mobile FROM jwj_user_2016 ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award ja ) jwja ON jwja.aid = jc.aid";
        }else{
            $sql = "SELECT jc.cid,jc.uid,jc.aid,jc.title,jc.create_time,jc.check_time,jc.score,jc.status,jc.url,jc.no_case_advertiser,jc.no_case_advertiser_logo,jc.no_case_visual_url,jc.no_case_url,jc.checkpeople,jwju.contact,jwju.company,jwju.username,jwju.mobile,jwja.title atitle FROM jwj_case_2015 jc 
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.username,ju.mobile FROM jwj_user_2015 ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award ja ) jwja ON jwja.aid = jc.aid";
        };
        $sql_sort = " ORDER BY jc.create_time DESC";
        $sql .= ' WHERE jc.uid > 0 AND jc.status !=4';
        if (!empty($search)){
            //$sql .= ' WHERE jc.uid > 0 ';
            //提交时间
            if (!empty($search['commitTime'])){
                $sql .= ' AND jc.create_time >= ' .$search['commitTime'];
            }
            //奖项类别
            if (!empty($search['awardType'])){
                $sql .= ' AND FIND_IN_SET('.$search['awardType'].', jc.aid)';
            }
            //审核时间
            if (!empty($search['checkTime'])){
                $sql .= ' AND jc.check_time >= ' .$search['checkTime'];
            }
            //审核状态
            if (!empty($search['status'])){
                $sql .= ' AND jc.status = ' . $search['status'];
            }
            //评分排序
            if (!empty($search['sort'])){
                switch ($search['sort']){
                    case '1':
                        $sql_sort = " ORDER BY jc.score DESC";
                        break;
                    case '2':
                        $sql_sort = " ORDER BY jc.score ASC";
                        break;
                    case '3':
                        $sql .= ' AND jc.score Is NULL';
                        break;
                    default:
                        break;
                }
            }
            //输入要查询的类型
            if (!empty($search['content'])){
                $sql .= ' AND jc.title LIKE ' . "'%" . $search['content'] ."%' OR jwju.company LIKE '%" . $search['content'] ."%' OR jwju.username LIKE '%" . $search['content'] ."%'";
            }
        }
        $sql .= $sql_sort;
        $res1 = $this->db->query($sql);
        $result1 = $res1->result_array();
        $limit = ($page-1) * $num . ','.$num;
        $sql .= ' limit '.$limit;
        $res = $this->db->query($sql);
        $result2 = $res->result_array();
        $cidArray = array();
        for ($x = 0;$x < count($result2);$x++){
            array_push($cidArray,$result2[$x]['cid']);
        }
        $arr_str = serialize($cidArray);
        set_cookie('cidArray', $arr_str, 86400);
        $dataArray = array();
        array_push($dataArray,count($result1),$result2);
        return $dataArray;
    }
    public function get_cases_num($search = array()){
        $sql = "SELECT COUNT(*) count FROM ". $this->_table;
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['status'])){
                $sql .= 'AND status = ' . $search['status'];
            }
            if (!empty($search['title'])){
                $sql .= 'AND title LIKE ' . "'%" . $search['title'] ."%'";
            }
        }
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_cases_num_by_status($search){
        if($search['commitY'] == '2017'){
            $sql = "SELECT COUNT(*) count,`status` FROM ". $this->_table . " WHERE `status` !=4 AND uid > 0 GROUP BY `status`";
        }elseif ($search['commitY'] == '2016'){
            $sql = "SELECT COUNT(*) count,`status` FROM ". $this->_table1 . " WHERE `status` !=4 AND uid > 0 GROUP BY `status`";
        }else{
            $sql = "SELECT COUNT(*) count,`status` FROM ". $this->_table2 . " WHERE `status` !=4 AND uid > 0 GROUP BY `status`";
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_case_all($search = array()){
        $sql = "SELECT * FROM " . $this->_table ;
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['aid'])){
                $sql .= 'AND aid = ' . $search['aid'];
            }
            if (!empty($search['title'])){
                $sql .= 'AND title LIKE ' . "'%" . $search['title'] ."%'";
            }
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function change_status($cids, $status,$checkName){
        $cids = implode(',', $cids);
        $check_time = time();
        $sql = "UPDATE " . $this->_table . " SET status = $status".",check_time = $check_time".",checkpeople = '".$checkName."' WHERE cid IN ($cids)";
        return $this->db->query($sql);
    }
    //修改案例状态及备注
    public function change_status_remark($cid, $status,$remark,$checkName){
        $check_time = time();
        if ($cid <500){
            $sql = "UPDATE " . $this->_table2 . " SET status = $status".",check_time = $check_time".",remark = '". $remark."',checkpeople = '".$checkName ."' WHERE cid =$cid";
        }elseif ($cid >1368){
            $sql = "UPDATE " . $this->_table . " SET status = $status".",check_time = $check_time".",remark = '". $remark."',checkpeople = '".$checkName ."' WHERE cid =$cid";
        }else{
            $sql = "UPDATE " . $this->_table1 . " SET status = $status".",check_time = $check_time".",remark = '". $remark."',checkpeople = '".$checkName ."' WHERE cid =$cid";
        }
        return $this->db->query($sql);
    }
    //修改用户备注
    public function change_user_remark($Uid, $remark){
        if($Uid < 177){
            $sql = "UPDATE " . $this->_table5 . " SET remark = '". $remark ."' WHERE uid =$Uid";
        }elseif ($Uid > 420){
            $sql = "UPDATE " . $this->_table3 . " SET remark = '". $remark ."' WHERE uid =$Uid";
        }else{
            $sql = "UPDATE " . $this->_table4 . " SET remark = '". $remark ."' WHERE uid =$Uid";
        }
        return $this->db->query($sql);
    }
    public function search_allcase($searchArray){
        $sql = "SELECT jc06.cid,jc06.uid,jc06.aid,jc06.title,jc06.create_time,jc06.score,jc06.status,jc06.url,jc06.no_case_advertiser,jc06.no_case_advertiser_logo,jc06.no_case_visual_url,jc06.no_case_url,ju06.contact,ju06.company,ju06.username,ju06.mobile FROM jwj_case jc06 
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.username,ju.mobile FROM jwj_user ju) ju06 ON ju06.uid = jc06.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award_2017 ja ) jwja ON jwja.aid = jc06.aid";
        if (!empty($searchArray)){
            if (!empty($searchArray['time1'])){
//                $sql .= 'AND create_time >= ' . $searchArray['time1'];
            }
            if (!empty($searchArray['awardType'])){

            }
            if (!empty($searchArray['time2'])){

            }
            if (!empty($searchArray['sort'])){

            }
            if (!empty($searchArray['status'])){
                switch ($searchArray['status']){
                    case '1':
                        $sql_sort = 'AND jc06.status = ' . $searchArray['status'];
                        break;
                    case '2':
                        $sql_sort = 'AND jc06.status = ' . $searchArray['status'];
                        break;
                    case '3':
                        $sql_sort = 'AND jc06.status = ' . $searchArray['status'];
                        break;
                    default:
                        break;
                }
            }
        }
//        $sql .= $sql_sort;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_cid_by_url($url){
        $sql = "SELECT cid FROM " . $this->_table . " WHERE url like '%$url%'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_cases_by_export(){
        $sql = "SELECT jc.cid,jc.uid,jc.aid,jc.title,jc.create_time,jc.score,jc.status,jc.url,jc.advertiser,jc.advertiser_logo,jc.agency_company,jc.agency_company_logo,jc.visual_url,jc.video_url,jc.swf_url,jwju.contact,jwju.company,jwju.telephone,jwju.email,jwja.title atitle FROM ". $this->_table ." jc
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.telephone,ju.email FROM jwj_user ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award_2017 ja ) jwja ON jwja.aid = jc.aid WHERE jc.status = 2";
        //$sql = "SELECT * FROM " . $this->_table;
        
        //var_dump($sql);exit();
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function add_logistics($logistics){
        $sql = "INSERT INTO ".$this->_logistics." set ";
        foreach ($logistics as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    public function update_logistics($logistics){
        $iid = $logistics['iid'];
        $status = $logistics['status'];
        $logistics_company = $logistics['logistics_company'];
        $orderNumber = $logistics['order_number'];
        $sql = "UPDATE ".$this->_logistics." set status=".$status.',logistics_company='.$logistics_company.',order_number='.$orderNumber.' WHERE iid='.$iid;
//        foreach ($logistics as $key => $value){
//            $sql .= $key . "='".$value."',";
//        }
//        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    public function get_cases_by_cids($cids){
        $sql = "SELECT * FROM " . $this->_table."  WHERE cid IN ('$cids')";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function update_by_cids($cids,$case){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($case as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE cid IN ('$cids')";
        return $this->db->query($sql);
    }
}