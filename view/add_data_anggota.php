<?php
include ('app/connection.php');
$koneksi = new database();
?>
<html>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Tambah Data Anggota</h3>
		</div>
		<form role="form" action="app/proses.php?action=addAnggota" method="POST">
			<div class="box-body">
				<div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" >
                    <label for="">Jenis Kelamin</label>
                    <p><input type="Radio" name="jns_kelamin"  value="L" >Laki-Laki</p>
                    <p><input type="Radio" name="jns_kelamin" value="P" >Perempuan</p>
                    <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                    <label for="">Telepone</label>
                    <input type="text" name="tlpn" class="form-control" >
                </div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
</html>