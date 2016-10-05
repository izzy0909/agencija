<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/slikeDA.php';
include_once 'upload.php';
	
	
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $kategorija = isset($_POST['kategorija']) ? $_POST['kategorija'] : null;
    $tip = isset($_POST['tip']) ? $_POST['tip'] : null;
    $stan_tip = isset($_POST['stan_tip']) ? $_POST['stan_tip'] : null;
    $ulica = isset($_POST['ulica']) ? $_POST['ulica'] : null;
    $br = isset($_POST['br']) ? $_POST['br'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $podlokacija = isset($_POST['podlokacija']) ? $_POST['podlokacija'] : null;
    $opis_lokacije = isset($_POST['opis_lokacije']) ? $_POST['opis_lokacije'] : null;
    $grejanje = isset($_POST['grejanje']) ? $_POST['grejanje'] : null;
    $namestenost = isset($_POST['namestenost']) ? $_POST['namestenost'] : null;
    $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
    $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
    $opis = isset($_POST['opis']) ? $_POST['opis'] : null;
    $dodatna_informacija = isset($_POST['dodatna_informacija']) ? $_POST['dodatna_informacija'] : null;
    $izdat = isset($_POST['izdat']) ? $_POST['izdat'] : null;
    $provizija = isset($_POST['provizija']) ? $_POST['provizija'] : null;
    if(!empty($_POST['vidljiv_do'])){
        $timestamp = DateTime::createFromFormat('d-m-Y', $_POST['vidljiv_do']);
        $vidljiv_do = $timestamp->format('Y-m-d');
    }
    else $vidljiv_do = null;
    
//DateTime::createFromFormat('d-m-Y', $_POST['vidljiv_do'])

    $kablovska = isset($_POST['kablovska']) ? '1' : '0';
    $tv = isset($_POST['tv']) ? '1' : '0';
    $klima = isset($_POST['klima']) ? '1' : '0';
    $internet = isset($_POST['internet']) ? '1' : '0';
    $ima_telefon = isset($_POST['ima_telefon']) ? '1' : '0';
    $frizider = isset($_POST['frizider']) ? '1' : '0';
    $sporet = isset($_POST['sporet']) ? '1' : '0';
    $vesmasina = isset($_POST['ves_masina']) ? '1' : '0';
    $kuhinjskielementi = isset($_POST['kuhinjski_elementi']) ? '1' : '0';
    $plakari = isset($_POST['plakari']) ? '1' : '0';
    $interfon = isset($_POST['interfon']) ? '1' : '0';
    $lift = isset($_POST['lift']) ? '1' : '0';
    $bazen = isset($_POST['bazen']) ? '1' : '0';
    $garaza = isset($_POST['garaza']) ? '1' : '0';
    $parking = isset($_POST['parking']) ? '1' : '0';
    $dvoriste = isset($_POST['dvoriste']) ? '1' : '0';
    $potkrovlje = isset($_POST['potkrovlje']) ? '1' : '0';
    $terasa = isset($_POST['terasa']) ? '1' : '0';
    $novogradnja = isset($_POST['novogradnja']) ? '1' : '0';
    $renovirano = isset($_POST['renovirano']) ? '1' : '0';
    $lux = isset($_POST['lux']) ? '1' : '0';
    $penthaus = isset($_POST['penthaus']) ? '1' : '0';
    $salonski = isset($_POST['salonski']) ? '1' : '0';
    $lodja = isset($_POST['lodja']) ? '1' : '0';
    $duplex = isset($_POST['duplex']) ? '1' : '0';
    $nov_namestaj = isset($_POST['nov_namestaj']) ? '1' : '0';
    $kompjuterska_mreza = isset($_POST['kompjuterska_mreza']) ? '1' : '0';
    $dva_kupatila = isset($_POST['dva_kupatila']) ? '1' : '0';
    $vise_telefonskih_linija = isset($_POST['vise_telefonskih_linija']) ? '1' : '0';
    $stan_u_kuci = isset($_POST['stan_u_kuci']) ? '1' : '0';
    $samostojeca_kuca = isset($_REQUEST['samostojeca_kuca']) ? '1' : '0';
    $kuca_s_dvoristem = isset($_REQUEST['kuca_s_dvoristem']) ? '1' : '0';
    $kucni_ljubimci = isset($_REQUEST['kucni_ljubimci']) ? '1' : '0';
    $balkon = isset($_REQUEST['balkon']) ? '1' : '0';
    $video_nadzor = isset($_REQUEST['alarm']) ? '1' : '0';
    $alarm = isset($_REQUEST['alarm']) ? '1' : '0';
    $basta = isset($_REQUEST['basta']) ? '1' : '0';
    $pomocni_objekti = isset($_REQUEST['pomocni_objekti']) ? '1' : '0';
    $ostava = isset($_REQUEST['ostava']) ? '1' : '0';
    $podrum = isset($_REQUEST['podrum']) ? '1' : '0';
    $opticki_kabl = isset($_REQUEST['opticki_kabl']) ? '1' : '0';
    $open_space = isset($_REQUEST['open_space']) ? '1' : '0';
    $pristup_za_invalide = isset($_REQUEST['pristup_za_invalide']) ? '1' : '0';
    $lokal_na_ulici = isset($_REQUEST['lokal_na_ulici']) ? '1' : '0';
    $pravno_lice = isset($_REQUEST['pravno_lice']) ? '1' : '0';
    
	//echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;
    izmeniStan($id, $vlasnik, $telefon, $email, $kategorija, $tip, $stan_tip, $ulica, $br, $sprat, $opstina, $podlokacija, $opis_lokacije, $grejanje, $namestenost, $cena, $kvadratura, $opis, $dodatna_informacija, $izdat, $provizija, $vidljiv_do);
    izmeniDodatneTagove($id, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice);
    
	
    //dodajDodatneTagove($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    
    //var_dump($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    //echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;
	
	
	uploadIzmene($_FILES, $id);

	header("Location: izmeni.php?id=$id");
