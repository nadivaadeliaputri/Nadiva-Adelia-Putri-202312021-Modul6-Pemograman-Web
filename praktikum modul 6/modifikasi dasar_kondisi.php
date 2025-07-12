<!DOCTYPE html>
<html>
<head>
    <title>Latihan Kondisi PHP</title>
</head>
<body>
    <h1>Cek Nilai</h1>
    <?php
    $nilai = 95; // Anda bisa mengubah nilai ini untuk menguji berbagai kondisi
    echo "<p>Nilai Anda: $nilai</p>";

    if ($nilai > 90) {
        echo "<p style='color:blue;'>Selamat, Anda Sangat Baik!</p>";
    } elseif ($nilai > 80) {
        echo "<p style='color:green;'>Selamat, Anda Baik!</p>";
    } elseif ($nilai > 70) {
        echo "<p style='color:orange;'>Cukup, Anda Lulus!</p>";
    } else {
        echo "<p style='color:red;'>Maaf, Anda perlu belajar lagi.</p>";
    }
    ?>
</body>
</html>