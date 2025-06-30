<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    //untuk membuka diklat provinsi
    public function index() {
        // admin harus login dahulu
        if ($this->session->userdata('role_admin') == "1") {
            //$this->load->helper('url');
            $this->load->model('coe/kelas/KelasModels');
            

            $data = [
                'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama')
            ];

            // tampilkan data pelatihan yang sudah dibuka di aplikasi daftar online
            //$data['kelas'] = $this->KelasModels->tampil_kelas();
            $data['menu'] = "1";

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/tambah_kelas', $data);
            $this->load->view('coe/template/admin/footer_admin');
            // $this->load->view('coe/template/admin/coba');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    //untuk membuka diklat kab/kota
    public function buka_diklat_kabkota() {
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('coe/kelas/KelasModels');
            $this->load->helper('url');

            $data = [
                'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama')
            ];

            // tampilkan data pelatihan yang diselenggarakan Kab/Kota
            $data['kelas'] = $this->KelasModels->tampil_kelas_kabkota();
            $data['menu'] = "2";

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/tambah_kelas_kabkota', $data);
            $this->load->view('coe/template/admin/footer_admin');
            // $this->load->view('coe/template/admin/coba');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function tampil_chained() {
        $this->load->model('coe/register/RegModel');
        $this->load->model('coe/RegModel');
        $NIP = $this->input->post('NIP');
        $dropdown_chained = $this->RegModel->tampil_diklat($NIP);
        if (count($dropdown_chained->result_array()) > 0) {
            echo "<option disabled selected>--Pilih Nama Diklat--</option>";
            foreach ($dropdown_chained->result() as $baris) {
                echo
                "<option value='" . $baris->id_diklat . "'>" . $baris->nama_diklat . "</option>";
            }
        }
    }

    // fungsi ajax untuk menampilkan jenis pelatihan
    public function get_jns_diklat() {
        $this->load->model('coe/register/RegModel');
        //$this->load->model('coe/RegModel');
        $id_diklat = $this->input->post('id_diklat');
        $data = $this->RegModel->get_nama_diklat($id_diklat);
        echo json_encode($data);
    }
    
     // fungsi ajax untuk menampilkan data kelas by id diklat
    public function get_nama_kelas() {
        $this->load->model('coe/register/RegModel');
        $this->load->model('coe/RegModel');
        $id_diklat = $this->input->post('id_diklat');
        $data = $this->RegModel->get_nama_kelas($id_diklat);
        echo json_encode($data);
    }
    
    // fungsi ajax untuk menampilkan id_pelatihan dan nama_pelatihan berdasarkan jenis pelatihan
    public function get_nama_diklat() {
        $jns_diklat = $this->input->post('jns_diklat');
        $this->load->model('coe/register/RegModel');
        //$this->load->model('coe/RegModel');
        
        $data = $this->RegModel->get_nama_diklat_byjnsdiklat($jns_diklat);
        $option_data = '';
        foreach ($data->result() as $data) {
            $option_data .= '<option value="'.$data->id_diklat.'">'.$data->nama_diklat.'</option>';
        }        
        echo $option_data;
    }

    public function buka_kelas() {
        // admin harus login
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('coe/kelas/KelasModels');
            $this->load->helper('url');

            // ambil data user
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            if (isset($user['nama']))
            {
                $nama = $user['nama'];
            }
            
            if (isset($user['file_foto']))
            {
                $file_foto = $user['file_foto'];
            }
            
            if (isset($nama) AND isset($file_foto))
            {
                $data = [
                    'nama' => $nama,
                    'file_foto' => $file_foto
                ];
            }
            
            // ambil data kelas
            $data['kelas'] = $this->KelasModels->tampil_kelas();
            $this->form_validation->set_rules('nama_diklat', 'Nama Diklat', 'trim|required', [
                'required' => 'Silahkan Pilih Nama Diklat !'
            ]);
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required', [
                'required' => 'Masukan Tanggal Selesai Diklat !'
            ]);

            // konfigurasi file upload
            $nmfile = "file_" . time();
            $config['upload_path'] = './assets/file/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '5000'; //kb
            $config['file_name'] = $nmfile;

            // jika validasi form gagal
            if ($this->form_validation->run() == false) {
                $this->load->view('coe/template/admin/header_admin');
                $this->load->view('coe/template/admin/navigasi_kiri', $data);
                $this->load->view('coe/admin/tambah_kelas', $data);
                $this->load->view('coe/template/admin/footer_admin');
            }
            // jika validasi form berhasil
            else {
                $now = date('Y-m-d');
                //tampung data kelas dalam array
                $data_kelas = array(
                    'nama_diklat' => $this->input->post('nama_diklat'),
                    'jenis_diklat' => $this->input->post('jenis_diklat'),
                    'id_diklat' => $this->input->post('id_diklat'),
                    'tgl_mulai' => $now,
                    'tgl_selesai' => $this->input->post('tgl_selesai'),
                    'penyelenggara' => $this->input->post('penyelenggara')
                );
                $data['dataKelas'] = $data_kelas;
                
                // cek apakah pelatihan sudah dibuka
                $id_diklat = $this->input->post('id_diklat');
                $cek_diklat = $this->db->get_where('kelas', ['id_diklat' => $id_diklat])->row_array();

                if ($cek_diklat) {
                    $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">
                Pelatihan sudah ada dalam database!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');
                    redirect('admin/Kelas');
                } 
                // jika pelatihan memang belum dibuka, maka buka
                else {

                    $iserror = false;
                    $gbr = NULL;
                    
                    // jika juklak diupload
                    if ((!empty($_FILES['juklak']['name']))) {

                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('juklak')) {
                            $this->input->post('juklak');
                            $gbr = $this->upload->data();
                            $data_kelas['juklak'] = $gbr['file_name'];
                        } else {
                            $this->session->set_flashdata('msg_gagal', 'Petunjuk Pelaksanaan gagal ditambahkan');
                            $iserror = true;
                        }
                    } 
                    // jika juklak tidak diupload
                    else {
                        $data_kelas['juklak'] = $this->input->post('juklak_ganti');
                    }
                    
                    $gbr1 = NULL;
                    // jika jadwal diupload
                    if ((!empty($_FILES['jadwal']['name']))) {

                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('jadwal')) {
                            $this->input->post('jadwal');
                            $gbr1 = $this->upload->data();
                            $data_kelas['jadwal'] = $gbr1['file_name'];
                        } else {
                            $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">
                		Petunjuk Pelaksanaan Tidak Dapat Disimpan, Silahkan Periksa Kembali!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                                    '</div>');
                            $iserror = true;
                        }
                    } else {
                        $data_kelas['jadwal'] = $this->input->post('jadwal_ganti');
                    }
                    $this->db->insert('kelas', $data_kelas);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pelatihan telah dibuka!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');
                    redirect('admin/Diklat');
                }
            }
        }
    }

}
