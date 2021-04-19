<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknik_Informatika extends CI_Model {

	public function read()
	{
		// query ambil data pelanggan
		$q_read = $this->db->get('mhs_tif')->result_array();
		return $q_read;
	}

	public function insert()
	{
		
	}
}
