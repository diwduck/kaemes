<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JavaScript Bundle (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
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
            font-weight: bold;
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
  <!-- Modal Structure -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your login form here -->
          <form id="loginForm">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg fixed-top">
   <div class="container-fluid">
    <a class="navbar-brand" href="#" style="display: flex; align-items: center; text-decoration: none; margin-left: 40px;">
      <img 
        alt="Logo" 
        class="d-inline-block align-text-top" 
        height="75" 
        src="https://bpsdmd.jatengprov.go.id/web/assets/front/logo/jateng.png" 
        width="75"
      />
      <div style="margin-left: 15px; color: white; text-align: left; line-height: 1.2;">
        <strong style="font-size: 30px;">BPSDMD</strong><br />
        <span style="font-size: 20px;">Provinsi Jawa Tengah</span>
      </div>
    </a>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
     <span class="navbar-toggler-icon">
     </span>
    </button>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" 
      class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="font-size: 20px; gap: 40px;">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-home" style="font-size: 20px;"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-book" style="font-size: 20px;"></i> Modul
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-newspaper" style="font-size: 20px;"></i> e-Journal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-book-open" style="font-size: 20px;"></i> e-Warta
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-bookmark" style="font-size: 20px;"></i> COE
          </a>
        </li>
        <li class="nav-item">
            <!-- Login Button -->
          <button 
            class="btn nav-link text-white" 
            data-bs-toggle="modal" 
            data-bs-target="#loginModal" 
            id="loginButton"
            style="background-color: #1EAFEC; font-size: 20px; padding: 5px 25px;">
            <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i> Login
          </button>
          <!-- Logout Button (Initially Hidden) -->
          <button 
            class="btn nav-link text-white d-none" 
            id="logoutButton"
            style="background-color: #FF0000; font-size: 20px; padding: 5px 25px;">
            <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i> Logout
          </button>
        </li>
      </ul>
    </div>
   </div>
  </nav>
</html>
<script>
  // Function to handle login
  function handleLogin(event) {
    event.preventDefault(); // Prevent form submission
    
    // Simulate successful login (you can replace this with your actual login logic)
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // For demonstration, check if both fields are filled
    if (username && password) {
      // Hide the modal
      const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.hide();
      
      // Toggle visibility of login/logout buttons
      document.getElementById('loginButton').classList.add('d-none');
      document.getElementById('logoutButton').classList.remove('d-none');
    } else {
      // Handle login validation/error display if needed
      alert('Please enter both username and password.');
    }
  }
  
  // Add event listener for login form submission
  document.getElementById('loginForm').addEventListener('submit', handleLogin);
</script>