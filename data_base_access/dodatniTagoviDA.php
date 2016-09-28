<?php

include_once 'connection.php';

function dodajDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice)
{
    global $conn;

    $sql = "INSERT INTO dodatni_tagovi (id, stan_id, kablovska, tv, klima, internet, telefon, frizider, sporet, ves_masina, kuhinjski_elementi, plakari, interfon, lift, bazen, garaza, parking, dvoriste, potkrovlje, terasa, novogradnja, renovirano, lux, penthaus, salonski, lodja, duplex, nov_namestaj, kompjuterska_mreza, dva_kupatila, vise_telefonskih_linija, stan_u_kuci, samostojeca_kuca, kuca_s_dvoristem, kucni_ljubimci, balkon, video_nadzor, alarm, basta, pomocni_objekti, ostava, podrum, opticki_kabl, open_space, pristup_za_invalide, lokal_na_ulici, pravno_lice)
            VALUES              ('', :stan_id, :kablovska, :tv, :klima, :internet, :telefon, :frizider, :sporet, :ves_masina, :kuhinjski_elementi, :plakari, :interfon, :lift, :bazen, :garaza, :parking, :dvoriste, :potkrovlje, :terasa, :novogradnja, :renovirano, :lux, :penthaus, :salonski, :lodja, :duplex, :nov_namestaj, :kompjuterska_mreza, :dva_kupatila, :vise_telefonskih_linija, :stan_u_kuci, :samostojeca_kuca, :kuca_s_dvoristem, :kucni_ljubimci, :balkon, :video_nadzor, :alarm, :basta, :pomocni_objekti, :ostava, :podrum, :opticki_kabl, :open_space, :pristup_za_invalide, :lokal_na_ulici, :pravno_lice)";
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
        ':stan_u_kuci' => $stan_u_kuci,
        ':samostojeca_kuca' => $samostojeca_kuca,
        ':kuca_s_dvoristem' => $kuca_s_dvoristem,
        ':kucni_ljubimci' => $kucni_ljubimci,
        ':balkon' => $balkon,
        ':video_nadzor' => $video_nadzor,
        ':alarm' => $alarm,
        ':basta' => $basta,
        ':pomocni_objekti' => $pomocni_objekti,
        ':ostava' => $ostava,
        ':podrum' => $podrum,
        ':opticki_kabl' => $opticki_kabl,
        ':open_space' => $open_space,
        ':pristup_za_invalide' => $pristup_za_invalide,
        ':lokal_na_ulici' => $lokal_na_ulici,
        ':pravno_lice' => $pravno_lice
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

function izmeniDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $telefon, $frizider, $sporet, $ves_masina, $kuhinjski_elementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice)
{
    global $conn;

    $sql = "UPDATE dodatni_tagovi
                    SET kablovska = :kablovska, tv = :tv, klima = :klima, internet = :internet, telefon = :telefon, frizider = :frizider, sporet = :sporet, ves_masina = :ves_masina, kuhinjski_elementi = :kuhinjski_elementi, plakari = :plakari, interfon = :interfon, lift = :lift, bazen = :bazen, garaza = :garaza, parking = :parking, dvoriste = :dvoriste, potkrovlje = :potkrovlje, terasa = :terasa, novogradnja = :novogradnja, renovirano = :renovirano, lux = :lux, penthaus = :penthaus, salonski = :salonski, lodja = :lodja, duplex = :duplex, nov_namestaj = :nov_namestaj, kompjuterska_mreza = :kompjuterska_mreza, dva_kupatila = :dva_kupatila, vise_telefonskih_linija = :vise_telefonskih_linija, stan_u_kuci = :stan_u_kuci, samostojeca_kuca = :samostojeca_kuca, kuca_s_dvoristem = :kuca_s_dvoristem, kucni_ljubimci = :kucni_ljubimci, balkon = :balkon, video_nadzor = :video_nadzor, alarm = :alarm, basta = :basta, pomocni_objekti = :pomocni_objekti, ostava = :ostava, podrum = :podrum, opticki_kabl = :opticki_kabl, open_space = :open_space, pristup_za_invalide = :pristup_za_invalide, lokal_na_ulici = :lokal_na_ulici, pravno_lice = :pravno_lice
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
        ':stan_u_kuci' => $stan_u_kuci,
        ':samostojeca_kuca' => $samostojeca_kuca,
        ':kuca_s_dvoristem' => $kuca_s_dvoristem,
        ':kucni_ljubimci' => $kucni_ljubimci,
        ':balkon' => $balkon,
        ':video_nadzor' => $video_nadzor,
        ':alarm' => $alarm,
        ':basta' => $basta,
        ':pomocni_objekti' => $pomocni_objekti,
        ':ostava' => $ostava,
        ':podrum' => $podrum,
        ':opticki_kabl' => $opticki_kabl,
        ':open_space' => $open_space,
        ':pristup_za_invalide' => $pristup_za_invalide,
        ':lokal_na_ulici' => $lokal_na_ulici,
        ':pravno_lice' => $pravno_lice,
        ':stan_id' => $stan_id
        ));
}