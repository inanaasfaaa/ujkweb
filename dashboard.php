<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Hitung jumlah produk
$jumlah = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
$dataJumlah = mysqli_fetch_assoc($jumlah);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand">DASHBOARD</a>

        <div class="ms-auto">
            <span class="text-white me-3">
                👋 <?= $_SESSION['username'] ?? 'User'; ?>
            </span>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

    <h3 class="mb-4"></h3>

    <div class="row justify-content-center">

        <!-- CARD JUMLAH PRODUK -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <h2 class="text-primary"><?= $dataJumlah['total']; ?></h2>
                </div>
            </div>
        </div>

        <!-- CARD MENU -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelola Produk</h5>
                    <a href="products/index.php" class="btn btn-primary mt-2">
                        Masuk
                    </a>
                </div>
            </div>
        </div>

</div>

</body>
</html>