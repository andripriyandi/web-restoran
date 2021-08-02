<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entri_order extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('user_agent');
    }

    public function simpan()
	{
		$this->form_validation->set_rules('no_meja', 'No_meja','required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
			redirect('pelanggan/manage/index');
		}else{
			$id_user = $this->session->userdata('id_user');
			$data=array(
				"id_order"=>$_POST['id_order'],
				"no_meja"=>$_POST['no_meja'],
				"tanggal"=>date('Y-m-d H:i:s', time()),
				"id_user"=> $id_user,
				"keterangan"=>$_POST['keterangan'],
				"status_order"=>"Dipesan"
			);
			$data2=array(
				"id_detail_order"=>$_POST['id_detail_order'],
				"id_order"=>$_POST['id_order'],
				"id_masakan"=>$_POST['id_masakan'],
				"status_detail_order"=> "Terkirim",
				"jumlah"=>$_POST['jumlah'],
				"harga"=>$_POST['harga'],
				"total_harga"=>$_POST['total_harga']
			);
			$this->db->insert('order',$data);
			$this->db->insert('detail_order',$data2);
			$this->session->set_flashdata('sukses',"Berhasil dipesan");
			redirect($this->agent->referrer());
		}
	}

	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('pelanggan/manage/index');
		}else{
			$this->db->where('id_order', $id);
			$this->db->delete(array('detail_order', 'order'));
			
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('pelanggan/manage/index');
		}
	}
    
	
}
