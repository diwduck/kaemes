<?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Publish extends CI_Controller 
    {

        public function __construct() {
            parent::__construct();
            $this->dbcoe = $this->load->database('default_coe', TRUE);
        }

        //menampilkan halaman direktori inovasi dan RTL

        
        public function index() 
        {
            $this->load->model('coe/direktori/DirektoriModel');

            $data['tahun'] = $this->DirektoriModel->get_tahun_kepemimpinan(); //get tahun proper 2020 keatas
            $data['tahun_proper_lama'] = $this->DirektoriModel->get_tahun_kepemimpinan_lama(); //get tahun proper 2019 kebawah
            $data['tahun'] = array_merge($data['tahun_proper_lama'], $data['tahun']);
          
          	//get tahun aktualisasi latsar
            $data['tahun_latsar'] = $this->DirektoriModel->get_tahun_latsar();
           
            $data['jumlah_file_proper'] = $this->DirektoriModel->get_jumlah_file_proper();
          	$data['jumlah_file_aktualisasi'] = $this->DirektoriModel->get_jumlah_file_aktualisasi();
            $data['grafik_pie_kepemimpinan'] = $this->DirektoriModel->get_data_proper_by_jenis_diklat();
            $data['grafik_bar_penyelenggaraan_kabkota'] = $this->DirektoriModel->get_data_proper_by_penyelenggara_kabkota();
            $data['grafik_bar_asal_asn'] = $this->DirektoriModel->get_data_proper_by_asal_asn();
            
            $data['pka'] = 0;
            $data['pkn'] = 0;
            $data['pkp'] = 0;
            
            //jika hasil dari jujmlah grafik kepemimpinan NULL
            if (empty($data['grafik_pie_kepemimpinan'])) 
            {
                $data['pka'] = 0;
                $data['pkn'] = 0;
                $data['pkp'] = 0;
            }
            else
            {
                //fetch data jumlah file inovasi kepemimpinan
                foreach ($data['grafik_pie_kepemimpinan'] as $item)
                {
                    if ($item['jenis_diklat'] == "Pelatihan Kepemimpinan Administrator") 
                    {
                        $data['pka'] = $item['jumlah'];
                    }
                    elseif ($item['jenis_diklat'] == "Pelatihan Kepemimpinan Nasional") 
                    {
                        $data['pkn'] = $item['jumlah'];
                    }
                    elseif ($item['jenis_diklat'] == "Pelatihan Kepemimpinan Pengawas") 
                    {
                        $data['pkp'] = $item['jumlah'];
                    }
                }
            }

            //jika data penyelenggara kab/kota nya NULL
            if (empty($data['grafik_bar_penyelenggaraan_kabkota'])) 
            {
                $data['pemda'] = "-";
                $data['jumlah_inovasi'] = 0;
            }
            else
            {
                //split data asal kab/kota dengan jumlah inovasinya
                foreach ($data['grafik_bar_penyelenggaraan_kabkota'] as $value) 
                {
                    $data['pemda'][] = $value['penyelenggara'];
                    $data['jumlah_inovasi'][] = $value['jumlah'];
                } 
            }

            $data['pemda_json'] = json_encode($data['pemda']);
            $data['jumlah_inovasi_json'] = json_encode($data['jumlah_inovasi']);

            //jika data asal ASN nya NULL
            if (empty($data['grafik_bar_penyelenggaraan_kabkota'])) 
            {
                $data['asal_pemda_asn'] = "-";
                $data['jumlah_asal_inovasi'] = "0";
            }
            else
            {
                //split data asal ASN dengan jumlah inovasinya
                foreach ($data['grafik_bar_asal_asn'] as $asal_asn) 
                {
                    if ($asal_asn['instansi_pengirim'] == "Pemerintah Kab/Kota Jawa Tengah" OR $asal_asn['instansi_pengirim'] == "Pemerintah Provinsi Jawa Tengah") 
                    {
                        $data['asal_pemda_asn'][] = $asal_asn['pemda'];
                        $data['jumlah_asal_inovasi'][] = $asal_asn['jumlah'];
                    }
                    elseif ($asal_asn['instansi_pengirim'] == "Pemerintah Provinsi/Kementrian/Lembaga Lain")
                    {
                        end($data['asal_pemda_asn']);
                        $key_pemda = key($data['asal_pemda_asn']);
                        $key_pemda = $key_pemda + 1;

                        end($data['jumlah_asal_inovasi']);
                        $key_jumlah = key($data['jumlah_asal_inovasi']);
                        $key_jumlah = $key_jumlah + 1;

                        if ($data['asal_pemda_asn'][$key_pemda-1] == "Provinsi/Kementerian/Lembaga Lain") 
                        {
                            $data['asal_pemda_asn'][$key_pemda-1] = "Provinsi/Kementerian/Lembaga Lain";
                            $data['jumlah_asal_inovasi'][$key_jumlah-1] = $data['jumlah_asal_inovasi'][$key_jumlah-1] + $asal_asn['jumlah'];
                        }
                        else
                        {
                            $data['asal_pemda_asn'][$key_pemda] = "Provinsi/Kementerian/Lembaga Lain";
                            $data['jumlah_asal_inovasi'][$key_jumlah] = $asal_asn['jumlah'];
                        }
                    }
                }
            }

            $data['pemda_asn_json'] = json_encode($data['asal_pemda_asn']);
            $data['jumlah_asal_inovasi_json'] = json_encode($data['jumlah_asal_inovasi']);
            
            //$this->load->view('coe/template/peserta/header_user');
            //$this->load->view('coe/template/direktori_inovasi_rtl', $data);
            //$this->load->view('coe/template/peserta/footer_direktori', $data);
            $this->load->view('pageCoe', $data);
        }

        //Fungsi untuk onchange tahun, affect on nama diklat dropdown
        public function onchange_tahun()
        {
            $this->load->model('coe/direktori/DirektoriModel');

            header('Content-Type: application/json');

            $jenis_diklat = $this->input->post('jenis_diklat');
            $tahun = $this->input->post('tahun');

            $jenis_diklat = $this->security->xss_clean($jenis_diklat);
            $tahun = $this->security->xss_clean($tahun);

            // Removes special chars
            $jenis_diklat = preg_replace('/[^A-Za-z0-9\-]/', '', $jenis_diklat);
            $tahun = preg_replace('/[^0-9\-]/', '', $tahun);

            // Replaces multiple hyphens with single one.
            $jenis_diklat = preg_replace('/-+/', '-', $jenis_diklat);
            $tahun = preg_replace('/-+/', '-', $tahun);

            $respObject = [];
            if (!empty($tahun)) 
            {
                if (intval($tahun) <= 2019)
                {
                    $daftarNamaDiklat = $this->DirektoriModel->get_nama_diklat_lama($jenis_diklat, $tahun);

                    //fetch data
                    foreach ($daftarNamaDiklat as $key => $rowNamaDiklat) 
                    {
                        $respObject[] = ['id' => $rowNamaDiklat['id'], 'name' => $rowNamaDiklat['namadiklat']]; //ganti sesuai nama field tabel
                    }
                }
                else
                {
                    $daftarNamaDiklat = $this->DirektoriModel->get_nama_diklat($jenis_diklat, $tahun);

                    //fetch data
                    foreach ($daftarNamaDiklat as $key => $rowNamaDiklat) 
                    {
                        $respObject[] = ['id' => $rowNamaDiklat['id_diklat'], 'name' => $rowNamaDiklat['nama_diklat']]; //ganti sesuai nama field tabel
                    }
                }

                
            }

            echo json_encode(array(
                'status' => 'ok',
                'nama_diklat' => $respObject
            ));
        }

        //fungsi untuk mengambil data proper berdasarkan tahun dan nama diklat
        public function get_data_proper_by_tahun_nama()
        {
            $this->load->model('coe/direktori/DirektoriModel');

            header('Content-Type: application/json');

            $tahun = $this->input->post('tahun');
            $id_diklat = $this->input->post('id_diklat');

            $id_diklat = $this->security->xss_clean($id_diklat);
            $tahun = $this->security->xss_clean($tahun);

            // Removes special chars
            $id_diklat = preg_replace('/[^0-9\-]/', '', $id_diklat);
            $tahun = preg_replace('/[^0-9\-]/', '', $tahun);

            // Replaces multiple hyphens with single one.
            $id_diklat = preg_replace('/-+/', '-', $id_diklat);
            $tahun = preg_replace('/-+/', '-', $tahun);

            $respObject = [];
            if (!empty($tahun)) 
            {
                if (intval($tahun) <= 2019) //fetch data from tabel eproper old
                {
                    //get data proper lama
                    if ($id_diklat != "0") 
                    {
                        $nama_diklat = $this->DirektoriModel->get_namadiklat_lama_by_id($id_diklat)->row();
                        $nama_diklat = $nama_diklat->namadiklat;
    
                        $daftarProper = $this->DirektoriModel->get_data_properlama_by_tahunnama($nama_diklat, $tahun);
                    }
                    else
                    {
                        $nama_diklat = "0";
                        $daftarProper = $this->DirektoriModel->get_data_properlama_by_tahunnama($nama_diklat, $tahun);
                    }
                    $counter = 0;

                    foreach ($daftarProper as $key => $rowDataProper) 
                    {   
                        $counter = $counter + 1;
                        //$id_renja = "'".$rowDataProper['id_renja']."'";
                        $link = '<a href="'.site_url('coe/Publish/detail_proper_old/'.$rowDataProper['id_proper']).'">'.
                                    $rowDataProper['judul'].'</a>';
    
                        $respObject[] = [
                                            'no' => $counter,
                                            'id' => $rowDataProper['id_proper'],
                                            'judul' => $link,
                                            'nip' => $rowDataProper['NIP'],
                                            'nama' => $rowDataProper['nama'],
                                            'jabatan' => $rowDataProper['jabatan'],
                                            'opd' => $rowDataProper['opd'],
                                            'link' => "-",
                                            'nama_coach' => "-"
                                        ];
                    }
                }
                else
                {
                    $daftarProper = $this->DirektoriModel->get_data_proper_by_tahunnama($id_diklat, $tahun);
                    $output_string = '';
                    $counter = 0;
                    foreach ($daftarProper as $key => $rowDataProper) 
                    {   
                        $counter = $counter + 1;
                        //$id_renja = "'".$rowDataProper['id_renja']."'";
                        $link = '<a href="'.site_url('coe/Publish/detail_proper/'.$rowDataProper['id_proper']).'">'.
                                    $rowDataProper['judul'].'</a>';
    
                        $respObject[] = [
                                            'no' => $counter,
                                            'id' => $rowDataProper['id_proper'],
                                            'judul' => $link,
                                            'nip' => $rowDataProper['NIP'],
                                            'nama' => $rowDataProper['nama'],
                                            'jabatan' => $rowDataProper['jabatan'],
                                            'opd' => $rowDataProper['opd'],
                                            'link' => $rowDataProper['file_proper'],
                                            'nama_coach' => $rowDataProper['nama_coach']
                                        ];
                    }
                }
            }

            echo json_encode(array(
                'status' => 'ok',
                'tahun' => $tahun,
                'data_proper' => $respObject
             ));
        }

        //function untuk menampilkan halaman detail dokumen proper
        public function detail_proper ($id_proper)
        {
            $this->load->model('coe/direktori/DirektoriModel');

            // Removes special chars
            $id_proper = $this->security->xss_clean($id_proper);
            $id_proper = preg_replace('/[^0-9\-]/', '', $id_proper);
            $id_proper = preg_replace('/-+/', '-', $id_proper);
			
          	$data['jenis_diklat'] = "kepemimpinan";
            $data['detail_proper'] = $this->DirektoriModel->get_data_proper_by_idproper($id_proper);
            //$data['jumlah_file_proper'] = $this->DirektoriModel->get_jumlah_file_proper();

            //$this->load->view('coe/template/peserta/header_user');
            //$this->load->view('coe/template/detail_inovasi_rtl', $data);
            //$this->load->view('coe/template/peserta/footer_direktori', );
            $this->load->view('detailPageCoe2', $data);
        }


        //function untuk menampilkan halaman detail dokumen proper versi lama dari tabel bpsdmdja_eproper
        public function detail_proper_old ($id_proper)
        {
            $this->load->model('coe/direktori/DirektoriModel');

            // Removes special chars
            $id_proper = $this->security->xss_clean($id_proper);
            $id_proper = preg_replace('/[^0-9\-]/', '', $id_proper);
            $id_proper = preg_replace('/-+/', '-', $id_proper);
			
          	$data['jenis_diklat'] = "kepemimpinan";
            $data['detail_proper'] = $this->DirektoriModel->get_data_proper_lama_by_idproper($id_proper);
            //$data['jumlah_file_proper'] = $this->DirektoriModel->get_jumlah_file_proper();

            $this->load->view('coe/template/peserta/header_user');
            $this->load->view('coe/template/detail_inovasi_rtl_old', $data);
            $this->load->view('coe/template/peserta/footer_direktori');
        }
      
      	//fungsi untuk mengambil data aktualisasi berdasarkan tahun dan nama diklat
        public function get_data_aktualisasi_by_tahun_nama()
        {
            $this->load->model('coe/direktori/DirektoriModel');

            header('Content-Type: application/json');

            $tahun = $this->input->post('tahun');
            $id_diklat = $this->input->post('id_diklat');

            $id_diklat = $this->security->xss_clean($id_diklat);
            $tahun = $this->security->xss_clean($tahun);

            // Removes special chars
            $id_diklat = preg_replace('/[^0-9\-]/', '', $id_diklat);
            $tahun = preg_replace('/[^0-9\-]/', '', $tahun);

            // Replaces multiple hyphens with single one.
            $id_diklat = preg_replace('/-+/', '-', $id_diklat);
            $tahun = preg_replace('/-+/', '-', $tahun);

            $respObject = [];
            if (!empty($tahun)) 
            {
                $daftarAktualisasi = $this->DirektoriModel->get_data_aktualisasi_by_tahunnama($id_diklat, $tahun);
                $output_string = '';
                $counter = 0;
                foreach ($daftarAktualisasi as $key => $rowDataAktualisasi) 
                {   
                    $counter = $counter + 1;
                    //$id_renja = "'".$rowDataAktualisasi['id_renja']."'";
                    $link = '<a href="'.site_url('coe/Publish/detail_aktualisasi/'.$rowDataAktualisasi['id_aktualisasi']).'">'.
                                $rowDataAktualisasi['judul'].'</a>';

                    $respObject[] = [
                                        'no' => $counter,
                                        'id' => $rowDataAktualisasi['id_aktualisasi'],
                                        'judul' => $link,
                                        'nip' => $rowDataAktualisasi['NIP'],
                                        'nama' => $rowDataAktualisasi['nama'],
                                        'jabatan' => $rowDataAktualisasi['jabatan'],
                                        'opd' => $rowDataAktualisasi['opd'],
                                        'link' => $rowDataAktualisasi['upload_file_la'],
                                        'nama_coach' => $rowDataAktualisasi['nama_coach']
                                    ];
                }
            }

            echo json_encode(array(
                'status' => 'ok',
                'tahun' => $tahun,
                'data_aktualisasi' => $respObject
             ));
        }
      
      	//function untuk menampilkan halaman detail dokumen aktualisasi
         public function detail_aktualisasi ($id_aktualisasi)
         {
             $this->load->model('coe/direktori/DirektoriModel');;
 
             // Removes special chars
             $id_aktualisasi = $this->security->xss_clean($id_aktualisasi);
             $id_aktualisasi = preg_replace('/[^0-9\-]/', '', $id_aktualisasi);
             $id_aktualisasi = preg_replace('/-+/', '-', $id_aktualisasi);
 			 
           	 $data['jenis_diklat'] = "latsar";
             $data['detail_proper'] = $this->DirektoriModel->get_data_aktualisasi_by_idaktualisasi($id_aktualisasi);
             //$data['jumlah_file_aktualisasi'] = $this->DirektoriModel->get_jumlah_file_aktualisasi();
           	 
             $this->load->view('coe/template/peserta/header_user');
             $this->load->view('coe/template/detail_inovasi_rtl', $data);
             $this->load->view('coe/template/peserta/footer_direktori');
         }

         public function download_inovasi()
{
    $this->load->model('coe/direktori/DirektoriModel');
    $email = $this->input->post('email');
    $inovasi_id = $this->input->post('inovasi_id');

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        show_error('Email tidak valid');
        return;
    }

    // Cek jurnal


    $inovasi = $this->DirektoriModel->get_data_proper_by_idproper($inovasi_id);
    if (!$inovasi) {
        show_404();
        return;
    }

    // Tambah view
    $this->dbcoe->set('views', 'views + 1', FALSE);
    $this->dbcoe->where('id_proper', $inovasi_id);
    $this->dbcoe->update('proper');

    // Simpan log download
    $this->dbcoe->insert('jurnal_download_log', [
    'inovasi_id' => $inovasi_id,
    'email' => $email,
]);


    echo 'success';
}

    }