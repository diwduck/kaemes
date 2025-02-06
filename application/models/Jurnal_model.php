<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_log_admin($repositori, $action_type) {
        // Masukkan data ke tabel log_admin
        $log_data = [
            'repositori' => $repositori,
            'action_type' => $action_type
        ];
    
        $result = $this->db->insert('log_admin', $log_data);
    
        if (!$result) {
            log_message('error', 'Failed to insert log: ' . $this->db->error());
        }
    
        return $result;
    }
    
    // --- Tambah Jurnal + Log ---
    public function add_jurnal($data) {
        // Add error logging
        $result = $this->db->insert('jurnal', $data);
        if (!$result) {
            log_message('error', 'Insert jurnal failed: ' . json_encode($this->db->error()));
            return false;
        }
    
        // Insert ke log_admin setelah data berhasil masuk ke jurnal
        $log = [
            'repositori' => 'E-Journal',
            'action_type' => 'Added'
        ];
        $this->db->insert('log_admin', $log); // Menambahkan log ke log_admin
    
        return true;
    }
    
    

    // --- Update Jurnal + Log ---
    public function update_jurnal($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('jurnal', $data);

        if (!$result) {
            log_message('error', 'jurnal update failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'E-Journal',
            'action_type' => 'Updated'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    // --- Delete Jurnal + Log ---
    public function delete_jurnal($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('jurnal');

        if (!$result) {
            log_message('error', 'jurnal delete failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'E-Journal',
            'action_type' => 'Deleted'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    // --- Ambil Data Jurnal ---
    public function get_jurnal_by_id($id) {
        return $this->db->get_where('jurnal', array('id' => $id))->row();
    }

    public function get_all_jurnal() {
        $this->db->order_by('tanggal_rilis', 'DESC');
        return $this->db->get('jurnal')->result();
    }

}