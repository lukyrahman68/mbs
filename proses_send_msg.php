<?php
// Panggil koneksi database
require_once "config/database.php";
date_default_timezone_set('Asia/Jakarta');
$today=date("Y-m-d H:i:s");
if (isset($_POST['send'])) {
    $nama=$_POST['nama'];
    $tlpn=$_POST['tlpn'];
    $email=$_POST['email'];
    $sbj=$_POST['sbj'];
    $pesan=$_POST['pesan'];
    
    $simpan = mysqli_query($db,
    "INSERT INTO msg VALUES(
        '',
        '$nama',
        '$tlpn',
        '$email',
        '$sbj',
        '$pesan',
        '$today',
        '0')");

    if ($simpan) {
        // jika berhasil tampilkan pesan berhasil insert data
            header('location: contact.php?status=1');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: contact.php?status=2');
        }
}			
?>