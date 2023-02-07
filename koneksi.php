<?php
$koneksi = mysqli_connect("localhost","root","","spp");
if (mysqli_connect_error()){
    echo "koneksi database gagal :" .mysqli_connect_error();
}
function formatUang($angka){
   return number_format($angka,0,",",".");
}
?>