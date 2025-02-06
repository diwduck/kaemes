<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jurnal_model');
        $this->load->library('session'); // Buat session
    }

    public function index() {
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal();
        $this->load->view('pageJournal', $data);
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
    $data['record'] = $this->jurnal_model->get_jurnal_by_id($id);

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $update_data = [
            'judul' => $this->input->post('title'),
            'penyusun' => $this->input->post('author'),
            'tanggal_rilis' => $this->input->post('release_date')
        ];

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|mp4|jpg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $update_data['file_name'] = $uploadData['file_name'];
            }
        }

        $this->jurnal_model->update_jurnal($id, $update_data);
        $this->session->set_flashdata('success', 'Jurnal updated successfully.');
        redirect('jurnal');
    }

    $this->load->view('admin/edit_jurnal', $data);
}




    public function delete($id) {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            unlink('./uploads/' . $jurnal->file_name); // Delete file
            $this->jurnal_model->delete_jurnal($id);
        }
        redirect('jurnal');
    }

    public function download($id) {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            $this->load->helper('download');
            force_download('./uploads/' . $jurnal->file_name, NULL);
        }
    }
}
