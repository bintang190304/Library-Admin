<?php

$koneksi = mysqli_connect("localhost", "root", "", "sistem_perpustakaan");


function simpan_booking($data){
	global $koneksi;

	$idbuku = ($data["idbuku"]);
	$idmember = ($data['idmember']);

	$Booking = "Booking";

	mysqli_query($koneksi, "INSERT INTO booking (idbuku, idmember, tgl_pinjam) values ('$idbuku', '$idmember', '" . date('Y-m-d') . "')");

	mysqli_query($koneksi, "UPDATE detail_buku SET status = '$Booking' WHERE idbuku = $idbuku ");

	return mysqli_affected_rows($koneksi);
}

function registrasi($data){

	global $koneksi;

	$nama = ($data['nama']);
	$tptlahir = ($data['tptlahir']);
	$tgllahir = ($data['tgllahir']);
	$password = ($data['password']);
	$alamat = ($data['alamat']);


	// cek username yang sudah ada
	$result = mysqli_query($koneksi, "SELECT * FROM member WHERE nama_member = '$nama'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
					alert ('nama member sudah ada');
				</script> ";
		return false;
	}
	mysqli_query($koneksi, "INSERT INTO member VALUES ('', '$nama', '$tptlahir', '$tgllahir', '$password', '$alamat')");
	
	return mysqli_affected_rows($koneksi);
}

?>