<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Count_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Modul_model');
        $this->load->model('Warta_model');
    }
    
    public function index() {
        // Ambil data dari model untuk hitung jumlah
        $data['count_jurnal'] = $this->Count_model->count_jurnal();
        $data['count_modul'] = $this->Count_model->count_modul();
        $data['count_warta'] = $this->Count_model->count_warta();
        
        // Ambil data aksi terbaru dari masing-masing model
        $jurnal_actions = $this->Jurnal_model->get_actions(); // Ambil aksi jurnal
        $modul_actions = $this->Modul_model->get_actions(); // Ambil aksi modul
        $warta_actions = $this->Warta_model->get_actions(); // Ambil aksi warta
        
        // Gabungkan semua aksi dari ketiga repositori
        $all_actions = array_merge($jurnal_actions, $modul_actions, $warta_actions);

        // Urutkan berdasarkan timestamp (terbaru di atas)
        usort($all_actions, function($a, $b) {
            return strtotime($b['timestamp']) - strtotime($a['timestamp']);
        });

        // Ambil hanya 7 aksi terbaru
        $data['recent_actions'] = array_slice($all_actions, 0, 7);

        // Kirim data ke view
        $this->load->view('admin/dashboard', $data);
    }
}
?>
