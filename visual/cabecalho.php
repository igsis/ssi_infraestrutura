<?php
ini_set('session.gc_maxlifetime', 60*60); // 60 minutos
session_start();

?>

<html>
	<head>
		<title>SSI - Infraestrutura</title>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- css -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="color/default.css" rel="stylesheet" media="screen">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<?php include "../include/script.php"; ?>
    </head>
	<body>
		<div id="bar">
			<p id="p-bar"><img src="images/logo_cultura_h.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSI - Infraestrutura
			</p>
		</div>