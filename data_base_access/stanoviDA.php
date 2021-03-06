<?php

include_once 'connection.php';


function dodajStan($kategorija, $tip, $stan_tip, $vlasnik, $lokacija_id, $podlokacija_id, $opis_lokacije, $ulica, $br, $sprat, $telefon, $email, $cena, $kvadratura, $grejanje, $namestenost, $opis, $vidljiv, $vidljiv_do, $dodao, $dodatna_informacija, $provizija, $youtube, $zonski_parking, $br_parking_mesta)
{
    global $conn;

    $sql = "INSERT INTO stanovi (id, kategorija, tip, stan_tip, vlasnik, lokacija_id, podlokacija_id, opis_lokacije, ulica, br, sprat, telefon, email, cena, kvadratura, grejanje, namestenost, opis, vidljiv, vidljiv_do, dodao, dodatna_informacija, provizija, youtube, zonski_parking, br_parking_mesta)
            VALUES              ('', :kategorija, :tip, :stan_tip, :vlasnik, :lokacija_id, :podlokacija_id, :opis_lokacije, :ulica, :br, :sprat, :telefon, :email, :cena, :kvadratura, :grejanje, :namestenost, :opis, :vidljiv, :vidljiv_do, :dodao, :dodatna_informacija, :provizija, :youtube, :zonski_parking, :br_parking_mesta)";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
	    ':vlasnik' => $vlasnik,
        ':lokacija_id' => $lokacija_id,
        ':podlokacija_id' => $podlokacija_id,
        ':opis_lokacije' => $opis_lokacije,
        ':ulica' => $ulica,
        ':br' => $br,
        ':sprat' => $sprat,
        ':telefon' => $telefon,
        ':email' => $email,
        ':cena' => $cena,
        ':kvadratura' => $kvadratura,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
        ':opis' => $opis,
        ':vidljiv' => $vidljiv,
        ':vidljiv_do' => $vidljiv_do,
        ':dodao' => $dodao,
        ':dodatna_informacija' => $dodatna_informacija,
        ':provizija' => $provizija,
        ':youtube' => $youtube,
        ':zonski_parking' => $zonski_parking,
        ':br_parking_mesta' => $br_parking_mesta
        ));

    return $conn->lastInsertID();
}

function prikaziSveOpstine(){
    global $conn;

    $sql = "SELECT * FROM lokacija";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziSvePodlokacije(){
    global $conn;

    $sql = "SELECT * FROM podlokacije";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
}

function prikaziSveStanove($start, $limit){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            LEFT JOIN podlokacije as p
            ON s.podlokacija_id = p.id
            LIMIT $start, $limit";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziStanoveXML(){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            LEFT JOIN podlokacije as p
            ON s.podlokacija_id = p.id
            WHERE vidljiv = 1 AND izdat = 0";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziPoslednjeStanove(){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas')
            ORDER BY datum_dodavanja DESC
            LIMIT 0, 8";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);  
}

function prikaziHotOfferStanove(){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE hot_offer = '1'
            AND vidljiv = '1'
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas')
            ORDER BY RAND() limit 0,1";

	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetch();
}

function prikaziBrojZaTip($tip){
    global $conn;

    $sql = "SELECT COUNT(*) FROM stanovi 
            WHERE tip = :tip AND vidljiv = 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':tip' => $tip
		));
    return $query->fetch();    
}

function prikaziStanZaAdmina($id){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            LEFT JOIN podlokacije as p
            ON s.podlokacija_id = p.id
            WHERE s.id = :id
            LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();    
}

function prikaziStanZaFront($id){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE s.id = :id
            AND vidljiv = 1
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas')
            LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();
}

function izbrisiStan($id){
    global $conn;

    $sql = "DELETE FROM stanovi
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));

    $sql = "DELETE FROM slike
	    WHERE stan_id = :stan_id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':stan_id' => $id
		));

    $sql = "DELETE FROM dodatni_tagovi
	    WHERE stan_id = :stan_id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':stan_id' => $id
		));
    
}

function ukupanBrojStanova(){
    global $conn;

    $sql = "SELECT COUNT(*) as broj 
            FROM stanovi";
    $query = $conn->prepare($sql);
    $query->execute();
	return $query->fetch();
    
}

