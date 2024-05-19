<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "sistem_perpustakaan");

if (!isset($_SESSION["nama_member"])) {
  header("location: login.php");
  exit;
}
// if ($_SESSION["jabatan"]=="pengguna") {
//   header("location: index.php");
//   exit;
// }
require 'functions.php';

?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" rel="stylesheet">

    <title>E-PERPUS | Peminjaman Buku</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" aria-label="Ninth navbar example">
      <div class="container-xl">
        <a class="navbar-brand font-weight-bold text-black" href="#page-top">E-PERPUS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07XL">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-black" href="index.php">HOME </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-black" href="buku.php">CEK BUKU </a>
            </li>
            <li class="nav-item  active">
              <a class="nav-link js-scroll-trigger text-black" href="peminjaman.php">PEMINJAMAN BUKU</a>
            </li>  
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" button class="btn btn-dark my-2 my-sm-0" type="submit">LOGOUT</button></a>
          </form>
        </div>
      </div>
    </nav>

    <br><br><br><br>
    <div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cek Buku</li>
      </ol>
    </nav>

    <br>

    <h3 align="center">
      Cek Status
      <small class="text-muted"> Buku E-Perpus</small>
    </h3>

    <br>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Deskripsi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM buku JOIN kategori ON kategori.idkategori = buku.idkategori JOIN detail_buku ON buku.idbuku = detail_buku.idbuku");
          $no = 1;
          while ($dt = $query->fetch_assoc()) :
            ?>
            <form action="" method="post">
              <tr>
                <th scope="row"><?= $dt['idbuku'] ?></th>
                <td><?= $dt['kategori']; ?></td>
                <td><?= $dt['judul']; ?></td>
                <td><?= $dt['pengarang']; ?></td>
                <td><?= $dt['penerbit']; ?></td>
                <td><?= $dt['deskripsi']; ?></td>
                <td><?= $dt['status']; ?></td>
              </tr>
            <?php endwhile; ?>
          </form>
        </tbody>
      </table>
    </div>

    <br><br><br><br><br><br>
    <footer class="d-flex flex-wrap justify-content-between align-items-center px-5 py-3 bg-dark">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 E-Perpus</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
        Perpustakaan Online, terlengkap dan terpercaya
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="buku.php" class="nav-link px-2 text-muted">Cek Buku</a></li>
        <li class="nav-item"><a href="peminjaman.php" class="nav-link px-2 text-muted">Booking Buku</a></li>
      </ul>
    </footer>   



    






    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javaScript" src="js/bootstrap.min.js"></script>
  </body>
  </html>