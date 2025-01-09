<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }
    
    public function login() {
        if($this->session->userdata('logged_in')) {
            redirect('pdf');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Debug information
            echo "Attempting login with:<br>";
            echo "Username: " . $username . "<br>";
            
            $user = $this->user_model->get_user_by_username($username);
            if ($user) {
                echo "Database Password Hash: " . $user->password . "<br>";
                if (password_verify($password, $user->password)) {
                    echo "Password matches!<br>";
                } else {
                    echo "Password does not match!<br>";
                }
            } else {
                echo "User not found!<br>";
            }
            
            
            
            if($user && password_verify($password, $user->password)) {
                echo "Password verified successfully!<br>";
                $session_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'is_admin' => $user->is_admin,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($session_data);
                redirect('pdf');
            } else {
                echo "Login failed!<br>";
                if (!$user) {
                    echo "User not found in database<br>";
                } else {
                    echo "Password verification failed<br>";
                }
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth/login');
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}