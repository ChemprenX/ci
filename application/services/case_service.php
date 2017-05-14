<?php
require_once ('MY_Service.php');

class case_service extends MY_Service{

    function __construct(){
        parent::__construct();
        $this->load->model('case_model');
        $this->load->model('pay_model');
        $this->load->model('old_case_model');
        $this->load->model('award_model');
        $this->load->model('invoice_model');
        $this->load->service('image_service');
        //禁用notice和waring的错误日志,如需要请删除
        error_reporting(E_ALL^E_NOTICE^E_WARNING);
    }
    //修改物流信息
    public function add_logistics_again(){
        $iid = $this->input->get('LogisticsId');
        $status = intval($this->input->get('status'));
        $logistics_company = intval($this->input->get('logistics_company'));
        $orderNumber = $this->input->get('order_number');
        $logistics = array();
        $logistics['iid'] = $iid;
        $logistics['status'] = $status;
        $logistics['logistics_company'] = $logistics_company;
        $logistics['order_number'] = $orderNumber;
        $this->case_model->update_logistics($logistics);
    }
//    //录入物流信息
//    public function add_logistics(){
//        $files = $_FILES;
//        $uid = get_cookie('uid');
//        $pay_prove = $files['pay_prove'];
//        $create_time = time();
//        $logistics = array();
//        $logistics['uid'] = $uid;
//        $logistics['pay_prove'] = $this->image_service->save_image($pay_prove,'logistics');
//        $logistics['create_time'] = $create_time;
//        $this->case_model->add_logistics($logistics);
//    }
    /* 录入发票数据*/
    public function add_invoice(){
        //取
        $files = $_FILES;
        $type = $this->input->get('type');
        if ($type=='1'){
            $uid = get_cookie('uid');
            $pay_prove = $files['pay_prove'];
        }else{
            $uid = $this->input->get('uid');
            $pay_prove = '';
        }
        $hardcopy = $files['hardcopy'];
        $license = $files['license'];
        $ticketType = $this->input->post('ticketType');
        $company_name = $this->input->post('company_name');
        $company_address = $this->input->post('company_address');
        $telephone = $this->input->post('telephone');
        $bank_name = $this->input->post('bank_name');
        $bank_account = $this->input->post('bank_account');
        $addressee = $this->input->post('addressee');
        $direction = $this->input->post('direction');
        $create_time = time();
        $payProve = $this->image_service->save_image($pay_prove,'pay_prove');
        //放进数组
        $invoice = array();
        $invoice['uid']=$uid;
        $invoice['pay_prove']=$pay_prove;
        $invoice['invoice_type']=$ticketType;
        $invoice['company_name']=$company_name;
        $invoice['company_address']=$company_address;
        $invoice['telephone']=$telephone;
        $invoice['bank_name']=$bank_name;
        $invoice['bank_account']=$bank_account;
        $invoice['addressee']=$addressee;
        $invoice['direction']=$direction;
        $invoice['pay_prove']=$payProve;
        $invoice['hardcopy']=$this->image_service->save_image($hardcopy,'hardcopy');
        $invoice['license']=$this->image_service->save_image($license,'license');
        $invoice['create_time']=$create_time;
        $this->case_model->add_invoice($invoice);
        //物流
        $logistics = array();
        $logistics['uid'] = $uid;
        $logistics['pay_prove'] = $payProve;
        $logistics['create_time'] = $create_time;
        $this->case_model->add_logistics($logistics);
    }
    public function add_case(){
		if (time()>1501516800){
            return false;
        }
        $files = $_FILES;
        $uid = $this->input->post('uid');
        $award = $this->input->post('award');
        $money = $this->_count_money($award);
        $advertiser = $this->input->post('advertiser');
        $agency_company = $this->input->post('agency_company');
        $title = $this->input->post('title');
        $paytype = $this->input->post('paytype');
        //$advertiser_logo = $files['advertiser_logo'];
        $advertiser_logo = $this->input->post('advertiser_logo');
        //$agency_company_logo = $files['agency_company_logo'];
        $agency_company_logo = $this->input->post('agency_company_logo');
        //$visual_url = $files['visual_url'];
        $visual_url = $this->input->post('visual_url');
        //$url = $files['url'];
        $url = $this->input->post('url');
        //$video_url = $files['video_url'];
        $video_url = $this->input->post('video_url');
        $no_case_advertiser = $this->input->post('no_case_advertiser');
        //$no_case_advertiser_logo = $files['no_case_advertiser_logo'];
        $no_case_advertiser_logo = $this->input->post('no_case_advertiser_logo');
        //$no_case_visual_url = $files['no_case_visual_url'];
        $no_case_visual_url = $this->input->post('no_case_visual_url');
        //$no_case_url = $files['no_case_url'];
        $no_case_url = $this->input->post('no_case_url');
        $is_case = $this->_is_case($award);
        $out_trade_no = '';
        $response = '';
        $total_amount = 0;
        /* if($paytype == case_model::ALI_PAY){
            require_once dirname(dirname(__FILE__)).'/alipaydemo/f2fpay/F2fpay.php';
            //$case_count = count($award);
            $total_amount = $this->_count_money($award);
            $pay = new F2fpay();
            $out_trade_no = $this->_make_out_trade_no();
            $subject = case_model::SUBJECT;
            $response = $pay->qrpay($out_trade_no, $total_amount, $subject);
            if (!empty($response) && $response->alipay_trade_precreate_response->code == '10000'){
                $pay = array();
                $pay['out_trade_no'] = $out_trade_no;
                $pay['total_amount'] = $total_amount;
                $pay['subject'] = $subject;
                $this->pay_model->add($pay);
            }
        } */
        $award = implode(',', $award);
        $case = array();
        $case['uid'] = $uid;
        $case['aid'] = $award;
        $case['advertiser'] = $advertiser;
        $case['agency_company'] = $agency_company;
        $case['title'] = $title;
        $case['create_time'] = time();
        $case['pay_type'] = $paytype;
        $case['out_trade_no'] = $out_trade_no;
        $case['no_case_advertiser'] = $no_case_advertiser;
        if (!empty($is_case['case'])){
            //$advertiser_logo = $this->image_service->save_image($advertiser_logo,'advertiser');
            //$agency_company_logo = $this->image_service->save_image($agency_company_logo,'agency_company');
            //$visual_url = $this->image_service->save_image($visual_url,'visual');
            /* if ($video_url['size']>0){
                $video_url = $this->image_service->save_video($video_url,'video');
                $case['video_url'] = $video_url;
            } */
            //$url = $this->image_service->save_ppt($url,'ppt');
            //$swf_url = $this->image_service->save_swf($url,'pdf');
            $case['advertiser_logo'] = $advertiser_logo;
            $case['agency_company_logo'] = $agency_company_logo;
            $case['visual_url'] = $visual_url;
            $case['video_url'] = $video_url;
            $case['url'] = $url;
            //$case['swf_url'] = $swf_url;
        }
        if (!empty($is_case['no_case'])){
            //$no_case_advertiser_logo = $this->image_service->save_image($no_case_advertiser_logo,'no_case_advertiser');
            //$no_case_visual_url = $this->image_service->save_image($no_case_visual_url,'no_case_visual');
            //$no_case_url = $this->image_service->save_word($no_case_url,'word');
            $case['no_case_advertiser_logo'] = $no_case_advertiser_logo;
            $case['no_case_visual_url'] = $no_case_visual_url;
            $case['no_case_url'] = $no_case_url;
        }
        $result = $this->case_model->add($case);
        if (empty($uid)){
            $result = false;
            file_put_contents('/home/tmg/casefail.log', serialize($case),FILE_APPEND);
        }
        return array('result' => $result, 'paytype' => $paytype, 'response' => $response, 'total_amount' => $total_amount);
    }
    /*修改案例---测试*/
    public function update_case_test(){
        //取
        $files = $_FILES;
        $cid = $this->input->post('cid_test');
        $award = $this->input->post('award');
        $advertiser = $this->input->post('advertiser');//广告主名称
        $agency_company = $this->input->post('agency_company');//代理公司名称
        $title = $this->input->post('title');//案例名称
        $award = implode(',', $award);
        $advertiser_logo = $files['advertiser_logo'];//广告主logo
        $agency_company_logo = $files['agency_company_logo'];//代理公司LOGO
        $visual_url = $files['visual_url'];//作品主视觉
        $url = $files['url'];//参赛作品
        $video_url = $files['video_url'];//视频介绍
        $no_case_advertiser = $this->input->post('no_case_advertiser');//非案例--报送公司
        $no_case_advertiser_logo = $files['no_case_advertiser_logo'];//非案例--广告主公司
        $no_case_visual_url = $files['no_case_visual_url'];//非案例--人物照片
        $no_case_url = $files['no_case_url'];//
        //存--数组
        $case = array();
        $case['aid'] = $award;
        $case['advertiser'] = $advertiser;
        $case['agency_company'] = $agency_company;
        $case['title'] = $title;
        $case['update_time'] = time();
        $case['status'] = 1;
        $case['no_case_advertiser'] = $no_case_advertiser;
        if (!empty($advertiser_logo['tmp_name'])){
            $advertiser_logo = $this->image_service->save_image($advertiser_logo,'advertiser');
            $case['advertiser_logo'] = $advertiser_logo;
        }
        if (!empty($agency_company_logo['tmp_name'])){
            $agency_company_logo = $this->image_service->save_image($agency_company_logo,'agency_company');
            $case['agency_company_logo'] = $agency_company_logo;
        }
        if (!empty($visual_url['tmp_name'])){
            $visual_url = $this->image_service->save_image($visual_url,'visual');
            $case['visual_url'] = $visual_url;
        }
        if (!empty($url['tmp_name'])){
            $url = $this->image_service->save_ppt($url,'ppt');
            $case['url'] = $url;
        }
        if (!empty($video_url['tmp_name'])){
            $video_url = $this->image_service->save_video($video_url,'video');
            $case['video_url'] = $video_url;
        }
        if (!empty($no_case_advertiser_logo['tmp_name'])){
            $no_case_advertiser_logo = $this->image_service->save_image($no_case_advertiser_logo,'no_case_advertiser');
            $case['no_case_advertiser_logo'] = $no_case_advertiser_logo;
        }
        if (!empty($no_case_visual_url['tmp_name'])){
            $no_case_visual_url = $this->image_service->save_image($no_case_visual_url,'no_case_visual');
            $case['no_case_visual_url'] = $no_case_visual_url;
        }
        if (!empty($no_case_url['tmp_name'])){
            $no_case_url = $this->image_service->save_word($no_case_url,'word');
            $case['no_case_url'] = $no_case_url;
        }
//        $result = $this->case_model->update($cid, $case);
        //存--数据库
        $result = $this->case_model->update_test($cid,$case);
        return $result;
    }
    public function update_case(){
        $files = $_FILES;
        $cid = $this->input->post('cid');
        $uid = $this->input->post('uid');
        $award = $this->input->post('award');
        $advertiser = $this->input->post('advertiser');
        $agency_company = $this->input->post('agency_company');
        $title = $this->input->post('title');
        $award = implode(',', $award);
        //var_dump($award);exit;
        $case = array();
        $case['aid'] = $award;
        $case['advertiser'] = $advertiser;
        $case['agency_company'] = $agency_company;
        $case['title'] = $title;
        $case['update_time'] = time();
        
        $advertiser_logo = $files['advertiser_logo'];
        $agency_company_logo = $files['agency_company_logo'];
        $visual_url = $files['visual_url'];
        $url = $files['url'];
        $video_url = $files['video_url'];
        
        $no_case_advertiser = $this->input->post('no_case_advertiser');
        $no_case_advertiser_logo = $files['no_case_advertiser_logo'];
        $no_case_visual_url = $files['no_case_visual_url'];
        $no_case_url = $files['no_case_url'];
        
        if (!empty($advertiser_logo['tmp_name'])){
            $advertiser_logo = $this->image_service->save_image($advertiser_logo,'advertiser');
            $case['advertiser_logo'] = $advertiser_logo;
        }
        if (!empty($agency_company_logo['tmp_name'])){
            $agency_company_logo = $this->image_service->save_image($agency_company_logo,'agency_company');
            $case['agency_company_logo'] = $agency_company_logo;
        }
        if (!empty($visual_url['tmp_name'])){
            $visual_url = $this->image_service->save_image($visual_url,'visual');
            $case['visual_url'] = $visual_url;
        }
        if (!empty($url['tmp_name'])){
            $url = $this->image_service->save_ppt($url,'ppt');
            $case['url'] = $url;
            //$swf_url = $this->image_service->save_swf($url,'pdf');
            //$case['swf_url'] = $swf_url;
        }
        if (!empty($video_url['tmp_name'])){
            $video_url = $this->image_service->save_video($video_url,'video');
            $case['video_url'] = $video_url;
        }
        if (!empty($no_case_advertiser_logo['tmp_name'])){
            $no_case_advertiser_logo = $this->image_service->save_image($no_case_advertiser_logo,'no_case_advertiser');
            $case['no_case_advertiser_logo'] = $no_case_advertiser_logo;
        }
        if (!empty($no_case_visual_url['tmp_name'])){
            $no_case_visual_url = $this->image_service->save_image($no_case_visual_url,'no_case_visual');
            $case['no_case_visual_url'] = $no_case_visual_url;
        }
        if (!empty($no_case_url['tmp_name'])){
            $no_case_url = $this->image_service->save_word($no_case_url,'word');
            $case['no_case_url'] = $no_case_url;
        }
        
        $result = $this->case_model->update($cid, $case);
        return $result;
    }
    public function get_case_by_uid($uid, $status = null){
//        return $this->case_model->get_case_by_uid($uid,$status);
        $results = $this->case_model->get_case_by_uid($uid,$status);
        $cases = array();
        for ($i = 0;$i<count($results);$i++){
            $award = $results[$i]['aid'];
            if ($award == '2'){
                $arr = array('2');
            }elseif ($award == '3'){
                $arr = array('3');
            }elseif ($award == '22'){
                $arr = array('22');
            }elseif ($award == '4'){
                $arr = array('4');
            }elseif ($award == '6'){
                $arr = array('6');
            }elseif ($award == '23'){
                $arr = array('23');
            }elseif ($award == '9'){
                $arr = array('9');
            }elseif ($award == '11'){
                $arr = array('11');
            }elseif ($award == '13'){
                $arr = array('13');
            }elseif ($award == '12'){
                $arr = array('12');
            }elseif ($award == '24'){
                $arr = array('24');
            }elseif ($award == '25'){
                $arr = array('25');
            }elseif ($award == '10'){
                $arr = array('10');
            }elseif ($award == '26'){
                $arr = array('26');
            }elseif ($award == '14'){
                $arr = array('14');
            }elseif ($award == '15'){
                $arr = array('15');
            }elseif ($award == '16'){
                $arr = array('16');
            }elseif ($award == '17'){
                $arr = array('17');
            }elseif ($award == '18'){
                $arr = array('18');
            }elseif ($award == '27'){
                $arr = array('27');
            }else{
                $arr = explode(',',$award);
            }
            $case = array();
            $case['cid'] = $results[$i]['cid'];
            $case['url'] = $results[$i]['url'];
            $case['no_case_url'] = $results[$i]['no_case_url'];
            $case['advertiser'] = $results[$i]['advertiser'];
            $case['agency_company'] = $results[$i]['agency_company'];
            $case['title'] = $results[$i]['title'];
            $case['status'] = $results[$i]['status'];
            $case['aid'] = $results[$i]['aid'];
            $case['no_case_advertiser'] = $results[$i]['no_case_advertiser'];
            $case['total_amount'] =$this->_count_money($arr);//费用
            $cases[] = $case;
            array_push($case);
        }
        return $cases;
    }
    public function get_case_by_cid(){
        $cid = $this->input->get('cid');
        return $this->case_model->get_case_by_cid($cid);
    }
    public function get_case_by_cid_2017(){
        $cid = $this->input->get('cid');
        $result = $this->case_model->get_case_by_cid($cid);
        $arr_str = $_COOKIE['cidArray'];
        $cidArray = unserialize($arr_str);
        $lastCid = end($cidArray);
        $indexArray = array_flip($cidArray);
        $index = $indexArray[$cid]+1;
        $nextCid = $cidArray[$index];
        $allResult = array();
        array_push($allResult,$result,$nextCid,$lastCid);
        return $allResult;
    }
    //修改支付状态
    public function changePayInfo(){
        $cid = $this->input->get('cid');
        $status = $this->input->get('status');
        $result = $this->case_model->change_pay_info($cid,$status);
        return $result;
    }
    //通过UID获取对象案例
    public function get_case_by_uid_2017(){
        $search = array();
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2017;
        $search['commitM'] = $this->input->get('commitM') ? intval($this->input->get('commitM')) : 1;
        $search['awardType'] = $this->input->get('awardType') ? intval($this->input->get('awardType')) : 0;
        $search['checkY'] = $this->input->get('checkY') ? intval($this->input->get('checkY')) : 0;
        $search['checkM'] = $this->input->get('checkM') ? intval($this->input->get('checkM')) : 0;
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $search['status'] = $this->input->get('status') ? intval($this->input->get('status')) :0;
        $commitTime = (string)$search['commitY'].'/0'.(string)$search['commitM'].'/00 00:00:00';
        $search['commitTime'] = (string)strtotime($commitTime);
        if ($search['checkY']){
            $checkTime = (string)$search['checkY'].'/0'.(string)$search['checkM'].'/00 00:00:00';
            $search['checkTime'] = (string)strtotime($checkTime);
        }else{
            $search['checkTime'] = '';
        }
        $search['uid'] = $this->input->get('uid');
        $result = $this->case_model->get_case_by_uid_2017($search);
        return array('case'=>$result,'search'=>$search);
    }
    //通过cID获取对象案例
    public function getCase_by_cid_2017(){
        $cid = $this->input->get('cid');
        $result = $this->case_model->get_case_by_cid($cid);
        return $result;
    }
    /*测试*/
    public function get_case_by_uid_test($uid, $status = null){
        $results = $this->case_model->get_case_by_uid($uid,$status);
        $cases = array();
        for ($i = 0;$i<count($results);$i++){
            $award = $results[$i]['aid'];
            if ($award == '2'){
                $arr = array('2');
            }elseif ($award == '3'){
                $arr = array('3');
            }elseif ($award == '22'){
                $arr = array('22');
            }elseif ($award == '4'){
                $arr = array('4');
            }elseif ($award == '6'){
                $arr = array('6');
            }elseif ($award == '23'){
                $arr = array('23');
            }elseif ($award == '9'){
                $arr = array('9');
            }elseif ($award == '11'){
                $arr = array('11');
            }elseif ($award == '13'){
                $arr = array('13');
            }elseif ($award == '12'){
                $arr = array('12');
            }elseif ($award == '24'){
                $arr = array('24');
            }elseif ($award == '25'){
                $arr = array('25');
            }elseif ($award == '10'){
                $arr = array('10');
            }elseif ($award == '26'){
                $arr = array('26');
            }elseif ($award == '14'){
                $arr = array('14');
            }elseif ($award == '15'){
                $arr = array('15');
            }elseif ($award == '16'){
                $arr = array('16');
            }elseif ($award == '17'){
                $arr = array('17');
            }elseif ($award == '18'){
                $arr = array('18');
            }elseif ($award == '27'){
                $arr = array('27');
            }else{
                $arr = explode(',',$award);
            }
            $case = array();
            $case['cid'] = $results[$i]['cid'];
            $case['url'] = $results[$i]['url'];
            $case['no_case_url'] = $results[$i]['no_case_url'];
            $case['advertiser'] = $results[$i]['advertiser'];
            $case['agency_company'] = $results[$i]['agency_company'];
            $case['title'] = $results[$i]['title'];
            $case['status'] = $results[$i]['status'];
            $case['aid'] = $results[$i]['aid'];
            $case['pay_info'] = $results[$i]['pay_info'];
            $case['no_case_advertiser'] = $results[$i]['no_case_advertiser'];
            $case['total_amount'] =$this->_count_money($arr);//费用
            $case['remark'] = $results[$i]['remark'];
            $cases[] = $case;
            array_push($case);
        }
        return $cases;
    }
    public function get_status(){
        return $this->case_model->get_status();
    }
    /*批量审核修改状态*/
    public function change_status(){
        $status = $this->input->get('status');
        $cids = $this->input->get('cids');
        $checkName = $this->input->get('checkName');
        return $this->case_model->change_status($cids, $status,$checkName);
    }
    //修改状态和备注
    public function change_status_remark(){
        $cid = $this->input->get('CaseID');
        $status = $this->input->get('Status');
        $remark = $this->input->get('Remark');
        $checkName = $this->input->get('checkName');
        return $this->case_model->change_status_remark($cid, $status,$remark,$checkName);
    }
    //修改用户备注
    public function change_user_remark(){
        $remark = $this->input->get('remark');
        $Uid = $this->input->get('Uid');
        return $this->case_model->change_user_remark($Uid, $remark);
    }
    public function change_user_beizhu(){
        $beizhu = $this->input->get('beizhu');
        $uids = $this->input->get('uids');
        return $this->case_model->change_user_beizhu($uids, $beizhu);
    }
    public function search_allcase(){
        $searchArray = $this->input->get('searchArray');
        $result = $this->case_model->search_allcase($searchArray);
        return $result;
    }
    public function get_cases(){
        $search = array();
        $search['status'] = $this->input->get('status') ? intval($this->input->get('status')) : 0;//状态
        $search['title'] = $this->input->get('title') ? $this->input->get('title') : '';//名字
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;//排序
        $search['uid'] = $this->input->get('uid') ? intval($this->input->get('uid')) : 0;//uid
        $page = $this->input->get('page') ? $this->input->get('page') : 1;//页数
        $result = $this->case_model->get_cases($search,$page);
        $res = $this->case_model->get_cases_num($search);
        $sumpage = ceil($res['count']/case_model::PAGE_CASE_COUNT);
        return array('case'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function get_cases_2017_old(){
        $search = array();
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2017;
        $search['commitM'] = $this->input->get('commitM') ? intval($this->input->get('commitM')) : 1;
        $search['awardType'] = $this->input->get('awardType') ? intval($this->input->get('awardType')) : 0;
        $search['checkY'] = $this->input->get('checkY') ? intval($this->input->get('checkY')) : 0;
        $search['checkM'] = $this->input->get('checkM') ? intval($this->input->get('checkM')) : 0;
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $search['status'] = $this->input->get('status') ? intval($this->input->get('status')) :0;
        $search['content'] = $this->input->get('content') ? $this->input->get('content') :0;
        $commitTime = (string)$search['commitY'].'/0'.(string)$search['commitM'].'/00 00:00:00';
        $search['commitTime'] = (string)strtotime($commitTime);
        if ($search['checkY']){
            $checkTime = (string)$search['checkY'].'/0'.(string)$search['checkM'].'/00 00:00:00';
            $search['checkTime'] = (string)strtotime($checkTime);
        }else{
            $search['checkTime'] = '';
        }
        $page = $this->input->get('page') ? $this->input->get('page') : 1;//页数
        $result = $this->case_model->get_cases_2017($search,$page);
        $sumpage = ceil($result[0]/case_model::PAGE_CASE_COUNT);
        return array('case'=>$result[1],'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function get_cases_num(){
        $search = array();
        $search['commitY'] = $this->input->get('commitY') ? intval($this->input->get('commitY')) : 2017;
        $res = $this->case_model->get_cases_num_by_status($search);
        $result = array();
        $count = 0;
        foreach ($res as $value){
            $result[$value['status']] = $value['count'];
            $count += $value['count'];
        }
        if (empty($result[1])){
            $result[1] = 0;
        }
        if (empty($result[2])){
            $result[2] = 0;
        }
        if (empty($result[3])){
            $result[3] = 0;
        }
        return array('casesum'=>$result,'sums'=>$count,'search'=>$search);
    }
    public function get_case_all(){
        $search = array();
        $search['aid'] = $this->input->get('aid') ? intval($this->input->get('aid')) : 0;
        $search['title'] = $this->input->get('title') ? $this->input->get('title') : '';
        $result = $this->case_model->get_case_all($search);
        return array('cases'=>$result,'search'=>$search);
    }
    public function get_old_cases(){
        $search = array();
        $search['title'] = $this->input->get('title') ? $this->input->get('title') : '';
        $search['sort'] = $this->input->get('sort') ? intval($this->input->get('sort')) : 0;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
    
        $result = $this->old_case_model->get_old_cases($search,$page);
        $res = $this->old_case_model->get_old_cases_num($search);
        $sumpage = ceil($res['count']/old_case_model::PAGE_CASE_COUNT);
        return array('case'=>$result,'search'=>$search,'page'=>$page,'sumpage'=>$sumpage);
    }
    public function get_cases_by_export(){
        return $this->case_model->get_cases_by_export();
    }
    /* public function callback(){
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
        $case = array('pay_info'=>2);
        $this->case_model->update_by_no($out_trade_no,$case);
    } */
    
    public function payment() {
        require_once dirname(dirname(__FILE__)).'/alipaydemo/f2fpay/F2fpay.php';
        $cids = $this->input->post('cids');
        if (empty($cids)){
            return array('code' => invoice_model::CASE_ID_NOT_NULL,'data'=>'');
        }
        $cids = implode(',', $cids);
        $cases = $this->case_model->get_cases_by_cids($cids);
        
        $total_amount = 0;
        foreach ($cases as $value){
            $award = explode(',', $value['aid']);
            $total_amount += $this->_count_money($award);
        }
        //$total_amount += $total_amount * pay_model::COUNTER_FEE;
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
            return array('code' => invoice_model::OUT_TRADE_NO_NOT_NULL,'data'=>'');
        }
        $payinfo = $this->pay_model->get_pay_info_by_out_trade_no($out_trade_no);
        if (empty($payinfo)){
            return array('code' => invoice_model::ORDER_IS_NULL,'data'=>'');
        }
        return array('code' => pay_model::REQUEST_SUCCESS,'data'=>$payinfo);
    }
    
    public function paymenttest() {
        require_once dirname(dirname(__FILE__)).'/alipaydemo/f2fpay/F2fpay.php';
        $cids = $this->input->post('cids');
        if (empty($cids)){
            return array('code' => invoice_model::CASE_ID_NOT_NULL,'data'=>'');
        }
        $cids = implode(',', $cids);
        $cases = $this->case_model->get_cases_by_cids($cids);
        
        $total_amount = 0;
        foreach ($cases as $value){
            $award = explode(',', $value['aid']);
            $total_amount += $this->_count_money($award);
        }
        //$total_amount += $total_amount * pay_model::COUNTER_FEE;
        $total_amount = $total_amount/10000;
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
    
    public function payment_resulttest(){
        $out_trade_no = $this->input->post('out_trade_no');
        if (empty($out_trade_no)){
            return array('code' => invoice_model::OUT_TRADE_NO_NOT_NULL,'data'=>'');
        }
        $payinfo = $this->pay_model->get_pay_info_by_out_trade_no($out_trade_no);
        if (empty($payinfo)){
            return array('code' => invoice_model::ORDER_IS_NULL,'data'=>'');
        }
        return array('code' => pay_model::REQUEST_SUCCESS,'data'=>$payinfo);
    }
    
    
    public function update_case_pdf(){
        //$files = $this->ReadFolder('http://pingfen.imcc.org.cn/pdf2');
		$files = $this->ReadFolder('/home/75/jinwangjiang/pdf2');
        //var_dump($files);exit();
        $count = 1;
        foreach ($files as $value){
            $arr = explode('.', $value);
            $result = $this->case_model->get_cid_by_url($arr[0]);
            if (empty($result)){
                var_dump($arr[0]);
                var_dump($result);
            }else { 
                //var_dump($result['cid']);
                $cid = $result['cid'];
                $swf_url = $this->image_service->save_swf('/pdf2/'.$value,'pdf');
                $case = array();
                $case['swf_url'] = $swf_url;
                $result = $this->case_model->update($cid, $case);
                $count++;
            }
            
        }
        var_dump($count);
        exit();
    }
    private function _is_case($award){
        $awards = $this->award_model->get_awards();
        foreach ($awards as $value){
            $temp[$value['code']][] = $value['aid'];
        }
        $temp['B'] = array_merge($temp['B'],$temp['C']);
        $arra = array_intersect($award, $temp['A']);
        $arrb = array_intersect($award, $temp['B']);
        return array('case' => $arra,'no_case'=>$arrb);
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
    function ReadFolder($dir, $mode = 0) {
    
        //如果打开目录句柄失败，则输出空数组
    
        if (!$handle = @opendir($dir)) return array();
    
        //定义文件列表数组
    
        $files = array();
    
        //遍历目录句柄中的条目
    
        while (false !== ($file = @readdir($handle))) {
    
            //跳过本目录以及上级目录
    
            if ('.' === $file || '..' === $file) continue;
    
            //是否仅读取目录
    
            if ($mode === 2) {
    
                if (isDir($dir . '/' . $file)) $files[] = $file;
    
                //是否仅读取文件
    
            } elseif ($mode === 1) {
    
                if (isFile($dir . '/' . $file)) $files[] = $file;
    
                //读取全部
    
            } else {
    
                $files[] = $file;
    
            }
    
        }
    
        //关闭打开的目录句柄
    
        @closedir($handle);
    
        //输出文件列表数组
    
        return $files;
    
    }
    /*判断输入是否为目录*/
    function isDir($dir) {
        return $dir ? is_dir($dir) : false;
    }
    /**判断输入是否为文件*/
    function isFile($file) {
        return $file ? is_file($file) : false;
    }
    public function upload(){
        $type = $this->input->post('type');
        $file = $_FILES['file'];
        if ($file['size'] <= 0){
            return array('code' => invoice_model::FILE_ERROR,'data'=>'');
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
                return array('code' => invoice_model::TYPE_ERROR,'data'=>'');
                break;
        }
        if (empty($file_url)){
            return array('code' => invoice_model::FILE_UPLOAD_FAIL,'data'=>'');
        }
        return array('code' => invoice_model::REQUEST_SUCCESS,'data'=>$file_url);
    }
	public function test(){
		require_once dirname(dirname(__FILE__)).'/alipaydemo/f2fpay/F2fpay.php';
            //$case_count = count($award);
        $total_amount = 0.01;
        $pay = new F2fpay();
        $out_trade_no = $this->_make_out_trade_no();
        $subject = case_model::SUBJECT;
        $response = $pay->qrpay($out_trade_no, $total_amount, $subject);
        if (!empty($response) && $response->alipay_trade_precreate_response->code == '10000'){
            $pay = array();
            $pay['out_trade_no'] = $out_trade_no;
            $pay['total_amount'] = $total_amount;
            $pay['subject'] = $subject;
            $this->pay_model->add($pay);
        }
		$url = $response->alipay_trade_precreate_response->qr_code;
        $img = $this->image_service->qrcode($url,'code');
        var_dump($img);
	}
}