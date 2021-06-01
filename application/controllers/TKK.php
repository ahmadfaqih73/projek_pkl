<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class TKK extends CI_Controller
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
        $this->load->model('Teknik_Komputer');
    }

    public function index()
    {
        $data['title'] = 'Teknik_Komputer';
        $data['mhs_tkk'] = $this->Teknik_Komputer->read();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Teknik_Komputer/TKK', $data, array('error' => ' '));
        $this->load->view('templates/footer');
    }
    public function viewadd()
    {
        $data['title'] = 'Teknik_Komputer';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Teknik_Komputer/add_TKK');
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->Teknik_Komputer->insert_tkk();
        $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">data succes 
            </div>');
        redirect('TKK');
    }

    public function update_mhs_tkk()
    {
        $this->Teknik_Komputer->updateTKK();
    }
    public function hapus_mahasiswa_tkk($id)
    {
        $this->Teknik_Komputer->hapus_mhs_tkk($id);

        $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">data succes delete
            </div>');
        redirect('TKK');
    }

    public function lihat_TKK($id)
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mhs_tkk'] = $this->Teknik_Komputer->getMhs_tkk($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Teknik_Komputer/detail', $data);
        $this->load->view('templates/footer');
    }
}
