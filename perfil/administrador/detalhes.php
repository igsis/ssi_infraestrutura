<?php
$con = bancoMysqli();

if(isset($_POST['idChamado']))
{
	$idChamado = $_POST['idChamado'];
}

if(isset($_POST['cadastra']))
{
	$idAdm = $_SESSION['idAdm'];
	$idUser = $_POST['idUser'];
	$local = $_POST['local'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$categories_id = $_POST['categories_id'];
	$priorities_id = $_POST['priorities_id'];
	$problem_status_id = $_POST['problem_status_id'];
	$description = $_POST['description'];
	$solution = $_POST['solution'];
	$startDate = date("Y-m-d H:i:s");

	if($problem_status_id == 2)
	{
		$closedate = date("Y-m-d H:i:s");
	}
	else
	{
		$closedate = NULL;
	}

	$sql = "INSERT INTO `problems`(
	`users_id`,
	`local`,
	`phone`,
	`email`,
	`contact`,
	`priorities_id`,
	`categories_id`,
	`description`,
	`solution`,
	`startDate`,
	`closedate`,
	`problem_status_id`,
	`administrators_id`) VALUES (
	'$idUser',
	'$local',
	'$phone',
	'$email',
	'$contact',
	'$priorities_id',
	'$categories_id',
	'$description',
	'$solution',
	'$startDate',
	'$closedate',
	'$problem_status_id',
	'$idAdm')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Cadastrado com sucesso!</strong><br/></font>";
		$idAdm = $_SESSION['idAdm'];
		$sql_ultimo = "SELECT * FROM problems WHERE administrators_id = '$idAdm' ORDER BY id DESC LIMIT 0,1";
		$query_ultimo = mysqli_query($con,$sql_ultimo);
		$problems = mysqli_fetch_array($query_ultimo);
		$idChamado = $problems['id'];
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao cadastrar! Tente novamente.</strong></font>";
	}
}

if(isset($_POST['gravar']))
{
	$idChamado = $_POST['idChamado'];
	$administrators_id = $_POST['administrators_id'];
	$priorities_id = $_POST['priorities_id'];
	$problem_status_id = $_POST['problem_status_id'];
	$categories_id = $_POST['categories_id'];
	$description = $_POST['description'];
	$solution = $_POST['solution'];
	if($problem_status_id == 2)
	{
		$closedate = date("Y-m-d H:i:s");
	}
	else
	{
		$closedate = NULL;
	}

	$sql = "UPDATE problems SET administrators_id = '$administrators_id', priorities_id = '$priorities_id', problem_status_id = '$problem_status_id', categories_id = '$categories_id', description = '$description', solution = '$solution', closedate = '$closedate'";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Atualizado com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao atualizar! Tente novamente.</strong></font>".$sql;
	}
}

if(isset($_POST['adicionaNota']))
{
	$idChamado = $_POST['idChamado'];
	$idAdm = $_SESSION['idAdm'];
	$note = $_POST['note'];
	$notetDate = date("Y-m-d H:i:s");
	if(isset($_POST['private']))
	{
		$private = 1;
	}
	else
	{
		$private = 0;
	}

	$sql = "INSERT INTO `notes`(`problems_id`, `administrator_id`, `note`, `private`, `date`) VALUES ('$idChamado','$idAdm','$note', '$private', '$notetDate')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Nota adicionada com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao adicionar nota! Tente novamente.</strong></font>".$sql;
	}
}

if(isset($_POST['adicionaTool']))
{
	$idChamado = $_POST['adicionaTool'];
	$employee_id = $_POST['employee_id'];
	$toolMaterial = $_POST['toolMaterial'];

	$sql = "INSERT INTO `employees_problems`(`problems_id`, `employee_id`, `toolMaterial`) VALUES ('$idChamado', '$employee_id', '$toolMaterial')";
	if(mysqli_query($con,$sql))
	{
		$mensagem = "<font color='#01DF3A'><strong>Adicionado com sucesso!</strong></font>";
	}
	else
	{
		$mensagem = "<font color='#FF0000'><strong>Erro ao adicionar! Tente novamente.</strong></font>";
	}
}

