<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPSDMD Jawa Tengah</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            zoom: 100%;
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 90px;
            margin-left: 30px;
            margin-right: 90px;
        }
        .header-subtitle {
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
            margin-left: 35px;
            
        }
        .header-subtitle-p {
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
        }
        .btn-custom-back{
            background-color: rgb(0, 0, 0) !important; /* Warna biru */
            color: white !important;
            margin-left: 30px;
            padding: 5px 20px !important; /* Memberikan ruang di dalam tombol */
            border-radius: 30px !important; /* Membuat sudut melengkung */
            cursor: pointer; /* Mengubah kursor saat hover */
            font-size: 12px !important;
            
        }
        .btn-custom-download{
            background-color: rgb(91, 175, 235) !important; /* Warna biru */
            color: white !important;
            padding: 5px 20px !important; /* Memberikan ruang di dalam tombol */
            border-radius: 30px !important; /* Membuat sudut melengkung */
            cursor: pointer; /* Mengubah kursor saat hover */
            font-size: 12px !important;
        }
        .btn-custom-views{
            background-color: rgb(255, 255, 255) !important; /* Warna biru */
            border: none; /* Menghilangkan border */
            padding: 5px 20px !important; /* Memberikan ruang di dalam tombol */
            border-radius: 30px !important; /* Membuat sudut melengkung */
            cursor: pointer; /* Mengubah kursor saat hover */
            font-size: 12px !important;
            border: 1px solid #000 !important; /* Menghilangkan border */
        }
        .btn-custom:hover {
            background-color: #0056b3;
            
        }
        .author-section img {
            width: 200px;
            height: 150px;
            border-radius: 5px;
            margin-top: 90px;
        }
        .location-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: white;
        }
        .horizontal-line {
            border-top: 3px solid #000 !important;
            margin: 20px 0;
            margin-left: 30px;
        }
        .author-table {
            background-color: #fff;
            padding: 10px;
            margin-top: 5px;
            margin-left: -10px;
            border-collapse: collapse; /* Menggabungkan garis agar lebih rapi */
            width: 100%;
        }
        .author-table th, .author-table td {
            border: 1px solid #000; /* Garis dalam tabel */
            padding: 8px;
            text-align: left;
            text-align: left;
            font-weight: normal;
            font-size: 15px;
        }
        .abstract-box {
            margin-left: 35px;
            margin-right: 90px;
        }
        
    </style>
</head>
<body>
    <?php include_once 'templates/navbar.php'; ?>
    <div class="container mt-4">
   <div class="row">
      <div class="col-md-8">
         <h1 class="header-title">
            <?= $modul->nama_modul ?>
         </h1>
         <div class="d-flex align-items-center mt-3">
            <button class="btn btn-custom-back me-2">
               <i class="fas fa-arrow-left"></i> Back
            </button>
            <button class="btn btn-custom-download me-2">
               <i class="fas fa-download"></i> Download
            </button>
            <button class="btn btn-custom-views me-2">
               <i class="fas fa-eye"></i> 4 views
            </button>
         </div>
      </div>
      <div class="col-md-4 text-center">
         <div class="author-section">
            <img alt="Author's photo" src="<?= base_url('uploads/' . $modul->thumbnail) ?>" />
         </div>
      </div>
   </div>
   <hr class="horizontal-line"/>
   <div class="row">
      <div class="col-md-8">
         <h2 class="header-subtitle">Abstrak</h2>
         <div class="abstract-box">
            <p><?= $modul->deskripsi ?></p>
         </div>
      </div>
      <div class="col-md-4">
         <h2 class="header-subtitle-p">Tentang Penyusun</h2>
         <div class="author-table">
            <table class="table">
               <tr>
                  <th>Nama Penyusun</th>
                  <td><?= $modul->penyusun_1 ?>
                      <br />
                      <?= $modul->penyusun_2 ?>
                      <br />
                      <?= $modul->penyusun_3 ?>
                  </td>
               </tr>
               <tr>
                  <th>Jenis Kompetensi</th>
                  <td><?= $modul->jenis_kompetensi ?></td>
               </tr>
               <tr>
                  <th>Lembaga Penerbit</th>
                  <td><?= $modul->lembaga_penerbit ?></td>
               </tr>
               <tr>
                  <th>Tanggal</th>
                  <td><?= date('d M Y', strtotime($modul->timestamp)) ?></td>
               </tr>
            </table>
         </div>
      </div>
   </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

