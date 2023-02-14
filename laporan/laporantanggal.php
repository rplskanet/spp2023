<?php
include "koneksi.php";
?>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Laporan Per Tanggal</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
<form action="" method="post">
    <br> 
    <input type="date" class="form-control" width="312" name="tgl_bayar"/>
    <br>
    <button class="btn btn-danger" name="proses">Proses</button>
</form>
</div>
</div>
<div class="card-body">
<?php
if(isset($_POST['proses'])){
    $tgl_bayar=$_POST['tgl_bayar'];
    ?>
    <table class="table table bordered">
    <tr>
        <td>No</td>
        <td>Nama Siswa</td>
        <td>Nama Siswa</td>
        <td>Pembayaran</td>
        <td>Tanggal</td>
    </tr>
    <?php
    $query=mysqli_query($koneksi,"select * from v_pembayaran where tgl_bayar='$tgl_bayar'");
    $i=1;
    while($data=mysqli_fetch_array($query)){
    ?>
<tr>
    <td><?php echo $i++  ?></td>
    <td><?php echo $data['nama']  ?></td>
    <td><?php echo $data['nominal']  ?></td>
    <td><?php echo $data['nama_bayar']  ?></td>
    <td><?php echo $data['tgl_bayar']  ?></td>
</tr>
    <?php
}
?>
</table>
    <?php
}


?>
</div>
</div>
