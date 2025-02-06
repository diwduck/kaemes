<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $record->id ?>">
    
    <label>Current Thumbnail File:</label>
    <a href="<?= base_url('uploads/' . $record->thumbnail) ?>" target="_blank">View File</a>

    <label>Upload New Thumbnail (optional):</label>
    <input type="file" name="file">

    <label>Nama Modul:</label>
    <input type="text" name="title" value="<?= $record->nama_modul ?>" required>

    <label>Release Date:</label>
    <input type="date" name="release_date" value="<?= $record->tanggal_rilis ?>" required>

    <label>Current File:</label>
    <a href="<?= base_url('uploads/' . $record->file_name) ?>" target="_blank">View File</a>

    <label>Upload New File (optional):</label>
    <input type="file" name="file">

    <button type="submit" class="btn btn-success">Update</button>
</form>
