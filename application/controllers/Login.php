<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('UserModel');
  }

  function index()
  {
  	$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = $this->input->post('password'); // Ambil isi dari inputan password pada form login 

    $user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php

    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('message', '<div class="alert alert-danger" style="margin-top:1px;"> <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Username tidak ditemukan!!</div></div'); // Buat session flashdata
      redirect('auth/login'); // Redirect ke halaman login
    }else{
      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'id_user'=>$user->id_user,  // Buat session username
          'username'=>$user->username,  // Buat session username
          'nama_user'=>$user->nama_user, // Buat session authenticated
          'id_level'=>$user->id_level
        );
        $this->session->set_userdata($session); // Buat session sesuai $session

        if ($this->session->userdata('id_level') <= '4') {
        	redirect('dashboard/manage/home');
        }
        else{
          redirect('pelanggan/manage/index');
        }

      }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" style="margin-top:1px;"> <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Password Salah!</div></div'); // Buat session flashdata
        redirect('auth/login'); // Redirect ke halaman login
      }
    }

  }

}
