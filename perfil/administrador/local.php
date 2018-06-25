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
						<button class='btn btn-success' type='button' data-toggle='modal' data-target='#addFuncionario' style="border-radius: 30px;"> Adiocionar Local / Usuário</button>
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
		<!--------------- Fim Modal Adiona Categoria --------------->

	</div>
</section>