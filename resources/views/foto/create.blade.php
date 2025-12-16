<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
</head>
<body>

<h2>Upload Foto Baru</h2>

<form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul:</label><br>
    <input type="text" name="title"><br><br>

    <label>Pilih Gambar:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Upload</button>
</form>

</body>
</html>