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
            font-size: 23px;
            font-weight: bold;
            margin-top: 90px;
            margin-left: 30px;
            margin-right: 90px;
        }
        .header-subtitle {
            font-size: 16px;
            font-weight: bold;
            margin-top: 30px;
            margin-left: 35px;
            
        }
        .header-subtitle-p {
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
        }
        .header-subtitle-t {
            font-size: 15px;
            margin-top: 30px;
            margin-left: 35px;
            
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
            margin-right: 60px;
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
        display: flex; justify-content: center; align-items: center;
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
        margin: auto;      /* Center modal di layar */
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
        <!-- Konten 2/3 -->
        <div class="col-md-8">
        <!-- Judul -->
        <h1 class="header-title"><?= $jurnal->judul ?></h1>

        <!-- Tombol Aksi -->
        <div class="d-flex align-items-center mt-3 mb-3">
           <button class="btn btn-custom-back me-2 small-button" onclick="window.location.href='<?php echo site_url('pageJournal'); ?>'">
                <i class="fas fa-arrow-left"></i> Back
            </button>
            <!-- Tombol -->
            <button class="btn btn-custom-download me-2 small-button btnDownload" 
                    data-id="<?= $jurnal->id ?>" 
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
                <i class="fas fa-eye"></i> <?= $jurnal->views ?> views
            </button>
        </div>
        <hr class="horizontal-line"/>
        <!-- Tentang Penulis -->
        <h2 class="header-subtitle" style="margin-top: 20px;">Penulis</h2>
            <div style="margin-left: 35px; font-size: 14px; margin-top: 10px;">
                <p> <?= $jurnal->penyusun ?></p>
            </div>
        
        <!-- Garis Besar Jurnal -->
        <h2 class="header-subtitle">Garis Besar Jurnal</h2>
        <div class="abstract-box" style="margin-left: 35px; font-size: 14px; margin-top: 10px;">
            <p><?= $jurnal->deskripsi ?></p>
        </div>
        </div>

        <!-- Gambar 1/3 -->
        <div class="col-md-4 text-center">
        <div class="author-section">
            <img 
            alt="Thumbnail Jurnal" 
            src="<?= base_url('uploads/' . $jurnal->file_thumbnail) ?>" 
            style="width: 60%; height: auto; object-fit: contain; margin-top: 90px;"
            />
        </div>
        </div>
    </div>
    </div>

    <?php include 'templates/footer.php'; ?>
</body>
<script>
   document.querySelectorAll('.btnDownload').forEach(function(button) {
  button.addEventListener('click', function() {
    var jurnalId = this.dataset.id;
    document.getElementById('modalDownload').style.display = 'flex';
    document.getElementById('btnKirim').setAttribute('data-id', jurnalId);
  });
});

document.getElementById('btnBatal').addEventListener('click', function() {
  document.getElementById('modalDownload').style.display = 'none';
});

document.getElementById('btnKirim').addEventListener('click', function() {
  var email = document.getElementById('emailInput').value;
  var jurnalId = this.getAttribute('data-id');

  if (email.trim() === '') {
    alert('Email tidak boleh kosong!');
    return;
  }

  // Validasi email dengan regex
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert('Format email tidak valid!');
    return;
  }

  fetch("<?= base_url('index.php/jurnal/download') ?>", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `jurnal_id=${jurnalId}&email=${encodeURIComponent(email)}`
  })
  .then(res => res.text())
  .then(res => {
    console.log(res);
    document.getElementById('modalDownload').style.display = 'none';
    window.location.href = "<?= base_url('index.php/jurnal/download_file/') ?>" + jurnalId;
  });
});


</script>
</html>

