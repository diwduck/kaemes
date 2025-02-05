<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Tambahkan ini untuk memastikan koneksi database ter-load
    }

    public function count_jurnal() {
        $query = $this->db->get('jurnal'); 
        return $query->num_rows(); // Ubah cara menghitung data
    }

    public function count_modul() {
        $query = $this->db->get('modul'); 
        return $query->num_rows();
    }

    public function count_warta() {
        $query = $this->db->get('warta'); 
        return $query->num_rows();
    }
}
?>