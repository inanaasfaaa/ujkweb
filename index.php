<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

// ✅ QUERY SUDAH JOIN KATEGORI
$data = mysqli_query($conn, "
    SELECT products.*, kategori.nama_kategori 
    FROM products 
    LEFT JOIN kategori ON products.kategori_id = kategori.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Produk</h3>
        <a href="../dashboard.php" class="btn btn-secondary">← Kembali</a>
    </div>

    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <!-- ✅ KOLOM BARU -->
                <th>Kategori</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($d = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $d['nama_produk'] ?></td>
                <td>Rp <?= number_format($d['harga']) ?></td>
                <td><?= $d['stok'] ?></td>

                <!-- ✅ TAMPILKAN KATEGORI -->
                <td><?= $d['nama_kategori'] ?? '-' ?></td>

                <td>
                    <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>