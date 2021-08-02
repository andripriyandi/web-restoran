<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Datauser_model extends CI_Model {

    public function getdatauser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertuser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function datauseredit($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edituser($data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }

    public function hapususer($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('user');
        
    }
}

/* End of file Datamahasiswa_model.php */
