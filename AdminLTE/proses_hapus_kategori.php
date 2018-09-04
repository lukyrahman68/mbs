<?php
// Panggil koneksi database
require_once "../config/database.php";
$tabel=$_GET['tabel'];
if($tabel=="kategori"){
$id=$_GET['id'];
	$query = mysqli_query($db,"DELETE FROM kategori where id='$id'");
	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data_kategori.php?status=3');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_kategori.php?status=4');
	}	
}elseif($tabel=="sub_kategori"){
    $id=$_GET['id'];
	$query = mysqli_query($db,"DELETE FROM sub_kategori where id='$id'");
	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data_kategori.php?sub_status=3');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_kategori.php?sub_status=4');
	}
}					
?>