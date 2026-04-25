<?php
session_start();
include '../koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data berdasarkan ID
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE id=$id"));

// Jika form disubmit
if ($_POST) {
    $nama = $_POST['nama'];
 
    mysqli_query($conn, "UPDATE kategori SET 
        nama_kategori='$nama'
        WHERE id=$id");

    header("Location: index1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">
        
        <!-- Header -->
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Kategori</h4>
        </div>

        <!-- Body -->
        <div class="card-body">

            <form method="POST">

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control"
                           value="<?= $data['nama_kategori'] ?>" required>
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