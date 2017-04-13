<?php

/**
 * Created by PhpStorm.
 * User: niuzz
 * Date: 17/4/14
 * Time: 06:30
 */
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get_users();
        $data['title'] = 'User archive';

        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer');
    }

    public function view($slug = NULL)
    {
        $data['user_item'] = $this->user_model->get_users($slug);
        if (empty($data['user_item']))
        {
            show_404();
        }

        $data['title'] = $data['user_item']['title'];

        $this->load->view('user/header', $data);
        $this->load->view('user/view', $data);
        $this->load->view('user/footer');
    }

}