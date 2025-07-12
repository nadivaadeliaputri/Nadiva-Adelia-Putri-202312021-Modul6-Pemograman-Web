<?php
include 'db.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM produk_digital WHERE id_produk = $id");
$data = mysqli_fetch_assoc($query);

// Hapus file gambar dari folder uploads
if ($data && file_exists("uploads/" . $data['gambar'])) {
    unlink("uploads/" . $data['gambar']);
}

mysqli_query($conn, "DELETE FROM produk_digital WHERE id_produk = $id");
header("Location: index.php");
?>
