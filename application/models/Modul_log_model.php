<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modul_log_model extends CI_Model {
  public function log_download($modul_id, $email) {
    $data = [
      'modul_id' => $modul_id,
      'email' => $email
    ];
    return $this->db->insert('modul_download_log', $data);
  }
}