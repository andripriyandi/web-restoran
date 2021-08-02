<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_masakan");
        $this->load->library('form_validation');
        $this->load->library('user_agent');
    } 

    public function simpan()
    {
        $masakan = $this->m_masakan;
        $validation = $this->form_validation;
        $validation->set_rules($masakan->rules());

        if ($validation->run()) {
            $masakan->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
            redirect('dashboard/manage/add_menu');
        }else{
            $this->session->set_flashdata('error', 'Gagal menyimpan');
            redirect('dashboard/manage/add_menu');
        }

    }

    public function edit($id = null)
    { 
        $masakan = $this->m_masakan;
        $validation = $this->form_validation;
        $validation->set_rules($masakan->rules());

        if ($validation->run()) {
            $masakan->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
            redirect($this->agent->referrer());
        }

        $data["masakan"] = $masakan->getById($id);
        if (!$data["masakan"]) show_404();
        
        $this->load->view("admin/menu/edit_menu", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_masakan->delete($id)) {
            redirect(site_url('dashboard/manage/menu'));
        }
    }
}
