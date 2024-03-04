<?php
include ("app/connection.php");
$koneksi = new database();
$optionsAnggota = $koneksi->tampil_data_anggota();
?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">MENU PENGEMBALIAN BUKU</h3>
              <div class="row">
                <div class="col-md-5 pull-right">
                            <select name="voption" id="voption" class="form-control selectpicker" data-live-search="true" onchange="detail()">
                                <option value="">Search Name</option>
                                <?php foreach ($optionsAnggota as $option) { ?>
                                    <option value="<?php echo $option['id']; ?>"><?php echo $option['nama']; ?> </option>
                                <?php } ?>
                            </select>    
                </div>
                </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjamn</th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <form  action="app/proses.php?action=" method="POST">
                  <tbody id="table-body">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<script>    
    function detail(){
        var id = $('#voption').val();
        $.ajax({
          url : "app/proses.php",
          method : "GET",
          data : {
            id:id
          },
          dataType : "json",
          beforeSend : function(){
            $('#table-body').html('');
          },
          success:  function(data){
              if(data.length > 0){
                var html = "";

                $.each(data,function(i,val){
                  html += `<tr>`;
                  html += `<td><input type="text" name="vnama[]" id="vnama_`+i+`" value="`+val.nama+`"></td>`;
                  html += `<td><input type="text" name="vbuku[]" id="vbuku_`+i+`" value="`+val.judul_buku+`"></td>`;
                  html += `<td><input type="text" name="vtgl_pnj[]" id="vtgl_pnj_`+i+`" value="`+val.tgl_peminjaman+`"></td>`;
                  html += `<td><input type="text" name="vtgl_png[]" id="vtgl_png_`+i+`" value="`+val.tgl_pengembalian+`"></td>`;
                  html += `<td><input type="text" name="vjumlah[]" id="vjumlah_`+i+`" value=`+val.jumlah+`></td>`;
                  html += `<td><input type="button" onclick="save_data(`+i+`)" value='save'></td>`;
                  html += `</tr>`;
                });
                $('#table-body').append(html);
              }
          }
        })
    }

    function save_data(i){
      $.ajax({
          url : "app/proses.php",
          method : "POST",
          data : {
            nama: $('#vnama_'+i).val(),
            buku: $('#vbuku_'+i).val(),
            tgl_pnj: $('#vtgl_pnj_'+i).val(),
            tgl_png: $('#vtgl_png_'+i).val(),
            jumlah : $('#vjumlah_'+i).val() 
          },
          dataType : "json",
          beforeSend : function(){
          },
          success:  function(data){
            
          }
        })
    }
</script>