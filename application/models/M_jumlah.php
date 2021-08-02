<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_jumlah extends CI_Model
{
    public function hitungJumlahMember()
    {
        $query = $this->db->get_where('user', ['id_level' => 5]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else
        {
            return 0;
        }
    }

    public function hitungJumlahMasakan()
    {
        $query = $this->db->get('masakan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else
        {
            return 0;
        }
    }

    public function hitungJumlahTransaksi()
    {
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else
        {
            return 0;
        }
    }

     public function hitungJumlahOrder()
    {
        $query = $this->db->get('order');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else
        {
            return 0;
        }
    }
}
