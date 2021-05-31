<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class MIF extends CI_Controller
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
        $this->load->model('Manajemen_Informatika');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Informatika';
        $data['mhs_mif'] = $this->Manajemen_Informatika->read();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Manajemen_Informatika/MIF', $data, array('error' => ' '));
        $this->load->view('templates/footer');
    }
    public function viewadd()
    {
        $data['title'] = 'Manajemen Informatika';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Manajemen_Informatika/add_MIF');
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->Manajemen_Informatika->insert_mif();
        $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">data succes 
            </div>');
        redirect('MIF');
    }

    public function update_mhs_mif()
    {
        $this->Manajemen_Informatika->updateMIF();
    }
    public function hapus_mahasiswa_mif($id)
    {
        $this->Manajemen_Informatika->hapus_mhs_mif($id);

        $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">data succes delete
            </div>');
        redirect('MIF');
    }

    public function lihat_MIF($id)
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mhs_mif'] = $this->Manajemen_Informatika->getMhs_mif($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Manajemen_Informatika/detail', $data);
        $this->load->view('templates/footer');
    }
}
