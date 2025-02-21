<?php
include 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Profil Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>DATA PROFIL SISWA</h2>
    <a href="tambah.php">Tambah Data</a>

    <table>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Nomor Absen</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['nomor_absen'] . "</td>";
            echo "<td><img src='uploads/" . $row['foto'] . "' width='50'></td>";
            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus.php?id=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>
