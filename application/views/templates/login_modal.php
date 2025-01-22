<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <!-- Image Column -->
            <div class="col-md-6 p-0 d-none d-md-block">
              <img src="uploads/image/admin.png" alt="Login" class="img-fluid h-100 w-100 object-cover" style="object-fit: cover;" />
            </div>
            
            <!-- Login Form Column -->
            <div class="col-md-6 p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="modal-title fw-bold" id="loginModalLabel">Welcome Back!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
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
                
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                
                <div id="login-alert" class="alert alert-danger d-none"></div>
                
                <button type="submit" class="btn btn-primary w-100 py-2" id="loginSubmitBtn">
                  <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                  Login
                </button>
                
                <div class="text-center mt-3">
                  <small class="text-muted">Don't have an account? <a href="#" class="text-decoration-none">Sign up</a></small>
                </div>
              </form>
            </div>
          </div>
        </div>
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