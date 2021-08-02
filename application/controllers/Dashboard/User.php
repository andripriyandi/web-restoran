<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct(){
		parent::__Construct();
	}

	public function simpan()
	{
		$this->form_validation->set_rules('username', 'Username','required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
			redirect('dashboard/manage/user');
		}else{
			$data=array(
				"id_user"=>$_POST['id_user'],
				"username"=>$_POST['username'],
				"password"=>$_POST['password'],
				"nama_user"=>$_POST['nama_user'],
				"id_level"=>$_POST['id_level'],
			);
			$this->db->insert('user',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('dashboard/manage/user');
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('id_user', 'id_user', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('dashboard/manage/user');
		}else{
			$data=array(
				"username"=>$_POST['username'],
				"password"=>$_POST['password'],
				"nama_user"=>$_POST['nama_user'],
				"id_level"=>$_POST['id_level'],
			);
			$this->db->where('id_user', $_POST['id_user']);
			$this->db->update('user',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('dashboard/manage/user');
		}
	}

	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('dashboard/manage/user');
		}else{
			$this->db->where('id_user', $id);
			$this->db->delete('user');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('dashboard/manage/user');
		}
	}

}