<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = htmlspecialchars($_POST["nama"]);
    $harga  = $_POST["harga"];
    $stok   = $_POST["stok"];

    // Proses upload gambar
    $namaFile = $_FILES['gambar']['name'];
    $tmpFile  = $_FILES['gambar']['tmp_name'];
    $folder   = "uploads/";

    if (!empty($namaFile)) {
        move_uploaded_file($tmpFile, $folder . $namaFile);

        // Simpan ke database
        $query = "INSERT INTO produk_digital (nama_produk, harga, stok, gambar) 
                  VALUES ('$nama', '$harga', '$stok', '$namaFile')";

        if (mysqli_query($conn, $query)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan produk.";
        }
    } else {
        echo "Gambar wajib diunggah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - PopDigital</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>+ Tambah Produk Digital</h1>

    <form method="POST" enctype="multipart/form-data">
        <label>Nama Produk</label>
        <input type="text" name="nama" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Gambar Produk</label>
        <input type="file" name="gambar" accept="image/*" required>

        <button type="submit" class="btn-simpan">Simpan</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</body>
</html>
