<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori WHERE id=$id");

header("Location: index1.php");