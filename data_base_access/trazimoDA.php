<?php

include_once 'connection.php';


function dodajTrazimo($kategorija, $tip, $stan_tip, $lokacija_id, $ime, $telefon, $email, $sprat, $grejanje, $namestenost, $povrsina_od, $povrsina_do, $cena_od, $cena_do, $opis)
{
    global $conn;
    
    $sql = "INSERT INTO trazimo_za_vas (id, kategorija, tip, stan_tip, lokacija_id, ime, telefon, email, sprat, grejanje, namestenost, povrsina_od, povrsina_do, cena_od, cena_do, opis)
            VALUES              ('', :kategorija, :tip, :stan_tip, :lokacija_id, :telefon, :email, :sprat, :grejanje, :namestenost, :povrsina_od, :povrsina_do, :cena_od, :cena_do, :opis)";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':kategorija' => $kategorija,
        ':tip' => $tip,
        ':stan_tip' => $stan_tip,
        ':lokacija_id' => $lokacija_id,
        ':ime' => $ime,
        ':telefon' => $telefon,
        ':email' => $email,
        ':sprat' => $sprat,
        ':grejanje' => $grejanje,
        ':namestenost' => $namestenost,
        ':povrsina_od' => $povrsina_od,
        ':povrsina_do' => $povrsina_do,
        ':cena_od' => $cena_od,
        ':cena_do' => $cena_do,
        ':opis' => $opis
        ));
}

function prikaziTrazimo($id){
    global $conn;

    $sql = "SELECT * FROM trazimo_za_vas as t 
            INNER JOIN lokacija as l
            ON t.lokacija_id = l.id
            WHERE t.id = :id LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();    
}

function izbrisiTrazimo($id){
    global $conn;

    $sql = "DELETE FROM trazimo_za_vas
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    
}