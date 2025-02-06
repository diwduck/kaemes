<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('warta_model');
        $this->load->library('session'); // Buat session
    }

    public function index() {
        $data['warta'] = $this->warta_model->get_all_warta();
        $this->load->view('admin/addWarta', $data);
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
    $this->load->model('warta_model'); // Memuat model Jurnal_model

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

        // Memanggil add_jurnal dari model untuk menyimpan data dan log
        $result = $this->warta_model->add_warta($data);
    
        if ($result) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'error' => 'Failed to add warta'];
        }
    }

    echo json_encode($response);
}


    public function edit_warta($id)
{
    // Load the model
    $this->load->model('warta_model');

    // Get the current record data
    $data['record'] = $this->warta_model->get_warta_by_id($id);

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

        $this->warta_model->update_warta($id, $update_data);
        $this->session->set_flashdata('success', 'Warta updated successfully.');
        redirect('warta');
    }

    $this->load->view('admin/edit_warta', $data);
}


    public function delete($id) {
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            unlink('./uploads/' . $warta->file_name); // Delete file
            $this->warta_model->delete_warta($id);
        }
        redirect('warta');
    }

    public function download($id) {
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            $this->load->helper('download');
            force_download('./uploads/' . $warta->file_name, NULL);
        }
    }
}
