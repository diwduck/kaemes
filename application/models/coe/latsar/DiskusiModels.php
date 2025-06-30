<?php

class DiskusiModels extends CI_Model {

    function construct() {
        parent::_construct();
    }

    // get data diskusi oleh peserta
    // jadi tau berapa pesan dari Coach yang belum dibaca
    function get_data_diskusi_bypeserta($id_kelas, $nip_wi, $id_user) {
        $this->db->select("diskusi.id_diskusi, diskusi.nama_diskusi, diskusi.id_kelas, diskusi.nip_wi, diskusi.started_by, diskusi.created, "
                . "DATE_FORMAT(diskusi.created, '%d %b %Y %H:%i') AS waktu_buat, NOW() AS sekarang, "
                . "DATE_FORMAT(diskusi.created, '%Y-%m-%d') AS tanggal_buat, "
                . "DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, "
                . "(SELECT diskusi_detail.isi_pesan FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_message, "
                . "(SELECT diskusi_detail.pesan_oleh FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_sender, "
                . "(SELECT diskusi_detail.nama_wi FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS nama_wi, "
                . "(SELECT diskusi_detail.dibaca FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS dibaca, "
                . "(SELECT DATE_FORMAT(diskusi_detail.created, '%d %b %Y %H:%i') FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_post, "
                . "(SELECT COUNT(*) FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi AND diskusi_detail.pesan_oleh = 'wi' AND diskusi_detail.dibaca = 0) AS unread_chat");
        $this->db->order_by('diskusi.created', 'DESC');
        $query = $this->db->get_where('diskusi', [
            'diskusi.id_user' => $id_user,
            //'diskusi.nip_wi' => $nip_wi,
            'diskusi.id_kelas' => $id_kelas
                ]);

        return $query;
    }
    
    // get data diskusi oleh Coach
    // jadi tau berapa pesan dari Peserta yang belum dibaca
    function get_data_diskusi_bywi($id_kelas, $nip_wi, $id_user) {
        $this->db->select("diskusi.id_diskusi, diskusi.nama_diskusi, diskusi.id_kelas, diskusi.nip_wi, diskusi.started_by, diskusi.created, "
                . "DATE_FORMAT(diskusi.created, '%d %b %Y %H:%i') AS waktu_buat, NOW() AS sekarang, "
                . "DATE_FORMAT(diskusi.created, '%Y-%m-%d') AS tanggal_buat, "
                . "DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, "
                . "(SELECT diskusi_detail.isi_pesan FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_message, "
                . "(SELECT diskusi_detail.pesan_oleh FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_sender, "
                . "(SELECT diskusi_detail.dibaca FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS dibaca, "
                . "(SELECT DATE_FORMAT(diskusi_detail.created, '%d %b %Y %H:%i') FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi ORDER BY diskusi_detail.created DESC LIMIT 1) AS last_post, "
                . "(SELECT COUNT(*) FROM diskusi_detail WHERE diskusi_detail.id_diskusi = diskusi.id_diskusi AND diskusi_detail.pesan_oleh = 'peserta' AND diskusi_detail.dibaca = 0) AS unread_chat");
        $this->db->order_by('diskusi.created', 'DESC');
        $query = $this->db->get_where('diskusi', [
            'diskusi.id_user' => $id_user,
            //'diskusi.nip_wi' => $nip_wi,
            'diskusi.id_kelas' => $id_kelas
                ]);

        return $query;
    }
    
    //get data diskusi by id
    function get_diskusi_byid($id_topik) {
        $this->db->select("id_diskusi, nama_diskusi");
        $query = $this->db->get_where('diskusi', ['id_diskusi' => $id_topik]);

        return $query;
    }

    // tambah topik diskusi by Peserta
    function add_topik($topik, $id_diklat, $id_coach, $nama_coach, $id_user) {
        //data
        $data = array(
            'nama_diskusi' => $topik,
            'id_kelas' => $id_diklat,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'id_user' => $id_user,
            'started_by' => 'peserta'
        );

        return $this->db->insert('diskusi', $data);
    }
    
    // tambah topik diskusi by Widyaiswara
    function add_topik_bywi($topik, $id_diklat, $id_coach, $nama_coach, $id_user) {
        //data
        $data = array(
            'nama_diskusi' => $topik,
            'id_kelas' => $id_diklat,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'id_user' => $id_user,
            'started_by' => 'wi'
        );

        return $this->db->insert('diskusi', $data);
    }
    
