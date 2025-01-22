<html lang="en">
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   Knowledge Management System
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            transform: none !important;
            zoom: 100% !important;
        }
        .header {
            color: white;
            text-align: center;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .header video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        .header h1, .header p {
            position: relative;
            z-index: 1;
        }
        .header h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .header p {
            font-size: 1.25rem;
        }
        .card-container {
            position: relative;
            top: -20%;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 375px; /* Adjust the height as needed */
        }
        .card i {
            font-size: 50px;
            margin: 20px auto;
            color: black;
        }
        .card-title {
            font-weight: bold;
        }
        .card-text {
            color: #666;
        }
        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 40px 0;
            position: relative;
        }
        .section-title::before, .section-title::after {
            content: ""; /* Membuat garis */
            flex: 1; /* Membuat garis fleksibel agar proporsional */
            height: 2px; /* Ketebalan garis */
            background-color: #000; /* Warna garis */
            margin: 0 10px; /* Jarak garis dari teks */
          }
        .section-title span {
            display: block; /* Membuat elemen menjadi blok penuh */
            font-size: 2.5rem; /* Ukuran font besar */
            font-weight: bold; /* Tebal untuk menonjolkan teks */
            font-family: 'Poppins', sans-serif; /* Pilih font yang elegan */
            color: #333; /* Warna teks */
            
            letter-spacing: 2px; /* Tambahkan jarak antar huruf */
            
            text-align: center; /* Rata tengah */
            position: relative; /* Dibutuhkan untuk posisi garis bawah */
        }
        .section-title span::after {
            content: ""; /* Membuat garis */
            position: absolute; /* Agar dapat diatur posisinya relatif ke teks */
            left: 50%; /* Memulai dari tengah */
            transform: translateX(-50%); /* Menempatkan garis tepat di tengah */
            bottom: -5px; /* Jarak garis dari teks */
            width: 100%; /* Panjang garis sama dengan teks */
            height: 2px; /* Ketebalan garis */
            background-color: #000; /* Warna garis */
        }
        .content-box {
            background-color: white;
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .section-spacing {
            margin-top: 50px; /* Adjust the spacing as needed */
        }
        .more a {
            font-weight: bold;
            color: blue;
            text-decoration: underline;
            background-color: transparent;
        }
    html {
    scroll-behavior: smooth;
    }
  </style>
 </head>
 <body>
 <?php include_once 'templates/navbar.php'; ?>
  <header class="header">
   <video autoplay="" loop="" muted="">
    <source src="https://ppid.bpsdmd.jatengprov.go.id/assets/video/intro1580744592.mp4" type="video/mp4"/>
   </video>
   <div class="container">
    <h1>
     Knowledge Management System
    </h1>
    <p style="font-size: 25px;">
     Pengetahuan Terstruktur, Kolaborasi Terintegrasi, Pelayanan Inovatif
    </p>
   </div>
  </header>
  <section class="card-container py-5">
   <div class="container">
    <div class="row text-center">
     <div class="col-md-3 mb-4">
      <div class="card">
       <i class="fas fa-layer-group">
       </i>
       <div class="card-body">
        <h5 class="card-title">
         Modul
        </h5>
        <p class="card-text">
        Akses mudah ke berbagai modul pengajaran yang lengkap dan terorganisir, memudahkan pengajar dan siswa dalam mempersiapkan dan mengelola materi pembelajaran.
        </p>
        <a class="btn btn-read-more" href="#modul">
         Read More
        </a>
       </div>
      </div>
     </div>
     <div class="col-md-3 mb-4">
      <div class="card">
       <i class="fas fa-book">
       </i>
       <div class="card-body">
        <h5 class="card-title">
         e-Journal
        </h5>
        <p class="card-text">
        Platform digital untuk publikasi artikel ilmiah, penelitian, dan jurnal akademik yang memungkinkan akses cepat dan kolaborasi antar penulis dan pembaca.
        </p>
        <a class="btn btn-read-more" href="#e-journal">
         Read More
        </a>
       </div>
      </div>
     </div>
     <div class="col-md-3 mb-4">
      <div class="card">
       <i class="fas fa-book-open">
       </i>
       <div class="card-body">
        <h5 class="card-title">
         e-Warta
        </h5>
        <p class="card-text">
        Media informasi digital yang menyajikan berita terkini, pengumuman, dan perkembangan terbaru di dunia pendidikan untuk memperluas wawasan komunitas akademik.
        </p>
        <a class="btn btn-read-more" href="#e-warta">
         Read More
        </a>
       </div>
      </div>
     </div>
     <div class="col-md-3 mb-4">
      <div class="card">
       <i class="fas fa-bookmark">
       </i>
       <div class="card-body">
        <h5 class="card-title">
         COE
        </h5>
        <p class="card-text">
        Fasilitas untuk mengelola dan melacak inovasi terbaru serta rencana tindak lanjut untuk pengembangan pendidikan yang lebih baik dan berkelanjutan.
        </p>
        <a class="btn btn-read-more" href="#coe">
         Read More
        </a>
       </div>
      </div>
     </div>
    </div>
    <div class="row text-center">
     <div class="col-12">
      <br/>
      <a class="more a" href="#kms" style="font-size: 25px;">
       Lihat selengkapnya disini!
      </a>
     </div>
    </div>
   </div>
  </section>
  <section class="container" id="kms">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-lightbulb">
     </i>
     Knowledge Management System
    </span>
   </div>
   <div class="content-box text-center">
    <p>
     Knowledge Management System BPSDM Jawa Tengah hadir sebagai solusi strategis untuk mendukung pengelolaan pengetahuan secara terstruktur dan sistematis, sehingga dapat meningkatkan kolaborasi yang lebih erat antar pegawai di berbagai unit kerja. Dengan adanya KMS, akses terhadap informasi strategis menjadi lebih cepat, akurat, dan terpusat, yang secara langsung dapat mendorong pengembangan kompetensi individu maupun organisasi. Sistem ini juga berperan penting dalam meningkatkan efektivitas dan inovasi pelayanan publik, guna menciptakan pemerintahan yang responsif, adaptif, dan berorientasi pada kepuasan masyarakat. Melalui pemanfaatan KMS, diharapkan BPSDM Jawa Tengah mampu mewujudkan tata kelola pemerintahan yang lebih baik sekaligus mendukung peningkatan kinerja organisasi secara menyeluruh.
    </p>
   </div>
  </section>
  <section class="container section-spacing" id="modul">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-book" style="font-size: 40px;">
     </i>
     Modul
    </span>
   </div>
   <div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <br />
            <img 
                alt="Modul cover" 
                src="uploads/image/ayam1.png" 
                class="mx-auto d-block" 
                height="200" 
                width="150"
            />
            <div class="card-body">
                <p class="card-text">
                    Modul 1: Pengelolaan Pengetahuan
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <br />
            <img 
                alt="Modul cover" 
                src="uploads/image/ayam1.png"  
                class="mx-auto d-block" 
                height="200" 
                width="150"
            />
            <div class="card-body">
                <p class="card-text">
                    Modul 2: Manajemen Inovasi
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <br />
            <img 
                alt="Modul cover" 
                src="uploads/image/ayam1.png"  
                class="mx-auto d-block" 
                height="200" 
                width="150"
            />
            <div class="card-body">
                <p class="card-text">
                    Modul 3: Strategi Pelayanan Publik
                </p>
            </div>
        </div>
    </div>
</div>

   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageModul'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="e-journal">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-newspaper" style="font-size: 40px;">
     </i>
     e-Journal
    </span>
   </div>
   <div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <img 
                alt="Journal cover" 
                src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" 
                class="mx-auto d-block" 
                height="150" 
                width="100"
            />
            <div class="card-body">
                <p class="card-text">
                    Model Pemberdayaan Masyarakat Peduli Lingkungan Untuk Meningkatkan Kualitas Lingkungan Hidup di Kabupaten Semarang
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img 
                alt="Journal cover" 
                src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" 
                class="mx-auto d-block" 
                height="150" 
                width="100"
            />
            <div class="card-body">
                <p class="card-text">
                    Model Collaborative Governance untuk Perencanaan Program dan Anggaran di Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img 
                alt="Journal cover" 
                src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" 
                class="mx-auto d-block" 
                height="150" 
                width="100"
            />
            <div class="card-body">
                <p class="card-text">
                    Program Intensifikasi dan Ekstensifikasi Pajak Parkir dan Pajak Restoran Dalam Meningkatkan Pendapatan Asli Daerah di Kota Pekalongan
                </p>
            </div>
        </div>
    </div>
</div>

   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageJournal'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="e-warta">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-book-open" style="font-size: 40px;">
     </i>
     e-Warta
    </span>
   </div>
   <div class="row justify-content-center">
    <div class="col-md-5">
     <img alt="Group of people in a meeting" class="img-fluid" height="300" src="https://storage.googleapis.com/a1aa/image/IdbdF8Cjf91vWab06296BK1VcVKZfC5QQhBH7zc7woNhdSDUA.jpg" width="500"/>
    </div>
    <div class="col-md-5">
     <img alt="Person giving a presentation" class="img-fluid" height="300" src="https://storage.googleapis.com/a1aa/image/B6hNLeUVJiVVYKbppfDWmItKMHeJo27WyCbf2Knvrjom1JNQB.jpg" width="500"/>
    </div>
   </div>
   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageWarta'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="coe">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-bookmark" style="font-size: 40px;">
     </i>
     Center of Excellence
    </span>
   </div>
   <div class="content-box text-center">
    <p>
     Center of Excellence (CoE) BPSDM Jawa Tengah adalah pusat bahan pengajaran yang dirancang untuk mendukung pembelajaran dan pengembangan kompetensi aparatur. CoE menyediakan berbagai sumber daya, termasuk modul pelatihan, materi pembelajaran, panduan praktis terbaik, media pembelajaran interaktif, serta akses ke jurnal dan penelitian. Dengan menyediakan bahan pengajaran yang terintegrasi dan berkualitas, CoE menjadi sarana utama untuk meningkatkan kapasitas dan kinerja aparatur, sekaligus memperkuat peran BPSDM sebagai pusat rujukan pengembangan kompetensi di Jawa Tengah.
    </p>
   </div>
   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageCoe'); ?>">
    see all
   </a>
  </section>
  <?php include 'templates/footer.php'; ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        document.body.style.transform = 'none';
        document.body.style.zoom = '100%';
    });
</script>
</body>
</html>