function izmeniStan($id, $vlasnik, $telefon, $email, $kategorija, $tip, $stan_tip, $ulica, $br, $sprat, $opstina, $podlokacija, $opis_lokacije, $grejanje, $namestenost, $cena, $kvadratura, $opis, $dodatna_informacija, $izdat, $provizija, $vidljiv_do, $youtube, $zonski_parking, $br_parking_mesta){
    global $conn;

    $sql = "UPDATE stanovi
            SET vlasnik = :vlasnik, telefon = :telefon, email = :email, kategorija = :kategorija, tip = :tip, stan_tip = :stan_tip, ulica = :ulica, br = :br, sprat = :sprat, lokacija_id = :opstina, podlokacija_id = :podlokacija, opis_lokacije = :opis_lokacije, grejanje = :grejanje, namestenost = :namestenost, cena = :cena, kvadratura = :kvadratura, opis = :opis, dodatna_informacija = :dodatna_informacija, izdat = :izdat, provizija = :provizija, vidljiv_do = :vidljiv_do, youtube = :youtube, zonski_parking = :zonski_parking, br_parking_mesta = :br_parking_mesta  
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':vlasnik' => $vlasnik,
		':telefon' => $telefon,
		':email' => $email,
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
		':ulica' => $ulica,
        ':br' => $br,
        ':sprat' => $sprat,
        ':opstina' => $opstina,
        ':podlokacija' => $podlokacija,
        ':opis_lokacije' => $opis_lokacije,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
		':cena' => $cena,
		':kvadratura' => $kvadratura,
		':opis' => $opis,
        ':dodatna_informacija' => $dodatna_informacija,
        ':izdat' => $izdat,
        ':provizija' => $provizija,
        ':vidljiv_do' => $vidljiv_do,
        ':youtube' => $youtube,
        ':zonski_parking' => $zonski_parking,
        ':br_parking_mesta' => $br_parking_mesta,
		':id' => $id
		));
	    
}

function promeniVidljivostStana($id, $vidljiv){
    global $conn;

    $sql = "UPDATE stanovi
            SET vidljiv = :vidljiv
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id,
		':vidljiv' => $vidljiv
		));
	    
}

function promeniDostupnostStana($id, $izdat){
    global $conn;

    $sql = "UPDATE stanovi
            SET izdat = :izdat
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id,
		':izdat' => $izdat
		));
	    
}

function promeniHotStana($id, $hot){
    global $conn;

    $sql = "UPDATE stanovi
            SET hot_offer = :hot
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id,
		':hot' => $hot
		));
	    
}

