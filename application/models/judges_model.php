<?php

class judges_model extends CI_Model{
    const USE_STATUS = 1;
    const DELETE_STATUS = 2;
    const PAGE_USER_COUNT = 20;
    private $_table = 'jwj_user';
    function __construct(){
        parent::__construct();
        $this->odb = $this->load->database('old', TRUE);
    }
    public function test(){
        $sql = "select * from `jwj_user`";
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function add($judgesinfo){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($judgesinfo as $key => $value){
            $sql .= "`".$key . "`='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->odb->query($sql);
    }
    public function update($uid, $judgesinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($judgesinfo as $key => $value){
            $sql .= "`".$key . "`='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE user_id = '$uid'";
        return $this->odb->query($sql);
    }
    public function get_judgesinfo_by_uid($uid, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE user_id = '$uid' AND `status` = '$status'";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    public function get_judges_by_name($username, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE username = '$username' AND `status` = '$status'";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    public function get_judgess($search = array(), $page = 1, $num = self::PAGE_USER_COUNT){
//        $sql = "SELECT ju.*,jws.count FROM jwj_user ju
//        LEFT JOIN (
//        SELECT COUNT(*) as `count`, js.user_id FROM jwj_score js GROUP BY js.user_id ) jws ON jws.user_id = ju.user_id";
        $sql = "SELECT ju.*,u.count,u.count2017 from jwj_user ju LEFT JOIN ( SELECT a.user_id,a.count,b.count2017 from ( SELECT user_id,count(1) as count  from jwj_score WHERE FROM_UNIXTIME(create_time,'%Y') = 2016 GROUP BY user_id) a	LEFT JOIN (SELECT user_id,count(1) as count2017  from jwj_score WHERE FROM_UNIXTIME(create_time,'%Y') = 2017 GROUP BY user_id) b ON b.user_id = a.user_id) u ON u.user_id = ju.user_id";
        $sql_sort = " ORDER BY create_time DESC";
        $sql .= ' WHERE ju.`status` = 1 ';
        if (!empty($search)){
            if (!empty($search['realname'])){
                $sql .= ' AND realname LIKE ' . "'%" . $search['realname'] ."%'";
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
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function get_judgess_num($search = array(),$status = self::USE_STATUS){
        $sql = "SELECT COUNT(*) count FROM ". $this->_table . " WHERE `status` = $status ";
        if (!empty($search)){
            if (!empty($search['username'])){
                $sql .= 'AND username LIKE ' . "'%" . $search['username'] ."%'";
            }
        }
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    public function get_judges_num(){
        $sql = "SELECT COUNT(*) count FROM $this->_table";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
}