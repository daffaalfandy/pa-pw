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

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]', ['min_length'   => 'Username too short']);
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password_confirm]', [
            'matches'       => 'Password does not match',
            'min_length'    => 'Password too short'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password]', ['matches'   => 'Password does not match']);
        $this->form_validation->set_rules('identity', 'Sort of Identity', 'trim|required');
        $this->form_validation->set_rules('identity_num', 'Identity Number', 'trim|required|is_natural');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('blog/add');
            $this->load->view('templates/footer');
        } else {
            $this->_add();
        }
    }

    public function _add()
    {
        $data   = [
            'username'      => htmlspecialchars($this->input->post('username', true)),
            'fullname'      => htmlspecialchars($this->input->post('fullname', true)),
            'password'      => $this->input->post('password', true),
            'identity'      => htmlspecialchars($this->input->post('identity', true)),
            'identity_num'  => htmlspecialchars($this->input->post('identity_num', true)),
            'time'          => $this->input->post('time', true),
            'type'          => $this->input->post('type', true),
            'gender'        => $this->input->post('gender', true)
        ];
        if ($this->MY_model->addMember($data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Success </div>');
            redirect('blog/add');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Register Failed </div>');
            redirect('blog/add');
        }
    }
}

/* End of file Blog.php */
