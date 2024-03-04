<?php 
include 'app/connection.php';
$koneksi = new database();
$data = $koneksi->tampil_data_penulis();
?>
<div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <a href="index.php?page=penulis&&act=addBuku" class="btn btn-success btn-sm pull-right">Tambah Data</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penerbit</th>
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
                        echo "<td>".$dataset['penulis']."</td>";
                        echo "<td>"."<a class='btn btn-sm btn-primary' href='index.php?page=penulis&&act=editData&&idPenulis=$dataset[id]'><i class='fa fa-edit'></i>Edit</a>
                        <a class='btn btn-sm btn-danger'href='app/proses.php?action=hapus_penulis&&id=$dataset[id]'><i class='fa fa-trash'></i>Delete</a>"."</td>";
                        echo "</tr>";
                        $n++;
                    }
                 }  
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>