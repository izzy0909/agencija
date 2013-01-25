<?php

include_once 'connection.php';

function dodajDodatneTagove($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon)
{
    global $conn;

    $sql = "INSERT INTO dodatni_tagovi (id, stan_id, grejanje, kablovska, tv, klima, internet, telefon)
            VALUES              ('', :stan_id, :grejanje, :kablovska, :tv, :klima, :internet, :telefon)";
    $query = $conn->prepare($sql);
    $query->execute(array(
	':stan_id' => $stan_id,
        ':grejanje' => $grejanje,
        ':kablovska' => $kablovska,
        ':tv' => $tv,
        ':klima' => $klima,
        ':internet' => $internet,
        ':telefon' => $ima_telefon
        ));
     
}

function ispisiDodatneTagove($stan_id){
    global $conn;

    $sql = "SELECT * FROM dodatni_tagovi
            WHERE stan_id = :stan_id LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':stan_id' => $stan_id
		));
    return $query->fetch();
    
}
