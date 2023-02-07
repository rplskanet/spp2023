<?php
include "koneksi.php";
$id=$_GET['id'];
$nis=$_GET['nis'];
$query=mysqli_query($koneksi,"delete from pembayaran where id='$id'");


?>
<script>
    window.location.href = '?page=pembayaran/pembayaran&nis=<?= $nis?>';
    // window.location.href = '?page=pembayaran/pembayaran';
</script>
<?php 