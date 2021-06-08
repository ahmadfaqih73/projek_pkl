<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sm_model extends CI_Model
{
    public function read()
    {
        $readm = $this->db->get('surat_masuk')->result_array();
        return $readm;
        // echo $readm;
        // foreach ($readm->result() as $row) {
        //     echo $row->jenis_surat;
        //     $row->file_surat;
        //     $row->deskripsi_surat;
        //     $row->tanggal_surat_masuk;
    }
    // print_r2($readm);
}
