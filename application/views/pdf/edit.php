<!-- application/views/pdf/edit.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit PDF Details</h2>
        
        <?php echo validation_errors(); ?>
        
        <?php echo form_open('pdf/update/'.$pdf->id); ?>
            <div class="mb-3">
                <label for="title" class="form-label">PDF Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($pdf->title); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="uploader" class="form-label">Uploader Name</label>
                <input type="text" class="form-control" name="uploader" value="<?php echo htmlspecialchars($pdf->uploader); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo site_url('pdf/index'); ?>" class="btn btn-secondary">Back to List</a>
        <?php echo form_close(); ?>
    </div>
</body>
</html>