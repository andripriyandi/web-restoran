<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jumlah');
        $this->load->model('m_masakan');
        $this->load->model('m_laporan');
        $this->load->model('m_order');
        $this->load->model('m_masakan_pel');
        $this->load->library('pagination');
        $this->load->helper('rupiah_helper');
        $this->load->model('m_id');
    }
    
	public function home()
	{
		$data['total_transaksi'] = $this->m_jumlah->hitungJumlahTransaksi();
		$data['total_member'] = $this->m_jumlah->hitungJumlahMember();
		$data['total_masakan'] = $this->m_jumlah->hitungJumlahMasakan();
		$data['total_order'] = $this->m_jumlah->hitungJumlahOrder();
		$this->load->view('admin/dashboard', $data);
	}

	public function registrasi()
	{
		$data['kode'] = $this->m_id->buat_kode_user();
		$pelanggan = array("id_level" => "5");
		$data['user'] = $this->db->order_by('nama_user', 'asc')->get_where('user', $pelanggan)->result();
		$this->load->view('admin/registrasi' ,$data);
	}

	public function user()
	{
		$data['kode'] = $this->m_id->buat_kode_user();
		$data['all'] = $this->db->order_by('nama_user', 'asc')->get_where('user', 'id_level <= 4')->result();
		$this->load->view('admin/user' ,$data);
	}

	public function menu()
	{
		$data['masakan'] = $this->m_masakan->getAll();
		$this->load->view('admin/menu/menu', $data);
	}

	public function data_order()
	{
		$data['kode'] = $this->m_id->buat_kode_order();
		$data['order'] = $this->db->order_by('tanggal', 'desc')->get('order')->result();
		$data['user'] = $this->db->get_where('user', 'id_level >= 5')->result();
		$this->load->view('admin/order/data_order', $data);
	}

	public function transaksi()
	{
		$data['kode'] = $this->m_id->buat_kode_transaksi();
		$data['all'] = $this->db->get('transaksi')->result();
		$data['user'] = $this->db->get_where('user', 'id_level >= 5')->result();
		$data['order'] = $this->db->get('order')->result();
		$this->load->view('admin/entri_transaksi',$data);
	}

	public function laporan()
	{
		$data['all'] = $this->db->get('transaksi')->result();
		$data['total_tahun'] = $this->m_laporan->laporan_tahun();
		$data['total_bulan'] = $this->m_laporan->laporan_bulan();
		$data['total_minggu'] = $this->m_laporan->laporan_minggu();
		$this->load->view('admin/generate_laporan', $data);
	}

	public function meja()
	{		
		$data['meja'] = $this->db->order_by('no_meja', 'asc')->get('meja')->result();
		$this->load->view('admin/meja',$data);
	}

	public function add_menu()
	{
		$data['kode'] = $this->m_id->buat_kode_masakan();
		$this->load->view('admin/menu/add_menu', $data);
	}

	public function detail_order($id)
  	{
  		$data['order'] = $this->m_order->join($id);
      	return $this->load->view('admin/order/detail_order',$data);
  	}

  	public function order()
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
        $config['base_url']             = base_url().'dashboard/manage/order';
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

		$this->load->view('admin/order/entri_order', $data);
  	}

    public function send_order($id)
    {
        $data['order'] = $this->m_masakan_pel->join();
        $data['kode'] = $this->m_id->buat_kode_order();
        $data['kode_do'] = $this->m_id->buat_kode_detail_order();
        $where = array("id_masakan" => $id);
        $data['meja'] = $this->db->order_by("no_meja", "asc")->get('meja')->result();
        $data['masakan'] = $this->db->get_where('masakan', $where)->result();
        $data['pesanan'] = $this->db->get("order")->result();
        $pelanggan = array("id_level" => "5");
        $data['user'] = $this->db->get_where('user', $pelanggan)->result();
        $this->load->view("admin/order/kirim", $data);
    }

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
