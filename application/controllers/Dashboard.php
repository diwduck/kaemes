<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Count_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Modul_model');
        $this->load->model('Warta_model');
        $this->load->model('Log_model'); // Tambahkan Log_model
    }
    
    public function index() {
        // Ambil data jumlah jurnal, modul, warta
        $data['count_jurnal'] = $this->Count_model->count_jurnal();
        $data['count_modul'] = $this->Count_model->count_modul();
        $data['count_warta'] = $this->Count_model->count_warta();

        // Ambil data log
        $this->load->model('Log_model');
        $data['logs'] = $this->Log_model->get_all_logs();

        // Kirim data ke view
        $this->load->view('admin/dashboard', $data);
    }
}
?>