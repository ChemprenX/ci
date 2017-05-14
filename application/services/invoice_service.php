<?php
require_once ('MY_Service.php');
class invoice_service extends MY_Service{
    function __construct(){
        parent::__construct();
        $this->load->service('image_service');
        $this->load->model('invoice_model');
    }

    public function add_invoice(){

        $uid = $this->input->post('uid');
        if (empty($uid)){
            return array('code'=>user_model::USER_ID_NOT_NULL,'data'=>'');
        }
        $pay_money = intval($this->input->post('pay_money'));
        if ($pay_money < 0){
            return array('code'=>invoice_model::MONEY_ERROR,'data'=>'');
        }
        $hardcopy = $this->input->post('hardcopy');
        $license = $this->input->post('license');
        $invoice_type = $this->input->post('invoice_type');
        if ($invoice_type != invoice_model::ORDINARY_INVOICE && $invoice_type != invoice_model::VAT_INVOICE){
            return array('code'=>invoice_model::MONEY_ERROR,'data'=>'');
        }
        $company_name = $this->input->post('company_name');
        if (empty($company_name)){
            return array('code'=>invoice_model::MONEY_ERROR,'data'=>'');
        }
        $company_address = $this->input->post('company_address');
        $telephone = $this->input->post('telephone');
        $bank_name = $this->input->post('bank_name');
        $bank_account = $this->input->post('bank_account');
        $addressee = $this->input->post('addressee');
        $direction = $this->input->post('direction');

        $invoice = array();
        $invoice['uid'] = $uid;
        $invoice['pay_money'] = $pay_money;
        $invoice['invoice_type'] = $invoice_type;
        $invoice['company_name'] = $company_name;
        $invoice['company_address'] = $company_address;
        $invoice['telephone'] = $telephone;
        $invoice['bank_name'] = $bank_name;
        $invoice['bank_account'] = $bank_account;
        $invoice['addressee'] = $addressee;
        $invoice['direction'] = $direction;
        $invoice['hardcopy'] = $hardcopy;
        $invoice['license'] = $license;
        $invoice['create_time'] = time();
        
        $result = $this->invoice_model->add($invoice);
        if (empty($result)){
            return array('code'=>invoice_model::SYSTEM_ERROR,'data'=>'');
        }
        return array('code'=>invoice_model::REQUEST_SUCCESS,'data'=>'');
    }
    
    public function get_invoices() {

        $search = array();
        $search['uid'] = $this->input->post('uid');
        $search['iid'] = $this->input->post('iid');
        $result = $this->invoice_model->get_invoices($search);
        if (empty($result)){
            return array('code'=>invoice_model::INVOICE_IS_NULL,'data'=>'');
        }
        return array('code' => invoice_model::REQUEST_SUCCESS,'data'=>$result);
    }
    
    public function update_invoice() {
        $iid = $this->input->post('iid');
        if (empty($iid)){
            return array('code'=>invoice_model::INVOICE_ID_NOT_NULL,'data'=>'');
        }
        $pay_money = $this->input->post('pay_money');
        if ($pay_money < 0){
            return array('code'=>invoice_model::MONEY_ERROR,'data'=>'');
        }
        $hardcopy = $this->input->post('hardcopy');
        $license = $this->input->post('license');
        $invoice_type = $this->input->post('invoice_type');
        if ($invoice_type != invoice_model::ORDINARY_INVOICE && $invoice_type != invoice_model::VAT_INVOICE){
            return array('code'=>invoice_model::MONEY_ERROR,'data'=>'');
        }
        $company_name = $this->input->post('company_name');
        if (empty($company_name)){
            return array('code'=>invoice_model::COMPANY_NAME_NOT_NULL,'data'=>'');
        }
        $company_address = $this->input->post('company_address');
        $telephone = $this->input->post('telephone');
        $bank_name = $this->input->post('bank_name');
        $bank_account = $this->input->post('bank_account');
        $addressee = $this->input->post('addressee');
        $direction = $this->input->post('direction');
        $status = $this->input->post('status');
        $logistics_company = $this->input->post('logistics_company');
        $order_number = $this->input->post('order_number');
        
        $invoice = array();
        $invoice['pay_money'] = $pay_money;
        $invoice['invoice_type'] = $invoice_type;
        $invoice['company_name'] = $company_name;
        $invoice['company_address'] = $company_address;
        $invoice['telephone'] = $telephone;
        $invoice['bank_name'] = $bank_name;
        $invoice['bank_account'] = $bank_account;
        $invoice['addressee'] = $addressee;
        $invoice['direction'] = $direction;
        $invoice['hardcopy'] = $hardcopy;
        $invoice['license'] = $license;
        $invoice['status'] = $status;
        $invoice['logistics_company'] = $logistics_company;
        $invoice['order_number'] = $order_number;
        $invoice['update_time'] = time();
        
        $result = $this->invoice_model->update_invoice($iid,$invoice);
        if (empty($result)){
            return array('code'=>invoice_model::SYSTEM_ERROR,'data'=>'');
        }
        return array('code'=>invoice_model::REQUEST_SUCCESS,'data'=>'');
    }
}