<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getDetail($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}

/* End of file MY_model.php */
