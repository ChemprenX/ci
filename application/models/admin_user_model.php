<?php

class admin_user_model extends CI_Model{
    
    const USE_STATUS = 1;
    const DELETE_STATUS = 2;
    const SUPER_TYPE = 1;   //超级管理员
    const EXAMINE_TYPE = 2;  //审核员
    const PAGE_ADMIN_COUNT = 20; //每页显示数量
    private $_table = 'jwj_admin_user';
    private $_type = array(
            self::SUPER_TYPE => '超级管理员',
            self::EXAMINE_TYPE => '审核员',
    );
    
    function __construct(){
        parent::__construct();
    }
    
    public function get_type($type = null){
        if (!empty($type) && !empty($this->_type[$type])){
            return $this->_type[$type];
        }
        return $this->_type;
    }
    
    public function add($userinfo){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    
    public function update($auid, $userinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE auid = '$auid'";
        return $this->db->query($sql);
    }
    
    public function get_userinfo_by_auid($auid, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE auid = '$auid' AND `status` = '$status'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_userinfo_by_name($username, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE username = '$username' AND `status` = '$status'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_admin_sum(){
        $sql = "SELECT COUNT(*) count FROM ". $this->_table;
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_admin_list($page = 1, $num = self::PAGE_ADMIN_COUNT, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table ." WHERE `status` = '$status'";;
        $limit = ($page-1) * $num . ','.$num;
        $sql .= ' limit '.$limit;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}