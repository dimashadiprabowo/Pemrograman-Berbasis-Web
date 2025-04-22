<?php
include '../config.php';
$npm = $_GET['npm'];
$data = $conn->query("SELECT * FROM mahasiswa WHERE npm = '$npm'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $conn->query("UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Mahasiswa</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select" value="<?= $data['jurusan'] ?>" required>
    <option value="">-- Pilih Jurusan --</option>
    <option value="Teknik Informatika">Teknik Informatika</option>
    <option value="Sistem Informasi">Sistem Informasi</option>
</select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
