<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('warta_model');
    }

    public function index() {
        $data['warta'] = $this->warta_model->get_all_warta();
        $this->load->view('admin/warta_view', $data);
    }

    

    public function addWarta() {
        $data['warta'] = $this->warta_model->get_all_warta();
        $this->load->view('admin/addWarta', $data);
    }

    /* public function add() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 5120; // 5MB max size
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            echo json_encode(['error' => $this->upload->display_errors()]);
        } else {
            $uploadData = $this->upload->data();
            $data = [
                'judul' => $this->input->post('judul'),
                'penyusun' => $this->input->post('penyusun'),
                'tanggal_rilis' => $this->input->post('tanggal_rilis'),
                'file' => $uploadData['file_name']
            ];
            $this->warta_model->add_warta($data);
            echo json_encode(['success' => true]);
        }
    } */

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
        $this->db->insert('warta', $data);

        $response = ['success' => true];
    }

    echo json_encode($response);
}


    public function edit_warta($id)
{
    // Load the model
    $this->load->model('Warta_model');

    // Get the current record data
    $data['record'] = $this->Warta_model->get_by_id($id);

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
                $this->load->view('admin/edit_warta', $data);
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
        $this->Warta_model->update($id, $update_data);

        // Redirect back to the listing page with success message
        $this->session->set_flashdata('success', 'Warta updated successfully.');
        redirect('admin/warta');
    } else {
        // Load the edit view
        $this->load->view('admin/edit_warta', $data);
    }
}


    public function delete($id) {
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            unlink('./uploads/' . $warta->file); // Delete file
            $this->warta_model->delete_warta($id);
        }
        redirect('warta');
    }

    public function download($id) {
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            $this->load->helper('download');
            force_download('./uploads/' . $warta->file, NULL);
        }
    }
}
