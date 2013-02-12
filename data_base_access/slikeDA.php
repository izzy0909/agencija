<?php

include_once 'connection.php';


function dodajSliku($NewImageName, $thumb_NewImageName, $stan_id, $DestRandImageName, $thumb_DestRandImageName, $watermark_image_name, $watermark_destination)
{
    global $conn;

    $sql = "INSERT INTO slike (id, naziv, stan_id, putanja, glavna, vrsta)
            VALUES              ('', :naziv, :stan_id, :putanja, '0', 'velika')";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':naziv' => $NewImageName,
		':stan_id' => $stan_id,
		':putanja' => $DestRandImageName
        ));
	
	$sql = "INSERT INTO slike (id, naziv, stan_id, putanja, glavna, vrsta)
            VALUES              ('', :naziv, :stan_id, :putanja, '0', 'mala')";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':naziv' => $thumb_NewImageName,
		':stan_id' => $stan_id,
		':putanja' => $thumb_DestRandImageName
        ));
		
	$sql = "INSERT INTO slike (id, naziv, stan_id, putanja, glavna, vrsta)
            VALUES              ('', :naziv, :stan_id, :putanja, '0', 'watermark')";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':naziv' => $watermark_image_name,
		':stan_id' => $stan_id,
		':putanja' => $watermark_destination
        ));
}

function prikaziSlike($stan_id, $vrsta)
{
    global $conn;
    
    $sql = "SELECT * FROM slike WHERE stan_id = :stan_id AND vrsta = :vrsta";
    $query = $conn->prepare($sql);
    $query->execute(array(
                ':stan_id' => $stan_id,
		':vrsta' => $vrsta
		));
    return $query->fetchAll(PDO::FETCH_BOTH);
}

function izbrisiSliku($id){
    global $conn;

    $sql = "DELETE FROM slike
			WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));

}

function postaviGlavnu($stan_id, $slika_id){
    global $conn;

    $sql = "UPDATE slike SET glavna = '0' WHERE stan_id = :stan_id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':stan_id' => $stan_id
		));

    $sql = "UPDATE slike SET glavna = '1' WHERE stan_id = :stan_id AND id = :slika_id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':stan_id' => $stan_id,
                ':slika_id' => $slika_id
		));


}

function prikaziSlikuThumb($id){
    global $conn;

    $sql = "SELECT * FROM slike
            WHERE stan_id = :id and glavna = '1'";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();
    
}