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
            'thumbnail' => $file_thumbnail,
            'nama_modul' => $this->input->post('nama_modul'),
            'penyusun_1' => $this->input->post('penyusun_1'),
            'penyusun_2' => $this->input->post('penyusun_2'),
            'penyusun_3' => $this->input->post('penyusun_3'),
            'deskripsi' => $this->input->post('deskripsi'),
            'lembaga_penerbit' => $this->input->post('lembaga_penerbit'),
            'file_name' => $file_name
        ];

        // Memanggil add_modul dari model untuk menyimpan data dan log
        $result = $this->modul_model->add_modul($data);
    
        if ($result) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'error' => 'Failed to add Modul'];
        }

        echo json_encode($response);

    }

    


    public function edit_modul($id)
    {
        $this->load->model('modul_model');
    
        // Ambil data modul berdasarkan ID
        $data['record'] = $this->modul_model->get_modul_by_id($id);
    
        // Jika request adalah POST (update data)
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $update_data = [
                'nama_modul'        => $this->input->post('nama_modul'),
                'penyusun_1'        => $this->input->post('penyusun_1'),
                'penyusun_2'        => $this->input->post('penyusun_2'),
                'penyusun_3'        => $this->input->post('penyusun_3'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'lembaga_penerbit'  => $this->input->post('lembaga_penerbit'),
            ];
    
            // Upload thumbnail jika ada
            if (!empty($_FILES['thumbnail']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg|webp';
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('thumbnail')) {
                    $uploadData = $this->upload->data();
                    $update_data['thumbnail'] = $uploadData['file_name'];
                }
            }
    
            // Upload file utama jika ada
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'pdf|mp4|jpg|png';
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $update_data['file_name'] = $uploadData['file_name'];
                }
            }
    
            // Update ke database
            $this->modul_model->update_modul($id, $update_data);
            $this->session->set_flashdata('success', 'Modul berhasil diperbarui.');
    
            // Respon JSON untuk AJAX
            echo json_encode(['success' => true]);
            return;
        }
    
        // Jika bukan POST, kirimkan data modul ke AJAX (misal untuk isi form edit)
        echo json_encode($data['record']);
    }
        


    public function delete($id) {
        $modul = $this->modul_model->get_modul_by_id($id);
        if ($modul) {
            unlink('./uploads/' . $modul->file_name); // Delete file
            $this->modul_model->delete_modul($id);
        }
        redirect('modul');
    }

     public function download()
    {
        $email = $this->input->post('email');
        $modul_id = $this->input->post('modul_id');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "invalid_email"; return;
        }

        // Cek modul
        $modul = $this->modul_model->get_modul_by_id($modul_id);
        if (!$modul) {
            echo "modul_not_found"; return;
        }

        // Tambah view
        $this->db->set('views', 'views + 1', FALSE);
        $this->db->where('id', $modul_id);
        $this->db->update('modul');

        // Simpan log download
        $this->db->insert('modul_download_log', [
            'modul_id' => $modul_id,
            'email' => $email,
        ]);

        echo "success";
    }


    public function download_file($id)
    {
        $modul = $this->modul_model->get_modul_by_id($id);
        if (!$modul) {
            show_404();
            return;
        }

        $this->load->helper('download');
        $file_path = './uploads/' . $modul->file_name;
        if (file_exists($file_path)) {
            force_download($file_path, NULL);
        } else {
            show_error('File tidak ditemukan');
        }
    }
    public function get_data()
    {
        $page = $this->input->get('page');
        $search = $this->input->get('search');
        $sort = $this->input->get('sort');

        $limit = 5;
        $offset = ($page - 1) * $limit;

        $this->load->model('Modul_model');
        $result = $this->Modul_model->get_filtered_data($limit, $offset, $search, $sort);

        echo json_encode($result);
    }

    public function detailModul($id){
        $modul = $this->modul_model->get_modul_by_id($id);
        if ($modul) {
            $data['modul'] = $modul;
            $this->load->view('detailPageModul', $data);
        }
    }
}
