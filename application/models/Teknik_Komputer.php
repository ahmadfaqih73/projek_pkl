<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknik_Komputer extends CI_Model
{

    public function read()
    {
        // query ambil data pelanggan
        $q_read = $this->db->get('mhs_tkk')->result_array();
        return $q_read;
    }

    public function insert_tkk()
    {
        $nim         = $this->input->post('Nim');
        $nama_mahasiswa         = $this->input->post('Nama_mhs');
        $filename  = $this->upload_file();
        $foto = $this->upload_foto();

        $data = array(
            'nim' => $nim,
            'nama_mahasiswa' => $nama_mahasiswa,
            'nama_file' => $filename,
            'foto' => $foto
        );
        // var_dump($data);
        // die;

        $this->db->insert('mhs_tkk', $data);
    }
    public function hapus_mhs_tkk($id)
    {
        $this->db->delete('mhs_tkk', ['Id_mhs_tkk' => $id]);
    }
    public function getMhs_tkk($id)
    {
        return $this->db->get_where('mhs_tkk', ['Id_mhs_tkk' => $id])->row_array();
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
    public function upload_foto()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 0;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_mhs')) {
            return $this->upload->data("file_name");
        }
    }
    public function updatetkk()
    {
        $id                     = $this->input->post('id');
        $nim                    = $this->input->post('nim');
        $nama_mahasiswa         = $this->input->post('nama_mahasiswa');
        $oldFile                = $this->input->post('oldFiles');
        $oldFoto                = $this->input->post('oldFoto');

        if (!empty($_FILES['filename'])) {
            $filename  = $this->upload_file();
            unlink('./uploads/' . $oldFile);
        } else {
            $filename  = $this->input->post("filename");
        }
        if (!empty($_FILES['foto_mhs'])) {
            $foto  = $this->upload_foto();
            unlink('./uploads/' . $oldFoto);
        } else {
            $foto  = $this->input->post("foto_mhs");
        }

        $data = array(
            'nim'              => $nim,
            'nama_mahasiswa' => $nama_mahasiswa,
            'nama_file'      => $filename,
            'foto' => $foto
        );
        // var_dump($data);
        // die;
        $this->db->where('Id_mhs_tkk', $id);
        $this->db->update('mhs_tkk', $data);
    }
}
