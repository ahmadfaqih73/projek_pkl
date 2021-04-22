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

	public function insert_tif()
	{
		$nim         = $this->input->post('Nim');
		$nama_mahasiswa         = $this->input->post('Nama_mhs');
		$filename  = $this->upload_file();

		$data = array(
			'nim' => $nim,
			'nama_mahasiswa' => $nama_mahasiswa,
			'nama_file' => $filename
		);
		// var_dump($data);
		// die;
		$this->db->insert('mhs_tif', $data);
	}
	public function hapus_mhs_tif($id)
	{
		$this->db->delete('mhs_tif', ['Id_mhs_tif' => $id]);
	}
	public function getMhs_tif($id)
	{
		return $this->db->get_where('mhs_tif', ['Id_mhs_tif' => $id])->row_array();
	}

	public function upload_file()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf|jpg|png';
		$config['max_size']             = 0;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('filename')) {
			return $this->upload->data("file_name");
		}
	}
	public function updateTIF()
	{
		$id = $this->input->post('id');
		$nim        = $this->input->post('nim');
		$nama_mahasiswa         = $this->input->post('nama_mahasiswa');

		if (!empty($_FILES['filename'])) {
			$filename  = $this->upload_file();
		} else {
			$filename  = $this->input->post("filename");
		}

		$data = array(
			'nim' => $nim,
			'nama_mahasiswa' => $nama_mahasiswa,
			'nama_file' => $filename
		);
		var_dump($data);
		die;
		// $this->db->where('Id_mhs_tif',$id);
		// $this->db->update('mhs_tif',$data);
	}
}
