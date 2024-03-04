<?php

use LDAP\Result;

error_reporting(False);
session_start();
class database{
 
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "belajar_oop";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
	function tampil_data_buku()
	{
		$data = mysqli_query($this->koneksi,"select * from master_buku");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function tampil_data($table1, $table2)
	{
		$value = "Menampilkan Data Buku";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi,"select a.id, a.judul_buku, b.penerbit, c.penulis, a.qty  from master_buku a join 
							$table1 b on a.penerbit_id = b.id join $table2 c on a.penulis_id = c.id ");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
 
	function tampil_data_penerbit()
	{
		$value = "Menampilkan Data Penerbit";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi,"select * from master_penerbit");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	} 	
	function update_data_penerbit($penerbit, $tahun, $id){
		$result = '';
		$value = "Update Data Penerbit";
		$data = mysqli_query($this->koneksi,"update master_penerbit set penerbit = '$penerbit', tahun_terbit = '$tahun' where id = '$id'");
		if($data){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function add_data_penerbit($penerbit, $tahun){
		$result = '';
		$value = "Menambahkan Data Penerbit";
		$data = mysqli_query($this->koneksi,"insert into master_penerbit (penerbit, tahun_terbit)
		                                    values ('$penerbit', '$tahun')");
		if($data){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function add_data_penulis($penulis){
		$result = '';
		$value = "Menambahkan Data Penulis";
		$data = mysqli_query($this->koneksi,"insert into master_penulis (penulis)
		                                    values ('$penulis')");
		if($data){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}function update_data_penulis($penulis, $id){
		$result = '';
		$value = "Update Data Penulis";
		$data = mysqli_query($this->koneksi,"update master_penulis set penulis = '$penulis' where id = '$id'");
		if($data){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function edit_penerbit($id){
		$value = "Menampilkan Edit Penerbit byid $id";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi, "select * from master_penerbit where id = '$id'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row; 
		}
		return $hasil;

	}
	function edit_penulis($id){
		$value = "Menampilkan Edit Penulis byid $id";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi, "select * from master_penulis where id = '$id'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row; 
		}
		return $hasil;

	}
	function delete_penerbit($id){
		$result = "";
		$value = "Melakukan Delete Penerbit byid $id";
		$exec = mysqli_query($this->koneksi, "delete from master_penerbit where id ='$id'");
		if($exec){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function edit($data1, $data2, $data3 ,$id){
		$value = "Melakukan edit Buku byid $id";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi, "select a.id, a.judul_buku, a.penerbit_id, a.penulis_id, b.penerbit, c.id, c.penulis, a.qty  from $data1 a join 
		$data2 b on a.penerbit_id = b.id join $data3 c on a.penulis_id = c.id where a.id = '$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	function delete($table,$id){
		$result = "";
		$value = "Melakukan Delete di $table byid $id";
		$exec = mysqli_query($this->koneksi, "delete from $table where id ='$id'");
		if($exec){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}

	function update($table, $judul , $id_penerbit, $id_penulis, $stock ,$id){
		$result = "";
		$value = "Melakukan update data $table byid $id";
		$exec = mysqli_query($this->koneksi, "update $table set judul_buku = '$judul', penerbit_id = '$id_penerbit', 
		penulis_id = '$id_penulis', qty='$stock' where id ='$id'");
		if($exec){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}


	function tampil_data_penulis()
	{
		$value = "Menampilkan data penulis";
		$this->log_activity($value);
		$data = mysqli_query($this->koneksi,"select * from master_penulis");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
			
		}
		return $hasil;
	}
 
	function tambah_data_buku($judul_buku,$penerbit,$penulis,$stok)
	{
		$result = "";
		$value = "Menambahkan data buku";
	 $exec = mysqli_query($this->koneksi,"insert into master_buku (judul_buku, penerbit_id, penulis_id, qty) 
										values ('$judul_buku','$penerbit','$penulis','$stok')");
		if($exec){
			$result = 'sukses';
			$this->log_activity($value);
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function tampil_data_petugas()
	{
		$value = "Menambahkan data buku";
		$this->log_activity($value);
		$exec = mysqli_query($this->koneksi, "select * from tbl_petugas");
		while($row = mysqli_fetch_array($exec)){
			$result[] = $row;
		}
		return $result;
	}
	function tambah_data_petugas($username, $pass, $nama, $jns_kelamin, $alamat, $tlpn)
	{
		$result = '';
		$exec = mysqli_query($this->koneksi, "insert into tbl_petugas(username, password, nama, jns_kelamin, alamat, tlpn)
		values ('$username', md5('$pass'), '$nama', '$jns_kelamin', '$alamat', '$tlpn')");
		if($exec){
			$result = 'sukses';
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function update_petugas($username, $pass, $nama, $jns_kelamin, $alamat, $tlpn, $id){
		$result = "";
		$exec = mysqli_query($this->koneksi,"updete tbl_petugas set username = '$username', password = md('$pass'), nama = '$nama',
				jns_kelamin = '$jns_kelamin', alamat = '$alamat', tlpn ='$tlpn' where id = '$id'");
		if($exec){
			$result = 'sukses';
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function tampil_data_edit($table, $id){
		$exec = mysqli_query($this->koneksi, "select * from $table where id = '$id'");
		while($row = mysqli_fetch_array($exec)){
			$result[] = $row;
		}
		return $result;
	}
	function tampil_data_anggota(){
		$value = 'Tampil Data Anggota';
		$data1 = $this->log_activity($value);
		$exec = mysqli_query($this->koneksi,"select * from tbl_anggota");
		while($row = mysqli_fetch_array($exec)){
			$result[] = $row;
		}
		return $result;
	}
	function tambah_data_anggota($nama, $jns_kelamin, $alamat, $tlpn){
		$result = '';
		$data = mysqli_query($this->koneksi,"insert into tbl_anggota (nama, jns_kelamin, alamat, tlpn)
		        values ('$nama', '$jns_kelamin','$alamat','$tlpn')");
		if($data){
			$result = 'sukses';
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	Function update_data_anggota($nama, $jns_kelamin, $alamat,$tlpn,$id)
	{
		$result = '';
		$data = mysqli_query($this->koneksi, "update tbl_anggota set nama='$nama', jns_kelamin='$jns_kelamin',
		        alamat='$alamat',tlpn='$tlpn' where id= '$id'");
		if($data){
			$result = 'sukses';
		}else{
			$result = '$gagal';
		}
		return $result;
	}
	function login($username, $password)
	{
		$pass = md5($password);
		$result = "";
	   $exec = mysqli_query($this->koneksi, "select * from tbl_petugas where username = '$username'
	   and password = '$pass'");
	   $x = mysqli_fetch_array($exec);
	   $check = mysqli_num_rows($exec);
	   	if($check > 0){
			$result = 'sukses';
			$_SESSION['username'] = $x['username'];
			$_SESSION['nama'] = $x['nama'];
			$_SESSION['status'] = 'sukses';
			$_SESSION['id_user'] = $x['id'];
		}else{
		 	$result = 'gagal';
		}
		return $result;
	   
	}
	function tampil_data_peminjaman()
	{
		$data = mysqli_query($this->koneksi,"select a.id, b.id as id_dtl, c.nama, d.judul_buku, a.tgl_peminjaman, 
											a.tgl_pengembalian, b.jumlah, b.status from tbl_peminjaman a 
											join tbl_dtl_peminjaman b on b.id_peminjaman = a.id 
											join tbl_anggota c on c.id = a.id_anggota
											join master_buku d on d.id = b.id_buku ");
		while($row = mysqli_fetch_array($data)){
			$result[] = $row; 
		}
		return $result;
	}
	function tampil_data_peminjaman_dtl()
	{
		$result = array();
		$data = mysqli_query($this->koneksi,"
			select 
				a.id,
				a.tgl_peminjaman,
				a.tgl_pengembalian,
				b.jumlah,
				b.status,
				c.nama,
				d.judul_buku
			from tbl_peminjaman a 
			join tbl_dtl_peminjaman b on b.id_peminjaman = a.id 
			join tbl_anggota c on c.id = a.id_anggota
			join master_buku d on d.id = b.id_buku 
			WHERE a.id_anggota = '1'
			AND b.status  = '1'"
		);

		foreach ($data as $value) {
			$mapping = array();
			$mapping['id'] = $value['id'];
			$mapping['tgl_peminjaman'] = $value['tgl_peminjaman'];
			$mapping['tgl_pengembalian'] = $value['tgl_pengembalian'];
			$mapping['jumlah'] = $value['jumlah'];
			$mapping['status'] = $value['status'];
			$mapping['nama']   = $value['nama'];
			$mapping['judul_buku'] = $value['judul_buku'];
			array_push($result,$mapping);
		}
		
		echo json_encode($result);
	}
	function tambah_data_peminjaman($id_anggota,$idBuku, $qty, $status)
	{
		$result = "";
		$query1 = "insert into tbl_peminjaman (id_anggota, tgl_peminjaman, tgl_pengembalian)
				values ('$id_anggota',CURDATE(),  CURDATE() + INTERVAL 1 WEEK);";
		$query2 = "set @id_master = last_insert_id();";
		$exec1 = mysqli_query($this->koneksi, $query1);
		$exec2 = mysqli_query($this->koneksi, $query2);
		$bukuArray = $idBuku;
		$qtyArray = $qty;
		$stsArray = $status;
		for($i = 0; $i < count($idBuku); $i++){
			$buku = $this->koneksi->real_escape_string($bukuArray[$i]);
			$jumlah = $this->koneksi->real_escape_string($qtyArray[$i]);
			$sts = $this->koneksi->real_escape_string($stsArray[$i]);
			$query = "insert into tbl_dtl_peminjaman (id_peminjaman, id_buku, jumlah, status)
					values (@id_master,'$buku', '$jumlah', '$sts');";
			$exec3 = mysqli_query($this->koneksi, $query);
		}
		if($exec1 && $exec2 && $exec3){
			$result =  'sukses';
		}else{
			$result = 'gagal';
		}
		return $result;
	}
	function log_activity($value){
		$sql = "insert into log_activity set user_id = '$_SESSION[id_user]', log_user = '$value', log_time = NOW();";
		$result = mysqli_query($this->koneksi, $sql);	
		return $result;
	}
}

?>