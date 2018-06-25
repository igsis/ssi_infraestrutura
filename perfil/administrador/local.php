<?php
$con = bancoMysqli();
if(isset($_POST['login']))
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
			$mensagem = "<font color='#01DF3A'><strong>Cadastrado com sucesso!</strong></font>";
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
						<button class='btn btn-success' type='button' data-toggle='modal' data-target='#addLocal' style="border-radius: 30px;"> Adicionar Local / Usuário</button>
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
													<form method='POST' action='?perfil=administrador&p=local'>
														<input type='hidden' name='carregar' value='".$campo['id']."' />
														<input type ='submit' class='btn btn-theme btn-block' value='carregar'>
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
		<!--------------- Início Modal Adiona Local --------------->
		<div class="modal fade" id="addLocal" role="dialog" aria-labelledby="addLocalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Adiciona Local</h4>
					</div>
					<form class="form-horizontal" role="form" action="?perfil=administrador&p=local" method="post">
						<div class="modal-body">
							<label>Login</label>
							<input type="text" name="login" class="form-control" maxlength="10">

							<label>Local</label>
							<input type="text" name="local" class="form-control" maxlength="100">

							<label>Telefone</label>
							<input type="text" name="phone" class="form-control" maxlength="20">

							<label>Email</label>
							<input type="text" name="email" class="form-control" maxlength="100">

							<label>Contato</label>
							<input type="text" name="contact" class="form-control" maxlength="20">

							<label>Endereço</label>
							<input type="text" name="address" class="form-control" maxlength="255">

							<label>Região</label>
							<select class="form-control" name="idRegion">
								<option>Selecione...</option>
								<?php geraOpcao("regions",$idRegion); ?>
							</select>

							<label>Horário de Funcionamento</label>
							<input type="text" name="operatingHours" class="form-control" maxlength="100">

							<label>Prédio Tombado</label>
							<select class="form-control" name="historicalBuilding">
								<option value="0">Não</option>
								<option value="1">Sim</option>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" name="adicionaLocal" class="btn btn-success" id="confirm">Adicionar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--------------- Fim Modal Adiona Local --------------->

	</div>
</section>