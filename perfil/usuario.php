<?php
	if(isset($_GET['p']))
	{
		$p = $_GET['p'];
	}
	else
	{
		$p = "index";
	}
	include "usuario/includes/funcoesUsuario.php";
	include "usuario/".$p.".php";
?>