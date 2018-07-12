<?php
$con = bancoMysqli();

if(isset($_POST['gravar']))
{
    $login = $_POST['login'];
    $local = $_POST['local'];
    $password = md5('ssi2018');
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dateCreated = date('Y:m:d H:i:s');

    $sql = "INSERT INTO `administrators` (login, password, local, phone, email, dateCreated) 
            VALUES ('$login', '$password', '$local', '$phone', '$email','$dateCreated')";
    if(mysqli_query($con,$sql))
    {
        $mensagem = "<span style=\"color: #01DF3A; \"><strong>Atualizado com sucesso!</strong></span>";
        echo "<meta http-equiv='refresh' content='0.5;url=?perfil=administrador&p=administrador'>";
        //header( "Refresh:3; url='?perfil=administrador&p=administrador'");
    }
    else
    {
        $mensagem = "<span style=\"color: #FF0000; \"><strong>Erro ao atualizar! Tente novamente.</strong></span>";
    }
}

?>
<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h3>Administrador</h3>
			<h5><?php if(isset($mensagem)){echo $mensagem;};?></h5>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="form-group">
					<div class="col-md-offset-1 col-md-10">
						<form class="form-horizontal" role="form" action="?perfil=administrador&p=administrador_add" method="post">
							<input type="submit" value="Adicionar Administrador" class="btn btn-success" style="border-radius: 30px;">
						</form>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-0 col-md-12"><hr/></div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-0 col-md-12">
						<div class="table-responsive list_info">
							<table class='table table-condensed'>
								<thead>
									<tr class='list_menu'>
                                        <td><strong>Login</strong></td>
										<td><strong>Local</strong></td>
										<td><strong>Telefone</strong></td>
										<td><strong>E-mail</strong></td>
										<td><strong>Data do Cadastro</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = bancoMysqli();
									$idAdm = $_SESSION['idAdm'];
									$sql = "SELECT * FROM administrators ORDER BY local";
									$query = mysqli_query($con,$sql);
									$num = mysqli_num_rows($query);
									if($num > 0)
									{
										while($campo = mysqli_fetch_array($query))
										{
											echo "<tr>";
                                            echo "<td class='list_description'>".$campo['login']."</td>";
											echo "<td class='list_description'>".$campo['local']."</td>";
											echo "<td class='list_description'>".$campo['phone']."</td>";
											echo "<td class='list_description'>".$campo['email']."</td>";
											echo "<td class='list_description'>".exibirDataHoraBr($campo['dateCreated'])."</td>";
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
		</div>
	</div>
</section>