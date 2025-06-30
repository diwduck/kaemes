<?php

	class LatsarModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}		

		//get all data aktualisasi peserta from tabel aktualisasi by NIP
		function get_data_aktualisasi_peserta_latsar($nip)
		{
			$this->db->select('*');
			$this->db->from('aktualisasi');
			$this->db->where('nip',$nip);

			return $this->db->get();
		}

		//get all data identifikasi isu from tabel identifikasi isu by id aktualisasi
		function get_data_identifikasi_isu_peserta_latsar($id_aktualisasi)
		{
			$query = $this->db->query("SELECT * FROM `identifikasi_isu` WHERE id_aktualisasi='$id_aktualisasi'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get all data core isu from tabel identifikasi isu by id aktualisasi
		function get_data_core_isu_peserta_latsar($id_aktualisasi)
		{
			$this->db->select('*');
			$this->db->from('identifikasi_isu');
			$this->db->where('id_aktualisasi',$id_aktualisasi);
			$this->db->where('core_isu',"1");

			return $this->db->get();
		}

		//get all data gagasan penyelesaian isu by id tahapan kegiatan
		function get_data_tahapan_kegiatan($id_gagasan)
		{
			$this->db->select('*');
			$this->db->from('gagasan_penyelesaian');
			$this->db->where('id_gagasan',$id_gagasan);

			return $this->db->get();
		}

		//get all data gagasan penyelesaian isu from tabel gagasan_penyelesaian by id identifikasi isu
		function get_data_gagasan_penyelesaian_isu_latsar($id_identifikasi_isu)
		{
			$query = $this->db->query("SELECT * FROM `gagasan_penyelesaian` WHERE id_identifikasi_isu='$id_identifikasi_isu' ORDER BY id_tahapan_kegiatan ASC");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get indikator data nilai ANEKA by id tahapan kegiatan and nilai aneka
		function get_data_indikator_nilai_aneka($id_tahapan_kegiatan, $nilai_aneka)
		{
			$query = $this->db->query("SELECT * FROM `nilai_aneka` WHERE id_tahapan_kegiatan = '$id_tahapan_kegiatan' AND nilai_aneka = '$nilai_aneka'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Menghapus data identifikasi isu
		function delete_identifikasi_isu($id_identifikasi_isu)
		{
			$this->db->where('id_identifikasi_isu',$id_identifikasi_isu);
			$this->db->delete('identifikasi_isu');
		}

		//Menghapus data tahapan kegiatan
		function delete_tahapan_kegiatan($id_tahapan_kegiatan)
		{
			$this->db->where('id_tahapan_kegiatan',$id_tahapan_kegiatan);
			$this->db->delete('gagasan_penyelesaian');
		}

		//Menghapus data tahapan kegiatan
		function delete_nilai_aneka($id_tahapan_kegiatan)
		{
			$this->db->where('id_tahapan_kegiatan',$id_tahapan_kegiatan);
			$this->db->delete('nilai_aneka');
		}

		//get data isu by ID isu
		function get_data_isu_byid($id_identifikasi_isu)
		{
			$query = $this->db->query("SELECT * FROM identifikasi_isu WHERE id_identifikasi_isu = '".$id_identifikasi_isu."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data gagasan penyelesaian isu by ID gagasan
		function get_data_gagasan_penyelesaian_isu_byid($id_gagasan)
		{
			$query = $this->db->query("SELECT * FROM gagasan_penyelesaian WHERE id_gagasan = '".$id_gagasan."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data isu by ID aktualisasi
		function get_data_isu_byid_aktualisasi($id_aktualisasi)
		{
			$query = $this->db->query("SELECT * FROM identifikasi_isu WHERE id_aktualisasi = '".$id_aktualisasi."' AND core_isu = '1'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $indeks;
		}

		//get data id tahapan kegiatan berdasarkan LIKE id gagasan
		function cek_data_id_tahapan_kegiatan($id_gagasan)
		{
			$query = $this->db->query("SELECT * FROM gagasan_penyelesaian WHERE id_tahapan_kegiatan LIKE '".$id_gagasan."%' ORDER BY id_tahapan_kegiatan DESC LIMIT 1");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data tahapan kegiatan by ID
		function get_data_tahapan_kegiatan_byid($id_tahapan_kegiatan)
		{
			$query = $this->db->query("SELECT * FROM gagasan_penyelesaian WHERE id_tahapan_kegiatan = '".$id_tahapan_kegiatan."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data all data from tabel nilai aneka
		function get_data_all_nilai_aneka_by_idAktualisasi($id_aktualisasi)
		{
			$query = $this->db->query("SELECT * FROM nilai_aneka WHERE id_aktualisasi = '".$id_aktualisasi."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data tahapan kegiatan by ID tahapan kegiatan
		function get_data_nilai_aneka($id_tahapan_kegiatan)
		{
			$query = $this->db->query("SELECT * FROM nilai_aneka WHERE id_tahapan_kegiatan = '".$id_tahapan_kegiatan."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get data nilai ANEKA by ID
		function get_data_nilai_aneka_byid($id_nilai_aneka)
		{
			$query = $this->db->query("SELECT * FROM nilai_aneka WHERE id_nilai_aneka = '".$id_nilai_aneka."'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Menghapus data nilai aneka
		function delete_nilai_aneka_all($id_nilai_aneka)
		{
			$this->db->where('id_nilai_aneka',$id_nilai_aneka);
			$this->db->delete('nilai_aneka');
		}

		//Menghapus data nilai aneka berdasarkan kemiripan dengan id_gagasan
		function delete_nilai_aneka_all_byidgagasan($id_gagasan)
		{
			$this->db->like('id_tahapan_kegiatan',$id_gagasan);
			$this->db->delete('nilai_aneka');
		}

		//Menghapus data nilai aneka berdasarkan kemiripan dengan id_gagasan
		function delete_nilai_gagasan_penyelesaian_all_byidgagasan($id_gagasan)
		{
			$this->db->like('id_tahapan_kegiatan',$id_gagasan);
			$this->db->delete('gagasan_penyelesaian');
		}

		//get all data gagasan penyelesaian isu by id_aktualisasi
		function get_data_gagasan_penyelesaian_isu_peserta_latsar($id_aktualisasi)
		{
			$this->db->select('*');
			$this->db->from('gagasan_penyelesaian');
			$this->db->where('id_aktualisasi',$id_aktualisasi);
			$this->db->group_by('timestamp');
			$this->db->order_by('timestamp',"asc");

			return $this->db->get();
		}
	}