<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

// Ambil data kategori untuk dropdown
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $kategori_id = $_POST['kategori_id']; // ← TAMBAHAN

    // INSERT sudah ditambah kategori_id
    mysqli_query($conn, "INSERT INTO products 
    (nama_produk, harga, stok, kategori_id) 
    VALUES ('$nama', '$harga', '$stok', '$kategori_id')");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3>Tambah Produk</h3>

    <form method="POST">

        <!-- Nama -->
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <!-- ✅ DROPDOWN KATEGORI (DITAMBAHKAN DI SINI) -->
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id'] ?>">
                        <?= $k['nama_kategori'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Tombol -->
        <button class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>

    </form>

</div>

</body>
</html>