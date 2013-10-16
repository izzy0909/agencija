<?php
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/ponudeDA.php';
include_once '../data_base_access/slikeDA.php';
include_once '../data_base_access/imenikDA.php';

if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
        $dodao = $_SESSION['username'];
        echo $dodao;
	if (isset ($_GET['id'])){
	$id = $_GET['id'];
	$ponuda = prikaziPonudu($id);
        
        $stan_id = dodajStan($ponuda['kategorija'], $ponuda['tip'], $ponuda['stan_tip'], $ponuda['vlasnik'], $ponuda['lokacija_id'], 'null', $ponuda['ulica'],$ponuda['br'], $ponuda['sprat'], $ponuda['telefon'], $ponuda['email'], $ponuda['cena'], $ponuda['kvadratura'], $ponuda['grejanje'], $ponuda['namestenost'], $ponuda['opis'], '0', $dodao);
        dodajDodatneTagove($stan_id, $ponuda['t_kablovska'], $ponuda['t_tv'], $ponuda['t_klima'], $ponuda['t_internet'], $ponuda['t_telefon'], $ponuda['t_frizider'], $ponuda['t_sporet'], $ponuda['t_vesmasina'], $ponuda['t_kuhinjskielementi'], $ponuda['t_plakari'], $ponuda['t_interfon'], $ponuda['t_lift'], $ponuda['t_bazen'], $ponuda['t_garaza'], $ponuda['t_parking'], $ponuda['t_dvoriste'], $ponuda['t_potkrovlje'], $ponuda['t_terasa'], $ponuda['t_novogradnja'], $ponuda['t_renovirano'], $ponuda['t_lux'], $ponuda['t_penthaus'], $ponuda['t_salonski'], $ponuda['t_lodja'], $ponuda['t_duplex'], $ponuda['t_nov_namestaj'], $ponuda['t_kompjuterska_mreza'], $ponuda['t_dva_kupatila'], $ponuda['t_vise_telefonskih_linija'], $ponuda['t_vertikala'], $ponuda['t_horizontala'], $ponuda['t_stan_u_kuci']);
       
        dodajBroj('vlasnik', $ponuda['telefon']);
        
        prenesiSlikeZaPonude($id, $stan_id);
        izbrisiPonudu($id);

	header('Location: spisak_ponuda.php');
	} 
	else header('Location: spisak_ponuda.php');
}   