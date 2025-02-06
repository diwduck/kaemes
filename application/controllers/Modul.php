<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modul_model');
        $this->load->library('session'); // Buat session
    }

    public function index() {
        $data['modul'] = $this->modul_model->get_all_modul();
        $this->load->view('admin/addModul', $data);
    }

    public function addModul() {
        $data['modul'] = $this->modul_model->get_all_modul();
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

        // Memanggil add_jurnal dari model untuk menyimpan data dan log
        $result = $this->modul_model->add_modul($data);
    
        if ($result) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'error' => 'Failed to add jurnal'];
        }
    }

    echo json_encode($response);
}


public function edit_modul($id)
{
    // Load the model
    $this->load->model('modul_model');

    // Get the current record data
    $data['record'] = $this->modul_model->get_modul_by_id($id);

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $update_data = [
            'nama_modul' => $this->input->post('nama_modul'),
            'tanggal_rilis' => $this->input->post('release_date')
        ];

        if (!empty($_FILES['thumbnail'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|mp4|jpg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('thumbnail')) {
                $uploadData = $this->upload->data();
                $update_data['thumbnail'] = $uploadData['thumbnail'];
            }
        }

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|mp4|jpg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $update_data['file_name'] = $uploadData['file_name'];
            }
        }

        $this->modul_model->update_modul($id, $update_data);
        $this->session->set_flashdata('success', 'modul updated successfully.');
        redirect('modul');
    }

    $this->load->view('admin/edit_modul', $data);
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
