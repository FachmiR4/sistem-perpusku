<?php 
include('connection.php');
$koneksi = new database();
$table = "master_buku";
$table2 = "master_penulis";
$table3 = "tbl_petugas";

$server = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'];  //add
if($action == "addBuku")
{
 $exec = $koneksi->tambah_data_buku($_POST['judul_buku'], $_POST['penerbit'], $_POST['penulis'],$_POST['qty']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=master_buku&&msg=sukses');
	}else{
		header('location: ../index.php?page=master_buku&&msg=gagal');
	}
}elseif($action == "hapus"){
	$exec = $koneksi->delete($table,$_GET['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=master_buku&&msg=sukses');
	}else{
		header('location: ../index.php?page=master_buku&&msg=gagal');
	}
}elseif($action == "edit"){
	$exec =$koneksi->update($table, $_POST['jdl_buku'], $_POST['penerbit'],$_POST['penulis'], $_POST['stock'], $_POST['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=master_buku&&msg=sukses');
	}else{
		header('location: ../index.php?page=master_buku&&msg=gagal');
	}
}elseif($action == "edit_penerbit"){
	$exec = $koneksi->update_data_penerbit($_POST['penerbit'],$_POST['tahun'], $_POST['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penerbit&&msg=sukses');
	}else{
		header('location: ../index.php?page=penerbit&&msg=gagal');
	}
}elseif($action == "hapus_penerbit"){
	$exec = $koneksi->delete_penerbit($_GET['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penerbit&&msg=sukses');
	}else{
		header('location: ../index.php?page=penerbit&&msg=gagal');
	}
}elseif($action == "addPenerbit"){
	$exec = $koneksi->add_data_penerbit($_POST['addPenerbit'], $_POST['addTahun']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penerbit&&msg=sukses');
	}else{
		header('location: ../index.php?page=penerbit&&msg=gagal');
	}
}elseif($action == "addPenulis"){
	$exec = $koneksi->add_data_penulis($_POST['addPenulis']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penulis&&msg=sukses');
	}else{
		header('location: ../index.php?page=penulis&&msg=gagal');
	}
}elseif($action == "edit_penulis"){
	$exec = $koneksi->update_data_penulis($_POST['editPenulis'], $_POST['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penulis&&msg=sukses');
	}else{
		header('location: ../index.php?page=penulis&&msg=gagal');
	}
}elseif($action == "hapus_penulis"){
	$exec = $koneksi->delete($table2, $_GET['id']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=penulis&&msg=sukses');
	}else{
		header('location: ../index.php?page=penulis&&msg=gagal');
	}
}elseif($action == "login"){

	$exec = $koneksi->login($_POST['username'], $_POST['password']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=home');
	}else{
		header('location: ../login.php?msg=gagal');
	}
}elseif($action == "addPetugas"){

	$exec = $koneksi->tambah_data_petugas($_POST['username'], $_POST['pass'], $_POST['nama'], $_POST['jns_kelamin'], 
			$_POST['alamat'], $_POST['tlpn']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=petugas&&msg=sukses');
	}else{
		header('location: ../index.php?page=petugas&&msg=gagal');
	}
}elseif($action == "hapus_petugas"){

	$exec = $koneksi->delete($table3, $_GET['id']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=petugas&&msg=sukses');
	}else{
		header('location: ../index.php?page=petugas&&msg=gagal');
	}
}elseif($action == "edit_petugas"){

	$exec = $koneksi->update_petugas($_POST['username'],$_POST['pass'],$_POST['nama'],
	            $_POST['jns_kelamin'],$_POST['alamat'],$_POST['tlpn'],$_POST['id']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=petugas&&msg=sukses');
	}else{
		header('location: ../index.php?page=petugas&&msg=gagal');
	}
}elseif($action == "addAnggota"){

	$exec = $koneksi->tambah_data_anggota($_POST['nama'], $_POST['jns_kelamin'],$_POST['alamat'],$_POST['tlpn']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=anggota&&msg=sukses');
	}else{
		header('location: ../index.php?page=anggota&&msg=gagal');
	}
}elseif($action == "edit_anggota"){

	$exec = $koneksi->update_data_anggota($_POST['nama'], $_POST['jns_klamin'],$_POST['alamat'],$_POST['tlpn'],$_POST['id']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=anggota&&msg=sukses');
	}else{
		header('location: ../index.php?page=anggota&&msg=gagal');
	}
}elseif($action == "hapus_anggota"){
	$table4 = 'tbl_anggota';
	$exec = $koneksi->delete($table4, $_GET['id']);
    if($exec == 'sukses'){
		header('location: ../index.php?page=anggota&&msg=sukses');
	}else{
		header('location: ../index.php?page=anggota&&msg=gagal');
	}
}elseif($action == 'addPeminjaman'){
	$exec = $koneksi->tambah_data_peminjaman($_POST['item_name'], $_POST['judul_buku'], $_POST['qty'], $_POST['sts']);
	if($exec == 'sukses'){
		header('location: ../index.php?page=peminjaman&&msg=sukses');
	}else{
		header('location: ../index.php?page=peminjaman&&msg=gagal');
	}
	
}elseif($action == "hapus_peminjaman"){
	// $table4 = 'tbl_peminjaman';
	$table5 = 'tbl_dtl_peminjaman';
	// $exec = $koneksi->delete($table4, $_GET['id']);
	$exec2 = $koneksi->delete($table5, $_GET['id_dtl']);
    if( $exec2 == 'sukses'){
		header('location: ../index.php?page=peminjaman&&msg=sukses');
	}else{
		header('location: ../index.php?page=peminjaman&&msg=gagal');
	}
}elseif( $server == 'GET'){
	$id = $_GET['id'];
	$koneksi->tampil_data_peminjaman_dtl($id);
}elseif($server == "POST"){
	$nama = $_POST['nama'];
	$buku = $_POST['buku'];
	$tgl_pnj = $_POST['tgl_pnj'];
	$tgl_png = $_POST['tgl_png'];
	$jumlah = $_POST['jumlah'];
	
}
?>