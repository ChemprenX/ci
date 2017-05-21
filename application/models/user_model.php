<?php

class user_model extends MY_Model{
    const USE_STATUS = 1;
    const DELETE_STATUS = 2;
    const PAGE_USER_COUNT = 20;
    private $_table = 'jwj_user_';
    function __construct(){
        parent::__construct();
    }

    public function get_userinfo_by_name($username , $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table.self::YEAR." WHERE username = '$username' AND `status` = '$status'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }

    public function add($userinfo){
        $sql = "INSERT INTO ".$this->_table.self::YEAR." set ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }

    public function get_userinfo_by_uid($uid, $year,$status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table."$year  WHERE uid = '$uid' AND `status` = '$status'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }

    public function update($uid,$year,$userinfo){
        $sql = "UPDATE " . $this->_table."$year  SET ";
        foreach ($userinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE uid = '$uid'";
        return $this->db->query($sql);
    }
    public function get_users($search = array(),$year = self::YEAR){
        $sql = "SELECT * FROM ". $this->_table . "$year ";
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['username'])){
                $sql .= 'AND username LIKE ' . "'%" . $search['username'] ."%'";
            }
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }

}