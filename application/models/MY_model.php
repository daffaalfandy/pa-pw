<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model
{
    public function getUser($limit, $offset)
    {
        return $this->db->get('user', $limit, $offset)->result_array();
    }

    public function getTotalUser()
    {
        return $this->db->count_all_results('user');
    }

    public function getDetail($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function addMember($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function updateMember($id, $update)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $update);
        return $this->db->affected_rows();
    }

    public function deleteDetail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }

    public function getAdmin($username)
    {
        return $this->db->get_where('admin', ['username' => $username])->row_array();
    }

    public function searchUser($search, $limit, $offset)
    {
        $this->db->like('username', $search);
        return $this->db->get('user', $limit, $offset)->result_array();
    }

    public function getTotalSearch($search)
    {
        $this->db->like('username', $search);
        return $this->db->count_all_results('user');
    }
}

/* End of file MY_model.php */
