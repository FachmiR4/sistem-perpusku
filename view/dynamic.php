<?php 
include ('app/connection.php');
$koneksi = new database();
$optionsAnggota = $koneksi->tampil_data_anggota();
?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Peminjaman</h3>
		</div>
		<form role="form" action="app/proses.php?action=addPeminjaman" method="POST" id="insert_form">
			<div class="box-body" id="item_table">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Nama :</label>
                            <select name="item_unit[]" class="form-control selectpicker" data-live-search="true">
                                <option value="">Select Unit</option>
                                <?php foreach ($optionsAnggota as $option) { ?>
                                    <option value="<?php echo $option['id']; ?>"><?php echo $option['nama']; ?> </option>
                                <?php } ?>
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="row" id="form-data-load">
                    <div id="data-detail-1" class="data-detail">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Judul Buku :</label>
                                <select name="item_unit[]" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Select Unit</option>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Jumlah Buku :</label>
                                <input type="text" name="item_name[]" class="form-control item_name" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" name="add" class="btn btn-danger btn-sm add" onclick="deleteMultiple(1)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <button type="button" name="add" class="btn btn-success btn-sm add" onclick="addMultiple()"><i class="fas fa-plus"></i></button>
                </div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<script>
    function addMultiple(){
        i = $('.data-detail').length;
        i++;

        var html = '';
            html += `
                <div id="data-detail-`+i+`" class="data-detail">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Judul Buku :</label>
                            <select name="item_unit[]" class="form-control" data-live-search="true">
                                    <option value="">Select Unit</option>
                                </select>    
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Jumlah Buku :</label>
                            <input type="text" name="item_name[]" class="form-control item_name" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="button" name="add" class="btn btn-danger btn-sm add" onclick="deleteMultiple(`+i+`)"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `;

        $('#form-data-load').append(html);
    }

    function deleteMultiple(id){
        console.log(id);
        $('#data-detail-'+id).empty();
    }
</script>