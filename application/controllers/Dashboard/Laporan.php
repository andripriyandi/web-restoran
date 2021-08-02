<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_order');
  }

  public function cetak_transaksi()
  {
    $data['transaksi'] = $this->db->get('transaksi')->result();
    $this->load->library('pdf');
    $this->pdf->setPaper('A4','potrait');
    $this->pdf->filename = "Data Transaksi";
    $this->pdf->load_view('admin/laporan/cetak_transaksi',$data);
  }

  public function cetak_struk($id)
  {
    $data['transaksi'] = $this->m_order->join_transaksi($id);
    $this->load->library('pdf');
    $this->pdf->setPaper('A4','potrait');
    $this->pdf->filename = "Cetak Struk";
    $this->pdf->load_view('admin/laporan/cetak_struk',$data);
  }


}
