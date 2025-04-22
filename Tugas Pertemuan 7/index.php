<?php
include 'config.php';
$sql = "SELECT m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
        FROM krs
        JOIN mahasiswa m ON krs.mahasiswa_npm = m.npm
        JOIN matakuliah mk ON krs.matakuliah_kodemk = mk.kodemk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .highlight {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Data KRS Mahasiswa</h2>
    <div class="mb-4">
    <a href="mahasiswa/tambah.php" class="btn btn-outline-primary me-2">+ Input Mahasiswa</a>
    <!-- <a href="matakuliah/tambah.php" class="btn btn-outline-success me-2">+ Input Mata Kuliah</a> -->
    <a href="krs/tambah.php" class="btn btn-outline-danger">+ Input KRS</a>
</div>

    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_mhs'] ?></td>
                <td><?= $row['nama_mk'] ?></td>
                <td>
                    <span class="highlight"><?= $row['nama_mhs'] ?></span> Mengambil Mata Kuliah 
                    <span class="highlight"><?= $row['nama_mk'] ?></span> (<?= $row['jumlah_sks'] ?> SKS)
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
