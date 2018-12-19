<?php 
	require_once("../../../mData.php");

	$model = new mData();
	$id = $_GET['id'];
	$array = [
		'id' => $id
	];

	$model->delete($array);

	header("location:../../?hal=event");   
?>