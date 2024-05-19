<?php

$kon = mysqli_connect("localhost", "root", "", "sistem_perpustakaan");

$idmember = $_GET['idmember'];

require('fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm','Letter');

$pdf->AddPage();

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'STRUK BOOKING BUKU E-PERPUS',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,12,"Tanggal Booking : ".date("d-m-Y"),'C');
$pdf->Cell(0, 1, " ", "B");

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B','10');


$pdf->Cell(20,6,'ID Booking',1,0,'C');
// $pdf->Cell(45,6,'Nama Petugas',1,0,'C');
$pdf->Cell(55,6,'Nama Member',1,0,'C');
$pdf->Cell(58,6,'Judul Buku',1,0,'C');
$pdf->Cell(30,6,'Tanggal Booking',1,1,'C');


$pdf->SetFont('Times','',10);

$no=1;
$jk='';
//Query untuk mengambil data mahasiswa pada tabel mahasiswa
// $hasil = mysqli_query($kon, "SELECT * FROM buku JOIN kategori ON buku.idkategori = kategori.idkategori JOIN detail_buku ON buku.idbuku = buku.idbuku");
$hasil = mysqli_query($kon, "SELECT * FROM booking JOIN member ON booking.idmember = member.idmember JOIN buku ON booking.idbuku = buku.idbuku");
$data = mysqli_fetch_array($hasil);
    $pdf->Cell(20,6,$data['idbooking'],1,0,'C');
    // $pdf->Cell(45,6,$data['nama_petugas'],1,0,'C');
    $pdf->Cell(55,6,$data['nama_member'],1,0,'C');
    $pdf->Cell(58,6,$data['judul'],1,0,'C');
    $pdf->Cell(30,6,$data['tgl_pinjam'],1,1,'C');
    $no++;


$pdf->Output("Struk Booking.pdf", 'I');

?>