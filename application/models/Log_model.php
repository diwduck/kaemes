<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_logs() {
        // Ambil tindakan administratif dari tabel log_admin
        $logs = $this->db->select('timestamp, repositori, action_type')
                         ->from('log_admin')  // Ambil dari tabel log_admin
                         ->order_by('timestamp', 'DESC')
                         ->limit(9)  // Ambil hanya 7 log terbaru
                         ->get()
                         ->result_array();

        return $logs;
    }
}
?>