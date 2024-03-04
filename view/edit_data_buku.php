<?php
include("app/connection.php");
$koneksi = new database();
$table = "master_buku";
$table2 = "master_penerbit";
$table3 = "master_penulis";
$id = $_GET['id'];
$optionsPenerbit = $koneksi->tampil_data_penerbit();
$optionsPenulis = $koneksi->tampil_data_penulis();
$data = $koneksi->edit($table, $table2, $table3 ,$id);

foreach($data as $dataset){
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit data Buku</h3>
		</div>
		<form role="form"  action="app/proses.php?action=edit" method="POST">
			<div class="box-body">
				<div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
					<label for="">Judul Buku</label>
					<input type="text" name="jdl_buku" value="<?php echo $dataset['judul_buku'];?>" class="form-control" >
                </div>
				<div class="form-group">
					<label for="">Penerbit</label>
                    <select name="penerbit" class="form-control">
                        <option value="">-- Silahkan Pilih --</option>
                        <?php foreach ($optionsPenerbit as $option) { ?>
                            <option value="<?php echo $option['id']; ?>" <?php echo $dataset['penerbit_id'] == $option['id'] ? 'selected': '';?>><?php echo $option['penerbit']; ?> </option>
                        <?php } ?>
			        </select>
                </div>
                <div class="form-group">
					<label for="">Penulis</label>
                    <select name="penulis" class="form-control">
                        <option value="">-- Silahkan Pilih --</option>
                        <?php foreach ($optionsPenulis as $option) { ?>
                            <option value="<?php echo $option['id']; ?>"<?php echo $dataset['penulis_id'] == $option['id'] ? 'selected': '';?>><?php echo $option['penulis']; ?> </option>
                        <?php } ?>
			        </select>
                </div>
                <div class="form-group">
					<label for="">stock</label>
					<input type="text" name="stock" class="form-control" value="<?php echo $dataset['qty'];?>" >
                </div>
			</div>
			<div class="box-footer">
				<a href="index.php?page=master_buku" class="btn btn-danger">back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>