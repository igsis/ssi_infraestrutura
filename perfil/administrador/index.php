<?php
$id1 = $_SESSION['idAdm'];
$mes = date('m');

// ===================================================================================================================================
                                                    // STATUS

$aberto = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='1' AND MONTH(startDate) = '$mes' "; // Registro de chamados em abertos

$con = bancoMysqli();
$query1 = mysqli_query($con,$aberto);

$qtde1 = mysqli_num_rows($query1);



$fechado = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='2' AND MONTH(startDate) = '$mes'"; // Registro de chamados fechado

$con = bancoMysqli();
$query2 = mysqli_query($con,$fechado);

$qtde2 = mysqli_num_rows($query2);



$andamento = "SELECT id FROM problems WHERE administrators_id='$id1' AND problem_status_id ='3' AND MONTH(startDate) = '$mes'"; // Registro de chamado em andamento
$con = bancoMysqli();
$query3 = mysqli_query($con,$andamento);

$qtde3 = mysqli_num_rows($query3);

// ===================================================================================================================================
                                                // CATEGORIAS

$hidraulica = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='1' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria1 = mysqli_query($con, $hidraulica);

$tot1 = mysqli_num_rows($categoria1);



$alvenaria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='2' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria2 = mysqli_query($con, $alvenaria);

$tot2 = mysqli_num_rows($categoria2);



$pintura = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='3' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria3 = mysqli_query($con, $pintura);

$tot3 = mysqli_num_rows($categoria3);



$eletrica = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='4' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria4 = mysqli_query($con, $eletrica);

$tot4 = mysqli_num_rows($categoria4);



$serralheria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='5' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria5 = mysqli_query($con, $serralheria);

$tot5 = mysqli_num_rows($categoria5);



$carpintaria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='6' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria6 = mysqli_query($con, $carpintaria);

$tot6 = mysqli_num_rows($categoria6);


$marcenaria = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='7' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria7 = mysqli_query($con, $marcenaria);

$tot7 = mysqli_num_rows($categoria7);


$manutencao = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='8' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria8 = mysqli_query($con, $manutencao);

$tot8 = mysqli_num_rows($categoria8);


$telhado = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='9' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria9 = mysqli_query($con, $telhado);

$tot9 = mysqli_num_rows($categoria9);


$jardinagem = "SELECT id FROM problems WHERE administrators_id='$id1' AND categories_id ='10' AND MONTH(startDate) = '$mes'";
$con = bancoMysqli();
$categoria10 = mysqli_query($con, $jardinagem);

$tot10 = mysqli_num_rows($categoria10);

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


        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
                    <h5>Relatório de <?php echo retornaMes($mes); ?></h5>
                </div>
            </div>
        </div>


        <div class="col-md-offset-2 col-md-8">
            <div class="card border border-secondary">
                <table class="table table-borderless">
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-center" style="color: white">Estatisticas</th>
                        <th scope="col" class="text-center" style="color: white">Total</th>


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
            <div class="card border border-secondary">
                <table class="table table-borderless">
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-center" style="color: white">Estatisticas</th>
                        <th scope="col" class="text-center" style="color: white">Total</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-center">Hidráulica</th>
                        <td class="text-center"><?php echo $tot1; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Alvenaria</th>
                        <td class="text-center"><?php echo $tot2; ?></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Pintura</th>
                        <td class="text-center"><?php echo $tot3; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Elétrica (lâmpada, tomada, etc.)</th>
                        <td class="text-center"><?php echo $tot4; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Serralheria</th>
                        <td class="text-center"><?php echo $tot5; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Carpintaria</th>
                        <td class="text-center"><?php echo $tot6; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Marcenaria</th>
                        <td class="text-center"><?php echo $tot7; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Manutenção de Equipamentos</th>
                        <td class="text-center"><?php echo $tot8; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Telhado</th>
                        <td class="text-center"><?php echo $tot9; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Jardinagem</th>
                        <td class="text-center"><?php echo $tot10; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br><br>

    </div>
    </div>
    </div>
</section>
