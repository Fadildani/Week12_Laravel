<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
</head>
<body>

<h2>Upload Foto Baru</h2>

<form action="<?php echo e(route('photos.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <label>Judul:</label><br>
    <input type="text" name="title"><br><br>

    <label>Pilih Gambar:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Upload</button>
</form>

</body>
</html><?php /**PATH C:\laragon\www\w12\resources\views/photos/create.blade.php ENDPATH**/ ?>