<?php
// Panggil koneksi database
require_once "../config/database.php";



if (isset($_POST['simpan'])) {

	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$tlpn=$_POST['tlpn'];
	$email=$_POST['email'];
	$pswd=$_POST['pswd'];
	$company=$_POST['company'];
	$jabatan=$_POST['jabatan'];
	$alamatC=$_POST['alamatC'];
	$tgl=date("Y-m-d");
	$un=0;
	

	// cek username apakah ada yang sama
	$select_username = mysqli_query($db,"select username from user");
  	while($row = mysqli_fetch_array($select_username))
          {
            if($username==$row[0])
            {	
            	$un=1;	
            } 
          }

	// perintah query untuk menyimpan data ke tabel is_siswa
          if($un=="1")
          {
          	header('location: ../daftar.php?status=0');
          }else{
          		$query = mysqli_query($db, 
				"INSERT INTO user VALUES(
				'',
				'$nama',
				'$jk',
				'$alamat',
				'$email',
				'$pswd',
				'$tlpn',
				'$company',
				'$jabatan',
				'$alamatC',
				'$tgl',
				'Pelanggan')");
          		if ($query) {
				// jika berhasil tampilkan pesan berhasil insert data
				header('location: ../daftar.php?status=1');
				} else {
					// jika gagal tampilkan pesan kesalahan
					header('location: ../daftar.php?status=2');
				}
          }
	

	
}					
?>