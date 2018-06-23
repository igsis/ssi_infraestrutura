<?php
$con = bancoMysqli();

$idChamado = $_POST['idChamado'];


if(isset($_POST['adicionaNota']))
{
	$idChamado = $_POST['adicionaNota'];
	$idUser = $_SESSION['idUser'];
	$note = $_POST['note'];
	$notetDate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `notes`(`problems_id`, `users_id`, `note`, `date`) VALUES ('$idChamado','$idUser','$note','$notetDate')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Nota adicionada com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao atualizar! Tente novamente.</strong></font>";
	}
}
$chamado = recuperaDados("problems","id",$idChamado);
$category = recuperaDados("categories","id",$chamado['categories_id']);
$administrator = recuperaDados("administrators","id",$chamado['administrators_id']);
$status = recuperaDados("problem_status","id",$chamado['problem_status_id']);
$nota = recuperaDados("notes","problems_id",$idChamado);
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div align="right" class="col-md-offset-2 col-md-7">
			<a href="#"><i class="fa fa-print" aria-hidden="true"></i></a>
		</div>
		<div class="form-group">
			<h3>Detalhes do Chamado Nº <?php echo $idChamado ?></h3>
			<br/>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div align="left" class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<p><strong>Local:</strong> <?php echo $chamado['local'] ?></p>
						<p><strong>Telefone:</strong> <?php echo $chamado['phone'] ?> | <strong>Telefone:</strong> <?php echo $chamado['phone'] ?> | <strong>Contato:</strong> <?php echo $chamado['contact'] ?></p>
						<p><hr/></p>
						<p><strong>Data Abertura:</strong> <?php echo exibirDataHoraBr($chamado['startDate']) ?></p>
						<p><strong>Responsável:</strong> <?php echo $administrator['local'] ?></p>
						<p><strong>Status:</strong> <?php echo $status['status'] ?></p>
						<p><strong>Categoria:</strong> <?php echo $category['category'] ?></p>
						<p><strong>Descrição</strong> <?php echo $chamado['description'] ?></p>
						<?php
						if($chamado['problem_status_id'] == 2)
						{
						?>
							<p><strong>Data Encerramento:</strong> <?php echo exibirDataHoraBr($chamado['closedate']) ?></p>
							<p><strong>Solução:</strong> <?php echo $chamado['solution'] ?></p>
						<?php
						}
						?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8"><hr/></div>
				</div>
				<div align="left" class="form-group">
					<div class="col-md-offset-2 col-md-6"><h6><strong>Notas</strong></h6></div>
					<?php
						//só adiona nota se o chamado não estiver fechado
						if($chamado['problem_status_id'] != 2)
						{
						?>
							<div class="col-md-6"><h6><button class='btn btn-default' type='button' data-toggle='modal' data-target='#addNota' style="border-radius: 30px;"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button></h6></div>
					<?php
						}
					?>
				</div>
				<div align="left" class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<?php
							$sql = "SELECT * FROM notes
									WHERE problems_id = '$idChamado' AND private = 0
									ORDER BY notes.date";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$adm = recuperaDados("administrators","id",$campo['administrator_id']);
									$user = recuperaDados("users","id",$campo['users_id']);
									echo "<p><strong>".exibirDataHoraBr($campo['date'])." - ".$adm['local'].$user['local']."</strong></p>";
									echo "<p>".$campo['note']."</p>";
								}
							}
							else
							{
								echo "<p>Não há notas disponíveis.</p>";
							}
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- Adiona Nota -->
		<div class="modal fade" id="addNota" role="dialog" aria-labelledby="addNotaLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Adiciona Nota</h4>
					</div>
					<form class="form-horizontal" role="form" action="?perfil=usuario&p=detalhes" method="post">
						<div class="modal-body">
							<textarea name="note" class='form-control' cols="40" rows="6"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<input type="hidden" name="adicionaNota" value="<?php echo $idChamado ?>">
							<button type="submit" class="btn btn-success" id="confirm">Adicionar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Adiona Nota -->
	</div>
</section>