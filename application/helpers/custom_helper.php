<?php

	//get list data nilai ANEKA
	function data_aneka()
	{
        $data = [
                'Akuntabilitas' => "Akuntabilitas",
                'Nasionalisme'  => "Nasionalisme",
                'Etika Publik'  => "Etika Publik",
                'Komitmen Mutu' => "Komitmen Mutu",
                'Anti Korupsi'  => "Anti Korupsi"       
        ];

	    return $data;
	}

	//get list data indikator nilai Akuntabilitas
	function data_indikator_akuntabilitas()
	{
        $data = [
                'Kepemimpinan' 		=> "Kepemimpinan",
                'Transparansi'  	=> "Transparansi",
                'Integritas'  		=> "Integritas",
                'Tanggung Jawab' 	=> "Tanggung Jawab",
                'Keadilan'  		=> "Keadilan",
                'Kepercayaan'  		=> "Kepercayaan",	       
        		'Keseimbangan'  	=> "Keseimbangan",
        		'Kejelasan'  		=> "Kejelasan",
        		'Konsistensi'  		=> "Konsistensi"
        ];

	    return $data;
	}

	//get list data indikator nilai Komitmen Mutu
	function data_indikator_komitmen_mutu()
	{
        $data = [
                'Efektifitas' 		=> "Efektifitas",
                'Efisiensi'  		=> "Efisiensi",
                'Inovasi'  			=> "Inovasi",
                'Orientasi Mutu' 	=> "Orientasi Mutu"
        ];

	    return $data;
	}

	//get list data indikator nilai Anti Korupsi
	function data_indikator_anti_korupsi()
	{
        $data = [
                'Kejujuran' 	=> "Kejujuran",
                'Kepedulian'  	=> "Kepedulian",
                'Kemandirian'  	=> "Kemandirian",
                'Kedisiplinan' 	=> "Kedisiplinan",
                'Tanggung Jawab'=> "Tanggung Jawab",
                'Kerja Keras' 	=> "Kerja Keras",
                'Sederhana' 	=> "Sederhana",
                'Keberanian' 	=> "Keberanian",
                'Keadilan' 		=> "Keadilan",
        ];

	    return $data;
	}

