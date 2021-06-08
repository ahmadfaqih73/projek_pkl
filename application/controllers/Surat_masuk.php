<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        //     // }
        //     is_logged_in();
        $this->load->model('Sm_model');
    }
    public function index()
    {
        $data['title'] = 'Surat_masuk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->Sm_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Surat_masuk/surat_masuk', $data);
        $this->load->view('templates/footer');
    }
}
