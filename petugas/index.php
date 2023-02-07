<?php
include "koneksi.php";
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $query=mysqli_query($koneksi,"select * from petugas");
                        while($data=mysqli_fetch_array($query)){
                            ?>
                        <tr>
                            <td><?php echo $data['id']  ?></td>
                            <td><?php echo $data['username']  ?></td>
                            <td><?php echo $data['password']  ?></td>
                            <td><?php echo $data['nama_petugas']  ?></td>
                            <td><?php echo $data['level']  ?></td>
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