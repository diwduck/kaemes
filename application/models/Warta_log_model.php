<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta_log_model extends CI_Model
{
    public function log_download($warta_id, $email)
    {
        $data = [
            'warta_id' => $warta_id,
            'email' => $email
        ];
        return $this->db->insert('warta_download_log', $data);
    }
}