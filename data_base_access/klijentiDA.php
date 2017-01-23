<?php

include_once 'connection.php';


function dodajKlijenta($ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $grejanje, $namestenost, $cena_od, $cena_do, $kvadratura_od, $kvadratura_do, $agent, $sekretarica, $napomena, $interfon, $kablovska, $klima, $internet, $ima_telefon, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice)
{
    global $conn;
    

    $sql = "INSERT INTO klijenti (klijent_id, ime, telefon, email, kategorija, tip, stan_tip, lokacija_id, grejanje, namestenost, cena_od, cena_do, kvadratura_od, kvadratura_do, agent, sekretarica, napomena, t_interfon, t_kablovska, t_klima, t_internet, t_telefon, t_kuhinjskielementi, t_plakari, t_lift, t_bazen, t_garaza, t_parking, t_dvoriste, t_potkrovlje, t_terasa, t_novogradnja, t_renovirano, t_lux, t_penthaus, t_salonski, t_lodja, t_duplex, t_novnamestaj, t_kompmreza, t_dvakupatila, t_viselinija, t_stanukuci, t_samostojecakuca, t_kucasdvoristem, t_kucniljubimci, t_balkon, t_videonadzor, t_alarm, t_basta, t_pomocniobjekti, t_ostava, t_podrum, t_optickikabl, t_openspace, t_pristupzainvalide, t_lokalnaulici, t_pravnolice)
            VALUES             ('', :ime, :telefon, :email, :kategorija, :tip, :stan_tip, :lokacija_id, :grejanje, :namestenost, :cena_od, :cena_do, :kvadratura_od, :kvadratura_do, :agent, :sekretarica, :napomena, :t_interfon, :t_kablovska, :t_klima, :t_internet, :t_telefon, :t_kuhinjskielementi, :t_plakari, :t_lift, :t_bazen, :t_garaza, :t_parking, :t_dvoriste, :t_potkrovlje, :t_terasa, :t_novogradnja, :t_renovirano, :t_lux, :t_penthaus, :t_salonski, :t_lodja, :t_duplex, :t_novnamestaj, :t_kompmreza, :t_dvakupatila, :t_viselinija, :t_stanukuci, :t_samostojecakuca, :t_kucasdvoristem, :t_kucniljubimci, :t_balkon, :t_videonadzor, :t_alarm, :t_basta, :t_pomocniobjekti, :t_ostava, :t_podrum, :t_optickikabl, :t_openspace, :t_pristupzainvalide, :t_lokalnaulici, :t_pravnolice)";
    $query = $conn->prepare($sql);
    $query->execute(array(
	    ':ime' => $ime,
        ':telefon' => $telefon,
        ':email' => $email,
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
        ':lokacija_id' => $lokacija_id,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
        ':cena_od' => $cena_od,
        ':cena_do' => $cena_do,
        ':kvadratura_od' => $kvadratura_od,
        ':kvadratura_do' => $kvadratura_do,
        ':agent' => $agent,
        ':sekretarica' => $sekretarica,
        ':napomena' => $napomena,
        ':t_interfon' => $interfon,
        ':t_kablovska' => $kablovska, 
        ':t_klima' => $klima, 
        ':t_internet' => $internet, 
        ':t_telefon' => $ima_telefon, 
        ':t_kuhinjskielementi' => $kuhinjskielementi, 
        ':t_plakari' => $plakari, 
        ':t_lift' => $lift, 
        ':t_bazen' => $bazen, 
        ':t_garaza' => $garaza, 
        ':t_parking' => $parking, 
        ':t_dvoriste' => $dvoriste, 
        ':t_potkrovlje' => $potkrovlje, 
        ':t_terasa' => $terasa, 
        ':t_novogradnja' => $novogradnja, 
        ':t_renovirano' => $renovirano, 
        ':t_lux' => $lux, 
        ':t_penthaus' => $penthaus, 
        ':t_salonski' => $salonski, 
        ':t_lodja' => $lodja, 
        ':t_duplex' => $duplex, 
        ':t_novnamestaj' => $nov_namestaj, 
        ':t_kompmreza' => $kompjuterska_mreza, 
        ':t_dvakupatila' => $dva_kupatila, 
        ':t_viselinija' => $vise_telefonskih_linija, 
        ':t_stanukuci' => $stan_u_kuci, 
        ':t_samostojecakuca' => $samostojeca_kuca, 
        ':t_kucasdvoristem' => $kuca_s_dvoristem, 
        ':t_kucniljubimci' => $kucni_ljubimci, 
        ':t_balkon' => $balkon, 
        ':t_videonadzor' => $video_nadzor, 
        ':t_alarm' => $alarm, 
        ':t_basta' => $basta, 
        ':t_pomocniobjekti' => $pomocni_objekti, 
        ':t_ostava' => $ostava, 
        ':t_podrum' => $podrum, 
        ':t_optickikabl' => $opticki_kabl, 
        ':t_openspace' => $open_space, 
        ':t_pristupzainvalide' => $pristup_za_invalide, 
        ':t_lokalnaulici' => $lokal_na_ulici, 
        ':t_pravnolice' => $pravno_lice
        ));

    return $conn->lastInsertID();
}

