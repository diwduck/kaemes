<?php

	class DikfungModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}		

		//get alll data surat
		function get_data_riwayat($NIP)
		{
			$query = $this->db->query("SELECT * FROM history_rtl WHERE NIP = '$NIP' ORDER BY id_history DESC");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		function get_datapeserta($NIP,$nama_diklat)
		{
			return $this->db->query("SELECT * FROM users JOIN rtl ON users.NIP = rtl.NIP WHERE users.nama_diklat = '$nama_diklat' AND users.NIP = '$NIP'");
		}

		function show_history(){
			$hasil=$this->db->query("SELECT * FROM history_rtl");
			return $hasil;
		}

		//get jumlah data surat
		function get_jumlah_riwayat($NIP)
		{
			$query = $this->db->query("SELECT * FROM history_rtl WHERE NIP = '$NIP'");
		
			$result = $query->row_array();
			$count = $query->num_rows();
		
			return $count;
		}
	}
