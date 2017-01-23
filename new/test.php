<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';


require_once 'lang/' . checkLang() . '.php';


$active = 'about';
$areas = prikaziSveOpstine();

$fav = 0;
if(isset($_COOKIE['jevtic_favorites'])){
  $favorites = $_COOKIE['jevtic_favorites'];
  if(stripos($favorites, ',')){        // ako ima vise id-eva

    if(stripos($favorites, $stan[0])===0 || stripos($favorites, $stan[0])>0) {
      $fav = 1;
    }
  }

  else{ // ako je samo jedan
    if($favorites == $stan[0]){
      $fav = 1;
    }
  }
}

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';


?>


					<a class=" gallery" href="/agencija/admin/slike/watermark_1136641469.jpg"><img src="/agencija/admin/slike/watermark_1136641469.jpg" width="200px" /></a>
					<a class=" gallery" href="assets/images/droplets.jpg"><img src="assets/images/droplets.thumb.jpg" /></a>
					<a class=" gallery" href="assets/images/blue.jpg"><img src="assets/images/blue.thumb.jpg" /></a>
					<a class=" gallery" href="assets/images/feed.jpg"><img src="assets/images/feed.thumb.jpg" /></a>
					<a class=" gallery" href="assets/images/black.jpg"><img src="assets/images/black.thumb.jpg" /></a>
					<a class=" gallery" href="assets/images/red_and_yellow.jpg"><img src="assets/images/red_and_yellow.thumb.jpg" /></a>






<?php 

include_once 'parts/footer.php';
include_once 'parts/html-close.php';



?>