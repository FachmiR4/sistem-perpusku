<?php 
include ("app/connection.php");
$koneksi = new database();
$data = $koneksi->tampil_data_petugas();
?>

<div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Petugas</h3>
              <a href="index.php?page=petugas&&act=addPetugas" class="btn btn-success btn-sm pull-right">Tambah Data</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
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
                        echo "<td>".$dataset['username']."</td>";
                        echo "<td>".$dataset['nama']."</td>";
                        echo "<td>".$dataset['jns_kelamin']."</td>";
                        echo "<td>".$dataset['alamat']."</td>";
                        echo "<td>".$dataset['tlpn']."</td>";
                        echo "<td>"."<a class='btn btn-sm btn-primary' href='index.php?page=petugas&&act=editData&&id=$dataset[id]'><i class='fa fa-edit'></i>Edit</a>
                        <a class='btn btn-sm btn-danger'href='app/proses.php?action=hapus_petugas&&id=$dataset[id]'><i class='fa fa-trash'></i>Delete</a>"."</td>";
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