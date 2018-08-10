<?php
//geram o insert pro framework da igsis
$pasta = "?perfil=administrador&p=";
 ?>

<div class="menu-area">
	<div id="dl-menu" class="dl-menuwrapper">
		<button class="dl-trigger">Open Menu</button>
		<ul class="dl-menu">
			<li><a href="?perfil=administrador">Home</a></li>
			<li><a href="<?php echo $pasta ?>cadastra">Enviar chamado</a></li>
			<li><a href="<?php echo $pasta ?>lista">Lista de Chamados</a></li>
			<li><a href="<?php echo $pasta ?>busca">Busca</a></li>
			<li><a href="#">Acesso Administrativo</a>
				<ul class="dl-submenu">
					<li><a href="<?php echo $pasta ?>categoria">Categoria</a></li>
					<li><a href="<?php echo $pasta ?>funcionario">Funcionários</a></li>
					<li><a href="<?php echo $pasta ?>local">Local</a></li>
					<li><a href="<?php echo $pasta ?>admin_user">Administrador do Usuário</a></li>
					<li><a href="<?php echo $pasta ?>administrador">Administrador</a></li>
				</ul>
			</li>
			<li style="color:white;">-------------------------</li>
			<li><a href="<?php echo $pasta ?>minhas_informacoes">Minhas informações</a></li>
			<li><a href="../pdf/manual_administrador_ssi.pdf">Manual do sistema</a></li>
			<li><a href="../index.php">Sair</a></li>
		</ul>
	</div>
</div>