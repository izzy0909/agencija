<?php

include_once 'connection.php';

function dodajDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja)
{
    global $conn;

    $sql = "INSERT INTO dodatni_tagovi (id, stan_id, kablovska, tv, klima, internet, telefon, frizider, sporet, ves_masina, kuhinjski_elementi, plakari, interfon, lift, bazen, garaza, parking, dvoriste, potkrovlje, terasa, novogradnja, renovirano, lux, penthaus, salonski, lodja)
            VALUES              ('', :stan_id, :kablovska, :tv, :klima, :internet, :telefon, :frizider, :sporet, :ves_masina, :kuhinjski_elementi, :plakari, :interfon, :lift, :bazen, :garaza, :parking, :dvoriste, :potkrovlje, :terasa, :novogradnja, :renovirano, :lux, :penthaus, :salonski, :lodja)";
    $query = $conn->prepare($sql);
    $query->execute(array(
	':stan_id' => $stan_id,
        ':kablovska' => $kablovska,
        ':tv' => $tv,
        ':klima' => $klima,
        ':internet' => $internet,
        ':telefon' => $telefon,
        ':frizider' => $frizider,
        ':sporet' => $sporet,
        ':ves_masina' => $ves_masina,
        ':kuhinjski_elementi' => $kuhinjski_elementi,
        ':plakari' => $plakari,
        ':interfon' => $interfon,
        ':lift' => $lift,
        ':bazen' => $bazen,
        ':garaza' => $garaza,
        ':parking' => $parking,
        ':dvoriste' => $dvoriste,
        ':potkrovlje' => $potkrovlje,
        ':terasa' => $terasa,
        ':novogradnja' => $novogradnja,
        ':renovirano' => $renovirano,
        ':lux' => $lux,
        ':penthaus' => $penthaus,
        ':salonski' => $salonski,
        ':lodja' => $lodja
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

function izmeniDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja)
{
    global $conn;

    $sql = "UPDATE dodatni_tagovi
                    SET kablovska = :kablovska, tv = :tv, klima = :klima, internet = :internet, telefon = :telefon, frizider = :frizider, sporet = :sporet, ves_masina = :ves_masina, kuhinjski_elementi = :kuhinjski_elementi, plakari = :plakari, interfon = :interfon, lift = :lift, bazen = :bazen, garaza = :garaza, parking = :parking, dvoriste = :dvoriste, potkrovlje = :potkrovlje, terasa = :terasa, novogradnja = :novogradnja, renovirano = :renovirano, lux = :lux, penthaus = :penthaus, salonski = :salonski, lodja = :lodja
                    WHERE stan_id = :stan_id";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':kablovska' => $kablovska,
        ':tv' => $tv,
        ':klima' => $klima,
        ':internet' => $internet,
        ':telefon' => $telefon,
        ':frizider' => $frizider,
        ':sporet' => $sporet,
        ':ves_masina' => $ves_masina,
        ':kuhinjski_elementi' => $kuhinjski_elementi,
        ':plakari' => $plakari,
        ':interfon' => $interfon,
        ':lift' => $lift,
        ':bazen' => $bazen,
        ':garaza' => $garaza,
        ':parking' => $parking,
        ':dvoriste' => $dvoriste,
        ':potkrovlje' => $potkrovlje,
        ':terasa' => $terasa,
        ':novogradnja' => $novogradnja,
        ':renovirano' => $renovirano,
        ':lux' => $lux,
        ':penthaus' => $penthaus,
        ':salonski' => $salonski,
        ':lodja' => $lodja,
        ':stan_id' => $stan_id
        ));
}