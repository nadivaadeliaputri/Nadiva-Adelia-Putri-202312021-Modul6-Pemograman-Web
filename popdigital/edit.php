<?php
include 'db.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM produk_digital WHERE id_produk = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Produk tidak ditemukan.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = htmlspecialchars($_POST["nama"]);
    $harga = $_POST["harga"];
    $stok  = $_POST["stok"];
    
    if ($_FILES['gambar']['name']) {
        $namaFile = $_FILES['gambar']['name'];
        $tmpFile  = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmpFile, "uploads/" . $namaFile);
    } else {
        $namaFile = $data['gambar']; // tetap pakai gambar lama
    }

    $update = "UPDATE produk_digital SET 
                nama_produk = '$nama', 
                harga = '$harga', 
                stok = '$stok', 
                gambar = '$namaFile'
              WHERE id_produk = $id";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate produk.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk - PopDigital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Produk</h1>

    <form method="POST" enctype="multipart/form-data">
        <label>Nama Produk</label>
        <input type="text" name="nama" value="<?= $data['nama_produk'] ?>" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $data['harga'] ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>

        <label>Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" accept="image/*">
        <br><img src="uploads/<?= $data['gambar'] ?>" width="100"><br><br>

        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</body>
</html>
