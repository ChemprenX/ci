<?php
require_once('MY_Service.php');

class award_service extends MY_Service{

    function __construct(){
        parent::__construct();
        $this->load->model('award_model');
        $this->load->model('award_group_model');
    }
    
    public function get_award_by_aid($aid){
        return $this->award_model->get_award_by_aid($aid);
    }
    
    public function get_award_group_by_agid($agid){
        return $this->award_group_model->get_award_group_by_agid($agid);
    }
    
    public function get_award_all(){
        $result = $this->award_model->get_award_all();
        $awards = array();
        foreach ($result as $value){
            $awards[$value['aid']] = $value['title'];
        }
        return $awards;
    }
}