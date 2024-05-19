<?php

session_start();

require 'functions.php';

if (!isset($_SESSION["nama_member"])) {
  header("location: login.php");
  exit;
}

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
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

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

<br><br>

    <div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-light" style="background-image:url('img/3.jpg');">
    <div class="col-md-auto p-lg-5 mx-auto my-5">
      <strong><h1 class="display-4 fw-normal text-light">E-PERPUS</h1></strong><br> 
      <h3 class="display-4 fw-normal text-light">Perpustakaan Digital Sederhana</h3>
      <br>
      <!-- <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p> -->
      <a class="btn btn-light text-black"  href="buku.php">Cek Buku E-Perpus</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

  <br><br><br>

  <section class="bg-light">
            <div class="container px-5 py-3">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-10 col-lg-5">
                        <strong><h2 class="lh-1 mb-4">TENTANG E-PERPUS</h2></strong>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">E-Perpus adalah layanan Perpustakaan Online dan Offline. Kami hadir untuk memudahkan pengelolaan perpustakaan digital anda.</p>
                        <br>
                        <strong><h5>KELEBIHAN E-PERPUS</h5></strong>
                        <li  class="lead fw-normal text-muted mb-5 mb-lg-0">Laporan Statistik yang Lengkap.</li>
                        <li class="lead fw-normal text-muted mb-5 mb-lg-0">Webiste Aman, Praktis & Efisien.</li>
                        <li class="lead fw-normal text-muted mb-5 mb-lg-0">Kemudahan dalam Mengakses dan Mengontrol Perpustakaan Anda.</li>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle w-75" src="img/2.jpg" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>

<br><br>
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