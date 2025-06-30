<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function home()
    {
        $this->load->model('modul_model');
        $this->load->model('jurnal_model');
        $this->load->model('warta_model');
        $data['modul'] = $this->modul_model->get_latest_modul(3) ?: [];
        $data['jurnal'] = $this->jurnal_model->get_latest_jurnal(3) ?: [];
        $data['warta'] = $this->warta_model->get_latest_warta(3) ?: [];
        $this->load->view('home', $data); // Memuat view modul.php
    }

    public function pageModul()
    {
        $this->load->model('modul_model');
        $data['modul'] = $this->modul_model->get_all_modul() ?: [];
        $this->load->view('pageModul', $data);
    }

    public function pageCoe()
    {

        

        redirect('coe/publish');
    }

    public function pageJournal()
    {
        $this->load->model('jurnal_model');
        $data['jurnal'] = $this->jurnal_model->get_all_jurnal() ?: [];
        $data['top4'] = $this->jurnal_model->get_top4_by_views();
        $this->load->view('pageJournal', $data); // Memuat view jurnal.php
    }

    public function pageWarta()
    {   
        $this->load->model('warta_model');
        $data['warta'] = $this->warta_model->get_all_warta() ?: [];
        $data['top4'] = $this->warta_model->get_top4_by_views();
        $this->load->view('pageWarta', $data);
    }
}