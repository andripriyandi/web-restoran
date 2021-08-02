<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['menu'] = $this->db->get('masakan', 6)->result();
		$this->load->view('home', $data);
	}

	public function login()
	{
		$this->load->view('login/login');
	}
}
