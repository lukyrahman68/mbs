<?php
require "../config/database.php";
if (isset($_POST['simpan'])) {

    $site=$_POST['site'];

    $query1 = mysqli_query($db, 
    "INSERT INTO site VALUES(
    '',
    '$site')");
    if ($query1) {
    // jika berhasil tampilkan pesan berhasil insert data
    header('location: data_site.php?status=2');
    } else {
    // jika gagal tampilkan pesan kesalahan
    header('location: data_site.php?status=1');
    }
}elseif(isset($_POST['edit'])) {
    $id=$_POST['id'];
    $site=$_POST['site'];

    $query = mysqli_query($db, 
            "UPDATE site SET 
            site='$site' where id='$id'");    

        if ($query) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: data_site.php?status=2');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: data_site.php?status=1');
        }
}
?>