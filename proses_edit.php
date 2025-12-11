<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama_mhs'];
$tgl = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];

$sql = "UPDATE mahasiswa 
        SET nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat' 
        WHERE nim='$nim'";

mysqli_query($conn, $sql);

header("Location: list_mhs.php");
exit;
?>
