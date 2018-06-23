<?php

include "funcoes/funcoesGerais.php";
require "funcoes/funcoesConecta.php";

if(isset($_POST['login_user']))
{
	$login = $_POST['login_user'];
	$senha = $_POST['senha'];
	autenticaloginusuario($login,$senha);
}

if(isset($_POST['login_adm']))
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	autenticaloginusuario($login,$senha);
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SSI - Infraestrutura</title>
		<link href="visual/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="visual/css/style.css" rel="stylesheet" media="screen">
		<link href="visual/color/default.css" rel="stylesheet" media="screen">
		<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
		<script src="visual/js/modernizr.custom.js"></script>
	</head>
	<body>
		<div id="bar">
			<p id="p-bar"><img src="visual/images/logo_cultura_h.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSI - Infraestrutura<!--<img src="images/logo_pequeno.png" />-->
			</p>
		</div>
		<p>&nbsp;</p>

		<section id="contact" class="home-section bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<h3>SSI - Sistema de Suporte Integrado</h3>
						<h4>Módulo Infraestrutura</h4>

						<hr/>

						<h5><?php if(isset($_POST['login'])){ echo autenticaloginusuario($login, $senha); } ?></h5>

						<form method="POST" action="index.php" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-md-offset-4 col-md-4">
									<label>Login</label>
									<input type="text" name="login_user" class="form-control" placeholder="E-mail" maxlength="120">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-4 col-md-4">
									<label>Senha</label>
									<input type="password" name="senha" class="form-control" placeholder="Senha" maxlength="60">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-4 col-md-4">
									<button class='btn btn-theme btn-md btn-block' type='submit' style="border-radius: 30px;">Entrar</button>
								</div>
							</div>
						</form>
						<br />

						<div class="form-group">
							<div class="col-md-offset-0 col-md-4">
								<p>Não possui cadastro? <br/><a href="verifica.php">Clique aqui.</a></p>
								<br />
							</div>
							<div class="col-md-4">
								<p><a href="recuperar_senha.php">Acesso Administrativo</a></p>
								<br />
							</div>
							<div class="col-md-4">
								<p>Esqueceu a senha? <br/><a href="recuperar_senha.php">Clique aqui.</a></p>
								<br />
							</div>
						</div>
					</div>
				</div>
			</div>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<footer>
				<div class="container">
					<table width="100%">
						<tr>
							<td align="center"><font color="#ccc">2018 @ Desenvolvido por STI - Desenvolvimento e Programação</font></td>
						</tr>
					</table>
				</div>
			</footer>
		</section>
    </body>
</html>