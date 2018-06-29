<?php
$id1 = $_SESSION['idAdm'];
$mes = date('m');
$con = bancoMysqli();
                                                    // STATUS

$aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND MONTH(startDate) = '$mes' "; // Registro de chamados em abertos
$query1 = mysqli_query($con,$aberto);
$qtde1 = mysqli_num_rows($query1);



$fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND MONTH(startDate) = '$mes'"; // Registro de chamados fechado

$query2 = mysqli_query($con,$fechado);
$qtde2 = mysqli_num_rows($query2);



$andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND MONTH(startDate) = '$mes'"; // Registro de chamado em andamento
$query3 = mysqli_query($con,$andamento);

$qtde3 = mysqli_num_rows($query3);



                                                        // CATEGORIAS

$hidraulica = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='1' AND MONTH(startDate) = '$mes'";
$categoria1 = mysqli_query($con, $hidraulica);

$tot1 = mysqli_num_rows($categoria1);

$hidraulica_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='1' AND MONTH(startDate) = '$mes'";
$categoria1_Aberto = mysqli_query($con, $hidraulica_Aberto);

$tot1_Aberto = mysqli_num_rows($categoria1_Aberto);

$hidraulica_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='1' AND MONTH(startDate) = '$mes'";
$categoria1_Fechado = mysqli_query($con, $hidraulica_Fechado);

$tot1_Fechado = mysqli_num_rows($categoria1_Fechado);

$hidraulica_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='1' AND MONTH(startDate) = '$mes'";
$categoria1_Andamento = mysqli_query($con, $hidraulica_Andamento);

$tot1_Andamento = mysqli_num_rows($categoria1_Andamento);

// ===================================================================================================================================

$alvenaria = "SELECT * FROM problems WHERE administrators_id='$id1' AND categories_id ='2' AND MONTH(startDate) = '$mes'";
$categoria2 = mysqli_query($con, $alvenaria);

$tot2 = mysqli_num_rows($categoria2);

$alvenaria_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='2' AND MONTH(startDate) = '$mes'";
$categoria2_Aberto = mysqli_query($con, $alvenaria_Aberto);

$tot2_Aberto = mysqli_num_rows($categoria2_Aberto);

$alvenaria_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='2' AND MONTH(startDate) = '$mes'";
$categoria2_Fechado = mysqli_query($con, $alvenaria_Fechado);

$tot2_Fechado = mysqli_num_rows($categoria2_Fechado);

$alvenaria_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='2' AND MONTH(startDate) = '$mes'";
$categoria2_Andamento = mysqli_query($con, $alvenaria_Andamento);

$tot2_Andamento = mysqli_num_rows($categoria2_Andamento);

// ===================================================================================================================================

$pintura = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='3' AND MONTH(startDate) = '$mes'";
$categoria3 = mysqli_query($con, $pintura);

$tot3 = mysqli_num_rows($categoria3);

$pintura_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='3' AND MONTH(startDate) = '$mes'";
$categoria3_Aberto = mysqli_query($con, $pintura_Aberto);

$tot3_Aberto = mysqli_num_rows($categoria3_Aberto);

$pintura_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='3' AND MONTH(startDate) = '$mes'";
$categoria3_Fechado = mysqli_query($con, $pintura_Fechado);

$tot3_Fechado = mysqli_num_rows($categoria3_Fechado);

$pintura_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='3' AND MONTH(startDate) = '$mes'";
$categoria3_Andamento = mysqli_query($con, $pintura_Andamento);

$tot3_Andamento = mysqli_num_rows($categoria3_Andamento);

// ===================================================================================================================================

$eletrica = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='4' AND MONTH(startDate) = '$mes'";
$categoria4 = mysqli_query($con, $eletrica);

$tot4 = mysqli_num_rows($categoria4);

$eletrica_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='4' AND MONTH(startDate) = '$mes'";
$categoria4_Aberto = mysqli_query($con, $eletrica_Aberto);

$tot4_Aberto = mysqli_num_rows($categoria4_Aberto);

$eletrica_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='4' AND MONTH(startDate) = '$mes'";
$categoria4_Fechado = mysqli_query($con, $eletrica_Fechado);

$tot4_Fechado = mysqli_num_rows($categoria4_Fechado);

$eletrica_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='4' AND MONTH(startDate) = '$mes'";
$categoria4_Andamento = mysqli_query($con, $eletrica_Andamento);

$tot4_Andamento = mysqli_num_rows($categoria4_Andamento);

