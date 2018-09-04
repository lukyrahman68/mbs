<?php
require "../config/database.php";
if(isset($_POST['simpan'])){
    $id=$_POST['id'];
    $kategori=$_POST['kategori'];

    $query = mysqli_query($db, 
            "UPDATE kategori SET 
            nama='$kategori' where id='$id'");    

        if ($query) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: data_kategori.php?status=2');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: data_kategori.php?status=1');
        }	
}elseif(isset($_POST['btnSimpanSub'])){
    $idkat=$_POST['kategori'];
    $id=$_POST['id'];
    $kategori=$_POST['sub_kategori'];

    $query = mysqli_query($db, 
            "UPDATE sub_kategori SET 
            nama='$kategori', idkat='$idkat' where id='$id'");    

        if ($query) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: data_kategori.php?sub_status=2');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: data_kategori.php?sub_status=1');
        }	
}
?>