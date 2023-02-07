<?php
include "koneksi.php";
$id_bayar=$_POST['id_bayar'];
$nama_bayar=$_POST['nama_bayar'];
$nominal=$_POST['nominal'];
$query=mysqli_query($koneksi,"insert into bayar values('$id_bayar','$nama_bayar','$nominal')");
header('location:?page=bayar/index');
?>