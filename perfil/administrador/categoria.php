<?php
$con = bancoMysqli();

if(isset($_POST['adicionaCategoria']))
{
	$category = $_POST['category'];

	$sql_adiciona = "INSERT INTO `categories`(`category`, `published`) VALUES ('$category', '1')";
	if(mysqli_query($con,$sql_adiciona))
	{
		$mensagem = "<font color='#01DF3A'><strong>Inserido com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao inserir! Tente novamente.</strong></font>";
	}
}

if(isset($_POST['editaCategoria']))
{
	$id = $_POST['editaCategoria'];
	$category = $_POST['category'];

	$sql_edita = "UPDATE categories SET category = '$category' WHERE id = '$id'";
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
			<h3>Categorias</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<button class='btn btn-success' type='button' data-toggle='modal' data-target='#addCategoria' style="border-radius: 30px;">Adiciona Categoria</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8"><hr/></div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<div class="table-responsive list_info">
							<table class='table table-condensed'>
								<thead>
									<tr class='list_menu'>
										<td><strong>Categoria</strong></td>
										<td width='20%'></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = bancoMysqli();
									$sql = "SELECT * FROM categories
											WHERE published = '1'
											ORDER BY category";
									$query = mysqli_query($con,$sql);
									$num = mysqli_num_rows($query);
									if($num > 0)
									{
										while($campo = mysqli_fetch_array($query))
										{
											echo "<tr>";
											echo "<form method='POST' action='?perfil=administrador&p=categoria'>";
											echo "<td class='list_description'><input type='text' class='form-control' name='category' maxlength='120' value='".$campo['category']."'></td>";

											echo "<td class='list_description'>
													<input type='hidden' name='editaCategoria' value='".$campo['id']."' />
													<input type ='submit' class='btn btn-theme btn-block' value='Editar'></td>";
											echo "</form>";
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
		<!--------------- Início Modal Adiona Categoria--------------->
		<div class="modal fade" id="addCategoria" role="dialog" aria-labelledby="addCategoriaLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Adiciona Categoria</h4>
					</div>
					<form class="form-horizontal" role="form" action="?perfil=administrador&p=categoria" method="post">
						<div class="modal-body">
							<input type="text" name="category" class="form-control" maxlength="120">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" name="adicionaCategoria" class="btn btn-success" id="confirm">Adicionar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--------------- Fim Modal Adiona Categoria --------------->

	</div>
</section>