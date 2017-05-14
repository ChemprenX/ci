<?php
class invoice_model extends CI_Model{
    private $_table = 'jwj_invoice_info';
    const ORDINARY_INVOICE = 1;//Ordinary invoice;
    const VAT_INVOICE = 2; //增值税发票
    
    const REQUEST_SUCCESS = 1000;//请求成功
    
    const USER_NAME_NOT_NULL = 2000; //用户名不能为空
    const USER_PASSWORD_NOT_NULL = 2001; //密码不能为空
    const USER_IS_NULL = 2002; //用户不存在
    const PASSWORD_ERROR = 2003; //密码错误
    const USER_EXIST = 2004; //用户已存在
    const USER_ID_NOT_NULL = 2005;//用户ID不能为空
    
    const CASE_ID_NOT_NULL = 3000;//案例ID不能为空
    const TYPE_ERROR = 3001;//类型错误
    const FILE_UPLOAD_FAIL = 3002;//文件上传错误
    const FILE_ERROR = 3003;//文件错误
    const CASE_IS_NULL = 3004;//没有案例
    
    const MONEY_ERROR = 4000;//金额错误
    const COMPANY_NAME_NOT_NULL = 4001;//单位名称不能为空
    const INVOICE_TYPE_ERROR = 4002;//发票类型错误
    const INVOICE_IS_NULL = 4003;//没有发票
    const INVOICE_ID_NOT_NULL = 4004;//发票ID不能为空
    
    const PAYMENT_FAIL = 5001;//支付二维码生成失败
    const OUT_TRADE_NO_NOT_NULL = 5002;//订单号不能为空
    const ORDER_IS_NULL = 5003;//订单不存在
    
    const SYSTEM_ERROR = 6000; //系统错误
    function __construct(){
        parent::__construct();
    }

    public function add($invoice){
        $sql = "INSERT INTO ".$this->_table."  set ";
        foreach ($invoice as $key => $value){
            $sql .= $key . "='".$value."',";
        }
        $sql = trim($sql,',');

        return $this->db->query($sql);
    }

    public function update($iid, $invoice){
        $sql = "UPDATE " . $this->_table . " SET ";
        foreach ($invoice as $key => $value){
            $sql .= "`".$key."`" . "='".$value."',";
        }
        $sql = trim($sql,',');
        $sql .= " WHERE iid = '$iid'";
        return $this->db->query($sql);
    }
    
    public function get_invoices($search = array()){

        $sql = "SELECT * FROM " . $this->_table ;

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