<?php
require "../config/database.php";
if(isset($_POST['simpan'])){
    $nama_p=$_POST['nama_p'];
    $des=$_POST['des'];
    $alamat=$_POST['alamat'];
    $tlpn=$_POST['tlpn'];
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $motto=$_POST['motto'];

    $image=$_FILES["gambar"]["name"];
    $target_dir_user="../uploads/profile_perusahaan/";
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

    $query1 = mysqli_query($db, 
        "INSERT INTO profile VALUES(
        'profile',
        '$id_media',
        '$nama_p',
        '$des',
        '$alamat',
        '$tlpn',
        '$email',
        '$nama',
        '$motto')");

	if ($query1) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data_profil.php?status=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_profil.php?status=1');
	}	
}elseif(isset($_POST['update'])){
    $nama_p=$_POST['nama_p'];
    $des=$_POST['des'];
    $alamat=$_POST['alamat'];
    $tlpn=$_POST['tlpn'];
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $motto=$_POST['motto'];
    $id=$_GET['id'];
    $image=$_FILES["gambar"]["name"];
    $target_dir_user="../uploads/profile_perusahaan/";
    if($image!=""){
        // hapus gambar sebelumnya
        $query1 = mysqli_query($db,"select m.gambar,m.id from media m, profile p where p.id_media=m.id and p.id='profile'");
        $data1 = mysqli_fetch_array($query1);
        $id_media=$data1[1];
        if($data1[0]!=""){
        unlink(dirname(__FILE__) ."/".$target_dir_user . $data1[0]);
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
                $uploadOk = 0;
            }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
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
                $queryGambar = mysqli_query($db, 
                "UPDATE media SET 
                gambar='$image'
                WHERE id = '$id_media'");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $queryUpdt = mysqli_query($db, 
                "UPDATE profile SET 
                nama_perusahaan='$nama_p',deskripsii='$des',alamat='$alamat',tlpn='$tlpn',email='$email',nama_pemilik='$nama',motto='$motto'
                WHERE id = '$id'");    
                if ($queryUpdt) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data_profil.php?status=2');
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data_profil.php?status=1');
                }
    }else{
            
        $queryUpdt1 = mysqli_query($db, 
                "UPDATE profile SET 
                nama_perusahaan='$nama_p',deskripsii='$des',alamat='$alamat',tlpn='$tlpn',email='$email',nama_pemilik='$nama',motto='$motto'
                WHERE id = '$id'"); 
    
                if ($queryUpdt1) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data_profil.php?status=2');
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data_profil.php?status=1');
                }	
    }
}

?>