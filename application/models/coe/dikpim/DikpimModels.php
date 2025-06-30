<?php

class DikpimModels extends CI_Model {

    function construct() {
        parent::_construct();
    }

    //get data histori Proper
    function get_data_riwayat($NIP, $id_diklat) {
        $query = $this->db->query("SELECT * FROM history_proper WHERE NIP = '$NIP' AND id_diklat = '$id_diklat' ORDER BY id_history DESC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_datapeserta($NIP, $nama_diklat) {
        return $this->db->query("SELECT * FROM users JOIN proper ON users.NIP = proper.NIP WHERE users.nama_diklat = '$nama_diklat' AND users.NIP = '$NIP'");
    }

    function show_history($NIP, $id_diklat) {
        $hasil = $this->db->query("SELECT * FROM history_proper WHERE NIP = '$NIP' AND id_diklat = '$id_diklat'");
        return $hasil;
    }

    //get jumlah riwayat history
    function get_jumlah_riwayat($NIP, $id_diklat) {
        $query = $this->db->query("SELECT * FROM history_proper WHERE NIP = '$NIP' AND id_diklat = '$id_diklat'");

        $result = $query->row_array();
        $count = $query->num_rows();

        return $count;
    }

    //get data arsip masuk by id
    function select_data_proper_byId($id_user) {
        $this->db->select('*');
        $this->db->from('proper');
        $this->db->where('id_user', $id_user);

        return $this->db->get();
    }

    function select_data_proper_peserta($NIP, $id_diklat) {
        $this->db->select('*');
        $this->db->from('proper');
        $this->db->where(['NIP' => $NIP, 'id_diklat' => $id_diklat]);

        return $this->db->get();
    }
    
    //get data peserta PIM by id proper and topik as column field
    function get_data_peserta_by_idproper_and_topik ($id_proper, $topik)
    {
        $query = $this->db->query("SELECT $topik FROM proper WHERE id_proper = '$id_proper'");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    //get data riwayat peserta PIM by id history
    function get_data_riwayat_peserta_by_idhistory ($id_history)
    {
        $query = $this->db->query("SELECT isi FROM history_proper WHERE id_history = '$id_history'");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

}
