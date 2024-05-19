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

if (isset($_POST["simpan"])) {

    if (simpan_booking($_POST) > 0) {
        echo "<script>
        alert ('Data Disimpan');
        document.location.href = 'peminjaman.php';
        </script> ";
    } else {
        echo mysqli_error($koneksi);
    }
}


if (!$conn) {
    die ("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
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
      <li class="breadcrumb-item active" aria-current="page">Peminjaman Buku</li>
    </ol>
  </nav>

<br>

<h3 align="center">
  Form Booking
  <small class="text-muted"> Buku E-Perpus</small>
</h3>

<br>

  <form method="POST">
      <div class="mb-3 row">
        <label for="m" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-lg-10">
          <input class="form-control" name="idbuku" list="datalistOptions" id="exampleDataList" placeholder="-----PILIH BUKU-----">
            <datalist id="datalistOptions">
              <?php 

                $query = mysqli_query($conn, "SELECT * FROM detail_buku JOIN buku ON detail_buku.idbuku = buku.idbuku WHERE status ='Ada'");

              WHILE($data2 = $query->fetch_assoc()):

              ?>
              <option value="<?= $data2['idbuku']; ?>"><?php echo $data2['judul'];?></option>
              <?php endwhile; ?> 
            </datalist>
        </div>
      </div>
      <?php 

        $member = mysqli_query($conn, "SELECT * FROM member WHERE idmember  ='$_SESSION[idmember]'");
        $name = mysqli_fetch_array($member);

      ?>
      <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Nama Member</label>
        <div class="col-lg-10">
          <input class="form-control" name="idmember" type="hidden" value="<?= $name['idmember']; ?>">
          <input class="form-control" type="text" value="<?php echo "[", $name['idmember'], "]   ", $name['nama_member']; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
        <div class="col-lg-10">
          <?php 
                                //Perintah sql untuk menampilkan semua data pada tabel jurusan

                $hariini = "['" . date('Y-m-d') . "']";

                ?>
                <input class="form-control" name="tgl_pinjam" type="aria-hidden" value="<?php echo date("d-m-Y"); ?>">
        </div>
      </div>
      <?php 

      $sql = mysqli_query($koneksi, "SELECT * FROM booking WHERE idmember = $_SESSION[idmember] ");
      $bt = mysqli_num_rows($sql);

      if($bt == 0){
        echo '<button class="btn btn-dark" type="submit" name="simpan">Booking</button>'; 
      }
       ?>

      </form>
      
      <?php 
      $sql = mysqli_query($koneksi, "SELECT * FROM booking WHERE idmember = $_SESSION[idmember] ");
      $but = mysqli_num_rows($sql);

      if($but == 1){
        echo '<a target="_blank" href="laporan_bookingmember.php?idmember= '.$_SESSION['idmember'].'"><button class="btn btn-success">Cetak Struk Booking</button></a>'; 
      }
      ?>
</div>

<br><br><br><br><br><br><br>
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