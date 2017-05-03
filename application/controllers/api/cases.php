<?php

class cases extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('case_service');
        $this->load->service('image_service');
    }
    /*** 录入发票数据*/
    public function invoicesubmitact(){
        $uid = get_cookie('uid');
        $this->case_service->add_invoice($uid);/*录入发票数据*/
//        $this->case_service->add_logistics($uid);/*录入物流数据*/
        $this->display('api/handleSucc.html');
        $this->display('api/common/header.html');
    }
    public function casesubmit(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login');
        }
        $userinfo = $this->user_service->get_userinfo_by_uid($uid);
        $this->assign('userinfo', $userinfo);
        $this->display('api/case/casesubmit.html');
    }
    /**跳转到支付界面*/
    public function casepay(){
        $this->display('api/case/casepay.html');
    }
    public function casesubmitact(){
        $rs = $this->case_service->add_case();
        $this->display('api/common/header.html');
        if ($rs['result']){
            if ($rs['paytype'] == 1){
                $response = $rs['response'];
                if (!empty($response) && $response->alipay_trade_precreate_response->code == '10000'){
                    $url = $response->alipay_trade_precreate_response->qr_code;
                    $img = $this->image_service->qrcode($url,'code');
                    $this->assign('img', $img);
                    $this->assign('total_amount', $rs['total_amount']);
                    $this->display('api/case/casepay.html');
                }else {
                    $this->assign('result', '提交失败,请稍后再试！');
                    $this->display('api/result.html');
                }
            }else {
                $this->display('api/succ.html');
            }
        }else {
            //1501516800 2017/07/31 24/00/00
            if (time()>1501516800){
                $this->assign('result', '报名已结束！');
            }else {
                $this->assign('result', '网络不佳，请稍后再试！');
            }
            $this->display('api/result.html');
        }
    }
    public function succ(){
        $this->display('api/common/header.html');
        $this->display('api/succ.html');
    }
    public function updatecase(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login');
        }
        $case = $this->case_service->get_case_by_cid();
        if ($uid != $case['uid']){
            $this->display('api/common/header.html');
            $this->display('api/404.html');
            exit();
        }
        $userinfo = $this->user_service->get_userinfo_by_uid($uid);
        $this->assign('userinfo', $userinfo);
        $this->assign('case', $case);
        $this->display('api/case/updatecase.html');
    }
    public function updatecaseact(){
        $result = $this->case_service->update_case_test();
        if ($result){
            $this->assign('result', '修改成功！');
        }else {
            $this->assign('result', '修改失败！');
        }
        $this->display('api/common/header.html');
        $this->display('api/result.html');
    }
    public function updatecasepdf(){
        $result = $this->case_service->update_case_pdf();
    }
    public function caselist(){
        $result = $this->case_service->get_case_all();
        //var_dump($result);exit();
        $this->assign('cases', $result['cases']);
        $this->assign('search', $result['search']);
        $this->display('api/common/header.html');
        $this->display('api/case/caselist.html');
    }
    public function caseopen(){
        $case = $this->case_service->get_case_by_cid();
        $case['swf_url'] = image_service::SWF_URL . $case['swf_url'];
        $temp = explode( '.',$case['video_url']);
        $suffix = '';
        if (!empty($temp[1])){
            $suffix = $temp[1];
        }
        $this->assign('suffix', $suffix);
        $this->assign('case', $case);
        $this->display('api/common/header.html');
        $this->display('api/case/caseopen.html');
    }
    public function nocaseopen(){
        $case = $this->case_service->get_case_by_cid();
        $this->assign('case', $case);
        $this->display('api/common/header.html');
        $this->display('api/case/nocaseopen.html');
    }
    public function getimgwh(){
        $result = $this->image_service->getimgwh();
        echo json_encode($result);
        exit();
    }
    public function casesucc(){
        $this->display('api/common/header.html');
        $this->display('api/succ.html');
    }
    public function callback(){
        file_put_contents('/home/tmg/callback.log',serialize($_REQUEST),FILE_APPEND);
        $result = $this->case_service->callback();
        echo 'success';
        exit();
    }
    //20年致敬填报
    public function twentyCasesubmit(){
        $uid = get_cookie('uid');
        if (empty($uid)){
            redirect('api/user/login?type=twenty');
        }
        $userinfo = $this->user_service->get_userinfo_by_uid($uid);
        $this->assign('userinfo', $userinfo);
        $this->display('api/case/casesubmit_twentyYears.html');
    }
	public function test(){
		$this->case_service->test();
	}
}