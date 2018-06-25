<?php
$con = bancoMysqli();

if(isset($_POST['adicionar']))
{
	$login = $_POST['login'];
	$password= md5('ssi2018');
	$local = $_POST['local'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$idRegion = $_POST['idRegion'];
	$historicalBuilding = $_POST['historicalBuilding'];
	$operatingHours = $_POST['operatingHours'];
	$dateCreated = date('Y-m-d H:i:s');

	$sql_cadastra = "INSERT INTO users (login, password, local, phone, email, contact, address, idRegion, operatingHours, historicalBuilding, dateCreated, user_status_id) VALUES ('$login', '$password', '$local', '$phone', '$email', '$contact', '$address', '$idRegion', '$operatingHours', '$historicalBuilding', '$dateCreated', '1')";
	if(mysqli_query($con,$sql_cadastra))
	{
		$sql_ultimo = "SELECT * FROM users ORDER BY id DESC LIMIT 0,1";
		$query_ultimo = mysqli_query($con,$sql_ultimo);
		$user = mysqli_fetch_array($query_ultimo);
		$users_id = $user['id'];
		$idAdm = $_SESSION['idAdm'];
		$sql_adm_user = "INSERT INTO administrators_users (users_id, admininstrators_id) VALUES ('$users_id', '$idAdm')";
		if(mysqli_query($con,$sql_adm_user))
		{
			$mensagem = "<font color='#01DF3A'><strong>Cadastrado com sucesso!<br/>
							Senha padrão <i>ssi2018</i></strong> </font>";
		}
		else
		{
			$mensagem = "<font color='#FF0000'><strong>Erro ao cadastrar! Tente novamente. [COD2]</strong></font>";
		}
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao cadastrar! Tente novamente.</strong></font>";
	}
}

if(isset($_POST['editar']))
{
	$id = $_POST['id'];
	$login = $_POST['login'];
	$local = $_POST['local'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$idRegion = $_POST['idRegion'];
	$historicalBuilding = $_POST['historicalBuilding'];
	$operatingHours = $_POST['operatingHours'];

	$sql_edita = "UPDATE users SET
		login = '$login',
		local = '$local',
		phone = '$phone',
		email = '$email',
		contact = '$contact',
		address  = '$address',
		idRegion = '$idRegion',
		operatingHours = '$operatingHours',
		historicalBuilding = '$historicalBuilding'
		WHERE id = '$id'";
	if(mysqli_query($con,$sql_edita))
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
			<h3>Local / Usuário</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<form class="form-horizontal" role="form" action="?perfil=administrador&p=local_add" method="post">
							<input type="submit" value="Adicionar Local / Usuário" class="btn btn-success" style="border-radius: 30px;">
						</form>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-1 col-md-10"><hr/></div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-1 col-md-10">
						<div class="table-responsive list_info">
							<table class='table table-condensed'>
								<thead>
									<tr class='list_menu'>
										<td><strong>Local</strong></td>
										<td><strong>Telefone</strong></td>
										<td><strong>E-mail</strong></td>
										<td><strong>Contato</strong></td>
										<td><strong>Endereço</strong></td>
										<td><strong>Região</strong></td>
										<td width='15%'></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = bancoMysqli();
									$idAdm = $_SESSION['idAdm'];
									$sql = "SELECT * FROM users INNER JOIN administrators_users ON users.id = administrators_users.users_id WHERE administrators_users.admininstrators_id = $idAdm";
									$query = mysqli_query($con,$sql);
									$num = mysqli_num_rows($query);
									if($num > 0)
									{
										while($campo = mysqli_fetch_array($query))
										{
											$reg = recuperaDados("regions","id",$campo['idRegion']);
											echo "<tr>";
											echo "<td class='list_description'>".$campo['local']."</td>";
											echo "<td class='list_description'>".$campo['phone']."</td>";
											echo "<td class='list_description'>".$campo['email']."</td>";
											echo "<td class='list_description'>".$campo['contact']."</td>";
											echo "<td class='list_description'>".$campo['address']."</td>";
											echo "<td class='list_description'>".$reg['region']."</td>";
											echo "
												<td class='list_description'>
													<form method='POST' action='?perfil=administrador&p=local_edit'>
														<input type='hidden' name='carregar' value='".$campo['id']."' />
														<input type='submit' value='Carregar' class='btn btn-success btn-block' style='border-radius: 5px;'>
													</form>
												</td>";
											echo "</tr>";
										}
									}
									else
									{
										echo "<tr>";
										echo "<td class='list_description'>Não há chamados registrados.</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>