<html lang="en">
 <head>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            -webkit-transform: none;
            transform: none;
            -webkit-zoom: 1;
            zoom: 1;
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
  <!-- Modal Structure
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           Your login form here -->
          <!-- <form id="loginForm">
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
  </div> -->
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
      <ul class="navbar-nav ms-auto" style="font-size: 20px; gap: 40px;">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('home'); ?>">
            <i class="fas fa-home" style="font-size: 20px;"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageModul'); ?>">
            <i class="fas fa-book" style="font-size: 20px;"></i> Modul
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageJournal'); ?>">
            <i class="fas fa-newspaper" style="font-size: 20px;"></i> e-Journal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageWarta'); ?>">
            <i class="fas fa-book-open" style="font-size: 20px;"></i> e-Warta
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('pageCoe'); ?>">
            <i class="fas fa-bookmark" style="font-size: 20px;"></i> COE
          </a>
        </li>
        <li class="nav-item">
          <button 
            type="button"
            class="btn nav-link text-white" 
            data-bs-toggle="modal" 
            data-bs-target="#loginModal"
            style="background-color: #1EAFEC; font-size: 20px; padding: 5px 25px;"
          >
            <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i> Login
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-4">
        <!-- Logo Center -->
        <div class="text-center mb-4">
          <img src="uploads/image/logo.png" alt="Logo" class="mb-3" style="width: 70px; height: auto;"/>
          <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
          <h3 class="modal-title fw-bold" id="loginModalLabel">Hallo Admin!</h3>
          <p class="text-muted">Silahkan Login ke akun Anda</p>
        </div>
        
        <!-- Login Form -->
        <form id="loginForm">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <div class="invalid-feedback" id="username-error"></div>
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback" id="password-error"></div>
          </div>
          
          <div id="login-alert" class="alert alert-danger d-none"></div>
          
          <button type="submit" class="btn btn-primary w-100 py-2 mb-3" id="loginSubmitBtn">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            Login
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('#login-alert').addClass('d-none');
        
        // Show loading state
        const submitBtn = $('#loginSubmitBtn');
        submitBtn.prop('disabled', true);
        submitBtn.find('.spinner-border').removeClass('d-none');
        
        const formData = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("auth/login"); ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#loginModal').modal('hide');
                    $('#loginButton').addClass('d-none');
                    $('#logoutButton').removeClass('d-none');
                    Toast.fire({
                        icon: 'success',
                        title: 'Logged in successfully'
                    });
                    location.reload();
                } else if (response.status === 'already_logged_in') {
                    $('#loginModal').modal('hide');
                    $('#loginButton').addClass('d-none');
                    $('#logoutButton').removeClass('d-none');
                    location.reload();
                } else {
                    $('#login-alert')
                        .removeClass('d-none')
                        .text(response.message || 'Invalid username or password');
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $('#login-alert')
                    .removeClass('d-none')
                    .text(errorMessage);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                submitBtn.find('.spinner-border').addClass('d-none');
            }
        });
    });
    
    $('#loginModal').on('hidden.bs.modal', function () {
        $('#loginForm')[0].reset();
        $('.is-invalid').removeClass('is-invalid');
        $('#login-alert').addClass('d-none');
    });
});
</script>

<!-- Make sure you have these scripts at the end of your body tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Set zoom hanya sekali
    document.body.style.transform = 'none';
    document.body.style.zoom = '100%';
});
</script>