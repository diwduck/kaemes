<?php

class KelasModels extends CI_Model {

    protected $dbcoe;
    function __construct() {
        parent::__construct();
        $this->dbcoe = $this->load->database('default_coe', TRUE);
    }

    //get all data nama diklat provinsi
    public function tampil_kelas() {
        // panggil database daftar online
        $db2 = $this->load->database('daftar_online', TRUE);
        $year = date("Y");

        // tampilkan data diklat tahun sekarang
//        $db2->order_by('tgl_mulai', 'ASC');
//        return $db2->get_where('data_diklat', array('tahun_anggaran' => $year))->result();
        $diklat_bpsdmd_dan_kabkota = $db2->query("SELECT id_diklat, jns_diklat, nama_diklat, tgl_mulai, tgl_selesai FROM data_diklat WHERE tahun_anggaran = '" . $year . "' "
                . "UNION SELECT id_diklat, jns_diklat, nama_diklat, tgl_mulai, tgl_selesai FROM data_diklat_c WHERE tahun_anggaran = '" . $year . "' "
                . "ORDER BY tgl_mulai ASC");
        return $diklat_bpsdmd_dan_kabkota->result();
    }

    //get all data nama diklat kab/kota
    public function tampil_kelas_kabkota() {
        // panggil database daftar online
        $db2 = $this->load->database('daftar_online', TRUE);
        $year = date("Y");

        // tampilkan data diklat yang diselenggarakan Kab/Kota tahun sekarang
        $db2->order_by('tgl_mulai', 'ASC');
        return $db2->get_where('data_diklat_c', array('tahun_anggaran' => $year))->result();
    }

    // tampilkan Wi dari BPSDMD saja
    public function tampil_wi() 
    {
        $db2 = $this->load->database('wi', TRUE);
        //$db2->like('jabatan', 'Widyaiswara', 'after');
        $this->dbcoe->order_by('nama ASC');

        return $db2->get('wid')->result();
    }

