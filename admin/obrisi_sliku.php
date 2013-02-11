<?php


include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['slika_id'])){

	$id = $_GET['slika_id'];
	izbrisiSliku($id);

	header("Location:".$_SERVER['HTTP_REFERER']);
	}

}

