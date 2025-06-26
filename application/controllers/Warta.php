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
        $data['top4'] = $this->warta_model->get_top4_by_views();
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
                'judul' => $this->input->post('judul'),
                'penyusun' => $this->input->post('penyusun'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            if (!empty($_FILES['file_thumbnail']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_thumbnail')) {
                    $uploadData = $this->upload->data();
                    $update_data['file_thumbnail'] = $uploadData['file_name'];
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

            // Update data di database
            $this->warta_model->update_warta($id, $update_data);
            $this->session->set_flashdata('success', 'Warta updated successfully.');

            // Kembalikan respons JSON
            echo json_encode(['success' => true]);
            return;
        }

        // Jika tidak ada POST, tidak perlu memuat view
        // Cukup ambil data untuk diisi ke modal
        echo json_encode($data['record']);
    }

    public function delete($id) {
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            unlink('./uploads/' . $warta->file_name); // Delete file
            $this->warta_model->delete_warta($id);
        }
        redirect('warta');
    }

    public function download()
    {
        $email = $this->input->post('email');
        $warta_id = $this->input->post('warta_id');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            show_error('Email tidak valid');
            return;
        }

        // Cek warta
        $warta = $this->warta_model->get_warta_by_id($warta_id);
        if (!$warta) {
            show_404();
            return;
        }

        // Tambah view
        $this->db->set('views', 'views + 1', FALSE);
        $this->db->where('id', $warta_id);
        $this->db->update('warta');

        // Simpan log download
        $this->db->insert('warta_download_log', [
            'warta_id' => $warta_id,
            'email' => $email,
        ]);

        // Kirim sukses balik ke JS
        echo "success";
    }

    // Fungsi khusus untuk download langsung (GET)
    public function download_file($id)
    {
        $warta = $this->warta_model->get_warta_by_id($id);
        if (!$warta) {
            show_404();
            return;
        }

        $this->load->helper('download');
        $file_path = './uploads/' . $warta->file_name;
        if (file_exists($file_path)) {
            force_download($file_path, NULL);
        } else {
            show_error('File tidak ditemukan');
        }
    }

    public function detail($id){
        $warta = $this->warta_model->get_warta_by_id($id);
        if ($warta) {
            $data['warta'] = $warta;
            $this->load->view('detailPageWarta', $data);
        }
    }

    
}
