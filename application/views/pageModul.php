<!DOCTYPE html>
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   Modul
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
            font-size: 4rem;
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
        .page-link {
            color:rgb(47, 140, 222) !important; /* merah Bootstrap (danger) */
            }

            .page-item.active .page-link {
            background-color:rgb(47, 140, 222) !important; /* background merah */
            border-color:rgb(0, 79, 251) !important;
            color: #fff !important; /* teks putih */
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
  <p class="fw-semibold mb-2" style="margin-left: 1cm; margin-right: 1cm;">Semua Modul Ditampilkan:</p>
  <div class="row justify-content-left" style="margin-left: 1cm; margin-right: 1cm;" id="modulContainer">
    <?php foreach ($modul as $item): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 modul-item" data-timestamp="<?= strtotime($item->timestamp) ?>">
          <div class="card custom-card h-100 shadow-sm" >
            <!-- Ganti dengan gambar default jika tidak ada thumbnail -->
            <img alt="Thumbnail" class="card-img-top"
                 style="height: 140px; width: 100%; object-fit: contain; margin-top: 5px; margin-bottom: 5px; background-color: #f8f9fa;"
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
            <button class="btn btn-sm btn-light btnDownloadModul" data-id="<?= $item->id ?>">
                <i class="bi bi-cloud-download-fill fs-5" style="color:rgb(104, 188, 248);"></i>
            </button>
            <!-- Modal Download -->
            </div>
            </div>
          </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- Info & Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3">
  <div id="entriesInfo" style="font-size: 0.8rem;"></div>
  <nav>
    <ul class="pagination pagination-sm mb-0" id="paginationContainer"></ul>
  </nav>
</div>
</div>
<!-- Modal untuk Modul -->
<div id="modalDownloadModul" class="modal" style="display: none;">
  <div class="modal-content custom-modal-content">
    <h2 style="font-size: 18px; margin-bottom: 10px;">Apakah Anda ingin mengunduh file ini?</h2>
    <p style="font-size: 14px; margin-bottom: 20px;">Masukkan email Anda terlebih dahulu!</p>
    <input type="email" id="emailInputModul" class="form-control" placeholder="contoh@email.com"
      style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 12px">

    <div style="margin-top: 20px; display: flex; justify-content: right; gap: 10px;">
      <button id="btnBatalModul" class="btn btn-custom-back small-button" style="font-size: 0.8rem !important;">Batal</button>
      <button id="btnKirimModul" type="button" class="btn btn-custom-download small-button" style="font-size: 0.8rem !important;">Kirim</button>
    </div>
  </div>
</div>
</div>
<?php include 'templates/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function attachModulDownloadEvents() {
    document.querySelectorAll('.btnDownloadModul').forEach(function(button) {
      button.removeEventListener('click', handleDownloadClick); // prevent duplikat
      button.addEventListener('click', handleDownloadClick);
    });
  }

  function handleDownloadClick() {
    var modulId = this.dataset.id;
    document.getElementById('modalDownloadModul').style.display = 'flex';
    document.getElementById('btnKirimModul').setAttribute('data-id', modulId);
  }

  document.getElementById('btnBatalModul').addEventListener('click', function() {
    document.getElementById('modalDownloadModul').style.display = 'none';
  });

  document.getElementById('btnKirimModul').addEventListener('click', function() {
    var email = document.getElementById('emailInputModul').value;
    var modulId = this.getAttribute('data-id');

    if (email.trim() === '') {
      alert('Email tidak boleh kosong!');
      return;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Format email tidak valid!');
      return;
    }

    fetch("<?= base_url('index.php/modul/download') ?>", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `modul_id=${modulId}&email=${encodeURIComponent(email)}`
    })
    .then(res => res.text())
    .then(res => {
      console.log(res);
      document.getElementById('modalDownloadModul').style.display = 'none';
      window.location.href = "<?= base_url('index.php/modul/download_file/') ?>" + modulId;
      window.location.href = "<?= base_url('index.php/modul/download_file/') ?>" + modulId;
    setTimeout(() => {
    location.reload();
    }, 300);
    });
  });
  // Jalankan saat pertama kali halaman load
  document.addEventListener("DOMContentLoaded", function () {
    attachModulDownloadEvents();
  });
  
</script>

<script>  
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const sortSelect = document.getElementById("sortSelect");
    const container = document.getElementById("modulContainer");
    const paginationContainer = document.getElementById("paginationContainer");
    const entriesInfo = document.getElementById("entriesInfo");

    let currentPage = 1;
    const itemsPerPage = 12;

    // Ambil semua item sekali saja, simpan urutan aslinya
    const allItems = Array.from(container.querySelectorAll(".modul-item"));

    function filterAndSort() {
      const keyword = searchInput.value.toLowerCase();
      const sortBy = sortSelect.value;

      // Mulai dari data asli
      let filteredItems = allItems.slice(); // copy array

      // Filter
      if (keyword.trim() !== "") {
        filteredItems = filteredItems.filter(item => {
          const title = item.querySelector(".card-title-j").textContent.toLowerCase();
          const penyusun_1 = item.querySelector(".card-text").textContent.toLowerCase();
          const deskripsi = item.querySelector(".card-text").textContent.toLowerCase();
          const penyusun_2 = item.querySelector(".card-text").textContent.toLowerCase();
          return title.includes(keyword) || penyusun_1.includes(keyword) || deskripsi.includes(keyword) || penyusun_2.includes(keyword) ;
        });
      }

      // Sort
      if (sortBy === "terbaru") {
        filteredItems.sort((a, b) => parseInt(b.getAttribute("data-timestamp")) - parseInt(a.getAttribute("data-timestamp")));
      } else if (sortBy === "terlama") {
        filteredItems.sort((a, b) => parseInt(a.getAttribute("data-timestamp")) - parseInt(b.getAttribute("data-timestamp")));
      }

      displayPage(filteredItems, 1);
      setupPagination(filteredItems);
    }

    function displayPage(items, page) {
      const start = (page - 1) * itemsPerPage;
      const end = page * itemsPerPage;

      // Kosongkan container, lalu tampilkan yang sesuai
      container.innerHTML = "";
      items.slice(start, end).forEach(item => container.appendChild(item));

      // Info
      entriesInfo.textContent = `Showing ${start + 1} to ${Math.min(end, items.length)} of ${items.length} entries`;
    }

    function setupPagination(items) {
      paginationContainer.innerHTML = "";
      const totalPages = Math.ceil(items.length / itemsPerPage);

      const createPageButton = (label, targetPage, disabled = false, active = false) => {
        const li = document.createElement("li");
        li.className = `page-item ${disabled ? 'disabled' : ''} ${active ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#">${label}</a>`;
        li.onclick = (e) => {
          e.preventDefault();
          if (!disabled && currentPage !== targetPage) {
            currentPage = targetPage;
            displayPage(items, currentPage);
            setupPagination(items);
          }
        };
        return li;
      };

      paginationContainer.appendChild(createPageButton("Previous", currentPage - 1, currentPage === 1));

      for (let i = 1; i <= totalPages; i++) {
        paginationContainer.appendChild(createPageButton(i, i, false, i === currentPage));
      }

      paginationContainer.appendChild(createPageButton("Next", currentPage + 1, currentPage === totalPages));
    }

    // Event
    searchInput.addEventListener("input", filterAndSort);
    sortSelect.addEventListener("change", filterAndSort);

    // Inisialisasi
    filterAndSort();
  });
</script>




 </html>