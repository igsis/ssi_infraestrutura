<?php
$id1 = $_SESSION['idAdm'];
$mes = date('m');

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

    </div>
    </div>
    </div>
</section>
