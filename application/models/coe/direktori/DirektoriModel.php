<?php

class DirektoriModel extends CI_Model 
{

    protected $dbcoe;

    function __construct() {
        parent::__construct();
        $this->dbcoe = $this->load->database('default_coe', TRUE);

    }

    //get jumlah File untuk setiap jenis diklat
    public function get_jumlah_file_proper()
    {
        $query = $this->dbcoe->query("SELECT proper.id_proper as id_proper, users.nama as nama, proper.NIP as NIP, proper.judul as judul, proper.file_proper as file_proper, users.skpd as opd, users.jabatan as jabatan, proper.nama_coach as nama_coach FROM proper JOIN users ON proper.NIP = users.NIP WHERE proper.upload = '1' ORDER BY proper.timestamp ASC");

        $db_eproper = $this->load->database('eproper', TRUE);
        $query_eproper_lama = $db_eproper->query("SELECT COUNT(id) as jumlah_eproper FROM inovasi")->row();

        $query_jumlah = $query->num_rows();
        $query_jumlah = $query_jumlah + $query_eproper_lama->jumlah_eproper;
       
        return $query_jumlah;
    }
  
  	//get jumlah File Aktualisasi
    public function get_jumlah_file_aktualisasi()
    {
        $query = $this->dbcoe->query("SELECT aktualisasi.id_aktualisasi as id_aktualisasi, users.nama as nama, aktualisasi.NIP as NIP, aktualisasi.judul as judul, aktualisasi.upload_file_la as upload_file_la, users.skpd as opd, users.jabatan as jabatan, aktualisasi.nama_coach as nama_coach FROM aktualisasi JOIN users ON aktualisasi.NIP = users.NIP WHERE aktualisasi.upload_file_la <> 'NULL' ORDER BY aktualisasi.timestamp ASC");
        $query_jumlah = $query->num_rows();
       
        return $query_jumlah;
    }

    //get tahun diklat kepemimpinan dari tabel proper
    public function get_tahun_kepemimpinan () 
    {
        $query = $this->dbcoe->query("SELECT YEAR(kelas.tgl_mulai) as tahun FROM kelas JOIN proper ON proper.id_diklat = kelas.id_diklat WHERE proper.upload = '1' GROUP BY YEAR(kelas.tgl_mulai)");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }
    
    //get tahun diklat kepemimpinan dari tabel proper lama
    public function get_tahun_kepemimpinan_lama () 
    {
        $db_eproper = $this->load->database('eproper', TRUE);

        $query = $db_eproper->query("SELECT tahun FROM inovasi GROUP BY tahun");
        
        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }
  
  	//get tahun diklat aktualisasi latsar dari tabel aktualisasi
    public function get_tahun_latsar () 
    {
        $query = $this->dbcoe->query("SELECT YEAR(kelas.tgl_mulai) as tahun FROM kelas JOIN aktualisasi ON aktualisasi.id_diklat = kelas.id_diklat WHERE aktualisasi.upload_file_la <> 'NULL' GROUP BY YEAR(kelas.tgl_mulai)");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    //get nama diklat by tahun dan jenis diklat
    function get_nama_diklat($jenis_diklat, $tahun)
    {
    	//statement query menyesuaikan jenis diklatnya
    	if ($jenis_diklat == "kepemimpinan") 
    	{
    		//$query = $this->db->query("SELECT id_diklat, nama_diklat FROM proper WHERE upload = '1' AND status_file_la = 'Diterima' AND YEAR(timestamp) = '$tahun'");
    	   $query = $this->dbcoe->query("SELECT kelas.id_diklat, kelas.nama_diklat FROM kelas JOIN proper ON proper.id_diklat = kelas.id_diklat WHERE proper.upload = '1' AND YEAR(kelas.tgl_mulai) = '$tahun' GROUP BY kelas.nama_diklat");
        }
      	else if ($jenis_diklat == "latsar")
        {
            $query = $this->dbcoe->query("SELECT kelas.id_diklat, kelas.nama_diklat FROM kelas JOIN aktualisasi ON aktualisasi.id_diklat = kelas.id_diklat WHERE aktualisasi.upload_file_la <> 'NULL' AND YEAR(kelas.tgl_mulai) = '$tahun' GROUP BY kelas.nama_diklat");
        }

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$row['nama_diklat']] = $row;
        }
        
