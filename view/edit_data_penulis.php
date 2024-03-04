<?php 
include "app/connection.php";
$koneksi = new database();
$id = $_GET['idPenulis'];
$data = $koneksi->edit_penulis($id);


foreach($data as $dataset){
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Data Penulis</h3>
		</div>
		<form role="form"  action="app/proses.php?action=edit_penulis" method="POST">
			<div class="box-body">
				<div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
					<label for="">Penulis</label>
					<input type="text" name="editPenulis" value="<?php echo $dataset['penulis'];?>" class="form-control" >
                </div>
			</div>
			<div class="box-footer">
				<a href="index.php?page=penulis" class="btn btn-danger">back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>
