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

    public function get_users($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('jwj_users');
            return $query->result_array();
        }

        $query = $this->db->get_where('jwj_users', array('slug' => $slug));
        return $query->row_array();
    }

}