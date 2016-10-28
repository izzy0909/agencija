<?php

include_once 'connection.php';


function dodajKlijenta($ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $cena, $kvadratura, $agent, $sekretarica)
{
    global $conn;
    

    $sql = "INSERT INTO klijenti (klijent_id, ime, telefon, email, kategorija, tip, stan_tip, lokacija_id, cena, kvadratura, agent, sekretarica)
            VALUES             ('', :ime, :telefon, :email, :kategorija, :tip, :stan_tip, :lokacija_id, :cena, :kvadratura, :agent, :sekretarica)";
    $query = $conn->prepare($sql);
    $query->execute(array(
	    ':ime' => $ime,
        ':telefon' => $telefon,
        ':email' => $email,
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
        ':lokacija_id' => $lokacija_id,
        ':cena' => $cena,
        ':kvadratura' => $kvadratura,
        ':agent' => $agent,
        ':sekretarica' => $sekretarica
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

function izmeniKlijenta($id, $ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $cena, $kvadratura, $agent, $sekretarica)
{
    global $conn;
    

    $sql = "UPDATE klijenti SET ime = :ime, telefon = :telefon, email = :email, kategorija = :kategorija, tip = :tip, stan_tip = :stan_tip, lokacija_id = :lokacija_id, cena = :cena, kvadratura = :kvadratura, agent = :agent, sekretarica = :sekretarica WHERE klijent_id = :id";
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
        ':cena' => $cena,
        ':kvadratura' => $kvadratura,
        ':agent' => $agent,
        ':sekretarica' => $sekretarica
        )); 
}