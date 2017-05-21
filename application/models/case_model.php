<?php
class case_model extends MY_Model{
    
    const AUDIT_STATUS = 1;   //未审核
    const THROUGH_AUDIT_STATUS = 2;  //审核通过
    const NOT_PASS_AUDIT_STATUS = 3;  //审核未通过
    const DELETE_STATUS = 4; //删除状态
    const SUBJECT = '报名费';
    const TRADE_NO = '100000';//订单号
    const CASE_MONEY_A_430 = 2000;  //每项奖的费用
    const CASE_MONEY_A_531 = 2500;  //每项奖的费用
    const CASE_MONEY_A_930 = 3000;  //每项奖的费用
    const CASE_MONEY_B_531 = 8000;  //每项奖的费用
    const CASE_MONEY_B_930 = 10000;  //每项奖的费用
    const CASE_MONEY_C_930 = 30000;  //每项奖的费用
    private $_table = 'jwj_case_';
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
    public function add_case($case,$year = self::YEAR){
        $sql = "INSERT INTO ".$this->_table."$year  set ";
        foreach ($case as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    
    public function update($cid, $case, $year = self::YEAR){
        $sql = "UPDATE " . $this->_table . "$year SET ";
        foreach ($case as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE cid = '$cid'";
        return $this->db->query($sql);
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
    
    public function get_case_by_cid($cid,$year){
        $sql = "SELECT * FROM " . $this->_table."$year  WHERE cid = '$cid'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_cases_by_cids($cids,$year = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table."$year  WHERE cid IN ('$cids')";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_case_by_uid($uid,$year){
        $sql = "SELECT * FROM " . $this->_table."$year  WHERE uid = '$uid'  AND `status` != " . self::DELETE_STATUS;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_cases_num($year = self::YEAR){
        $sql = "SELECT COUNT(*) count,`status` FROM ". $this->_table . "$year WHERE `status` !=4 GROUP BY `status`";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_cases($search = array(),$year = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table."$year  WHERE `status` != " . self::DELETE_STATUS;
        if (!empty($search)){
            if (!empty($search['status'])){
                $sql .= ' AND `status` = ' . $search['status'];
            }
            if (!empty($search['title'])){
                $sql .= ' AND title LIKE ' . "'%" . $search['title'] ."%'";
            }
            if (!empty($search['uid'])){
                $sql .= ' AND uid = ' . $search['uid'] ;
            }
            if (!empty($search['cid'])){
                $sql .= ' AND cid = ' . $search['cid'] ;
            }
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_case_list($search = array(),$year = self::YEAR){
        $sql = "SELECT jc.*,jwju.contact,jwju.company,jwju.mobile,jwja.title atitle FROM ". $this->_table ."$year jc
        LEFT JOIN (
        SELECT ju.uid,ju.contact,ju.company,ju.mobile FROM jwj_user_$year ju) jwju ON jwju.uid = jc.uid
        LEFT JOIN (
        SELECT ja.title,ja.aid FROM jwj_award_$year ja ) jwja ON jwja.aid = jc.aid";
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
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_money($status = null){
        if (!empty($status) && !empty($this->_money[$status])){
            return $this->_money[$status];
        }
        return $this->_money;
    }
}