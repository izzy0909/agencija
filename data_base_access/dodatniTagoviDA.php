<?php

include_once 'connection.php';

function dodajDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $vertikala, $horizontala, $stan_u_kuci)
{
    global $conn;

    $sql = "INSERT INTO dodatni_tagovi (id, stan_id, kablovska, tv, klima, internet, telefon, frizider, sporet, ves_masina, kuhinjski_elementi, plakari, interfon, lift, bazen, garaza, parking, dvoriste, potkrovlje, terasa, novogradnja, renovirano, lux, penthaus, salonski, lodja, duplex, nov_namestaj, kompjuterska_mreza, dva_kupatila, vise_telefonskih_linija, vertikala, horizontala, stan_u_kuci)
            VALUES              ('', :stan_id, :kablovska, :tv, :klima, :internet, :telefon, :frizider, :sporet, :ves_masina, :kuhinjski_elementi, :plakari, :interfon, :lift, :bazen, :garaza, :parking, :dvoriste, :potkrovlje, :terasa, :novogradnja, :renovirano, :lux, :penthaus, :salonski, :lodja, :duplex, :nov_namestaj, :kompjuterska_mreza, :dva_kupatila, :vise_telefonskih_linija, :vertikala, :horizontala, :stan_u_kuci)";
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
        ':lodja' => $lodja,
        ':duplex' => $duplex,
        ':nov_namestaj' => $nov_namestaj,
        ':kompjuterska_mreza' => $kompjuterska_mreza,
        ':dva_kupatila' => $dva_kupatila,
        ':vise_telefonskih_linija' => $vise_telefonskih_linija,
        ':vertikala' => $vertikala,
        ':horizontala' => $horizontala,
        ':stan_u_kuci' => $stan_u_kuci
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

function izmeniDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $vertikala, $horizontala, $stan_u_kuci)
{
    global $conn;

    $sql = "UPDATE dodatni_tagovi
                    SET kablovska = :kablovska, tv = :tv, klima = :klima, internet = :internet, telefon = :telefon, frizider = :frizider, sporet = :sporet, ves_masina = :ves_masina, kuhinjski_elementi = :kuhinjski_elementi, plakari = :plakari, interfon = :interfon, lift = :lift, bazen = :bazen, garaza = :garaza, parking = :parking, dvoriste = :dvoriste, potkrovlje = :potkrovlje, terasa = :terasa, novogradnja = :novogradnja, renovirano = :renovirano, lux = :lux, penthaus = :penthaus, salonski = :salonski, lodja = :lodja, duplex = :duplex, nov_namestaj = :nov_namestaj, kompjuterska_mreza = :kompjuterska_mreza, dva_kupatila = :dva_kupatila, vise_telefonskih_linija = :vise_telefonskih_linija, vertikala = :vertikala, horizontala = :horizontala, stan_u_kuci = :stan_u_kuci 
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
        ':duplex' => $duplex,
        ':nov_namestaj' => $nov_namestaj,
        ':kompjuterska_mreza' => $kompjuterska_mreza,
        ':dva_kupatila' => $dva_kupatila,
        ':vise_telefonskih_linija' => $vise_telefonskih_linija,
        ':vertikala' => $vertikala,
        ':horizontala' => $horizontala,
        ':stan_u_kuci' => $stan_u_kuci,
        ':stan_id' => $stan_id
        ));
}