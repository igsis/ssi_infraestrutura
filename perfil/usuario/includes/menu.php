<?php
//geram o insert pro framework da igsis
$pasta = "?perfil=usuario&p=";
 ?>

<div class="menu-area">
	<div id="dl-menu" class="dl-menuwrapper">
		<button class="dl-trigger">Open Menu</button>
		<ul class="dl-menu">
			<li><a href="?perfil=usuario">Home</a></li>
			<li><a href="<?php echo $pasta ?>cadastra_chamado">Enviar chamado</a></li>
			<li><a href="<?php echo $pasta ?>lista_chamado">Lista de Chamados</a></li>
			<li style="color:white;">-------------------------</li>
			<li><a href="index.php?secao=perfil">Minhas informações</a></li>
			<li><a href="#">Manual do sistema</a></li>
			<li><a href="../index.php">Sair</a></li>
		</ul>
	</div>
</div>