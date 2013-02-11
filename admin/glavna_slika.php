<?php


include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['stan_id']) && isset ($_GET['slika_id'])){

        $stan_id = $_GET['stan_id'];
	$slika_id = $_GET['slika_id'];
        
	postaviGlavnu($stan_id, $slika_id);

	header("Location:".$_SERVER['HTTP_REFERER']);
	}

}

