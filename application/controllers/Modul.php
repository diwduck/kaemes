<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modul_model');
    }

    public function index() {
        $data['modul'] = $this->modul_model->get_all_modal();
        $this->load->view('admin/addModul', $data);
    }

    public function addModul() {
        $data['modul'] = $this->modul_model->get_all_modal();
        $this->load->view('admin/addModul', $data);
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

        // Check if the uploaded file is an image
        if (in_array($uploadData['file_ext'], ['.jpg', '.jpeg', '.png'])) {
            $thumbnail = $uploadData['file_name']; // Use the uploaded image as thumbnail
        } else {
            $thumbnail = 'default_thumbnail.jpg'; // Use a default thumbnail if not an image
}
        $data = [
            'thumbnail' => $thumbnail,
            'nama_modul' => $this->input->post('nama_modul'),
            'tanggal_rilis' => $this->input->post('tanggal_rilis'),
            'file_name' => $uploadData['file_name']
        ];

        // Save data to the database
        $this->db->insert('modul', $data);

        $response = ['success' => true];
    }

    echo json_encode($response);
}



    public function edit_modul($id)
{
    // Load the model
    $this->load->model('modul_model');

    // Get the current record data
    $data['record'] = $this->modul_model->get_by_id($id);

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
                $this->load->view('admin/edit_modul', $data);
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
        $this->modul_model->update($id, $update_data);

        // Redirect back to the listing page with success message
        $this->session->set_flashdata('success', 'modul updated successfully.');
        redirect('admin/modul');
    } else {
        // Load the edit view
        $this->load->view('admin/edit_modul', $data);
    }
}


    public function delete($id) {
        $modul = $this->modul_model->get_modul_by_id($id);
        if ($modul) {
            unlink('./uploads/' . $modul->file_name); // Delete file
            $this->modul_model->delete_modul($id);
        }
        redirect('modul');
    }

    public function download($id) {
        $modul = $this->modul_model->get_modul_by_id($id);
        if ($modul) {
            $this->load->helper('download');
            force_download('./uploads/' . $modul->file_name, NULL);
        }
    }
}
