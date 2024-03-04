<?php 
include "app/connection.php";
$koneksi = new database();
$id = $_GET['id'];
$data = $koneksi->edit_penerbit($id);

foreach($data as $dataset){
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Data Penerbit</h3>
		</div>
		<form role="form"  action="app/proses.php?action=edit_penerbit" method="POST">
			<div class="box-body">
				<div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
					<label for="">penerbit</label>
					<input type="text" name="penerbit" value="<?php echo $dataset['penerbit'];?>" class="form-control" >
                </div>
                <div class="form-group">
					<label for="">Tahun Penerbit</label>
					<input type="text" name="tahun" class="form-control" value="<?php echo $dataset['tahun_terbit'];?>" >
                </div>
			</div>
			<div class="box-footer">
				<a href="index.php?page=penerbit" class="btn btn-danger">back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>
