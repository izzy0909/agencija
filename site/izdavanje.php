<?php

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
    

   $row = prikaziSveOpstine();

   
                   if (isset ($_GET['pretrazi'])){
                    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
                    $opstina = isset($_GET['opstina']) ? $_GET['opstina'] : null;
                    $grejanje = isset($_GET['grejanje']) ? $_GET['grejanje'] : null;
                    $namestenost = isset($_GET['namestenost']) ? $_GET['namestenost'] : null;
                    $tip = isset($_GET['sprat']) ? $_GET['sprat'] : null;
                    $povrsina_od = isset($_GET['povOD']) ? $_GET['povOD'] : null;
                    $povrsina_do = isset($_GET['povDO']) ? $_GET['povDO'] : null;
                    $cena_od = isset($_GET['cenaOD']) ? $_GET['cenaOD'] : null;
                    $cena_do = isset($_GET['cenaDO']) ? $_GET['cenaDO'] : null;
                    $vlasnik = isset($_GET['vlasnik']) ? $_GET['vlasnik'] : null;
                    //die($p_num.' '. $items);
                    
                   // $stanovi = pretraziStanove($id, $opstina, $povrsina_od, $povrsina_do, $cena_od, $cena_do, $vlasnik);
                }



                        
                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Izdavanje</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="images/kuca.png" type="image/x-icon">
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
                <div class="clear"></div>
                <a href="#" class="link1"><img src="images/soc-fb.png" width="39" alt="Lajkujte nas na Fejsbuku!"></a>
                <a href="#" class="link1"><img src="images/soc-tw.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="#" class="link1"><img src="images/soc-ms.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="#" class="link1"><img src="images/soc-li.png" width="39" alt="Nađite nas na Linkedin-u!"></a>
            </div>
            <div class="clear"></div>
            </div>            
        </div>
        <div class="clear"></div>
        <div class="head-box3">
        	<div class="main">
            	<nav>
                <ul id="sndmenu" class="sf-menu">
                    <li><a href="index.php">Početna</a>
                        <audio style="display:none;" id="beep-two" preload="auto">
                            <source src="audio/klik1.mp3">
                            <source src="audio/klik1.ogg">
                        </audio>
                    </li>
                    <li><a class="active" href="izdavanje.php">Izdavanje</a>
                         <ul>
                             <li><a href="izdavanje.php?tip=Stan">Stanovi</a></li>
                            <li><a href="izdavanje.php?tip=Kuća">Kuće</a></li>
                            <li><a href="izdavanje.php?tip=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?tip=Magacin">Magacini</a></li>
                            <li><a href="izdavanje.php?tip=Lokal">Lokali</a></li>                                

                            </ul></li>
                    <li><a href="prodaja.php">Prodaja</a>
                            <ul>
                            <li><a href="prodaja.php?tip=Stan">Stanovi</a></li>
                            <li><a href="prodaja.php?tip=Kuće">Kuće</a></li>
                            <li><a href="prodaja.php?tip=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="prodaja.php?tip=Magacin">Magacini</a></li>
                            <li><a href="prodaja.php?tip=Lokal">Lokali</a></li>     
                            </ul></li>
                    <li><a href="slanje.php"><SPAN STYLE="font-size: 9pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a href="onama.php">O nama</a></li>
                    <li><a href="trazimozavas.php">Tražimo za Vas</a></li>
                    <li><a href="kontakt.php" >Kontakt</a>
                </ul>
                    
		<script>$("#sndmenu a")
                        .each(function(i) {
                          if (i != 0) { 
                            $("#beep-two")
                              .clone()
                              .attr("id", "beep-two" + i)
                              .appendTo($(this).parent()); 
                          }
                          $(this).data("beeper", i);
                        })
                        .mouseenter(function() {
                          $("#beep-two" + $(this).data("beeper"))[0].play();
                        });
                      $("#beep-two").attr("id", "beep-two0");
                  </script>                     
                    
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
                   <article class="grid_12">
                      <?php 
                        if (!isset($_GET['tip'])){
                            echo '<center><a href="izdavanje.php?tip=Stan"><img src="images/izd-stanovi.jpg" alt="Stanovi" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip=Kuća"><img src="images/izd-kuce.jpg" alt="Kuće" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip=Poslovni+prostor"><img src="images/izd-poslovniprostori.jpg" alt="Poslovni prostori" /></a>';
                            echo '<br /><br /><a href="izdavanje.php?tip=Magacin"><img src="images/izd-magacini.jpg" alt="Magacini" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip=Lokal"><img src="images/izd-lokali.jpg" alt="Lokali" /></a></center>';
                        }
