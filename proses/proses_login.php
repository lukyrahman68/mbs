<?php
session_start();
require_once "../config/database.php";
// terima data dari form login
$username = $_POST['username'];
$password = $_POST['pswd'];

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = $db->real_escape_string($username);
$password = $db->real_escape_string($password);
$asal=@$_GET['dari'];

$query = mysqli_query($db,"select * from user where email='$username' and pswd='$password'");
$data = mysqli_fetch_array($query);

$_SESSION['username'] = $data['email'];
$_SESSION['id'] = $data['id'];
$_SESSION['role'] = $data['role'];


if(mysqli_num_rows($query)==1){
    if($data['role']=="Administrator"){
        header('location:../AdminLTE/index.php');
    }elseif($asal!=""){
        header('location:'.$asal);
    }else{
        header('location:../index.php');
    }
}else {
	header('location:../login.php?status=0');
	
}
?>