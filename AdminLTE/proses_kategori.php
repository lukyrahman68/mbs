<?php
require "../config/database.php";
if (isset($_POST['ubah_kategori'])){
    $id=$_POST['id'];
    $kategori=$_POST['kategori'];

    $query = mysqli_query($db, 
            "UPDATE kategori SET 
            nama='$kategori' where id='$id'");    

        if ($query) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: kategori_produk.php?status=2');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: kategori_produk.php?status=1');
        }
}elseif(isset($_POST['hapus_kategori'])){
    $id=$_POST['id'];

    $query = mysqli_query($db,"DELETE FROM kategori where id='$id'");
    $getData = mysqli_query($db,"select * from sub_kategori where idkat='$id'");
    while ($dataHapus=mysqli_fetch_array($getData)) {
        $hapusSubSub = mysqli_query($db,"DELETE FROM sub_sub_kategori where idsubkat='$dataHapus[0]'");
    }
    $query1 = mysqli_query($db,"DELETE FROM sub_kategori where idkat='$id'");
    

        if ($query1) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: kategori_produk.php?status=3');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: kategori_produk.php?status=4');
        }
}elseif(isset($_POST['ubah_sub_kategori'])){
    $id=$_POST['id'];
    $idkat=$_POST['idkat'];
    $sub_kategori=$_POST['sub_kategori'];

    $query = mysqli_query($db, 
    "UPDATE sub_kategori SET 
    nama='$sub_kategori' where id='$id'");    

    if ($query) {
        // jika berhasil tampilkan pesan berhasil insert data
        header('location: sub_kategori_produk.php?status=2&&id='.$idkat);
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: sub_kategori_produk.php?status=1&&id='.$idkat);
    }
}elseif(isset($_POST['hapus_sub_kategori'])){
    $id=$_POST['id'];
    $idkat=$_POST['idkat'];

    $query1 = mysqli_query($db,"DELETE FROM sub_kategori where id='$id'");
    $hapusSubSub = mysqli_query($db,"DELETE FROM sub_sub_kategori where idsubkat='$id'");
    
    

        if ($hapusSubSub) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: sub_kategori_produk.php?status=3&&id='.$idkat);
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: sub_kategori_produk.php?status=4&&id='.$idkat);
        }
}elseif(isset($_POST['ubah_sub_sub_kategori'])){
    $id=$_POST['id'];
    $idkat=$_POST['idkat'];
    $sub_sub_kategori=$_POST['sub_sub_kategori'];

    $query = mysqli_query($db, 
    "UPDATE sub_sub_kategori SET 
    sub_sub_kategori='$sub_sub_kategori' where id='$id'");    

    if ($query) {
        // jika berhasil tampilkan pesan berhasil insert data
        header('location: sub_sub_kategori_produk.php?status=2&&id='.$idkat);
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: sub_sub_kategori_produk.php?status=1&&id='.$idkat);
    }
}elseif(isset($_POST['hapus_sub_sub_kategori'])){
    $id=$_POST['id'];
    $idkat=$_POST['idkat'];


    $hapusSubSub = mysqli_query($db,"DELETE FROM sub_sub_kategori where id='$id'");
    
    

        if ($hapusSubSub) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: sub_sub_kategori_produk.php?status=3&&id='.$idkat);
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: sub_sub_kategori_produk.php?status=4&&id='.$idkat);
        }
}
?>