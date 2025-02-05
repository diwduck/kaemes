<html lang="en">
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
  <style>
   body {
            font-family: 'Lato', sans-serif;
            background-color:rgb(166, 216, 250); /* Light gray background */
            -webkit-transform: none;
            transform: none;
            -webkit-zoom: 1;
            zoom: 1;
        }
        .navbar {
            height: 70px; /* Sesuaikan tinggi navbar */
            background-color: rgba(9, 10, 11, 0.85);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .btn-read-more, .see-all-btn {
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
  </style>
 </head>
 <body>

  <nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="display: flex; align-items: center; text-decoration: none; margin-left: 40px;">
      <img 
        alt="Logo" 
        class="d-inline-block align-text-top" 
        height="45" 
        src="https://bpsdmd.jatengprov.go.id/web/assets/front/logo/jateng.png" 
        width="40"
      />
      <div style="margin-left: 15px; color: white; text-align: left; line-height: 1.2;">
        <strong style="font-size: 20px;">BPSDMD</strong><br />
        <span style="font-size: 13px;">Provinsi Jawa Tengah</span>
      </div>
    </a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbarNav" 
      aria-controls="navbarNav" 
      aria-expanded="false" 
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="font-size: 15px; gap: 35px;">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('home'); ?>">
            <i class="fas fa-home" style="font-size: 15px;"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageModul'); ?>">
            <i class="fas fa-book" style="font-size: 15px;"></i> Modul
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageJournal'); ?>">
            <i class="fas fa-newspaper" style="font-size: 15px;"></i> e-Journal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageWarta'); ?>">
            <i class="fas fa-book-open" style="font-size: 15px;"></i> e-Warta
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="margin-right: 20px;" href="<?php echo site_url('pageCoe'); ?>">
            <i class="fas fa-bookmark" style="font-size: 15px;"></i> COE
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('auth/login'); ?>">
            <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i> Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>

