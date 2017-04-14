<?php

/**
 * Created by PhpStorm.
 * User: niuzz
 * Date: 17/4/14
 * Time: 06:17
 */
class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_users($uid = 0)
    {
        if ($uid === 0)
        {
            $query = $this->db->get('jwj_user_2016');
            return $query->result_array();
        }
        $query = $this->db->get_where('jwj_user', array('uid' => $uid));
        return $query->row_array();
    }

}