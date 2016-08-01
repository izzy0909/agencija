<?php

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';

$stanovi = prikaziStanoveXML();

$x = '<?xml version="1.0" encoding="UTF-8"?>';
$x .= '<Nekretnine>';

foreach($stanovi as $stan){
	$x .= '<Nekretnina>';
	$x .= '<AuxID>' . $stan['0'] . '</AuxID>';
	$x .= '<VrstaNekretnine>' . $stan['tip'] . '</VrstaNekretnine>';
	$x .= '<TipOglasa>' . $stan['kategorija'] . '</TipOglasa>';
	$x .= '<Status>Aktivan</Status>';
	$x .= '<Valuta>EUR</Valuta>';
	$x .= '<Cena>' . $stan['cena'] . '</Cena>';
	$x .= '<Slike>';

	$slike = prikaziSlike($stan['0'], 'velika');
	foreach($slike as $slika){
		$x .= '<Slika>http://jevticnekretnine.rs/admin/slike/watermark_' . $slika['naziv'] . '</Slika>';
	}

	$x .= '</Slike>';
	$x .= '<Grad>Beograd</Grad>';
	$x .= '<PoštanskiBroj>11000</PoštanskiBroj>';
	$x .= '<DeoGrada>' . $stan['podlokacija'] . '</DeoGrada>';
	$x .= '<Država>Srbija</Država>';

	$x .= '<Brojsoba>';
	switch($stan['stan_tip']){
		case 'Garsonjera': $x .= '1'; break;
		case 'Jednosoban': $x .= '1'; break;
		case 'Jednoiposoban': $x .= '1,5'; break;
		case 'Dvosoban': $x .= '2'; break;
		case 'Dvoiposoban': $x .= '2,5'; break;
		case 'Trosoban': $x .= '3'; break;
		case 'Troiposoban': $x .= '3,5'; break;
		case 'Četvorosoban': $x .= '4'; break;
		case 'Četvoroiposoban': $x .= '4,5'; break;
		case 'Petosoban i veći': $x .= '5'; break;
		default: break;
	}
	$x .= '</Brojsoba>';

	$x .= '<Ukupnapovršina>' . $stan['kvadratura'] . '</Ukupnapovršina>';
	$x .= '<Opis><![CDATA[' . $stan['opis'] . ']]></Opis>';
	$x .= '<Nameštenost>' . $stan['namestenost'] . '</Nameštenost>';
	$x .= '</Nekretnina>';
}

$x .= '</Nekretnine>';

// echo $x;

file_put_contents("jevticnekretnine.xml", $x);
