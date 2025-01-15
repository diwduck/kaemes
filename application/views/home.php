<!DOCTYPE html>
<html lang="en">
 <head>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
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
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
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
        .btn-read-more, .see-all-btn {
            background-color: black;
            color: white;
            border-radius: 20px;
            padding: 5px 20px;
            text-decoration: none;
            display: inline-block;
        }
        .see-all-btn {
            border-radius: 10px;
            display: block;
            margin: 30px auto 100px auto; /* Center the button and add more space below */
            width: 100px;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            width: 100%;
            margin: 0;
        }
        .footer a {
            color: white;
        }
        .footer .social-icons a {
            font-size: 30px;
            margin: 0 10px;
            background-color: #3b5998;
            color: white;
            border-radius: 50%;
            padding: 20px;
            width: 70px;
            height: 70px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        .footer .social-icons a:hover {
            color: #3498db;
        }
        .footer .contact-info, .footer .location {
            margin-bottom: 20px;
        }
        .footer .location iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }
        .footer .online-status {
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .footer-bottom {
            background-color: #000;
            color: white;
            padding: 10px 0;
            width: 100%;
            margin: 0;
        }
        .footer-bottom p {
            margin: 0;
        }
        .footer .row > div {
            margin-bottom: 20px;
        }
        .footer .location {
            margin-left: 150px;
        }
        .footer h5 {
            text-decoration: underline;
            text-underline-offset: 10px;
            margin-bottom: 40px;
            text-decoration-color: rgba(255, 255, 255, 0.5);
        }
        .footer .contact-info {
            margin-left: 150px;
        }
        .footer .contact-info i {
            font-size: 30px;
            margin-right: 10px;
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

  </style>
 </head>
 <body>


<!-- Modal Structure -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your login form here -->
        <form id="loginForm">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <nav class="navbar navbar-expand-lg fixed-top">
   <div class="container-fluid">
    <a class="navbar-brand" href="#" style="display: flex; align-items: center; text-decoration: none; margin-left: 40px;">
      <img 
        alt="Logo" 
        class="d-inline-block align-text-top" 
        height="75" 
        src="https://bpsdmd.jatengprov.go.id/web/assets/front/logo/jateng.png" 
        width="75"
      />
      <div style="margin-left: 15px; color: white; text-align: left; line-height: 1.2;">
        <strong style="font-size: 30px;">BPSDMD</strong><br />
        <span style="font-size: 20px;">Provinsi Jawa Tengah</span>
      </div>
    </a>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
     <span class="navbar-toggler-icon">
     </span>
    </button>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" 
      class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="font-size: 20px; gap: 40px;">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-home" style="font-size: 20px;"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-book" style="font-size: 20px;"></i> Modul
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-newspaper" style="font-size: 20px;"></i> e-Journal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-book-open" style="font-size: 20px;"></i> e-Warta
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-bookmark" style="font-size: 20px;"></i> COE
          </a>
        </li>
        <li class="nav-item">
  <!-- Login Button -->
<button 
  class="btn nav-link text-white" 
  data-bs-toggle="modal" 
  data-bs-target="#loginModal" 
  id="loginButton"
  style="background-color: #1EAFEC; font-size: 20px; padding: 5px 25px;">
  <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i> Login
</button>
<!-- Logout Button (Initially Hidden) -->
<button 
  class="btn nav-link text-white d-none" 
  id="logoutButton"
  style="background-color: #FF0000; font-size: 20px; padding: 5px 25px;">
  <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i> Logout
</button>
</li>
      </ul>
    </div>
   </div>
  </nav>
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
      <img alt="Modul cover" height="150" src="https://placehold.co/150x200" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Modul 1: Pengelolaan Pengetahuan
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="card">
      <img alt="Modul cover" height="150" src="https://placehold.co/150x200" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Modul 2: Manajemen Inovasi
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="card">
      <img alt="Modul cover" height="150" src="https://placehold.co/150x200" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Modul 3: Strategi Pelayanan Publik
       </p>
      </div>
     </div>
    </div>
   </div>
   <a class="btn btn-read-more see-all-btn" href="#">
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
      <img alt="Journal cover" height="150" src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Model Pemberdayaan Masyarakat Peduli Lingkungan Untuk Meningkatkan Kualitas Lingkungan Hidup di Kabupaten Semarang
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="card">
      <img alt="Journal cover" height="150" src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Model Collaborative Governance untuk Perencanaan Program dan Anggaran di Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="card">
      <img alt="Journal cover" height="150" src="https://storage.googleapis.com/a1aa/image/WPCdP8h3YoZzEdsfMDxhPUOcqKbilIV09yZNiuJrmpjrOpBKA.jpg" width="100"/>
      <div class="card-body">
       <p class="card-text">
        Program Intensifikasi dan Ekstensifikasi Pajak Parkir dan Pajak Restoran Dalam Meningkatkan Pendapatan Asli Daerah di Kota Pekalongan
       </p>
      </div>
     </div>
    </div>
   </div>
   <a class="btn btn-read-more see-all-btn" href="#">
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
   <a class="btn btn-read-more see-all-btn" href="#">
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
   <a class="btn btn-read-more see-all-btn" href="#">
    see all
   </a>
  </section>


  <footer class="footer">
   <div class="container-fluid">
    <div class="row">
     <div class="col-md-4">
      <h5 style="margin-left: 150px;">
       LOKASI KAMI
      </h5>
      <div class="location">
       <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.8999128878829!2d110.41225892082508!3d-7.056238088469562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708be28f16c1d3%3A0x927d4b8b2b3edf4!2sSasana%20Widya%20Praja%20-%20BPSDMD%20Provinsi%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1578813965036!5m2!1sid!2sid">
       </iframe>
      </div>
     </div>
     <div class="col-md-4">
      <h5 class="contact-info">
       HUBUNGI KAMI
      </h5>
      <div class="contact-info">
       <p>
        <i class="fas fa-map-marker-alt fa-2x">
        </i>
        Jalan Setiabudi 201 A Semarang, 50235
       </p>
       <p>
        <i class="fas fa-phone fa-2x">
        </i>
        Telepon : (024) 7473066
       </p>
       <p>
        <i class="fas fa-envelope fa-2x">
        </i>
        E-Mail : bpsdmd@jatengprov.go.id
       </p>
       <p>
        <i class="fas fa-sms fa-2x">
        </i>
        WA / SMS : 0811 283 5000
       </p>
       <p>
        <i class="fas fa-fax fa-2x">
        </i>
        Fax : (024) 7473701
       </p>
      </div>
     </div>
     <div class="col-md-4">
      <h5>
       IKUTI KAMI
      </h5>
      <div class="social-icons">
       <a href="https://www.facebook.com/npsdmdjateng/">
        <i class="fab fa-facebook">
        </i>
       </a>
       <a href="https://twitter.com/bpsdmdjtg">
        <i class="fab fa-twitter">
        </i>
       </a>
       <a href="https://bpsdmd.jatengprov.go.id/web/Home">
        <i class="fas fa-globe">
        </i>
       </a>
       <a href="https://www.instagram.com/bpsdmdjtg/">
        <i class="fab fa-instagram">
        </i>
       </a>
       <a href="https://www.youtube.com/channel/UCNVPtumnMDXhQgEOgt8D6Eg/videos">
        <i class="fab fa-youtube">
        </i>
       </a>
      </div>
     </div>
    </div>
   </div>
  </footer>
  <div class="footer-bottom text-center">
   <p>
   Made With <i class="fa fa-heart"></i> By <a> diwazaa </a>, Internship Informatics'22 Diponegoro University
   </p>
   <p>
    © BPSDMD Provinsi Jawa Tengah 2025 - All rights reserved.
   </p>
  </div>
  </body>
  <script>
  // Function to handle login
  function handleLogin(event) {
    event.preventDefault(); // Prevent form submission
    
    // Simulate successful login (you can replace this with your actual login logic)
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // For demonstration, check if both fields are filled
    if (username && password) {
      // Hide the modal
      const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.hide();
      
      // Toggle visibility of login/logout buttons
      document.getElementById('loginButton').classList.add('d-none');
      document.getElementById('logoutButton').classList.remove('d-none');
    } else {
      // Handle login validation/error display if needed
      alert('Please enter both username and password.');
    }
  }
  
  // Add event listener for login form submission
  document.getElementById('loginForm').addEventListener('submit', handleLogin);
</script>
</html>