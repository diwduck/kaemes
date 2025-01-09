<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert_pdf($data) {
        return $this->db->insert('pdf_files', $data);
    }

    public function update_pdf($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pdf_files', $data);
    }

    
    public function get_all_pdfs() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('pdf_files')->result();
    }
    
    public function get_pdf($id) {
        return $this->db->get_where('pdf_files', array('id' => $id))->row();
    }
}