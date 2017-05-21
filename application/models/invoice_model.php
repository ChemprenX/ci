<?php
class invoice_model extends MY_Model{
    private $_table = 'jwj_invoice_info_';
    const ORDINARY_INVOICE = 1;//Ordinary invoice;
    const VAT_INVOICE = 2; //增值税发票
    
    function __construct(){
        parent::__construct();
    }

    public function add($invoice,$year = self::YEAR){
        $sql = "INSERT INTO ".$this->_table."$year  set ";
        foreach ($invoice as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');
        return $this->db->query($sql);
    }

    public function update($iid, $invoice,$year = self::YEAR){
        $sql = "UPDATE " . $this->_table . "$year SET ";
        foreach ($invoice as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE iid = '$iid'";
        return $this->db->query($sql);
    }
    
    public function get_invoices($search = array(),$year = self::YEAR){
        $sql = "SELECT * FROM " . $this->_table . "$year" ;
        if (!empty($search)){
            $sql .= ' WHERE 1=1 ';
            if (!empty($search['uid'])){
                $sql .= ' AND uid = ' . $search['uid'] ;
            }
            if (!empty($search['iid'])){
                $sql .= ' AND iid = ' . $search['iid'] ;
            }
        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}