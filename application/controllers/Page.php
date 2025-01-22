<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function home()
    {
        $this->load->view('home'); // Memuat view modul.php
    }

    public function pageModul()
    {
        $this->load->view('pageModul'); // Memuat view modul.php
    }

    public function pageCoe()
    {
        $this->load->view('pageCoe'); // Memuat view about.php
    }

    public function pageJournal()
    {
        $this->load->view('pageJournal'); // Memuat view about.php
    }

    public function pageWarta()
    {
        $this->load->view('pageWarta'); // Memuat view about.php
    }
}