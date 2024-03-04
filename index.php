<?php 
session_start();
if(empty($_SESSION['nama']) && empty($_SESSION['status'])){
  header('location: login.php?msg=gagal');
}else{

?>
<!DOCTYPE html>
<html>
<head>
  <?php include "app/head.php"; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include "app/header.php"; ?>

<?php include "app/menu.php"; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <?php 
        if(isset($_GET['msg'])){
        if($_GET['msg'] == 'sukses'){
          echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4><i class='icon fa fa-check'></i> Alert!</h4>
          Success 
        </div>";
        }else{
          echo "<div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4><i class='icon fa fa-check'></i> Alert!</h4>
          Failed
        </div>";
        }
      }
        ?>
        
        </div>
        <?php 
        if(isset($_GET['page'])){
          if($_GET['page']=="home"){
            include 'view/home.php';
          }elseif($_GET['page'] == 'master_buku'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addBuku'){
                include 'view/add_data_buku.php';
              }else if($_GET['act']=='editData'){
                include 'view/edit_data_buku.php';
              }
            }else{
              include "view/master_buku.php";
            }
          }elseif($_GET['page']=='penerbit'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addBuku'){
                include 'view/add_data_penerbit.php';
              }else if($_GET['act']=='editData'){
                include 'view/edit_data_penerbit.php';
              }
            }else{
              include "view/data_penerbit.php";
            }
          }elseif($_GET['page']=='penulis'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addBuku'){
                include 'view/add_data_penulis.php';
              }else if($_GET['act']=='editData'){
                include 'view/edit_data_penulis.php';
              }
            }else{
              include "view/data_penulis.php";
            }
          }elseif($_GET['page']=='petugas'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addPetugas'){
                include 'view/add_data_petugas.php';
              }else if($_GET['act']=='editData'){
                include 'view/edit_data_petugas.php';
              }
            }else{
              include "view/data_petugas.php";
            }
          }elseif($_GET['page']=='anggota'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addAnggota'){
                include ('view/add_data_anggota.php');
              }elseif($_GET['act']=='editData'){
                include ('view/edit_data_anggota.php');
              }
            }else{
              include ('view/data_anggota.php');
            }
          }elseif($_GET['page']=='peminjaman'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addPeminjaman'){
                include ('view/add_data_peminjaman.php');
              }
            }else{
              include ('view/peminjaman.php');
            }
          }elseif($_GET['page']=='pengembalian'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addPengembalian'){
                include ('view/add_data_pengembalian.php');
              }
            }else{
              include ('view/pengembalian.php');
            }
          }elseif($_GET['page']=='log_activity'){
            if(isset($_GET['act'])){
              if($_GET['act']=='addPengembalian'){
                include ('view/add_data_pengembalian.php');
              }
            }else{
              include ('view/log_activity.php');
            }
          }
        }

        ?>
       
      </div>

    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include 'app/footer.php'; ?>

  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<?php include "app/script.php"; ?>
</body>
</html>
<?php } ?>
