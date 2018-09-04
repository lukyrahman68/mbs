<?php
session_start();
require_once "../config/database.php";
if (isset($_POST['simpan'])) {

$id_admin=$_SESSION['id'];
$id_kategori=$_POST['kategori'];
$id_sub_kategori=$_POST['sub_kategori'];
$id_sub_sub_kategori=$_POST['sub_sub_kategori'];
$nama=$_POST['judul'];
$ket=$_POST['ket'];

$query1 = mysqli_query($db, 
"INSERT INTO barang VALUES(
'',
'$id_admin',
'$id_kategori',
'$id_sub_kategori',
'$id_sub_sub_kategori',
'$nama',
'$ket')");
$id_barang = $db->insert_id;	

$target_dir_user="../uploads/produk/";
if (!file_exists('$target_dir_user')) {
    mkdir($target_dir_user, 0777, true);
}
// mulai
$j = 0; //Variable for indexing uploaded image 

    $target_path_image = "../uploads/produk/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        $image=md5(uniqid()).".".$ext[count($ext) - 1];
        $target_path = $target_path_image.$image;
        ".".$ext[count($ext) - 1]; //set the target path with a new name of image
        $j = $j + 1; //increment the number of uploaded images according to the files in array       

        if (($_FILES["file"]["size"][$i] < 100000) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { //if file moved to uploads folder
                
                // upload berhasil
                $query = mysqli_query($db, 
                "INSERT INTO media VALUES(
                '',
                '$image')");
                $id_media = $db->insert_id;
                
                $insBrng = mysqli_query($db, 
                "INSERT INTO barang_media VALUES(
                '',
                '$id_barang',
                '$id_media')");
                
            } else { //if file was not moved.
                echo $j.
                ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j.
            ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
        $image="";
        $target_path="";
    }


	if ($query1) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: data_produk.php?status=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: data_produk.php?status=1');
	}	

}elseif(isset($_POST['update'])){
    $id_produk=$_POST['update'];
    $id_admin=$_SESSION['id'];
    // $id_kategori=$_POST['kategori'];
    $id_sub_kategori=$_POST['sub_kategori'];
    $nama=$_POST['judul'];
    $ket=$_POST['ket'];
    $image=$_FILES["gambar"]["name"];
    echo $id_kategori;
    $target_dir_user="../uploads/produk/";
    if($image!=""){
        // hapus gambar sebelumnya
        $query1 = mysqli_query($db,"select m.gambar,m.id from media m, barang b where b.id_media=m.id and b.id='$id_produk'");
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
                "UPDATE barang SET 
                id_admin='$id_admin',id_media='$id_media',id_sub='$id_sub_kategori',nama='$nama',ket='$ket'
                WHERE id = '$id_produk'");    
                if ($queryUpdt) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data_produk_list.php?status=2');
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data_produk_list.php?status=1');
                }
    }else{
            
        $queryUpdt1 = mysqli_query($db, 
        "UPDATE barang SET 
       id_admin='$id_admin',id_sub='$id_sub_kategori',nama='$nama',ket='$ket'
        WHERE id = '$id_produk'"); 
                if ($queryUpdt1) {
                    // jika berhasil tampilkan pesan berhasil insert data
                    header('location: data_produk_list.php?status=2');
                } else {
                    // jika gagal tampilkan pesan kesalahan
                    header('location: data_produk_list.php?status=1');
                }
        }	
}
?>