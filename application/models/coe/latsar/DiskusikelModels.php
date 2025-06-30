<?php

class DiskusikelModels extends CI_Model {

    function construct() {
        parent::_construct();
    }

    // get data diskusi_kelompok oleh peserta
    // jadi tau berapa pesan dari Coach yang belum dibaca
    function get_data_diskusikel_bypeserta($id_kelas, $nip_wi) {
        $this->db->select("diskusi_kelompok.id_diskusi, diskusi_kelompok.nama_diskusi, diskusi_kelompok.id_kelas, diskusi_kelompok.nip_wi, diskusi_kelompok.started_by, diskusi_kelompok.created, "
                . "DATE_FORMAT(diskusi_kelompok.created, '%d %b %Y %H:%i') AS waktu_buat, NOW() AS sekarang, "
                . "DATE_FORMAT(diskusi_kelompok.created, '%Y-%m-%d') AS tanggal_buat, "
                . "DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, "
                . "(SELECT diskusi_kelompok_detail.isi_pesan FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_message, "
                . "(SELECT diskusi_kelompok_detail.nip_user FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS nip_user, "                
                . "(SELECT diskusi_kelompok_detail.nama_user FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS nama_user, "
                . "(SELECT diskusi_kelompok_detail.pesan_oleh FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_sender, "
                . "(SELECT diskusi_kelompok_detail.nama_wi FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS nama_wi, "
                . "(SELECT diskusi_kelompok_detail.dibaca FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS dibaca, "
                . "(SELECT DATE_FORMAT(diskusi_kelompok_detail.created, '%d %b %Y %H:%i') FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_post, "
                . "(SELECT COUNT(*) FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi AND diskusi_kelompok_detail.pesan_oleh = 'wi' AND diskusi_kelompok_detail.dibaca = 0) AS unread_chat");
        $this->db->order_by('diskusi_kelompok.created', 'DESC');
        $query = $this->db->get_where('diskusi_kelompok', [
            //'diskusi_kelompok.id_user' => $id_user,
            'diskusi_kelompok.nip_wi' => $nip_wi,
            'diskusi_kelompok.id_kelas' => $id_kelas
                ]);

        return $query;
    }
    
    // get data diskusi_kelompok oleh Coach
    // jadi tau berapa pesan dari Peserta yang belum dibaca
    function get_data_diskusikel_bywi($id_kelas, $nip_wi) {
        $this->db->select("diskusi_kelompok.id_diskusi, diskusi_kelompok.nama_diskusi, diskusi_kelompok.id_kelas, diskusi_kelompok.nip_wi, diskusi_kelompok.started_by, diskusi_kelompok.created, "
                . "DATE_FORMAT(diskusi_kelompok.created, '%d %b %Y %H:%i') AS waktu_buat, NOW() AS sekarang, "
                . "DATE_FORMAT(diskusi_kelompok.created, '%Y-%m-%d') AS tanggal_buat, "
                . "DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, "
                . "(SELECT diskusi_kelompok_detail.isi_pesan FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_message, "
                . "(SELECT diskusi_kelompok_detail.nama_user FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS nama_peserta, "
                . "(SELECT diskusi_kelompok_detail.pesan_oleh FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_sender, "
                . "(SELECT diskusi_kelompok_detail.dibaca FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS dibaca, "
                . "(SELECT DATE_FORMAT(diskusi_kelompok_detail.created, '%d %b %Y %H:%i') FROM diskusi_kelompok_detail WHERE diskusi_kelompok_detail.id_diskusi = diskusi_kelompok.id_diskusi ORDER BY diskusi_kelompok_detail.created DESC LIMIT 1) AS last_post");
        $query = $this->db->get_where('diskusi_kelompok', [
            'diskusi_kelompok.nip_wi' => $nip_wi,
            'diskusi_kelompok.id_kelas' => $id_kelas
                ]);

        return $query;
    }
    
    //get data diskusi_kelompok by id
    function get_diskusi_byid($id_topik) {
        $this->db->select("id_diskusi, nama_diskusi");
        $query = $this->db->get_where('diskusi_kelompok', ['id_diskusi' => $id_topik]);

        return $query;
    }

    // tambah topik diskusi_kelompok by Peserta
    function add_topik($topik, $id_diklat, $id_coach, $nama_coach, $id_user) {
        //data
        $data = array(
            'nama_diskusi' => $topik,
            'id_kelas' => $id_diklat,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'nip_user' => $id_user,
            'started_by' => 'peserta'
        );

        return $this->db->insert('diskusi_kelompok', $data);
    }
    
    // tambah topik diskusi_kelompok by Widyaiswara
    function add_topik_bywi($topik, $id_diklat, $id_coach, $nama_coach) {
        //data
        $data = array(
            'nama_diskusi' => $topik,
            'id_kelas' => $id_diklat,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'started_by' => 'wi'
        );
        $this->db->set('created', 'NOW()', FALSE);
        return $this->db->insert('diskusi_kelompok', $data);
    }
    
