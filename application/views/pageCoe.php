<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Center of Excellence
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Merriweather:wght@300;700&display=swap" rel="stylesheet">

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
            font-family: 'Playfair Display', serif;
            background-image: url('uploads/image/batik.jpg'); /* Ganti dengan lokasi file gambar batik */
    background-position: center;
    color: white;
    text-align: center;
    height: 38vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 1;
    overflow: hidden; /* Pastikan elemen anak tidak keluar */
}

.header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.74); /* Hitam dengan transparansi 50% */
    z-index: -1; /* Menempatkan layer di belakang konten */
}

.header h1, .header p {
    position: relative; /* Agar berada di atas layer transparan */
    z-index: 2;
}
        .header h1 {
            font-size: 5rem;
            font-weight: bold;
        }
        .header p {
            font-size: 3rem;
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
            font-size: 30px;
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
            background-color:rgba(0, 0, 0, 0.83);
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
          <a class="btn text-white" href="#" style="background-color: #1EAFEC; font-size: 20px; padding: 5px 25px;">
            <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i> Login
          </a>
        </li>
      </ul>
    </div>
   </div>
  </nav>  
  <div class="header">
   <h1>
    <br />
    DIREKTORI
   </h1>
   <p>
    Inovasi dan Rencana Tindak lanjut
   </p>
  </div>
  <div class="section-spacing"></div>
  <div class="filter-section text-center">
   <div aria-label="Basic example" class="btn-group" role="group">
    <button class="btn btn-secondary" type="button">
     Kepemimpinan
     <span class="badge bg-light text-dark">
      20345
     </span>
    </button>
    <button class="btn btn-secondary" type="button">
     Latsar
     <span class="badge bg-light text-dark">
      9
     </span>
    </button>
    <button class="btn btn-secondary" type="button">
     Statistik
     <span class="badge bg-light text-dark">
      <i class="fas fa-chart-bar">
      </i>
     </span>
    </button>
   </div>
   <div class="mt-3">
    <select aria-label="Pilih Tahun" class="form-select d-inline-block w-auto">
     <option selected="">
      --Pilih Tahun--
     </option>
    </select>
    <select aria-label="Pilih Diklat" class="form-select d-inline-block w-auto">
     <option selected="">
      --Pilih Diklat--
     </option>
    </select>
    <button class="btn btn-secondary" type="button">
     Tampilkan
    </button>
   </div>
  </div>
  <div class="table-section">
   <div class="container">
    <table class="table table-bordered">
     <thead>
      <tr>
       <th>
        No
       </th>
       <th>
        Judul Inovasi
       </th>
       <th>
        Nama Penulis
       </th>
       <th>
        OPD
       </th>
       <th>
        Jabatan
       </th>
       <th>
        File
       </th>
      </tr>
     </thead>
     <tbody>
      <tr>
       <td>
        1
       </td>
       <td>
        E-PANDUAN KERJA SUB BAGIAN PERENCANAAN DAN KEUANGAN DI KECAMATAN RINGINARUM KABUPATEN KENDAL
       </td>
       <td>
        Achmad Soleh, S.IP
       </td>
       <td>
        DINAS PEKERJAAN UMUM DAN PENATAAN RUANG
       </td>
       <td>
        Kepala Sub Bagian Perencanaan Dan Keuangan
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        2
       </td>
       <td>
        PENATAAN BARANG BERASIS SISTEM INFORMASI MANAJEMEN INVENTARIS BARANG DI RUMAH SAKIT UMUM DAERAH dr. R. GOETENG TAROENADIBRATA PURBALINGGA
       </td>
       <td>
        DWI NUR SETYAWATI, SH
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        3
       </td>
       <td>
        APLIKASI SIMPONI DALAM PENYUSUNAN FORMASI PEGAWAI BERDASARKAN ANALISIS JABATAN DAN ANALISIS BEBAN KERJA PADA PEMERINTAH KABUPATEN PATI
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Pati
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        4
       </td>
       <td>
        E-PANDUAN KERJA SUB BAGIAN PERENCANAAN DAN KEUANGAN DI KECAMATAN RINGINARUM KABUPATEN KENDAL
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        5
       </td>
       <td>
        PENATAAN BARANG BERASIS SISTEM INFORMASI MANAJEMEN INVENTARIS BARANG DI RUMAH SAKIT UMUM DAERAH dr. R. GOETENG TAROENADIBRATA PURBALINGGA
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        6
       </td>
       <td>
        E-PANDUAN KERJA SUB BAGIAN PERENCANAAN DAN KEUANGAN DI KECAMATAN RINGINARUM KABUPATEN KENDAL
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        7
       </td>
       <td>
        E-PANDUAN KERJA SUB BAGIAN PERENCANAAN DAN KEUANGAN DI KECAMATAN RINGINARUM KABUPATEN KENDAL
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
      <tr>
       <td>
        8
       </td>
       <td>
        E-PANDUAN KERJA SUB BAGIAN PERENCANAAN DAN KEUANGAN DI KECAMATAN RINGINARUM KABUPATEN KENDAL
       </td>
       <td>
        WILLY YOGA SUSETYA, S.Kom
       </td>
       <td>
        Pemerintah Kabupaten Purbalingga
       </td>
       <td>
        Kasi Perlengkapan RSUD dr. Goeteng Taroenadibrata, Kab. Purbalingga
       </td>
       <td>
        <a class="btn btn-link" href="#">
         Download
        </a>
       </td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>
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
</html>
