<?php
include "app/connection.php";
$koneksi = new database();
$table1 = 'master_penerbit';
$table2 = 'master_penulis';
$data = $koneksi->tampil_data($table1, $table2);
?>
<div class="col-xs-12"> 
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <a href="index.php?page=master_buku&&act=addBuku" class="btn btn-success btn-sm pull-right">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>QTY</th>
                        <th width=20%>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $n = 1;  
                    if(is_null($data)){         
                    }else{
                    foreach($data as $dataset){
                        echo "<tr>";
                        echo "<td>".$n."</td>";
                        echo "<td>".$dataset['judul_buku']."</td>";
                        echo "<td>".$dataset['penerbit']."</td>";
                        echo "<td>".$dataset['penulis']."</td>";
                        echo "<td>".$dataset['qty']."</td>";
                        echo "<td>"."<a class='btn btn-sm btn-primary' href='index.php?page=petugas&&act=editData&&id=$dataset[id]'><i class='fa fa-edit'></i>Edit</a>
                        <a class='btn btn-sm btn-danger'href='app/proses.php?action=hapus&&id=$dataset[id]'><i class='fa fa-trash'></i>Delete</a>"."</td>";
                        echo "</tr>";
                        $n++;
                    }
                 }  
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>