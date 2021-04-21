<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class TIF extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();

                // ini adalah untuk menghindari menebak url pada dan memakai session 
                // untuk menghalngi 
                // if(!$this->session->userdata('email')){
                //         redirect('auth');
                // }
                // is_logged_in();
                $this->load->model('Teknik_Informatika');
        }

        public function index()
        {
                $data['title'] = 'Teknik Informatika';
                $data['mhs_tif'] = $this->Teknik_Informatika->read();
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('Teknik_Informatika/TIF', $data, array('error' => ' '));
                $this->load->view('templates/footer');
        }
        public function viewadd()
        {
                $data['title'] = 'Teknik Informatika';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('Teknik_Informatika/add_TIF');
                $this->load->view('templates/footer');
        }

        public function add()
        {
                $id = $this->input->post('ID');
                $nim         = $this->input->post('Nim');
                $nama_mahasiswa         = $this->input->post('Nama_mhs');
                // var_dump($nim);
                // die();
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 0;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('filename')) {
                        $error = array('error' => $this->upload->display_errors());

                        // $this->load->view('Teknik_Informatika', $error);
                } else {
                        $upload_data = $this->upload->data();

                        $data = array(
                                'id_mhs_tif' => $id,
                                'nim' => $nim,
                                'nama_mahasiswa' => $nama_mahasiswa,
                                'nama_file' => $upload_data['file_name']
                        );
                        // var_dump($data);
                        // die();
                        $hasil = $this->db->insert('mhs_tif', $data);
                        if ($hasil) {
                                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Sukses!</strong> Berhasil menambahkan data baru...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                                redirect('TIF', 'refresh');
                        } else {
                                redirect('TIF', 'refresh');
                        }
                        // print_r($hasil);
                }
        }

        public function update_mhs_tif()
        {
        }
        public function hapus_mahasiswa_tif($id)
        {
                $this->Teknik_Informatika->hapus_mhs_tif($id);

                $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">data succes delete
            </div>');
                redirect('TIF');
        }

        public function lihat_TIF($id)
        {
                $data['title'] = 'Data Mahasiswa';
                $data['mhs_tif'] = $this->Teknik_Informatika->getMhs_tif($id);
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('Teknik_Informatika/detail', $data);
                $this->load->view('templates/footer');
        }
}
