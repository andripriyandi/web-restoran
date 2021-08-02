<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_meja extends CI_Model {
	
	public function batchInsert($data)
	{
		$jumlah = count($data['jumlah']);

		for ($i=1; $i < $jumlah ; $i++) { 
			$entri[] = array(
				'no_meja' => $data['jumlah'][$i],
				'status' => 'Kosong'
			);
		}
		$this->db->insert_batch('meja', $entri);
		if ($this->db->affected_rows() > 0) {
			return 1;
		}else{
			return 0;
		 }
		
	}    
    
}
