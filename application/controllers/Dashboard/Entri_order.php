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
		$this->form_validation->set_rules('no_meja', 'no_meja','required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
			redirect('dashboard/manage/tambah_order');
		}else{
			$data=array(
				"id_order"=>$_POST['id_order'],
				"no_meja"=>$_POST['no_meja'],
				"tanggal"=>date('Y-m-d H:i:s', time()),
				"id_user"=> $_POST['id_user'],
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
			$this->db->insert('detail_order',$data2);$this->session->set_flashdata('sukses',"Berhasil Order");
			redirect($this->agent->referrer());
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('id_order', 'id_order', 'required');
		$this->form_validation->set_rules('no_meja', 'no_meja', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('dashboard/manage/order');
		}else{
			$data=array(
				"no_meja"=>$_POST['no_meja'],
				"tanggal"=>$_POST['tanggal'],
				"id_user"=>$_POST['id_user'],
				"keterangan"=>$_POST['keterangan'],
				"status_order"=>$_POST['status_order']
			);
			$this->db->where('id_order', $_POST['id_order']);
			$this->db->update('order',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('dashboard/manage/data_order');
		}
	}

	public function edit_detail()
	{
		$this->form_validation->set_rules('id_order', 'id_order', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect($this->agent->referrer());
		}else{
			$data=array(
				"keterangan"=>$_POST['keterangan'],
				"status_detail_order"=>$_POST['status_detail_order']
			);
			$this->db->where('id_detail_order', $_POST['id_detail_order']);
			$this->db->update('detail_order',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect($this->agent->referrer());
		}
	}

	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('dashboard/manage/order');
		}else{
			$this->db->where('id_order', $id);
			$this->db->delete(array('detail_order','order'));
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('dashboard/manage/data_order');
		}
	}
    
	
}