    // tambah percakapan
    function add_chat($id_diskusi, $message, $nama_lampiran, $id_coach, $nama_coach, $oleh) {
        //data
        $data = array(
            'id_diskusi' => $id_diskusi,
            'isi_pesan' => $message,
            'lampiran' => $nama_lampiran,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'pesan_oleh' => $oleh
        );

        return $this->db->insert('diskusi_detail', $data);
    }

    // hapus topik diskusi dan seluruh percakapannya
    function del_topik($id_topik) {
        $tables = array('diskusi_detail', 'diskusi');
        $this->db->where('id_diskusi', $id_topik);
        $hapus = $this->db->delete($tables);
        
        if($hapus){
            return true;
        }
        else{
            return $hapus;
        }
    }
    
     // hapus pesan chat terpilih
    function del_pesan_chat($id_chat) {
        
        $this->db->where('id_diskusi_detail', $id_chat);
        $hapus = $this->db->delete('diskusi_detail');
        
        if($hapus){
            return true;
        }
        else{
            return $hapus;
        }
    }
    
    //get data percakapan
    function get_percakapan($id_topik) {
        $this->db->select("diskusi.id_diskusi, diskusi.nama_diskusi, diskusi.id_kelas, diskusi.created, DATE_FORMAT(diskusi.created, '%d %b %Y %H:%i') AS waktu_buat_topik, NOW() AS sekarang, DATE_FORMAT(diskusi.created, '%Y-%m-%d') AS tanggal_buat_topik, DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, diskusi_detail.id_diskusi_detail, diskusi_detail.dibaca, DATE_FORMAT(diskusi_detail.created, '%Y-%m-%d') AS tanggal_kirim_chat, diskusi_detail.isi_pesan, diskusi_detail.lampiran, diskusi_detail.nama_wi, diskusi_detail.pesan_oleh, diskusi_detail.created AS created_chat, DATE_FORMAT(diskusi_detail.created, '%d %b %Y %H:%i') AS waktu_kirim_chat");
        $this->db->join('diskusi', 'diskusi.id_diskusi = diskusi_detail.id_diskusi');
        $this->db->order_by('diskusi_detail.created', 'ASC');
        $query = $this->db->get_where('diskusi_detail', ['diskusi_detail.id_diskusi' => $id_topik]);

        return $query;
    }
    
   // ambil data chat (pesan) dari Coach yang belum dibaca Peserta
    function get_chat_fromwi_unread($id_diklat, $id_coach, $NIP) {
        $this->db->select("diskusi.id_diskusi");
        $this->db->join('diskusi_detail', 'diskusi.id_diskusi = diskusi_detail.id_diskusi');
        $query = $this->db->get_where('diskusi', [
            'diskusi.id_kelas' => $id_diklat,
            //'diskusi.nip_wi' => $id_coach,
            'diskusi.id_user' => $NIP,
            'diskusi_detail.pesan_oleh' => 'wi',
            'diskusi_detail.dibaca' => 0
                ]);

        return $query;
    }
    
   // ambil data chat (pesan) dari Peserta yang belum dibaca Coach
    function get_chat_frompeserta_unread($id_diklat, $id_coach, $NIP) {
        $this->db->select("diskusi.id_diskusi");
        $this->db->join('diskusi_detail', 'diskusi.id_diskusi = diskusi_detail.id_diskusi');
        $query = $this->db->get_where('diskusi', [
            'diskusi.id_kelas' => $id_diklat,
            //'diskusi.nip_wi' => $id_coach,
            'diskusi.id_user' => $NIP,
            'diskusi_detail.pesan_oleh' => 'peserta',
            'diskusi_detail.dibaca' => 0
                ]);

        return $query;
    }
    
    // tandai chat dari peserta sudah dibaca Wi 
    function set_chat_peserta_read($id_topik) {
        $this->db->set('dibaca', '1');
        $this->db->where('id_diskusi', $id_topik);
        $this->db->where('pesan_oleh', 'peserta');
        $update = $this->db->update('diskusi_detail');

        return $update;
    }
    
    // tandai chat dari Wi sudah dibaca peserta
    function set_chat_wi_read($id_topik) {
        $this->db->set('dibaca', '1');
        $this->db->where('id_diskusi', $id_topik);
        $this->db->where('pesan_oleh', 'wi');
        $update = $this->db->update('diskusi_detail');

        return $update;
    }

}
