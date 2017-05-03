<?php
class beyond_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->odb = $this->load->database('old', TRUE);
    }
    public function get_score_by_cid($cid){
        $sql = "SELECT jscore.*, jwuser.realname FROM jwj_score jscore LEFT JOIN ( SELECT juser.user_id,juser.realname FROM jwj_user juser) jwuser ON jwuser.user_id = jscore.user_id WHERE jscore.case_id = "+$cid;
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
    public function get_pingwei_sum(){
        $sql = "SELECT COUNT(*) count FROM jwj_user";
        $res = $this->odb->query($sql);
        return $res->result_array();
    }
}