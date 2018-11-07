<?php
include 'config.php';
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($conn, $login);
$cek = mysqli_num_rows($result);

if($cek > 0){
	$c = mysqli_fetch_array($result);
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}
	else{
	header("location:admin/index.php");
}

?>
