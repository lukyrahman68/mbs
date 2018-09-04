<?php
// Panggil koneksi database
require_once "../config/database.php";
$id=$_GET['id'];
$id_media=$_GET['id_media'];
$gambar=$_GET['gambar'];
$target_dir_user="../uploads/produk/";
	$query = mysqli_query($db,"DELETE FROM barang where id='$id'");
	$queryMedia = mysqli_query($db,"DELETE FROM media where id='$id_media'");
	// cek hasil query
	if ($query) {
        // jika berhasil tampilkan pesan berhasil insert data
        unlink(dirname(__FILE__) ."/".$target_dir_user . $gambar);
		header('location: data_produk_list.php?status=3');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_produk_list.php?status=4');
	}
					
?>