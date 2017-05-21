<?php
class award_model extends MY_Model{
    private $_table = 'jwj_award_';
    function __construct(){
        parent::__construct();
    }
    public function get_award_all($years = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table . $years;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function get_award_by_aid($aid, $years = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table . "$years WHERE aid = '$aid'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    public function get_awards($years = self::YEAR){
        $sql = "SELECT ja.aid,ja.agid,jwag.code FROM ". $this->_table ."$years ja
        LEFT JOIN (
        SELECT jag.code,jag.agid FROM jwj_award_group_$years jag ) jwag ON jwag.agid = ja.agid";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}