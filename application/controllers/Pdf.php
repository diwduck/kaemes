<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('pdf_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation', 'session']); // Added session library here
        // Check admin login for all PDF functions
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        if(!$this->session->userdata('is_admin')) {
            $this->session->set_flashdata('error', 'Administrator access required');
            redirect('auth');
        }
    }

    public function index() {
        $data['pdfs'] = $this->pdf_model->get_all_pdfs();
        $data['is_admin'] = $this->session->userdata('is_admin');
        $this->load->view('admin/dashboard', $data);
    }

    public function upload() {
        // Check if user is admin
        if(!$this->session->userdata('is_admin')) {
            redirect('auth/login');
        }
        $this->load->view('pdf/upload');
    }

    public function edit($id) {
        // Check if user is admin
        if(!$this->session->userdata('is_admin')) {
            redirect('auth/login');
        }
        
        $data['pdf'] = $this->pdf_model->get_pdf($id);
        if(!$data['pdf']) {
            show_404();
        }
        
        $this->load->view('pdf/edit', $data);
    }

    public function update($id) {
        // Check if user is admin
        if(!$this->session->userdata('is_admin')) {
            redirect('auth/login');
        }
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('uploader', 'Uploader', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['pdf'] = $this->pdf_model->get_pdf($id);
            $this->load->view('pdf/edit', $data);
        } else {
            $pdf_data = array(
                'title' => $this->input->post('title'),
                'uploader' => $this->input->post('uploader')
            );
            
            $this->pdf_model->update_pdf($id, $pdf_data);
            redirect('pdf/index');
        }
    }

    public function do_upload() {
        // Check if user is admin
        if(!$this->session->userdata('is_admin')) {
            redirect('auth/login');
        }
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('uploader', 'Uploader', 'required');
        $this->form_validation->set_rules('upload_date', 'Upload Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pdf/upload');
        } else {
            $config['upload_path'] = './uploads/pdf/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 20000; // 20MB max
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pdf_file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pdf/upload', $error);
            } else {
                $upload_data = $this->upload->data();
                
                $pdf_data = array(
                    'title' => $this->input->post('title'),
                    'uploader' => $this->input->post('uploader'),
                    'upload_date' => $this->input->post('upload_date'),
                    'file_name' => $upload_data['file_name'],
                    'user_id' => $this->session->userdata('user_id')
                );

                $this->pdf_model->insert_pdf($pdf_data);
                redirect('pdf/index');
            }
        }
    }

    public function download($id) {
        // No login required for download
        $pdf = $this->pdf_model->get_pdf($id);
        
        if ($pdf) {
            $file_path = './uploads/pdf/' . $pdf->file_name;
            
            if (file_exists($file_path)) {
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $pdf->title . '.pdf"');
                readfile($file_path);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
}