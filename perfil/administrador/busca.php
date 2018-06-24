<?php
$idAdm = $_SESSION['idAdm'];
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h4>Buscar</h4>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form method="POST" action="?perfil=administrador&p=busca_resultado" class="form-horizontal" role="form">

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Chamado nº</label>
							<input type="text" name="id" class="form-control" placeholder="Insira o número do chamado">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Usuário</label>
							<select class="form-control" name="users_id" >
								<option>Selecione...</option>
								<?php listaUser($idAdm,"") ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Categoria</label>
							<select class="form-control" name="categories_id" >
								<option>Selecione...</option>
								<?php echo geraOpcao("categories","") ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Descrição</label>
							<input type="text" name="description" class="form-control" placeholder="Insira parte do texto da descrição">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Solução</label>
							<input type="text" name="solution" class="form-control" placeholder="Insira parte do texto da solução">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><label>Status</label>
							<select class="form-control" name="problem_status_id" >
								<option>Selecione...</option>
								<?php echo geraOpcao("problem_status","") ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="submit" name="pesquisar" class="btn btn-theme btn-lg btn-block" value="Buscar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>