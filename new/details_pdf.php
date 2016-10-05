<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
include_once '../library/tcpdf/tcpdf.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stan = prikaziStanZaFront($id);
    if(!$stan){
        header('Location: index.php');
    }
    $tagovi = ispisiDodatneTagove($id);
    $slike = prikaziSlike($id, 'velika');
} else{
    header('Location: index.php');
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 009');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetHeaderData('../../../../images/logo2.png', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);


$pdf->AddPage();

$pdf->Output('example_009.pdf', 'I');