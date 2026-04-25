<?php
session_start();
include '../koneksi.php';

// Ambil data kategori
$data = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📂 Data Kategori</h3>
        <a href="../dashboard.php" class="btn btn-secondary">← Kembali</a>
    </div>

    <!-- Tombol tambah -->
    <a href="tambah1.php" class="btn btn-success mb-3">+ Tambah Kategori</a>

    <!-- Card -->
    <div class="card shadow border-0">
        <div class="card-body">

            <!-- Tabel -->
            <table class="table table-bordered table-striped table-hover">
                
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_assoc($data)) { 
                ?>
                    <tr>
                        <td><?= htmlspecialchars($d['nama_kategori']) ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="edit1.php?id=<?= $d['id'] ?>" 
                               class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <a href="hapus1.php?id=<?= $d['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php 
                    }
                } else {
                ?>
                    <!-- Jika data kosong -->
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada data kategori
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>