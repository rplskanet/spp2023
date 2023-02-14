<?php
ob_start();
// memanggil library FPDF
session_start();
$id_petugas=$_SESSION['id_petugas'];
require('lib/fpdf.php');
include '../koneksi.php';
// $nis=$_POST['nis'];

//
$query=mysqli_query($koneksi,"select max(no_kwitansi) as no_kwitansi from pembayaran");
$data=mysqli_fetch_array($query);
$no_kwitansi=$data ['no_kwitansi']+1;
$tgl_bayar=date('Y-m-d');
//
// echo $no_kwitansi;
$query=mysqli_query($koneksi,"update pembayaran set no_kwitansi='$no_kwitansi' ,status='1', `id_petugas` = '$id_petugas' ,tgl_bayar='$tgl_bayar' where status='0'");

//
 $query= mysqli_query($koneksi,"select * from v_pembayaran where no_kwitansi='$no_kwitansi'");
 $data=mysqli_fetch_array($query);
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Pembayaran Siswa',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(100,10,'Nama : '.$data['nama'],0,1,'L');
$pdf->Cell(100,10,'Kelas : '.$data['kelasok'],0,1,'L');
$pdf->Cell(100,10,'Tannggal : '.date("d/m/y",strtotime($data['tgl_bayar'])),0,1,'L');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(100,7,'Uraian' ,1,0,'C');
$pdf->Cell(75,7,'Nominal',1,0,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data1 = mysqli_query($koneksi,"SELECT  * FROM v_pembayaran where no_kwitansi='$no_kwitansi'");
$total=0;
while($d = mysqli_fetch_array($data1)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(100,6, $d['nama_bayar'],1,0);
  $pdf->Cell(75,6, $d['nominal'],1,1,'R');  
  $total=$total+$d['nominal'];
}
$pdf->Cell(185,6, $total,1,1,'R');  
$pdf->Cell(10,45,'',0,1);
$pdf->Cell(150,20,'Petugas : ',0,1,'R');
$pdf->Cell(150,10,$data['nama_petugas'],0,1,'R');
$pdf->Output();
ob_end_flush(); 
?>
<!-- <img src="lib/yanna.png" alt=""> -->