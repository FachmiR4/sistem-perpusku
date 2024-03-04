<?php 
include ("app/connection.php");
$koneksi = new database();
$id = $_GET['id'];
$table = 'tbl_petugas';
$data = $koneksi->tampil_data_edit($table, $id);
foreach($data as $dataset){

?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Data Petugas</h3>
		</div>
		<form role="form"  action="app/proses.php?action=edit_petugas" method="POST">
			<div class="box-body">
				<div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
					<label for="">Username</label>
					<input type="text" name="Username" value="<?php echo $dataset['username'];?>" class="form-control" >
                </div>
                <div class="form-group">
					<label for="">Password</label>
					<input type="password" name="pass" class="form-control" value="<?php echo $dataset['password'];?>" >
                </div>
                <div class="form-group">
					<label for="">nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $dataset['nama'];?>" >
                </div>
                <div class="form-group">
					<label for="">Jenis Kelamin</label>
					<p><input type="radio" name="jns_kelamin" value="L"<?php echo $dataset['jns_kelamin'] == "L"? 'checked' : ""; ?> >Laki-Laki</p>
                    <p><input type="radio" name="jns_kelamin" value="P"<?php echo $dataset['jns_kelamin'] == "P"? 'checked' : ""; ?> >Perempuan</p>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" ><?php echo $dataset['alamat'];?></textarea>
                </div>
                    <label for="">Telepone</label>
                    <input type="text" name="tlpn" class="form-control" value="<?php echo $dataset['tlpn'];?>" >
			</div>
			<div class="box-footer">
				<a href="index.php?page=petugas" class="btn btn-danger">back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>