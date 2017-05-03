<?php

class old_case_model extends CI_Model{
    
    const AUDIT_STATUS = 1;   //未审核
    const THROUGH_AUDIT_STATUS = 2;  //审核通过
    const NOT_PASS_AUDIT_STATUS = 3;  //审核未通过
    const DELETE_STATUS = 4;   //删除状态
    const PAGE_CASE_COUNT = 50; //每页显示数量
    private $_table = 'jwj_old_case';
    private $_status = array(
            self::AUDIT_STATUS => '未审核',
            self::THROUGH_AUDIT_STATUS => '审核通过',
            self::NOT_PASS_AUDIT_STATUS => '审核未通过',
    );
    
    function __construct(){
        parent::__construct();
    }
    
    public function get_status($status = null){
        if (!empty($status) && !empty($this->_status[$status])){
            return $this->_status[$status];
        }
        return $this->_status;
    }
    
    public function add($case){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($case as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    
    public function update($cid, $case){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($case as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE cid = '$cid'";
        return $this->db->query($sql);
    }
    
    public function get_case_by_cid($cid){
        $sql = "SELECT * FROM " . $this->_table . " WHERE cid = '$cid'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_case_by_uid($uid, $status = NULL){
        $sql = "SELECT * FROM " . $this->_table . " WHERE uid = '$uid'";
        if (empty($status)){
            $sql .= " AND `status` != " . self::DELETE_STATUS;
        }else {
            $sql .= " AND `status` = $status";
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function get_old_cases($search = array(), $page = 1, $num = self::PAGE_CASE_COUNT){
        $sql = "SELECT * FROM " . $this->_table;
        $sql_sort = " ORDER BY submit_time DESC";
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['title'])){
                $sql .= 'AND title LIKE ' . "'%" . $search['title'] ."%'";
            }
            if (!empty($search['sort'])){
                switch ($search['sort']){
                    case '1':
                        $sql_sort = " ORDER BY submit_time ASC";
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
    
    public function get_old_cases_num($search = array()){
        $sql = "SELECT COUNT(*) count FROM ". $this->_table;
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['title'])){
                $sql .= 'AND title LIKE ' . "'%" . $search['title'] ."%'";
            }
        }
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_cases_num_by_status(){
        $sql = "SELECT COUNT(*) count,`status` FROM ". $this->_table . " GROUP BY `status`";
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
    
    public function change_status($cids, $status){
        $cids = implode(',', $cids);
        $sql = "UPDATE " . $this->_table . " SET status = $status WHERE cid IN ($cids)";
        return $this->db->query($sql);
    }
}