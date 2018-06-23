<?php
	if(isset($_GET['p']))
	{
		$p = $_GET['p'];
	}
	else
	{
		$p = "index";
	}
	include "../funcoes/funcoesAdministrador.php";
	include "administrador/".$p.".php";
?>