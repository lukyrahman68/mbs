<?php
session_start();
require "../config/database.php";
$site=$_GET['kat'];
$aksi = $_GET['aksi'];
if(isset($_POST['simpan'])){
    $id_admin=$_SESSION['id'];
    $judul=$_POST['judul'];
    $status=$_POST['status'];
    $idsite=$site;
    $idpostkat=$_POST['postkat'];
    $isi=$_POST['ket'];
    $tgl=date("Y-m-d");

    $image=$_FILES["gambar"]["name"];
    if($image==""){
            $id_media=NULL;
    }
    elseif($image!=""){
        $target_dir_user="../uploads/data/";
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
    
    $query1 = mysqli_query($db, 
        "INSERT INTO post VALUES(
        '',
        '$idsite',
        '$idpostkat',
        '$id_media',
        '$judul',
        '$isi',
        '$id_admin',
        '$tgl',
        '$status')");

	if ($query1) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data.php?id='.$idsite.'&&status=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data.php?id='.$idsite.'&&status=2');
	}	
}elseif(isset($_POST['Ubah'])){
    $id_admin=$_SESSION['id'];
    $id=$_GET['id'];
    $judul=$_POST['judul'];
    $status=$_POST['status'];
    $isi=$_POST['ket'];
    $idsite=$site;
    $idpostkat=$_POST['postkat'];
    $tgl=date("Y-m-d");

    $image=$_FILES["gambar"]["name"];
    echo $image;
    
    if($image==""){
            $id_media=NULL;
    }
    if($image!=""){
    $target_dir_user="../uploads/data/";
    if($image!=""){
        // hapus gambar sebelumnya
        
        $query1 = mysqli_query($db,"select m.gambar,m.id from media m, post p where p.id_media=m.id and p.idpost='$id'");
        $data1 = mysqli_fetch_array($query1);
        $id_media=$data1[1];

        if(!empty($_FILES["gambar"]["tmp_name"])){
            if($data1[0]!=""){
                unlink(dirname(__FILE__) ."/".$target_dir_user . $data1[0]);
            }
        }
        

        if (!file_exists('$target_dir_user')) {
            mkdir($target_dir_user, 0777, true);
        }
        $target_file = $target_dir_user . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                header('location: data.php?status=5&&msg=Sorry, your file is too large.&&id='.$idsite);
                return;
                $uploadOk = 0;
            }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            header('location: data.php?status=5&&msg=Sorry, file already exists.&&id='.$idsite);
            return;
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            header('location: data.php?status=5&&msg=Sorry, your file is too large.&&id='.$idsite);
            return;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header('location: data.php?status=5&&msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed.&&id='.$idsite);
            return;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $queryGambar = mysqli_query($db, 
                "UPDATE media SET 
                gambar='$image'
                WHERE id = '$id_media'");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
        $queryUpdt = mysqli_query($db, 
                "UPDATE post SET 
                judul='$judul',id_postkat='$idpostkat',isi='$isi',status='$status',createby='$id_admin',datecreate='$tgl',id_media='$id_media'
                WHERE idpost = '$id'");    
                if ($queryUpdt) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data.php?status=2&&id='.$idsite);
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data.php?status=1&&id='.$idsite);
                }
    }else{
        echo "sini";
            
        $queryUpdt1 = mysqli_query($db, 
                "UPDATE post SET 
                judul='$judul',id_postkat='$idpostkat',isi='$isi',status='$status',createby='$id_admin',datecreate='$tgl'
                WHERE idpost = '$id'"); 
    
                if ($queryUpdt1) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data.php?status=2&&id='.$idsite);
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data.php?status=1&&id='.$idsite);
                }	
            
    }
}elseif(isset($_POST['hapus'])){
    $id=$_POST['id'];
    $idsite=$_POST['site'];

    $target_dir_user="../uploads/data/";

    $query1 = mysqli_query($db,"select m.gambar,m.id from media m, post p where p.id_media=m.id and p.idpost='$id'");
    $data1 = mysqli_fetch_array($query1);
    $id_media=$data1[1];
    unlink(dirname(__FILE__) ."/".$target_dir_user . $data1[0]);

    $delMedia = mysqli_query($db,"DELETE FROM media where id='$id_media'");

    $query = mysqli_query($db,"DELETE FROM post where idpost='$id'");
	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data.php?status=3&&id='.$idsite);
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data.php?status=4&&id='.$idsite);
	}	
}

?>








