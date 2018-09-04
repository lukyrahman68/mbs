<?php
// Panggil koneksi database
require_once "../config/database.php";
if (isset($_POST['simpan'])) {

	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$company=$_POST['company'];
	$jabatan=$_POST['jabatan'];
	$alamat=$_POST['alamat'];
	$tgl=date("Y-m-d");
          		$query = mysqli_query($db, 
				"INSERT INTO pengunjung VALUES(
				'',
				'$nama',
				'$email',
				'$phone',
				'$company',
				'$jabatan',
				'$alamat',
				'$tgl')");
          		if ($query) {
				// jika berhasil tampilkan pesan berhasil insert data
				header('location: ../building.php?status=1');
				} else {
					// jika gagal tampilkan pesan kesalahan
					header('location: ../building.php?status=2');
				}
          }					
?>