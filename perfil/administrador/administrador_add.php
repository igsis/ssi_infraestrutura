<?php
$con = bancoMysqli();

if(isset($_POST['gravar']))
{
	$login = $_POST['login'];
    $local = $_POST['local'];
	$password = md5('ssi2018');
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$dateCreated = date('Y:m:d H:i:s');

	$sql = "INSERT INTO `administrators` (login, password, local, phone, email, dateCreated) 
            VALUES ('$login', '$password', '$local', '$phone', '$email','$dateCreated')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<span style=\"color: #01DF3A; \"><strong>Atualizado com sucesso!</strong></span>";
	}
	else
	{
		$mensagem = "<span style=\"color: #FF0000; \"><strong>Erro ao atualizar! Tente novamente.</strong></span>";
	}
}

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
				<form class="form-horizontal" role="form" action="?perfil=administrador&p=administrador" method="post">

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Login:</strong><br/>
							<input type="text" class="form-control" name="login" maxlength="10" >
						</div>
                        <div class="col-md-5"><strong>Local:</strong><br/>
                            <input type="text" class="form-control" name="local" maxlength="100">
                        </div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15">
						</div>
						<div class="col-md-5"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="gravar" value="GRAVAR" class="btn btn-theme btn-md btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>