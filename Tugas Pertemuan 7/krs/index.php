<?php
include '../config.php';
$sql = "SELECT k.id, m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
        FROM krs k
        JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
        JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data KRS Mahasiswa</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah KRS</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_mhs'] ?></td>
                <td><?= $row['nama_mk'] ?></td>
                <td><?= "{$row['nama_mhs']} Mengambil Mata Kuliah {$row['nama_mk']} ({$row['jumlah_sks']} SKS)" ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
