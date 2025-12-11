<?php include "navbar.php"; ?>
<?php include "koneksi.php"; ?>

<?php
$nim = $_GET['nim'];
$res = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($res);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="text-center">Edit Data Mahasiswa</h3>

    <form action="proses_edit.php" method="post">
      <input type="hidden" name="nim" value="<?= $data['nim'] ?>">

      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama_mhs" class="form-control"
               value="<?= $data['nama_mhs']; ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control"
               value="<?= $data['tgl_lahir']; ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
      </div>

      <button type="submit" class="btn btn-success">Update</button>
      <a href="list_mhs.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
