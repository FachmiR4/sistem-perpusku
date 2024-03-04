<?php 
include ('app/connection.php');
$koneksi = new database();
$optionsAnggota = $koneksi->tampil_data_anggota();
$optionBuku = $koneksi->tampil_data_buku()

?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Peminjaman</h3>
		</div>
		<form  action="app/proses.php?action=addPeminjaman" method="POST" id="insert_form">
			<div class="box-body" id="item_table">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Nama :</label>
                            <select name="item_name" class="form-control selectpicker" data-live-search="true">
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
                                <select name="judul_buku[]" class="form-control selectpicker-1" id="item_unit_1" data-live-search="true">
                                    <option value="">Select Unit</option>
                                    <?php foreach ($optionBuku as $option1) { ?>
                                        <option value="<?php echo $option1['id']; ?>"><?php echo $option1['judul_buku']; ?> </option>
                                     <?php } ?>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input type="hidden" name="sts[]" class="form-control " id="item_name_1"  value="1"/>
                            <div class="form-group">
                                <label for="">Jumlah Buku :</label>
                                <input type="text" name="qty[]" class="form-control " id="item_name_1" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-danger btn-sm add" onclick="deleteMultiple(1)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <button type="button" class="btn btn-success btn-sm add" onclick="addMultiple()"><i class="fas fa-plus"></i></button>
                </div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.selectpicker-1').selectpicker('refresh');
    })

    function addMultiple(){
        i = $('.data-detail').length;
        console.log(i)
        i++;    
        var html = '';
            html += `
                <div id="data-detail-`+i+`" class="data-detail">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Judul Buku :</label>
                            <select name="judul_buku[]" class="form-control selectpicker-`+i+`" id="item_unit_`+i+` data-live-search="true">
                                    <option value="">Select Unit</option>
                                    <?php foreach ($optionBuku as $option1) { ?>
                                        <option value="<?php echo $option1['id']; ?>"><?php echo $option1['judul_buku']; ?> </option>
                                     <?php } ?>
                            </select>    
                        </div>
                    </div>
                    <div class="col-md-5">
                        <input type="hidden" name="sts[]" class="form-control " id="item_name_`+i+`"  value="1"/>
                        <div class="form-group">
                            <label for="">Jumlah Buku :</label>
                            <input type="text" name="qty[]" class="form-control" id="item_name_`+i+`" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="button" class="btn btn-danger btn-sm add" onclick="deleteMultiple(`+i+`)"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `;

        $('#form-data-load').append(html);
        $('.selectpicker-'+i).selectpicker('refresh');
    }

    function deleteMultiple(id){
        console.log(id);
        $('#data-detail-'+id).empty();
    }
</script>


