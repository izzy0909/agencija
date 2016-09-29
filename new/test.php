<?php

// setcookie('jevtic_favorites', 'asd', time() -3600);

if(isset($_COOKIE['jevtic_favorites'])){
	echo $_COOKIE['jevtic_favorites'];
}
else{
	echo 'not set';
}