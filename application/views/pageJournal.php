
<!DOCTYPE html>
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   E-Journal
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
            width: 400px !important;             /* Atur lebar sesuai kebutuhan */
            height: 200px !important;            /* Atur tinggi sesuai kebutuhan */
            max-width: 100%; 
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
            font-size: 12px;
            margin-bottom: 5px;
        }

        /* Teks kecil di bawah judul */
        .small-text {
            font-size: 9px;
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

  <!-- Baris utama berisi dua kolom -->
<div class="row" style="margin-left: 1cm; margin-right: 1cm;">
  <!-- Kolom Semua Jurnal -->
  <div class="col-md-9">
    <p class="fw-semibold mb-2">Semua Jurnal Ditampilkan:</p>
    <div id="jurnalContainer" class="row" id="cardContainer">
      <?php foreach ($jurnal as $item): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 jurnal-item" data-timestamp="<?= strtotime($item->timestamp) ?>">
          <a href="<?= site_url('jurnal/detailJurnal/' . $item->id) ?>" class="text-decoration-none text-dark">
            <div class="card custom-card h-100">
              <img alt="Event Image" class="card-img-top" style="height: 120px; object-fit: cover;" src="<?= base_url('uploads/' . $item->file_thumbnail) ?>"/>
              <div class="card-body p-2">
                <h6 class="card-title mb-1 search-item"><?= $item->judul ?></h6>
                <p class="card-text small-text mb-1 search-item-nama" style="font-size: 0.75rem;">
                  <?= $item->penyusun ?>
                </p>
                <p class="card-text extra-small mb-2" style="font-size: 0.7rem;">
                  <?= date('d M Y', strtotime($item->timestamp)) ?> | <?= $item->views ?> views
                </p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Informasi jumlah data dan navigasi -->
    <div class="d-flex justify-content-between align-items-center mt-3 px-2">
    <div id="entriesInfo" class="small text-muted"></div>
    <nav>
        <ul class="pagination pagination-sm mb-0" id="paginationContainer"></ul>
    </nav>
    </div>
  </div>

<!-- Kolom Jurnal Paling Banyak Diunduh -->
    <div class="col-md-3">
    <div class="card shadow-sm p-3" style="background-color:rgb(194, 190, 190); margin-top: 30px" >
        <h5 class="text-center fw-semibold mb-3 " style="font-size: 1rem;">Jurnal Populer</h5>
        <?php foreach ($top3 as $populer): ?>
        <a href="<?= site_url('jurnal/detailJurnal/' . $populer->id) ?>" class="text-decoration-none text-dark">
            <div class="card custom-card h-100 mb-3">
            <img alt="Thumbnail" class="card-img-top" style="height: 120px; object-fit: cover;" src="<?= base_url('uploads/' . $populer->file_thumbnail) ?>"/>
            <div class="card-body p-2">
                <h6 class="card-title mb-1"><?= $populer->judul ?></h6>
                <p class="card-text small-text mb-1 search-item-nama" style="font-size: 0.75rem;"><?= $populer->penyusun ?></p>
                <p class="card-text extra-small mb-2" style="font-size: 0.75rem;"><?= date('d M Y', strtotime($populer->timestamp)) ?> | <?= $populer->views ?> views</p>
            </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    </div>
</div>
</div>

  <?php include 'templates/footer.php'; ?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const sortSelect = document.getElementById("sortSelect");
    const container = document.getElementById("jurnalContainer");

    function filterAndSort() {
      const keyword = searchInput.value.toLowerCase();
      const sortBy = sortSelect.value;
      const items = Array.from(container.querySelectorAll(".jurnal-item"));

      // Filter dulu
      const filteredItems = items.filter(item => {
        const title = item.querySelector(".card-title").textContent.toLowerCase();
        const penyusun = item.querySelector(".card-text").textContent.toLowerCase();
        return title.includes(keyword) || penyusun.includes(keyword);
      });

      // Sort yang lolos filter
      filteredItems.sort((a, b) => {
        const timeA = parseInt(a.getAttribute("data-timestamp"));
        const timeB = parseInt(b.getAttribute("data-timestamp"));
        if (sortBy === "terbaru") return timeB - timeA;
        if (sortBy === "terlama") return timeA - timeB;
        return 0;
      });

      // Reset: sembunyikan semua dulu
      items.forEach(item => item.style.display = "none");

      // Tampilkan dan append ulang hanya yang lolos filter
      filteredItems.forEach(item => {
        item.style.display = "block";
        container.appendChild(item);
      });
    }

    searchInput.addEventListener("input", filterAndSort);
    sortSelect.addEventListener("change", filterAndSort);
  });
</script>

<script>
  const itemsPerPage = 12;
  let currentPage = 1;

  const items = Array.from(document.querySelectorAll('.jurnal-item'));
  const totalItems = items.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);
  const entriesInfo = document.getElementById('entriesInfo');
  const paginationContainer = document.getElementById('paginationContainer');

  function updatePagination() {
    // Sembunyikan semua item
    items.forEach((item, index) => {
      item.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) ? 'block' : 'none';
    });

    // Update text info
    const start = (currentPage - 1) * itemsPerPage + 1;
    const end = Math.min(currentPage * itemsPerPage, totalItems);
    entriesInfo.textContent = `Showing ${start} to ${end} of ${totalItems} entries`;

    // Buat pagination
    paginationContainer.innerHTML = '';

    // Tombol Previous
    const prevLi = document.createElement('li');
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `<a class="page-link" href="#">Previous</a>`;
    prevLi.onclick = () => {
      if (currentPage > 1) {
        currentPage--;
        updatePagination();
      }
    };
    paginationContainer.appendChild(prevLi);

    // Nomor halaman
    for (let i = 1; i <= totalPages; i++) {
      const li = document.createElement('li');
      li.className = `page-item ${i === currentPage ? 'active' : ''}`;
      li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
      li.onclick = () => {
        currentPage = i;
        updatePagination();
      };
      paginationContainer.appendChild(li);
    }

    // Tombol Next
    const nextLi = document.createElement('li');
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `<a class="page-link" href="#">Next</a>`;
    nextLi.onclick = () => {
      if (currentPage < totalPages) {
        currentPage++;
        updatePagination();
      }
    };
    paginationContainer.appendChild(nextLi);
  }

  // Inisialisasi saat pertama kali load
  updatePagination();
</script>

 </html>