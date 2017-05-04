<?php

class record_model extends CI_Model{
    
    const USE_STATUS = 1;
    const DELETE_STATUS = 2;
    const PAGE_USER_COUNT = 20;
    private $_table = 'jwj_score';
    
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
    public function update($id, $recordinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($recordinfo as $key => $value){
            $sql .= "`".$key . "`='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE id = '$id'";
        return $this->odb->query($sql);
    }
    public function get_recordinfo_by_id($id){
        $sql = "SELECT * FROM " . $this->_table . " WHERE id = '$id'";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    public function get_judges_by_name($username, $status = self::USE_STATUS){
        $sql = "SELECT * FROM " . $this->_table . " WHERE username = '$username' AND `status` = '$status'";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    public function get_cases($search = array()){
        $sql = 'SELECT js.*,jwju.realname,jwjc.title,jwjc.award_code,jwjc.award_id,jwjc.advertiser,jwjc.url,jwjc.video_url FROM jwj_score js
        LEFT JOIN (
        SELECT ju.realname,ju.user_id FROM jwj_user ju) jwju ON jwju.user_id = js.user_id
        INNER JOIN (
        SELECT jc.* FROM jwj_case jc ) jwjc ON jwjc.id = js.case_id';
        if ($search['commitY'] == '2017'){
            $sql .= ' AND js.create_time > 1483200000';
        }else{
            $sql .= ' AND js.create_time < 1483200000';
        }
        $sql .= ' AND js.user_id = ' .  $search['user_id'] ;
        if(!empty($search)){
            if (!empty($search['sort'])){
                if ($search['sort']=='1'){
                    $sql_sort = " ORDER BY js.score";
                }else{
                    $sql_sort = " ORDER BY js.score DESC";
                }
            }else{
                $sql_sort = " ORDER BY js.create_time DESC";
            }
        }
        $sql .= $sql_sort;
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function get_records($search = array(), $page = 1, $num = self::PAGE_USER_COUNT){
        /* $sql = "SELECT ju.uid,ju.username,ju.email,ju.create_time,jwc.count FROM ". $this->_table ." ju
        LEFT JOIN (
        SELECT COUNT(*) as `count`, jc.uid FROM jwj_case jc GROUP BY jc.uid ) jwc ON jwc.uid = ju.uid"; */
        //$sql = "select * from `jwj_user` where `status` = 1";jwj_score
        //$sql = "select * from `jwj_score` where `status` = 1";
        $sql = "SELECT js.id,js.case_id,js.user_id,js.score,js.score1,js.score2,js.score3,js.score4,js.score5,js.create_time,js.score_modify,js.status,js.jsstatus,jwju.realname,jwjc.title,jwjc.award_code,jwjc.award_id,jwjc.advertiser FROM jwj_score js
        LEFT JOIN (
        SELECT ju.realname,ju.user_id FROM jwj_user ju) jwju ON jwju.user_id = js.user_id
        INNER JOIN (
        SELECT jc.id,jc.title,jc.advertiser,jc.case_id,jc.award_code,jc.award_id FROM jwj_case jc ) jwjc ON jwjc.id = js.case_id";
		
        
        $sql_sort = " ORDER BY js.create_time DESC";
        if (!empty($search)){
            //$sql .= ' WHERE 1=1 ';
            /* if (!empty($search['status'])){
             $sql .= 'AND jc.status = ' . $search['status'];
            } */
            if (!empty($search['title'])){
                $sql .= ' AND jwjc.title LIKE ' . "'%" . $search['title'] ."%'";
            }
            if (!empty($search['user_id'])){
                $sql .= ' AND js.user_id = ' .  $search['user_id'] ;
            }
            if ($search['type']=='1'){
                $sql .= ' AND js.create_time > 1483200000' ;
            }
            if ($search['type']=='2'){
                $sql .= ' AND js.create_time < 1483200000' ;
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
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function get_records_num($search = array(),$status = self::USE_STATUS){
    $sql = "SELECT count(*) count FROM jwj_score js
        LEFT JOIN (
        SELECT ju.realname,ju.user_id FROM jwj_user ju) jwju ON jwju.user_id = js.user_id
        INNER JOIN (
        SELECT jc.title,jc.advertiser,jc.case_id FROM jwj_case jc ) jwjc ON jwjc.case_id = js.case_id";
        
        $sql_sort = " ORDER BY js.create_time DESC";
        if (!empty($search)){
            //$sql .= ' WHERE 1=1 ';
            /* if (!empty($search['status'])){
             $sql .= 'AND jc.status = ' . $search['status'];
            } */
            if (!empty($search['title'])){
                $sql .= ' AND jwjc.title LIKE ' . "'%" . $search['title'] ."%'";
            }
            if (!empty($search['user_id'])){
                $sql .= ' AND js.user_id = ' .  $search['user_id'] ;
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
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
    
}