    // tambah percakapan by peserta
    function add_chat_bypeserta($id_diskusi, $message, $nama_lampiran, $id_coach, $nama_coach, $nip_peserta, $nama_peserta) {
        $data = array(
            'id_diskusi' => $id_diskusi,
            'isi_pesan' => $message,
            'lampiran' => $nama_lampiran,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'nip_user' => $nip_peserta,
            'nama_user' => $nama_peserta,
            'pesan_oleh' => 'peserta'
        );

        $this->db->set('created', 'NOW()', FALSE);
        return $this->db->insert('diskusi_kelompok_detail', $data);
    }

    // tambah percakapan by Wi
    function add_chat_bywi($id_diskusi, $message, $nama_lampiran, $id_coach, $nama_coach) {
        $data = array(
            'id_diskusi' => $id_diskusi,
            'isi_pesan' => $message,
            'lampiran' => $nama_lampiran,
            'nip_wi' => $id_coach,
            'nama_wi' => $nama_coach,
            'pesan_oleh' => 'wi'
        );

        $this->db->set('created', 'NOW()', FALSE);
        return $this->db->insert('diskusi_kelompok_detail', $data);
    }    

    // hapus topik diskusi_kelompok dan seluruh percakapannya
    function del_topik($id_topik) {
        $tables = array('diskusi_kelompok_detail', 'diskusi_kelompok');
        $this->db->where('id_diskusi', $id_topik);
        $hapus = $this->db->delete($tables);
        
        if($hapus){
            return true;
        }
        else{
            return $hapus;
        }
    }
    
    // cek apakah ada lampiran pada sebuah pesan chat
    function cek_lampiran($id_pesan){
        $this->db->select("lampiran");
        $this->db->where('id_diskusi_detail', $id_pesan);
        $data_lampiran = $this->db->get('diskusi_kelompok_detail');
        
        return $data_lampiran;        
    }
    
     // hapus pesan chat terpilih
    function del_pesan_chat($id_chat) {
        
        $this->db->where('id_diskusi_detail', $id_chat);
        $hapus = $this->db->delete('diskusi_kelompok_detail');
        
        if($hapus){
            return true;
        }
        else{
            return $hapus;
        }
    }
    
    //get data percakapan
    function get_percakapan($id_topik) {
        $this->db->select("diskusi_kelompok.id_diskusi, diskusi_kelompok.nama_diskusi, diskusi_kelompok.id_kelas, diskusi_kelompok.created, DATE_FORMAT(diskusi_kelompok.created, '%d %b %Y %H:%i') AS waktu_buat_topik, NOW() AS sekarang, DATE_FORMAT(diskusi_kelompok.created, '%Y-%m-%d') AS tanggal_buat_topik, DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang, diskusi_kelompok_detail.id_diskusi_detail, DATE_FORMAT(diskusi_kelompok_detail.created, '%Y-%m-%d') AS tanggal_kirim_chat, diskusi_kelompok_detail.isi_pesan, diskusi_kelompok_detail.lampiran, diskusi_kelompok_detail.nama_wi, diskusi_kelompok_detail.nip_user, diskusi_kelompok_detail.nama_user, diskusi_kelompok_detail.pesan_oleh, diskusi_kelompok_detail.created AS created_chat, DATE_FORMAT(diskusi_kelompok_detail.created, '%d %b %Y %H:%i') AS waktu_kirim_chat");
        $this->db->join('diskusi_kelompok', 'diskusi_kelompok.id_diskusi = diskusi_kelompok_detail.id_diskusi');
        $this->db->order_by('diskusi_kelompok_detail.created', 'ASC');
        $query = $this->db->get_where('diskusi_kelompok_detail', ['diskusi_kelompok_detail.id_diskusi' => $id_topik]);

        return $query;
    }
    
   // ambil data chat (pesan) dari Coach yang belum dibaca Peserta
    function get_chat_fromwi_unread($id_diklat, $id_coach, $NIP) {
        $this->db->select("diskusi_kelompok.id_diskusi");
        $this->db->join('diskusi_kelompok_detail', 'diskusi_kelompok.id_diskusi = diskusi_kelompok_detail.id_diskusi');
        $query = $this->db->get_where('diskusi_kelompok', [
            'diskusi_kelompok.id_kelas' => $id_diklat,
            //'diskusi_kelompok.nip_wi' => $id_coach,
            'diskusi_kelompok.id_user' => $NIP,
            'diskusi_kelompok_detail.pesan_oleh' => 'wi',
            'diskusi_kelompok_detail.dibaca' => 0
                ]);

        return $query;
    }
    
    // tandai chat dari peserta sudah dibaca Wi 
    function set_chat_peserta_read($id_topik) {
        $this->db->set('dibaca', '1');
        $this->db->where('id_diskusi', $id_topik);
        $this->db->where('pesan_oleh', 'peserta');
        $update = $this->db->update('diskusi_kelompok_detail');

        return $update;
    }
    
    // tandai chat dari Wi sudah dibaca peserta
    function set_chat_wi_read($id_topik) {
        $this->db->set('dibaca', '1');
        $this->db->where('id_diskusi', $id_topik);
        $this->db->where('pesan_oleh', 'wi');
        $update = $this->db->update('diskusi_kelompok_detail');

        return $update;
    }

}
