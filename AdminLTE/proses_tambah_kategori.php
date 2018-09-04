<?php
require "../config/database.php";
if (isset($_POST['simpan'])) {

    $kategori=$_POST['kategori'];

    $query1 = mysqli_query($db, 
    "INSERT INTO kategori VALUES(
    '',
    '$kategori')");

    if ($query1) {
    // jika berhasil tampilkan pesan berhasil insert data
    header('location: kategori_produk.php?status=2');
    } else {
    // jika gagal tampilkan pesan kesalahan
    header('location: kategori_produk.php?status=1');
    }
}elseif(isset($_POST['btn_sub_kat'])){
    // $idsite=$_GET['id'];
    $idkat=$_POST['idkat'];
    $sub_kategori=$_POST['sub_kategori'];
    $query1 = mysqli_query($db,"INSERT INTO sub_kategori VALUES(
    '',
    '$idkat',
    '$sub_kategori')");

    if ($query1) {
    // jika berhasil tampilkan pesan berhasil insert data
    header('location: sub_kategori_produk.php?sub_status=2&&id='.$idkat);
    } else {
        
    // jika gagal tampilkan pesan kesalahan
    header('location: sub_kategori_produk.php?sub_status=1&&id='.$idkat);
    }
}elseif(isset($_POST['sub_sub_kat'])){
    $idsubkat=$_POST['idsubkat'];
    $sub_sub=$_POST['sub_sub'];
    $query2 = mysqli_query($db,"INSERT INTO sub_sub_kategori VALUES(
    '',
    '$idsubkat',
    '$sub_sub')");

    if ($query2) {
    // jika berhasil tampilkan pesan berhasil insert data
    header('location: sub_sub_kategori_produk.php?sub_sub_status=2&&id='.$idsubkat);
    } else {
    // jika gagal tampilkan pesan kesalahan
    header('location: sub_sub_kategori_produk.php?sub_sub_status=1&&id='.$idsubkat);
    }
}
?>