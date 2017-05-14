<?php

class user_model extends CI_Model{
    
    const USE_STATUS = 1;
    const DELETE_STATUS = 2;
    const PAGE_USER_COUNT = 20;
    private $_table = 'jwj_user';
    private $_table1 = 'jwj_user_2016';
    private $_table2 = 'jwj_user_2015';
    
    function __construct(){
        parent::__construct();
    }
    public function add($userinfo){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    public function update($uid, $userinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE uid = '$uid'";
        return $this->db->query($sql);
    }
    public function get_userinfo_by_uid($uid, $status = self::USE_STATUS){
        //411-----420
        if ($uid < 177){
            $sql = "SELECT * FROM " . $this->_table2 . " WHERE uid = '$uid' AND `status` = '$status'";
        }elseif ($uid >420){
            $sql = "SELECT * FROM " . $this->_table . " WHERE uid = '$uid' AND `status` = '$status'";
        }else{
            $sql = "SELECT * FROM " . $this->_table1 . " WHERE uid = '$uid' AND `status` = '$status'";
        }
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_userinfo_by_name($username, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE username = '$username' AND `status` = '$status'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_users($search = array(), $page = 1, $num = self::PAGE_USER_COUNT){
        $sql = "SELECT ju.uid,ju.username,ju.email,ju.create_time,jwc.count FROM ". $this->_table ." ju 
        LEFT JOIN (
        SELECT COUNT(*) as `count`, jc.uid FROM jwj_case jc GROUP BY jc.uid ) jwc ON jwc.uid = ju.uid";
        $sql_sort = " ORDER BY ju.create_time DESC";
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            /* if (!empty($search['status'])){
                $sql .= 'AND jc.status = ' . $search['status'];
            } */
            if (!empty($search['username'])){
                $sql .= 'AND ju.username LIKE ' . "'%" . $search['username'] ."%'";
            }
            if (!empty($search['sort'])){
                switch ($search['sort']){
                    case '1':
                        $sql_sort = " ORDER BY ju.create_time ASC";
                        break;
                    case '2':
                        $sql_sort = " ORDER BY jwc.count DESC";
                        break;
                    case '3':
                        $sql_sort = " ORDER BY jwc.count ASC";
                        break;
                    default:
                        break;
                }
            }
        }
        $sql .= $sql_sort;
        $limit = ($page-1) * $num . ','.$num;
        $sql .= ' limit '.$limit;
        //var_dump($sql);exit();
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_users_num($search = array(),$status = self::USE_STATUS){
        if($search['commitY']=='2017'){
            $sql = "SELECT COUNT(*) count FROM ". $this->_table . " WHERE `status` = $status ";
        }elseif($search['commitY']=='2016'){
            $sql = "SELECT COUNT(*) count FROM ". $this->_table1 . " WHERE `status` = $status ";
        }else{
            $sql = "SELECT COUNT(*) count FROM ". $this->_table2 . " WHERE `status` = $status ";
        }
        if (!empty($search)){
            if (!empty($search['username'])){
                $sql .= 'AND username LIKE ' . "'%" . $search['username'] ."%'";
            }
        }
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_company($keyword){
        if (!empty($keyword)){
            $rs = $this -> db -> query('select company from ' . $this->_table . ' where company like "%' . $keyword . '%" limit 10');
        }else {
            $rs = $this -> db -> query('select company from ' . $this->_table . ' limit 10');
        }
        
        return $rs->result_array();;
    }
    public function get_All_user($search = array(),$page=1,$num = self::PAGE_USER_COUNT){
        //年份
        if ($search['chooseY'] == '2017'){
            $sql = "SELECT ju.uid,ju.username,ju.email,ju.create_time,ju.telephone,ju.mobile,ju.pay_info,jwc.count FROM ". $this->_table ." ju 
        LEFT JOIN (
        SELECT COUNT(*) as `count`, jc.uid FROM jwj_case jc GROUP BY jc.uid ) jwc ON jwc.uid = ju.uid";
        }elseif ($search['chooseY'] == '2016'){
            $sql = "SELECT ju.uid,ju.username,ju.email,ju.create_time,ju.telephone,ju.mobile,ju.pay_info,jwc.count FROM ". $this->_table1 ." ju 
        LEFT JOIN (
        SELECT COUNT(*) as `count`, jc.uid FROM jwj_case_2016 jc GROUP BY jc.uid ) jwc ON jwc.uid = ju.uid";
        }else{
            $sql = "SELECT ju.uid,ju.username,ju.email,ju.create_time,ju.telephone,ju.mobile,ju.pay_info,jwc.count FROM ". $this->_table2 ." ju 
        LEFT JOIN (
        SELECT COUNT(*) as `count`, jc.uid FROM jwj_case_2015 jc GROUP BY jc.uid ) jwc ON jwc.uid = ju.uid";
        }
        //排序
        if (!empty($search['sort'])){
            switch ($search['sort']){
                case '1':
                    $sql_sort = " ORDER BY jwc.count DESC";
                    break;
                case '2':
                    $sql_sort = " ORDER BY jwc.count ASC";
                    break;
                case '3':
                    $sql_sort = " ORDER BY ju.create_time ASC";
                    break;
                case '4':
                    $sql_sort = " ORDER BY ju.create_time DESC";
                    break;
                default:
                    break;
            }
        }
        //支付状态
        if (!empty($search['payStatus'])){
            $sql .= ' AND pay_info = ' . $search['payStatus'];
        }
        //搜索内容
        if (!empty($search['userInput'])){
//            $sql .= ' AND jc.title LIKE ' . "'%" . $search['content'] ."%' OR jwju.company LIKE '%" . $search['content'] ."%' OR jwju.username LIKE '%" . $search['content'] ."%'";
        }
        $sql .= $sql_sort;
        //总数据
        $res = $this->db->query($sql);
        $result1 = $res->result_array();
        //分页数据
        $limit = ($page-1) * $num . ','.$num;
        $sql .= ' limit '.$limit;
        $res = $this->db->query($sql);
        $result2 = $res->result_array();
        //装在一个数组里面进行返回
        $dataArray = array();
        array_push($dataArray,count($result1),$result2);
        return $dataArray;
    }
    public function get_invoice_info($uid){
        $sql = 'SELECT * from jwj_invoice_info WHERE uid = '.$uid.' ORDER BY iid DESC LIMIT 1';
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_logistics_info($uid){
        $sql = 'SELECT * from jwj_logistics_info WHERE uid = '.$uid.' ORDER BY iid DESC';
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function change_pay_info($uid,$status){
        if($uid < 177){
            $sql = "UPDATE " . $this->_table2. " SET pay_info = ". $status ." WHERE uid =$uid";
        }elseif ($uid > 420){
            $sql = "UPDATE " . $this->_table . " SET pay_info = ". $status ." WHERE uid =$uid";
        }else{
            $sql = "UPDATE " . $this->_table1 . " SET pay_info = ". $status ." WHERE uid =$uid";
        }
        return $this->db->query($sql);
    }
}