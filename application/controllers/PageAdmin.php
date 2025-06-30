<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageAdmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Count_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Modul_model');
        $this->load->model('Warta_model');
        $this->load->model('Log_model'); // Tambahkan Log_model
    }

    
    public function dashboard()
    {
        $data['count_jurnal'] = $this->Count_model->count_jurnal();
        $data['count_modul'] = $this->Count_model->count_modul();
        $data['count_warta'] = $this->Count_model->count_warta();

        // Ambil data log
        $this->load->model('Log_model');
        $data['logs'] = $this->Log_model->get_all_logs();

        // Kirim data ke view
        $this->load->view('admin/dashboard', $data); // Memuat view modul.php
    }

    public function addModul()
    {
        $this->load->model('modul_model');
        $data['modul'] = $this->modul_model->get_all_modul() ?: [];
        $this->load->view('admin/addModul', $data); // Memuat view modul.php
    }

    public function addWarta()
    {   
        $this->load->model('warta_model');
        $data['warta'] = $this->warta_model->get_all_warta() ?: [];
        $this->load->view('admin/addWarta', $data);
    }
    public function addJournal()
    {
        $this->load->model('jurnal_model');
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal() ?: [];
        $this->load->view('admin/addJournal', $data); // Memuat view jurnal.php
    }

    public function addCoe()
    {
        redirect('coe/Auth'); // redirect ke halaman COE (sementara)
        //$this->load->view('admin/addCoe'); // Memuat view Coe.php
    }

    public function pageJournal()
    {
        $this->load->model('jurnal_model');
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal() ?: [];
        $this->load->view('pageJournal', $data); // Memuat view jurnal.php
    }

    public function pageWarta()
    {   
        $this->load->model('warta_model');
        $data['warta'] = $this->warta_model->get_all_warta() ?: [];
        $this->load->view('pageWarta', $data);
    }

    public function pageModul()
    {
        $this->load->model('modul_model');
        $data['modul'] = $this->modul_model->get_all_modul() ?: [];
        $this->load->view('pageModul', $data); // Memuat view modul.php
    }

    public function pageCoe()
    {
        redirect('http://coe.bpsdmd.jatengprov.go.id/'); // redirect ke halaman COE (sementara)
        //$this->load->view('admin/addCoe'); // Memuat view Coe.php
    }

    public function home()
    {
        $this->load->view('home'); // Memuat view jurnal.php
    }

}




