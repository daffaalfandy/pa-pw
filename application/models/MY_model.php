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

    public function addMember($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function updateMember($id, $update)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $update);
        return $this->db->affected_rows();
    }
}

/* End of file MY_model.php */
