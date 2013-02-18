<?php


include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['slika_naziv'])){

	$naziv = $_GET['slika_naziv'];
	izbrisiSliku($naziv);
        unlink("slike/" . $naziv);
        unlink("slike/thumb_" . $naziv);
        unlink("slike/watermark_" . $naziv);
	header("Location:".$_SERVER['HTTP_REFERER']);
	}

}

