<!-- application/views/pdf/list.php -->
<!DOCTYPE html>

<html lang="en-US" dir="ltr" data-uw-w-loader>
<head>
    <title>PDF Files List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>PDF Files List</h2>
            <?php if(!$is_admin): ?>
                <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-primary">Admin Login</a>
            <?php else: ?>
                <div>
                    <a href="<?php echo site_url('pdf/upload'); ?>" class="btn btn-primary">Upload New PDF</a>
                    <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger ms-2">Logout</a>
                </div>
            <?php endif; ?>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Uploader</th>
                    <th>Upload Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pdfs as $pdf): ?>
                <tr>
                    <td><?php echo htmlspecialchars($pdf->title); ?></td>
                    <td><?php echo htmlspecialchars($pdf->uploader); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($pdf->upload_date)); ?></td>
                    <td>
                        <a href="<?php echo site_url('pdf/download/'.$pdf->id); ?>" 
                           class="btn btn-success btn-sm">Download</a>
                        <?php if($is_admin): ?>
                            <a href="<?php echo site_url('pdf/edit/'.$pdf->id); ?>" 
                               class="btn btn-primary btn-sm ms-1">Edit</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>