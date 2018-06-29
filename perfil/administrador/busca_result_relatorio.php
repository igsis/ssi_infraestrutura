<?php
$con = bancoMysqli();
$id1 = $_SESSION['idAdm'];



if (isset($_POST['per']) && ($_POST['per'] != '' AND $_POST['per2'])  && ($_POST['per2'] != '')){

    $pesquisar = $_POST['per'];
    $pesquisar2 = $_POST['per2'];

    //Selecionar  os itens da página
    $sqlBusca = "SELECT * FROM problems WHERE administrators_id = '$id1' AND (startDate BETWEEN '$pesquisar' AND '$pesquisar2') ";
    $result = mysqli_query($con , $sqlBusca);

}

$num = mysqli_num_rows($result);
if($num > 0)
{
$i = 0;
while($lista = mysqli_fetch_array($result))
{
$user = recuperaDados("users","id",$lista['users_id']);
$category = recuperaDados("categories","id",$lista['categories_id']);
$status = recuperaDados("problem_status","id",$lista['problem_status_id']);
$x[$i]['id'] = $lista['id'];
$x[$i]['local'] = $user['local'];
$x[$i]['contact'] = $lista['contact'];
$x[$i]['category'] = $category['category'];
$x[$i]['description'] = substr($lista['description'],0,25);
$x[$i]['startDate'] = exibirDataHoraBr($lista['startDate']);
$x[$i]['status'] = $status['status'];
$i++;
}
$x['num'] = $i;

if($x['num'] == 1)
{
$mensagem = "Foi encontrado ".$x['num']." resultado.";
}
else
{
$mensagem = "Foram encontrados ".$x['num']." resultados.";
}
}
else
{
$x['num'] = 0;
$mensagem = "Nenhum resultado foi encontrado.";
}

?>

<section id="list_items" class="home-section bg-white">
	<div class="container"><?php include 'includes/menu.php'; ?>
		<div class="form-group">
			<h4>Busca de Chamados</h4>
			<h5><?php if(isset($mensagem)){echo $mensagem;}; ?></h5>
			<h5><a href="?perfil=administrador&p=index">Fazer outra busca</a></h5>
            <form method="POST" action="?perfil=administrador&p=excelEspecifica">
                        <div class="btn-group mr-2">
                            <button type="submit" class="btn btn-theme btn-block btn-sm position-relative" data-dismiss="modal">Gerar Planilha  </button>
                        </div>
                    </div>
                </div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="table-responsive list_info">
					<table class='table table-condensed'>
						<thead>
							<tr class='list_menu'>
                                <td></td>
								<td>Chamado nº</td>
								<td>Local</td>
								<td>Contato</td>
								<td>Categoria</td>
								<td>Descrição</td>
								<td>Data Abertura</td>
								<td>Status</td>
								<td width="10%"></td>
							</tr>
						</thead>
						<tbody>
							<?php
							for($h = 0; $h < $x['num']; $h++)
							{
								echo "<tr>";
								$id = $x[$h]["id"];
                                echo "<td class='list_description'>";
                                echo "<input type='checkbox' name='relatorio[$id]' value='1'>";
                                echo "</td>";
								echo "<td class='list_description'>".$x[$h]['id']."</td>";
								echo "<td class='list_description'>".$x[$h]['local']."</td>";
								echo "<td class='list_description'>".$x[$h]['contact']."</td>";
								echo "<td class='list_description'>".$x[$h]['category']."</td>";
								echo "<td class='list_description'>".$x[$h]['description']."...</td>";
								echo "<td class='list_description'>".$x[$h]['startDate']."</td>";
								echo "<td class='list_description'>".$x[$h]['status']."</td>";
								echo "<td class='list_description'>
								</form>		
								<form method='POST' action='?perfil=administrador&p=detalhes'>
											<input type='hidden' name='idChamado' value='".$x[$h]['id']."' />
											<input type ='submit' class='btn btn-theme btn-block' value='carregar'>
										</form>
									</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</section>
