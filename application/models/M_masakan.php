<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_masakan extends CI_Model
{
    private $_table = "masakan";

    public $id_masakan;
    public $nama_masakan;
    public $harga;
    public $status_masakan;
    public $image = "default.jpg";
    public $kategori;


    public function rules()
    {
        return [
            ['field' => 'nama_masakan',
            'label' => 'Nama Masakan',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'status_masakan',
            'label' => 'Status Masakan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_masakan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_masakan = $post["id_masakan"];
        $this->nama_masakan = $post["nama_masakan"];
        $this->harga = $post["harga"];
        $this->status_masakan = $post["status_masakan"];
        $this->image = $this->_uploadImage();
        $this->kategori = $post["kategori"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_masakan = $post["id"];
        $this->nama_masakan = $post["nama_masakan"];
        $this->harga = $post["harga"];
        $this->status_masakan = $post["status_masakan"];
        
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        $this->kategori = $post["kategori"];
        
        $this->db->update($this->_table, $this, array('id_masakan' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_masakan" => $id));
    }
    
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/upload/masakan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->nama_masakan;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $masakan = $this->getById($id);
        if ($masakan->image != "default.jpg") {
            $filename = explode(".", $masakan->image)[0];
            return array_map('unlink', glob(FCPATH."assets/upload/masakan/$filename.*"));
        }
    }

}
