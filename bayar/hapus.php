<?php
include "koneksi.php";
$id_bayar = $_GET['id_bayar'];
//echo $kode_konsumen;
$query = mysqli_query($koneksi, "delete from bayar where id_bayar='$id_bayar'");
header('location:?page=bayar/index');
?>