    // get data WI yang mengajar berdasarkan nama diklat dari database PAKWI
    public function get_wi_by_namadiklat ($nama_diklat) 
    {
        $db2 = $this->load->database('wi', TRUE);
        $query = $db2->query("SELECT * FROM wid JOIN jadwal_alt ON wid.nip = jadwal_alt.nip WHERE namadiklat = '$nama_diklat' AND YEAR(jadwal_alt.startdate) = YEAR(CURDATE()) GROUP BY jadwal_alt.nip");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) 
        {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // tampilkan Wi berdasarkan NIP
    public function tampil_wi_personal($nip) {
        $db2 = $this->load->database('wi', TRUE);
        return $db2->get_where('wid', array('nip' => $nip))->result();
    }

    public function tampil_kelas_dimateri() {

        $query = $this->dbcoe->query("SELECT * FROM kelas WHERE tgl_selesai >= NOW()");

        return $query;
    }

    // get data pelatihan yang sudah dibuka oleh Admin dan masih berlangsung
    public function tampil_kelas_berlangsung($id_diklatdiikuti) {
            
        $query = $this->dbcoe->query("SELECT * FROM kelas WHERE id_diklat='$id_diklatdiikuti' AND tgl_selesai >= NOW()");

        return $query;
    }

    public function tampil_diklat_wi($id_coach) {

        $query = $this->dbcoe->query("SELECT DISTINCT kelas.id_diklat,kelas.nama_diklat FROM users JOIN kelas ON users.id_diklat = kelas.id_diklat WHERE users.id_coach='$id_coach' AND tgl_selesai >= NOW()");

        return $query;
    }

    public function tampil_peserta_wi($id_coach, $id_diklat) {

        $query = $this->dbcoe->query("SELECT * FROM users WHERE id_coach='$id_coach' AND id_diklat='$id_diklat'");
        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_data_masterdiklat() {
        $query = $this->dbcoe->query("SELECT * FROM kelas ORDER BY id_kelas DESC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    //get data master diklat oleh KAB/KOTA
    function get_data_masterdiklat_kabkota($penyelenggara) 
    {
        $query = $this->dbcoe->query("SELECT * FROM kelas WHERE penyelenggara = '$penyelenggara' ORDER BY id_kelas ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_jumlah_masterdiklat() {
        $query = $this->dbcoe->query("SELECT * FROM kelas");

        $result = $query->row_array();
        $count = $query->num_rows();

        return $count;
    }

    function get_data_materi($id_diklat) {
        $query = $this->dbcoe->query("SELECT * FROM materi WHERE id_diklat='$id_diklat' ORDER BY id_materi ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data peserta berdasarkan pelatihan dan coachnya
    function get_data_peserta($id_coach, $id_diklat) {
        $query = $this->dbcoe->query("SELECT * FROM users WHERE id_coach='$id_coach' AND id_diklat='$id_diklat' ORDER BY nama ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data peserta yang sudah aktivasi akun
    function get_data_peserta_activated($type, $selection, $datasearch, $ordercolumn, $orderdirection, $startrow, $length) {
        // jika fungsi yang dipanggil adalah untuk menghitung jumlah data
        if ($type == 'count') {
            // jika data yang akan dihitung adalah semua data
            if ($selection == 'all') {
                $sql = "SELECT nama, NIP, jabatan, skpd, pemda, nama_diklat, nama_coach FROM users";
            }
            // jika data yang akan dihitung adalah berdasarkan kata kunci
            elseif ($selection == 'search') {
                $sql = "SELECT nama, NIP, jabatan, skpd, pemda, nama_diklat, nama_coach FROM users ";
                $sql .= " WHERE nama LIKE '%" . $datasearch . "%' ";    // $datasearch contains search parameter
                $sql .= " OR NIP LIKE '%" . $datasearch . "%' ";
                $sql .= " OR jabatan LIKE '%" . $datasearch . "%' ";
                $sql .= " OR skpd LIKE '%" . $datasearch . "%' ";
                $sql .= " OR pemda LIKE '%" . $datasearch . "%' ";
                $sql .= " OR nama_diklat LIKE '%" . $datasearch . "%' ";
                $sql .= " OR nama_coach LIKE '%" . $datasearch . "%' ";
            }
            $query = $this->dbcoe->query($sql)->num_rows();
        }

        // jika fungsi yang dipanggil adalah untuk menampilkan data
        elseif ($type == 'select') {
            // jika data yang akan ditampilkan adalah semua data dengan limit tertentu
            if ($selection == 'all') {
                $sql = "SELECT id_user, nama, NIP, no_telp, gol, pangkat, jabatan, skpd, pemda, email, file_foto, nama_diklat, nama_coach FROM users";
                $sql .= " ORDER BY " . $ordercolumn . "   " . $orderdirection . "   LIMIT " . $startrow . " ," . $length . "   ";
            }
            // jika data yang akan ditampilkan adalah data berdasarkan kata kunci dengan limit tertentu
            elseif ($selection == 'search') {
                $sql = "SELECT id_user, nama, NIP, no_telp, gol, pangkat, jabatan, skpd, pemda, email, file_foto, nama_diklat, nama_coach FROM users";
                $sql .= " WHERE nama LIKE '%" . $datasearch . "%' ";    // $datasearch contains search parameter
                $sql .= " OR NIP LIKE '%" . $datasearch . "%' ";
                $sql .= " OR jabatan LIKE '%" . $datasearch . "%' ";
                $sql .= " OR skpd LIKE '%" . $datasearch . "%' ";
                $sql .= " OR pemda LIKE '%" . $datasearch . "%' ";
                $sql .= " OR nama_diklat LIKE '%" . $datasearch . "%' ";
                $sql .= " OR nama_coach LIKE '%" . $datasearch . "%' ";
                $sql .= " ORDER BY " . $ordercolumn . "   " . $orderdirection . "   LIMIT " . $startrow . " ," . $length . "   ";
            }
            $query = $this->dbcoe->query($sql);
        }

        return $query;
    }

    // get data kelas berdasarkan id_diklat
    function nama_diklat($id_diklat) {
        $query = $this->dbcoe->query("SELECT * FROM kelas WHERE id_diklat='$id_diklat'");

        return $query;
    }

    function get_jumlah_materi($id_diklat) {
        $query = $this->dbcoe->query("SELECT * FROM materi WHERE id_diklat='$id_diklat'");

        $result = $query->row_array();
        $count = $query->num_rows();

        return $count;
    }

    function delete_diklat($id_kelas) {
        $this->dbcoe->delete('kelas', ['id_kelas' => $id_kelas]);
    }

    function delete_materi($id_materi) {
        $this->dbcoe->where('id_materi', $id_materi);
        $result = $this->dbcoe->delete('materi');
        return $result;
    }

    //get data disposisi by id_masuk
    function select_kelas_byId($id_kelas) {
        $this->dbcoe->select('*');
        $this->dbcoe->from('kelas');
        $this->dbcoe->where('id_kelas', $id_kelas);

        return $this->dbcoe->get();
    }

    function select_materi_byId($id_materi) {
        $this->dbcoe->select('*');
        $this->dbcoe->from('materi');
        $this->dbcoe->where('id_materi', $id_materi);

        return $this->dbcoe->get();
    }

    function select_materi($id_materi) {
        $this->dbcoe->select('*');
        $this->dbcoe->from('materi');
        $this->dbcoe->where('id_materi', $id_materi);

        return $this->dbcoe->get();
    }

    // get data diklat terakhir yang diikuti oleh peserta dari database daftar online 
    public function get_id_diklat($NIP) {
        $db2 = $this->load->database('daftar_online', TRUE);

        $query = $db2->query("SELECT * FROM data_peserta WHERE NIP='$NIP' ORDER BY id_diklat DESC LIMIT 1");

        //jika $query bernilai NULL, cek table data_peserta_c
        if ($query->num_rows() == 0) {
            $query = $db2->query("SELECT * FROM data_peserta_c WHERE NIP='$NIP' ORDER BY id_diklat DESC LIMIT 1");
        }
        //var_dump($query->num_rows());
        //exit();        

        return $query;
    }

    function resetpass($id_user, $password_enkripsi) {
        $this->dbcoe->set('password', $password_enkripsi);
        $this->dbcoe->where('id_user', $id_user);
        $update = $this->dbcoe->update('users');

        return $update;
    }

    // get data peserta berdasarkan id pelatihan dan jenis pelatihan
    function get_data_peserta_by_idpelatihan($id_diklat, $jenis_diklat) {
        //statement if
        if ($jenis_diklat == "Pelatihan Kepemimpinan Pengawas" OR $jenis_diklat == "Pelatihan Kepemimpinan Administrator" OR $jenis_diklat == "Pelatihan Kepemimpinan Nasional") {
            $query = $this->db->query("SELECT proper.id_diklat, users.id_user, users.nama, users.NIP, proper.id_coach, proper.nama_coach, proper.timestamp, proper.file_proper, proper.file_ra, proper.id_proper FROM proper JOIN users ON proper.NIP = users.NIP WHERE proper.id_diklat = '" . $id_diklat . "' ORDER BY users.nama ASC");
        } elseif ($jenis_diklat == "Diklat Prajabatan") {
            $query = $this->db->query("SELECT aktualisasi.id_diklat, users.nama, users.NIP, aktualisasi.id_coach, aktualisasi.nama_coach, aktualisasi.timestamp, aktualisasi.upload_file_ra, aktualisasi.upload_file_la, aktualisasi.id_aktualisasi FROM aktualisasi JOIN users ON aktualisasi.nip = users.NIP WHERE aktualisasi.id_diklat = '" . $id_diklat . "' ORDER BY users.nama ASC");
        }


        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data peserta berdasarkan id pelatihan dan NIP 
    function get_data_peserta_by_idpelatihan_and_nip($id_diklat, $nip, $jenis_diklat) {
        //statement if
        if ($jenis_diklat == "Pelatihan Kepemimpinan Pengawas" OR $jenis_diklat == "Pelatihan Kepemimpinan Administrator" OR $jenis_diklat == "Pelatihan Kepemimpinan Nasional") {
            $query = $this->dbcoe->query("SELECT * FROM proper JOIN users ON users.NIP = proper.NIP WHERE proper.id_diklat = '$id_diklat' AND users.NIP = '$nip'");
        } elseif ($jenis_diklat == "Diklat Prajabatan") {
            $query = $this->dbcoe->query("SELECT users.nip, users.nama, users.file_foto, users.no_telp, users.email, users.pangkat, users.jabatan, users.skpd, users.pemda, aktualisasi.id_aktualisasi, aktualisasi.nama_diklat, aktualisasi.id_diklat, aktualisasi.nama_coach, aktualisasi.judul, aktualisasi.tgl_pengajuan_judul, aktualisasi.tgl_validasi_judul_isu, aktualisasi.status_judul_identifikasi, aktualisasi.alasan_status_judul_identifikasi, aktualisasi.tgl_pengajuan_gagasan, aktualisasi.tgl_validasi_gagasan, aktualisasi.status_gagasan, aktualisasi.alasan_status_gagasan, aktualisasi.upload_file_ra, aktualisasi.tgl_pengajuan_ra, aktualisasi.tgl_validasi_ra, aktualisasi.status_ra, aktualisasi.alasan_ra, aktualisasi.upload_file_la, aktualisasi.tgl_pengajuan_la, aktualisasi.tgl_validasi_la, aktualisasi.status_la, aktualisasi.alasan_status_la, aktualisasi.link_video FROM aktualisasi JOIN users ON users.NIP = aktualisasi.NIP WHERE aktualisasi.id_diklat = '$id_diklat' AND users.NIP = '$nip'");
        }

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data file proper by id proper
    function get_data_proper_by_idproper($id_proper) {
        $this->dbcoe->select('*');
        $this->dbcoe->from('proper');
        $this->dbcoe->where('id_proper', $id_proper);

        return $this->dbcoe->get();
    }

    // get data file proper by id proper
    function get_data_aktualisasi_by_idaktualisasi($id_aktualisasi) {
        $query = $this->dbcoe->query("SELECT * FROM aktualisasi WHERE id_aktualisasi = '$id_aktualisasi'");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // hapus data proper peserta
    function delete_dataproper_peserta($id_proper) {
        $this->dbcoe->where('id_proper', $id_proper);
        $this->dbcoe->delete('proper');
    }

    // hapus data peserta dari tabel user
    function delete_data_peserta_dari_user($id_peserta) {
        $this->dbcoe->where('id_user', $id_peserta);
        $this->dbcoe->delete('users');
    }

    // hapus peserta dari diklat yang diikuti
    function delete_peserta_from_pelatihan($id_peserta) {
        $this->dbcoe->set('id_diklat', 'null', false);
        $this->dbcoe->set('nama_diklat', 'null', false);
        $this->dbcoe->set('jenis_diklat', '-');
        $this->dbcoe->set('id_coach', 'null', false);
        $this->dbcoe->set('nama_coach', 'null', false);
        $this->dbcoe->where('id_user', $id_peserta);
        $update = $this->dbcoe->update('users');

        return $update;
    }

    //Menghapus data pada tabel history_proper berdasarkan nip dan topik
    function delete_history_proper($nip, $topik) {
        $this->dbcoe->where('NIP', $nip);
        $this->dbcoe->where('topik', $topik);
        $this->dbcoe->order_by('timestamp', "desc");
        $this->dbcoe->limit(1);
        $this->dbcoe->delete('history_proper');
    }

    //Menghapus data peserta latsar tabel (Aktualisasi)
    function delete_peserta_pelatihan_latsar_aktualisasi($id_aktualisasi) {
        $this->dbcoe->where('id_aktualisasi', $id_aktualisasi);
        $this->dbcoe->delete('aktualisasi');
    }

    //Menghapus data peserta latsar tabel (gagasan_penyelesaian)
    function delete_peserta_pelatihan_latsar_gagasan($id_aktualisasi) {
        $this->dbcoe->where('id_aktualisasi', $id_aktualisasi);
        $this->dbcoe->delete('gagasan_penyelesaian');
    }

    //Menghapus data peserta latsar tabel (identifikasi_isu)
    function delete_peserta_pelatihan_latsar_identifikasi($id_aktualisasi) {
        $this->dbcoe->where('id_aktualisasi', $id_aktualisasi);
        $this->dbcoe->delete('identifikasi_isu');
    }

    //Menghapus data peserta latsar tabel (nilai_aneka)
    function delete_peserta_pelatihan_latsar_nilai_aneka($id_aktualisasi) {
        $this->dbcoe->where('id_aktualisasi', $id_aktualisasi);
        $this->dbcoe->delete('nilai_aneka');
    }

    // get data peserta berdasarkan id pelatihan dari database daftar online
    function get_data_peserta_daftaronline_by_idpelatihan($id_diklat) 
    {
        $db2 = $this->load->database('daftar_online', TRUE);

        //statement if
        $query = $db2->query("SELECT * FROM data_peserta WHERE id_diklat = '" . $id_diklat . "' ORDER BY nama ASC");

        if ($query->num_rows() == 0)
        {
            $query = $db2->query("SELECT * FROM data_peserta_c WHERE id_diklat = '" . $id_diklat . "' ORDER BY nama ASC");
        }

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) 
        {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data peserta berdasarkan id pelatihan dari database daftar online
    function get_data_peserta_aktivasi_by_idpelatihan($id_diklat) 
    {
        $query = $this->dbcoe->query("SELECT NIP FROM users WHERE id_diklat = '" . $id_diklat . "' ORDER BY nama ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) 
        {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    // get data peserta berdasarkan id pelatihan dan jenis pelatihan dari tabel proper
    function get_data_peserta_by_idpelatihan_proper($id_diklat, $jenis_diklat) 
    {
        //statement if
        if ($jenis_diklat == "Pelatihan Kepemimpinan Pengawas" OR $jenis_diklat == "Pelatihan Kepemimpinan Administrator" OR $jenis_diklat == "Pelatihan Kepemimpinan Nasional") 
        {
            $query = $this->dbcoe->query("SELECT id_diklat, NIP, id_coach, nama_coach, latar, status_latar, judul, status_judul, manfaat, status_manfaat, milestone, status_milestone, abstraksi, file_proper, status_file_la, file_ra, status_file_ra, id_proper FROM proper WHERE id_diklat = '" . $id_diklat . "' ORDER BY NIP ASC");
        } 
        elseif ($jenis_diklat == "Diklat Prajabatan") 
        {
            $query = $this->dbcoe->query("SELECT id_diklat, nip, id_coach, nama_coach, upload_file_ra, upload_file_la, id_aktualisasi FROM aktualisasi WHERE id_diklat = '" . $id_diklat . "' ORDER BY nip ASC");
        }


        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    //fungsi mendapatkan jumlah kelas yang buka
    function get_jumlah_kelas_buka()
    {
        $hsl = $this->dbcoe->query("SELECT id_diklat FROM kelas WHERE tgl_selesai >= CURDATE()");
        
        $hasil = $hsl->num_rows();
        
        return $hasil;
    }

    //fungsi mendapatkan jumlah kelas yang sudah tutuo
    function get_jumlah_kelas_tutup()
    {
        $hsl = $this->dbcoe->query("SELECT id_diklat FROM kelas WHERE tgl_selesai < CURDATE()");
        
        $hasil = $hsl->num_rows();
        
        return $hasil;
    }
    
    // get data peserta yang hanya upload file proper saja
    public function tampil_data_peserta_just_upload ($id_diklat, $nip) 
    {

        $query = $this->dbcoe->query("SELECT proper.id_proper, users.NIP, proper.id_diklat, proper.nama_diklat, users.jenis_diklat, proper.id_coach, proper.nama_coach, proper.judul, proper.abstraksi, proper.file_proper FROM `proper` JOIN users ON users.NIP = proper.NIP WHERE proper.id_diklat = '$id_diklat' AND proper.NIP = '$nip'");

        return $query;
    }
  
  	// get data peserta yang hanya upload file RA & LA saja
    public function tampil_data_peserta_just_upload_latsar ($id_diklat, $nip) 
    {

        $query = $this->dbcoe->query("SELECT aktualisasi.id_aktualisasi, users.NIP, aktualisasi.id_diklat, aktualisasi.nama_diklat, users.jenis_diklat, aktualisasi.id_coach, aktualisasi.nama_coach, aktualisasi.judul, aktualisasi.abstraksi, aktualisasi.upload_file_la, aktualisasi.upload_file_ra FROM `aktualisasi` JOIN users ON users.NIP = aktualisasi.nip WHERE aktualisasi.id_diklat = '$id_diklat' AND aktualisasi.nip = '$nip'");

        return $query;
    }
}
