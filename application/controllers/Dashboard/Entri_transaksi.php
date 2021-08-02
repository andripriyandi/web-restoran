<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entri_transaksi extends MY_Controller {

	function __construct(){
		parent::__Construct();
	}

	public function simpan()
	{
		$this->form_validation->set_rules('id_user','id_user','required');
		if ($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
			redirect('dashboard/manage/transaksi');
		}else{
			$data=array(
				"id_transaksi"=>$_POST['id_transaksi'],
				"id_user"=>$_POST['id_user'],
				"id_order"=>$_POST['id_order'],
				"tanggal_transaksi"=>date('Y-m-d H:i:s', time()),
				"total_bayar"=>$_POST['total_bayar'],
				"bayar"=>$_POST['bayar'],
				"kembalian"=>$_POST['kembalian']
			);
			$this->db->insert('transaksi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('dashboard/manage/transaksi');
		}
	}

	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('dashboard/manage/transaksi');
		}else{
			$this->db->where('id_transaksi', $id);
			$this->db->delete('transaksi');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('dashboard/manage/transaksi');
		}
	}

}