<?php
session_start();

if (isset($_SESSION["nama_member"])) {
  header("location: index.php");
  exit;
}

require 'functions.php';

if (isset($_POST["login"])) {

  $nama_member = $_POST["nama_member"];
  $idmember = $_POST["idmember"];

  $result = mysqli_query($koneksi, "SELECT * FROM member WHERE nama_member ='$nama_member' AND idmember ='$idmember'");
    if (mysqli_num_rows($result) > 0){
      $_SESSION['nama_member'] = $nama_member;
      $_SESSION['idmember'] = $idmember;
      header("location:index.php");
    }else{
      echo "<script>
      alert('Username atau Password salah');
      document.location.href = 'login.php';
      </script>";
    }
  }

  $error = true;

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <title>E-PERPUS | Sign In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>SIGN IN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="" style="padding-top:13px">
            &nbsp;ID Member
          </label>
        <input class="form-content" type="text" name="idmember"/>
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Nama Member
          </label>
        <input id="user-password" class="form-content" type="text" name="nama_member"/>
        <div class="form-border"></div>
        <button id="submit-btn" type="submit" name="login" >SIGN IN</button>
      </form>
    </div>
  </div>
</body>

</html>