<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_meja');
    }

    public function simpan()
	{
		$this->form_validation->set_rules('no_meja','No_Meja','required');
		if ($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
			redirect('dashboard/manage/meja');
		}else{
			$data=array(
				"no_meja" => $_POST['no_meja']
			);
			$this->db->insert('meja',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('dashboard/manage/meja');
		}


	}


	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('dashboard/manage/meja');
		}else{
			$this->db->where('id_meja', $id);
			$this->db->delete('meja');
			$this->session->set_flashdata('berhasil',"Meja Berhasil Dihapus");
			redirect('dashboard/manage/meja');
		}
	}
    
	
}
