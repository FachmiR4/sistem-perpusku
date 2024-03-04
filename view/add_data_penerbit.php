<?php
include("app/connection.php");
$koneksi = new database();
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Quick Example</h3>
		</div>
		<form role="form" action="app/proses.php?action=addPenerbit" method="POST">
			<div class="box-body">
				<div class="form-group">
					<label for="">Penerbit</label>
					<input type="text" name="addPenerbit" class="form-control" >
                </div>
                <div class="form-group">
					<label for="">Tahun Penerbit</label>
					<input type="text" name="addTahun" class="form-control" >
                </div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>