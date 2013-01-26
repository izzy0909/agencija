<?php

include_once 'connection.php';


function dodajStan($vlasnik, $lokacija_id, $ulica_i_broj, $telefon, $cena, $sprat, $kvadratura, $opis)
{
    global $conn;

    $sql = "INSERT INTO stanovi (id, vlasnik, lokacija_id, ulica_i_broj, telefon, cena, sprat, kvadratura, opis)
            VALUES              ('', :vlasnik, :lokacija_id, :ulica_i_broj, :telefon, :cena, :sprat, :kvadratura, :opis)";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':vlasnik' => $vlasnik,
        ':lokacija_id' => $lokacija_id,
        ':ulica_i_broj' => $ulica_i_broj,
        ':telefon' => $telefon,
        ':cena' => $cena,
        ':sprat' => $sprat,
        ':kvadratura' => $kvadratura,
        ':opis' => $opis
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

function izmeniStan($id, $vlasnik, $ulica_i_broj, $telefon, $cena, $sprat, $kvadratura, $opis){
    global $conn;

    $sql = "UPDATE stanovi
			SET vlasnik = :vlasnik, ulica_i_broj = :ulica_i_broj, telefon = :telefon, cena = :cena, sprat = :sprat, kvadratura = :kvadratura, opis = :opis
			WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':vlasnik' => $vlasnik,
		':ulica_i_broj' => $ulica_i_broj,
		':telefon' => $telefon,
		':cena' => $cena,
		':sprat' => $sprat,
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
