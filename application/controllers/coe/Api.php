<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function index() {
        $this->load->view('api/form');
    }
    
    public function get_direktori(){
        $kabkota = $this->input->post('kabkota');
        
        redirect(base_url('index.php/api/direktori/'.$kabkota));
    }
    
    public function get_inovasi(){
        $id = $this->input->post('id_proper');
        
        redirect(base_url('index.php/api/inovasi/'.$id));
    }

    // tampilkan daftar inovasi berdasarkan Kabupaten/Kota yang dipanggil melalui
    // parameter di URL menggunakan kode daerah    
    public function direktori() {
        $this->load->model('direktori/DirektoriModel');

        $kode_kabkota = $this->uri->segment(3);
        $hasil = [];

        // kode daerah
        switch ($kode_kabkota) {
            case 'kk3301': $nama_kabkota = 'Kabupaten Cilacap';
                break;
            case 'kk3302': $nama_kabkota = 'Kabupaten Banyumas';
                break;
            case 'kk3303': $nama_kabkota = 'Kabupaten Purbalingga';
                break;
            case 'kk3304': $nama_kabkota = 'Kabupaten Banjarnegara';
                break;
            case 'kk3305': $nama_kabkota = 'Kabupaten Kebumen';
                break;
            case 'kk3306': $nama_kabkota = 'Kabupaten Purworejo';
                break;
            case 'kk3307': $nama_kabkota = 'Kabupaten Wonosobo';
                break;
            case 'kk3308': $nama_kabkota = 'Kabupaten Magelang';
                break;
            case 'kk3309': $nama_kabkota = 'Kabupaten Boyolali';
                break;
            case 'kk3310': $nama_kabkota = 'Kabupaten Klaten';
                break;
            case 'kk3311': $nama_kabkota = 'Kabupaten Sukoharjo';
                break;
            case 'kk3312': $nama_kabkota = 'Kabupaten Wonogiri';
                break;
            case 'kk3313': $nama_kabkota = 'Kabupaten Karanganyar';
                break;
            case 'kk3314': $nama_kabkota = 'Kabupaten Sragen';
                break;
            case 'kk3315': $nama_kabkota = 'Kabupaten Grobogan';
                break;
            case 'kk3316': $nama_kabkota = 'Kabupaten Blora';
                break;
            case 'kk3317': $nama_kabkota = 'Kabupaten Rembang';
                break;
            case 'kk3318': $nama_kabkota = 'Kabupaten Pati';
                break;
            case 'kk3319': $nama_kabkota = 'Kabupaten Kudus';
                break;
            case 'kk3320': $nama_kabkota = 'Kabupaten Jepara';
                break;
            case 'kk3321': $nama_kabkota = 'Kabupaten Demak';
                break;
            case 'kk3322': $nama_kabkota = 'Kabupaten Semarang';
                break;
            case 'kk3323': $nama_kabkota = 'Kabupaten Temanggung';
                break;
            case 'kk3324': $nama_kabkota = 'Kabupaten Kendal';
                break;
            case 'kk3325': $nama_kabkota = 'Kabupaten Batang';
                break;
            case 'kk3326': $nama_kabkota = 'Kabupaten Pekalongan';
                break;
            case 'kk3327': $nama_kabkota = 'Kabupaten Pemalang';
                break;
            case 'kk3328': $nama_kabkota = 'Kabupaten Tegal';
                break;
            case 'kk3329': $nama_kabkota = 'Kabupaten Brebes';
                break;
            case 'kk3371': $nama_kabkota = 'Kota Magelang';
                break;
            case 'kk3372': $nama_kabkota = 'Kota Surakarta';
                break;
            case 'kk3373': $nama_kabkota = 'Kota Salatiga';
                break;
            case 'kk3374': $nama_kabkota = 'Kota Semarang';
                break;
            case 'kk3375': $nama_kabkota = 'Kota Pekalongan';
                break;
            case 'kk3376': $nama_kabkota = 'Kota Tegal';
                break;
            default: $nama_kabkota = '?';
                break;
        }
        $daftar_inovasi = $this->DirektoriModel->get_data_proper_by_kabkota($nama_kabkota)->result();

        foreach ($daftar_inovasi as $data) {
            $d = array();
            
            // Replace the newline and carriage return characters
            // using str_replace.
            // https://thisinterestsme.com/php-remove-newlines/
            $judul__ = str_replace(array("\n", "\r"), '', $data->judul);
            
            // Khusus judul convert tag HTML menjadi string 
            // (dalam bentuk entitas HTML)
            $judul_ = htmlspecialchars($judul__);
            $judul = htmlentities($judul_);            

            $d['nama'] = $data->nama;
            $d['nip'] = $data->NIP;
            $d['jabatan'] = $data->jabatan;
            $d['skpd'] = $data->skpd;
            $d['pemda'] = $data->pemda;
            $d['nama_pelatihan'] = $data->nama_diklat;
            $d['tahun'] = $data->tahun;            
            $d['id_proper'] = $data->id_proper;
            $d['judul'] = $judul;
            $d['upload_laporan'] = $data->upload;
            $d['status_laporan'] = $data->status_file_la;

            array_push($hasil, $d);
        }

        $output = json_encode($hasil, JSON_PRETTY_PRINT);

        echo $output;        
    }

    // tampilkan detail inovasi dimana peserta sudah mengupload laporan akhir
    // dan statusnya sudah di-acc oleh coach
    public function inovasi() {
        $this->load->model('direktori/DirektoriModel');

        $id_inovasi = $this->uri->segment(3);

        $detail = $this->DirektoriModel->get_data_proper_by_idproper($id_inovasi);

        // jika tidak ada data
        if (count($detail) == 0) {
            exit();
        }

        // Khusus abstrak convert tag HTML menjadi string 
        // (dalam bentuk entitas HTML)
        $abstrak_ = htmlspecialchars($detail[0]['abstraksi']);
        $abstrak = htmlentities($abstrak_);
        //echo $abstrak; exit();

        $hasil = array(
            'id_proper' => $detail[0]['id_proper'],
            'nama_pelatihan' => $detail[0]['nama_pelatihan'],
            'nama' => $detail[0]['nama'],
            'email' => $detail[0]['email'],
            'nip' => $detail[0]['NIP'],
            'jabatan' => $detail[0]['jabatan'],
            'opd' => $detail[0]['opd'],
            'pemda' => $detail[0]['pemda'],
            'judul_inovasi' => $detail[0]['judul'],
            'nama_coach' => $detail[0]['nama_coach'],
            'abstrak' => $abstrak,
            'file_inovasi' => 'https://coe.bpsdmd.jatengprov.go.id/assets/inovasi/la/' . $detail[0]['file_proper']
        );
        echo json_encode($hasil, JSON_PRETTY_PRINT);
    }

}
