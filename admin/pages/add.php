<?php
	require_once ("../../../mData.php");

	$model = new mData();
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

	$model->add($array);
	header("location:../../?hal=event");
?>