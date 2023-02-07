<?php
include "koneksi.php";
?>

<h1 class="h3 mb-2 text-gray-800">Tambah Data Bayar</h1>
<form action="?page=bayar/simpan" method="POST">
<div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
        <div class="mb-3">
        <label class="form-label">Id Bayar</label>
        <input type="text" class="form-control" name="id">
        </div>
        <div class="mb-3">
        <label class="form-label">Nama Bayar</label>
        <input type="text" class="form-control" name="nama_bayar">
        </div>
        <div class="mb-3">
        <label class="form-label">Nominal</label>
        <input type="text" class="form-control" name="nominal">
        </div>
        <button type="submit" class="btn btn-danger" value="simpan">Submit</button>
        </div>
        
</div>

</form>