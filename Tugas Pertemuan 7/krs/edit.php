<?php
include '../config.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM krs WHERE id = $id")->fetch_assoc();
$mahasiswa = $conn->query("SELECT npm, nama FROM mahasiswa");
$matakuliah = $conn->query("SELECT kodemk, nama FROM matakuliah");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    $conn->query("UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data KRS</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Mahasiswa</label>
            <select name="mahasiswa_npm" class="form-select" required>
                <?php while($m = $mahasiswa->fetch_assoc()): ?>
                    <option value="<?= $m['npm'] ?>" <?= $data['mahasiswa_npm'] == $m['npm'] ? 'selected' : '' ?>>
                        <?= $m['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <select name="matakuliah_kodemk" class="form-select" required>
                <?php while($mk = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $mk['kodemk'] ?>" <?= $data['matakuliah_kodemk'] == $mk['kodemk'] ? 'selected' : '' ?>>
                        <?= $mk['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
