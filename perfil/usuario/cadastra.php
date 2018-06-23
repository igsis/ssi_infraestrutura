<?php
$con = bancoMysqli();

$user = recuperaInfoUsuario($_SESSION['idUser']);
$idUser = $user['idUser'];
$login = $user['login'];
$local = $user['local'];
$userPhone = $user['phone'];
$userEmail = $user['email'];
$userContact = $user['contact'];
$idAdminUser = $user['idAdminUser'];

if(isset($_POST['cadastra']))
{
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$categories_id = $_POST['categories_id'];
	$description = $_POST['description'];
	$startDate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `problems`(`users_id`, `local`, `phone`, `email`, `contact`, `priorities_id`, `categories_id`, `description`, `startDate`, `problem_status_id`, `administrators_id`) VALUES ('$idUser','$local','$phone','$email','$contact','1','$categories_id','$description','$startDate','1','$idAdminUser')";
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
			<h3>Cadastro de Chamados</h3>
			<br/>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="?perfil=usuario&p=cadastra" method="post">

					<div class="form-group">
						<div class="col-md-offset-1 col-md-3"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" maxlength="15" value="<?php echo $userPhone ?>">
						</div>
						<div class="col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $userEmail ?>">
						</div>
						<div class="col-md-3"><strong>Contato:</strong><br/>
							<input type="text" class="form-control" name="contact" maxlength="20" value="<?php echo $userContact ?>">
						</div>
					</div>

					<div class="form-group">
						<hr/>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Categoria:</strong>
							<button class='btn btn-default' type='button' data-toggle='modal' data-target='#categoriaModal' style="border-radius: 30px;"><i class="fa fa-info-circle" aria-hidden="true"></i></button><br/>
							<select class="form-control" name="categories_id">
							<option>Selecione...</option>
								<?php geraOpcao("categories","");	?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Descrição</strong><br/>
							<textarea name="description" class='form-control' cols="40" rows="6"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="cadastra" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>

			</div>
		</div>
		<!-- Início Modal -->
		<div class="modal fade" id="categoriaModal" role="dialog" aria-labelledby="infoOrcamentoLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Definição das categorias</h4>
					</div>
					<div class="modal-body" style="text-align: left;">
						<h5>Alvenaria</h5>
		                    <p>- Reboco em paredes, muros, etc.</p>
		                    <p>- Assentamento de tijplos e blocos.</p>
		                    <p>- Impermeabilzação em geral.</p>
		                    <br>
		                    <h5>Carpintaria</h5>
		                    <p>- Madeiramento.</p>
		                    <br>
		                    <h5>Elétrica</h5>
		                    <p>- Troca de lâmpadas.</p>
		                    <p>- Instalação de interruptores.</p>
		                    <p>- Iluminação de emergência.</p>
		                    <br>
		                    <h5>Geral</h5>
		                    <p>- Pesquisa de materiais como preço, qualidade, tipo, quantidade e descrição.</p>
		                    <p>- Compra dos materiais.</p>
		                    <p>- Limpeza.</p>
		                    <p>- Organização / Conservação.</p>
		                    <p>- Itens que não entram em classificações anteriores.</p>
		                    <br>
		                    <h5>Hidráulica</h5>
		                    <p>- Conserto de vazamentos em tubulações.</p>
		                    <p>- Troca de reparo em válvulas de descarga.</p>
		                    <p>- Troca de válvulas de descargas, torneiras, registro, etc.</p>
		                    <p>- Calhas e rufos.</p>
		                    <br>
		                    <h5>Jardinagem</h5>
		                    <p>- Corte de grama.</p>
		                    <br>
		                    <h5>Manutenção de equipamentos</h5>
		                    <p>- Microondas.</p>
		                    <p>- Geladeiras.</p>
		                    <br>
		                    <h5>Marcenaria</h5>
		                    <p>- Troca de fechaduras e puxadores.</p>
		                    <p>- Troca de folha de porta.</p>
		                    <p>- Confecção de molduras.</p>
		                    <p>- Colagem de folha de revestimento como fórmica, post formic e lâmina de madeira.</p>
		                    <p>- Polimento com cera / verniz.</p>
		                    <p>- Cordões de acabamento.</p>
		                    <br>
		                    <h5>Pintura</h5>
		                    <p>- Aplicação de verniz.</p>
		                    <p>- Aplicação de latex acrílico e a base d'agua.</p>
		                    <p>- Esmalte e tinta à óleo em madeiras, portas, janelas, grades, etc.</p>
		                    <p>- Criação a base de cal.</p>
		                    <br>
		                    <h5>Serralheria</h5>
		                    <p>- Consertos gerais.</p>
		                    <br>
		                    <h5>Telhado</h5>
		                    <p>- Vazamentos.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Fim Modal -->
	</div>
</section>