<?php

include "funcoes/funcoesGerais.php";
require "funcoes/funcoesConecta.php";

//autentica login e cria inicia uma session
if(isset($_POST['login']))
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$sql = "SELECT * FROM usuario AS usr
	WHERE usr.email = '$login' LIMIT 0,1";
	$con = bancoMysqli();
	$query = mysqli_query($con,$sql);
	//query que seleciona os campos que voltarão para na matriz
	if($query)
	{
		//verifica erro no banco de dados
		if(mysqli_num_rows($query) > 0)
		{
			// verifica se retorna usuário válido
			$user = mysqli_fetch_array($query);
			if($user['senha'] == md5($_POST['senha']))
			{
				// compara as senhas
				session_start();
				$_SESSION['login'] = $user['email'];
				$_SESSION['nome'] = $user['nome'];
				$_SESSION['idUser'] = $user['id'];
				$log = "Fez login.";
				//gravarLog($log);
				header("Location: visual/index.php");
				gravarLog($sql);
			}
			else
			{
			$mensagem = "<font color='#FF0000'><strong>A senha está incorreta!</strong></font>";

			}
		}
		else
		{
			$mensagem = "<font color='#FF0000'><strong>O usuário não existe.</strong></font>";
		}
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro no banco de dados!</strong></font>";
	}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cadastro de Artistas e Profissionais de Arte e Cultura</title>
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

						<h5><?php if(isset($mensagem)){ echo $mensagem; } ?></h5>

						<form method="POST" action="index.php" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-md-offset-4 col-md-4">
									<label>Login</label>
									<input type="text" name="login" class="form-control" placeholder="E-mail" maxlength="120">
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