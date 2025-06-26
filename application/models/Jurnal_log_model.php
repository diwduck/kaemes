<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_log_model extends CI_Model
{
    public function log_download($jurnal_id, $email)
    {
        $data = [
            'jurnal_id' => $jurnal_id,
            'email' => $email
        ];
        return $this->db->insert('jurnal_download_log', $data);
    }
}