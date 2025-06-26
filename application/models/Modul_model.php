<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // --- Ambil Semua Modul ---
    public function get_all_modul() {
        $this->db->order_by('timestamp', 'DESC');
        return $this->db->get('modul')->result();
    }

    // --- Tambah Modul + Log ---
    public function add_modul($data) {
        $result = $this->db->insert('modul', $data);

        if (!$result) {
            log_message('error', 'Insert modul failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'Modul',
            'action_type' => 'Added'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    // --- Update Modul + Log ---
    public function update_modul($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('modul', $data);

        if (!$result) {
            log_message('error', 'Update modul failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'Modul',
            'action_type' => 'Updated'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    

    

    // --- Delete Modul + Log ---
    public function delete_modul($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('modul');

        if (!$result) {
            log_message('error', 'Delete modul failed: ' . json_encode($this->db->error()));
            return false;
        }

        // Simpan log tindakan administratif
        $log = [
            'repositori' => 'Modul',
            'action_type' => 'Deleted'
        ];
        $this->db->insert('log_admin', $log);

        return true;
    }

    // --- Ambil Modul Berdasarkan ID ---
    public function get_modul_by_id($id) {
        return $this->db->get_where('modul', array('id' => $id))->row();
    }

    public function get_latest_modul($limit = 3)
{
    $this->db->order_by('timestamp', 'DESC'); // Pastikan ada kolom created_at
    $this->db->limit($limit);
    $query = $this->db->get('modul');
    return $query->result();
}
public function get_filtered_data($limit, $offset, $search, $sort)
{
    $this->db->like('judul', $search);

    if ($sort === 'terbaru') {
        $this->db->order_by('created_at', 'DESC');
    } elseif ($sort === 'terlama') {
        $this->db->order_by('created_at', 'ASC');
    }

    $query = $this->db->get('modul', $limit, $offset);
    $data = $query->result();

    $this->db->like('judul', $search);
    $total = $this->db->count_all_results('modul');

    return [
        'items' => $data,
        'total' => $total,
        'from' => $offset + 1,
        'to' => $offset + count($data),
        'totalPages' => ceil($total / $limit)
    ];
}


}
