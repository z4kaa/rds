<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
