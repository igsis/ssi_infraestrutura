<?php
$con = bancoMysqli();

$user = recuperaInfoUsuario($_SESSION['idUser']);
$idUser = $user['idUser'];
$login = $user['login'];
$local = $user['local'];
$userPhone = $user['phone'];
$userEmail = $user['email'];
$userContact = $user['contact'];
$idAdminUser = $user['idAdminUser'];

if(isset($_POST['cadastra']))
{
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$categories_id = $_POST['categories_id'];
	$description = $_POST['description'];
	$startDate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `problems`(`users_id`, `local`, `phone`, `email`, `contact`, `priorities_id`, `categories_id`, `description`, `startDate`, `problem_status_id`, `administrators_id`) VALUES ('$idUser','$local','$phone','$email','$contact','1','$categories_id','$description','$startDate','1','$idAdminUser')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Atualizado com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao atualizar! Tente novamente.</strong></font>";
	}
}
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Cadastro de Chamados</h3>
			<p><b>Código de cadastro:</b> <?php echo $idUser; ?> | <b>Nome:</b> <?php echo $login; ?> | <?php echo $local ?></p>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="?perfil=usuario&p=cadastra_chamado" method="post">

					<div class="form-group">
						<div class="col-md-offset-1 col-md-3"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" maxlength="15" value="<?php echo $userPhone ?>">
						</div>
						<div class="col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $userEmail ?>">
						</div>
						<div class="col-md-3"><strong>Contato:</strong><br/>
							<input type="text" class="form-control" name="contact" maxlength="20" value="<?php echo $userContact ?>">
						</div>
					</div>

					<div class="form-group">
						<hr/>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Categoria:</strong><br/>
							<select class="form-control" name="categories_id">
							<option>Selecione...</option>
								<?php geraOpcao("categories","");	?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Descrição</strong><br/>
							<textarea name="description" class='form-control' cols="40" rows="6"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="cadastra" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>