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
	$login = $_POST['login_adm'];
	$senha = $_POST['senha'];
	autenticaloginadministrador($login,$senha);
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SSI - Infraestrutura</title>
		<link href="visual/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="visual/css/style.css" rel="stylesheet" media="screen">
		<link href="visual/color/default.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="visual/css/font-awesome.min.css">
		<link rel="icon" type="image/png" sizes="16x16" href="visual/images/favicon.png">
		<script src="visual/js/modernizr.custom.js"></script>
		<script src="visual/js/jquery-1.9.1.js"></script>
		<script src="visual/js/jquery-ui.js"></script>
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

						<h5><?php if(isset($_POST['login_user'])){ echo autenticaloginusuario($login, $senha); } ?></h5>
						<h5><?php if(isset($_POST['login_adm'])){ echo autenticaloginadministrador($login, $senha); } ?></h5>

						<form method="POST" action="index.php" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-md-offset-4 col-md-4">
									<label>Login</label>
									<input type="text" name="login_user" class="form-control" maxlength="120">
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

						<div class="form-group">
							<hr/>
						</div>

						<div class="form-group">
							<div class="col-md-offset-0 col-md-4">
								<p>Não possui cadastro? <br/><a href="verifica.php">Clique aqui.</a></p>
								<br />
							</div>
							<div class="col-md-4">
								<button class='btn btn-default' type='button' data-toggle='modal' data-target='#acessoAdm' style="border-radius: 30px;">Acesso Administrativo</button>
								<br />
							</div>
							<div class="col-md-4">
								<p>Esqueceu a senha? <br/><a href="recuperar_senha.php">Clique aqui.</a></p>
								<br />
							</div>
						</div>
					</div>
				</div>
				<!-- Início Acesso Adm -->
				<div class="modal fade" id="acessoAdm" role="dialog" aria-labelledby="acessoAdmLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Acesso Administrativo</h4>
							</div>
							<form class="form-horizontal" role="form" action="index.php" method="post">
								<div class="modal-body">
									<label>Login</label>
									<input type="text" name="login_adm" class="form-control" maxlength="20">
									<label>Senha</label>
									<input type="password" name="senha" class="form-control" placeholder="Senha" maxlength="60">
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-success btn-block" style="border-radius: 30px; id="confirm">Entrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Fim Acesso Adm -->
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
			<script src="visual/js/bootstrap.min.js"></script>
			<div class="container">
				<div class="col-md-12">
				<?php
					echo "<strong>SESSION</strong><pre>", var_dump($_SESSION), "</pre>";
					echo "<strong>POST</strong><pre>", var_dump($_POST), "</pre>";
					echo "<strong>GET</strong><pre>", var_dump($_GET), "</pre>";
					echo "<strong>FILES</strong><pre>", var_dump($_FILES), "</pre>";
					echo ini_get('session.gc_maxlifetime')/60; // em minutos
				?>
				</div>
			</div>
			</footer>
		</section>
	</body>
</html>