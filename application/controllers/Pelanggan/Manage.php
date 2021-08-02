<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_masakan');
        $this->load->model('m_id');
        $this->load->model('m_masakan_pel');
        $this->load->helper('rupiah_helper');
        $this->load->library('pagination');
    }

	public function index()
	{
        $cari = $this->input->get('cari');
        $page = $this->input->get('per_page');

        $search = array('nama_masakan' => $cari );

        $batas =  6; // 9 data per page
            if(!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;

        $config['page_query_string']    = TRUE;
        $config['base_url']             = base_url().'pelanggan/manage/';
        $config['total_rows']           = $this->m_masakan_pel->jumlah_row($search);

        $config['per_page']             = $batas;
        $config['uri_segment']          = $page;

         // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-end">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();
        $data['jumlah_page'] = $page;
        $data['masakan'] = $this->m_masakan_pel->get_masakan($batas,$offset,$search);

        $where = array('kategori' => "Minuman");
        $data['minuman'] = $this->db->get_where('masakan', $where)->result();

        $data['order'] = $this->m_masakan_pel->join();

		$this->load->view('pelanggan/dashboard', $data);
	}

    public function pesan($id)
    {
        $data['order'] = $this->m_masakan_pel->join();
        $data['kode'] = $this->m_id->buat_kode_order();
        $data['kode_do'] = $this->m_id->buat_kode_detail_order();
        $where = array("id_masakan" => $id);
        $data['meja'] = $this->db->order_by("no_meja", "asc")->get('meja')->result();
        $data['masakan'] = $this->db->get_where('masakan', $where)->result();
        $data['pesanan'] = $this->db->get("order")->result();
        $this->load->view("pelanggan/pesanan", $data);
    }

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
