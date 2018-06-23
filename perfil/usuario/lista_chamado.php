<?php
$con = bancoMysqli();
$idUser= $_SESSION['idUser'];
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>CHAMADOS</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;}; ?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive list_info">
					<table class='table table-condensed'>
						<thead>
							<tr class='list_menu'>
								<td>Protocolo</td>
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
							$sql = "SELECT * FROM problems
									WHERE users_id = '$idUser'
									ORDER BY problem_status_id, startDate DESC";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$category = recuperaDados("categories","id",$campo['categories_id']);
									$status = recuperaDados("problem_status","id",$campo['problem_status_id']);
									echo "<tr>";
									echo "<td class='list_description'>".$campo['id']."</td>";
									echo "<td class='list_description'>".$campo['local']."</td>";
									echo "<td class='list_description'>".$campo['contact']."</td>";
									echo "<td class='list_description'>".$category['category']."</td>";
									echo "<td class='list_description'>".substr($campo['description'],0,15)."...</td>";
									echo "<td class='list_description'>".exibirDataHoraBr($campo['startDate'])."</td>";
									echo "<td class='list_description'>".$status['status']."</td>";
									echo "
										<td class='list_description'>
											<form method='POST' action='?perfil=usuario&p=detalhes'>
												<input type='hidden' name='idChamado' value='".$campo['id']."' />
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
</section>