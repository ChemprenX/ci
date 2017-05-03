<?php
require_once ('MY_Service.php');

class beyond_service extends MY_Service{
    function __construct(){
        parent::__construct();
        $this->load->model('beyond_model');
    }
    public function get_score_buy_cid(){
        $cid = $this->input->get('cid');
        if ($cid < 405){
            return $this->beyond_model->get_score_by_cid($cid);
        }else{
            return;
        }
    }

    public function get_pingwei_sum(){
        $result = $this->beyond_model->get_pingwei_sum();
        return $result;
    }
}