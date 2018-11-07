<?php
include "../config.php";

$hlm=$_GET['hal'];
$aksi=$_GET['aksi'];
// HAPUS
if($hlm=='form' AND $aksi=='hapus' ){
$mySql = "DELETE FROM table_event WHERE id='".$_GET['id']."'";
$myQry = mysqli_query($conn, $mySql);
header('location:../?hal='.$hlm);
}

// EDIT
else if($hlm=='form' AND $aksi=='edit' ){
	$id = $_POST['id'];
	$judul_event = $_POST['judul_event'];
	$foto = $_POST['foto'];
	$deskripsi = $_POST['deskripsi'];
	$kategori = $_POST['kategori'];
	$query = mysqli_query($conn, "UPDATE table_event SET
				  judul_event = '$judul_event', foto = '$foto', deskripsi = '$deskripsi', kategori='$kategori', tgl_update=NOW()
				  WHERE id = '$id'");
	header('location:../?hal='.$hlm);
}
?>
