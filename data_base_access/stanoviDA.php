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
