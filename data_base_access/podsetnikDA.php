<?php

include_once 'connection.php';


function dodajPodsetnik($korisnik_id, $poruka)
{
    global $conn;

    $sql = "INSERT INTO podsetnik (id, korisnik_id, poruka, zavrsen)
            VALUES              ('', :korisnik_id, :poruka, '')";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':korisnik_id' => $korisnik_id,
        ':poruka' => $poruka
        ));

}

function prikaziPorukeZaOdredjenogKorisnika($user){
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

function izbrisiPodsetnik($id){
    global $conn;

    $sql = "DELETE FROM podsetnik
			WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    
}
