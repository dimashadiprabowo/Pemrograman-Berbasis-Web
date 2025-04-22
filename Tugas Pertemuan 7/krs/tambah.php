<?php
include '../config.php';

$mahasiswa = $conn->query("SELECT npm, nama FROM mahasiswa");
$matakuliah = $conn->query("SELECT kodemk, nama FROM matakuliah");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    $conn->query("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Data KRS</h2>
    <a href="index.php" class="btn btn-outline-primary me-2">Lihat Data KRS</a>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Mahasiswa</label>
            <select name="mahasiswa_npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php while($m = $mahasiswa->fetch_assoc()): ?>
                    <option value="<?= $m['npm'] ?>"><?= $m['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <select name="matakuliah_kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php while($mk = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $mk['kodemk'] ?>"><?= $mk['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
