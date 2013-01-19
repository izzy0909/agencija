<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';

    
    
   $row = prikaziSveOpstine();


//var_dump($row);
                        
                        
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Moving</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<!--==============================header=================================-->
    <header>
    	<div class="head-bg">
        <div class="main">
        	<div class="head-box1">
            <h1><a class="logo" href="index.php">logo</a></h1>
            <div class="head-box2">
            	<span>1-800-555-1234</span>
                <div class="clear"></div>
                <a class="link1" href="#">realestate@demolink.org</a>
            </div>
            <div class="clear"></div>
            </div>            
        </div>
        <div class="clear"></div>
        <div class="head-box3">
        	<div class="main">
            	<nav>
                <ul class="sf-menu">
                    <li><a href="index.php">Početna</a>
                    	<ul>
                            <li><a href="more.html">Homes for Sale</a></li>
                            <li><a href="more.html">New Homes for Sale</a></li>
                            <li><a href="more.html">Foreclosures</a></li>
                            <li><a href="more.html">Rentals</a></li>
                            <li><a class="last3" href="more.html">Properties</a>
                            	<ul>
                                    <li><a href="more.html">Bedrooms</a></li>
                                    <li><a href="more.html">New Homes </a></li>
                                    <li><a href="more.html">House Description</a></li>
                                    <li><a href="more.html">Latest News</a></li>
                                    <li><a class="last3" href="more.html">Our Contacts</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="izdavanje.php">Izdavanje</a></li>
                    <li><a href="prodaja.php">Prodaja</a></li>
                    <li><a class="active" href="slanje.php">Pošaljite Nekretninu</a></li>
                    <li><a href="onama.php">O nama</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                </ul>
                <div class="clear"></div>
            </nav>            
            </div>
        </div>        
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content">
        <div class="container_12">
        	<div class="wrapper">
                    
            	<article class="grid_8">
                	
        <!--<form id="form_send" class="jqtransform p5"> -->
                
                <div id="sforma">
                    <h3 class="title">Pošaljite vašu nekretninu</h3>
                <form id="form_send" action="posalji_stan.php" method="post">
                <table>
                <tr>
                <td>    
                    
		<table>
		<tr>
			<th>Vlasnik:</th>
			<td><input type="text" name="vlasnik" /></td>
		</tr>
		<tr>
			<th>Ulica i broj:</th>
			<td><input type="text" name="adresa" size="57" /></td>
		</tr>
        <tr>
			<th>Sprat:</th>
			<td><input type="text" name="sprat" /></td>
		</tr>
		<tr>
                    <th>Lokacija:</th>
                    <td>
                    <select name="opstina">
                                     <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
                </select>
                    </td>

                <tr>
                <th>Telefon:</th>
                <td><input type="text" name="telefon" /></td>
                </tr>    
                <tr>
                <th>Cena:</th>
                <td><input type="text" name="cena" /></td>
                </tr>     
                <tr>
                <th>Kvadratura:</th>
                <td><input type="text" name="kvadratura" /></td>
                </tr>
                <tr>
                <th>Nameštenost</th>
                <td>
                    <select name="namestenost">
                        <option value="Namešten">Namešten</option>
                        <option value="Nenamešten">Nenamešten</option>
                    </select>
                </td>
                </tr>
                <tr>
                <th>Opis:</th>
                <td><textarea style="resize: none;" rows="4" cols="42" name="opis"></textarea></td>
                </tr>
                <tr>
                <th>Slika 1:</th>
                <td><input type="file" id="file" name="slika1" /></td>
                </tr>
                <tr>
                <th>Slika 2:</th>
                <td><input type="file" name="slika2" /></td>
                </tr>                
                <tr>
                <th>Slika 3:</th>
                <td><input type="file" name="slika3" /></td>
                </tr>                
                <tr>
		<th>&nbsp;</th>
		<td>
                <input type="submit" value="Pošalji" class="button" name="posalji_stan"  />
		<input type="reset" value="Obriši" class="button" />
		</td>
                </tr>                
                </table>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
            <table>
                <tr>
                    <td><input type="checkbox" name="grejanje" >Grejanje</td>
                    </tr>
                <tr>
                    <td><input type="checkbox" name="kablovska" >Kablovska</td>
                    </tr>   
                <tr>
                    <td><input type="checkbox" name="tv" >TV</td>
                </tr>     
                <tr>
                    <td><input type="checkbox" name="klima" >Klima</td>
                </tr>                
                <tr>
                    <td><input type="checkbox" name="internet" >Internet</td>
                </tr>                
                <tr>
                <td><input type="checkbox" name="telefon" id="check" class="check" >Telefon</td>
                </tr>                
            </table>
                </td>
                </tr>
                </table>
                
    </form>
                </div>
     </article>    
                    <article class="grid_4">
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>
                        Dodatne informacije nekeDodatne informacije neke<br/>                        
                    </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>