// OTVORIO PHP    ============================================================================================          
                        else { ?>
                       <div id="sforma">
                           <form id="pretraga" action="izdavanje.php" method="get">
                       <h3 class="title" >Pretraga nekretnina</h3>
                       <div id="pozicija1" style="position:relative; float:left;">
                           <table>
                               <tr>
                                   <th>Tip:</th>
                                   <td>
                                <select name="tip" class="sforma_select">
                                    <option value="">Izaberite...</option>
                                    <option value="Stan">Stan</option>
                                    <option value="Kuća">Kuća</option>
                                    <option value="Poslovni prostor">Poslovni prostor</option>
                                    <option value="Magacin">Magacin</option>
                                    <option value="Lokal">Lokal</option>
                                </select>
                                   </td>
                           </tr>
                           <tr>
                               <th>Lokacija</th>
                                <td>
                                <select name="opstina" class="sforma_select">
                                    <option value="">Izaberite...</option>
                                    <?php
                                    foreach($row as $opstina){
                                      echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                                    }
                             ?>
                            </select>
                                </td>
                           </tr>
                               </table>
                       </div>
                       <div id="pozicija2" style="float:left; margin-left:40px;">
                           <table>
                                <tr>
                                <th>Grejanje:</th>
                                <td>        <select name="grejanje" class="sforma_select">
                                                <option value="">Izaberite...</option>
                                                <option value="CG">CG</option>
                                                <option value="EG">EG</option>
                                                <option value="TA">TA</option>
                                                <option value="PG">PG</option>
                                                <option value="Klima uređaj">Klima uređaj</option>
                                            </select></td>
                                </tr>
                                <tr>
                                <th>Nameštenost:</th>
                                <td>
                                    <select name="namestenost" class="sforma_select">
                                        <option value="">Izaberite...</option>
                                        <option value="Namešten">Namešten</option>
                                        <option value="Nenamešten">Nenamešten</option>
                                    </select>
                                </td>
                                </tr>
                                    <tr>
                                        <th>Sprat:</th>
                                        <td><select name="sprat" class="sforma_select">
                                                <option value="">Izaberite...</option>
                                                <option value="Suteren">Suteren</option>
                                                <option value="Prizemlje">Prizemlje</option>
                                                <option value="Visoko prizemlje">Visoko prizemlje</option>
                                                <option value="1. sprat">1. sprat</option>
                                                <option value="2. sprat">2. sprat</option>
                                                <option value="3. sprat">3. sprat</option>
                                                <option value="4. sprat">4. sprat</option>
                                                <option value="5. sprat">5. sprat</option>
                                                <option value="6. sprat">6. sprat</option>
                                                <option value="7. sprat">7. sprat</option>
                                                <option value="8. sprat">8. sprat</option>
                                                <option value="9. sprat">9. sprat</option>
                                                <option value="10. sprat">10. sprat</option>
                                                <option value="11. sprat">11. sprat</option>
                                                <option value="12. sprat">12. sprat</option>
                                                <option value="13. sprat">13. sprat</option>
                                                <option value="14. sprat">14. sprat</option>
                                                <option value="15. sprat">15. sprat</option>
                                                <option value="16. sprat">16. sprat</option>
                                                <option value="17. sprat">17. sprat</option>
                                                <option value="18. sprat">18. sprat</option>
                                                <option value="19. sprat">19. sprat</option>
                                                <option value="20. sprat i više">20. sprat i više</option>
                                            </select></td>
                                </tr>                                
                           </table>
                       </div>
                       <div id="pozicija3" style="float:left; margin-left:40px;">
                           <table>
                       <tr>
                        <th>Površina:</th>
                        <td><select id="povOD" class="select_m" style="margin-left:10px;">
                        <option value="">Izaberite...</option>        
                        <option value="20">od 20 m²</option>
                        <option value="40">od 40 m²</option>
                        <option value="60">od 60 m²</option>
                        <option value="80">od 80 m²</option>
                        <option value="100">od 100 m²</option>
                        <option value="150">od 150 m²</option>
                        <option value="200">od 200 m²</option>
                        <option value="300">od 300 m²</option>
                    </select>&nbsp;&nbsp;-&nbsp;
                    <select id="povDO" class="select_m">
                        <option value="">Izaberite...</option>
                        <option value="40">do 40 m²</option>
                        <option value="60">do 60 m²</option>
                        <option value="80">do 80 m²</option>
                        <option value="100">do 100 m²</option>
                        <option value="150">do 150 m²</option>
                        <option value="200">do 200 m²</option>
                        <option value="300">do 300 m²</option>
                        <option value="999999999">više od 300 m²</option>                        
                    </select></td>
                    </tr> 
                    <tr>
                    <th>Cena:</th>
                    <td><select id="cenaOD" class="select_m" style="margin-left:10px;">
                        <option value="">Izaberite...</option>
                        <option value="200">od 200 €</option>
                        <option value="300">od 300 €</option>
                        <option value="400">od 400 €</option>
                        <option value="500">od 500 €</option>
                        <option value="600">od 600 €</option>
                        <option value="700">od 700 €</option>
                        <option value="800">od 800 €</option>
                        <option value="900">od 900 €</option>
                        <option value="1000">od 1000 €</option>
                        <option value="1500">od 1500 €</option>
                        <option value="2000">od 2000 €</option>
                        <option value="3000">od 3000 €</option>
                    </select>&nbsp;&nbsp;-&nbsp;
                    <select id="cenaDO" class="select_m">
                        <option value="">Izaberite...</option>
                        <option value="300">do 300 €</option>
                        <option value="400">do 400 €</option>
                        <option value="500">do 500 €</option>
                        <option value="600">do 600 €</option>
                        <option value="700">do 700 €</option>
                        <option value="800">do 800 €</option>
                        <option value="900">do 900 €</option>
                        <option value="1000">do 1000 €</option>
                        <option value="1500">do 1500 €</option>
                        <option value="2000">do 2000 €</option>
                        <option value="3000">do 3000 €</option>
                        <option value="999999999">više od 3000 €</option>
                    </select></td>
                </tr>
                           </table>
                       </div>
                                <div class="dugmad">
                                        <input type="submit" value="Pretraži" class="sforma_button" name="pretrazi" id="pretrazi" />
                                        <input type="reset" value="Resetuj" class="sforma_button" /></div>
                       <?php
// ZATVORIO PHP   ============================================================================================                    
                       } ?>
                           </form>
                       </div>
                       <div class="clear"></div>
                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>