<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() 
    {
        $this->load->model('coe/register/RegModel');
        $this->load->model('coe/kelas/KelasModels');

        // Superadmin
        if ($this->session->userdata('role_admin') == "1") {

            $data = [
                //'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'role_admin' => "superadmin",
                'menu' => "1"
            ];
            
            $data['dashboard_jumlah_user'] = $this->RegModel->get_jumlah_peserta();
            $data['dashboard_jumlah_kelas_buka'] = $this->KelasModels->get_jumlah_kelas_buka();
            $data['dashboard_jumlah_kelas_tutup'] = $this->KelasModels->get_jumlah_kelas_tutup();

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/dashboard', $data);
            $this->load->view('coe/template/admin/footer_admin');
        }
        // Supervisi / bidang SKPM / bidang PKM
        elseif ($this->session->userdata('role_admin') == "2") 
        {

            $data = [
                //'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'role_admin' => "supervisi",
                'menu' => "1"
            ];

            $data['dashboard_jumlah_user'] = $this->RegModel->get_jumlah_peserta();
            $data['dashboard_jumlah_kelas_buka'] = $this->KelasModels->get_jumlah_kelas_buka();
            $data['dashboard_jumlah_kelas_tutup'] = $this->KelasModels->get_jumlah_kelas_tutup();

            $this->load->view('template/admin/header_admin');
            $this->load->view('template/admin/navigasi_kiri_supervisi', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('template/admin/footer_admin');
        } 
        elseif ($this->session->userdata('kode_username') == "kk") 
        {
            $data = [
                //'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'role_admin' => $this->session->userdata('role_admin'),
                'menu' => "1"
            ];

            $this->load->view('template/admin/header_admin');
            $this->load->view('template/admin/navigasi_kiri_supervisi', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('template/admin/footer_admin');
        }
        else
        {
            $this->session->sess_destroy();
            redirect('auth');
        }

    }

    public function tampil_chained() {
        $this->load->model('register/RegModel');
        $this->load->model('RegModel');
        $NIP = $_POST['NIP'];
        $dropdown_chained = $this->RegModel->tampil_diklat($NIP);
        if (count($dropdown_chained->result_array()) > 0) {
            echo "<option disabled selected>--Pilih Nama Diklat--</option>";
            foreach ($dropdown_chained->result() as $baris) {
                echo
                "<option value='" . $baris->id_diklat . "'>" . $baris->nama_diklat . "</option>";
            }
        }
    }

    public function get_nama_diklat() {
        $this->load->model('register/RegModel');
        $this->load->model('RegModel');
        $id_diklat = $this->input->post('id_diklat');
        $NIP = $this->input->post('NIP');
        $data = $this->RegModel->get_nama_diklat_byid($id_diklat, $NIP);
        echo json_encode($data);
    }

}
