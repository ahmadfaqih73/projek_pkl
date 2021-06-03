<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();

    //     // ini adalah untuk menghindari menebak url pada dan memakai session 
    //     // untuk menghalngi 
    //     // if(!$this->session->userdata('email')){
    //     //         redirect('auth');
    //     // }
    //     is_logged_in();
    // }
    public function index()
    {
        $data['title'] = 'Surat_masuk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->Surat_masuk->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Surat_masuk/surat_masuk', $data);
        $this->load->view('templates/footer');
    }
}
