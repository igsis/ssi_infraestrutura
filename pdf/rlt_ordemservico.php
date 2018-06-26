<?php

// INSTALAÇÃO DA CLASSE NA PASTA FPDF.
require_once("../include/lib/fpdf/fpdf.php");
require_once("../funcoes/funcoesConecta.php");
require_once("../funcoes/funcoesGerais.php");

//CONEXÃO COM BANCO DE DADOS
$conexao = bancoMysqli();

session_start();

class PDF extends FPDF
{

 // Page header
function Header()
{
   // Move to the right
   $this->Cell(80);
   $this->Image('../visual/images/logo_smc.jpg',170,6);
   // Line break
   $this->Ln(20);
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Simple table
function Cabecalho($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data

}

// Simple table
function Tabela($header, $data)
{
    //Data
    foreach($data as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data

}

}

//CONSULTA
$idAdm = $_SESSION['idAdm'];
$idChamado = $_POST['idChamado'];

$chamado = recuperaDados("problems","id",$idChamado);
$category = recuperaDados("categories","id",$chamado['categories_id']);
$administrator = recuperaDados("administrators","id",$chamado['administrators_id']);
$status = recuperaDados("problem_status","id",$chamado['problem_status_id']);
$nota = recuperaDados("notes","problems_id",$idChamado);
$tool = recuperaDados("employees_problems","problems_id",$idChamado);
$user = recuperaDados("users","id",$chamado['users_id']);
$funcionario = recuperaDados("employees","id",$tool['employee_id']);

//chamado
$numero = $chamado["id"];
$dataCriacao = exibirDataHoraBr($chamado['startDate']);
$servico = $category['category'];
$descricao = $chamado['description'];
$ferramentas = $tool['toolMaterial'];
$atendente = $funcionario['name'];
$funcaoAtendente = $funcionario['role'];


//local-user
$local = $user["local"];
$endereco = $user["address"];
$telefone = $user["phone"];


$ano=date('Y');


// GERANDO O PDF:
$pdf = new PDF('P','mm','A4'); //CRIA UM NOVO ARQUIVO PDF NO TAMANHO A4
$pdf->AliasNbPages();
$pdf->AddPage();

$x=10;
$l=5; //DEFINE A ALTURA DA LINHA   

  $pdf->SetXY( $x , 10 );// SetXY - DEFINE O X (largura) E O Y (altura) NA PÃGINA
   
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,$l,utf8_decode('PREFEITURA DO MUNICÍPIO DE SÃO PAULO'),0,1,'C');
 
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,$l,utf8_decode('SECRETARIA MUNICIPAL DE CULTURA'),0,1,'C');
  
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,5,utf8_decode("ORDEM DE SERVIÇO"),0,1,'C');

   $pdf->Ln();
     
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(15,$l,utf8_decode('Número:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(20,$l,utf8_decode("$numero-$ano"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(10,$l,utf8_decode('Data:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(5,$l,utf8_decode($dataCriacao),0,0,'L');

   $pdf->Ln();
   
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(28,$l,utf8_decode('Solicitação do:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(50,$l,utf8_decode($local),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(18,$l,utf8_decode('Endereço:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(40,$l,utf8_decode($endereco),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(17,$l,utf8_decode('Telefone:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(45,$l,utf8_decode($telefone),0,1,'L');

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(28,$l,utf8_decode('Tipo de Serviço:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(60,$l,utf8_decode($servico),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(22,$l,utf8_decode('Funcionário:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("$atendente-$funcaoAtendente"),0,1,'L');

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(40,5,utf8_decode('Visto:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode(""));

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(40,5,utf8_decode('Ferramentas/Materiais:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode($ferramentas));

   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(41,5,utf8_decode('Descrição dos serviços:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode($descricao));

   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();


   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(36,$l,utf8_decode('Horário de chegada:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("___:___"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(30,$l,utf8_decode('Horário de saída:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("___:___"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(50,$l,utf8_decode('Nome e carimbo do servidor:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("____________________"),0,0,'L');

   $pdf->Ln();

   $pdf->SetX($x);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(25,$l,utf8_decode('_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _'),0,0,'L');

   $pdf->SetXY( $x , 155 );// SetXY - DEFINE O X (largura) E O Y (altura) NA PÁGINA

   $pdf->Image('../visual/images/logo_smc.jpg',170,152);
   
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,$l,utf8_decode('PREFEITURA DO MUNICÍPIO DE SÃO PAULO'),0,1,'C');
 
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,$l,utf8_decode('SECRETARIA MUNICIPAL DE CULTURA'),0,1,'C');
    
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(180,5,utf8_decode("ORDEM DE SERVIÇO"),0,1,'C');

   $pdf->Ln();
   
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(15,$l,utf8_decode('Número:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(20,$l,utf8_decode("$numero-$ano"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(10,$l,utf8_decode('Data:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(5,$l,utf8_decode($dataCriacao),0,0,'L');

   $pdf->Ln();
   
   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(28,$l,utf8_decode('Solicitação do:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(50,$l,utf8_decode($local),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(18,$l,utf8_decode('Endereço:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(40,$l,utf8_decode($endereco),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(17,$l,utf8_decode('Telefone:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(45,$l,utf8_decode($telefone),0,1,'L');

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(28,$l,utf8_decode('Tipo de Serviço:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(60,$l,utf8_decode($servico),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(22,$l,utf8_decode('Funcionário:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("$atendente-$funcaoAtendente"),0,1,'L');

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(40,5,utf8_decode('Visto:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode(""));

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(40,5,utf8_decode('Ferramentas/Materiais:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode($ferramentas));

   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();


   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(41,5,utf8_decode('Descrição dos serviços:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->MultiCell(140,5,utf8_decode($descricao));

   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Ln();

   $pdf->SetX($x);
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(36,$l,utf8_decode('Horário de chegada:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("___:___"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(30,$l,utf8_decode('Horário de saída:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("___:___"),0,0,'L');
   $pdf->SetFont('Arial','B', 10);
   $pdf->Cell(50,$l,utf8_decode('Nome e carimbo do servidor:'),0,0,'L');
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(15,$l,utf8_decode("____________________"),0,0,'L');

$pdf->Output();


?>