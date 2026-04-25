<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data produk
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

// Ambil semua kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    $kategori_id = $_POST['kategori_id']; // ← tambahan

    // UPDATE sudah termasuk kategori_id
    mysqli_query($conn, "UPDATE products SET 
        nama_produk='$nama',
        harga='$harga',
        stok='$stok',
        kategori_id='$kategori_id'
        WHERE id=$id");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Produk</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <!-- Nama -->
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control"
                        value="<?= $data['nama_produk'] ?>" required>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control"
                        value="<?= $data['harga'] ?>" required>
                </div>

                <!-- Stok -->
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control"
                        value="<?= $data['stok'] ?>" required>
                </div>

                <!-- ✅ DROPDOWN KATEGORI -->
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                            <option value="<?= $k['id'] ?>"
                                <?= $k['id'] == $data['kategori_id'] ? 'selected' : '' ?>>
                                <?= $k['nama_kategori'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">← Kembali</a>
                    <button class="btn btn-warning">Update</button>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>