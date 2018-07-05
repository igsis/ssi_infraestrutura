<?php
//require '../include/';
require_once("../funcoes/funcoesConecta.php");
require_once("../include/phpexcel/Classes/PHPExcel.php");

//CONEXÃO COM BANCO DE DADOS
$con = bancoMysqli();

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

if(isset($_POST['relatorio'])){
    // Definimos o nome do arquivo que será exportado
    $arquivo = 'Relatorio.xls';
    // Criamos uma tabela HTML com o formato da planilha
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
    );$i = 2;
    foreach($_POST['relatorio'] as $id => $msg_contato){
        //echo "ID do item: $id <br>";
        //Selecionar todos os itens da tabela
        $result = "SELECT * FROM problems WHERE id = $id LIMIT 1";
        $resultado = mysqli_query($con , $result);

        while($row = mysqli_fetch_assoc($resultado)){
            $sql= "SELECT * FROM administrators WHERE id = " . $row["administrators_id"];
            $res = mysqli_query($con, $sql);
            $reg = mysqli_fetch_assoc($res);
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

    foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col)
    {
        $objPHPExcel->getActiveSheet()
            ->getColumnDimension($col)
            ->setAutoSize(true);
    }
    $objPHPExcel->setActiveSheetIndex(0);
        }}


    ob_end_clean();
    ob_start();

    // Configurações header para forçar o download
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    // Envia o conteúdo do arquivo
    echo $html;
    exit;
}else{
    echo "Nenhum item selecionado";
}
?>