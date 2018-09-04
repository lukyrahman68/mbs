<?php
require "../config/database.php";
if (isset($_POST['simpan'])) {

    $kat=$_POST['kat'];
    $id=$_GET['id'];

    $query1 = mysqli_query($db, 
    "INSERT INTO post_kategori VALUES(
    '',
    '$id',
    '$kat')");
    if ($query1) {
    // jika berhasil tampilkan pesan berhasil insert data
    header('location: post_kategori.php?id='.$id.'&&status=2');
    } else {
    // jika gagal tampilkan pesan kesalahan
    header('location: post_kategori.php?id='.$id.'&&status=1');
    }
}elseif(isset($_POST['edit'])) {
    $id=$_POST['id'];
    $site=$_POST['site'];
    $id_site=$_POST['id_site'];

    $query = mysqli_query($db, 
            "UPDATE post_kategori SET 
            kategori='$site' where id='$id'");    

        if ($query) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: post_kategori.php?status=2&&id='.$id_site);
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: post_kategori.php?status=1&&id='.$id_site);
        }
}
?>