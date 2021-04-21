<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknik_Informatika extends CI_Model
{

	public function read()
	{
		// query ambil data pelanggan
		$q_read = $this->db->get('mhs_tif')->result_array();
		return $q_read;
	}

	public function insertfile()
	{
	}
	public function hapus_mhs_tif($id)
	{
		 $this->db->delete('mhs_tif', ['Id_mhs_tif' => $id]);
		
	}
	public function getMhs_tif($id)
	{
		return $this->db->get_where('mhs_tif', ['Id_mhs_tif' => $id])->row_array();
	}
}
