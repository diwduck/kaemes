<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload PDF File</h2>
        
        <?php if(isset($error)) echo $error; ?>
        <?php echo validation_errors(); ?>
        
        <?php echo form_open_multipart('pdf/do_upload'); ?>
            <div class="mb-3">
                <label for="title" class="form-label">PDF Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            
            <div class="mb-3">
                <label for="uploader" class="form-label">Uploader Name</label>
                <input type="text" class="form-control" name="uploader" id="uploader" required>
            </div>
            
            <div class="mb-3">
                <label for="upload_date" class="form-label">Upload Date</label>
                <input type="date" class="form-control" name="upload_date" id="upload_date" required>
            </div>
            
            <div class="mb-3">
                <label for="pdf_file" class="form-label">PDF File</label>
                <input type="file" class="form-control" name="pdf_file" id="pdf_file" accept=".pdf" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="<?php echo site_url('pdf/index'); ?>" class="btn btn-secondary">Back to List</a>
        <?php echo form_close(); ?>
    </div>
</body>
</html>