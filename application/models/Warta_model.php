<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta_model extends CI_Model {

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
    public function get_all_warta() {
        $this->db->order_by('timestamp', 'DESC');
        return $this->db->get('warta')->result();
    }

    public function add_warta($data) {
        // Add error logging
        $result = $this->db->insert('warta', $data);
        if (!$result) {
            log_message('error', 'Insert warta failed: ' . json_encode($this->db->error()));
            return false;
        }
        // Insert ke log_admin setelah data berhasil masuk ke warta
        $log = [
            'repositori' => 'E-Warta',
            'action_type' => 'Added'
        ];
        $this->db->insert('log_admin', $log); // Menambahkan log ke log_admin
    
        return true;
    }

    public function update_warta($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('warta', $data);

        if (!$result) {
            log_message('error', 'Update warta failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'E-Warta',
            'action_type' => 'Updated'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    public function update($id, $data)
{
    $this->db->where('id', $id);
    $this->db->update('warta', $data);
}


    public function delete_warta($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('warta');

        if (!$result) {
            log_message('error', 'Delete warta failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'E-Warta',
            'action_type' => 'Deleted'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    public function get_warta_by_id($id) {

        return $this->db->get_where('warta', array('id' => $id))->row();
    }
}