//===========================================================================================================================================================

	//get list data indikator nilai Nasinalisme
	function data_indikator_nasionalisme()
	{
        $data = [
                'Sila Ke-1 : Ketuhanan Yang Maha Esa' 	=> "Sila Ke-1 : Ketuhanan Yang Maha Esa",
                'Sila Ke-2 : Kemanusiaan yang adil dan beradab'  	=> "Sila Ke-2 : Kemanusiaan yang adil dan beradab",
                'Sila Ke-3 : Persatuan Indonesia'  	=> "Sila Ke-3 : Persatuan Indonesia",
                'Sila Ke-4 : Kerakyatan	yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan/perwakilan' 	=> "Sila Ke-4 : Kerakyatan	yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan/perwakilan",
                'Sila Ke-5 : Keadilan sosial bagi seluruh Indonesia'=> "Sila Ke-5 : Keadilan sosial bagi seluruh Indonesia"
        ];

	    return $data;
	}

	//get list data indikator butir nilai pancasila
	function data_indikator_sila1()
	{
        $data = [
                'Bangsa Indonesia menyatakan kepercayaannya dan ketakwaannya terhadap Tuhan Yang Maha Esa' 	=> "Bangsa Indonesia menyatakan kepercayaannya dan ketakwaannya terhadap Tuhan Yang Maha Esa",
                'Manusia Indonesia percaya dan takwa terhadap Tuhan Yang Maha Esa, sesuai dengan agama dan kepercayaannya masing-masing menurut dasar kemanusiaan yang adil dan beradab'  	=> "Manusia Indonesia percaya dan takwa terhadap Tuhan Yang Maha Esa, sesuai dengan agama dan kepercayaannya masing-masing menurut dasar kemanusiaan yang adil dan beradab",
                'Mengembangkan sikap hormat menghormati dan bekerjasama antara pemeluk agama dengan penganut kepercayaan yang berbedabeda terhadap Tuhan Yang Maha Esa'  	=> "Mengembangkan sikap hormat menghormati dan bekerjasama antara pemeluk agama dengan penganut kepercayaan yang berbedabeda terhadap Tuhan Yang Maha Esa",
                'Membina kerukunan hidup di antara sesama umat beragama dan kepercayaan terhadap Tuhan Yang Maha Esa' 	=> "Membina kerukunan hidup di antara sesama umat beragama dan kepercayaan terhadap Tuhan Yang Maha Esa",
                'Agama dan kepercayaan terhadap Tuhan Yang Maha Esa adalah masalah yang menyangkut hubungan pribadi manusia dengan Tuhan Yang Maha Esa'=> "Agama dan kepercayaan terhadap Tuhan Yang Maha Esa adalah masalah yang menyangkut hubungan pribadi manusia dengan Tuhan Yang Maha Esa",
                'Mengembangkan sikap saling menghormati kebebasan menjalankan ibadah sesuai dengan agama dan kepercayaannya masing-masing'=> "Mengembangkan sikap saling menghormati kebebasan menjalankan ibadah sesuai dengan agama dan kepercayaannya masing-masing",
                'Tidak memaksakan suatu agama dan kepercayaan terhadap Tuhan Yang Maha Esa kepada orang lain'=> "Tidak memaksakan suatu agama dan kepercayaan terhadap Tuhan Yang Maha Esa kepada orang lain",
        ];

	    return $data;
	}

	function data_indikator_sila2()
	{
        $data = [
                'Mengakui dan memperlakukan manusia sesuai dengan harkat dan martabatnya sebagai makhluk Tuhan Yang Maha Esa' 	=> "Mengakui dan memperlakukan manusia sesuai dengan harkat dan martabatnya sebagai makhluk Tuhan Yang Maha Esa",

                'Mengakui persamaan derajat, persamaan hak, dan kewajiban asasi setiap manusia, tanpa membeda-bedakan suku, keturunan, agama, kepercayaan, jenis kelamin, kedudukan sosial, warna kulit dan sebagainya'  	=> "Mengakui persamaan derajat, persamaan hak, dan kewajiban asasi setiap manusia, tanpa membeda-bedakan suku, keturunan, agama, kepercayaan, jenis kelamin, kedudukan sosial, warna kulit dan sebagainya",

                'Mengembangkan sikap saling mencintai sesama manusia'  	=> "Mengembangkan sikap saling mencintai sesama manusia",

                'Mengembangkan sikap saling tenggang rasa dan tepa selira' 	=> "Mengembangkan sikap saling tenggang rasa dan tepa selira",

                'Mengembangkan sikap tidak semena-mena terhadap orang lain'=> "Mengembangkan sikap tidak semena-mena terhadap orang lain",

                'Menjunjung tinggi nilai-nilai kemanusiaan'=> "Menjunjung tinggi nilai-nilai kemanusiaan",

                'Gemar melakukan kegiatan kemanusiaan'=> "Gemar melakukan kegiatan kemanusiaan",

                'Berani membela kebenaran dan keadilan' => "Berani membela kebenaran dan keadilan",

                'Bangsa Indonesia merasa dirinya sebagai bagian dari seluruh umat manusia' => "Bangsa Indonesia merasa dirinya sebagai bagian dari seluruh umat manusia",

                'Mengembangkan sikap hormat menghormati dan bekerjasama dengan bangsa lain' => "Mengembangkan sikap hormat menghormati dan bekerjasama dengan bangsa lain"
        ];

	    return $data;
	}

	function data_indikator_sila3()
	{
        $data = [
                'Mampu menempatkan persatuan, kesatuan, serta kepentingan dan keselamatan bangsa dan negara sebagai kepentingan bersama di atas kepentingan pribadi dan golongan' => "Mampu menempatkan persatuan, kesatuan, serta kepentingan dan keselamatan bangsa dan negara sebagai kepentingan bersama di atas kepentingan pribadi dan golongan",

                'Sanggup dan rela berkorban untuk kepentingan negara dan bangsa apabila diperlukan' => "Sanggup dan rela berkorban untuk kepentingan negara dan bangsa apabila diperlukan",

                'Mengembangkan rasa cinta kepada tanah air dan bangsa' => "Mengembangkan rasa cinta kepada tanah air dan bangsa",

                'Mengembangkan rasa kebanggaan berkebangsaan dan bertanah air Indonesia' => "Mengembangkan rasa kebanggaan berkebangsaan dan bertanah air Indonesia",

                'Memelihara ketertiban dunia yang berdasarkan kemerdekaan, perdamaian abadi, dan keadilan sosial' => "Memelihara ketertiban dunia yang berdasarkan kemerdekaan, perdamaian abadi, dan keadilan sosial",

                'Mengembangkan persatuan Indonesia atas dasar Bhinneka Tunggal Ika' => "Mengembangkan persatuan Indonesia atas dasar Bhinneka Tunggal Ika",

                'Memajukan pergaulan demi persatuan dan kesatuan bangsa' => "Memajukan pergaulan demi persatuan dan kesatuan bangsa"
        ];

	    return $data;
	}

	function data_indikator_sila4()
	{
        $data = [
                'Sebagai warga negara dan warga masyarakat, setiap manusia Indonesia mempunyai kedudukan, hak, dan kewajiban yang sama' => "Sebagai warga negara dan warga masyarakat, setiap manusia Indonesia mempunyai kedudukan, hak, dan kewajiban yang sama",

                'Tidak boleh memaksakan kehendak kepada orang lain' => "Tidak boleh memaksakan kehendak kepada orang lain",

                'Mengutamakan musyawarah dalam mengambil keputusan untuk kepentingan bersama' => "Mengutamakan musyawarah dalam mengambil keputusan untuk kepentingan bersama",

                'Musyawarah untuk mencapai mufakat diliputi oleh semangat kekeluargaan' => "Musyawarah untuk mencapai mufakat diliputi oleh semangat kekeluargaan",

                'Menghormati dan menjunjung tinggi setiap keputusan yang dicapai sebagai hasil musyawarah' => "Menghormati dan menjunjung tinggi setiap keputusan yang dicapai sebagai hasil musyawarah",

                'Dengan iktikad baik dan rasa tanggung jawab menerima dan melaksanakan hasil keputusan musyawarah' => "Dengan iktikad baik dan rasa tanggung jawab menerima dan melaksanakan hasil keputusan musyawarah",

                'Di dalam musyawarah diutamakan kepentingan bersama di atas kepentingan pribadi dan golongan' => "Di dalam musyawarah diutamakan kepentingan bersama di atas kepentingan pribadi dan golongan",

                'Musyawarah dilakukan dengan akal sehat dan sesuai dengan hati nurani yang luhur' => "Musyawarah dilakukan dengan akal sehat dan sesuai dengan hati nurani yang luhur",

                'Keputusan yang diambil harus dapat dipertanggungjawabkan secara moral kepada Tuhan Yang Maha Esa, menjunjung tinggi harkat dan martabat manusia, nilai-nilai kebenaran dan keadilan mengutamakan persatuan dan kesatuan demi kepentingan bersama' => "Keputusan yang diambil harus dapat dipertanggungjawabkan secara moral kepada Tuhan Yang Maha Esa, menjunjung tinggi harkat dan martabat manusia, nilai-nilai kebenaran dan keadilan mengutamakan persatuan dan kesatuan demi kepentingan bersama",

                'Memberikan kepercayaan kepada wakil-wakil yang dipercayai untuk melaksanakan pemusyawaratan' => "Memberikan kepercayaan kepada wakil-wakil yang dipercayai untuk melaksanakan pemusyawaratan"
        ];

	    return $data;
	}

	function data_indikator_sila5()
	{
        $data = [
                'Mengembangkan perbuatan yang luhur, yang mencerminkan sikap dan suasana kekeluargaan dan kegotongroyongan' => "Mengembangkan perbuatan yang luhur, yang mencerminkan sikap dan suasana kekeluargaan dan kegotongroyongan",

                'Mengembangkan sikap adil terhadap sesama' => "Mengembangkan sikap adil terhadap sesama",

                'Menjaga keseimbangan antara hak dan kewajiban' => "Menjaga keseimbangan antara hak dan kewajiban",

                'Menghormati hak orang lain' => "Menghormati hak orang lain",

                'Suka memberi pertolongan kepada orang lain agar dapat berdiri sendiri' => "Suka memberi pertolongan kepada orang lain agar dapat berdiri sendiri",

                'Tidak menggunakan hak milik untuk usaha-usaha yang bersifat pemerasan terhadap orang lain' => "Tidak menggunakan hak milik untuk usaha-usaha yang bersifat pemerasan terhadap orang lain",

                'Tidak menggunakan hak milik untuk hal-hal yang bersifat pemborosan dan gaya hidup mewah' => "Tidak menggunakan hak milik untuk hal-hal yang bersifat pemborosan dan gaya hidup mewah",

                'Tidak menggunakan hak milik untuk bertentangan dengan atau merugikan kepentingan umum' => "Tidak menggunakan hak milik untuk bertentangan dengan atau merugikan kepentingan umum",

                'Suka bekerja keras' => "Suka bekerja keras",

                'Suka menghargai hasil karya orang lain yang bermanfaat bagi kemajuan dan kesejahteraan bersama' => "Suka menghargai hasil karya orang lain yang bermanfaat bagi kemajuan dan kesejahteraan bersama",

                'Suka melakukan kegiatan dalam rangka mewujudkan kemajuan yang merata dan berkeadilan sosial' => "Suka melakukan kegiatan dalam rangka mewujudkan kemajuan yang merata dan berkeadilan sosial"
              	
        ];

	    return $data;
	}

