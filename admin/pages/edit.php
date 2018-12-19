<?php 
	require_once("../../../mData.php");

	$model = new mData;

	$id = $_GET['id'];
	$judul_event = $_POST['judul_event'];
	$foto = $_POST['foto'];
	$deskripsi = $_POST['deskripsi'];
	$kategori = $_POST['kategori'];

	$array = [
		'judul_event' => $judul_event,
		'foto' => $foto,
		'deskripsi' => $deskripsi,
		'kategori' => $kategori,
	];

	$model->edit($array);

	header("location:../../?hal=event");
?>