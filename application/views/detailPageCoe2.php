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
        .small-button {
            padding: 2px 10px !important;
            font-size: 10px !important;
            height: 30px !important;
            line-height: 1.2 !important;
        }
        .modal {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        display: flex; justify-content: center; align-items: center !important;
        z-index: 9999;
        }
        .modal-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        }
        .custom-modal-content {
        max-width: 600px; /* Ubah angka ini sesuai kebutuhan */
        width: 90%;        /* Biar responsif */
        margin: auto !important;      /* Center modal di layar */
        background-color: #ffffff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <?php include_once 'templates/navbar.php'; ?>
    <div class="container mt-4">
   <div class="row">
      <div class="col-md-8">
         <h1 class="header-title">
         <b><?php
            echo htmlspecialchars($detail_proper[0]['judul']);
            ?></b>
         </h1>
         <div class="d-flex align-items-center mt-3">
            <button class="btn btn-custom-back me-2" onclick="window.location.href='<?php echo site_url('coe/Publish'); ?>'">
               <i class="fas fa-arrow-left"></i> Back
            </button>
            <!-- Tombol -->
            <button class="btn btn-custom-download me-2 small-button btnDownload" 
            data-id="<?= $detail_proper[0]['id_proper'] ?>" 
            data-jenis="<?= $jenis_diklat ?>"
            data-proper="<?= $detail_proper[0]['file_proper'] ?>"
            data-bs-toggle="modal" 
            data-bs-target="#downloadModal">
            <i class="fas fa-download"></i> Download
            </button>
            <!-- Modal -->
            <div id="modalDownload" class="modal" style="display: none;">
            <div class="modal-content custom-modal-content">
                <h2 style="font-size: 18px; margin-bottom: 10px;">Apakah Anda ingin mengunduh file ini?</h2>
                <p style="font-size: 14px; margin-bottom: 20px;">Masukkan email Anda terlebih dahulu!</p>
                <input type="email" id="emailInput" class="form-control" placeholder="contoh@email.com" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 12px">
                
                <div style="margin-top: 20px; display: flex; justify-content: right; gap: 10px;">
                <button id="btnBatal" class="btn btn-custom-back small-button" style="font-size: 0.8rem !important;"> Batal </button>
                <button id="btnKirim" class="btn btn-custom-download small-button" style="font-size: 0.8rem !important;">Kirim</button>
                </div>
            </div>
            </div>
            <button class="btn btn-custom-views me-2 small-button">
                <i class="fas fa-eye"></i> <?php echo $detail_proper[0]['views']; ?> views
            </button>
         </div>
      </div>
      <div class="col-md-4 text-center">
         <div class="author-section">
            <img alt="Author's photo" src="<?= base_url('assets/foto_profil/') . $detail_proper[0]['file_foto']; ?>" alt="User Avatar">
         </div>
      </div>
   </div>
   <hr class="horizontal-line"/>
   <div class="row">
      <div class="col-md-8">
         <h2 class="header-subtitle"></h2>
         <div class="abstract-box">
            <?php
            echo $detail_proper[0]['abstraksi'];
            ?>
         </div>
      </div>
      <div class="col-md-4">
         <h2 class="header-subtitle-p">Tentang Penyusun</h2>
         <div class="author-table">
            <table class="table">
            <tr>
                                <td>Nama Penyusun</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['nama']); ?></td>
                            </tr>
            <tr>
                                <td>Nama Pelatihan</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['nama_pelatihan']); ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['jabatan']); ?></td>
                            </tr>
                            <tr>
                                <td>OPD</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['opd']); ?></td>
                            </tr>
                            <tr>
                                <td>Pemda</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['pemda']); ?></td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                
                                <td><?php echo htmlspecialchars($detail_proper[0]['email']); ?></td>
                            </tr>
            </table>
         </div>
      </div>
      <!-- PDF Viewer -->
      <h2 class="header-subtitle">Pratinjau Inovasi</h2>
        <div style="margin: 0px 35px; margin-bottom: 35px;">
            <iframe 
                src="<?= base_url('assets/inovasi/la/' . $detail_proper[0]['file_proper']) ?>" 
                width="60%" 
                height="500px" 
                style="border: 1px solid #ccc; border-radius: 8px;">
            </iframe>
        </div>
        </div>
   </div>
   </div>
    <?php include 'templates/footer.php'; ?>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let selectedDownload = null;

    // Saat tombol download diklik
    document.querySelectorAll('.btnDownload').forEach(button => {
        button.addEventListener('click', function () {
            selectedDownload = {
                id: this.dataset.id,
                jenis: this.dataset.jenis,
                fileLA: this.dataset.la,
                fileProper: this.dataset.proper
            };
            document.getElementById('modalDownload').style.display = 'block';
        });
    });

    // Tombol batal
    document.getElementById('btnBatal').addEventListener('click', function () {
        document.getElementById('modalDownload').style.display = 'none';
    });

    // Tombol kirim (download)
    document.getElementById('btnKirim').addEventListener('click', function () {
        const email = document.getElementById('emailInput').value.trim();
        if (!email || !validateEmail(email)) {
            alert('Masukkan email yang valid!');
            return;
        }

        // Sembunyikan modal
        document.getElementById('modalDownload').style.display = 'none';

        // Tentukan URL download dari data yang dipilih
        let downloadUrl = '';
        if (selectedDownload.jenis === 'latsar') {
            downloadUrl = "<?= base_url('assets/latsar/aktualisasi/la/') ?>" + encodeURIComponent(selectedDownload.fileLA);
        } else {
            downloadUrl = "<?= base_url('assets/inovasi/la/') ?>" + encodeURIComponent(selectedDownload.fileProper);
        }

        // Arahkan browser ke URL tersebut
        window.location.href = downloadUrl;
        fetch("<?= base_url('index.php/coe/Publish/download_inovasi') ?>", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `inovasi_id=${selectedDownload.id}&email=${encodeURIComponent(email)}`
  })

        // Reload halaman sedikit setelahnya
        setTimeout(() => {
            location.reload();
        }, 300);
    });

    // Validasi email sederhana
    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
});
</script>

</html>
