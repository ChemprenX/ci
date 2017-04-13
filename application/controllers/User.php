<?php
/**
 * Created by PhpStorm.
 * User: niuzz
 * Date: 17/4/13
 * Time: 16:31
 */
/* User class*/

class User extends CI_Controller {

    public function view($page = 'home')
    {
        if(!file_exists(APPPATH . 'views/user/' . $page . '.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letters
        $this->load->view('common/header', $data);
        $this->load->view('user/' . $page, $data);
        $this->load->view('common/footer', $data);
    }
}