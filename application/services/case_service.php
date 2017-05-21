<?php
class case_service extends MY_Service{
    function __construct(){
        parent::__construct();
        $this->load->model('case_model');
        $this->load->model('award_model');
        $this->load->model('pay_model');
        $this->load->service('image_service');
    }
    public function add_case(){
        $uid = $this->input->post('uid');
        if (empty($uid)){
            return array('code'=>user_model::USER_ID_NOT_NULL,'data'=>'');
        }
        $award = $this->input->post('award');
        $money = $this->_count_money($award);
        $advertiser = $this->input->post('advertiser');
        $agency_company = $this->input->post('agency_company');
        $title = $this->input->post('title');
        $paytype = $this->input->post('paytype');
        $advertiser_logo = $this->input->post('advertiser_logo');
        $agency_company_logo = $this->input->post('agency_company_logo');
        $visual_url = $this->input->post('visual_url');
        $url = $this->input->post('url');
        $video_url = $this->input->post('video_url');
        $no_case_advertiser = $this->input->post('no_case_advertiser');
        $no_case_advertiser_logo = $this->input->post('no_case_advertiser_logo');
        $no_case_visual_url = $this->input->post('no_case_visual_url');
        $no_case_url = $this->input->post('no_case_url');
        $award = implode(',', $award);
        $case = array();
        $case['uid'] = $uid;
        $case['aid'] = $award;
        $case['advertiser'] = $advertiser;
        $case['agency_company'] = $agency_company;
        $case['title'] = $title;
        $case['create_time'] = time();
        $case['pay_type'] = $paytype;
        $case['no_case_advertiser'] = $no_case_advertiser;
        $case['advertiser_logo'] = $advertiser_logo;
        $case['agency_company_logo'] = $agency_company_logo;
        $case['visual_url'] = $visual_url;
        $case['url'] = $url;
        $case['no_case_advertiser_logo'] = $no_case_advertiser_logo;
        $case['no_case_visual_url'] = $no_case_visual_url;
        $case['no_case_url'] = $no_case_url;
        $result = $this->case_model->add($case);
        if (empty($result)){
            return array('code'=>user_model::SYSTEM_ERROR,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>'');
    }
    
    public function update_case(){
        $cid = $this->input->post('cid');
        if (empty($cid)){
            return array('code'=>user_model::CASE_ID_NOT_NULL,'data'=>'');
        }
        $advertiser = $this->input->post('advertiser');
        $agency_company = $this->input->post('agency_company');
        $title = $this->input->post('title');
        $advertiser_logo = $this->input->post('advertiser_logo');
        $agency_company_logo = $this->input->post('agency_company_logo');
        $visual_url = $this->input->post('visual_url');
        $url = $this->input->post('url');
        $video_url = $this->input->post('video_url');
        $no_case_advertiser = $this->input->post('no_case_advertiser');
        $no_case_advertiser_logo = $this->input->post('no_case_advertiser_logo');
        $no_case_visual_url = $this->input->post('no_case_visual_url');
        $no_case_url = $this->input->post('no_case_url');
        
        $case = array();
        $case['advertiser'] = $advertiser;
        $case['agency_company'] = $agency_company;
        $case['title'] = $title;
        $case['update_time'] = time();
        $case['advertiser_logo'] = $advertiser_logo;
        $case['agency_company_logo'] = $agency_company_logo;
        $case['visual_url'] = $visual_url;
        $case['url'] = $url;
        $case['video_url'] = $video_url;
        $case['no_case_advertiser'] = $no_case_advertiser;
        $case['no_case_advertiser_logo'] = $no_case_advertiser_logo;
        $case['no_case_visual_url'] = $no_case_visual_url;
        $case['no_case_url'] = $no_case_url;
    
        $result = $this->case_model->update($cid, $case);
        if (empty($result)){
            return array('code'=>user_model::SYSTEM_ERROR,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>'');;
    }
    
    public function get_case_by_cid(){
        $this->_year = $this->input->get('year') ? intval($this->input->get('year')) : 2017;
        $cid = $this->input->get('cid');
        $result = $this->case_model->get_case_by_cid($cid,$this->_year);
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>$result);
    }
    //按用户获取案例
    public function get_case_by_uid(){
        $uid = $this->input->post('uid');
        if (empty($uid)){
            return array('code'=>user_model::USER_ID_NOT_NULL,'data'=>'');
        }
        $this->_year = $this->input->post('year') ? intval($this->input->post('year')) : case_model::YEAR;
        $this->_year = 2016;
        $result = $this->case_model->get_case_by_uid($uid,$this->_year);
        if (empty($result)){
            return array('code'=>user_model::CASE_IS_NULL,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>$result);
    }
    //获取案例
    public function get_cases(){
        $this->_year = $this->input->post('year') ? intval($this->input->post('year')) : case_model::YEAR;
        $search = array();
        $search['uid'] = $this->input->post('uid');
        $search['cid'] = $this->input->post('cid');
        $search['title'] = $this->input->post('title');
        $search['status'] = $this->input->post('status');
        $result = $this->case_model->get_cases($search,$this->_year);
        if (empty($result)){
            return array('code'=>case_model::CASE_IS_NULL,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>$result);
    }
    
    //获取案例
    public function get_case_list(){
        $this->_year = $this->input->post('year') ? intval($this->input->post('year')) : case_model::YEAR;
        $search = array();
        $search['uid'] = $this->input->post('uid');
        $search['cid'] = $this->input->post('cid');
        $search['title'] = $this->input->post('title');
        $search['status'] = $this->input->post('status');
        $result = $this->case_model->get_case_list($search,$this->_year);
        if (empty($result)){
            return array('code'=>case_model::CASE_IS_NULL,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>$result);
    }
    //线上支付
    public function payment() {
        require_once dirname(dirname(__FILE__)).'/alipaydemo/f2fpay/F2fpay.php';
        $cids = $this->input->post('cids');
        if (empty($cids)){
            return array('code' => pay_model::CASE_ID_NOT_NULL,'data'=>'');
        }
        $cases = $this->case_model->get_cases_by_cids($cids);
        $cids = implode(',', $cids);
        $total_amount = 0;
        foreach ($cases as $value){
            $award = explode(',', $value['award']);
            $total_amount += $this->_count_money($award);
        }
        $total_amount += $total_amount * pay_model::COUNTER_FEE;
        $pay = new F2fpay();
        $out_trade_no = $this->_make_out_trade_no();
        $subject = case_model::SUBJECT;
        $response = $pay->qrpay($out_trade_no, $total_amount, $subject);
        if (!empty($response) && $response->alipay_trade_precreate_response->code == '10000'){
            $pay = array();
            $pay['out_trade_no'] = $out_trade_no;
            $pay['total_amount'] = $total_amount;
            $pay['subject'] = $subject;
            $pay['cid'] = $cids;
            $this->pay_model->add($pay);
            $url = $response->alipay_trade_precreate_response->qr_code;
            $img = $this->image_service->qrcode($url,'code');
            return array('code' => pay_model::REQUEST_SUCCESS,'data'=>array('img'=>$img,'cost'=>$total_amount,'out_trade_no'=>$out_trade_no));
        }
        return array('code' => pay_model::PAYMENT_FAIL,'data'=>'');
    }
    
    public function callback(){
        $out_trade_no = '';
        $pay = $this->pay_model->get_pay_info_by_out_trade_no(c);
        $case = array('pay_info'=>2,'out_trade_no'=>$out_trade_no);
        $this->case_model->update_by_cids($pay['cid'],$case);
        exit;
        
        
        file_put_contents('/home/tmg/callback.log','=====',FILE_APPEND);
        $subject = $this->input->post('subject');
        $out_trade_no = $this->input->post('out_trade_no');
    
        $payinfo = array();
        $payinfo['gmt_create'] = $this->input->post('gmt_create');
        $payinfo['notify_type'] = $this->input->post('notify_type');
        $payinfo['total_amount'] = $this->input->post('total_amount');
        $payinfo['trade_no'] = $this->input->post('trade_no');
        //$payinfo['invoice_amount'] = $this->input->post('invoice_amount');
        //$payinfo['open_id'] = $this->input->post('open_id');
        $payinfo['seller_id'] = $this->input->post('seller_id');
        $payinfo['notify_time'] = $this->input->post('notify_time');
        //$payinfo['body'] = $this->input->post('body');
        $payinfo['trade_status'] = $this->input->post('trade_status');
        $payinfo['gmt_payment'] = $this->input->post('gmt_payment');
        $payinfo['seller_email'] = $this->input->post('seller_email');
        $payinfo['receipt_amount'] = $this->input->post('receipt_amount');
        $payinfo['buyer_id'] = $this->input->post('buyer_id');
        $payinfo['app_id'] = $this->input->post('app_id');
        $payinfo['notify_id'] = $this->input->post('notify_id');
        $payinfo['buyer_logon_id'] = $this->input->post('buyer_logon_id');
        $payinfo['sign_type'] = $this->input->post('sign_type');
        //$payinfo['buyer_pay_amount'] = $this->input->post('buyer_pay_amount');
        $payinfo['sign'] = $this->input->post('sign');
        //$payinfo['point_amount'] = $this->input->post('point_amount');
        $payinfo['fund_bill_list'] = $this->input->post('fund_bill_list');
        //out_trade_no
        $res = $this->pay_model->update_by_out_trade_no($out_trade_no,$payinfo);
        $pay = $this->pay_model->get_pay_info_by_out_trade_no($out_trade_no);
        $case = array('pay_info'=>2,'out_trade_no'=>$out_trade_no);
        $this->case_model->update_by_cids($pay['cid'],$case);
    }
    
    public function payment_result(){
        $out_trade_no = $this->input->post('out_trade_no');
        if (empty($out_trade_no)){
            return array('code' => pay_model::OUT_TRADE_NO_NOT_NULL,'data'=>'');
        }
        $payinfo = $this->pay_model->get_pay_info_by_out_trade_no($out_trade_no);
        if (empty($payinfo)){
            return array('code' => pay_model::ORDER_IS_NULL,'data'=>'');
        }
        return array('code' => pay_model::REQUEST_SUCCESS,'data'=>$payinfo);
    }
    
    public function upload(){
        $type = $this->input->post('type');
        $file = $_FILES['file'];
        if ($file['size'] <= 0){
            return array('code' => case_model::FILE_ERROR,'data'=>'');
        }
        switch ($type){
            case 'image':
                $file_url = $this -> image_service->save_image($file,'image');
                break;
            case 'video':
                $file_url = $this -> image_service->save_video($file,'video');
                break;
            case 'ppt':
                $file_url = $this -> image_service->save_ppt($file,'ppt');
                break;
            case 'word':
                $file_url = $this -> image_service->save_word($file,'word');
                break;
            default:
                return array('code' => case_model::TYPE_ERROR,'data'=>'');
                break;
        }
        if (empty($file_url)){
            return array('code' => case_model::FILE_UPLOAD_FAIL,'data'=>'');
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>$file_url);
    }
    
    public function get_cases_num(){
        $this->_year = $this->input->post('year') ? intval($this->input->post('year')) : case_model::YEAR;
        $res = $this->case_model->get_cases_num($this->_year);
        $result = array();
        $count = 0;
        foreach ($res as $value){
            $result[$value['status']] = $value['count'];
            $count += $value['count'];
        }
        return array('code' => case_model::REQUEST_SUCCESS,'data'=>array('casesum'=>$result,'sums'=>$count,'year'=>$this->_year));
    }
    
    /**计算每个案例的支付花费*/
    private function _count_money($award){
        $awards = $this->award_model->get_awards();//上传了哪些奖项
        $moneys = $this->case_model->get_money();//收费种类
        $money = 0;
        foreach ($awards as $value){
            $temp[$value['code']][] = $value['aid'];
        }
        $arra = array_intersect($award, $temp['A']);//案例
        $arrb = array_intersect($award, $temp['B']);//非案例
        $arrc = array_intersect($award, $temp['C']);
        $time = time();//服务器时间
        if (count($arra) > 0){
            foreach ($moneys['A'] as $key => $value){
                if ($time < strtotime($key)){
                    $money += count($arra) * $value;
                    break;
                }
            }
        }
        if (count($arrb) > 0){
            foreach ($moneys['B'] as $key => $value){
                if ($time < strtotime($key)){
                    $money += count($arrb) * $value;
                    break;
                }
            }
        }
        if (count($arrc) > 0){
            foreach ($moneys['C'] as $key => $value){
                if ($time < strtotime($key)){
                    $money += count($arrc) * $value;
                    break;
                }
            }
        }
        return $money;
    }
    
    private function _make_out_trade_no(){
        $date = date('Ymd');
        $time = time();
        $rand = rand('1000', '9999');
        $out_trade_no = case_model::TRADE_NO . $date . $time . $rand;
        return $out_trade_no;
    }
}