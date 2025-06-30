<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function _construct() {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        // Superadmin privileges
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('kelas/KelasModels');
            $this->load->helper('url');

            $data = [
                'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'menu' => "3"
            ];

            // data kelas yang sedang berlangsung (belum ditutup) 
            $data['kelas'] = $this->KelasModels->tampil_kelas_dimateri()->result();

            $this->load->view('template/admin/header_admin');
            $this->load->view('template/admin/navigasi_kiri', $data);
            $this->load->view('admin/tambah_materi', $data);
            $this->load->view('template/admin/footer_admin');
            // $this->load->view('template/admin/coba');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function tambah_materi() {
        // Superadmin privileges
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('kelas/KelasModels');
            $this->load->helper('url');

            $nmfile = "materi" . time();
            $config['upload_path'] = './assets/materi/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '5000'; //kb
            $config['file_name'] = $nmfile;
            $this->load->library('upload', $config);

            $data_materi = array(
                'nama_diklat' => $this->input->post('nama_diklat'),
                'jenis_diklat' => $this->input->post('jenis_diklat'),
                'id_diklat' => $this->input->post('id_diklat'),
                'nama_materi' => $this->input->post('nama_materi'),
            );

            // jika upload materi
            if ((!empty($_FILES['materi']['name']))) {
                       
                // dan berhasil
                if ($this->upload->do_upload('materi')) {
                    $file_materi = $this->upload->data();
                    $data_materi['materi'] = $file_materi['file_name'];
                    
                    $this->db->insert('materi', $data_materi);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('admin/Diklat/Materi/' . $this->input->post('id_diklat'));
                }
                //tapi gagal
                else {
                    $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">Materi gagal ditambahkan! '.$this->upload->display_errors().'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('admin/Materi/');
                }
            }
            // jika tidak upload materi
            else {
                $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">Materi gagal ditambahkan! '.$this->upload->display_errors().'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('admin/Materi/');
            }
            
        }
        // Jika tidak login sebagai superadmin
        else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

}
