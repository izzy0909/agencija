<?php

include_once 'connection.php';


function dodajStan($kategorija, $tip, $stan_tip, $vlasnik, $lokacija_id, $ulica, $br, $sprat, $telefon, $email, $cena, $kvadratura, $grejanje, $namestenost, $opis, $vidljiv, $dodao)
{
    global $conn;

    $sql = "INSERT INTO stanovi (id, kategorija, tip, stan_tip, vlasnik, lokacija_id, ulica, br, sprat, telefon, email, cena, kvadratura, grejanje, namestenost, opis, vidljiv, dodao)
            VALUES              ('', :kategorija, :tip, :stan_tip, :vlasnik, :lokacija_id, :ulica, :br, :sprat, :telefon, :email, :cena, :kvadratura, :grejanje, :namestenost, :opis, :vidljiv, :dodao)";
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
        ':vidljiv' => $vidljiv,
        ':dodao' => $dodao
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

function prikaziSveStanove($start, $limit){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            LIMIT $start, $limit";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziPoslednjeStanove(){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1
            ORDER BY datum_dodavanja DESC
            LIMIT 0, 8";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);  
}

function prikaziHotOfferStanove(){
    global $conn;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE hot_offer = '1'
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

function prikaziStan($id){
    global $conn;

    $sql = "SELECT * FROM stanovi as s 
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE s.id = :id LIMIT 1";
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
    
}

function ukupanBrojStanova(){
    global $conn;

    $sql = "SELECT COUNT(*) as broj 
            FROM stanovi";
    $query = $conn->prepare($sql);
    $query->execute();
	return $query->fetch();
    
}

function izmeniStan($id, $vlasnik, $telefon, $email, $ulica, $br, $cena, $kvadratura, $opis){
    global $conn;

    $sql = "UPDATE stanovi
            SET vlasnik = :vlasnik, telefon = :telefon, email = :email, ulica = :ulica, br = :br, cena = :cena, kvadratura = :kvadratura, opis = :opis
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':vlasnik' => $vlasnik,
		':telefon' => $telefon,
		':email' => $email,        
		':ulica' => $ulica,
                ':br' => $br,
		':cena' => $cena,
		':kvadratura' => $kvadratura,
		':opis' => $opis,
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

function pretraziStanove($id, $opstina, $povrsina_od, $povrsina_do, $cena_od, $cena_do, $vlasnik){
    global $conn;
	
    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE s.id != '' ";
    if(!empty ($id)){
    $sql .= "AND s.id LIKE :id ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = :lokacija_id ";
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
    if(!empty ($vlasnik)){
    $sql .= "AND vlasnik LIKE :vlasnik";
    }
    
    $query = $conn->prepare($sql);
	
	if(!empty ($id)){
	$id = "%" . $id . "%";
    $query->bindParam(':id', $id);
    }
    if(!empty ($opstina)){
    $query->bindParam(':lokacija_id', $opstina);
    }
    if(!empty ($povrsina_od)){
    $query->bindValue(':povrsina_od', $povrsina_od);
    }
    if(!empty ($povrsina_do)){
    $query->bindValue(':povrsina_do', $povrsina_do);
    }
    if(!empty ($cena_od)){
    $query->bindValue(':cena_od', $cena_od);
    }
    if(!empty ($cena_do)){
    $query->bindValue(':cena_do', $cena_do);
    }
    if(!empty ($vlasnik)){
	$vlasnik = "%" . $vlasnik . "%";
    $query->bindParam(':vlasnik', $vlasnik);
    }
	
	
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function pretragaStanovaZaIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 ";
    if(!empty ($tip)){
    $sql .= "AND tip = :tip ";
    }
    if(!empty ($stan_tip)){
    $sql .= "AND stan_tip = :stan_tip ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = :lokacija_id ";
    }
    if(!empty ($sprat)){
    $sql .= "AND sprat = :sprat ";
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
    $sql .= "AND grejanje = :grejanje ";
    }
    if(!empty ($namestenost)){
    $sql .= "AND namestenost = :namestenost ";
    }
    $sql .= "AND kategorija = 'izdavanje' ";

	$query = $conn->prepare($sql);
	
	if(!empty ($tip)){
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
    }
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
    if(!empty ($grejanje)){
	$query->bindParam(':grejanje', $grejanje);
    }
    if(!empty ($namestenost)){
	$query->bindParam(':namestenost', $namestenost);
    }
	
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function brojRezultataIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;

    $sql = "SELECT COUNT(*) FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 ";
    if(!empty ($tip)){
    $sql .= "AND tip = :tip ";
    }
    if(!empty ($stan_tip)){
    $sql .= "AND stan_tip = :stan_tip ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = :lokacija_id ";
    }
    if(!empty ($sprat)){
    $sql .= "AND sprat = :sprat ";
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
    $sql .= "AND grejanje = :grejanje ";
    }
    if(!empty ($namestenost)){
    $sql .= "AND namestenost = :namestenost ";
    }
    $sql .= "AND kategorija = 'izdavanje' ";

	$query = $conn->prepare($sql);
	
	if(!empty ($tip)){
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
    }
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
    if(!empty ($grejanje)){
	$query->bindParam(':grejanje', $grejanje);
    }
    if(!empty ($namestenost)){
	$query->bindParam(':namestenost', $namestenost);
    }
	
    $query->execute();
    return $query->fetch();

}

function brojRezultataProdaja($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;

    $sql = "SELECT COUNT(*) FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 ";
    if(!empty ($tip)){
    $sql .= "AND tip = :tip ";
    }
    if(!empty ($stan_tip)){
    $sql .= "AND stan_tip = :stan_tip ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = :lokacija_id ";
    }
    if(!empty ($sprat)){
    $sql .= "AND sprat = :sprat ";
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
    $sql .= "AND grejanje = :grejanje ";
    }
    if(!empty ($namestenost)){
    $sql .= "AND namestenost = :namestenost ";
    }
    $sql .= "AND kategorija = 'prodaja' ";

	$query = $conn->prepare($sql);
	
	if(!empty ($tip)){
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
    }
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
    if(!empty ($grejanje)){
	$query->bindParam(':grejanje', $grejanje);
    }
    if(!empty ($namestenost)){
	$query->bindParam(':namestenost', $namestenost);
    }
	
    $query->execute();
    return $query->fetch();

}

function pretragaStanovaZaProdaju($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 ";
    if(!empty ($tip)){
    $sql .= "AND tip = :tip ";
    }
    if(!empty ($stan_tip)){
    $sql .= "AND stan_tip = :stan_tip ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = :lokacija_id ";
    }
    if(!empty ($sprat)){
    $sql .= "AND sprat = :sprat ";
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
    $sql .= "AND grejanje = :grejanje ";
    }
    if(!empty ($namestenost)){
    $sql .= "AND namestenost = :namestenost ";
    }
    $sql .= "AND kategorija = 'prodaja' ";

	$query = $conn->prepare($sql);
	
	if(!empty ($tip)){
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
    }
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
    if(!empty ($grejanje)){
	$query->bindParam(':grejanje', $grejanje);
    }
    if(!empty ($namestenost)){
	$query->bindParam(':namestenost', $namestenost);
    }
	
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}