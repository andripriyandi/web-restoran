<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_id extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    
    public function buat_kode_user()
    {
    	$this->db->select('RIGHT(user.id_user,3) as kode', FALSE);
    	$this->db->order_by('id_user', 'DESC');
    	$this->db->limit(1);

    	$query = $this->db->get('user');

    	if ($query->num_rows() <> 0) {
    		$data = $query->row();
    		$kode = intval($data->kode)+1;
    	}else{
    		$kode = 1;
    	}
    	$kode_max = str_pad($kode,3,"0", STR_PAD_LEFT);
    	$kode_jadi = "US".$kode_max;
    	return $kode_jadi;

    }
    
    public function buat_kode_masakan()
    {
    	$this->db->select('RIGHT(masakan.id_masakan,3) as kode', FALSE);
    	$this->db->order_by('id_masakan', 'DESC');
    	$this->db->limit(1);

    	$query = $this->db->get('masakan');

    	if ($query->num_rows() <> 0) {
    		$data = $query->row();
    		$kode = intval($data->kode)+1;
    	}else{
    		$kode = 1;
    	}
    	$kode_max = str_pad($kode,3,"0", STR_PAD_LEFT);
    	$kode_jadi = "MN".$kode_max;
    	return $kode_jadi;

    }

    public function buat_kode_order()
    {
        $this->db->select('RIGHT(order.id_order,3) as kode', FALSE);
        $this->db->order_by('id_order', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('order');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kode_max = str_pad($kode,3,"0", STR_PAD_LEFT);
        $kode_jadi = "OR".$kode_max;
        return $kode_jadi;

    }

    public function buat_kode_transaksi()
    {
        $this->db->select('RIGHT(transaksi.id_transaksi,3) as kode', FALSE);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('transaksi');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kode_max = str_pad($kode,3,"0", STR_PAD_LEFT);
        $kode_jadi = "TR".$kode_max;
        return $kode_jadi;

    }

    public function buat_kode_detail_order()
    {
        $this->db->select('RIGHT(detail_order.id_order,3) as kode', FALSE);
        $this->db->order_by('id_detail_order', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('detail_order');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kode_max = str_pad($kode,3,"0", STR_PAD_LEFT);
        $kode_jadi = "DO".$kode_max;
        return $kode_jadi;

    }
}