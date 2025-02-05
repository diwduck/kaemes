<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_jurnal() {
        $this->db->order_by('tanggal_rilis', 'DESC');
        return $this->db->get('jurnal')->result();
    }

    public function add_jurnal($data) {
        $result = $this->db->insert('jurnal', $data);
        if (!$result) {
            log_message('error', 'jurnal insert failed: ' . json_encode($this->db->error()));
            return false; // Return false jika gagal insert jurnal
        }
        // Simpan log tindakan administratif ke tabel log_admin
        $log = [
            'timestamp' => date('Y-m-d H:i:s'),
            'repositori' => 'E-Journal',
            'action_type' => 'Added'
        ];
        $this->db->insert('log_admin', $log);

        return true; // Return true jika berhasil insert jurnal dan log
    }

    public function update_jurnal($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('jurnal', $data);
    }

        public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jurnal', $data);
    }

    public function delete_jurnal($id) {
        $this->db->where('id', $id);
        return $this->db->delete('jurnal');
    }

    public function get_jurnal_by_id($id) {

        return $this->db->get_where('jurnal', array('id' => $id))->row();
    }

    public function get_actions() {
        // Mengambil semua aksi dari tabel jurnal
        $this->db->select('timestamp, "E-Journal" as repositori');
        $this->db->order_by('timestamp', 'DESC');
        return $this->db->get('jurnal')->result_array();
    }
}
