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
                $this->load->view('Teknik_Informatika/TIF', $data);
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
                $this->load->view('Teknik_Informatika/add_TIF', $data);
                $this->load->view('templates/footer');
        }

        public function add()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile')) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                } else {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
