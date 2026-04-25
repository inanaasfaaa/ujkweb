<?php
session_start();
include '../koneksi.php';

// Jika form disubmit
if ($_POST) {
    $nama = $_POST['nama'];

    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) 
    VALUES ('$nama')");

    header("Location: index1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- Card -->
    <div class="card shadow border-0">

        <!-- Header -->
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Kategori</h4>
        </div>

        <!-- Body -->
        <div class="card-body">

            <form method="POST">

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">← Kembali</a>
                    <button class="btn btn-success">Simpan</button>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>