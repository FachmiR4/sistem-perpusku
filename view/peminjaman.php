<?php 
include ('app/connection.php');
$koneksi = new database();
$data = $koneksi->tampil_data_peminjaman();
?>
<div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Peminjaman</h3>
              <a href="index.php?page=peminjaman&&act=addPeminjaman" class="btn btn-success btn-sm pull-right">Tambah Data</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Jumlah</th>
                        <th>Status</th>
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
                        echo "<td>".$dataset['nama']."</td>";
                        echo "<td>".$dataset['judul_buku']."</td>";
                        echo "<td>".$dataset['tgl_peminjaman']."</td>";
                        echo "<td>".$dataset['tgl_pengembalian']."</td>";
                        echo "<td>".$dataset['jumlah']."</td>";
                        if($dataset['status'] == 1){
                          echo "<td>"."<span class='label label-danger'>dipinjam</span>"."</td>";
                        }elseif($dataset['status'] == 2){
                          echo "<td>"."<span class='label label-success'>dikembalikan</span>"."</td>";
                        }
                        echo "<td>"."
                        <a class='btn btn-sm btn-danger'href='app/proses.php?action=hapus_peminjaman&&id_dtl=$dataset[id_dtl]'><i class='fa fa-trash'></i>Delete</a>"."</td>";
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