<!DOCTYPE html>
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   E-Warta
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            transform: scale(1);
            zoom: 100%;
        }
        .header {
            font-family: 'Playfair Display', serif;
            background-image: url('<?php echo base_url('uploads/image/batik.jpg')?>');
            background-position: center;
            color: white;
            text-align: center;
            height: 30vh;
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
        .card-title-j {
            font-size: 13px;
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
    Modul
   </h1>
   <p>
    
   </p>
  </div>
  <div class="container my-4">
  <!-- Search bar dan dropdown filter -->
  <div class="row mb-3">
    <div class="col-12 d-flex gap-2">
      <div class="input-group" style="max-width: 300px; font-size: 0.8rem;">
        <input
            type="text"
            id="searchInput"
            class="form-control border-end-0"
            placeholder="Cari..."
            style="font-size: 0.8rem;"
        />
        <span class="input-group-text bg-white border-start-0">
            <i class="bi bi-search"></i>
        </span>
      </div>

      <select id="sortSelect" class="form-select w-auto" style="font-size: 0.8rem;">
        <option selected>Urutkan</option>
        <option value="terbaru">Terbaru</option>
        <option value="terlama">Terlama</option>
      </select>
    </div>
  </div>
  
  
   <div class="container my-4">
  <p class="fw-semibold mb-2">Semua Modul Ditampilkan:</p>
  <div class="row justify-content-left" style="margin-left: 1cm; margin-right: 1cm;">
    <?php foreach ($modul as $item): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
        <a href="<?= site_url('modul/detailModul/' . $item->id) ?>" class="text-decoration-none text-dark">
          <div class="card custom-card h-100 shadow-sm">
            <!-- Ganti dengan gambar default jika tidak ada thumbnail -->
            <img alt="Thumbnail" class="card-img-top"
                 style="height: 130px; width: 100%; object-fit: cover !important; "
                 src="<?= base_url('uploads/' . ($item->thumbnail ?? 'default-modul.png')) ?>" />
            <div class="card-body p-2">
              <h6 class="card-title-j mb-1"><?= $item->nama_modul ?></h6>
              <p class="card-text small-text mb-0" style="font-size: 0.65rem;">
                <?= $item->deskripsi ?>
              </p>
              <p class="card-text extra-small mb-1" style="font-size: 0.65rem;">
                <?= $item->lembaga_penerbit ?>
              </p>
              <p class="card-text small-text mb-1" style="font-size: 0.65rem;">
                <?= implode(', ', array_filter([$item->penyusun_1, $item->penyusun_2, $item->penyusun_3])) ?>
              </p>
              <p class="card-text extra-small mb-2" style="font-size: 0.65rem;">
                  <?= date('d M Y', strtotime($item->timestamp)) ?> | <?= $item->views ?> views
              </p>
              <!-- Ikon download kanan bawah -->
            <div class="position-absolute bottom-0 end-0 m-2">
            <button class="btn btn-sm btn-light btnDownload" data-id="<?= $item->id ?>">
                <i class="bi bi-cloud-download-fill fs-5" style="color:rgb(104, 188, 248);"></i>
            </button>
            <!-- Modal Download -->
            <div id="modalDownload" class="modal" style="display: none; align-items: center; justify-content: center; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 9999;">
            <div class="modal-content custom-modal-content" style="background: white; padding: 20px; border-radius: 8px; width: 300px;">
                <h2 style="font-size: 18px; margin-bottom: 10px;">Apakah Anda ingin mengunduh file ini?</h2>
                <p style="font-size: 14px; margin-bottom: 20px;">Masukkan email Anda terlebih dahulu!</p>
                <input type="email" id="emailInput" class="form-control" placeholder="contoh@email.com" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 12px">
                
                <div style="margin-top: 20px; display: flex; justify-content: right; gap: 10px;">
                <button id="btnBatal" class="btn btn-custom-back small-button" style="font-size: 0.8rem !important;">Batal</button>
                <button id="btnKirim" class="btn btn-custom-download small-button" style="font-size: 0.8rem !important;">Kirim</button>
                </div>
            </div>
            </div>
            </div>

              
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

  </div>
  <?php include 'templates/footer.php'; ?>
 </html>