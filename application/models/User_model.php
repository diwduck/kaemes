<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_user_by_username($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        
        // For debugging
        echo "Last Query: " . $this->db->last_query() . "<br>";
        $result = $query->row();
        echo "Debug: " . json_encode($result);
        echo "Result: ";
        var_dump($result);
        
        return $result;

    }

    
}