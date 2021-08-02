<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model
{
   public function laporan_tahun()
    {
      $this->db->select_sum('total_bayar');
      $this->db->where('year(tanggal_transaksi) = year(NOW())');
      $query = $this->db->get('transaksi');
      return $query->result();
    }

    public function laporan_bulan()
    {
      $this->db->select_sum('total_bayar');
      $this->db->where('month(tanggal_transaksi) = month(NOW())');
      $query = $this->db->get('transaksi');
      return $query->result();
    }

    public function laporan_minggu()
    {
      $this->db->select_sum('total_bayar');
      $this->db->where('WEEK(tanggal_transaksi) = WEEK(NOW())');
      $query = $this->db->get('transaksi');
      return $query->result();
    }

}
