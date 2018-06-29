<?php
$con = bancoMysqli();

if(isset($_POST['adicionaFuncionario']))
{
	$name = $_POST['name'];
	$role = $_POST['role'];

	$sql_adiciona = "INSERT INTO `employees`(`name`, `role`, `published`) VALUES ('$name', '$role', '1')";
	if(mysqli_query($con,$sql_adiciona))
	{
		$mensagem = "<font color='#01DF3A'><strong>Inserido com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao inserir! Tente novamente.</strong></font>";
	}
}

if(isset($_POST['editaFuncionario']))
{
	$id = $_POST['editaFuncionario'];
	$name = $_POST['name'];
	$role = $_POST['role'];

	$sql_edita = "UPDATE employees SET name = '$name', role = '$role' WHERE id = '$id'";
	if(mysqli_query($con,$sql_edita))
	{
		$mensagem = "<font color='#01DF3A'><strong>Atualizado com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao atualizar! Tente novamente.</strong></font>";
	}
}

if(isset($_POST['excluirFuncionario']))
{
    $id = $_POST['excluirFuncionario'];

    $sql_exclui = "UPDATE employees SET published = 0 WHERE id = '$id'";
    if(mysqli_query($con,$sql_exclui))
    {
        $mensagem = "<font color='#01DF3A'><strong>Excluido com sucesso!</strong></font>";
    }
    else
    {
        $mensagem = "<font color='#FF0000'><strong>Erro ao excluir! Tente novamente.</strong></font>";
    }
}
?>

<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Funcionários</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<button class='btn btn-success' type='button' data-toggle='modal' data-target='#addFuncionario' style="border-radius: 30px;">Adiciona Funcionário</button>
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
										<td><strong>Funcionário</strong></td>
										<td><strong>Função</strong></td>
										<td width='20%'></td>
                                        <td width='20%'></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = bancoMysqli();
									$sql = "SELECT * FROM employees
											WHERE published = '1'
											ORDER BY name";
									$query = mysqli_query($con,$sql);
									$num = mysqli_num_rows($query);
									if($num > 0)
									{
										while($campo = mysqli_fetch_array($query))
										{
											echo "<tr>";
											echo "<form method='POST' action='?perfil=administrador&p=funcionario'>";
											echo "<td class='list_description'><input type='text' class='form-control' name='name' maxlength='45' value='".$campo['name']."'></td>";
											echo "<td class='list_description'><input type='text' class='form-control' name='role' maxlength='45' value='".$campo['role']."'></td>";
											echo "<td class='list_description'>
													<input type='hidden' name='editaFuncionario' value='".$campo['id']."' />
													<input type ='submit' class='btn btn-theme btn-block' value='Editar'></td>";
											echo "</form>";
											echo "<td class='list_description'>
                                                    <form method='POST' action='?perfil=administrador&p=funcionario'>
                                                        <input type='hidden' name='excluirFuncionario' value='".$campo['id']."' />
                                                        <button style='margin-top: 13px' class='btn btn-danger btn-block' type='button' data-toggle='modal' data-target='#confirmaExclusao' data-title='Excluir Funcionário?' data-message='Deseja realmente excluir o funcionário ".$campo['name']."?'>Remover</button>
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
		<!--------------- Início Modal Adiona Funcionário--------------->
		<div class="modal fade" id="addFuncionario" role="dialog" aria-labelledby="addFuncionarioLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Adiciona Funcionário</h4>
					</div>
					<form class="form-horizontal" role="form" action="?perfil=administrador&p=funcionario" method="post">
						<div class="modal-body">
							<label>Funcionário</label>
							<input type="text" name="name" class="form-control" maxlength="45">
							<label>Função</label>
							<input type="text" name="role" class="form-control" maxlength="45">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" name="adicionaFuncionario" class="btn btn-success" id="confirm">Adicionar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--------------- Fim Modal Adiciona Funcionário --------------->
        <!--------------- Início Modal Excluir Funcionário --------------->
        <div class="modal fade" id="confirmaExclusao" role="dialog" aria-labelledby="confirmaExclusaoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Excluir?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Realmente excluir?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" id="confirm">Excluir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--------------- Fim Modal Excluir Funcionário --------------->


    </div>
</section>