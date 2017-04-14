<?php

/**
 * Created by PhpStorm.
 * User: niuzz
 * Date: 17/4/14
 * Time: 06:30
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['users'] = $this->User_model->get_users();
//        $data['title'] = 'User archive';
//        $this->load->view('user/header', $data);
//        $this->load->view('user/index', $data);
//        $this->load->view('user/footer');
        $this->load->view('common/header',$data);
        $this->load->view('user/index',$data);
        $this->load->view('common/footer');
    }

    public function view($uid = 0)
    {
        $data['uid'] = $this->User_model->get_users($uid);
//        if (empty($data['user_item']))
//        {
//            show_404();
//        }

//        $data['title'] = $data['user_item']['title'];
//
//        $this->load->view('user/header', $data);
//        $this->load->view('user/view', $data);
//        $this->load->view('user/footer');
        var_dump($data);
    }

}