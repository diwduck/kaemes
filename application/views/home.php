<html lang="en">
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   Knowledge Management System
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
  <style>
   html {
    scroll-behavior: smooth;
        }

    body {
        font-family: 'Lato', sans-serif;
        background-color: #f0f0f0;
        transform: none !important;
        zoom: 100% !important;
    }
    /* Header Section */
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
        font-size: 3.5rem;
        font-weight: bold;
    }

    .header p {
        font-size: 1.25rem;
    }

    /* Card Section */
    .card-container {
        position: relative;
        top: -15%;
    }

    .custom-card {
        width: 80%;
        margin: 0 auto;
        padding:px;
        border: none;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }

    .custom-card i {
        font-size: 30px;
        margin: 10px auto;
        color: black;
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
    }

    .card-spacing {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .row-tight {
            margin: 10px;
    }

    .btn-read-more {
        background-color: black !important;
        color: white !important;
        padding: 5px 7px !important;
        border-radius: 15px !important;
        text-decoration: none !important;
        font-size: 9px !important;
        transition: background-color 0.3s !important;
    }
    .see-all-btn {
        background-color: black !important;
        color: white !important;
        font-size: 13px !important;
        padding: 5px 6px !important;
            border-radius: 10px !important;
            display: block !important;
            margin: 30px auto 100px auto !important; /* Center the button and add more space below */
            width: 75px !important;
        }



    .btn-read-more:hover {
        background-color: #333;
        color: white;
    }

    /* Section Titles */
    .section-title {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        margin: 20px 0;
        position: relative;
    }

    .section-title::before, 
    .section-title::after {
        content: "";
        flex: 1;
        height: 2px;
        background-color: #000;
        margin: 0 10px;
    }

    .section-title span {
        display: block;
        font-size: 2.0rem;
        font-weight: bold;
        font-family: 'Poppins', sans-serif;
        color: #333;
        letter-spacing: 2px;
        text-align: center;
        position: relative;
    }

    .section-title span::after {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -5px;
        width: 75%;
        height: 2px;
        background-color: #000;
    }

    /* Content Boxes */
    .content-box {
        background-color: white;
        padding: 20px 30px;
        border-radius: 15px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 1000px;
        height: 220px;
        margin: 0 auto;
    }
    .content-box-d {
        background-color: white;
        padding: 20px 30px;
        border-radius: 15px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 1000px;
        height: 160px;
        margin: 0 auto;
    }

    .section-spacing {
        margin-top: 50px;
    }

    /* Links */
    .more a {
        font-weight: bold;
        color: blue;
        text-decoration: underline;
        background-color: transparent;
        font-size: 25px;
    }

    /* Responsive Adjustments */
    @media (max-width: 200px) {
        .header {
            height: 50vh;
        }
        
        .header h1 {
            font-size: 2.5rem;
        }
        
        .custom-card {
            width: 95%;
        }
        
        .content-box {
            padding: 30px;
        }
    }
    .col-md-3 {
    padding: 0 !important;
    margin-left: 5px;  /* Mengurangi jarak antar kolom */
    margin-right: 5px;
}
  </style>
 </head>
 <body>
 <?php include_once 'templates/navbar.php'; ?>
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
  <section class="card-container py-4">
  <div class="container-sm">
        <div class="row text-center gx-0 gap-0">
            <div class="col-md-3 card-spacing">
                <div class="card p-0 custom-card">
                    <i class="fas fa-layer-group"></i>
                    <div class="card-body">
                        <h5 class="card-title fs-5">Modul</h5>
                        <p class="card-text">
                            Akses mudah ke berbagai modul pengajaran yang lengkap dan terorganisir, memudahkan pengajar dan siswa dalam mempersiapkan dan mengelola materi pembelajaran.
                        </p>
                        <a class="btn btn-read-more" href="#modul" style="font-size: 10px; ">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 card-spacing">
                <div class="card p-0 custom-card">
                    <i class="fas fa-book"></i>
                    <div class="card-body">
                        <h5 class="card-title fs-5">e-Journal</h5>
                        <p class="card-text">
                            Platform digital untuk publikasi artikel ilmiah, penelitian, dan jurnal akademik yang memungkinkan akses cepat dan kolaborasi antar penulis dan pembaca.
                        </p>
                        <a class="btn btn-read-more" href="#e-journal" style="font-size: 10px; padding: 5px 8px;">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 card-spacing">
                <div class="card p-0 custom-card">
                    <i class="fas fa-book-open"></i>
                    <div class="card-body">
                        <h5 class="card-title fs-5">e-Warta</h5>
                        <p class="card-text">
                            Media informasi digital yang menyajikan berita terkini, pengumuman, dan perkembangan terbaru di dunia pendidikan untuk memperluas wawasan komunitas akademik.
                        </p>
                        <a class="btn btn-read-more" href="#e-warta" style="font-size: 10px; padding: 5px 8px;">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 card-spacing">
                <div class="card p-0 custom-card">
                    <i class="fas fa-bookmark"></i>
                    <div class="card-body">
                        <h5 class="card-title fs-5">COE</h5>
                        <p class="card-text">
                            Fasilitas untuk mengelola dan melacak inovasi terbaru serta rencana tindak lanjut untuk pengembangan pendidikan yang lebih baik dan berkelanjutan.
                        </p>
                        <a class="btn btn-read-more" href="#coe" style="font-size: 10px; padding: 5px 8px;">
                            Read More
                        </a>
                    </div>
                </div>
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
     <i class="fas fa-book" style="font-size: 30px;">
     </i>
     Modul
    </span>
   </div>
   <div class="row justify-content-center">
   <?php foreach ($modul as $item): ?>
    <div class="col-md-3">
    <a href="<?= site_url('modul/detailModul/' . $item->id) ?>" class="text-decoration-none text-dark">
        <div class="card">
            <br />
            <img 
                alt="Modul cover" 
                src="<?= base_url('uploads/' . $item->thumbnail) ?>" 
                class="mx-auto d-block" 
                height="200" 
                width="150"
            />
            <div class="card-body text-center">
                <p class="card-text" >
                    <?= $item->nama_modul ?>
                </p>
            </div>
        </div>
    </a>
    </div>
    <?php endforeach; ?>
</div>

   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageModul'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="e-journal">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-newspaper" style="font-size: 30px;">
     </i>
     e-Journal
    </span>
   </div>
   <div class="row justify-content-center">
   <?php foreach ($jurnal as $item): ?>
    <div class="col-md-3">
    <a href="<?= site_url('jurnal/detailJurnal/' . $item->id) ?>" class="text-decoration-none text-dark">
        <div class="card">
            <br />
            <img 
                alt="Journal cover" 
                src="<?= base_url('uploads/' . $item->file_thumbnail) ?>"
                class="mx-auto d-block" 
                height="200" 
                width="150"
            />
            <div class="card-body text-center">
                <p class="card-text">
                <?= $item->judul?>
                </p>
            </div>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>

   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageJournal'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="e-warta">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-book-open" style="font-size: 30px;">
     </i>
     e-Warta
    </span>
   </div>
   <div class="row justify-content-center">
    <?php foreach ($warta as $index => $item): ?>
        <div class="col-md-3">
        <a href="<?= site_url('warta/detail/' . $item->id) ?>">
            <img alt="Warta Picture" 
                class="img-fluid img-thumbnail"
                height="200"  
                width="200"
                style="object-fit: cover; width: 320px; height: 300px;"
                src="<?= base_url('uploads/' . $item->file_thumbnail) ?>"
            />
        </a>
        </div>
    <?php endforeach; ?>
    </div>
    <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageWarta'); ?>">
    see all
   </a>
  </section>
  <section class="container" id="coe">
   <div class="section-title text-center">
    <span>
     <i class="fas fa-bookmark" style="font-size: 30px;">
     </i>
     Center of Excellence
    </span>
   </div>
   <div class="content-box-d text-center">
    <p>
     Center of Excellence (CoE) BPSDM Jawa Tengah adalah pusat bahan pengajaran yang dirancang untuk mendukung pembelajaran dan pengembangan kompetensi aparatur. CoE menyediakan berbagai sumber daya, termasuk modul pelatihan, materi pembelajaran, panduan praktis terbaik, media pembelajaran interaktif, serta akses ke jurnal dan penelitian. Dengan menyediakan bahan pengajaran yang terintegrasi dan berkualitas, CoE menjadi sarana utama untuk meningkatkan kapasitas dan kinerja aparatur, sekaligus memperkuat peran BPSDM sebagai pusat rujukan pengembangan kompetensi di Jawa Tengah.
    </p>
   </div>
   <a class="btn btn-read-more see-all-btn" href="<?php echo site_url('pageCoe'); ?>">
    see all
   </a>
  </section>
  <?php include 'templates/footer.php'; ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        document.body.style.transform = 'none';
        document.body.style.zoom = '100%';
    });
</script>
</body>
</html>
</html>
