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

    $sql = "SELECT * FROM podsetnik as p 
			INNER JOIN korisnici as k
			ON p.korisnik_id = k.id 
			WHERE username = :username
			ORDER BY datum DESC";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':username' => $user
		));
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}


