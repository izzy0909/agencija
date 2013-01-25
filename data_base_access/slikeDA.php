<?php

include_once 'connection.php';


function dodajSliku($NewImageName, $thumb_NewImageName, $stan_id, $DestRandImageName, $thumb_DestRandImageName)
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
}