//=============================================================================================================================================================

	//get list data indikator nilai Etika Publik
	function data_indikator_etika_publik()
	{
        $data = [
                'Memegang teguh nilai-nilai dalam ideologi Negara Pancasila' => "Memegang teguh nilai-nilai dalam ideologi Negara Pancasila",
                'Setia dan mempertahankan Undang-Undang Dasar Negara Kesatuan Republik Indonesia 1945' => "Setia dan mempertahankan Undang-Undang Dasar Negara Kesatuan Republik Indonesia 1945",
                'Menjalankan tugas secara profesional dan tidak berpihak' => "Menjalankan tugas secara profesional dan tidak berpihak",
                'Membuat keputusan berdasarkan prinsip keahlian' => "Membuat keputusan berdasarkan prinsip keahlian",
                'Menciptakan lingkungan kerja yang non diskriminatif'=> "Menciptakan lingkungan kerja yang non diskriminatif",
                'Memelihara dan menjunjung tinggi standar etika luhur' => "Memelihara dan menjunjung tinggi standar etika luhur",
                'Mempertanggungjawabkan tindakan dan kinerjanya kepada publik' => "Mempertanggungjawabkan tindakan dan kinerjanya kepada publik",
                'Memiliki kemampuan dalam melaksanakan kebijakan dan program pemerintah' => "Memiliki kemampuan dalam melaksanakan kebijakan dan program pemerintah",
                'Memberikan layanan kepada publik secara jujur, tanggap, cepat, tepat, akurat, berdaya guna, berhasil guna, dan santun' => "Memberikan layanan kepada publik secara jujur, tanggap, cepat, tepat, akurat, berdaya guna, berhasil guna, dan santun",
                'Mengutamakan kepemimpinan berkualitas tinggi' => "Mengutamakan kepemimpinan berkualitas tinggi",
                'Menghargai komunikasi, konsultasi, dan kerjasama' => "Menghargai komunikasi, konsultasi, dan kerjasama",
                'Mengutamakan pencapaian hasil dan mendorong kinerja pegawai' => "Mengutamakan pencapaian hasil dan mendorong kinerja pegawai",
                'Mendorong kesetaraan dalam pekerjaan' => "Mendorong kesetaraan dalam pekerjaan",
                'Meningkatkan efektivitas sistem pemerintahan yang demokratis sebagai perangkat sistem karir' => "Meningkatkan efektivitas sistem pemerintahan yang demokratis sebagai perangkat sistem karir",
        ];

	    return $data;
	}