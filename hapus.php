<?php
session_start();

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

// Validasi ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Ambil ID dan amankan
$id = intval($_GET['id']);

// Hapus data produk
mysqli_query($conn, "DELETE FROM products WHERE id=$id");

// Redirect kembali
header("Location: index.php");
exit;
?>