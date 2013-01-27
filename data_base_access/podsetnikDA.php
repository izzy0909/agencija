<?php

include_once 'connection.php';


function dodajPodsetnik($korisnik_id, $poruka, $datum_podsecanja)
{
    global $conn;

    $sql = "INSERT INTO podsetnik (id, korisnik_id, poruka, zavrsen, datum_podsecanja)
            VALUES              ('', :korisnik_id, :poruka, '', :datum_podsecanja)";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':korisnik_id' => $korisnik_id,
        ':poruka' => $poruka,
		':datum_podsecanja' => $datum_podsecanja
        ));
		
}

function prikaziPorukeZaOdredjenogKorisnika($user){
    global $conn;

    $sql = "SELECT * FROM podsetnik as p 
			INNER JOIN korisnici as k
			ON p.korisnik_id = k.id 
			WHERE username = :username
			ORDER BY datum_dodavanja DESC";
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

function prikaziPorukeZaDanasnjiDatum($user){
    global $conn;

    $sql = "SELECT * FROM podsetnik as p 
			INNER JOIN korisnici as k
			ON p.korisnik_id = k.id 
			WHERE username = :username
			AND datum_podsecanja = CURDATE()";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':username' => $user
		));
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prebrojDanasnjePorukeZaKorisnika($user){
    global $conn;

    $sql = "SELECT COUNT(*) AS ukupno FROM podsetnik as p 
			INNER JOIN korisnici as k
			ON p.korisnik_id = k.id 
			WHERE username = :username
			AND datum_podsecanja = CURDATE()";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':username' => $user
		));
    return $query->fetch();
    
}