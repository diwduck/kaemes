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
        // Add error logging
        $result = $this->db->insert('jurnal', $data);
        if (!$result) {
            log_message('error', 'jurnal insert failed: ' . $this->db->error());
        }
        return $result;
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
}
