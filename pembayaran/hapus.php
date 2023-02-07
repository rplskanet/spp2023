<?php
include "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($koneksi,"delete from pembayaran where id='$id'");


?>
<script>
    window.location.href = '?page=transaksi/pembayaran';
</script>
<?php 