<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $nomor_absen = $_POST['nomor_absen'];
    
    // Upload Foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $query = "INSERT INTO siswa (nama, kelas, nomor_absen, foto) VALUES ('$nama', '$kelas', '$nomor_absen', '$foto')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>

    <h2>Tambah Data Siswa</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label>
        <input type="text" name="kelas" required><br><br>

        <label>Nomor Absen:</label>
        <input type="number" name="nomor_absen" required><br><br>

        <label>Foto:</label>
        <input type="file" name="foto" required><br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
