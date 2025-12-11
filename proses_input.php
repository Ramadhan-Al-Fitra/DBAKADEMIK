<?php
include "koneksi.php";

$nim = trim($_POST['nim']);
$nama = trim($_POST['nama_mhs']);
$tgl = trim($_POST['tgl_lahir']);
$alamat = trim($_POST['alamat']);

if ($nim == "" || $nama == "" || $tgl == "" || $alamat == "") {
    die("<script>alert('Semua field wajib diisi!'); history.back();</script>");
}

if (!ctype_digit($nim)) {
    die("<script>alert('NIM harus angka!'); history.back();</script>");
}

$d = DateTime::createFromFormat('Y-m-d', $tgl);
if (!$d || $d->format('Y-m-d') !== $tgl) {
    die("<script>alert('Tanggal tidak valid!'); history.back();</script>");
}

// Cek duplikasi NIM
$cekNIM = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim='$nim'");
if (mysqli_num_rows($cekNIM) > 0) {
    die("<script>alert('NIM sudah dipakai!'); history.back();</script>");
}

$sql = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$tgl','$alamat')";
mysqli_query($conn, $sql);

header("Location: list_mhs.php");
exit;
?>
