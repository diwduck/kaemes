<html lang="en">
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
            transform: scale(1);
            zoom: 100%;
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
 <?php include_once 'templates/navbar.php'; ?>  
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
  <?php include 'templates/footer.php'; ?>
  </body>
</html>
