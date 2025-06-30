<?php

class RegModel extends CI_Model {

    function construct() {
        parent::__construct();
    }

    public function tampil_diklat($NIP) {
        $db2 = $this->load->database('daftar_online', TRUE);
        return $db2->query("SELECT * FROM data_diklat JOIN data_peserta ON data_diklat.id_diklat = data_peserta.id_diklat WHERE data_peserta.NIP = '$NIP'");
    }

    function get_nama_diklat_byid($id_diklat, $NIP) {
        $db2 = $this->load->database('daftar_online', TRUE);
        $hsl = $db2->query("SELECT * FROM data_peserta JOIN data_diklat ON data_peserta.id_diklat = data_diklat.id_diklat WHERE data_peserta.id_diklat='$id_diklat' AND data_peserta.NIP='$NIP'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_diklat' => $data->nama_diklat,
                    'jabatan' => $data->jabatan,
                    'skpd' => $data->skpd,
                    'jns_diklat' => $data->jns_diklat,
                );
            }
        }
        return $hasil;
    }

    function get_nama_diklat($id_diklat) {
        $db2 = $this->load->database('daftar_online', TRUE);
        $hsl = $db2->query("SELECT * FROM data_diklat WHERE id_diklat='$id_diklat'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_diklat' => $data->nama_diklat,
                    'jns_diklat' => $data->jns_diklat,
                    'tgl_mulai' => $data->tgl_mulai,
                    'tgl_selesai' => $data->tgl_selesai
                );
            }
        } else {
            $hsl = $db2->query("SELECT * FROM data_diklat_c WHERE id_diklat='$id_diklat'");

            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_diklat' => $data->nama_diklat,
                    'jns_diklat' => $data->jns_diklat,
                    'tgl_mulai' => $data->tgl_mulai,
                    'tgl_selesai' => $data->tgl_selesai,
                    'penyelenggara' => $data->lokasi
                );
            }
        }
        return $hasil;
    }

    // get nama diklat berdasarkan jenis diklat
    function get_nama_diklat_byjnsdiklat($jns_diklat) {
        $db2 = $this->load->database('daftar_online', TRUE);
        $year = date("Y");

        switch ($jns_diklat) {
            case 'Pelatihan Kepemimpinan Nasional':
                $jns_diklat = 'pkn';
                break;
            case 'Pelatihan Kepemimpinan Administrator':
                $jns_diklat = 'pka';
                break;
            case 'Pelatihan Kepemimpinan Pengawas':
                $jns_diklat = 'pkp';
                break;
            case 'Pelatihan Kepemimpinan Pemerintahan Daerah':
                $jns_diklat = 'dikpim';
                break;
            case 'Pelatihan Teknis':
                $jns_diklat = 'diknis';
                break;
            case 'Pelatihan Fungsional':
                $jns_diklat = 'dikfung';
                break;
            case 'Diklat Prajabatan':
                $jns_diklat = 'prajab';
                break;
        }

        $db2->select(['id_diklat', 'nama_diklat']);
        $hsl = $db2->get_where('data_diklat', [
            'tahun_anggaran' => date('Y'),
            'jns_diklat' => $jns_diklat
        ]);

        return $hsl;
    }

    function get_nama_coach($id_coach) {
        $db2 = $this->load->database('wi', TRUE);
        $hsl = $db2->query("SELECT * FROM wid WHERE nip='$id_coach'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_coach' => $data->nama,
                );
            }
        }
        return $hasil;
    }

    function get_nama_peserta($id_user) {
        $dbcoe = $this->load->database('default_coe', TRUE);
        $hsl = $dbcoe->query("SELECT * FROM users WHERE id_user='$id_user'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama' => $data->nama,
                );
            }
        }
        return $hasil;
    }

    function get_nama_kelas($id_diklat) {

        $hsl = $this->db->query("SELECT * FROM kelas WHERE id_diklat='$id_diklat'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_diklat' => $data->nama_diklat,
                    'jenis_diklat' => $data->jenis_diklat,
                );
            }
        }
        return $hasil;
    }

    // update data Coach pada tabel user
    function edit_coach($data_coach, $nip_peserta, $id_diklat) {
        return $this->db->update('users', $data_coach, ['NIP' => $nip_peserta, 'id_diklat' => $id_diklat]);
    }

    // update data Proper
    function edit_proper($id_coach, $nama_coach, $nama_diklat, $nip_peserta) {
        $this->db->set('id_coach', $id_coach);
        $this->db->set('nama_coach', $nama_coach);
        $this->db->where('NIP', $nip_peserta);
        $this->db->where('nama_diklat', $nama_diklat);
        $this->db->update('proper'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }

    // update data Aktualisasi
    function edit_aktualisasi($id_coach, $nama_coach, $nama_diklat, $nip_peserta) {
        $this->db->set('id_coach', $id_coach);
        $this->db->set('nama_coach', $nama_coach);
        $this->db->where('nip', $nip_peserta);
        $this->db->where('nama_diklat', $nama_diklat);
        $this->db->update('aktualisasi'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }

    //untuk SSO
    function cek_database_simitra ($username) 
    {
        $db2 = $this->load->database('simitra', TRUE);
        $hsl = $db2->query("SELECT username FROM daftar_user WHERE username = '$username'");
        
        $hasil = $hsl->num_rows();
        
        return $hasil;
    }

    //fungsi untuk mendapatkan jumlah peserta pengguna MCC 
    function get_jumlah_peserta () 
    {
        $dbcoe = $this->load->database('default_coe', TRUE);
        $hsl = $dbcoe->query("SELECT id_user FROM users");
        
        $hasil = $hsl->num_rows();
        
        return $hasil;
    }

}
