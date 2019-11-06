<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MY_model');
    }

    public function index()
    {
        $data['users']   = $this->MY_model->getUser();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('blog/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $user   = $this->MY_model->getDetail($id);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('blog/detail', $user);
        $this->load->view('templates/footer');
    }
}

/* End of file Blog.php */
