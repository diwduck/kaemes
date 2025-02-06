<!DOCTYPE html>
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   E-Warta
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
    Modul Pembelajaran
   </h1>
   <p>
    
   </p>
  </div>
  <div class="container my-4">
   <div class="row">
    <div class="col-md-12 mb-3">
     <input class="form-control" placeholder="Search" type="text"/>
    </div>
   </div>
   <div class="table-section">
      <div class="container">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Modul</th>
                  <th>Jenis Kompetensi</th>
                  <th>Penyusun</th>
                  <th>Lembaga Penerbit</th>
                  
               </tr>
            </thead>
            <tbody>
               <?php foreach ($modul as $index => $item): ?>
               <tr>
                  <td><?php echo $index + 1; ?></td>
                  <td>
                        <a href="<?= site_url('modul/detailModul/' . $item->id) ?>" class="text-primary">
                            <?= $item->nama_modul; ?>
                        </a>
                  </td>
                  <td><?php echo $item->jenis_kompetensi; ?></td>
                  <td><?php echo $item->penyusun_1; ?>
                      <br />
                      <?php echo $item->penyusun_2; ?>
                      <br />
                      <?php echo $item->penyusun_3; ?></td>
                  <td><?php echo $item->lembaga_penerbit; ?></td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
  </div>
  <?php include 'templates/footer.php'; ?>
 </html>