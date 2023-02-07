<h1 class="h3 mb-2 text-gray-800">Transaksi Pembayaran</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <?php
include "koneksi.php";
$id_petugas=$_SESSION['id_petugas'];
$nis=$_GET['nis'];
$query=mysqli_query($koneksi,"select * from siswa where nis='$nis'");
$data=mysqli_fetch_array($query);
echo "Nama : ".$data['nama']."<br>";
echo "Kelas : ".$data['kelasok']."<br>";
?>
        <form action="" method="post">
            Pembayaran :
            <select class="form-control" name="id_bayar" id="">
                <?php
        $query=mysqli_query($koneksi,"select * from bayar");
        while($bayar=mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $bayar['id_bayar'] ?>"><?php echo $bayar['nama_bayar'] ?></option>
                <?php
        }
    ?>
            </select>
            <br>
            <button class="btn btn-primary" name="simpan">Simpan</button>
            <button class="btn btn-warning" name="selesai">Selesai</button>
        </form>

        <?php
if(isset($_POST['simpan'])){
//Cek Data Pembayaran
$id_bayar=$_POST['id_bayar'];
$cek=mysqli_query($koneksi,"select * from pembayaran where nis='$nis' and id_bayar='$id_bayar'");

if(mysqli_num_rows($cek)>0){
    echo "Pembayaran sudah dibayarkan";
}
elseif($nis==""){
    echo "Nis Masih Kosong";
}
else{
  
    $query=mysqli_query($koneksi,"insert into pembayaran(nis,id_bayar,id_petugas) values('$nis','$id_bayar','$id_petugas')");
    echo "Data Berhasil Ditambahkan";
}
    
}

if (isset($_POST['selesai'])) {
    //membuat no_kwitansi
    $query=mysqli_query($koneksi,"select max(no_kwitansi) as no_kwitansi from pembayaran");
    $data=mysqli_fetch_array($query);
    $no_kwitansi=$data ['no_kwitansi']+1;
    $tgl_bayar=date('Y-m-d');
    //
    $query=mysqli_query($koneksi,"update pembayaran set no_kwitansi='$no_kwitansi' ,status='1', `id_petugas` = '$id_petugas' ,tgl_bayar='$tgl_bayar' where status='0'");
    ?>
        <script>
            window.location.href = '?page=pembayaran/index';
        </script>
        <?php
}
?>

        <!-- Tampil Data -->
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Pembayaran</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
            <?php
    $i=1;
    $query=mysqli_query($koneksi,"SELECT pembayaran.nis,pembayaran.id,bayar.nama_bayar,bayar.nominal from pembayaran,bayar WHERE bayar.id_bayar=pembayaran.id_bayar AND pembayaran.status='0' AND pembayaran.nis='$nis'");
    while($data=mysqli_fetch_array($query)){
    ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $data['nama_bayar']?></td>
                <td align="right"><?= formatUang($data['nominal'])?></td$data['nominal']>
                <td><a href="?page=pembayaran/hapus&id=<?= $data['id'] ?>&nis=<?= $data['nis'] ?>"
                        class="btn btn-danger">Hapus</a></td>
            </tr>
            <?php
    $total=$total + $data['nominal'];
    }
    ?>
            <tr>
                <th colspan="2">Jumlah</th>
                <th class="text-right"> <?php echo formatUang($total); ?></th>
                <td></td>
            </tr>
        </table>
    </div>
</div>