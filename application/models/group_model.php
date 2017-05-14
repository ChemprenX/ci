<?php

class group_model extends CI_Model{
    
    private $_table = 'jwj_group';
    
    function __construct(){
        parent::__construct();
        $this->odb = $this->load->database('old', TRUE);
    }
    public function get_group_all(){
        $sql = "SELECT * FROM " . $this->_table;
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function get_group_by_id($id){
        $sql = "SELECT * FROM " . $this->_table . " WHERE group_id = '$id'";
        $res = $this->odb->query($sql);
        return $res->row_array();
    }
}