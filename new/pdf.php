<?php

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
include_once 'php/tfpdf.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stan = prikaziStanZaFront($id);
    if(!$stan){
        header('Location: index.php');
      // die('aaa');

    }
    $tagovi = ispisiDodatneTagove($id);
}
else{
  // die('bbb');
    header('Location: index.php');
}


class PDF extends tFPDF
{

protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';


function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}


// Page header
function Header()
{
    $id = $_GET['id'];
    $stan = prikaziStanZaFront($id);
    // Logo
    $this->Image('assets/img/logo3.png',10,6,40,0,'','http://www.jevticnekretnine.rs');
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    // Move to the right
    $this->Cell(150);
    $this->Cell(0,0,'060/4480659 * 011/4054325');
   	$this->Ln(5);
   	$this->Cell(150);
    $this->Cell(0,0,'info@jevticnekretnine.rs');
    $this->Ln(15);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);

    $this->Line(11,280,198,280);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $html = '<a href="http://www.jevticnekretnine.rs" target="_blank">www.jevticnekretnine.rs</a>';
    $this->Cell(80);
    $this->WriteHTML($html);
    // $this->Cell(0,10,'www.jevticnekretnine.rs',0,0,'C');
}
}

function cellpos($i){
	if($i==1){
		return 50;
	}
	elseif($i==50){
		return 100;
	}
	elseif($i==100){
		return 1;
	}
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->AddFont('FreeSerif','','FreeSerif.ttf',true);
$pdf->AddFont('FreeSerif','B','FreeSerifBold.ttf',true);

$pdf->SetFont('Arial','B',64);
// id
$pdf->Ln(7);
$pdf->Cell(140);
$pdf->Cell(30,10,'#' . $stan[0],0,0,'C');

// Title
$pdf->Ln(20);
$pdf->SetFont('FreeSerif', '', 20);
$pdf->Cell(10,5,$stan['cena'].'€',0,1);
$pdf->SetFont('FreeSerif', '', 16);
$pdf->Cell(30,10,$stan['kategorija'] . ' / ' . $stan['tip'] . ' / ' . $stan['opstina'],0,1	);

//linija
$pdf->Line(11,76,198,76);

$pdf->Ln(20);

$pdf->SetFont('Times','IU',12);
$pdf->Cell(0,5,'Osnovne informacije:',0,1);
$pdf->Ln(6);


// Prvi blok
$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(13,6,'Vrsta:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['tip'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(20,6,'Struktura:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['stan_tip'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(26,6,'Nameštenost:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['namestenost'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(18,6,'Grejanje:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['grejanje'],0,1);

$pdf->Ln(5);


//Drugi blok
$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(19,6,'Lokacija:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['opstina'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(13,6,'Ulica:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['ulica'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(13,6,'Sprat:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['sprat'],0,1);

$pdf->SetFont('FreeSerif','',13);
$pdf->Cell(23,6,'Kvadratura:');
$pdf->SetFont('FreeSerif','B',13);
$pdf->Cell(0,6,$stan['kvadratura'] . 'm²',0,1);

$pdf->SetFont('FreeSerif','',12);

$pdf->Ln(15);


//slika
$thumb = prikaziSlikuThumb($stan[0]);
$pdf->Image('../admin/slike/watermark_' . $thumb['naziv'],120,95,70);


//opis
$pdf->MultiCell(0,5,$stan['opis'],0,'L');
$pdf->Ln(20);


//tagovi
$pdf->SetFont('Times','IU',12);
$pdf->Cell(0,5,'Dodatne pogodnosti:',0,1);
$pdf->Ln(6);
$pdf->SetFont('FreeSerif','',13);

$tagArray = [];

if($tagovi['kablovska']){ array_push($tagArray, '- Kablovska');}
if($tagovi['tv']){ array_push($tagArray, '- TV');}
if($tagovi['klima']){ array_push($tagArray, '- Klima');}
if($tagovi['internet']){ array_push($tagArray, '- Internet');}
if($tagovi['telefon']){ array_push($tagArray, '- Telefon');}
if($tagovi['frizider']){ array_push($tagArray, '- Frizider');}
if($tagovi['sporet']){ array_push($tagArray, '- Sporet');}
if($tagovi['ves_masina']){ array_push($tagArray, '- Veš mašina');}
if($tagovi['kuhinjski_elementi']){ array_push($tagArray, '- Kuhinjski elementi');}
if($tagovi['plakari']){ array_push($tagArray, '- Plakari');}
if($tagovi['interfon']){ array_push($tagArray, '- Interfon');}
if($tagovi['lift']){ array_push($tagArray, '- Lift');}
if($tagovi['bazen']){ array_push($tagArray, '- Bazen');}
if($tagovi['garaza']){ array_push($tagArray, '- Garaža');}
if($tagovi['parking']){ array_push($tagArray, '- Parking');}
if($tagovi['dvoriste']){ array_push($tagArray, '- Dvorište');}
if($tagovi['potkrovlje']){ array_push($tagArray, '- Potkrovlje');}
if($tagovi['terasa']){ array_push($tagArray, '- Terasa');}
if($tagovi['novogradnja']){ array_push($tagArray, '- Novogradnja');}
if($tagovi['renovirano']){ array_push($tagArray, '- Renovirano');}
if($tagovi['lux']){ array_push($tagArray, '- Lux');}
if($tagovi['penthaus']){ array_push($tagArray, '- Penthaus');}
if($tagovi['salonski']){ array_push($tagArray, '- Salonski');}
if($tagovi['lodja']){ array_push($tagArray, '- Lodja');}
if($tagovi['duplex']){ array_push($tagArray, '- Duplex');}
if($tagovi['nov_namestaj']){ array_push($tagArray, '- Nov nameštaj');}
if($tagovi['kompjuterska_mreza']){ array_push($tagArray, '- Kompjuterska mreža');}
if($tagovi['dva_kupatila']){ array_push($tagArray, '- Dva kupatila');}
if($tagovi['vise_telefonskih_linija']){ array_push($tagArray, '- Više tel. linija');}
if($tagovi['stan_u_kuci']){ array_push($tagArray, '- Stan u kući');}
if($tagovi['samostojeca_kuca']){ array_push($tagArray, '- Samostojeća kuća');}
if($tagovi['kuca_s_dvoristem']){ array_push($tagArray, '- Kuća s dvorištem');}
if($tagovi['kucni_ljubimci']){ array_push($tagArray, '- Kućni ljubimci');}
if($tagovi['video_nadzor']){ array_push($tagArray, '- Video nadzor');}
if($tagovi['alarm']){ array_push($tagArray, '- Alarm');}
if($tagovi['basta']){ array_push($tagArray, '- Bašta');}
if($tagovi['pomocni_objekti']){ array_push($tagArray, '- Pomoćni objekti');}
if($tagovi['ostava']){ array_push($tagArray, '- Ostava');}
if($tagovi['podrum']){ array_push($tagArray, '- Podrum');}
if($tagovi['opticki_kabl']){ array_push($tagArray, '- Optički kabl');}
if($tagovi['open_space']){ array_push($tagArray, '- Open space');}
if($tagovi['pristup_za_invalide']){ array_push($tagArray, '- Pristup za invalide');}
if($tagovi['lokal_na_ulici']){ array_push($tagArray, '- Lokal na ulici');}
if($tagovi['pravno_lice']){ array_push($tagArray, '- Pravno lice');}


$y = 1;

foreach ($tagArray as $tag){
	$pdf->Cell(50,5, $tag);
	$y++;
	if($y==4){
		$pdf->Ln(5);
		$y=1;
	}
}

// $pdf->MultiCell(20,5,$tagString);

$pdf->Output();


?>