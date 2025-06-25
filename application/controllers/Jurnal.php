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
        $data['top3'] = $this->jurnal_model->get_top3_by_views();
        $this->load->view('pageJournal', $data);
    }

    

    public function addJournal() {
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal();
        $this->load->view('admin/addJournal', $data);
    }

    public function add()
    {
        $this->load->library('upload');
        $this->load->model('Jurnal_model');  
    
        $response = ['success' => false, 'error' => ''];
    
        // Konfigurasi untuk file thumbnail
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10240; 
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
    
        // Konfigurasi untuk file utama
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
        $result = $this->Jurnal_model->add_jurnal($data);
        if ($result) {
            $response = ['success' => true];
        } else {
            $response['error'] = 'Failed to add jurnal';
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
        $this->jurnal_model->update_warta($id, $update_data);
        $this->session->set_flashdata('success', 'Jurnal updated successfully.');

        // Kembalikan respons JSON
        echo json_encode(['success' => true]);
        return;
    }

    // Jika tidak ada POST, tidak perlu memuat view
    // Cukup ambil data untuk diisi ke modal
    echo json_encode($data['record']);
}


    public function delete($id) {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            unlink('./uploads/' . $jurnal->file_name); // Delete file
            $this->jurnal_model->delete_jurnal($id);
        }
        redirect('jurnal');
    }

  public function download()
    {
        $email = $this->input->post('email');
        $jurnal_id = $this->input->post('jurnal_id');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            show_error('Email tidak valid');
            return;
        }

        // Cek jurnal
        $jurnal = $this->jurnal_model->get_jurnal_by_id($jurnal_id);
        if (!$jurnal) {
            show_404();
            return;
        }

        // Tambah view
        $this->db->set('views', 'views + 1', FALSE);
        $this->db->where('id', $jurnal_id);
        $this->db->update('jurnal');

        // Simpan log download
        $this->db->insert('jurnal_download_log', [
            'jurnal_id' => $jurnal_id,
            'email' => $email,
            'timestamp' => date('Y-m-d H:i:s')
        ]);

        // Kirim sukses balik ke JS
        echo "success";
    }

    // Fungsi khusus untuk download langsung (GET)
    public function download_file($id)
    {
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if (!$jurnal) {
            show_404();
            return;
        }

        $this->load->helper('download');
        $file_path = './uploads/' . $jurnal->file_name;
        if (file_exists($file_path)) {
            force_download($file_path, NULL);
        } else {
            show_error('File tidak ditemukan');
        }
    }


    public function detailJurnal($id){
        $jurnal = $this->jurnal_model->get_jurnal_by_id($id);
        if ($jurnal) {
            $data['jurnal'] = $jurnal;
            $this->load->view('detailPageJournal', $data);
        }
    }

}
