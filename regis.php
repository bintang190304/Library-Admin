<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "sistem_perpustakaan");

// if (!isset($_SESSION["login"])) {
//   header("location: login.php");
//   exit;
// }
// if ($_SESSION["jabatan"]=="pengguna") {
//   header("location: index.php");
//   exit;
// }
require 'functions.php';

// sesuai dengan nama type submitnya dan sesuai dengan function
if (isset($_POST["simpan"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert ('Registrasi Sukses');
        document.location.href = 'login.php';
        </script> ";
    } else {
        echo mysqli_error($koneksi);
    }
}


if (!$conn) {
    die ("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <title>E-PERPUS | Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div id="card" style="height:580px">
    <div id="card-content">
      <div id="card-title">
        <h2>SIGN UP</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="" style="padding-top:13px">
          &nbsp;Nama Lengkap
        </label>
        <input class="form-content" type="text" name="nama"/>
        <div class="form-border"></div>
        <label  style="padding-top:22px">&nbsp;Tempat Lahir
        </label>
        <input  class="form-content" type="text" name="tptlahir"/>
        <div class="form-border"></div>
        <label  style="padding-top:22px">&nbsp;Tanggal Lahir
        </label>
        <input  class="form-content" type="date" name="tgllahir"/>
        <div class="form-border"></div>
        <label  style="padding-top:22px">&nbsp;Password
        </label>
        <input  class="form-content" type="password" name="password"/>
        <div class="form-border"></div>
        <label  style="padding-top:22px">&nbsp;Alamat Lengkap
        </label>
        <textarea class="form-control" name="alamat" id="message" required="" rows="4"></textarea>
        <div class="form-border"></div>
        <button id="submit-btn" name="simpan" >SIGN IN</button>
      </form>
    </div>
  </div>
</body>

</html>