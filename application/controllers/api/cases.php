<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cases extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->service('case_service');
        $this->load->service('invoice_service');
    }
    /*案例资料下载*/
    
    /*案例提交*/
    public function casesubmit(){
        $result = $this->case_service->add_case();
        echo json_encode($result);
        exit();
    }
    /*录入发票信息*/
    public function addinvoice(){
        $result = $this->invoice_service->add_invoice();
        echo json_encode($result);
        exit();
    }
    /*获取发票信息*/
    public function getinvoices(){
        $result = $this->invoice_service->get_invoices();
        echo json_encode($result);
        exit();
    }
    /*修改发票信息*/
    public function updateinvoice(){
        $result = $this->invoice_service->update_invoices();
        echo json_encode($result);
        exit();
    }
    /*作品查询*/
    public function caselist(){
        $result = $this->case_service->get_case_by_cid();
        header('content-type:application:json;charset=utf8');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        echo json_encode($result);
        exit();
    }
    /*修改案例*/
    public function updatecase(){
        $result = $this->case_service->get_case_by_uid();
        echo json_encode($result);
        exit();
    }
    //线上支付
    public function payment() {
        $result = $this->case_service->payment();
        echo json_encode($result);
        exit();
    }
    //支付结果查询
    public function paymentresult(){
        $result = $this->case_service->payment_result();
        echo json_encode($result);
        exit();
    }
    //支付宝回调
    public function callback(){
        file_put_contents('/home/tmg/callback.log',serialize($_REQUEST),FILE_APPEND);
        $result = $this->case_service->callback();
        echo 'success';
        exit();
    }
    //上传
    public function upload(){
        $result = $this->case_service->upload();
        echo json_encode($result);
        exit();
    }
    
    //按用户获取案例
    public function usercase(){
        $result = $this->case_service->get_case_by_uid();
        echo json_encode($result);
        exit();
    }
    
    //获取案例
    public function getcases(){
        $result = $this->case_service->get_cases();
        echo json_encode($result);
        exit();
    }
}