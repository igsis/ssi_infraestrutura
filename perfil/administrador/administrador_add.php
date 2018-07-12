<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Cadastro de Administrador</h3>
			<br/>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="?perfil=administrador&p=administrador" method="post">

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Login:</strong><br/>
							<input type="text" class="form-control" name="login" maxlength="10" >
						</div>
                        <div class="col-md-5"><strong>Local:</strong><br/>
                            <input type="text" class="form-control" name="local" maxlength="100">
                        </div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-5"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control" name="phone" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15">
						</div>
						<div class="col-md-5"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" name="email" maxlength="100">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							<input type="submit" name="gravar" value="GRAVAR" class="btn btn-theme btn-md btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>