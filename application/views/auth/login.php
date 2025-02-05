<!-- application/views/auth/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - PDF Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('<?php echo base_url('uploads/image/ayam.jpg')?>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            padding: 30px;
            width: 400px;
            max-width: 90%;
        }
        .login-container h3 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #3498db;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-container">
            <div class="text-center">
            <img src="<?php echo base_url('uploads/image/logo.png')?>" alt="Logo"  style="width: 70px; height: auto;"/>
                <h3 style="margin-bottom: 0;">Admin KMS BPSDMD</h3>
                <p class="text-muted">Administrator Login</p>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <?php echo form_open('auth/login'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>