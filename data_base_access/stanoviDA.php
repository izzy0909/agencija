<?php

include_once 'connection.php';


function dodajStan($kategorija, $tip, $stan_tip, $vlasnik, $lokacija_id, $ulica, $br, $sprat, $telefon, $email, $cena, $kvadratura, $grejanje, $namestenost, $opis, $vidljiv)
{
    global $conn;

    $sql = "INSERT INTO stanovi (id, kategorija, tip, stan_tip, vlasnik, lokacija_id, ulica, br, sprat, telefon, email, cena, kvadratura, grejanje, namestenost, opis, vidljiv)
            VALUES              ('', :kategorija, :tip, :stan_tip, :vlasnik, :lokacija_id, :ulica, :br, :sprat, :telefon, :email, :cena, :kvadratura, :grejanje, :namestenost, :opis, :vidljiv)";
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
        ':vidljiv' => $vidljiv
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
            ORDER BY datum_dodavanja
            LIMIT 0, 8";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);
    
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

function pretraziStanove($id, $opstina, $povrsina_od, $povrsina_do, $cena_od, $cena_do, $vlasnik){
    global $conn;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE s.id != '' ";
    if(!empty ($id)){
    $sql .= "AND s.id LIKE '%" . mysql_real_escape_string($id) . "%' ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = '" . mysql_real_escape_string($opstina). "' ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= '" . mysql_real_escape_string($povrsina_od). "' ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= '" . mysql_real_escape_string($povrsina_do). "' ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= '" . mysql_real_escape_string($cena_od). "' ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= '" . mysql_real_escape_string($cena_do). "' ";
    }
    if(!empty ($vlasnik)){
    $sql .= "AND vlasnik LIKE '%" . mysql_real_escape_string($vlasnik) . "%'";
    }
    
    
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

function pretragaStanovaZaIzdavanje($tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost){
    global $conn;

    $sql = "SELECT * FROM stanovi as s
            INNER JOIN lokacija as l
            ON s.lokacija_id = l.id
            WHERE vidljiv = 1 ";
    if(!empty ($tip)){
    $sql .= "AND tip = '" . mysql_real_escape_string($tip). "' ";
    }
    if(!empty ($opstina)){
    $sql .= "AND lokacija_id = '" . mysql_real_escape_string($opstina). "' ";
    }
    if(!empty ($sprat)){
    $sql .= "AND sprat = '" . mysql_real_escape_string($sprat). "' ";
    }
    if(!empty ($povrsina_od)){
    $sql .= "AND kvadratura >= '" . mysql_real_escape_string($povrsina_od). "' ";
    }
    if(!empty ($povrsina_do)){
    $sql .= "AND kvadratura <= '" . mysql_real_escape_string($povrsina_do). "' ";
    }
    if(!empty ($cena_od)){
    $sql .= "AND cena >= '" . mysql_real_escape_string($cena_od). "' ";
    }
    if(!empty ($cena_do)){
    $sql .= "AND cena <= '" . mysql_real_escape_string($cena_do). "' ";
    }
    if(!empty ($grejanje)){
    $sql .= "AND grejanje = '" . mysql_real_escape_string($grejanje). "' ";
    }
    if(!empty ($namestenost)){
    $sql .= "AND namestenost = '" . mysql_real_escape_string($namestenost). "' ";
    }
    $sql .= "AND kategorija = 'izdavanje' ";

    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);

}

