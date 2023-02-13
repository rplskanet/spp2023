<?php
// memanggil library FPDF
require('lib/fpdf.php');
include 'koneksi.php';
 $nis='0114ef';
 $query= mysqli_query($koneksi,"select * from v_pembayaran where no kwitansi='1'");
$data=mysqli_fetch_all($query);

 // intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA KONSUMEN',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(50,7,'NAMA' ,1,0,'C');
$pdf->Cell(75,7,'ALAMAT',1,0,'C');
$pdf->Cell(55,7,'TELEPON',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM konsumen");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(50,6, $d['nama_konsumen'],1,0);
  $pdf->Cell(75,6, $d['alamat_konsumen'],1,0);  
  $pdf->Cell(55,6, $d['telp_konsumen'],1,1);
}
 
$pdf->Output();
 
?>