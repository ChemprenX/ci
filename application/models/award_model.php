<?php

class award_model extends CI_Model{
    
    private $_table = 'jwj_award_2017';
    
    function __construct(){
        parent::__construct();
    }
    
    public function get_award_all(){
        $sql = "SELECT * FROM " . $this->_table;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_award_by_aid($aid){
        $sql = "SELECT * FROM " . $this->_table . " WHERE aid = '$aid'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_awards(){
        $sql = "SELECT ja.aid,ja.agid,jwag.code FROM ". $this->_table ." ja
        LEFT JOIN (
        SELECT jag.code,jag.agid FROM jwj_award_group_2017 jag ) jwag ON jwag.agid = ja.agid";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}