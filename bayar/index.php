<?php
include "koneksi.php";
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Bayar</h1>
    <button class="btn btn-primary mb-2" name="tambah"><a href="?page=bayar/tambah"
            style="color: white; text-decoration: none;">Tambah</a></button>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Bayar</th>
                            <th>Nama Bayar</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query=mysqli_query($koneksi,"select * from bayar");
                        while($data=mysqli_fetch_array($query)){
                            ?>
                        <tr>
                            <td><?php echo $data['id_bayar']  ?></td>
                            <td><?php echo $data['nama_bayar']  ?></td>
                            <td><?php echo formatUang($data['nominal'] ) ?></td>
                            <td>
                                <button class="btn btn-danger"><a style="color: white; text-decoration: none;"
                                        href="?page=produk/hapus&id=<?php echo $data['id'] ?>">Hapus</a></button>
                                <button class="btn btn-warning"><a style="color: white; text-decoration: none;"
                                        href="?page=produk/edit&id=<?php echo $data['id'] ?>">Edit</a></button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>