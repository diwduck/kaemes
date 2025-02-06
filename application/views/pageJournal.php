
<!DOCTYPE html>
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   E-Journal
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
            background-color: rgba(0, 0, 0, 0.66); /* Hitam dengan transparansi 50% */
            z-index: -1; /* Menempatkan layer di belakang konten */
        }

        .header h1, .header p {
            position: relative; /* Agar berada di atas layer transparan */
            z-index: 2;
        }
        .header h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .header p {
            font-size: 3rem;
        }
        /* Container Card */
        .custom-card {
            max-width: 120%;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        /* Efek Hover */
        .custom-card:hover {
            transform: scale(1.05);
        }

        /* Ukuran Gambar */
        .custom-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
        }

        /* Judul Berita */
        .custom-card .card-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Teks kecil di bawah judul */
        .small-text {
            font-size: 12px;
            color: gray;
            margin-bottom: 3px;
        }

        .extra-small {
            font-size: 9px;
            color: gray;
            margin-bottom: 4px;
}

        /* Tombol Download */
        .custom-card .btn {
            font-size: 8px;
            padding: 3px 10px;
            border-radius: 15px;
        }
        /* Search Bar */
            .custom-search {
                max-width: 190%;
                height: 35px;
                border-radius: 15px;
                font-size: 14px;
            }

            /* Tombol Filter */
            .btn-filter {
                height: 35px;
                font-size: 14px;
                border-radius: 8px;
            }

            /* Modal Filter */
            .modal-content {
                border-radius: 10px;
            }

            /* Checkbox Filter */
            .form-check {
                margin-bottom: 10px;
            }

            /* Tombol Terapkan */
            .modal-footer .btn-primary {
                width: 100px;
            }
        </style>
 </head>
<?php include_once 'templates/navbar.php'; ?>
<div class="header">
   <h1>
    <br />
    E-Journal
   </h1>
  </div>
  <div class="container my-4">
   <div class="row">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-3">
         <div class="search-container">
            <!-- Search Bar -->
            <input class="form-control custom-search" placeholder="Search berita..." type="text" class="fas fa-filter" />
            <!-- Tombol Filter di dalam Search Bar -->
            
         </div>
      </div>
   </div>

      <!-- Kartu Berita Dinamis -->
   <?php foreach ($jurnal as $item): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" >
         <div class="card custom-card" >
            <img alt="Event Image" class="card-img-top" src="<?= base_url('uploads/' . $item->file_thumbnail) ?>"/>
            <div class="card-body">
               <h6 class="card-title"><?= $item->judul ?></h6>
               <p class="card-text small-text"><?= date('d M Y', strtotime($item->timestamp)) ?> | 1 Komentar nanti diganti views </p>
               <p class="card-text extra-small">
                    <?= $item->penyusun ?>
               </p>
               <a class="btn btn-sm btn-primary" href="<?= site_url('jurnal/detailJurnal/' . $item->id) ?>">
               <i class="fas fa-download"></i> Detail
               </a>
            </div>
         </div>
      </div>
   <?php endforeach; ?>
   <!-- Akhir Kartu Berita Dinamis -->


   </div>
</div>
  <?php include 'templates/footer.php'; ?>
 </html>
 <script>
    function applyFilter() {
        let selectedFilters = [];
        let checkboxes = document.querySelectorAll(".filter-option");

        // Ambil semua filter yang dipilih
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedFilters.push(checkbox.value);
            }
        });

        let beritaItems = document.querySelectorAll('.berita');

        // Jika tidak ada filter yang dipilih, tampilkan semua berita
        if (selectedFilters.length === 0) {
            beritaItems.forEach(item => item.style.display = "block");
            return;
        }

        // Filter berita berdasarkan pilihan user
        beritaItems.forEach(item => {
            let itemFilter = item.getAttribute("data-filter");
            if (selectedFilters.includes(itemFilter)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });

        // Tutup modal setelah filter diterapkan
        let modal = document.getElementById('filterModal');
        let modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    }
 </script>