<?php

	class UserModel extends CI_Model
	{
		protected $dbcoe;
		function construct()
		{
			parent::__construct();
			$this->dbcoe = $this->load->database('default_coe', TRUE);
		}

		// Cek keberadaan user di sistem
		function check_user_account($nama, $NIP)
		{
			return $this->dbcoe->query("SELECT * FROM data_peserta JOIN data_diklat ON data_peserta.id_diklat =data_diklat.id_diklat WHERE data_peserta.nama = '$nama' AND data_peserta.NIP = '$NIP'");
		}

		function is_role()
		{
			return $this->session->userdata('jenis_diklat');
		}
	}
