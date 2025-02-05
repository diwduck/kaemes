<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_warta() {
        $this->db->order_by('tanggal_rilis', 'DESC');
        return $this->db->get('warta')->result();
    }

    public function add_warta($data) {
        // Add error logging
        $result = $this->db->insert('warta', $data);
        if (!$result) {
            log_message('error', 'Warta insert failed: ' . $this->db->error());
        }
        return $result;
    }

    public function update_warta($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('warta', $data);
    }

    public function update($id, $data)
{
    $this->db->where('id', $id);
    $this->db->update('warta', $data);
}


    public function delete_warta($id) {
        $this->db->where('id', $id);
        return $this->db->delete('warta');
    }

    public function get_warta_by_id($id) {

        return $this->db->get_where('warta', array('id' => $id))->row();
    }

    public function get_actions() {
        // Mengambil semua aksi dari tabel modul
        $this->db->select('timestamp, "E-Warta" as repositori');
        $this->db->order_by('timestamp', 'DESC');
        return $this->db->get('warta')->result_array();
    }
}
