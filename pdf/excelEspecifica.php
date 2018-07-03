<?php
//require '../include/';
require_once("../funcoes/funcoesConecta.php");
require_once("../funcoes/funcoesGerais.php");
require_once("../include/phpexcel/Classes/PHPExcel.php");


//CONEXÃO COM BANCO DE DADOS
$con = bancoMysqli();

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
$cacheSettings = array( ' memoryCacheSize ' => '8MB');
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
$objPHPExcel->getProperties()->setCreator("Sistema SSI - Infraestrutura");
$objPHPExcel->getProperties()->setLastModifiedBy("Sistema SSI - Infraestrutura");
$objPHPExcel->getProperties()->setTitle("Relatório de Chamados");
$objPHPExcel->getProperties()->setSubject("Relatório de Chamados");
$objPHPExcel->getProperties()->setDescription("Gerado automaticamente a partir do Sistema SSI - Infraestrutura");
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
$objPHPExcel->getProperties()->setCategory("Relatório de Chamados");

if(isset($_POST['relatorio'])){
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Chamado nº')
    ->setCellValue('B1', 'Usuário')
    ->setCellValue('C1', 'Local')
    ->setCellValue('D1', 'Telefone')
    ->setCellValue('E1', 'Email')
    ->setCellValue('F1', 'Contato')
    ->setCellValue('G1', 'Propriedade')
    ->setCellValue('H1', 'Categoria')
    ->setCellValue('I1', 'Descrição')
    ->setCellValue('J1', 'Solução')
    ->setCellValue('K1', 'Status')
    ->setCellValue('L1', 'Data de Envio');

//Colorir a primeira fila
$objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E0EEEE')
        ),
    )
);

    foreach($_POST['relatorio'] as $id => $relatorio){
//Dados
$sql = "SELECT * FROM problems WHERE id = '$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$i = 2; // para começar a gravar os dados na segunda linha
while($row = mysqli_fetch_array($query)) {


    $sql2= "SELECT * FROM categories WHERE id = " . $row["categories_id"];
    $res2 = mysqli_query($con, $sql2);
    $reg2 = mysqli_fetch_assoc($res2);

    $sql3= "SELECT * FROM priorities WHERE id = " . $row["priorities_id"];
    $res3 = mysqli_query($con, $sql3);
    $reg3 = mysqli_fetch_assoc($res3);

    $sql4= "SELECT * FROM problem_status WHERE id = " . $row["problem_status_id"];
    $res4 = mysqli_query($con, $sql4);
    $reg4 = mysqli_fetch_assoc($res4);

    $sql5= "SELECT * FROM users WHERE id = " . $row["users_id"];
    $res5 = mysqli_query($con, $sql5);
    $reg5 = mysqli_fetch_assoc($res5);


    $id_chamado = $row["id"];
    $id_users = $row['users_id'];
    $local = $row['local'];
    $telefone = $row['phone'];
    $email = $row['email'];
    $contato = $row['contact'];
    $prioriedade = $row['priorities_id'];
    $categoria = $row['categories_id'];
    $descricao = $row["description"];
    $solucao = $row["solution"];
    $status = $row["problem_status_id"];
    $data = date('d/m/Y H:i:s', strtotime($row["startDate"]));

    $a = "A".$i;
    $b = "B".$i;
    $c = "C".$i;
    $d = "D".$i;
    $e = "E".$i;
    $f = "F".$i;
    $g = "G".$i;
    $h = "H".$i;
    $I = "I".$i;
    $j = "J".$i;
    $k = "K".$i;
    $l = "L".$i;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($a, $row['id'])
        ->setCellValue($b, $reg5['login'])
        ->setCellValue($c, $row['local'])
        ->setCellValue($d, $row['phone'])
        ->setCellValue($e, $row['email'])
        ->setCellValue($f, $row['contact'])
        ->setCellValue($g, $reg3['priority'])
        ->setCellValue($h, $reg2['category'])
        ->setCellValue($I, $row['description'])
        ->setCellValue($j, $row['solution'])
        ->setCellValue($k, $reg4['status'])
        ->setCellValue($l, $data);
    $i++;
}}
foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col)
{
    $objPHPExcel->getActiveSheet()
        ->getColumnDimension($col)
        ->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(0);
ob_end_clean();
ob_start();
$nome_arquivo = "Relatorio.xls";
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nome_arquivo.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
}else{
    echo"<script> alert('Nenhum Item Selecionado!');</script>";

}
?>