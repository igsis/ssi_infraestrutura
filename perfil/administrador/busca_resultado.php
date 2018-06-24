<?php
$con = bancoMysqli();

$id = $_POST['id'];
$users_id = $_POST['users_id'];
$categories_id = $_POST['categories_id'];
$description = $_POST['description'];
$solution = $_POST['solution'];
$problem_status_id = $_POST['problem_status_id'];
$idAdm = $_SESSION['idAdm'];

if($id !=0)
{
	$filtro_id = "AND id = '$id'";
}
else
{
	$filtro_id = "";
}

if($users_id !=0)
{
	$filtro_users_id = "AND users_id = '$users_id'";
}
else
{
	$filtro_users_id = "";
}

if($categories_id !=0)
{
	$filtro_category = "AND categories_id = '$categories_id'";
}
else
{
	$filtro_category = "";
}

if($description != '')
{
	$filtro_description = " AND description LIKE '%$description%'";
}
else
{
	$filtro_description = "";
}

if($solution != '')
{
	$filtro_solution = " AND solution LIKE '%$solution%'";
}
else
{
	$filtro_solution = "";
}

if($problem_status_id != 0)
{
	$filtro_status = " AND problem_status_id = '$problem_status_id'";
}
else
{
	$filtro_status = "";
}

$sql = "SELECT * FROM problems
		WHERE administrators_id = $idAdm
		$filtro_id $filtro_users_id $filtro_category $filtro_description $filtro_solution $filtro_status";
$query = mysqli_query($con,$sql);
$num = mysqli_num_rows($query);
if($num > 0)
{
	$i = 0;
	while($lista = mysqli_fetch_array($query))
	{
		$user = recuperaDados("users","id",$lista['users_id']);
		$category = recuperaDados("categories","id",$lista['categories_id']);
		$status = recuperaDados("problem_status","id",$lista['problem_status_id']);
		$x[$i]['id'] = $lista['id'];
		$x[$i]['local'] = $user['local'];
		$x[$i]['contact'] = $lista['contact'];
		$x[$i]['category'] = $category['category'];
		$x[$i]['description'] = substr($lista['description'],0,25);
		$x[$i]['startDate'] = exibirDataHoraBr($lista['startDate']);
		$x[$i]['status'] = $status['status'];
		$i++;
	}
	$x['num'] = $i;

	if($x['num'] == 1)
	{
		$mensagem = "Foi encontrado ".$x['num']." resultado.";
	}
	else
	{
		$mensagem = "Foram encontrados ".$x['num']." resultados.";
	}
}
else
{
	$x['num'] = 0;
	$mensagem = "Nenhum resultado foi encontrado.";
}

?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h4>Busca de Chamados</h4>
			<h5><?php if(isset($mensagem)){echo $mensagem;}; ?></h5>
			<h5><a href="?perfil=usuario&p=busca">Fazer outra busca</a></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive list_info">
					<table class='table table-condensed'>
						<thead>
							<tr class='list_menu'>
								<td>Chamado nº</td>
								<td>Local</td>
								<td>Contato</td>
								<td>Categoria</td>
								<td>Descrição</td>
								<td>Data Abertura</td>
								<td>Status</td>
								<td width="10%"></td>
							</tr>
						</thead>
						<tbody>
							<?php
							for($h = 0; $h < $x['num']; $h++)
							{
								echo "<tr>";
								echo "<td class='list_description'>".$x[$h]['id']."</td>";
								echo "<td class='list_description'>".$x[$h]['local']."</td>";
								echo "<td class='list_description'>".$x[$h]['contact']."</td>";
								echo "<td class='list_description'>".$x[$h]['category']."</td>";
								echo "<td class='list_description'>".$x[$h]['description']."...</td>";
								echo "<td class='list_description'>".$x[$h]['startDate']."</td>";
								echo "<td class='list_description'>".$x[$h]['status']."</td>";
								echo "<td class='list_description'>
										<form method='POST' action='?perfil=usuario&p=detalhes'>
											<input type='hidden' name='idChamado' value='".$x[$h]['id']."' />
											<input type ='submit' class='btn btn-theme btn-block' value='carregar'>
										</form>
									</td>";
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