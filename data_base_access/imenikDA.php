<?php

include_once 'connection.php';


function dodajBroj($agencija, $broj)
{
    global $conn;

    $sql = "INSERT INTO imenik (id, agencija, broj)
            VALUES              ('', :agencija, :broj)
            ON DUPLICATE KEY UPDATE broj=:broj";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':agencija' => $agencija,
        ':broj' => $broj
        ));

}

function pretraziImenik($broj){
    global $conn;

    $sql = "SELECT * FROM imenik
            WHERE broj LIKE :broj";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':broj' => '%'.$broj.'%'
		));
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function izbrisiBroj($id){
    global $conn;

    $sql = "DELETE FROM imenik
			WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    
}

function prikaziSveBrojeve($start, $limit){
    global $conn;

    $sql = "SELECT * FROM imenik
            LIMIT $start, $limit";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);

}

function ukupnoBrojeva(){
    global $conn;

        $sql = "SELECT COUNT(*) as broj
                FROM imenik";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetch();

}