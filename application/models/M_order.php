<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model
{
   public function join($id)
    {
      $this->db->select('*');
      $this->db->from('order');
      $this->db->join('detail_order','detail_order.id_order=order.id_order');
      $this->db->where('order.id_order', $id);
      $query = $this->db->get();
      return $query->result();

    }

    public function join_transaksi($id)
    {
      $this->db->select('*');
      $this->db->from('transaksi');
      $this->db->join('order','order.id_order=transaksi.id_order');
      $this->db->join('user','user.id_user=transaksi.id_user');
      $this->db->where('transaksi.id_transaksi', $id);
      $query = $this->db->get();
      return $query->result();

    }

}
