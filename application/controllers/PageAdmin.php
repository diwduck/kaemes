<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageAdmin extends CI_Controller {
    public function dashboard()
    {
        $this->load->view('admin/dashboard'); // Memuat view modul.php
    }

    public function addModul()
    {
        $this->load->view('admin/addModul'); // Memuat view modul.php
    }

    public function addWarta()
    {
        $this->load->view('admin/addWarta'); // Memuat view modul.php
    }

    public function addJournal()
    {
        $this->load->view('admin/addJournal'); // Memuat view modul.php
    }

    public function addCoe()
    {
        $this->load->view('admin/addCoe'); // Memuat view modul.php
    }

}