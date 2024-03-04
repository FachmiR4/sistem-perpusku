<?php
include("app/connection.php");
$koneksi = new database();
$optionsPenerbit = $koneksi->tampil_data_penerbit();
$optionsPenulis = $koneksi->tampil_data_penulis();
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Quick Example</h3>
		</div>
		<form role="form" action="app/proses.php?action=addBuku" method="POST">
			<div class="box-body">
				<div class="form-group">
					<label for="">Judul Buku</label>
					<input type="text" name="judul_buku" class="form-control" >
                </div>
				<div class="form-group">
					<label for="">Penerbit</label>
                    <select name="penerbit" class="form-control">
                        <option value="">-- Silahkan Pilih --</option>
                        <?php foreach ($optionsPenerbit as $option) { ?>
                            <option value="<?php echo $option['id']; ?>"><?php echo $option['penerbit']; ?> </option>
                        <?php } ?>
			        </select>
                </div>
                <div class="form-group">
					<label for="">Penulis</label>
                    <select name="penulis" class="form-control">
                        <option value="">-- Silahkan Pilih --</option>
                        <?php foreach ($optionsPenulis as $option) { ?>
                            <option value="<?php echo $option['id']; ?>"><?php echo $option['penulis']; ?> </option>
                        <?php } ?>
			        </select>
                </div>
                <div class="form-group">
					<label for="">stock</label>
					<input type="text" name="qty" class="form-control" >
                </div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>