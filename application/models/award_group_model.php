<?php

class award_group_model extends CI_Model{
    
    private $_table = 'jwj_award_group_2017';
    
    function __construct(){
        parent::__construct();
    }
    
    public function get_award_group_all(){
        $sql = "SELECT * FROM " . $this->_table;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_award_group_by_agid($agid){
        $sql = "SELECT * FROM " . $this->_table . " WHERE agid = '$agid'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
}