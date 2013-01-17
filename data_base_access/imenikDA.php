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
            WHERE broj LIKE '%:broj%'";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':broj' => $broj
		));
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}


