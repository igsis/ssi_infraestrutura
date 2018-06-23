<?php
	if(isset($_GET['p']))
	{
		$p = $_GET['p'];
	}
	else
	{
		$p = "index";
	}
	include "administrador/funcoesAdministrador.php";
	include "administrador/".$p.".php";
?>