<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Model
{
    public function read()
    {
        $q_read = $this->db->get('surat_masuk')->result_array();
        return $q_read;
    }
}
