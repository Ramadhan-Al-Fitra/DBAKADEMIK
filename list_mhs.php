<?php include "navbar.php"; ?>
<?php include "koneksi.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h3 class="mb-3 text-center">Daftar Mahasiswa</h3>

  <table class="table table-bordered table-striped text-center">
    <thead class="table-dark">
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
      while ($row = mysqli_fetch_assoc($data)):
      ?>
      <tr>
        <td><?= $row['nim'] ?></td>
        <td><?= $row['nama_mhs'] ?></td>
        <td><?= $row['tgl_lahir'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td>
          <a href="edit.php?nim=<?= $row['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?nim=<?= $row['nim'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
