<?php

class pay_model extends MY_Model{
    
    const COUNTER_FEE = 0.002; //手续费
    private $_table = 'jwj_pay_info_';
    
    function __construct(){
        parent::__construct();
    }
    
    
    public function add($payinfo,$year = self::YEAR){
        $sql = "INSERT INTO ".$this->_table."$year set ";
        foreach ($payinfo as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }
    
    public function update_by_out_trade_no($out_trade_no, $payinfo){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($payinfo as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE out_trade_no = '$out_trade_no'";
        return $this->db->query($sql);
    }
    
    public function get_pay_info_by_out_trade_no($out_trade_no,$year = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table . "$year WHERE out_trade_no = '$out_trade_no'";
        $res = $this->db->query($sql);
        return $res->row_array();
    }
    
}