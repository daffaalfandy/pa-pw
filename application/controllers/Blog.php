<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MY_model');
        if (!$this->session->userdata('fullname')) {
            redirect('admin/login');
        }
    }

    public function index($offset = 0)
    {
        // Pagination
        $this->load->library('pagination');
        $config['base_url']     = base_url('blog/index');
        $config['total_rows']   = $this->MY_model->getTotalUser();
        $config['per_page']     = 1;
        // Pagination Style
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        // End pagination
        $data['users']   = $this->MY_model->getUser($config['per_page'], $offset);
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
        $this->form_validation->set_rules('password_confirm', 'Password', 'trim|required|min_length[4]|matches[password]', ['matches'   => 'Password does not match']);
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
        $table  = 'user';
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
        if ($this->MY_model->addMember($table, $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Success </div>');
            redirect('blog/add');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Register Failed </div>');
            redirect('blog/add');
        }
    }

    public function edit($id)
    {
        $data['user']   = $this->MY_model->getDetail($id);
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('identity', 'Sort of Identity', 'trim|required');
        $this->form_validation->set_rules('identity_num', 'Identity Number', 'trim|required|is_natural');

        if ($this->form_validation->run() === TRUE) {
            $update     = [
                'fullname'      => htmlspecialchars($this->input->post('fullname', true)),
                'identity'      => htmlspecialchars($this->input->post('identity', true)),
                'identity_num'  => htmlspecialchars($this->input->post('identity_num', true)),
                'time'          => $this->input->post('time', true)
            ];
            if ($this->MY_model->updateMember($id, $update)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Success </div>');
                redirect('blog/edit');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Failed </div>');
                redirect('blog/edit');
            }
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('blog/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    public function delete($id)
    {
        if ($this->MY_model->deleteDetail($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Success </div>');
            redirect('blog');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Delete Failed </div>');
            redirect('blog');
        }
    }

    public function search($offset = 0)
    {
        $search = $this->input->post('search');
        // Pagination
        $this->load->library('pagination');
        $config['base_url']     = base_url('blog/search');
        $config['total_rows']   = $this->MY_model->getTotalSearch($search);
        $config['per_page']     = 1;
        // Pagination Style
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        // End pagination
        $data['users']   = $this->MY_model->searchUser($search, $config['per_page'], $offset);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('blog/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Blog.php */