// ===================================================================================================================================

$serralheria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='5' AND MONTH(startDate) = '$mes'";
$categoria5 = mysqli_query($con, $serralheria);

$tot5 = mysqli_num_rows($categoria5);

$serralheria_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='5' AND MONTH(startDate) = '$mes'";
$categoria5_Aberto = mysqli_query($con, $serralheria_Aberto);

$tot5_Aberto = mysqli_num_rows($categoria5_Aberto);

$serralheria_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='5' AND MONTH(startDate) = '$mes'";
$categoria5_Fechado = mysqli_query($con, $serralheria_Fechado);

$tot5_Fechado = mysqli_num_rows($categoria5_Fechado);

$serralheria_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='5' AND MONTH(startDate) = '$mes'";
$categoria5_Andamento = mysqli_query($con, $serralheria_Andamento);

$tot5_Andamento = mysqli_num_rows($categoria5_Andamento);

// ===================================================================================================================================

$carpintaria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='6' AND MONTH(startDate) = '$mes'";
$categoria6 = mysqli_query($con, $carpintaria);

$tot6 = mysqli_num_rows($categoria6);

$carpintaria_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='6' AND MONTH(startDate) = '$mes'";
$categoria6_Aberto = mysqli_query($con, $carpintaria_Aberto);

$tot6_Aberto = mysqli_num_rows($categoria6_Aberto);

$carpintaria_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='6' AND MONTH(startDate) = '$mes'";
$categoria6_Fechado = mysqli_query($con, $carpintaria_Fechado);

$tot6_Fechado = mysqli_num_rows($categoria6_Fechado);

$carpintaria_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='6' AND MONTH(startDate) = '$mes'";
$categoria6_Andamento = mysqli_query($con, $carpintaria_Andamento);

$tot6_Andamento = mysqli_num_rows($categoria6_Andamento);

// ===================================================================================================================================

$marcenaria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='7' AND MONTH(startDate) = '$mes'";
$categoria7 = mysqli_query($con, $marcenaria);

$tot7 = mysqli_num_rows($categoria7);

$marcenaria_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='7' AND MONTH(startDate) = '$mes'";
$categoria7_Aberto = mysqli_query($con, $marcenaria_Aberto);

$tot7_Aberto = mysqli_num_rows($categoria7_Aberto);

$marcenaria_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='7' AND MONTH(startDate) = '$mes'";
$categoria7_Fechado = mysqli_query($con, $marcenaria_Fechado);

$tot7_Fechado = mysqli_num_rows($categoria7_Fechado);

$marcenaria_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='7' AND MONTH(startDate) = '$mes'";
$categoria7_Andamento = mysqli_query($con, $marcenaria_Andamento);

$tot7_Andamento = mysqli_num_rows($categoria7_Andamento);

// ===================================================================================================================================

$manutencao = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='8' AND MONTH(startDate) = '$mes'";
$categoria8 = mysqli_query($con, $manutencao);

$tot8 = mysqli_num_rows($categoria8);

$manutencao_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='8' AND MONTH(startDate) = '$mes'";
$categoria8_Aberto = mysqli_query($con, $manutencao_Aberto);

$tot8_Aberto = mysqli_num_rows($categoria8_Aberto);

$manutencao_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='8' AND MONTH(startDate) = '$mes'";
$categoria8_Fechado = mysqli_query($con, $manutencao_Fechado);

$tot8_Fechado = mysqli_num_rows($categoria8_Fechado);

$manutencao_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='8' AND MONTH(startDate) = '$mes'";
$categoria8_Andamento = mysqli_query($con, $manutencao_Andamento);

$tot8_Andamento = mysqli_num_rows($categoria8_Andamento);

// ===================================================================================================================================

$telhado = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='9' AND MONTH(startDate) = '$mes'";
$categoria9 = mysqli_query($con, $telhado);

$tot9 = mysqli_num_rows($categoria9);

$telhado_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='9' AND MONTH(startDate) = '$mes'";
$categoria9_Aberto = mysqli_query($con, $telhado_Aberto);

$tot9_Aberto = mysqli_num_rows($categoria9_Aberto);

$telhado_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='9' AND MONTH(startDate) = '$mes'";
$categoria9_Fechado = mysqli_query($con, $telhado_Fechado);

$tot9_Fechado = mysqli_num_rows($categoria9_Fechado);

$telhado_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='9' AND MONTH(startDate) = '$mes'";
$categoria9_Andamento = mysqli_query($con, $telhado_Andamento);

