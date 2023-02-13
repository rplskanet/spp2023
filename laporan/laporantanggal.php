<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
?>
<h3>Laporan Per Tanggal</h3>
<form action="" method="post">
   
    <br> 
       
 <input id="datepicker" value="2023-02-13" width="312"  name="tgl_bayar"/>
 <script>
     $('#datepicker').datepicker({ format: 'yyyy-dd-mm' });
 </script>

    <br>
    <button name="proses">Proses</button>
</form>
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

