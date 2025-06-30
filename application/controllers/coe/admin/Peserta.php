<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

    public function _construct() {
        parent::_construct();
    }

    public function index() {
        $role_admin = $this->session->userdata('role_admin');
        
        //Harus login sebagai admin atau Supervisi
        if ($role_admin == "1" || $role_admin == "2") {
            $this->load->helper('url');
            //$this->load->model('kelas/KelasModels');

            $data = [
                'user' => $this->session->userdata('user'),
                'nama' => $this->session->userdata('nama'),
                'menu' => "6"
            ];

            // get data peserta yang sudah aktivasi akun
            //$data['listPeserta'] = $this->KelasModels->get_all_peserta_activated();

            $this->load->view('coe/template/admin/header_admin');
            // khusus superadmin
            if ($role_admin == "1") {
                $this->load->view('coe/template/admin/navigasi_kiri', $data);
                $this->load->view('coe/admin/peserta', $data);
            }
            // khusus supervisi
            elseif ($role_admin == "2"){
                $this->load->view('coe/template/admin/navigasi_kiri_supervisi', $data);
                $this->load->view('coe/admin/peserta_supervisi', $data);                
            }            
            $this->load->view('coe/template/admin/footer_admin');
        } else {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    // get data peserta yang sudah aktivasi akun
    function get_data_peserta() {
        $role_admin = $this->session->userdata('role_admin');
        $this->load->model('kelas/KelasModels');

        // storing  request (ie, get/post) global array to a variable
        $requestData = $_REQUEST;

        $columns = array(
            // datatable column index  => database column name
            0 => 'nama',
            1 => 'NIP',
            2 => 'jabatan',
            3 => 'skpd',
            4 => 'pemda',
            5 => 'nama_diklat',
            6 => 'nama_coach'
        );

        // getting total number records without any search
        $totalData = $this->KelasModels->get_data_peserta_activated(
                'count',
                'all',
                null,
                null,
                null,
                null,
                null);
        // when there is no search parameter then total number rows = total number filtered rows.
        $totalFiltered = $totalData;

        // if there is a search parameter
        if (!empty($requestData['search']['value'])) {
            // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query
            $totalFiltered = $this->KelasModels->get_data_peserta_activated(
                    'count',
                    'search',
                    $requestData['search']['value'],
                    null,
                    null,
                    null,
                    null);

            // again run query with limit
            // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
            $query = $this->KelasModels->get_data_peserta_activated(
                    'select',
                    'search',
                    $requestData['search']['value'],
                    $columns[$requestData['order'][0]['column']],
                    $requestData['order'][0]['dir'],
                    $requestData['start'],
                    $requestData['length']);
        }
        // if there is no search parameter
        else {
            $query = $this->KelasModels->get_data_peserta_activated(
                    'select',
                    'all',
                    null,
                    $columns[$requestData['order'][0]['column']],
                    $requestData['order'][0]['dir'],
                    $requestData['start'],
                    $requestData['length']);
        }

        $data = array();
        // preparing an array
        foreach ($query->result() as $row) {
            $nestedData = array();

            $nestedData[] = $row->nama;
            $nestedData[] = $row->NIP;
            $nestedData[] = $row->jabatan;
            $nestedData[] = $row->skpd;
            $nestedData[] = $row->pemda;
            $nestedData[] = $row->nama_diklat;
            $nestedData[] = $row->nama_coach;
            // khusus superadmin
            if ($role_admin == "1") {
                $nestedData[] = '<center>
                         <a href="javascript: void(0)" onclick="return send_detail(\''.$row->nama.'\', \''.$row->NIP.'\', \''.$row->no_telp.'\', \''.$row->gol.'\', \''.$row->pangkat.'\', \''.$row->jabatan.'\', \''.$row->skpd.'\', \''.$row->pemda.'\', \''.$row->email.'\', \''.$row->file_foto.'\', \''.$row->nama_diklat.'\', \''.$row->nama_coach.'\')" data-toggle="modal" data-target="#modal-detail" title="Lihat detail" class="btn btn-xs btn-primary"> <i class="fas fa-eye"></i></a>&nbsp
                         <a href="javascript: void(0)" onclick="return konfirmasi_reset('.$row->id_user.', \''.$row->NIP.'\')"  data-toggle="modal" title="Reset Password" class="btn btn-xs btn-warning"><i class="fas fa-wrench"></i></a>
                         <a href="javascript: void(0)" onclick="return konfirmasi_hapus('.$row->id_user.')"  data-toggle="modal" title="Hapus Data Peserta" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                        </center>';                
            }
            // khusus supervisi
            elseif($role_admin == "2"){
                $nestedData[] = '<center>
                         <a href="javascript: void(0)" onclick="return send_detail(\''.$row->nama.'\', \''.$row->NIP.'\', \''.$row->no_telp.'\', \''.$row->gol.'\', \''.$row->pangkat.'\', \''.$row->jabatan.'\', \''.$row->skpd.'\', \''.$row->pemda.'\', \''.$row->email.'\', \''.$row->file_foto.'\', \''.$row->nama_diklat.'\', \''.$row->nama_coach.'\')" data-toggle="modal" data-target="#modal-detail" title="Lihat detail" class="btn btn-xs btn-primary"> <i class="fas fa-eye"></i></a>
                        </center>';                 
            }
            
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
    }

    // reset Password Peserta dengan default password adalah NIP
    function resetpass(){
        $id_user = $this->uri->segment(4);
        $nip = $this->uri->segment(5);
        $password_enkripsi = password_hash($nip, PASSWORD_DEFAULT);
        
        $this->load->model('kelas/KelasModels');
        $resetpass = $this->KelasModels->resetpass($id_user, $password_enkripsi);
        
        //jika berhasil reset password maka mengembalikan nilai 1 (true)
         echo $resetpass;
    }

}