$tot9_Andamento = mysqli_num_rows($categoria9_Andamento);

// ===================================================================================================================================

$jardinagem = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='10' AND MONTH(startDate) = '$mes'";
$categoria10 = mysqli_query($con, $jardinagem);

$tot10 = mysqli_num_rows($categoria10);

$jardinagem_Aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND categories_id ='10' AND MONTH(startDate) = '$mes'";
$categoria10_Aberto = mysqli_query($con, $jardinagem_Aberto);

$tot10_Aberto = mysqli_num_rows($categoria10_Aberto);

$jardinagem_Fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND categories_id ='10' AND MONTH(startDate) = '$mes'";
$categoria10_Fechado = mysqli_query($con, $jardinagem_Fechado);

$tot10_Fechado = mysqli_num_rows($categoria10_Fechado);

$jardinagem_Andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND categories_id ='10' AND MONTH(startDate) = '$mes'";
$categoria10_Andamento = mysqli_query($con, $jardinagem_Andamento);

$tot10_Andamento = mysqli_num_rows($categoria10_Andamento);

?>
<section id="list_items" class="home-section bg-white">
    <div class="container"><?php include 'includes/menu.php';?>
        <p align="left"><strong><?php echo saudacao(); ?>, <?php echo $_SESSION['nome']; ?>!</strong></p>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
                    <h2>Módulo Administrador</h2>
                </div>
            </div>
        </div>

        <hr>

        <form class="form-inline" action="?perfil=administrador&p=busca_result_relatorio" method="post">
            <div class="form-group">
                <label>Período</label>
                <input name="per" type="date" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <input name="per2" type="date" class="form-control" placeholder="">
            </div>
            <button type="submit" class="btn btn-theme btn-sm">Buscar</button>
        </form>

        <hr>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
                    <h5>Relatório de <?php echo retornaMes($mes); ?></h5>
                </div>
            </div>
        </div>


        <div class="col-md-offset-2 col-md-8">
            <div class="table-responsive list_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="list_menu">
                        <td scope="col" class="text-center" style="color: white">Estatisticas</td>
                        <td scope="col" class="text-center" style="color: white">Total</td>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-center">Abertos</th>
                        <td class="text-center"><?php echo $qtde1; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Em Andamento</th>
                        <td class="text-center"><?php echo $qtde3; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Fechado</th>
                        <td class="text-center"><?php echo $qtde2; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br><br>


        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
                    <h5>Categorias</h5>
                </div>
            </div>
        </div>


        <div class="col-md-offset-2 col-md-8">
            <div class="table-responsive list_info">
                <table class="table table-condensed">
                    <thead class="list_menu">
                    <tr>
                        <td scope="col" class="text-center" style="color: white">Estatisticas</td>
                        <td scope="col" class="text-center" style="color: white">Abertos</td>
                        <td scope="col" class="text-center" style="color: white">Fechados</td>
                        <td scope="col" class="text-center" style="color: white">Em Andamento</td>
                        <td scope="col" class="text-center" style="color: white">Total</td>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-center">Hidráulica</th>
                        <td class="text-center"><?php echo $tot1_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot1_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot1_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot1; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Alvenaria</th>
                        <td class="text-center"><?php echo $tot2_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot2_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot2_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot2; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Pintura</th>
                        <td class="text-center"><?php echo $tot3_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot3_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot3_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot3; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Elétrica (lâmpada, tomada, etc.)</th>
                        <td class="text-center"><?php echo $tot4_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot4_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot4_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot4; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Serralheria</th>
                        <td class="text-center"><?php echo $tot5_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot5_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot5_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot5; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Carpintaria</th>
                        <td class="text-center"><?php echo $tot6_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot6_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot6_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot6; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Marcenaria</th>
                        <td class="text-center"><?php echo $tot7_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot7_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot7_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot7; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Manutenção de Equipamentos</th>
                        <td class="text-center"><?php echo $tot8_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot8_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot8_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot8; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Telhado</th>
                        <td class="text-center"><?php echo $tot9_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot9_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot9_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot9; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Jardinagem</th>
                        <td class="text-center"><?php echo $tot10_Aberto; ?></td>
                        <td class="text-center"><?php echo $tot10_Fechado; ?></td>
                        <td class="text-center"><?php echo $tot10_Andamento; ?></td>
                        <td class="text-center"><?php echo $tot10; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br><br><br>

    </div>
    </div>
    </div>
</section>
