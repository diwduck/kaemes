<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_modul() {
        $this->db->order_by('tanggal_rilis', 'DESC');
        return $this->db->get('modul')->result();
    }

    public function add_modul($data) {
        // Add error logging
        $result = $this->db->insert('modul', $data);
        if (!$result) {
            log_message('error', 'Insert modul failed: ' . $this->db->error());
        }
        return $result;
    }

    public function update_modul($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('modul', $data);
    }

    public function update($id, $data)
{
    $this->db->where('id', $id);
    $this->db->update('modul', $data);
}


    public function delete_modul($id) {
        $this->db->where('id', $id);
        return $this->db->delete('modul');
    }

    public function get_mAodul_by_id($id) {

        return $this->db->get_where('modul', array('id' => $id))->row();
    }

    public function get_actions() {
        // Mengambil semua aksi dari tabel modul
        $this->db->select('timestamp, "Modul " as repositori');
        $this->db->order_by('timestamp', 'DESC');
        return $this->db->get('modul')->result_array();
    }
}