function prikaziSveKlijente($start, $limit){
    global $conn;

    $sql = "SELECT * FROM klijenti as ds 
			INNER JOIN lokacija as l 
			ON ds.lokacija_id = l.id 
			LIMIT $start, $limit";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziKlijenta($id){
    global $conn;

    $sql = "SELECT * FROM klijenti as ds 
			INNER JOIN lokacija as l 
			ON ds.lokacija_id = l.id 
			WHERE ds.klijent_id = :id LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();
    
}

function izbrisiKlijenta($id){
    global $conn;

    $sql = "DELETE FROM klijenti
            WHERE klijent_id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));

}

function ukupanBrojKlijenata(){
    global $conn;

    $sql = "SELECT COUNT(*) as broj FROM klijenti";
    $query = $conn->prepare($sql);
    $query->execute();
	return $query->fetch();
    
}

function izmeniKlijenta($id, $ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $grejanje, $namestenost, $cena_od, $cena_do, $kvadratura_od, $kvadratura_do, $agent, $sekretarica, $napomena, $ponudjeno, $zavrseno, $gde, $agent_uselio, $cena_zavrsetka, $datum_zavrsetka, $interfon, $kablovska, $klima, $internet, $ima_telefon, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice)
{
    global $conn;
    

    $sql = "UPDATE klijenti SET ime = :ime, telefon = :telefon, email = :email, kategorija = :kategorija, tip = :tip, stan_tip = :stan_tip, lokacija_id = :lokacija_id, grejanje = :grejanje, namestenost = :namestenost, cena_od = :cena_od, cena_do = :cena_do, kvadratura_od = :kvadratura_od, kvadratura_do = :kvadratura_do, agent = :agent, sekretarica = :sekretarica, napomena = :napomena, ponudjeno = :ponudjeno, zavrseno = :zavrseno, gde = :gde, agent_uselio = :agent_uselio, cena_zavrsetka = :cena_zavrsetka, datum_zavrsetka = :datum_zavrsetka,
        t_interfon = :t_interfon, t_kablovska = :t_kablovska, t_klima = :t_klima, t_internet = :t_internet, t_telefon = :t_telefon, t_kuhinjskielementi = :t_kuhinjskielementi, t_plakari = :t_plakari, t_lift = :t_lift, t_bazen = :t_bazen, t_garaza = :t_garaza, t_parking = :t_parking, t_dvoriste = :t_dvoriste, t_potkrovlje = :t_potkrovlje, t_terasa = :t_terasa, t_novogradnja = :t_novogradnja, t_renovirano = :t_renovirano, t_lux = :t_lux, t_penthaus = :t_penthaus, t_salonski = :t_salonski, t_lodja = :t_lodja, t_duplex = :t_duplex, t_novnamestaj = :t_novnamestaj, t_kompmreza = :t_kompmreza, t_dvakupatila = :t_dvakupatila, t_viselinija = :t_viselinija, t_stanukuci = :t_stanukuci, t_samostojecakuca = :t_samostojecakuca, t_kucasdvoristem = :t_kucasdvoristem, t_kucniljubimci = :t_kucniljubimci, t_balkon = :t_balkon, t_videonadzor = :t_videonadzor, t_alarm = :t_alarm, t_basta = :t_basta, t_pomocniobjekti = :t_pomocniobjekti, t_ostava = :t_ostava, t_podrum = :t_podrum, t_optickikabl = :t_optickikabl, t_openspace = :t_openspace, t_pristupzainvalide = :t_pristupzainvalide, t_lokalnaulici = :t_lokalnaulici, t_pravnolice = :t_pravnolice WHERE klijent_id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':id' => $id,
	    ':ime' => $ime,
        ':telefon' => $telefon,
        ':email' => $email,
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
        ':lokacija_id' => $lokacija_id,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
        ':cena_od' => $cena_od,
        ':cena_do' => $cena_do,
        ':kvadratura_od' => $kvadratura_od,
        ':kvadratura_do' => $kvadratura_do,
        ':agent' => $agent,
        ':sekretarica' => $sekretarica,
        ':napomena' => $napomena,
        ':ponudjeno'=> $ponudjeno,
        ':zavrseno'=> $zavrseno,
        ':gde'=> $gde,
        ':agent_uselio'=> $agent_uselio,
        ':cena_zavrsetka'=> $cena_zavrsetka,
        ':datum_zavrsetka'=> $datum_zavrsetka,
        ':t_interfon' => $interfon,
        ':t_kablovska' => $kablovska, 
        ':t_klima' => $klima, 
        ':t_internet' => $internet, 
        ':t_telefon' => $ima_telefon, 
        ':t_kuhinjskielementi' => $kuhinjskielementi, 
        ':t_plakari' => $plakari, 
        ':t_lift' => $lift, 
        ':t_bazen' => $bazen, 
        ':t_garaza' => $garaza, 
        ':t_parking' => $parking, 
        ':t_dvoriste' => $dvoriste, 
        ':t_potkrovlje' => $potkrovlje, 
        ':t_terasa' => $terasa, 
        ':t_novogradnja' => $novogradnja, 
        ':t_renovirano' => $renovirano, 
        ':t_lux' => $lux, 
        ':t_penthaus' => $penthaus, 
        ':t_salonski' => $salonski, 
        ':t_lodja' => $lodja, 
        ':t_duplex' => $duplex, 
        ':t_novnamestaj' => $nov_namestaj, 
        ':t_kompmreza' => $kompjuterska_mreza, 
        ':t_dvakupatila' => $dva_kupatila, 
        ':t_viselinija' => $vise_telefonskih_linija, 
        ':t_stanukuci' => $stan_u_kuci, 
        ':t_samostojecakuca' => $samostojeca_kuca, 
        ':t_kucasdvoristem' => $kuca_s_dvoristem, 
        ':t_kucniljubimci' => $kucni_ljubimci, 
        ':t_balkon' => $balkon, 
        ':t_videonadzor' => $video_nadzor, 
        ':t_alarm' => $alarm, 
        ':t_basta' => $basta, 
        ':t_pomocniobjekti' => $pomocni_objekti, 
        ':t_ostava' => $ostava, 
        ':t_podrum' => $podrum, 
        ':t_optickikabl' => $opticki_kabl, 
        ':t_openspace' => $open_space, 
        ':t_pristupzainvalide' => $pristup_za_invalide, 
        ':t_lokalnaulici' => $lokal_na_ulici, 
        ':t_pravnolice' => $pravno_lice
        )); 
}