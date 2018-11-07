<?php 

	$hlm='';
	if (isset($_GET['hal'])) {
		$hlm=$_GET['hal'];
	}

	$current_page=$hlm;

	switch ($hlm) {
		case 'dashboard':
			$hlm="include 'pages/dashboard.php';";
			break;

		case 'form':
			$hlm="include 'pages/form.php';";
			break;

		case 'nilai':
			$hlm="include 'pages/nilai/nilai.php';";
			break;
	}

	$content=$hlm;

 ?>