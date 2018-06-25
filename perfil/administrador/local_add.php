<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Local / Usuário</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="?perfil=administrador&p=local" method="post">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-3"><label>Login</label>
							<input type="text" name="login" class="form-control" maxlength="10">
						</div>
						<div class="col-md-7"><strong>Local:</strong><br/>
							<input type="text" class="form-control" name="local" maxlength="100">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-3"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15">
						</div>
						<div class="col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100">
						</div>
						<div class="col-md-3"><strong>Contato:</strong><br/>
							<input type="text" class="form-control" name="contact" maxlength="20">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Endereço:</strong><br/>
							<input type="text" class="form-control" name="address" maxlength="255">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Região:</strong>
							<select class="form-control" name="idRegion">
							<option>Selecione...</option>
								<?php geraOpcao("regions",""); ?>
						</select>
						</div>
						<div class="col-md-5"><strong>Prédio Tombado?</strong>
							<select class="form-control" name="historicalBuilding">
								<option value="0">Não</option>
								<option value="1">Sim</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10"><strong>Horário de Funcionamento:</strong>
							<input type="text" class="form-control" name="operatingHours" maxlength="100">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="adicionar" value="GRAVAR" class="btn btn-theme btn-md btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>