<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jurnal_model');
    }

    public function index() {
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal();
        $this->load->view('admin/jurnal_view', $data);
    }

    

    public function addJournal() {
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal();
        $this->load->view('admin/addJournal', $data);
    }

    public function add()
{
    $this->load->library('upload');

    // Set upload configuration
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'pdf|mp4|jpg|png';
    $config['max_size'] = 10240; // 10MB
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file')) {
        $response = [
            'success' => false,
            'error' => $this->upload->display_errors()
        ];
    } else {
        $uploadData = $this->upload->data();
        $data = [
            'judul' => $this->input->post('judul'),
            'penyusun' => $this->input->post('penyusun'),
            'tanggal_rilis' => $this->input->post('tanggal_rilis'),
            'file_name' => $uploadData['file_name']
        ];

        // Save data to the database
        $this->db->insert('jurnal', $data);

        $response = ['success' => true];
    }

    echo json_encode($response);
}



    public function edit_jurnal($id)
{
    // Load the model
    $this->load->model('jurnal_model');

    // Get the current record data
    $data['record'] = $this->jurnal_model->get_by_id($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form input
        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $release_date = $this->input->post('release_date');
        $file = $_FILES['file']['name'];

        // Handle file upload
        if (!empty($file)) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];
            } else {
                // Handle upload error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/edit_jurnal', $data);
                return;
            }
        } else {
            // Use the existing file if no new upload
            $file_name = $data['record']->file;
        }

        // Update the record
        $update_data = [
            'title' => $title,
            'author' => $author,
            'release_date' => $release_date,
            'file' => $file_name,
        ];
        $this->jurnal_model->update($id, $update_data);

        // Redirect back to the listing page with success message
        $this->session->set_flashdata('success', 'jurnal updated successfully.');
        redirect('admin/jurnal');
    } else {
        // Load the edit view
        $this->load->view('admin/edit_jurnal', $data);
    }
}


    public function delete($id) {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            unlink('./uploads/' . $jurnal->file); // Delete file
            $this->jurnal_model->delete_jurnal($id);
        }
        redirect('jurnal');
    }

    public function download($id) {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            $this->load->helper('download');
            force_download('./uploads/' . $jurnal->file, NULL);
        }
    }
}
