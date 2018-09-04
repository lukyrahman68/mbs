<?php
session_start();
require_once "../config/database.php";
if (isset($_POST['simpan'])) {

// $id_user=$_SESSION['username'];

$image=$_FILES["gambar"]["name"];
$target_dir_user="../uploads/carausel/";
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
        echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

		
		$query1 = mysqli_query($db, 
        "INSERT INTO media VALUES(
        '',
        'carausel',
        '$image')");

	if ($query1) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data_carausel.php?status=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_carausel.php?status=1');
	}	

}
?>