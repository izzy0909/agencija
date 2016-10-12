<?php


include_once '../data_base_access/ponudeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
if (isset ($_POST['izmeni_ponudu'])){
	
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
        $ulica = isset($_POST['ulica']) ? $_POST['ulica'] : null;
        $br = isset($_POST['br']) ? $_POST['br'] : null;
        $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
        $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
        $opis = isset($_POST['opis']) ? $_POST['opis'] : null;

        $kablovska = isset($_REQUEST['kablovska']) ? '1' : '0';
        $tv = isset($_REQUEST['tv']) ? '1' : '0';
        $klima = isset($_REQUEST['klima']) ? '1' : '0';
        $internet = isset($_REQUEST['internet']) ? '1' : '0';
        $ima_telefon = isset($_REQUEST['ima_telefon']) ? '1' : '0';
        $frizider = isset($_REQUEST['frizider']) ? '1' : '0';
        $sporet = isset($_REQUEST['sporet']) ? '1' : '0';
        $vesmasina = isset($_REQUEST['vesmasina']) ? '1' : '0';
        $kuhinjskielementi = isset($_REQUEST['kuhinjskielementi']) ? '1' : '0';
        $plakari = isset($_REQUEST['plakari']) ? '1' : '0';
        $interfon = isset($_REQUEST['interfon']) ? '1' : '0';
        $lift = isset($_REQUEST['lift']) ? '1' : '0';
        $bazen = isset($_REQUEST['bazen']) ? '1' : '0';
        $garaza = isset($_REQUEST['garaza']) ? '1' : '0';
        $parking = isset($_REQUEST['parking']) ? '1' : '0';
        $dvoriste = isset($_REQUEST['dvoriste']) ? '1' : '0';
        $potkrovlje = isset($_REQUEST['potkrovlje']) ? '1' : '0';
        $terasa = isset($_REQUEST['terasa']) ? '1' : '0';
        $novogradnja = isset($_REQUEST['novogradnja']) ? '1' : '0';
        $renovirano = isset($_REQUEST['renovirano']) ? '1' : '0';
        $lux = isset($_REQUEST['lux']) ? '1' : '0';
        $penthaus = isset($_REQUEST['penthaus']) ? '1' : '0';
        $salonski = isset($_REQUEST['salonski']) ? '1' : '0';
        $lodja = isset($_REQUEST['lodja']) ? '1' : '0';
        $duplex = isset($_REQUEST['duplex']) ? '1' : '0';
        $nov_namestaj = isset($_REQUEST['nov_namestaj']) ? '1' : '0';
        $kompjuterska_mreza = isset($_REQUEST['kompjuterska_mreza']) ? '1' : '0';
        $dva_kupatila = isset($_REQUEST['dva_kupatila']) ? '1' : '0';
        $vise_telefonskih_linija = isset($_REQUEST['vise_telefonskih_linija']) ? '1' : '0';
        $stan_u_kuci = isset($_REQUEST['stan_u_kuci']) ? '1' : '0';
        $samostojeca_kuca = isset($_REQUEST['samostojeca_kuca']) ? '1' : '0';
        $kuca_s_dvoristem = isset($_REQUEST['kuca_s_dvoristem']) ? '1' : '0';
        $kucni_ljubimci = isset($_REQUEST['kucni_ljubimci']) ? '1' : '0';
        $balkon = isset($_REQUEST['balkon']) ? '1' : '0';
        $video_nadzor = isset($_REQUEST['video_nadzor']) ? '1' : '0';
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


        
	izmeniPonudu($id, $vlasnik, $ulica, $br, $telefon, $email, $cena, $kvadratura, $opis, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice);
	}
	header("Location: izmeni_ponudu.php?id=$id");
	 
	
}    
