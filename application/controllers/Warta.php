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
    public function add(){
        $this->load->library('upload');
        $this->load->model('warta_model'); // Memuat model Warta_model

        $response = ['success' => false, 'error' => ''];

        // Konfigurasi untuk file thumbnail
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10240; // 10MB
        $this->upload->initialize($config);

        $file_thumbnail = '';
        if (!empty($_FILES['file_thumbnail']['name'])) {
            if ($this->upload->do_upload('file_thumbnail')) {
                $file_thumbnail = $this->upload->data('file_name');
            } else {
                $response['error'] = 'Error uploading thumbnail: ' . $this->upload->display_errors();
                echo json_encode($response);
                return;
            }
        }

        // Konfigurasi untuk file utama (pdf/mp4)
        $config['allowed_types'] = 'pdf|mp4';
        $this->upload->initialize($config);

        $file_name = '';
        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $response['error'] = 'Error uploading file: ' . $this->upload->display_errors();
                echo json_encode($response);
                return;
            }
        }

        $data = [
            'judul'         => $this->input->post('judul'),
            'penyusun'      => $this->input->post('penyusun'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'file_thumbnail'=> $file_thumbnail,
            'file_name'     => $file_name
        ];

        // Simpan ke database
        $result = $this->warta_model->add_warta($data);
        
        if ($result) {
            $response = ['success' => true];
        } else {
            $response['error'] = 'Failed to add warta';
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
