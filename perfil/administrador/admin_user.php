<?php
$con = bancoMysqli();

if(isset($_POST['users_id']))
{
	$users_id = $_POST['users_id'];
	$admininstrators_id = $_POST['admininstrators_id'];

	$sql = "UPDATE administrators_users SET users_id = '$users_id',  admininstrators_id = '$admininstrators_id' WHERE users_id = '$users_id'";
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
			<h3>Administrador de Cada Local</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive list_info">
					<table class='table table-condensed'>
						<thead>
							<tr class='list_menu'>
								<td><strong>Local / Usuário</strong></td>
								<td><strong>Administrador</strong></td>
								<td width='15%'></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$con = bancoMysqli();
							$idAdm = $_SESSION['idAdm'];
							$sql = "SELECT * FROM administrators_users AS AU
									INNER JOIN users AS U ON U.id = AU.users_id";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$adm = recuperaDados("administrators","id",$campo['admininstrators_id']);
									echo "<tr>";
									echo "<form method='POST' action='?perfil=administrador&p=admin_user'>";
									echo "<td class='list_description'>
											<select class='form-control' name='users_id'>";
											echo geraOrder4('users',$campo['users_id'])
										."</select></td>";
									echo "<td class='list_description'>
											<select class='form-control' name='admininstrators_id'>";
											echo geraOrder4('administrators',$campo['admininstrators_id'])
										."</select></td>";
									echo "
										<td class='list_description'>
											<input type='submit' value='Gravar' class='btn btn-success btn-block' style='border-radius: 5px;'>
										</td>";
									echo "</form>";
									echo "</tr>";
								}
							}
							else
							{
								echo "<tr>";
								echo "<td class='list_description'>Não há registros.</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>