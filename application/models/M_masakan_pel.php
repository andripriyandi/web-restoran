<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_masakan_pel extends CI_Model {
    
    public function get_masakan($batas=NULL,$offset=NULL,$cari=NULL)
  	{
      if ($batas != NULL) {
        $this->db->limit($batas,$offset);
      }
      if ($cari != NULL) {
          $this->db->or_like($cari);
      }
      $where = array('kategori' => "Masakan");
      $query = $this->db->get_where('masakan', $where);
      return $query->result();
  	}

  	public function get_minuman($batas=NULL,$offset=NULL,$cari=NULL)
  	{
      if ($batas != NULL) {
        $this->db->limit($batas,$offset);
      }
      if ($cari != NULL) {
          $this->db->or_like($cari);
      }
      $where = array('kategori' => "Minuman");
      $query = $this->db->get_where('masakan', $where);
      return $query->result();
  	}

  	public function jumlah_row($search)
  	{
    	$this->db->or_like($search);
    	$query = $this->db->get('masakan');

    	return $query->num_rows();
    }

    public function join()
    {
      $id = $this->session->userdata('id_user');
      $this->db->select('*');
      $this->db->from('order');
      $this->db->join('detail_order','detail_order.id_order=order.id_order');
      $this->db->join('masakan','masakan.id_masakan=detail_order.id_masakan');
      $this->db->where('order.id_user', $id);
      $query = $this->db->get();
      return $query->result();

    }


}
