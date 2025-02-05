<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageAdmin extends CI_Controller {

    
    public function dashboard()
    {
        $this->load->view('admin/dashboard'); // Memuat view modul.php
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
        redirect('http://coe.bpsdmd.jatengprov.go.id/'); // redirect ke halaman COE (sementara)
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




