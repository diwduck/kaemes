<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Diklat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $this->load->helper('url');
        $this->load->model('coe/kelas/KelasModels');

        $role_admin = $this->session->userdata('role_admin');
        $penyelenggara = $this->session->userdata('nama');

        // Superadmin atau Supervisi / bidang SKPM / bidang PKM harus login dahulu
        if ($role_admin == "1" || $role_admin == "2") 
        {
            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];

            $data['listMasterDiklat'] = $this->KelasModels->get_data_masterdiklat();
            //$data['jumlahMasterDiklat'] = $this->KelasModels->get_jumlah_masterdiklat();

            $this->load->view('coe/template/admin/header_admin');
            // khusus superadmin
            if ($role_admin == "1") {
                $this->load->view('coe/template/admin/navigasi_kiri', $data);
                $this->load->view('coe/admin/diklat', $data);
            }
            // khusus supervisi
            elseif ($role_admin == "2") {
                $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
                $this->load->view('coe/admin/diklat_supervisi', $data);
            }
            $this->load->view('coe/template/admin/footer_admin');
        }

        // Jika yang login merupakan contributor KAB/KOTA
        elseif ($this->session->userdata('kode_username') == "kk") 
        {
            $data = [
                //'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'role_admin' => $role_admin,
                'kode_username' => "kk",
                'menu' => "5"
            ];

            $data['listMasterDiklat'] = $this->KelasModels->get_data_masterdiklat_kabkota($penyelenggara);

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
            $this->load->view('coe/admin/diklat_supervisi', $data);
            $this->load->view('coe/template/admin/footer_admin');
            
        }
        elseif ($this->session->userdata('kode_username') == NULL) 
        {
            redirect('http://localhost/simitra-2020/user/LoginUser/logout');
        }
        // Selain superadmin dan supervisi
        else
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function coach() 
    {
        $this->load->helper('url');
        $this->load->model('coe/kelas/KelasModels');
        
        $role_admin = $this->session->userdata('role_admin');
        $kode_username = $this->session->userdata('kode_username');
        
        // Super admin dan Supervisi harus login dahulu
        if ($role_admin == "1" || $role_admin == "2" || $this->session->userdata('kode_username') == "kk") 
        {

            $id_diklat = $this->uri->segment(4);

            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];

            // get data kelas
            $data['dataKelas'] = $this->KelasModels->nama_diklat($id_diklat)->result();
            foreach ($data['dataKelas'] as $item) {
                $jenis_diklat = $item->jenis_diklat;
            }

            $data['listPeserta'] = $this->KelasModels->get_data_peserta_by_idpelatihan($id_diklat, $jenis_diklat);
            $data['id_pelatihan'] = $id_diklat;
            // comment karena database wi tidak digunakan
            //$data['pakwi'] = $this->KelasModels->tampil_wi();

            $this->load->view('coe/template/admin/header_admin');
            //Untuk PKN, PKA, PKP dan Pelatpim Pemda
            if ($jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah') {
                // Khusus Superadmin
                if ($role_admin == "1") {
                    $this->load->view('coe/template/admin/navigasi_kiri', $data);
                    $this->load->view('coe/admin/coach', $data);
                }
                // Khusus Supervisi BPSDMD & KABKOTA
                elseif ($role_admin == "2" OR $kode_username == "kk")
                {
                    $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
                    $this->load->view('coe/admin/coach_supervisi', $data);
                }
            }
            // Untuk Latsar / Prajabatan
            elseif ($jenis_diklat == "Diklat Prajabatan") {
                // Khusus Superadmin
                if ($role_admin == "1") 
                {
                    $this->load->view('coe/template/admin/navigasi_kiri', $data);
                    $this->load->view('coe/admin/coach_latsar', $data);
                }
                // Khusus Supervisi
                elseif ($role_admin == "2" OR $kode_username == "kk") 
                {
                    $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
                    $this->load->view('coe/admin/coach_supervisi_latsar', $data);
                }
            }
            $this->load->view('coe/template/admin/footer_admin');
        }

        // Jika selain Superadmin dan Supervisi
        else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function tampil_chained() {
        $this->load->model('coe/register/RegModel');
        $this->load->model('coe/RegModel');
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

    public function get_jns_diklat() {
        $this->load->model('coe/register/RegModel');
        $this->load->model('coe/RegModel');
        $id_diklat = $_POST['id_diklat'];
        $data = $this->RegModel->get_nama_diklat($id_diklat);
        echo json_encode($data);
    }

    public function edit_diklat($id_kelas) {
        // Hanya superadmin yang boleh edit pelatihan
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('coe/kelas/KelasModels');
            $this->load->helper('url');

            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];
            $data['kelas'] = $this->KelasModels->tampil_kelas();
            //$edit = $this->input->post('simpan');
            // kondisi default, tombol 'simpan' belum disubmit
            $dataKelas = $this->KelasModels->select_kelas_byId($id_kelas)->row();
            $data_diklat = array(
                'id_kelas' => $dataKelas->id_kelas,
                'id_diklat' => $dataKelas->id_diklat,
                'nama_diklat' => $dataKelas->nama_diklat,
                'jenis_diklat' => $dataKelas->jenis_diklat,
                'juklak' => $dataKelas->juklak,
                'jadwal' => $dataKelas->jadwal,
                'tgl_mulai' => $dataKelas->tgl_mulai,
                'tgl_selesai' => $dataKelas->tgl_selesai
            );
            $data['dataDiklat'] = $data_diklat;
            $data['kelas'] = $this->KelasModels->tampil_kelas();

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/edit_diklat', $data);
            $this->load->view('coe/template/admin/footer_admin');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function edit_diklat_act($id_kelas) {
        $this->load->model('coe/kelas/KelasModels');
        $nmfile = "file_" . time();
        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000'; //kb
        $config['file_name'] = $nmfile;

        // jika tombol simpan disubmit
        if (isset($_POST['simpan'])) {
            $data_diklat = array(
                'id_kelas' => $this->input->post('id_kelas'),
                'id_diklat' => $this->input->post('id_diklat'),
                'nama_diklat' => $this->input->post('nama_diklat'),
                'jenis_diklat' => $this->input->post('jenis_diklat'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            );

            $gbr = NULL;
            //$iserror = false;
            // Jika upload Juklak
            if ((!empty($_FILES['juklak']['name']))) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('juklak')) {
                    $dataDiklat = $this->KelasModels->select_kelas_byId($id_kelas)->row();
                    $data_lama = $dataDiklat->juklak;

                    //hapus file lama dari folder
                    $filehapus = './assets/file/' . $data_lama;
                    unlink($filehapus);

                    $gbr = $this->upload->data();
                    $data_diklat['juklak'] = $gbr['file_name'];
                } else {
                    $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">
                		Petunjuk Pelaksanaan tidak dapat disimpan, silahkan periksa kembali!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');
                    //$iserror = true;
                }
            } else {
                $data_diklat['juklak'] = $this->input->post('juklak_ganti');
            }

            $gbr1 = NULL;
            //$iserror = false;
            // Jika upload Jadwal
            if ((!empty($_FILES['jadwal']['name']))) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('jadwal')) {
                    $dataDiklat = $this->KelasModels->select_kelas_byId($id_kelas)->row();
                    $data_lama = $dataDiklat->jadwal;

                    //hapus file lama dari folder
                    $filehapus = './assets/file/' . $data_lama;
                    unlink($filehapus);

                    $gbr1 = $this->upload->data();
                    $data_diklat['jadwal'] = $gbr1['file_name'];
                } else {
                    $this->session->set_flashdata('message_gagal', '<div class="alert alert-danger" role="alert">
                		Jadwal tidak dapat disimpan, silahkan periksa kembali!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');
                    //$iserror = true;
                }
            } else {
                $data_diklat['jadwal'] = $this->input->post('jadwal_ganti');
            }

            $this->db->update('kelas', $data_diklat, array('id_kelas' => $id_kelas));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    	            Data Pelatihan berhasil diedit<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                    '</div>');
            redirect('admin/Diklat');
        }
    }

    public function edit_materi($id_materi) {
        // Superadmin privileges
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->model('coe/kelas/KelasModels');
            $this->load->helper('url');

            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];
            $data['kelas'] = $this->KelasModels->tampil_kelas();
            //$edit = $this->input->post('simpan');

            $dataMateri = $this->KelasModels->select_materi($id_materi)->row();
            $data_diklat = array(
                'id_materi' => $dataMateri->id_materi,
                'id_diklat' => $dataMateri->id_diklat,
                'nama_diklat' => $dataMateri->nama_diklat,
                'jenis_diklat' => $dataMateri->jenis_diklat,
                'nama_materi' => $dataMateri->nama_materi,
                'materi' => $dataMateri->materi
            );
            $data['dataMateri'] = $data_diklat;

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/edit_materi', $data);
            $this->load->view('coe/template/admin/footer_admin');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function edit_materi_act($id_materi) {
        $nmfile = "materi" . time();
        $config['upload_path'] = './assets/materi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000'; //kb
        $config['file_name'] = $nmfile;

        if (isset($_POST['simpan'])) {
            $data_materi = array(
                'id_materi' => $this->input->post('id_materi'),
                'id_diklat' => $this->input->post('id_diklat'),
                'nama_diklat' => $this->input->post('nama_diklat'),
                'jenis_diklat' => $this->input->post('jenis_diklat'),
                'nama_materi' => $this->input->post('nama_materi')
            );

            $this->load->model('coe/kelas/KelasModels');
            $this->load->library('upload', $config);

            // jika mengupload file baru
            if ((!empty($_FILES['materi']['name']))) {
                // dan berhasil
                if ($this->upload->do_upload('materi')) {
                    $dataMateri = $this->KelasModels->select_materi_byId($this->input->post('id_materi'))->row();
                    $data_lama = $dataMateri->materi;

                    //hapus file lama dari folder
                    $filehapus = './assets/materi/' . $data_lama;
                    unlink($filehapus);

                    $file_materi = $this->upload->data();
                    $data_materi['materi'] = $file_materi['file_name'];

                    $this->db->update('materi', $data_materi, array('id_materi' => $id_materi));
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil diedit<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('admin/Diklat/materi/' . ($this->input->post('id_diklat')));
                }
                // tapi gagal
                else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Materi gagal diedit ' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('admin/Diklat/edit_materi/' . $this->input->post('id_materi'));
                }
            }
            // jika tidak mengupload file baru
            else {
                $data_materi['materi'] = $this->input->post('materi_ganti');
                $this->db->update('materi', $data_materi, array('id_materi' => $id_materi));
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil diedit<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('admin/Diklat/materi/' . ($this->input->post('id_diklat')));
            }
        }
    }

    public function lihat_juklak($juklak) {
        if ($this->session->userdata('role_admin') == "1") {
            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];
            $data['juklak'] = $juklak;
            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/lihat_juklak', $data);
            $this->load->view('coe/template/admin/footer_admin');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function lihat_jadwal($jadwal) {
        if ($this->session->userdata('role_admin') == "1") {

            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5"
            ];
            $data['jadwal'] = $jadwal;
            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri', $data);
            $this->load->view('coe/admin/lihat_jadwal', $data);
            $this->load->view('coe/template/admin/footer_admin');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function lihat_materi($id_diklat, $id_materi, $materi) {
        $this->load->model('coe/kelas/KelasModels');
        $this->load->helper('url');

        $role_admin = $this->session->userdata('role_admin');
        // Super admin dan Supervisi harus login dahulu
        if ($role_admin == "1" || $role_admin == "2") {

            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5",
                'id_diklat' => $id_diklat
            ];
            $data['materi'] = $materi;
            $dataKelas = $this->KelasModels->nama_diklat($id_diklat)->row();
            $dataMateri = $this->KelasModels->select_materi($id_materi)->row();
            $data['namaDiklat'] = $dataKelas->nama_diklat;
            $data['namaMateri'] = $dataMateri->nama_materi;

            $this->load->view('coe/template/admin/header_admin');
            // Khusus Superadmin
            if ($role_admin == "1") {
                $this->load->view('coe/template/admin/navigasi_kiri', $data);
            }
            // Khusus Supervisi
            elseif ($role_admin == "2" OR $this->session->userdata('kode_username') == "kk") {
                $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
            }
            $this->load->view('coe/admin/lihat_materi', $data);
            $this->load->view('coe/template/admin/footer_admin');
        }
        // Jika tidak login
        else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function materi($id_diklat) 
    {
        $this->load->model('coe/kelas/KelasModels');
        $this->load->helper('url');

        $role_admin = $this->session->userdata('role_admin');
        // Super admin dan Supervisi harus login dahulu
        if ($role_admin == "1" || $role_admin == "2") 
        {
            $data = [
                'nama' => $this->session->userdata('nama'),
                'menu' => "5",
                'id_diklat' => $id_diklat
            ];

            $data['listMateri'] = $this->KelasModels->get_data_materi($id_diklat);
            $dataKelas = $this->KelasModels->nama_diklat($id_diklat)->row();
            $data['namaDiklat'] = $dataKelas->nama_diklat;

            $this->load->view('coe/template/admin/header_admin');
            // Khusus Superadmin
            if ($role_admin == "1") {
                $this->load->view('coe/template/admin/navigasi_kiri', $data);
                $this->load->view('coe/admin/materi', $data);
            }
            // Khusus Supervisi
            elseif ($role_admin == "2" OR $this->session->userdata('kode_username') == "kk") 
            {
                $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
                $this->load->view('coe/admin/materi_supervisi', $data);
            }
            $this->load->view('coe/template/admin/footer_admin');
        }
        // Jika yang login merupakan contributor KAB/KOTA
        elseif ($this->session->userdata('kode_username') == "kk") 
        {
            $data['listMateri'] = $this->KelasModels->get_data_materi($id_diklat);
            $dataKelas = $this->KelasModels->nama_diklat($id_diklat)->row();
            $data['namaDiklat'] = $dataKelas->nama_diklat;

            $data = [
                //'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'role_admin' => $role_admin,
                'kode_username' => "kk",
                'menu' => "5",
                'namaDiklat' => $data['namaDiklat'],
                'listMateri' => $data['listMateri']
            ];

            $this->load->view('coe/template/admin/header_admin');
            $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
            $this->load->view('coe/admin/materi_supervisi', $data);
            $this->load->view('coe/template/admin/footer_admin');
        }
        else 
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function delete_data_kelas($id_kelas) 
    {
        if ($this->session->userdata('role_admin') == "1") 
        {

            $this->load->model('coe/kelas/KelasModels');
            $data = $this->KelasModels->select_kelas_byId($id_kelas)->row();

            //hapus file juklak dari folder
            if ($data->juklak != NULL) 
            {
                unlink('./assets/file/' . $data->juklak);
            }

            //hapus file jadwal dari folder
            if ($data->jadwal != NULL) 
            {
                unlink('./assets/file/' . $data->jadwal);
            }
            
            $this->KelasModels->delete_diklat($id_kelas);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data Diklat Telah Dihapus !<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                    '</div>');

            redirect('admin/Diklat');
        } 
        else 
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function delete_materi() {
        if ($this->session->userdata('role_admin') == "1") {

            $this->load->model('coe/kelas/KelasModels');
            $data = $this->KelasModels->select_materi_byId($this->input->post('id_materi'))->row();
            //hapus file materi dari folder
            unlink('./assets/materi/' . $data->materi);

            $data = $this->KelasModels->delete_materi($this->input->post('id_materi'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi telah dihapus!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            echo json_encode($data);
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

//============================================================================================================================================
    //get data peserta dikpim by id diklat dan nip via ajax
    public function get_data_peserta() {
        header('Content-Type: application/json');

        $this->load->model('coe/kelas/KelasModels');

        $id_diklat = $_POST['id_diklat'];
        $nip = $_POST['nip'];

        $respObject = [];
        if (!empty($id_diklat)) {
            // get data kelas
            $data['dataKelas'] = $this->KelasModels->nama_diklat($id_diklat)->result();

            foreach ($data['dataKelas'] as $item) {
                $jenis_diklat = $item->jenis_diklat;
            }

            $daftarDataPeserta = $this->KelasModels->get_data_peserta_by_idpelatihan_and_nip($id_diklat, $nip, $jenis_diklat);

            foreach ($daftarDataPeserta as $key => $rowData) {
                $id = $rowData['id_proper'];
                //$jenis_diklat = $rowData['jenis_diklat'];

                $respObject[] = [
                    'file_foto' => $rowData['file_foto'],
                    'nama' => $rowData['nama'],
                    'nip' => $rowData['NIP'],
                    'telepon' => $rowData['no_telp'],
                    'email' => $rowData['email'],
                    'pangkat' => $rowData['pangkat'],
                    'jabatan' => $rowData['jabatan'],
                    'skpd' => $rowData['skpd'],
                    'pemda' => $rowData['pemda'],
                    'nama_diklat' => $rowData['nama_diklat'],
                    'jenis_diklat' => $jenis_diklat,
                    'id_diklat' => $rowData['id_diklat'],
                    'nama_coach' => $rowData['nama_coach'],
                    //Section list data proper judul
                    'judul' => $rowData['judul'],
                    'tgl_judul' => date_format(date_create($rowData['tgl_judul']), "d-m-Y"),
                    'status_judul' => $rowData['status_judul'],
                    'uraian_judul' => $rowData['uraian_judul'],
                    'aksi_judul' => '<button type="button" title="Setujui Judul" onclick="return konfirmasi_setujui(' . $id . ',\'status_judul\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi Judul" onclick="return konfirmasi_revisi(' . $id . ',\'status_judul\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>

                                                    <button type="button" title="Kosongkan Nilai Judul" onclick="return konfirmasi_kosongkan(' . $id . ',\'judul\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>',
                    //Section list data proper latar belakang
                    'latar' => $rowData['latar'],
                    'tgl_latar' => date_format(date_create($rowData['tgl_latar']), "d-m-Y"),
                    'status_latar' => $rowData['status_latar'],
                    'uraian_latar' => $rowData['uraian_latar'],
                    'aksi_latar' => '<button type="button" title="Setujui Latar Belakang" onclick="return konfirmasi_setujui(' . $id . ',\'status_latar\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi Latar Belakang" onclick="return konfirmasi_revisi(' . $id . ',\'status_latar\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>

                                                    <button type="button" title="Kosongkan Nilai Latar Belakang" onclick="return konfirmasi_kosongkan(' . $id . ',\'latar\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>',
                    //Section list data proper manfaat
                    'manfaat' => $rowData['manfaat'],
                    'tgl_manfaat' => date_format(date_create($rowData['tgl_manfaat']), "d-m-Y"),
                    'status_manfaat' => $rowData['status_manfaat'],
                    'uraian_manfaat' => $rowData['uraian_manfaat'],
                    'aksi_manfaat' => '<button type="button" title="Setujui Manfaat" onclick="return konfirmasi_setujui(' . $id . ',\'status_manfaat\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi Manfaat" onclick="return konfirmasi_revisi(' . $id . ',\'status_manfaat\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>

                                                    <button type="button" title="Kosongkan Nilai Manfaat" onclick="return konfirmasi_kosongkan(' . $id . ',\'manfaat\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>',
                    //Section list data proper milestone
                    'milestone' => $rowData['milestone'],
                    'tgl_milestone' => date_format(date_create($rowData['tgl_milestone']), "d-m-Y"),
                    'status_milestone' => $rowData['status_milestone'],
                    'uraian_milestone' => $rowData['uraian_milestone'],
                    'aksi_milestone' => '<button type="button" title="Setujui Milestone" onclick="return konfirmasi_setujui(' . $id . ',\'status_milestone\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi Milestone" onclick="return konfirmasi_revisi(' . $id . ',\'status_milestone\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>

                                                    <button type="button" title="Kosongkan Nilai Milestone" onclick="return konfirmasi_kosongkan(' . $id . ',\'milestone\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>',
                    //Section list data file RA
                    'file_ra' => $rowData['file_ra'],
                    'tgl_file_ra' => date_format(date_create($rowData['tgl_file_ra']), "d-m-Y"),
                    'status_file_ra' => $rowData['status_file_ra'],
                    'uraian_file_ra' => $rowData['uraian_file_ra'],
                    'aksi_ra' => '<button type="button" title="Setujui RA" onclick="return konfirmasi_setujui(' . $id . ',\'status_file_ra\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi RA" onclick="return konfirmasi_revisi(' . $id . ',\'status_file_ra\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>

                                                    <button type="button" title="Kosongkan RA" onclick="return konfirmasi_kosongkan(' . $id . ',\'ra\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>',
                    //Section list data file LA dan Abstraksi
                    'file_proper' => $rowData['file_proper'],
                    'tgl_file_la' => date_format(date_create($rowData['tgl_file_la']), "d-m-Y"),
                    'status_file_la' => $rowData['status_file_la'],
                    'abstrak' => $rowData['abstraksi'],
                    'uraian_la_abstrak' => $rowData['uraian_la_abstrak'],
                    'aksi_la' => '<button type="button" title="Setujui LA & Abstraksi" onclick="return konfirmasi_setujui(' . $id . ',\'status_file_la\',\'' . $jenis_diklat . '\')" class="btn btn-success btn-xs">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <button type="button" title="Revisi Laporan Akhir" onclick="return konfirmasi_revisi(' . $id . ',\'status_file_la\',\'' . $jenis_diklat . '\')" class="btn btn-warning btn-xs">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>',
                    'aksi_abstraksi' => '
                                                    <button type="button" title="Kosongkan Abstraksi" onclick="return konfirmasi_kosongkan(' . $id . ',\'abstraksi\',\'' . $nip . '\')" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>'
                ];
            }
        }

        echo json_encode(array(
            'status' => 'ok',
            'data_peserta' => $respObject
        ));
    }

    //get data peserta latsar by id diklat dan nip via ajax
    public function get_data_peserta_latsar() {
        header('Content-Type: application/json');

        $this->load->model('coe/kelas/KelasModels');

        $id_diklat = $_POST['id_diklat'];
        $nip = $_POST['nip'];

        $respObject = [];
        if (!empty($id_diklat)) {
            // get data kelas
            $data['dataKelas'] = $this->KelasModels->nama_diklat($id_diklat)->result();

            foreach ($data['dataKelas'] as $item) {
                $jenis_diklat = $item->jenis_diklat;
            }

            $daftarDataPeserta = $this->KelasModels->get_data_peserta_by_idpelatihan_and_nip($id_diklat, $nip, $jenis_diklat);

            foreach ($daftarDataPeserta as $key => $rowData) {
                $id = $rowData['id_aktualisasi'];

                // if stament for status pengajuan aktualisasi (Judul dan Identifikasi)
                if ($rowData['status_judul_identifikasi'] == "0") {
                    $status_judul_identifikasi = "Terkunci";
                } elseif ($rowData['status_judul_identifikasi'] == "1") {
                    $status_judul_identifikasi = "Proses";
                } elseif ($rowData['status_judul_identifikasi'] == "2") {
                    $status_judul_identifikasi = "Disetujui";
                } elseif ($rowData['status_judul_identifikasi'] == "3") {
                    $status_judul_identifikasi = "Revisi";
                }

                // if stament for status pengajuan aktualisasi (Gagasan Penyelesaian isu)
                if ($rowData['status_gagasan'] == "0") {
                    $status_gagasan = "Terkunci";
                } elseif ($rowData['status_gagasan'] == "1") {
                    $status_gagasan = "Proses";
                } elseif ($rowData['status_gagasan'] == "2") {
                    $status_gagasan = "Disetujui";
                } elseif ($rowData['status_gagasan'] == "3") {
                    $status_gagasan = "Revisi";
                }

                // if stament for status pengajuan aktualisasi (Lapora RA)
                if ($rowData['status_ra'] == "0") {
                    $status_ra = "Terkunci";
                } elseif ($rowData['status_ra'] == "1") {
                    $status_ra = "Proses";
                } elseif ($rowData['status_ra'] == "2") {
                    $status_ra = "Disetujui";
                } elseif ($rowData['status_ra'] == "3") {
                    $status_ra = "Revisi";
                }

                // if stament for status pengajuan aktualisasi (Lapora LA)
                if ($rowData['status_la'] == "0") {
                    $status_la = "Terkunci";
                } elseif ($rowData['status_la'] == "1") {
                    $status_la = "Proses";
                } elseif ($rowData['status_la'] == "2") {
                    $status_la = "Disetujui";
                } elseif ($rowData['status_la'] == "3") {
                    $status_la = "Revisi";
                }

                $respObject[] = [
                    'id_aktualisasi' => $rowData['id_aktualisasi'],
                    'file_foto' => $rowData['file_foto'],
                    'nama' => $rowData['nama'],
                    'nip' => $rowData['nip'],
                    'telepon' => $rowData['no_telp'],
                    'email' => $rowData['email'],
                    'pangkat' => $rowData['pangkat'],
                    'jabatan' => $rowData['jabatan'],
                    'skpd' => $rowData['skpd'],
                    'pemda' => $rowData['pemda'],
                    'jenis_diklat' => $jenis_diklat,
                    'nama_diklat' => $rowData['nama_diklat'],
                    'id_diklat' => $rowData['id_diklat'],
                    'nama_coach' => $rowData['nama_coach'],
                    //Section list data aktualisasi judul
                    'judul' => $rowData['judul'],
                    'tanggal_pengajuan_judul' => date_format(date_create($rowData['tgl_pengajuan_judul']), "d-m-Y"),
                    'tanggal_validasi_judul_isu' => date_format(date_create($rowData['tgl_validasi_judul_isu']), "d-m-Y"),
                    'status_judul_identifikasi' => $status_judul_identifikasi,
                    'alasan_status_judul_identifikasi' => $rowData['alasan_status_judul_identifikasi'],
                    //Section list data aktualisasi gagasan penyelesaian isu
                    'tgl_pengajuan_gagasan' => date_format(date_create($rowData['tgl_pengajuan_gagasan']), "d-m-Y"),
                    'tgl_validasi_gagasan' => date_format(date_create($rowData['tgl_validasi_gagasan']), "d-m-Y"),
                    'status_gagasan' => $status_gagasan,
                    'alasan_status_gagasan' => $rowData['alasan_status_gagasan'],
                    //Section list data aktualisasi RA
                    'file_ra' => $rowData['upload_file_ra'],
                    'tgl_pengajuan_ra' => date_format(date_create($rowData['tgl_pengajuan_ra']), "d-m-Y"),
                    'tgl_validasi_ra' => date_format(date_create($rowData['tgl_validasi_ra']), "d-m-Y"),
                    'status_ra' => $status_ra,
                    'alasan_ra' => $rowData['alasan_ra'],
                    //Section list data aktualisasi LA
                    'file_la' => $rowData['upload_file_la'],
                    'tgl_pengajuan_la' => date_format(date_create($rowData['tgl_pengajuan_la']), "d-m-Y"),
                    'tgl_validasi_la' => date_format(date_create($rowData['tgl_validasi_la']), "d-m-Y"),
                    'status_la' => $status_la,
                    'alasan_status_la' => $rowData['alasan_status_la'],
                    //Section list data aktualisasi link video
                    'link_video' => $rowData['link_video']
                ];
            }
        }

        echo json_encode(array(
            'status' => 'ok',
            'data_peserta' => $respObject
        ));
    }

    //get data identifikasi isu by id_aktualisasi via ajax
    public function get_data_identifikasi_isu_by_idaktualisasi() {
        header('Content-Type: application/json');

        $this->load->model('coe/latsar/LatsarModels');

        $id_aktualisasi = $_POST['id_aktualisasi'];

        $respObject = [];
        if (!empty($id_aktualisasi)) {
            $daftarIsu = $this->LatsarModels->get_data_identifikasi_isu_peserta_latsar($id_aktualisasi);

            foreach ($daftarIsu as $key => $rowData) {
                $tanggal = date_format(date_create($rowData['timestamp']), 'd-m-Y');

                //statement if for core isu
                if ($rowData['core_isu'] == "1") {
                    $core_isu = '<i style="color: green;" class="icon fas fa-flag"></i>';
                } else {
                    $core_isu = '-';
                }

                $respObject[] = [
                    'isu' => $rowData['isu'],
                    'sumber' => $rowData['sumber_isu'],
                    'core_isu' => $core_isu,
                    'timestamp' => $tanggal
                ];
            }
        }

        echo json_encode(array(
            'status' => 'ok',
            'data_isu' => $respObject
        ));
    }

    //get data gagasan penyelesaian isu dan nilai aneka via ajax
    public function get_data_gagasan_penyelesaian_isu() {
        header('Content-Type: application/json');

        $this->load->model('coe/latsar/LatsarModels');

        $id_aktualisasi = $_POST['id_aktualisasi'];

        $respObject = [];
        if (!empty($id_aktualisasi)) {
            //get data id core isu
            $dataAktualisasi['isu'] = $this->LatsarModels->get_data_core_isu_peserta_latsar($id_aktualisasi)->row();

            //get data gagasan penyelesaian isu
            $dataAktualisasi['gagasan'] = $this->LatsarModels->get_data_gagasan_penyelesaian_isu_latsar($dataAktualisasi['isu']->id_identifikasi_isu);

            //get data nilai aneka
            $dataAktualisasi['nilai_aneka'] = $this->LatsarModels->get_data_all_nilai_aneka_by_idAktualisasi($id_aktualisasi);

            foreach ($daftarIsu as $key => $rowData) {
                $tanggal = date_format(date_create($rowData['timestamp']), 'd-m-Y');

                //statement if for core isu
                if ($rowData['core_isu'] == "1") {
                    $core_isu = '<i style="color: green;" class="icon fas fa-flag"></i>';
                } else {
                    $core_isu = '-';
                }

                $respObject[] = [
                    'isu' => $rowData['isu'],
                    'sumber' => $rowData['sumber_isu'],
                    'core_isu' => $core_isu,
                    'timestamp' => $tanggal
                ];
            }
        }

        echo json_encode(array(
            'status' => 'ok',
            'data_isu' => $respObject
        ));
    }

    //Setujui konfirmasi ubah status
    function konfirmasi_setujui() {
        $id_proper = $this->input->post('id');
        $topik = $this->input->post('topik');

        $data_diklat = array(
            $topik => "Diterima"
        );

        $this->db->update('proper', $data_diklat, array('id_proper' => $id_proper));
    }

    //konfirmasi ubah status menjadi revisi
    function konfirmasi_revisi() {
        $id_proper = $this->input->post('id');
        $topik = $this->input->post('topik');

        $data_diklat = array(
            $topik => "Revisi"
        );

        $this->db->update('proper', $data_diklat, array('id_proper' => $id_proper));
    }

    //konfirmasi ubah nilai pada tabel proper dan history proper menjadi NULL
    function konfirmasi_kosongkan() {
        $this->load->model('coe/kelas/KelasModels');

        $id_proper = $this->input->post('id');
        $topik = $this->input->post('topik');
        $nip = $this->input->post('nip');

        //statement if for field tabel proper and history_proper
        if ($topik == "judul") {
            $data_diklat = array(
                $topik => NULL,
                'tgl_judul' => NULL,
                'status_judul' => NULL
            );

            $topik = "Judul";
        } elseif ($topik == "latar") {
            $data_diklat = array(
                $topik => NULL,
                'tgl_latar' => NULL,
                'status_latar' => NULL
            );

            $topik = "Latar Belakang";
        } elseif ($topik == "manfaat") {
            $data_diklat = array(
                $topik => NULL,
                'tgl_manfaat' => NULL,
                'status_manfaat' => NULL
            );

            $topik = "Manfaat";
        } elseif ($topik == "milestone") {
            $data_diklat = array(
                $topik => NULL,
                'tgl_milestone' => NULL,
                'status_milestone' => NULL
            );

            $topik = "Milestone";
        } elseif ($topik == "ra") {
            $data_diklat = array(
                'file_ra' => NULL,
                'tgl_file_ra' => NULL,
                'status_file_ra' => NULL
            );

            $topik = "Upload File Rancangan Akhir";
        } elseif ($topik == "abstraksi") {
            $data_diklat = array(
                'abstraksi' => NULL,
                'tgl_file_la' => NULL,
                'status_file_la' => NULL
            );

            $topik = "Abstrak & Laporan Akhir Perubahan";
        }

        //hapus data repositori peserta pada tabel proper
        $this->KelasModels->delete_history_proper($nip, $topik);

        //update nilai NULL pada tabel proper
        $this->db->update('proper', $data_diklat, array('id_proper' => $id_proper));
    }

    //menyimpan data coach yang baru from admin
    public function ganti_coach_admin() {
        if (isset($_POST['simpan'])) {
            $nip_peserta = $this->input->post('nip');
            $id_diklat = $this->input->post('id_diklat');
            $nama_diklat = $this->input->post('nama_diklat');
            $jenis_diklat = $this->input->post('jenis_diklat');
            $id_coach = htmlspecialchars($this->input->post('id_coach'), TRUE);
            $nama_coach = htmlspecialchars($this->input->post('nama_coach'), TRUE);

            $data_coach = array(
                'id_coach' => $id_coach,
                'nama_coach' => $nama_coach
            );

            $this->load->model('coe/register/RegModel');

            //perbarui data Coach dan data Proper/RTL/DIKNIS/AKTUALISASI
            $this->RegModel->edit_coach($data_coach, $nip_peserta, $id_diklat);

            if ($jenis_diklat == "Pelatihan Kepemimpinan Pengawas" OR $jenis_diklat == "Pelatihan Kepemimpinan Nasional" OR $jenis_diklat == "Pelatihan Kepemimpinan Administrator") 
            {
                $this->RegModel->edit_proper($id_coach, $nama_coach, $nama_diklat, $nip_peserta);
            } 
            elseif ($jenis_diklat == "Diklat Prajabatan") 
            {
                $this->RegModel->edit_aktualisasi($id_coach, $nama_coach, $nama_diklat, $nip_peserta);
            }

            // Set userdata baru
            $this->session->set_userdata($data_coach);

            // set flashdata / notifikasi bahwa update Coach berhasil
            $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert">
            <i class="icon fas fa-check"></i> Penggantian Coach berhasil<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                    '</div>');

            redirect('admin/Diklat/coach/' . $id_diklat);
        }
    }

    //tambah data upload file proper
    function upload_proper_admin() {
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->library('form_validation');
            $this->load->model('coe/kelas/KelasModels');

            $id_proper = $this->input->post('id_proper_upload');
            $id_diklat = $this->input->post('id_diklat_upload');

            //get data file proper from database
            $data_file = $this->KelasModels->get_data_proper_by_idproper($id_proper)->row();

            //statement jika sudah ada sile proper, hapus yang lama
            if ($data_file->file_proper != NULL) {
                unlink('./assets/inovasi/la/' . $data_file->file_proper);
            }

            //Mengambil filename gambar untuk disimpan
            $nmfile = "inovasi_" . time();
            $config['upload_path'] = './assets/inovasi/la';
            $config['allowed_types'] = 'pdf';
            //$config['max_size'] = '10000'; //kb
            $config['file_name'] = $nmfile;

            $gbr = NULL;
            $iserror = false;

            if (!empty($_FILES['file_upload_proper']['name'])) {
                $gbr = NULL;

                //build array for update database
                $data_proper = array(
                    'upload' => "1", //0 : Terkunci // 1 : Proses
                    'file_proper' => NULL
                );
                $data['dataProper'] = $data_proper;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_upload_proper')) {
                    $gbr = $this->upload->data();
                    $data_proper['file_proper'] = $gbr['file_name'];

                    //update tabel proper from database
                    $this->db->update('proper', $data_proper, array('id_proper' => $id_proper));
                    $this->session->set_flashdata('msg_berhasil_upload', 'Data File Inovasi berhasil disimpan');
                    redirect('admin/Diklat/coach/' . $id_diklat);
                } else {
                    $this->session->set_flashdata('msg_gagal_upload', 'Data File Inovasi gagal disimpan, cek type file dan ukuran file yang anda upload');

                    redirect('admin/Diklat/coach/' . $id_diklat);
                }
            }
        } else {
            redirect('auth');
        }
    }

    //tambah data upload file Rancangan Akhir untuk DIKPIM
    function upload_ra_dikpim_admin() {
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->library('form_validation');
            $this->load->model('coe/kelas/KelasModels');

            $id_proper = $this->input->post('id_proper_upload');
            $id_diklat = $this->input->post('id_diklat_upload');

            //get data file proper from database
            $data_file = $this->KelasModels->get_data_proper_by_idproper($id_proper)->row();
          
            //statement jika sudah ada sile RA, hapus yang lama
            if ($data_file->file_ra != NULL) {
                unlink('./assets/inovasi/ra/' . $data_file->file_ra);
            }

            //Mengambil filename gambar untuk disimpan
            $nmfile = "dikpim_ra_" . time();
            $config['upload_path'] = './assets/inovasi/ra/';
            $config['allowed_types'] = 'pdf';
            //$config['max_size'] = '10000'; //kb
            $config['file_name'] = $nmfile;

            $gbr = NULL;
            $iserror = false;

            if (!empty($_FILES['file_upload_ra']['name'])) {
                $gbr = NULL;

                //build array for update database
                $data_proper = array(
                    'tgl_file_ra' => date('Y-m-d'),
                    'status_file_ra' => "Diterima",
                    'file_ra' => NULL
                );
                $data['dataProper'] = $data_proper;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_upload_ra')) {
                    $gbr = $this->upload->data();
                    $data_proper['file_ra'] = $gbr['file_name'];

                    //update tabel proper from database
                    $this->db->update('proper', $data_proper, array('id_proper' => $id_proper));
                    $this->session->set_flashdata('msg_berhasil_upload', 'Data File RA berhasil disimpan');
                    redirect('admin/Diklat/coach/' . $id_diklat);
                } else {
                    $this->session->set_flashdata('msg_gagal_upload', 'Data File RA gagal disimpan, cek type file dan ukuran file yang anda upload');

                    redirect('admin/Diklat/coach/' . $id_diklat);
                }
            }
        } else {
            redirect('auth');
        }
    }

    //tambah data upload file RA
    function upload_ra_admin() {
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->library('form_validation');
            $this->load->model('coe/kelas/KelasModels');

            $id_aktualisasi = $this->input->post('id_aktualisasi_upload_ra');
            $id_diklat = $this->input->post('id_diklat_upload');

            //get data file proper from database
            $data_file = $this->KelasModels->get_data_aktualisasi_by_idaktualisasi($id_aktualisasi);

            //statement jika sudah ada sile proper, hapus yang lama
            if ($data_file[0]['upload_file_ra'] != NULL) {
                unlink('./assets/latsar/aktualisasi/ra/' . $data_file[0]['upload_file_ra']);
            }

            //Mengambil filename gambar untuk disimpan
            $nmfile = "RA_Latsar" . time() . "_" . date('Y');
            $config['upload_path'] = './assets/latsar/aktualisasi/ra/';
            $config['allowed_types'] = 'pdf';
            //$config['max_size'] = '10000'; //kb
            $config['file_name'] = $nmfile;

            $gbr = NULL;
            $iserror = false;

            if (!empty($_FILES['file_upload_ra']['name'])) {
                $gbr = NULL;

                //build array for update database
                $data_ra = array(
                    'tgl_pengajuan_ra' => date('Y-m-d'),
                    'status_ra' => "2", //2 : Diterima
                    'upload_file_ra' => NULL
                );
                $data['dataRa'] = $data_ra;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_upload_ra')) {
                    $gbr = $this->upload->data();
                    $data_ra['upload_file_ra'] = $gbr['file_name'];

                    //update tabel aktualisasi from database
                    $this->db->update('aktualisasi', $data_ra, array('id_aktualisasi' => $id_aktualisasi));
                    $this->session->set_flashdata('msg_berhasil_upload', 'Data File Rancangan Aktualisasi berhasil disimpan');
                    redirect('admin/Diklat/coach/' . $id_diklat);
                } else {
                    $this->session->set_flashdata('msg_gagal_upload', 'Data File Rancangan Aktualisasi gagal disimpan, cek type file dan ukuran file yang anda upload');

                    redirect('admin/Diklat/coach/' . $id_diklat);
                }
            }
        } else {
            redirect('auth');
        }
    }

    //tambah data upload file LA
    function upload_la_admin() {
        if ($this->session->userdata('role_admin') == "1") {
            $this->load->library('form_validation');
            $this->load->model('coe/kelas/KelasModels');

            $id_aktualisasi = $this->input->post('id_aktualisasi_upload_la');
            $id_diklat = $this->input->post('id_diklat_upload');

            //get data file proper from database
            $data_file = $this->KelasModels->get_data_aktualisasi_by_idaktualisasi($id_aktualisasi);

            //statement jika sudah ada sile proper, hapus yang lama
            if ($data_file[0]['upload_file_la'] != NULL) {
                unlink('./assets/latsar/aktualisasi/la/' . $data_file[0]['upload_file_la']);
            }

            //Mengambil filename gambar untuk disimpan
            $nmfile = "LA_Latsar" . time() . "_" . date('Y');
            $config['upload_path'] = './assets/latsar/aktualisasi/la/';
            $config['allowed_types'] = 'pdf';
            //$config['max_size'] = '10000'; //kb
            $config['file_name'] = $nmfile;

            $gbr = NULL;
            $iserror = false;

            if (!empty($_FILES['file_upload_la']['name'])) {
                $gbr = NULL;

                //build array for update database
                $data_la = array(
                    'tgl_pengajuan_la' => date('Y-m-d'),
                    'status_la' => "2", //2 : Diterima
                    'upload_file_la' => NULL
                );
                $data['dataLa'] = $data_la;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_upload_la')) {
                    $gbr = $this->upload->data();
                    $data_la['upload_file_la'] = $gbr['file_name'];

                    //update tabel aktualisasi from database
                    $this->db->update('aktualisasi', $data_la, array('id_aktualisasi' => $id_aktualisasi));
                    $this->session->set_flashdata('msg_berhasil_upload', 'Data File Laporan Aktualisasi berhasil disimpan');
                    redirect('admin/Diklat/coach/' . $id_diklat);
                } else {
                    $this->session->set_flashdata('msg_gagal_upload', 'Data File Laporan Aktualisasi gagal disimpan, cek type file dan ukuran file yang anda upload');

                    redirect('admin/Diklat/coach/' . $id_diklat);
                }
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data peserta pelatihan
    function hapus_peserta_pelatihan() {
        $this->load->model('coe/kelas/KelasModels');
   
        $id_proper = $this->input->get('id_proper');
        $id_diklat = $this->input->get('id_diklat');

        //get data file proper from database
        $data_file = $this->KelasModels->get_data_proper_by_idproper($id_proper)->row();
        
        //jika ada file RA, hapus
        if ($data_file->file_ra != NULL) {
            unlink('./assets/inovasi/ra/' . $data_file->file_ra);
        }

        //jika ada file LA, hapus
        if ($data_file->file_proper != NULL) {
            unlink('./assets/inovasi/la/' . $data_file->file_proper);
        }

        // hapus data repositori peserta pada tabel proper
        // dan hapus peserta dari diklat yang diikuti
        $this->KelasModels->delete_dataproper_peserta($id_proper);

        $this->session->set_flashdata('msg_berhasil_upload', 'Peserta berhasil dihapus dari Pelatihan ini');
        redirect('admin/Diklat/coach/' . $id_diklat);
    }

    //fungsi untuk hapus data peserta
    function hapus_data_peserta_dari_user()
    {
        $this->load->model('coe/kelas/KelasModels');

        $id_peserta = $this->uri->segment(4);

        $this->KelasModels->delete_data_peserta_dari_user($id_peserta);

        //$this->session->set_flashdata('msg_berhasil_upload', 'Data Peserta berhasil dihapus dari tabel pengguna');
        //redirect('admin/Peserta/');
    }

    //hapus data peserta pelatihan latsar
    function hapus_peserta_pelatihan_latsar() {
        $this->load->model('coe/kelas/KelasModels');

        $id_aktualisasi = $_GET['id_aktualisasi'];

        //get data file from database
        $data_file = $this->KelasModels->get_data_aktualisasi_by_idaktualisasi($id_aktualisasi);

        //statement jika sudah ada file RA hapus
        if ($data_file[0]['upload_file_ra'] != NULL) {
            unlink('./assets/latsar/aktualisasi/ra/' . $data_file[0]['upload_file_ra']);
        }

        //statement jika sudah ada file LA hapus
        if ($data_file[0]['upload_file_la'] != NULL) {
            unlink('./assets/latsar/aktualisasi/la/' . $data_file[0]['upload_file_la']);
        }

        //hapus data repositori peserta pada tabel aktualisasi, gagasan_penyelesaian, identifikasi_isu, nilai_aneka
        $this->KelasModels->delete_peserta_pelatihan_latsar_aktualisasi($id_aktualisasi);
        $this->KelasModels->delete_peserta_pelatihan_latsar_gagasan($id_aktualisasi);
        $this->KelasModels->delete_peserta_pelatihan_latsar_identifikasi($id_aktualisasi);
        $this->KelasModels->delete_peserta_pelatihan_latsar_nilai_aneka($id_aktualisasi);

        $this->session->set_flashdata('msg_berhasil_upload', 'Data peserta pelatihan berhasil dihapus');
        redirect('admin/Diklat/coach/' . $id_diklat);
    }

    //function untuk cetak rekap kontrol peserta
    public function rekap_kontrol_peserta ($id_diklat)
    {
        if ($this->session->userdata('kode_username') == "kk" OR $this->session->userdata('role_admin') == "1" OR $this->session->userdata('role_admin') == "2") 
        {
            $this->load->model('coe/kelas/KelasModels');

            // get data kelas
            $data['dataKelas'] = $this->KelasModels->nama_diklat($id_diklat)->result();
        
            foreach ($data['dataKelas'] as $item) 
            {
                $jenis_diklat = $item->jenis_diklat;
                $nama_diklat = $item->nama_diklat;
            }

            $semua_pengguna = $this->KelasModels->get_data_peserta_daftaronline_by_idpelatihan($id_diklat);
            $semua_pengguna_aktivasi = $this->KelasModels->get_data_peserta_aktivasi_by_idpelatihan($id_diklat);
            $semua_pengguna_masuk_proper = $this->KelasModels->get_data_peserta_by_idpelatihan_proper($id_diklat, $jenis_diklat);

            //build template dokumen
            $spreadsheet = new Spreadsheet;

            //set width column
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(13);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(17);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(13);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(13);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(13);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(13);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(17);
          	$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(100);

            //set alignment text
            $spreadsheet->getActiveSheet()->getStyle('A')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('B1')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B1')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('C')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('C')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('D')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('D')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('E1')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('E1')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('F')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('F')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('G')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('G')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('H')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('H')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('I')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('I')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('J')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('J')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('K')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('K')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->getActiveSheet()->getStyle('L')
                        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('L')
                        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
       
          	$spreadsheet->getActiveSheet()->getStyle('M')
    					->getAlignment()->setWrapText(true); 

            $spreadsheet->getActiveSheet()->mergeCells('A1:L2');
            $spreadsheet->getActiveSheet()->mergeCells('A3:L3');

            //set header column for each column
            $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'KENDALI PROGRES APLIKASI MEDIA COACHING DAN COUNSELING')
                      ->setCellValue('A3', $nama_diklat)
                      ->setCellValue('A5', 'No.')
                      ->setCellValue('B5', 'Nama Peserta')
                      ->setCellValue('C5', 'NIP')
                      ->setCellValue('D5', 'Aktivasi')
                      ->setCellValue('E5', 'Coach')
                      ->setCellValue('F5', 'Latar Belakang')
                      ->setCellValue('G5', 'Judul')
                      ->setCellValue('H5', 'Manfaat')
                      ->setCellValue('I5', 'Milestone')
                      ->setCellValue('J5', 'Lap. Rancangan Akhir')
                      ->setCellValue('K5', 'Abstrak')
                      ->setCellValue('L5', 'Laporan Akhir')
              		  ->setCellValue('M5', 'Judul Inovasi');

            $kolom = 6;
            $nomor = 5;
            $i = 0;

            //Build array NIP sudah aktivasi
            $pengguna_aktivasi = array();
            $pengguna_coach = array();

            //prepare data yang sudah aktivasi
            foreach ($semua_pengguna_aktivasi as $aktivasi) 
            {
                $pengguna_aktivasi[] = $aktivasi['NIP'];
            }
          
            //prepare data yang sudah pilih coach
            foreach ($semua_pengguna_masuk_proper as $masuk_proper) 
            {
                $pengguna_proper[] = $masuk_proper['NIP'];
                $pengguna_coach[$masuk_proper['NIP']] = $masuk_proper['nama_coach'];
                
                $latar[$masuk_proper['NIP']] = $masuk_proper['latar'];
                $status_latar[$masuk_proper['NIP']] = $masuk_proper['status_latar'];
                
                $judul[$masuk_proper['NIP']] = $masuk_proper['judul'];
                $status_judul[$masuk_proper['NIP']] = $masuk_proper['status_judul'];

                $manfaat[$masuk_proper['NIP']] = $masuk_proper['manfaat'];
                $status_manfaat[$masuk_proper['NIP']] = $masuk_proper['status_manfaat'];

                $milestone[$masuk_proper['NIP']] = $masuk_proper['milestone'];
                $status_milestone[$masuk_proper['NIP']] = $masuk_proper['status_milestone'];

                $ra[$masuk_proper['NIP']] = $masuk_proper['file_ra'];
                $status_ra[$masuk_proper['NIP']] = $masuk_proper['status_file_ra'];

                $abstrak[$masuk_proper['NIP']] = $masuk_proper['abstraksi'];
                $la[$masuk_proper['NIP']] = $masuk_proper['file_proper'];
                $status_la_abstrak[$masuk_proper['NIP']] = $masuk_proper['status_file_la'];
            }

            foreach($semua_pengguna as $pengguna) 
            {
                $nomor_kolom_content = $nomor + 1;

                if (in_array($pengguna['NIP'], $pengguna_aktivasi)) 
                {
                    $aktivasi = "V";
                    $spreadsheet->getActiveSheet()->getStyle('D'.$nomor_kolom_content)
                                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$nomor_kolom_content)
                                ->getFill()->getStartColor()->setARGB('00CC00');

                    if (in_array($pengguna['NIP'], $pengguna_proper))
                    {
                        $nama_coach = $pengguna_coach[$pengguna['NIP']];
                        $spreadsheet->getActiveSheet()->getStyle('E'.$nomor_kolom_content)
                                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                        $spreadsheet->getActiveSheet()->getStyle('E'.$nomor_kolom_content)
                                    ->getFill()->getStartColor()->setARGB('00CC00');

                        //======================================cek latar belakang===========================================
                        if ($latar[$pengguna['NIP']] != NULL) 
                        {
                            $latar_belakang = $status_latar[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($latar_belakang == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($latar_belakang == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($latar_belakang == "Ditolak" OR $latar_belakang == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('F'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }
                        }
                        else
                        {
                            $latar_belakang = "-";
                        }

                        //==============================================cek judul============================================
                        if ($judul[$pengguna['NIP']] != NULL) 
                        {
                            $judul_proper = $status_judul[$pengguna['NIP']];
                          	$judul_inovasi = $judul[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($judul_proper == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($judul_proper == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($judul_proper == "Ditolak" OR $judul_proper == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('G'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }
                        }
                        else
                        {
                            $judul_proper = "-";
                        }

                        //==============================================cek manfaat============================================
                        if ($manfaat[$pengguna['NIP']] != NULL) 
                        {
                            $manfaat_proper = $status_manfaat[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($manfaat_proper == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($manfaat_proper == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($manfaat_proper == "Ditolak" OR $manfaat_proper == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('H'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }
                        }
                        else
                        {
                            $manfaat_proper = "-";
                        }

                        //==============================================cek MILESTONE============================================
                        if ($milestone[$pengguna['NIP']] != NULL) 
                        {
                            $milestone_proper = $status_milestone[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($milestone_proper == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($milestone_proper == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($milestone_proper == "Ditolak" OR $milestone_proper == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('I'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }   
                        }
                        else
                        {
                            $milestone_proper = "-";
                        }

                        //==============================================cek FILE RA============================================
                        if ($ra[$pengguna['NIP']] != NULL) 
                        {
                            $file_ra = $status_ra[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($file_ra == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($file_ra == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($file_ra == "Ditolak" OR $file_ra == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('J'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }
                        }
                        else
                        {
                            $file_ra = "-";
                        }

                        //==============================================cek Abstraksi============================================
                        if ($abstrak[$pengguna['NIP']] != NULL) 
                        {
                            $abstraksi = $status_la_abstrak[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($abstraksi == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($abstraksi == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($abstraksi == "Ditolak" OR $abstraksi == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('K'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }

                            
                        }
                        else
                        {
                            $abstraksi = "-";
                        }

                        //==============================================cek FIEL LA/Proper============================================
                        if ($la[$pengguna['NIP']] != NULL) 
                        {
                            $file_la = $status_la_abstrak[$pengguna['NIP']];

                            //statement untuk warna status
                            if ($file_la == "Menunggu") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FFFF00');
                            }
                            elseif ($file_la == "Diterima") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('00CC00');
                            }
                            elseif ($file_la == "Ditolak" OR $file_la == "Revisi") 
                            {
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                                $spreadsheet->getActiveSheet()->getStyle('L'.$nomor_kolom_content)
                                            ->getFill()->getStartColor()->setARGB('FF0000');
                            }
                        }
                        else
                        {
                            $file_la = "-";
                        }
                    }
                    else
                    {
                        $nama_coach       = "Belum memilih coach";
                        $aktivasi         = "v";
                        $nama_coach       = "-";
                        $latar_belakang   = "-";
                        $judul_proper     = "-";
                        $manfaat_proper   = "-";
                        $milestone_proper = "-";
                        $file_ra          = "-";
                        $abstraksi        = "-";
                        $file_la          = "-";
                    }  
                }
                else
                {
                    $aktivasi         = "-";
                    $nama_coach       = "-";
                    $latar_belakang   = "-";
                    $judul_proper     = "-";
                    $manfaat_proper   = "-";
                    $milestone_proper = "-";
                    $file_ra          = "-";
                    $abstraksi        = "-";
                    $file_la          = "-";
                }

                $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor-4)
                           ->setCellValue('B' . $kolom, ucwords($pengguna['nama']))
                           ->setCellValue('C' . $kolom, "'".$pengguna['NIP'])
                           ->setCellValue('D' . $kolom, $aktivasi)
                           ->setCellValue('E' . $kolom, $nama_coach)
                           ->setCellValue('F' . $kolom, $latar_belakang)
                           ->setCellValue('G' . $kolom, $judul_proper)
                           ->setCellValue('H' . $kolom, $manfaat_proper)
                           ->setCellValue('I' . $kolom, $milestone_proper)
                           ->setCellValue('J' . $kolom, $file_ra)
                           ->setCellValue('K' . $kolom, $abstraksi)
                           ->setCellValue('L' . $kolom, $file_la)
                  		   ->setCellValue('M' . $kolom, $judul_inovasi)
                           ;

                $kolom++;
                $nomor++;
                $i++;

            }

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A5:M'.$kolom)->applyFromArray($styleArray);

            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Kontrol Peserta_"'.date('d-m-Y')." ".$nama_diklat.'".xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
        else
        {
            redirect('auth');
        }
    }

    //update judul
    public function update_judul_peserta() 
    {
        $role_admin = $this->session->userdata('role_admin');

        if ($role_admin == "1" || $role_admin == "2") 
        {
            $this->load->library('form_validation');

            $id_diklat = $this->input->post('id_diklat_ubah_judul');
            $NIP = $this->input->post('nip_ubah_judul');

            $edit = $this->input->post('simpan');
            if (isset($_POST['simpan'])) 
            {
                $now = date('Y-m-d');
                //data proper
                $data_proper = array(
                    'judul' => $this->input->post('ubah_judul')
                );
                $data['dataProper'] = $data_proper;

                $this->db->update('proper', $data_proper, array('NIP' => $NIP, 'id_diklat' => $id_diklat));

                $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert">
                Judul berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');

                redirect('admin/Diklat/coach/' . $id_diklat);
            } 
            else 
            {
                $this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert">
                Judul gagal diubah<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');

                redirect('admin/Diklat/coach/' . $id_diklat);
            }
        }
        else 
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    //update judul
    public function update_abstrak_peserta() 
    {
        $role_admin = $this->session->userdata('role_admin');

        if ($role_admin == "1" || $role_admin == "2") 
        {
            $this->load->library('form_validation');

            $id_diklat = $this->input->post('id_diklat_ubah_abstrak');
            $NIP = $this->input->post('nip_ubah_abstrak');

            $edit = $this->input->post('simpan');
            if (isset($_POST['simpan'])) 
            {
                $now = date('Y-m-d');
                //data proper
                $data_proper = array(
                    'abstraksi' => $this->input->post('abstraksi')
                );
                $data['dataProper'] = $data_proper;

                $this->db->update('proper', $data_proper, array('NIP' => $NIP, 'id_diklat' => $id_diklat));

                $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert">
                Abstrak berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');

                redirect('admin/Diklat/coach/' . $id_diklat);
            } 
            else 
            {
                $this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert">
                Abstrak gagal diubah<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
                            '</div>');

                redirect('admin/Diklat/coach/' . $id_diklat);
            }
        }
        else 
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

}
