<?php
include '../config.php';
$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Mahasiswa</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['npm'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td>
                    <a href="edit.php?npm=<?= $row['npm'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?npm=<?= $row['npm'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
        <div class="mb-4">
            <a href="../index.php" class="btn btn-outline-danger">Beranda KRS Mahasiswa</a>
            <a href="tambah.php" class="btn btn-secondary">Kembali</a>
        </div>
</div>
</body>
</html>
