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

$query = mysqli_query($db,"select * from admin where email='$username' and password='$password'");
$data = mysqli_fetch_array($query);

$_SESSION['username'] = $data['email'];


if(mysqli_num_rows($query)==1){
        header('location:index.php');
    }elseif($asal!=""){
        header('location:'.$asal);
   	}else {
	header('location:../admin.php?status=0');
	
}
?>