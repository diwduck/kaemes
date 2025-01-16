<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
          <button type="submit" class="btn btn-primary w-100" id="loginSubmitBtn">
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
                    // Hide the modal
                    $('#loginModal').modal('hide');
                    
                    // Toggle login/logout buttons
                    $('#loginButton').addClass('d-none');
                    $('#logoutButton').removeClass('d-none');
                    
                    // Optional: Show success message
                    Toast.fire({
                        icon: 'success',
                        title: 'Logged in successfully'
                    });
                    
                    // Refresh the page or update necessary UI elements
                    location.reload();
                } else if (response.status === 'already_logged_in') {
                    // User is already logged in, just hide modal and update UI
                    $('#loginModal').modal('hide');
                    $('#loginButton').addClass('d-none');
                    $('#logoutButton').removeClass('d-none');
                    location.reload();
                } else {
                    // Show error message in modal
                    $('#login-alert')
                        .removeClass('d-none')
                        .text(response.message || 'Invalid username or password');
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = 'An error occurred. Please try again.';
                
                // Try to get more specific error message if available
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                $('#login-alert')
                    .removeClass('d-none')
                    .text(errorMessage);
            },
            complete: function() {
                // Reset loading state
                submitBtn.prop('disabled', false);
                submitBtn.find('.spinner-border').addClass('d-none');
            }
        });
    });
    
    // Reset form and errors when modal is closed
    $('#loginModal').on('hidden.bs.modal', function () {
        $('#loginForm')[0].reset();
        $('.is-invalid').removeClass('is-invalid');
        $('#login-alert').addClass('d-none');
    });
});
</script>