<?php
require_once "config/database.php";
if(isset($_POST['send'])){
    $minat=$_POST['minat'];
    $namaP = $_POST['nmp'];
    $alamatP = $_POST['almt'];
    $tlpP = $_POST['tlp'];
    $emailP = $_POST['email'];
    $refP = $_POST['refP'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $mail = $_POST['mail'];
    $vendor = $_POST['vendor'];
    $produk = $_POST['produk'];
    $merk = $_POST['merk'];
    foreach ($minat as $item) {
        @$itemP .=$item.",";
    }
    $a=strlen($itemP);
    $itemP= substr($itemP, 0,$a-1);
    
    $ins = mysqli_query($db, "INSERT into dealer VALUES(
        '',
        '$namaP',
        '$alamatP',
        '$tlpP',
        '$emailP',
        '$refP',
        '$itemP',
        '$nama',
        '$hp',
        '$mail',
        '$vendor',
        '$produk',
        '$merk'
    )");
    if ($ins) {
        // jika berhasil tampilkan pesan berhasil insert data
            header('location: dealer_scheme.php?status=1');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: dealer_scheme.php?status=2');
        }
}   
?>