<?php
session_start();
require "../config/database.php";
// $site=$_GET['kat'];
if(isset($_POST['simpan'])){
    $id_admin=$_SESSION['id'];
    $nama=$_POST['nama'];
    $mail=$_POST['mail'];
    $pswd=$_POST['pswd'];
    $alamat=$_POST['alamat'];
    $phone=$_POST['phone'];
    $tgl=date("Y-m-d");

    $image=$_FILES["gambar"]["name"];
    if($image==""){
            $id_media=NULL;
    }
    elseif($image!=""){
        $target_dir_user="../uploads/user/";
    $image=$_FILES["gambar"]["name"];
    if (!file_exists('$target_dir_user')) {
        mkdir($target_dir_user, 0777, true);
    }
    $target_file = $target_dir_user . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $query = mysqli_query($db, 
            "INSERT INTO media VALUES(
            '',
            '$image')");
            $id_media = $db->insert_id;
            // echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    }

    $select_username = mysqli_query($db,"select email from admin");
    while($row = mysqli_fetch_array($select_username))
          {
            if($username==$row[0])
            {   
                $un=1;
            } 
          }
    if($un=="1"){
        header('location: datauser.php?status=4');
    }
    else{
         $query1 = mysqli_query($db, 
        "INSERT INTO admin VALUES(
        '$mail',
        '$pswd',
        '$id_media',
        '$nama',
        '$alamat',
        '$phone',
        '$id_admin',
        '$tgl')");

    if ($query1) {
        // jika berhasil tampilkan pesan berhasil insert data
        header('location: datauser.php?status=2');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: datauser.php?status=1');
    }

  }
  }  	
?>