function pretraziStanove($id, $kategorija, $tip, $namestenost, $povrsina_od, $povrsina_do, $telefon, $ulica, $stan_tip, $opstina, $podlokacija, $cena_od, $cena_do, $sprat, $grejanje, $izdat, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice){
    global $conn;
    
    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            INNER JOIN dodatni_tagovi as d_t
            ON s.id = d_t.stan_id
            LEFT JOIN podlokacije as p
            ON s.podlokacija_id = p.id
            WHERE s.id != '' ";
    if(!empty ($id)){
    $sql .= "AND s.id LIKE :id ";
    }
    if(!empty ($kategorija)){
            $sql .= "AND ( kategorija = '$kategorija[0]' ";
            $i=0;
            foreach ($kategorija as $kat) {
                if($i > 0) {
                    $sql .= "OR kategorija = '$kat' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($tip)){
            $sql .= "AND ( tip = '$tip[0]' ";
            $i=0;
            foreach ($tip as $tipovi) {
                if($i > 0) {
                    $sql .= "OR tip = '$tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($namestenost)){
            $sql .= "AND ( namestenost = '$namestenost[0]' ";
            $i=0;
            foreach ($namestenost as $namest) {
                if($i > 0) {
                    $sql .= "OR namestenost = '$namest' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= :povrsina_od ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= :povrsina_do ";
    }
    if(!empty ($telefon)){
    $sql .= "AND s.telefon LIKE :telefon ";
    }
    if(!empty ($ulica)){
    $sql .= "AND ulica LIKE :ulica ";
    }
    if(!empty ($stan_tip)){
            $sql .= "AND ( stan_tip = '$stan_tip[0]' ";
            $i=0;
            foreach ($stan_tip as $s_tipovi) {
                if($i > 0) {
                    $sql .= "OR stan_tip = '$s_tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($opstina)){
            $sql .= "AND ( s.lokacija_id = '$opstina[0]' ";
            $i=0;
            foreach ($opstina as $lokacije) {
                if($i > 0) {
                    $sql .= "OR s.lokacija_id = '$lokacije' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($podlokacija)){
            $sql .= "AND ( s.podlokacija_id = '$podlokacija[0]' ";
            $i=0;
            foreach ($podlokacija as $podlok) {
                if($i > 0) {
                    $sql .= "OR s.podlokacija_id = '$podlok' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= :cena_od ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= :cena_do ";
    }
    if(!empty ($sprat)){
            $sql .= "AND ( sprat = '$sprat[0]' ";
            $i=0;
            foreach ($sprat as $spratovi) {
                if($i > 0) {
                    $sql .= "OR sprat = '$spratovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($grejanje)){
            $sql .= "AND ( grejanje = '$grejanje[0]' ";
            $i=0;
            foreach ($grejanje as $grej) {
                if($i > 0) {
                    $sql .= "OR grejanje = '$grej' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($izdat)){
            $sql .= "AND ( izdat = '$izdat[0]' ";
            $i=0;
            foreach ($izdat as $izdavanje) {
                if($i > 0) {
                    $sql .= "OR izdat = '$izdavanje' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if($kablovska != 0){
    $sql .= "AND kablovska = 1 ";
    }
    if($tv != 0){
    $sql .= "AND tv = 1 ";
    }
    if($klima != 0){
    $sql .= "AND klima = 1 ";
    }
    if($internet != 0){
    $sql .= "AND internet = 1 ";
    }
    if($ima_telefon != 0){
    $sql .= "AND d_t.telefon = 1 ";
    }
    if($frizider != 0){
    $sql .= "AND frizider = 1 ";
    }
    if($sporet != 0){
    $sql .= "AND sporet = 1 ";
    }
    if($vesmasina != 0){
    $sql .= "AND ves_masina = 1 ";
    }
    if($kuhinjskielementi != 0){
    $sql .= "AND kuhinjski_elementi = 1 ";
    }
    if($plakari != 0){
    $sql .= "AND plakari = 1 ";
    }
    if($interfon != 0){
    $sql .= "AND interfon = 1 ";
    }
    if($lift != 0){
    $sql .= "AND lift = 1 ";
    }
    if($bazen != 0){
    $sql .= "AND bazen = 1 ";
    }
    if($garaza != 0){
    $sql .= "AND garaza = 1 ";
    }
    if($parking != 0){
    $sql .= "AND parking = 1 ";
    }
    if($dvoriste != 0){
    $sql .= "AND dvoriste = 1 ";
    }
    if($potkrovlje != 0){
    $sql .= "AND potkrovlje = 1 ";
    }
    if($terasa != 0){
    $sql .= "AND terasa = 1 ";
    }
    if($novogradnja != 0){
    $sql .= "AND novogradnja = 1 ";
    }
    if($renovirano != 0){
    $sql .= "AND renovirano = 1 ";
    }
    if($lux != 0){
    $sql .= "AND lux = 1 ";
    }
    if($penthaus != 0){
    $sql .= "AND penthaus = 1 ";
    }
    if($salonski != 0){
    $sql .= "AND salonski = 1 ";
    }
    if($lodja != 0){
    $sql .= "AND lodja = 1 ";
    }
    if($duplex != 0){
    $sql .= "AND duplex = 1 ";
    }
    if($nov_namestaj != 0){
    $sql .= "AND nov_namestaj = 1 ";
    }
    if($kompjuterska_mreza != 0){
    $sql .= "AND kompjuterska_mreza = 1 ";
    }
    if($dva_kupatila != 0){
    $sql .= "AND dva_kupatila = 1 ";
    }
    if($vise_telefonskih_linija != 0){
    $sql .= "AND vise_telefonskih_linija = 1 ";
    }
    if($stan_u_kuci != 0){
    $sql .= "AND stan_u_kuci = 1 ";
    }
    if($samostojeca_kuca != 0){
    $sql .= "AND samostojeca_kuca = 1 ";
    }
    if($kuca_s_dvoristem != 0){
    $sql .= "AND kuca_s_dvoristem = 1 ";
    }
    if($kucni_ljubimci != 0){
    $sql .= "AND kucni_ljubimci = 1 ";
    }
    if($balkon != 0){
    $sql .= "AND balkon = 1 ";
    }
    if($video_nadzor != 0){
    $sql .= "AND video_nadzor = 1 ";
    }
    if($alarm != 0){
    $sql .= "AND alarm = 1 ";
    }
    if($basta != 0){
    $sql .= "AND basta = 1 ";
    }
    if($pomocni_objekti != 0){
    $sql .= "AND pomocni_objekti = 1 ";
    }
    if($ostava != 0){
    $sql .= "AND ostava = 1 ";
    }
    if($podrum != 0){
    $sql .= "AND podrum = 1 ";
    }
    if($opticki_kabl != 0){
    $sql .= "AND opticki_kabl = 1 ";
    }
    if($open_space != 0){
    $sql .= "AND open_space = 1 ";
    }
    if($pristup_za_invalide != 0){
    $sql .= "AND pristup_za_invalide = 1 ";
    }
    if($lokal_na_ulici != 0){
    $sql .= "AND lokal_na_ulici = 1 ";
    }
    if($pravno_lice != 0){
    $sql .= "AND pravno_lice = 1 ";
    }

    $query = $conn->prepare($sql);
	
    if(!empty ($id)){
    $id = "%" . $id . "%";
    $query->bindParam(':id', $id);
    }
//    if(!empty ($tip)){
//    $query->bindParam(':tip', $tip);
//    }
//    if(!empty ($namestenost)){
//    $query->bindParam(':namestenost', $namestenost);
//    }
    if(!empty ($povrsina_od)){
    $query->bindValue(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
    $query->bindValue(':povrsina_do', $povrsina_do);
    }
    if(!empty ($telefon)){
    $telefon = "%" . $telefon . "%";
    $query->bindParam(':telefon', $telefon);
    }
    if(!empty ($ulica)){
    $ulica = "%" . $ulica . "%";
    $query->bindParam(':ulica', $ulica);
    }
//    if(!empty ($stan_tip)){
//    $query->bindParam(':stan_tip', $stan_tip);
//    }
//    if(!empty ($opstina)){
//    $query->bindParam(':lokacija_id', $opstina);
//    }
//    if(!empty ($podlokacija)){
//    $query->bindParam(':podlokacija_id', $podlokacija);
//    }
    if(!empty ($cena_od)){
    $query->bindValue(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
    $query->bindValue(':cena_do', $cena_do);
    }
//    if(!empty ($sprat)){
//    $query->bindValue(':sprat', $sprat);
//    }
//    if(!empty ($grejanje)){
//    $query->bindValue(':grejanje', $grejanje);
//    }
    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function pretragaStanovaZaIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    if(!empty ($tip)){
            $sql .= "AND ( tip = '$tip[0]' ";
            $i=0;
            foreach ($tip as $tipovi) {
                if($i > 0) {
                    $sql .= "OR tip = '$tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($stan_tip)){
            $sql .= "AND ( stan_tip = '$stan_tip[0]' ";
            $i=0;
            foreach ($stan_tip as $s_tipovi) {
                if($i > 0) {
                    $sql .= "OR stan_tip = '$s_tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($opstina)){
            $sql .= "AND ( lokacija_id = '$opstina[0]' ";
            $i=0;
            foreach ($opstina as $lokacije) {
                if($i > 0) {
                    $sql .= "OR lokacija_id = '$lokacije' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($sprat)){
            $sql .= "AND ( sprat = '$sprat[0]' ";
            $i=0;
            foreach ($sprat as $spratovi) {
                if($i > 0) {
                    $sql .= "OR sprat = '$spratovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= :povrsina_od ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= :povrsina_do ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= :cena_od ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= :cena_do ";
    }
    if(!empty ($grejanje)){
            $sql .= "AND ( grejanje = '$grejanje[0]' ";
            $i=0;
            foreach ($grejanje as $grej) {
                if($i > 0) {
                    $sql .= "OR grejanje = '$grej' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($namestenost)){
            $sql .= "AND ( namestenost = '$namestenost[0]' ";
            $i=0;
            foreach ($namestenost as $namest) {
                if($i > 0) {
                    $sql .= "OR namestenost = '$namest' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    $sql .= "AND kategorija = 'izdavanje' ORDER BY s.id DESC LIMIT $start , 18 ";
    
    $query = $conn->prepare($sql);

 /*   if(!empty ($tip) && !is_array($tip)){
       $query->bindParam(':tip', $tip);
    }
    if(!empty ($stan_tip)){
        $query->bindParam(':stan_tip', $stan_tip);
    }
    if(!empty ($opstina)){
	$query->bindParam(':lokacija_id', $opstina);
    }                                                       
    if(!empty ($sprat)){
	$query->bindParam(':sprat', $sprat);
    }                                                           */
    if(!empty ($povrsina_od)){
	$query->bindParam(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
	$query->bindParam(':povrsina_do', $povrsina_do);
    }
    if(!empty ($cena_od)){
	$query->bindParam(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
	$query->bindParam(':cena_do', $cena_do);
    }
/*    if(!empty ($grejanje)){
	$query->bindParam(':grejanje', $grejanje);
    }
    if(!empty ($namestenost)){
	$query->bindParam(':namestenost', $namestenost); 
    }                                                        */
//    $query->bindParam(':start', $start);
	
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function brojRezultataIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT COUNT(*) FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    if(!empty ($tip)){
            $sql .= "AND ( tip = '$tip[0]' ";
            $i=0;
            foreach ($tip as $tipovi) {
                if($i > 0) {
                    $sql .= "OR tip = '$tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($stan_tip)){
            $sql .= "AND ( stan_tip = '$stan_tip[0]' ";
            $i=0;
            foreach ($stan_tip as $s_tipovi) {
                if($i > 0) {
                    $sql .= "OR stan_tip = '$s_tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($opstina)){
            $sql .= "AND ( lokacija_id = '$opstina[0]' ";
            $i=0;
            foreach ($opstina as $lokacije) {
                if($i > 0) {
                    $sql .= "OR lokacija_id = '$lokacije' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($sprat)){
            $sql .= "AND ( sprat = '$sprat[0]' ";
            $i=0;
            foreach ($sprat as $spratovi) {
                if($i > 0) {
                    $sql .= "OR sprat = '$spratovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= :povrsina_od ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= :povrsina_do ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= :cena_od ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= :cena_do ";
    }
    if(!empty ($grejanje)){
            $sql .= "AND ( grejanje = '$grejanje[0]' ";
            $i=0;
            foreach ($grejanje as $grej) {
                if($i > 0) {
                    $sql .= "OR grejanje = '$grej' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($namestenost)){
            $sql .= "AND ( namestenost = '$namestenost[0]' ";
            $i=0;
            foreach ($namestenost as $namest) {
                if($i > 0) {
                    $sql .= "OR namestenost = '$namest' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    $sql .= "AND kategorija = 'izdavanje' ";

	$query = $conn->prepare($sql);
	
    if(!empty ($povrsina_od)){
	$query->bindParam(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
	$query->bindParam(':povrsina_do', $povrsina_do);
    }
    if(!empty ($cena_od)){
	$query->bindParam(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
	$query->bindParam(':cena_do', $cena_do);
    }
	
    $query->execute();
    return $query->fetch();
}

function brojRezultataProdaja($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT COUNT(*) FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    if(!empty ($tip)){
            $sql .= "AND ( tip = '$tip[0]' ";
            $i=0;
            foreach ($tip as $tipovi) {
                if($i > 0) {
                    $sql .= "OR tip = '$tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($stan_tip)){
            $sql .= "AND ( stan_tip = '$stan_tip[0]' ";
            $i=0;
            foreach ($stan_tip as $s_tipovi) {
                if($i > 0) {
                    $sql .= "OR stan_tip = '$s_tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($opstina)){
            $sql .= "AND ( lokacija_id = '$opstina[0]' ";
            $i=0;
            foreach ($opstina as $lokacije) {
                if($i > 0) {
                    $sql .= "OR lokacija_id = '$lokacije' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($sprat)){
            $sql .= "AND ( sprat = '$sprat[0]' ";
            $i=0;
            foreach ($sprat as $spratovi) {
                if($i > 0) {
                    $sql .= "OR sprat = '$spratovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= :povrsina_od ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= :povrsina_do ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= :cena_od ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= :cena_do ";
    }
    if(!empty ($grejanje)){
            $sql .= "AND ( grejanje = '$grejanje[0]' ";
            $i=0;
            foreach ($grejanje as $grej) {
                if($i > 0) {
                    $sql .= "OR grejanje = '$grej' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($namestenost)){
            $sql .= "AND ( namestenost = '$namestenost[0]' ";
            $i=0;
            foreach ($namestenost as $namest) {
                if($i > 0) {
                    $sql .= "OR namestenost = '$namest' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    $sql .= "AND kategorija = 'prodaja' ";

	$query = $conn->prepare($sql);
	
    if(!empty ($povrsina_od)){
	$query->bindParam(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
	$query->bindParam(':povrsina_do', $povrsina_do);
    }
    if(!empty ($cena_od)){
	$query->bindParam(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
	$query->bindParam(':cena_do', $cena_do);
    }
	
    $query->execute();
    return $query->fetch();

}

function pretragaStanovaZaProdaju($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    if(!empty ($tip)){
            $sql .= "AND ( tip = '$tip[0]' ";
            $i=0;
            foreach ($tip as $tipovi) {
                if($i > 0) {
                    $sql .= "OR tip = '$tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($stan_tip)){
            $sql .= "AND ( stan_tip = '$stan_tip[0]' ";
            $i=0;
            foreach ($stan_tip as $s_tipovi) {
                if($i > 0) {
                    $sql .= "OR stan_tip = '$s_tipovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($opstina)){
            $sql .= "AND ( lokacija_id = '$opstina[0]' ";
            $i=0;
            foreach ($opstina as $lokacije) {
                if($i > 0) {
                    $sql .= "OR lokacija_id = '$lokacije' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($sprat)){
            $sql .= "AND ( sprat = '$sprat[0]' ";
            $i=0;
            foreach ($sprat as $spratovi) {
                if($i > 0) {
                    $sql .= "OR sprat = '$spratovi' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= :povrsina_od ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= :povrsina_do ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= :cena_od ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= :cena_do ";
    }
    if(!empty ($grejanje)){
            $sql .= "AND ( grejanje = '$grejanje[0]' ";
            $i=0;
            foreach ($grejanje as $grej) {
                if($i > 0) {
                    $sql .= "OR grejanje = '$grej' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    if(!empty ($namestenost)){
            $sql .= "AND ( namestenost = '$namestenost[0]' ";
            $i=0;
            foreach ($namestenost as $namest) {
                if($i > 0) {
                    $sql .= "OR namestenost = '$namest' ";
                    }
                    $i++;
            }
            $sql .= " ) ";
    }
    $sql .= "AND kategorija = 'prodaja' ORDER BY s.id DESC LIMIT $start , 18 ";
    
        $query = $conn->prepare($sql);
	
    if(!empty ($povrsina_od)){
	$query->bindParam(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
	$query->bindParam(':povrsina_do', $povrsina_do);
    }
    if(!empty ($cena_od)){
	$query->bindParam(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
	$query->bindParam(':cena_do', $cena_do);
    }
	
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function dodajIzbrisaniStan($kategorija, $tip, $stan_tip, $vlasnik, $lokacija_id, $ulica, $br, $sprat, $telefon, $email, $cena, $kvadratura, $grejanje, $namestenost, $opis, $dodao, $obrisao)
{
    global $conn;

    $sql = "INSERT INTO izbrisani_stanovi (id, kategorija, tip, stan_tip, vlasnik, lokacija_id, ulica, br, sprat, telefon, email, cena, kvadratura, grejanje, namestenost, opis, dodao, stan_izbrisao)
            VALUES              ('', :kategorija, :tip, :stan_tip, :vlasnik, :lokacija_id, :ulica, :br, :sprat, :telefon, :email, :cena, :kvadratura, :grejanje, :namestenost, :opis, :dodao, :stan_izbrisao)";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
	':vlasnik' => $vlasnik,
        ':lokacija_id' => $lokacija_id,
        ':ulica' => $ulica,
        ':br' => $br,
        ':sprat' => $sprat,
        ':telefon' => $telefon,
        ':email' => $email,
        ':cena' => $cena,
        ':kvadratura' => $kvadratura,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
        ':opis' => $opis,
        ':dodao' => $dodao,
        ':stan_izbrisao' => $obrisao
        ));

    return $conn->lastInsertID();
}

// new site functions

function getRecent(){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas')
            ORDER BY datum_dodavanja DESC
            LIMIT 0, 6";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);  
}

function getFeatured(){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE hot_offer = '1'
            AND vidljiv = '1'
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas')
            ORDER BY RAND() limit 0,3";

    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);  
}

function getSimilarProperties($id, $category, $type, $location_id, $price) {
    global $conn;
    $danas = date('Y-m-d');

    if($category = 'izdavanje'){
        $cena_od = $price-50;
        $cena_do = $price+50;
    }
    else{
        $cena_od = $price-5000;
        $cena_do = $price+5000;
    }

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1
            AND ('vidljiv_do' = NULL OR 'vidljiv_do' >= '$danas')
            AND s.id != '$id' 
            AND kategorija = '$category' 
            AND tip = '$type' 
            AND s.lokacija_id = '$location_id'
            AND cena >= '$cena_od' 
            AND cena <= '$cena_do'
            ORDER BY RAND() limit 0,4";

    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);  
}



    function fixit($name){
        return "'" . str_replace(array('ć', 'ž', 'Č'), array('c', 'z', 'C'), $name) . "'";
        // return "'" . $name . "'";
    }

function getItemsCount($category, $id, $type, $structure, $location, $heat, $setup, $floor, $price_from, $price_to, $size_from, $size_to)
{
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT COUNT(*) FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND ('vidljiv_do' = NULL OR 'vidljiv_do' >= '$danas') ";
    if(!empty($id)){
        $sql .= "AND s.id = :id ";
    }   
    if(!empty($type)){
        $sql .= "AND tip IN (" . implode(", ", array_map('fixit', $type)) . ") "; // dobijes (:Stan,:Kuca,:Poslovni_prostor)
    }
    if(!empty($structure)){
        $sql .= "AND stan_tip IN (" . implode(", ", array_map('fixit', $structure)) . ") ";
    }
    if(!empty($location)){
        $sql .= "AND opstina IN (" . implode(", ", array_map('fixit', $location)) . ") ";
    }
    if(!empty($heat)){
        $sql .= "AND grejanje IN (" . implode(", ", array_map('fixit', $heat)) . ") ";
    }
    if(!empty($setup)){
        $sql .= "AND namestenost IN (" . implode(", ", array_map('fixit', $setup)) . ") ";
    }
    if(!empty($floor)){
        $sql .= "AND sprat IN (" . implode(", ", array_map('fixit', $floor)) . ") ";
    }
    if(!empty($price_from)){
        $sql .= "AND cena >= :price_from ";
    }
    if(!empty($price_to)){
        $sql .= "AND cena <= :price_to ";
    }
    if(!empty($size_from)){
        $sql .= "AND kvadratura >= :size_from ";
    }
    if(!empty($size_to)){
        $sql .= "AND kvadratura <= :size_to ";
    }
    $sql .= "AND kategorija = :category";

    $query = $conn->prepare($sql);

    if(!empty ($id)){
    $query->bindParam(':id', $id);
    } 
    if(!empty ($price_from)){
    $query->bindParam(':price_from', $price_from);
    }
    if(!empty ($price_to)){
    $query->bindParam(':price_to', $price_to);
    }
    if(!empty ($size_from)){
    $query->bindParam(':size_from', $size_from);
    }
    if(!empty ($size_to)){
    $query->bindParam(':size_to', $size_to);
    }
    $query->bindParam(':category', $category);
    

    $query->execute();
    return $query->fetchColumn();


}

function getItems($category, $id, $type, $structure, $location, $heat, $setup, $floor, $price_from, $price_to, $size_from, $size_to, $order, $start)
{
    global $conn;
    $danas = date('Y-m-d');
    $start = $start * 9;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    if(!empty($id)){
        $sql .= "AND s.id = :id ";
    }        
    if(!empty($type)){
        $sql .= "AND tip IN (" . implode(", ", array_map('fixit', $type)) . ") "; // dobijes (:Stan,:Kuca,:Poslovni_prostor)
    }
    if(!empty($structure)){
        $sql .= "AND stan_tip IN (" . implode(", ", array_map('fixit', $structure)) . ") ";
    }
    if(!empty($location)){
        $sql .= "AND opstina IN (" . implode(", ", array_map('fixit', $location)) . ") ";
    }
    if(!empty($heat)){
        $sql .= "AND grejanje IN (" . implode(", ", array_map('fixit', $heat)) . ") ";
    }
    if(!empty($setup)){
        $sql .= "AND namestenost IN (" . implode(", ", array_map('fixit', $setup)) . ") ";
    }
    if(!empty($floor)){
        $sql .= "AND sprat IN (" . implode(", ", array_map('fixit', $floor)) . ") ";
    }
    if(!empty($price_from)){
        $sql .= "AND cena >= :price_from ";
    }
    if(!empty($price_to)){
        $sql .= "AND cena <= :price_to ";
    }
    if(!empty($size_from)){
        $sql .= "AND kvadratura >= :size_from ";
    }
    if(!empty($size_to)){
        $sql .= "AND kvadratura <= :size_to ";
    }
    $sql .= "AND kategorija = :category ";

    switch($order){
        case 1: $sql .= "ORDER BY s.id DESC "; break;
        case 2: $sql .= "ORDER BY s.id ASC "; break;
        case 3: $sql .= "ORDER BY cena ASC "; break;
        case 4: $sql .= "ORDER BY cena DESC "; break;
        default: $sql .= "ORDER BY s.id DESC "; break;
    }

    $sql .= "LIMIT $start, 9";

    $query = $conn->prepare($sql);

    if(!empty ($id)){
    $query->bindParam(':id', $id);
    }    
    if(!empty ($price_from)){
    $query->bindParam(':price_from', $price_from);
    }
    if(!empty ($price_to)){
    $query->bindParam(':price_to', $price_to);
    }
    if(!empty ($size_from)){
    $query->bindParam(':size_from', $size_from);
    }
    if(!empty ($size_to)){
    $query->bindParam(':size_to', $size_to);
    }
    $query->bindParam(':category', $category);
    
        // echo $sql;

    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
}



function checkLang(){
    if(isset($_COOKIE['jevtic_lang'])){
        return $_COOKIE['jevtic_lang'];
    }
    else{
            setcookie('jevtic_lang', 'rs', time() + (86400 * 30));
            return 'rs';
    }
}

function kratakOpis($opis){
    if(strlen($opis) > 80 )
    {
         return substr($opis,0,strpos($opis,' ',80));
    }
    else {
         return $opis;
    }
}

function getStats(){
    global $conn;
    $danas = date('Y-m-d');

    $sql = "SELECT COUNT(*) FROM stanovi 
            WHERE vidljiv = 1
            AND tip = 'Stan' 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    $query = $conn->prepare($sql);
    $query->execute();
    $stats['stanovi'] = $query->fetchColumn();

    $sql = "SELECT COUNT(*) FROM stanovi 
            WHERE vidljiv = 1
            AND tip = 'Kuća' 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    $query = $conn->prepare($sql);
    $query->execute();
    $stats['kuce'] = $query->fetchColumn();

    $sql = "SELECT COUNT(*) FROM stanovi 
            WHERE vidljiv = 1
            AND tip = 'Poslovni prostor' 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    $query = $conn->prepare($sql);
    $query->execute();
    $stats['poslovniprostori'] = $query->fetchColumn();    

    $sql = "SELECT COUNT(*) FROM stanovi 
            WHERE vidljiv = 1
            AND tip = 'Poslovna zgrada' 
            AND (vidljiv_do IS NULL OR vidljiv_do >= '$danas') ";
    $query = $conn->prepare($sql);
    $query->execute();
    $stats['poslovnezgrade'] = $query->fetchColumn();    

    return $stats;

}