<?php
$con = bancoMysqli();
$id1 = $_SESSION['idAdm'];

$server = "http://".$_SERVER['SERVER_NAME']."/ssi_infraestrutura"; 
$http = $server."/pdf/";

$link02 = $http."excelEspecifica.php";

?>
<?php

if (isset($_POST['per']) && ($_POST['per'] != '' AND $_POST['per2'])  && ($_POST['per2'] != '')){

    $pesquisar = $_POST['per'];
    $pesquisar2 = $_POST['per2'];

    //Selecionar  os itens da página
    $sqlBusca = "SELECT * FROM problems WHERE administrators_id = '$id1' AND (startDate BETWEEN '$pesquisar  00:00:00.000000' AND '$pesquisar2  23:59:00.000000') ";
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
            <form method="POST" action="<?php echo $link02; ?>">
                        <div class="btn-group mr-2">
                            <button type="submit" class="btn btn-theme btn-md btn-block position-relative" style="border-radius: 30px;">&nbsp; Planilha Específica &nbsp;&nbsp;</button>
                        </div>

                <br><br>

                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="table-responsive list_info">
                            <table class='table table-condensed'>
                                <thead>
                                <tr class='list_menu'>
                                    <td><input type="checkbox" id="checkTodos" name="checkTodos"> <span>Selecionar Todos</span></td>
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
                                ?>
                                <tr>
                                    <?php $id = $x[$h]['id']; ?>
                                    <td class="text-center">
                                        <?php echo "<input type='checkbox' name='relatorio[$id]' value='1'" ?>
                                    </td>
                                    <td class='list_description'><?php echo $x[$h]['id']; ?></td>
                                    <td class='list_description'><?php echo $x[$h]['local']; ?></td>
                                    <td class='list_description'><?php echo $x[$h]['contact']; ?></td>
                                    <td class='list_description'><?php echo $x[$h]['category']; ?></td>
                                    <td class='list_description'><?php echo $x[$h]['description']; ?></td>
                                    <td class='list_description'><?php echo $x[$h]['startDate']; ?></td>
            </form>                 <td class='list_description'><?php echo $x[$h]['status']; ?></td>


                                    <td class='list_description'>
            <?php echo "
            <form method='POST' action='?perfil=administrador&p=detalhes'>
                <input type='hidden' name='idChamado' value='".$x[$h]['id']."' />
                <input type ='submit' class='btn btn-theme btn-block' value='carregar'>
            </form>
            "; ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>






    </div>
    </div>

		</div>

	</div>
</section>


 <!-- Script -->

<script>
    $("#checkTodos__").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $("#checkTodos__").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    var checkTodos = $("#checkTodos");
    checkTodos.click(function () {
        if ( $(this).is(':checked') ){
            $('input:checkbox').prop("checked", true);
        }else{
            $('input:checkbox').prop("checked", false);
        }
    });
</script>