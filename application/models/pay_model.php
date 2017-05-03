<?php

class pay_model extends CI_Model{
    
    private $_table = 'jwj_pay_info';
    
    function __construct(){
        parent::__construct();
    }
    
    
    public function add($payinfo){
        $sql = "INSERT INTO ".$this->_table." set ";
        foreach ($payinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    
    public function update($id, $payinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($payinfo as $key => $value){
            $sql .= "`".$key."`". "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE id = '$id'";
        return $this->db->query($sql);
    }
    
    public function update_by_out_trade_no($out_trade_no, $payinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($payinfo as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE out_trade_no = '$out_trade_no'";
        file_put_contents('/home/tmg/callback.log',$sql,FILE_APPEND);
        return $this->db->query($sql);
    }
    
    public function get_pay_info_by_id($id){
        $sql = "SELECT * FROM " . $this->_table . " WHERE id = '$id'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
    public function get_pay_info_by_out_trade_no($out_trade_no){
        $sql = "SELECT * FROM " . $this->_table . " WHERE out_trade_no = '$out_trade_no'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}