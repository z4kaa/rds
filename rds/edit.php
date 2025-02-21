<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $nomor_absen = $_POST['nomor_absen'];

    // Jika ada foto baru
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

        $query = "UPDATE siswa SET nama='$nama', kelas='$kelas', nomor_absen='$nomor_absen', foto='$foto' WHERE id=$id";
    } else {
        $query = "UPDATE siswa SET nama='$nama', kelas='$kelas', nomor_absen='$nomor_absen' WHERE id=$id";
    }

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
    <title>Edit Data Siswa</title>
</head>
<body>

    <h2>Edit Data Siswa</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

        <label>Kelas:</label>
        <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required><br><br>

        <label>Nomor Absen:</label>
        <input type="number" name="nomor_absen" value="<?= $data['nomor_absen'] ?>" required><br><br>

        <label>Foto:</label>
        <input type="file" name="foto"><br><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>
