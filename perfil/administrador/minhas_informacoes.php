<?php
$con = bancoMysqli();
$idAdm = $_SESSION['idAdm'];


if(isset($_POST['senha01']))
{
	//verifica se há um post
	if(($_POST['senha01'] != "") AND (strlen($_POST['senha01']) >= 5))
	{
		if($_POST['senha01'] == $_POST['senha02'])
		{
			// verifica se a nova senha foi digitada corretamente duas vezes
			$senha = recuperaDados("administrators","login",$_SESSION['login']);
			if(md5($_POST['senha03']) == $senha['password'])
			{
				$idAdm = $_SESSION['idAdm'];
				$senha01 = md5($_POST['senha01']);
				$sql_senha = "UPDATE `administrators` SET `password` = '$senha01' WHERE `id` = '$idAdm';";
				$con = bancoMysqli();
				$query_senha = mysqli_query($con,$sql_senha);
				if($query_senha)
				{
					$mensagem = "<font color='#01DF3A'><strong>Senha alterada com sucesso!</strong></font>";
				}
				else
				{
					$mensagem = "<font color='#FF0000'><strong>Não foi possível mudar a senha! Tente novamente.</strong></font>";

				}
			}
			else
			{
				$mensagem = "<font color='#FF0000'><strong>Senha atual incorreta!</strong></font>";
			}
		}
		else
		{
			// caso não tenha digitado 2 vezes
			$mensagem = "<font color='#FF0000'><strong>As senhas não conferem! Tente novamente.</strong></font>";
		}
	}
	else
	{
			$mensagem = "<font color='#FF0000'><strong>A senha não pode estar vazia e deve conter mais de 5 caracteres.</strong></font>";
	}
}

if(isset($_POST['gravar']))
{
	$idAdm = $_SESSION['idAdm'];
	$local = $_POST['local'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$sql = "UPDATE `administrators` SET
		`local`='$local',
		`phone`='$phone',
		`email`='$email'
		WHERE id = '$idAdm'";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Atualizado com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao atualizar! Tente novamente.</strong></font>".$sql;
	}
}


$adm = recuperaInfoAdministrador($_SESSION['idAdm']);
$idAdm = $adm['idAdm'];
$login = $adm['login'];
$local = $adm['local'];
$phone = $adm['phone'];
$email = $adm['email'];
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Minhas Informações</h3>
			<br/>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="?perfil=administrador&p=minhas_informacoes" method="post">

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Local:</strong><br/>
							<input type="text" class="form-control" name="local" maxlength="100" value="<?php echo $local ?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" value="<?php echo $phone ?>">
						</div>
						<div class="col-md-5"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $email ?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="gravar" value="GRAVAR" class="btn btn-theme btn-md btn-block">
						</div>
					</div>
				</form>

				<div class="form-group">
					<br/><hr/><br/>
				</div>

				<div class="form-group">
					<h3>Trocar Senha</h3>
				</div>

				<form method="POST" action="?perfil=administrador&p=minhas_informacoes"class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-4"><label>Insira sua senha antiga</label>
							<input type="password" name="senha03" class="form-control" id="inputName" placeholder="">
						</div>
						<div class="col-md-3"><label>Nova senha</label>
							<input type="password" name="senha01" class="form-control" id="inputName" placeholder="">
						</div>
						<div class=" col-md-3"><label>Redigite a nova senha</label>
							<input type="password" name="senha02" class="form-control" id="inputEmail" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<button type="submit" class="btn btn-theme btn-md btn-block">Mudar a senha</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>