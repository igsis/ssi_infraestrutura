<?php
?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php';?>
	<p align="left"><strong><?php echo saudacao(); ?>, <?php echo $_SESSION['nome']; ?>!</strong></p>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="text-hide">
                    <h2>Módulo Usuário</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div align="left" class="col-md-offset-1 col-md-10">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8"><h4>Estatísticas</h4>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-3">Chamados Abertos
					</div>
					<div class="col-md-3">Chamados Em Andamento
					</div>
					<div class="col-md-3">Chamados Fechados
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
