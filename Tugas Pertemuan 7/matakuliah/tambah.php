<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $conn->query("INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Mata Kuliah</h2>
    <a href="index.php" class="btn btn-outline-primary me-2">Lihat Data Mata Kuliah</a>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Kode MK</label>
            <input type="text" name="kodemk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah SKS</label>
            <input type="number" name="jumlah_sks" class="form-control" required>
        </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
