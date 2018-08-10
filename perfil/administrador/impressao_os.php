<?php
$con = bancoMysqli();

if(isset($_GET['idChamado']))
{
	$idChamado = $_GET['idChamado'];
}

if(isset($_POST['idFuncionario']))
{
	$idFuncionario = $_POST['idFuncionario'];
}

$server = "http://".$_SERVER['SERVER_NAME']."/ssi_infraestrutura"; 
$http = $server."/pdf/";

$link01 = $http."rlt_ordemservico.php";

?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>ORDEM DE SERVIÇO</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;}; ?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive list_info">
					<table class='table table-condensed'>
						<thead>
							<tr class='list_menu'>
								<td>Funcionário</td>
								<td>Cargo</td>
								<td width="10%"></td>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql = "SELECT * FROM employees_problems
									WHERE problems_id = '$idChamado'";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$funcionario = recuperaDados("employees","id",$campo['employee_id']);
									echo "<tr>";
									echo "<td class='list_description'>".$funcionario['name']."</td>";
									echo "<td class='list_description'>".$funcionario['role']."</td>";
									echo "
										<td class='list_description'>
											<form method='POST' action='$link01'>
												<input type='hidden' name='idChamado' value='$idChamado' />
												<input type='hidden' name='idFuncionario' value='".$funcionario['id']."' />
												<input type ='submit' class='btn btn-theme btn-block' value='EMITIR OS'>
											</form>
										</td>";
									echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>