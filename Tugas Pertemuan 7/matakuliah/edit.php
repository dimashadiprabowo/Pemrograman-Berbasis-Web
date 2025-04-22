<?php
include '../config.php';
$kodemk = $_GET['kodemk'];
$data = $conn->query("SELECT * FROM matakuliah WHERE kodemk = '$kodemk'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $conn->query("UPDATE matakuliah SET nama='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Mata Kuliah</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Kode MK</label>
            <input type="text" class="form-control" value="<?= $data['kodemk'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah SKS</label>
            <input type="number" name="jumlah_sks" class="form-control" value="<?= $data['jumlah_sks'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