$chamado = recuperaDados("problems","id",$idChamado);
$category = recuperaDados("categories","id",$chamado['categories_id']);
$administrator = recuperaDados("administrators","id",$chamado['administrators_id']);
$status = recuperaDados("problem_status","id",$chamado['problem_status_id']);
$nota = recuperaDados("notes","problems_id",$idChamado);
$tool = recuperaDados("employees_problems","problems_id",$idChamado);
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
					</div>
				</div>
				<?php
				if($chamado['problem_status_id'] == 2) // status fechado
				{
				?>
					<div align="left" class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<p><strong>Responsável:</strong> <?php echo $administrator['local'] ?></p>
							<p><strong>Status:</strong> <?php echo $status['status'] ?></p>
							<p><strong>Categoria:</strong> <?php echo $category['category'] ?></p>
							<p><strong>Descrição</strong> <?php echo $chamado['description'] ?></p>
							<p><strong>Data Encerramento:</strong> <?php echo exibirDataHoraBr($chamado['closedate']) ?></p>
							<p><strong>Solução:</strong> <?php echo $chamado['solution'] ?></p>
						</div>
					</div>
				<?php
				}
				else
				{
				?>
					<form class="form-horizontal" role="form" action="?perfil=administrador&p=detalhes" method="post">
						<div class="form-group">
							<div class="col-md-offset-2 col-md-3"><strong>Responsável:</strong>
								<select class="form-control" name="administrators_id">
									<?php geraOpcao("administrators",$chamado['administrators_id']);	?>
								</select>
							</div>
							<div class="col-md-2"><strong>Prioridade:</strong>
								<select class="form-control" name="priorities_id">
									<?php geraOpcao("priorities",$chamado['priorities_id']); ?>
								</select>
							</div>
							<div class="col-md-3"><strong>Status:</strong>
								<select class="form-control" name="problem_status_id">
									<?php geraOpcao("problem_status",$chamado['problem_status_id']); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8"><strong>Categoria:</strong>
								<select class="form-control" name="categories_id">
									<?php geraOpcao("categories",$chamado['categories_id']); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8"><strong>Descrição</strong><br/>
								<textarea name="description" class='form-control' cols="40" rows="6"><?php echo $chamado['description'] ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-offset-2 col-md-8"><strong>Solução</strong><br/>
								<textarea name="solution" class='form-control' cols="40" rows="6"><?php echo $chamado['solution'] ?></textarea>
							</div>
						</div>

						<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="idChamado" value="<?php echo $idChamado ?>">
							<input type="submit" name="gravar" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>

					</form>
				<?php
				}
				?>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8"><hr/></div>
				</div>

				<!--------------- Início Notas --------------->
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
									WHERE problems_id = '$idChamado'
									ORDER BY notes.date";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$adm = recuperaDados("administrators","id",$campo['administrator_id']);
									$user = recuperaDados("users","id",$campo['users_id']);
									$priv = $campo['private'];
									if($priv == 1)
									{
										$msgPrivate = "<font color = 'red'> - PRIVATIVA</font>";
									}
									else
									{
										$msgPrivate = "";
									}
									echo "<p><strong>".exibirDataHoraBr($campo['date'])." - ".$adm['local'].$user['local'].$msgPrivate."</strong></p>";
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
				<!--------------- Fim Notas --------------->
				<!--------------- Início Modal Adiona Nota--------------->
				<div class="modal fade" id="addNota" role="dialog" aria-labelledby="addNotaLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Adiciona Nota</h4>
							</div>
							<form class="form-horizontal" role="form" action="?perfil=administrador&p=detalhes" method="post">
								<div class="modal-body">
									<textarea name="note" class='form-control' cols="40" rows="6"></textarea>
									<input type=checkbox name="private" value=1> Privativa
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<input type="hidden" name="idChamado" value="<?php echo $idChamado ?>">
									<button type="submit" name="adicionaNota" class="btn btn-success" id="confirm">Adicionar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--------------- Fim Modal Adiona Nota --------------->
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8"><hr/></div>
				</div>
				<!--------------- Início Funcionário Ferramentas --------------->
				<div align="left" class="form-group">
					<div class="col-md-offset-2 col-md-6"><h6><strong>Funcionário / Ferramentas</strong></h6></div>
					<?php
						//só adiona nota se o chamado não estiver fechado
						if($chamado['problem_status_id'] != 2)
						{
						?>
							<div class="col-md-6"><h6><button class='btn btn-default' type='button' data-toggle='modal' data-target='#addTool' style="border-radius: 30px;"><i class="fa fa-user" aria-hidden="true"></i></button></h6></div>
					<?php
						}
					?>
				</div>
				<div align="left" class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<?php
							$sql = "SELECT * FROM employees_problems
									WHERE problems_id = '$idChamado'";
							$query = mysqli_query($con,$sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while($campo = mysqli_fetch_array($query))
								{
									$emp = recuperaDados("employees","id",$campo['employee_id']);
									echo "<p><strong>".$emp['name']." - ".$emp['role']."</strong></p>";
									echo "<p>".$campo['toolMaterial']."</p>";
								}
							}
							else
							{
								echo "<p>Não há informações cadastradas.</p>";
							}
						?>
					</div>
				</div>
				<!--------------- Fim Funcionário Ferramentas --------------->
				<!--------------- Início Modal Funcionário Ferramentas--------------->
				<div class="modal fade" id="addTool" role="dialog" aria-labelledby="addToolLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Funcionário / Ferramenta</h4>
							</div>
							<form class="form-horizontal" role="form" action="?perfil=administrador&p=detalhes" method="post">
								<div class="modal-body">
									<label>Funcionário</label>
										<select class="form-control" name="employee_id">
										<?php geraOpcao("employees",""); ?>
									</select>
									<label>Materiais / Ferramentas</label>
									<textarea name="toolMaterial" class='form-control' cols="40" rows="6"></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<input type="hidden" name="adicionaTool" value="<?php echo $idChamado ?>">
									<button type="submit" class="btn btn-success" id="confirm">Adicionar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--------------- Fim Modal Funcionário Ferramentas --------------->
			</div>
		</div>
	</div>
</section>