<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index() {
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required', [
            'required' => 'NIP tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kata sandi tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == false) {

            $this->load->view('coe/template/peserta/header_user');
            $this->load->view('coe/template/login');
        } else {
            $this->_logged();
        }
    }

    public function loginwi() {
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required', [
            'required' => 'NIP tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kata sandi tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/peserta/header_user');
            $this->load->view('template/login');
        } else {
            $this->_loggedwi();
        }
    }

    //proses login peserta
    private function _logged() 
    {
        $NIP = $this->input->post('NIP');
        $password = $this->input->post('password');

        $NIP = $this->security->xss_clean($NIP);
        $password = $this->security->xss_clean($password);

        // Replaces all spaces with hyphens.
        $NIP = str_replace(' ', '', $NIP);
        $password = str_replace(' ', '', $password);

        // Removes special chars
        $NIP = preg_replace('/[^A-Za-z0-9\-]/', '', $NIP);
        $password = preg_replace('/[^A-Za-z0-9\-]/', '', $password);

        // Replaces multiple hyphens with single one.
        $NIP = preg_replace('/-+/', '-', $NIP);
        $password = preg_replace('/-+/', '-', $password);
        
        // mengecek apakah user sudah terdaftar di MCC
        $user = $this->db->get_where('users', ['NIP' => $NIP])->row_array();
        
        // load databasase daftar online
        $db2 = $this->load->database('daftar_online', TRUE);

        $daftar = $db2->query("SELECT data_peserta.id_peserta, data_peserta.nama, data_peserta.NIP, data_peserta.jabatan, data_peserta.instansi, data_peserta.instansi_pengirim, data_peserta.lokasi, data_peserta.gol, data_peserta.pangkat, data_peserta.hp, data_peserta.email_pribadi, data_peserta.jk, data_peserta.timestamp, data_peserta.id_diklat, data_diklat.nama_diklat FROM data_peserta JOIN data_diklat ON data_peserta.id_diklat = data_diklat.id_diklat WHERE data_peserta.NIP = '$NIP' UNION ALL SELECT data_peserta_c.id_peserta, data_peserta_c.nama, data_peserta_c.NIP, data_peserta_c.jabatan, data_peserta_c.instansi, data_peserta_c.instansi_pengirim, data_peserta_c.lokasi, data_peserta_c.gol, data_peserta_c.pangkat, data_peserta_c.hp, data_peserta_c.email_pribadi, data_peserta_c.jk, data_peserta_c.timestamp, data_peserta_c.id_diklat, data_diklat_c.nama_diklat FROM data_peserta_c JOIN data_diklat_c ON data_peserta_c.id_diklat = data_diklat_c.id_diklat WHERE data_peserta_c.NIP = '$NIP' ORDER BY timestamp DESC LIMIT 1")->row_array();

        /*
        //cek peserta apakah sudah mendaftar online diklat yang diselenggarakan oleh BPSDMD Prov Jateng
        $daftar = $db2->query("SELECT * FROM data_peserta JOIN data_diklat ON data_peserta.id_diklat = data_diklat.id_diklat WHERE data_peserta.NIP = '$NIP' ORDER BY data_peserta.timestamp DESC LIMIT 1")->row_array();

        //cek peserta apakah sudah mendaftar online diklat yang diselenggarakan oleh Kabupaten/Kota
        if ($daftar == NULL) {
            $daftar = $db2->query("SELECT * FROM data_peserta_c JOIN data_diklat_c ON data_peserta_c.id_diklat = data_diklat_c.id_diklat WHERE data_peserta_c.NIP = '$NIP' ORDER BY data_peserta_c.timestamp DESC LIMIT 1")->row_array();
        }*/

        //jika sudah pernah mendaftar MCC
        if ($user) { 
            // dan password yang dimasukkan benar langsung arahkan ke dashboard
            if (password_verify($password, $user['password'])) {

                $data1 = [
                    'NIP' => $NIP,
                    'email' => $user['email'],
                    'id_user' => $user['id_user'],
                    'jenis_diklat' => $user['jenis_diklat'],
                    'role' => $user['role']
                ];

                $this->session->set_userdata($data1);
                $session_jenis_diklat = $this->session->userdata("jenis_diklat");

                // case diklat kepemimpinan, pka dan pkp
                if ($session_jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah') {
                    //redirect('peserta/dikpim/Dikpim');
                    redirect('peserta/DashboardPeserta'); //for dashboard_just_upload
                }
                // case diklat fungsional
                else if ($session_jenis_diklat == "Diklat Fungsional") {
                    redirect('peserta/dikfung/Dikfung');
                } 
                // case diklat teknis
                else if ($session_jenis_diklat == "Diklat Teknis") {
                    redirect('peserta/diknis/Diknis');
                } 
                // case diklat prajabatan
                elseif ($session_jenis_diklat == "Diklat Prajabatan") {
                    //redirect('peserta/latsar/Latsar');
                  	redirect('peserta/DashboardPeserta'); //redirect ke just_upload_latsar
                } 
                // Jika jenis jenis diklat dan nama diklatnya belum dipilih / ditentukan
                // termasuk coach belum ditentukan
                else {
                    redirect('peserta/DashboardPeserta');
                }
            } 
            // Jika password yang dimasukkan salah
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah
                    </div>');
                redirect('Auth/index');
            }
        } 
        // jika belum pernah mendaftar MCC dan sudah mendaftar online diklat
        // arahkan ke halaman aktivasi
        elseif ($daftar) {
            // password adalah nomor hp peserta sewaktu mendaftar online diklat
            if ($password == $daftar['hp']) {
                $data = [
                    'NIP' => $NIP,
                    'email_pribadi' => $daftar['email_pribadi'],
                    'jabatan' => $daftar['jabatan'],
                    'instansi' => $daftar['instansi'],
                    'id_peserta' => $daftar['id_peserta']
                ];
                $this->session->set_userdata($data);
                redirect('peserta/Register');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah
                    </div>');
                redirect('Auth/index');
            }
        } 
       //jika data peserta tidak ditemukan di database daftar online
        else { 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                NIP anda tidak terdaftar
                </div>');
            redirect('auth');
        }
    }

    //proses login WI
    private function _loggedwi() 
    {
        $NIP = $this->input->post('NIP');
        $password = $this->input->post('password');

        $NIP = $this->security->xss_clean($NIP);
        $password = $this->security->xss_clean($password);

        // Replaces all spaces with hyphens.
        $NIP = str_replace(' ', '', $NIP);
        $password = str_replace(' ', '', $password);

        // Removes special chars
        $NIP = preg_replace('/[^A-Za-z0-9\-]/', '', $NIP);
        $password = preg_replace('/[^A-Za-z0-9\-]/', '', $password);

        // Replaces multiple hyphens with single one.
        $NIP = preg_replace('/-+/', '-', $NIP);
        $password = preg_replace('/-+/', '-', $password);

        $dbcoe = $this->load->database('default_coe', TRUE);

        $adm = $dbcoe->get_where('admin_mcc', ['user' => $NIP])->row_array();
        //$db2 = $this->load->database('wi', TRUE);
        //$wi = $db2->query("SELECT * FROM wid WHERE nip = '$NIP'")->row_array();
        
        // jika user yang login adalah Admin
        if ($adm) {
            // dan password yang dimasukkan benar
            if (md5($password) == $adm['password']) {
                $data = [
                    'nama' => $adm['nama'],
                    'role_admin' => $adm['role_admin']
                ];
                $this->session->set_userdata($data);
                redirect('coe/admin/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah
                    </div>');
                redirect('coe/Auth/index');
            }
        }
        // jika user yang login adalah Widyaiswara
        elseif ($wi) {
            // dan password yang dimasukkan benar
            if (password_verify($password, $wi['password'])) {
                $data1 = [
                    'nip' => $NIP,
                    'nama' => $wi['nama'],
                    'jeniskelamin' => $wi['jeniskelamin']
                ];
                $this->session->set_userdata($data1);
                redirect('wi/DashboardWI');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah
                    </div>');
                redirect('Auth/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                NIP anda tidak terdaftar
                </div>');
            redirect('auth');
        }
    }

    //to get username and role login from KAB/KOTA website SIMITRA
    public function login_sso ($encryption)
    {
        $this->load->model('register/RegModel');
        
        $parameter = urldecode($encryption);
        $parameter = base64_decode($parameter);

        $parameter = $this->security->xss_clean($parameter);
        
        // Removes special chars
        $parameter = preg_replace('/[^A-Za-z0-9_|\-]/', '', $parameter);

        // explode parameter
        $data_explode = explode("|", $parameter);
        $jenis_user = $data_explode[0];
        $level = $data_explode[1];
        $lokasi = explode('_', $data_explode[2]);
        $lokasi = $lokasi[0]." ".$lokasi[1];
        $username = $data_explode[3];

        //cek apakah user KABKOTA dan levelnya contributor
        if ($jenis_user == "KABKOT" AND $level == "contributor" AND isset($username)) 
        {
            $hasil_cek_username = $this->RegModel->cek_database_simitra($username);

            if ($hasil_cek_username > 0) 
            {
                $first_username = substr($username, 0, 1);

                $data = [
                    'nama' => $lokasi,
                    'kode_username' => "kk",
                    'role_admin' => $level
                ];

                $this->session->set_userdata($data);
                redirect('admin/Dashboard');
            }
            else
            {
                redirect('https://simitra.bpsdmd.jatengprov.go.id/user/LoginUser');
            }
        }
        else
        {
            redirect('https://simitra.bpsdmd.jatengprov.go.id/user/LoginUser');
        }
    }
    
    //function untuk logout SSO
    public function logout_sso()
    {

        if ($this->session->userdata('kode_username') == "kk") 
        {
            $this->session->unset_userdata('lokasi');
            $this->session->unset_userdata('kode_username');
            $this->session->unset_userdata('role_admin');
            $this->session->sess_destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda telah keluar
                </div>');

            redirect('https://simitra.bpsdmd.jatengprov.go.id/user/LoginUser/logout_sso');
        }
        elseif ($this->session->userdata('kode_username') == NULL) 
        {
            redirect('https://simitra.bpsdmd.jatengprov.go.id/user/LoginUser/logout_sso');
        }
    }
    
    public function logout() 
    {
        if ($this->session->userdata('kode_username') == "kk") 
        {
            $this->session->unset_userdata('lokasi');
            $this->session->unset_userdata('kode_username');
            $this->session->unset_userdata('role_admin');
            $this->session->sess_destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda telah keluar
                </div>');

            redirect('http://simitra.bpsdmd.jatengprov.go.id/user/LoginUser/logout');
        }
        else
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->unset_userdata('id_peserta');
            $this->session->sess_destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda telah keluar
                </div>');

            redirect('auth');
        }
    }

}
