<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM produk_digital");
?>

<!DOCTYPE html>
<html>
<head>
    <title>PopDigital - Daftar Produk</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>🎀 PopDigital – Produk Digital 🎀</h1>

    <a href="tambah.php" class="btn-tambah">+ Tambah Produk</a>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><img src="uploads/<?php echo $row['gambar']; ?>" width="80"></td>
                <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                <td>Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $row['stok']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id_produk']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id_produk']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