        return $result;
    }
    
    //get nama diklat lama by tahun dan jenis diklat dari e-proper
    function get_nama_diklat_lama($jenis_diklat, $tahun)
    {
        $db_eproper = $this->load->database('eproper', TRUE);

    	//statement query menyesuaikan jenis diklatnya
    	if ($jenis_diklat == "kepemimpinan") 
    	{
    	   $query = $db_eproper->query("SELECT id, namadiklat FROM inovasi WHERE tahun = '$tahun' GROUP BY namadiklat");
        }

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$row['namadiklat']] = $row;
        }
        
        return $result;
    }
    
    //get nama diklat lama by tahun dan jenis diklat dari e-proper
    function get_namadiklat_lama_by_id($id_diklat)
    {
        $db_eproper = $this->load->database('eproper', TRUE);

    	//statement query menyesuaikan jenis diklatnya
    	$query = $db_eproper->query("SELECT namadiklat FROM inovasi WHERE id = '$id_diklat'");
        
        return $query;
    }

    //get data renja by ID Tahun dan nama diklat
    function get_data_proper_by_tahunnama($id_diklat, $tahun)
    {
        if ($id_diklat == "0") 
        {
            $query = $this->dbcoe->query("SELECT proper.id_proper as id_proper, users.nama as nama, proper.NIP as NIP, proper.judul as judul, proper.file_proper as file_proper, users.skpd as opd, users.jabatan as jabatan, proper.nama_coach as nama_coach FROM kelas JOIN proper on kelas.id_diklat = proper.id_diklat JOIN users ON proper.NIP = users.NIP WHERE proper.upload = '1'  AND YEAR(kelas.tgl_mulai) = '".$tahun."' ORDER BY proper.timestamp ASC");
        }
        else
        {
            $query = $this->dbcoe->query("SELECT proper.id_proper as id_proper, users.nama as nama, proper.NIP as NIP, proper.judul as judul, proper.file_proper as file_proper, users.skpd as opd, users.jabatan as jabatan, proper.nama_coach as nama_coach FROM kelas JOIN proper on kelas.id_diklat = proper.id_diklat JOIN users ON proper.NIP = users.NIP WHERE proper.upload = '1' AND proper.id_diklat = '".$id_diklat."' AND YEAR(kelas.tgl_mulai) = '".$tahun."' ORDER BY proper.timestamp ASC");
        }

    
        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }
    
    function get_data_properlama_by_tahunnama($nama_diklat, $tahun)
    {
        $db_eproper = $this->load->database('eproper', TRUE);

        if ($nama_diklat == "0") 
        {
            $query = $db_eproper->query("SELECT inovasi.id as id_proper, peserta.nama as nama, inovasi.nip as NIP, inovasi.judul as judul, peserta.skpd as opd, peserta.jabatan as jabatan FROM inovasi JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.tahun = '".$tahun."' ORDER BY inovasi.tglsubmit ASC");
        }
        else
        {
            $query = $db_eproper->query("SELECT inovasi.id as id_proper, peserta.nama as nama, inovasi.nip as NIP, inovasi.judul as judul, peserta.skpd as opd, peserta.jabatan as jabatan FROM inovasi JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.namadiklat = '".$nama_diklat."' AND inovasi.tahun = '".$tahun."' ORDER BY inovasi.tglsubmit ASC");
        }
    
        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
       
        return $result;
    }

    //get data proper ang users by id_proper
    public function get_data_proper_by_idproper ($id_proper)
    {
        $query = $this->dbcoe->query("SELECT proper.id_proper as id_proper, proper.nama_diklat as nama_pelatihan, users.nama as nama, proper.NIP as NIP, proper.judul as judul, proper.file_proper as file_proper, users.skpd as opd, users.pemda as pemda, users.jabatan as jabatan, proper.nama_coach as nama_coach, proper.abstraksi as abstraksi, users.file_foto as file_foto, users.email as email, proper.views as views FROM proper JOIN users ON proper.NIP = users.NIP WHERE proper.id_proper = $id_proper AND proper.upload = '1' ORDER BY proper.timestamp ASC");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }
    
    //get data proper lama by id_proper from bpsdmdja_eproper table
    public function get_data_proper_lama_by_idproper ($id_proper)
    {
        $db_eproper = $this->load->database('eproper', TRUE);

        $query = $db_eproper->query("SELECT inovasi.id as id_proper, inovasi.namadiklat as nama_pelatihan, peserta.nama as nama, inovasi.nip as NIP, inovasi.judul as judul, peserta.skpd as opd, peserta.jabatan as jabatan, peserta.pemda as pemda, inovasi.latarbelakang as latarbelakang, inovasi.asal_peserta as penyelenggara FROM inovasi JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.id = '".$id_proper."'");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }

    //get jumlah proper berdasarkan setiap jenis diklatnya
    public function get_data_proper_by_jenis_diklat()
    {
        $query = $this->dbcoe->query("SELECT users.jenis_diklat, COUNT(*) as jumlah FROM kelas JOIN proper ON kelas.id_diklat = proper.id_diklat JOIN users ON proper.NIP = users.NIP WHERE proper.upload = '1' AND YEAR(kelas.tgl_mulai) = YEAR(CURDATE()) GROUP BY users.jenis_diklat");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }

    //get jumlah proper berdasarkan penyelenggaraan di kab/kota
    public function get_data_proper_by_penyelenggara_kabkota()
    {
        $query = $this->dbcoe->query("SELECT kelas.penyelenggara, COUNT(*) as jumlah FROM proper JOIN kelas ON proper.id_diklat = kelas.id_diklat WHERE proper.upload = '1' AND kelas.penyelenggara <> 'BPSDMD' AND YEAR(kelas.tgl_mulai) = YEAR(CURDATE()) GROUP BY kelas.penyelenggara ORDER BY jumlah DESC");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }

    //get jumlah proper berdasarkan asal ASN
    public function get_data_proper_by_asal_asn()
    {
        $query = $this->dbcoe->query("SELECT users.pemda, users.instansi_pengirim, COUNT(*) as jumlah FROM proper JOIN kelas ON proper.id_diklat = kelas.id_diklat JOIN users ON proper.NIP = users.NIP WHERE proper.upload = '1' AND YEAR(kelas.tgl_mulai) = YEAR(CURDATE()) GROUP BY users.pemda ORDER BY users.instansi_pengirim ASC");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }
    
    //get data proper ang users by id_proper
    public function get_data_proper_by_kabkota ($nama_kabkota)
    {
        $kueri = "SELECT 
    users.nama,
    users.NIP,
    users.jabatan,
    users.skpd,
    users.pemda,
    proper.id_proper,
    proper.judul,
    proper.upload,
    proper.status_file_la,
    kelas.nama_diklat,
    DATE_FORMAT(kelas.tgl_mulai, '%Y') AS tahun
FROM
    users
        INNER JOIN
    proper ON proper.NIP = users.NIP
        INNER JOIN
    kelas ON kelas.id_diklat = proper.id_diklat
WHERE
    users.pemda = '".$nama_kabkota."'
        #AND proper.upload = 1
        ORDER BY tahun DESC";
        
        $query = $this->dbcoe->query($kueri);
    
        return $query;
    }    
  
  	//get data aktualisasi by ID Tahun dan ID diklat
    function get_data_aktualisasi_by_tahunnama($id_diklat, $tahun)
    {
        if ($id_diklat == "0")
        {
            $query = $this->dbcoe->query("SELECT aktualisasi.id_aktualisasi as id_aktualisasi, users.nama as nama, aktualisasi.NIP as NIP, aktualisasi.judul as judul, aktualisasi.upload_file_la as upload_file_la, users.skpd as opd, users.jabatan as jabatan, aktualisasi.nama_coach as nama_coach FROM kelas JOIN aktualisasi on kelas.id_diklat = aktualisasi.id_diklat JOIN users ON aktualisasi.NIP = users.NIP WHERE aktualisasi.upload_file_la <> 'NULL' AND YEAR(kelas.tgl_mulai) = '".$tahun."' ORDER BY aktualisasi.timestamp ASC");
        }
        else
        {
            $query = $this->dbcoe->query("SELECT aktualisasi.id_aktualisasi as id_aktualisasi, users.nama as nama, aktualisasi.NIP as NIP, aktualisasi.judul as judul, aktualisasi.upload_file_la as upload_file_la, users.skpd as opd, users.jabatan as jabatan, aktualisasi.nama_coach as nama_coach FROM kelas JOIN aktualisasi on kelas.id_diklat = aktualisasi.id_diklat JOIN users ON aktualisasi.NIP = users.NIP WHERE aktualisasi.upload_file_la <> 'NULL' AND aktualisasi.id_diklat = '".$id_diklat."' AND YEAR(kelas.tgl_mulai) = '".$tahun."' ORDER BY aktualisasi.timestamp ASC");
        }

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }

    //get data aktualisasi by id_aktualisasi
    public function get_data_aktualisasi_by_idaktualisasi ($id_aktualisasi)
    {
        $query = $this->dbcoe->query("SELECT aktualisasi.id_aktualisasi as id_aktualisasi, aktualisasi.nama_diklat as nama_pelatihan, users.nama as nama, aktualisasi.NIP as NIP, aktualisasi.judul as judul, aktualisasi.upload_file_la as upload_file_la, users.skpd as opd, users.pemda as pemda, users.jabatan as jabatan, aktualisasi.nama_coach as nama_coach, aktualisasi.abstraksi as abstraksi, users.file_foto as file_foto, users.email as email FROM aktualisasi JOIN users ON aktualisasi.NIP = users.NIP WHERE aktualisasi.id_aktualisasi = '".$id_aktualisasi."' AND aktualisasi.upload_file_la <> 'NULL' ORDER BY aktualisasi.timestamp ASC");

        $indeks = 0;
        $result = array();
        
        foreach ($query->result_array() as $row)
        {
            $result[$indeks++] = $row;
        }
    
        return $result;
    }
}