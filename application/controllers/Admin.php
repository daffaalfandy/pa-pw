<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MY_model');
    }


    public function login()
    {
        if ($this->session->userdata('fullname')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Logged In. </div>');
            redirect('blog');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('admin/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $admin      = $this->MY_model->getAdmin($username);

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data   = [
                    'fullname'  => $admin['fullname'],
                    'role'      => $admin['role']
                ];
                $this->session->set_userdata($data);
                redirect('blog');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password. </div>');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong username. </div>');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Successfull. </div>');
        redirect('admin/login');
    }

    public function register()
    {
        if (!$this->session->userdata('fullname')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please Login First! </div>');
            redirect('admin/login');
        }
        if ($this->session->userdata('role') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You Dont Have Access. </div>');
            redirect('blog');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password', 'trim|required|min_length[5]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('admin/register');
            $this->load->view('templates/footer');
        } else {
            $this->_register();
        }
    }

    public function _register()
    {
        $table  = 'admin';
        $data   = [
            'role'          => 2,
            'username'      => htmlspecialchars($this->input->post('username', true)),
            'fullname'      => htmlspecialchars($this->input->post('fullname', true)),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];
        if ($this->MY_model->addMember($table, $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Add Admin </div>');
            redirect('blog');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed Add Admin </div>');
            redirect('blog');
        }
    }
}

/* End of file Admin.php */
