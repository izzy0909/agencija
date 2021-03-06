<?php

include_once 'data_base_access/dodatniTagoviDA.php';
include_once 'data_base_access/stanoviDA.php';
include_once 'data_base_access/slikeDA.php';    

   $row = prikaziSveOpstine();

              if(isset($_GET['str'])) {
                    $str = (int)htmlspecialchars($_GET['str']);
                    if(isset($_GET['pretrazi'])){
                        $url_temp = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        $url_arr = explode("&pretrazi", $url_temp);
                        $url = $url_arr[0];
                    }
                    else{
                        $url_temp = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        $url_arr = explode("&str", $url_temp);
                        $url = $url_arr[0];
                    }
                    }
              else { 
                    $str=1;
                    if(isset($_GET['pretrazi'])){
                        $url_temp = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        $url_arr = explode("&pretrazi", $url_temp);
                        $url = $url_arr[0];
                    }
                    else{
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    }
                    };
              $start = ($str-1) * 18;   
   
              if (isset ($_GET['pretrazi'])){
                    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
                    $stan_tip = isset($_GET['stan_tip']) ? $_GET['stan_tip'] : null;
                    $opstina = isset($_GET['opstina']) ? $_GET['opstina'] : null;
                    $grejanje = isset($_GET['grejanje']) ? $_GET['grejanje'] : null;
                    $namestenost = isset($_GET['namestenost']) ? $_GET['namestenost'] : null;
                    $sprat = isset($_GET['sprat']) ? $_GET['sprat'] : null;                    
                    $povrsina_od = isset($_GET['povOD']) ? $_GET['povOD'] : null;
                    $povrsina_do = isset($_GET['povDO']) ? $_GET['povDO'] : null;
                    $cena_od = isset($_GET['cenaOD']) ? $_GET['cenaOD'] : null;
                    $cena_do = isset($_GET['cenaDO']) ? $_GET['cenaDO'] : null;
                    //die($p_num.' '. $items);
                    
                    $stanovi = pretragaStanovaZaProdaju($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start);
                    $broj_stanova = brojRezultataProdaja($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost);                    
                    
              }
              else {
                  if(isset ($_GET['tip'])){
                    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
                    $stan_tip = isset($_GET['stan_tip']) ? $_GET['stan_tip'] : null;
                    $opstina = isset($_GET['opstina']) ? $_GET['opstina'] : null;
                    $grejanje = isset($_GET['grejanje']) ? $_GET['grejanje'] : null;
                    $namestenost = isset($_GET['namestenost']) ? $_GET['namestenost'] : null;
                    $sprat = isset($_GET['sprat']) ? $_GET['sprat'] : null;                    
                    $povrsina_od = isset($_GET['povOD']) ? $_GET['povOD'] : null;
                    $povrsina_do = isset($_GET['povDO']) ? $_GET['povDO'] : null;
                    $cena_od = isset($_GET['cenaOD']) ? $_GET['cenaOD'] : null;
                    $cena_do = isset($_GET['cenaDO']) ? $_GET['cenaDO'] : null;
                    //die($p_num.' '. $items);
                    
                    $stanovi = pretragaStanovaZaProdaju($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start);
                    $broj_stanova = brojRezultataProdaja($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost);                                       
                  }
              }




                        
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Jevtić Nekretnine :: Izdavanje i prodaja nekretnina Beograd</title>
  	<meta charset="utf-8">
    <meta name="description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">
    <meta name="keywords" content="nekretnine, stanovi, kuce, izdavanje, prodaja, beograd, srbija, belgrade, serbia, real estate, apartment, house, rent, sale, kuće, lokal, magacin, garaza, garaža, poslovni prostor">
    <meta name="author" content="Web Refresh">
    <link rel="icon" href="images/kuca.png" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/script.js"></script>
    <script src="js/showHide.js" type="text/javascript"></script>
    <script type="text/javascript">

    $(document).ready(function(){


       $('.show_hide').showHide({			 
                    speed: 1000,  // speed you want the toggle to happen	
                    easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
                    changeText: 1, // if you dont want the button text to change, set this to 0
                    showText: 'Napredna pretraga',// the button text to show when a div is closed
                    hideText: 'Sakrij naprednu pretragu' // the button text to show when a div is open

            }); 


    });

    </script>
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
<script type='text/javascript'>//<![CDATA[ 
$(document).ready(function(){
    $('#tip').val('<?php echo $tip; ?>');
    $('#stan_tip').val('<?php echo $stan_tip; ?>');
    $('#opstina').val('<?php echo $opstina; ?>');
    $('#grejanje').val('<?php echo $grejanje; ?>');
    $('#namestenost').val('<?php echo $namestenost; ?>');
    $('#sprat').val('<?php echo $sprat; ?>');
    $('#povOD').val('<?php echo $povrsina_od; ?>');
    $('#povDO').val('<?php echo $povrsina_do; ?>');
    $('#cenaOD').val('<?php echo $cena_od; ?>');
    $('#cenaDO').val('<?php echo $cena_do; ?>');
});//]]>  

</script>
<meta name="google-translate-customization" content="c67d062680181750-572105164184dfe9-gd53bc459627b01ea-17"></meta>
</head>
<body>
<!--==============================header=================================-->
<div id="prevod">
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'sr', includedLanguages: 'de,en,es,fr,it,ru', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>

    <header>
    	<div class="head-bg">
        <div class="main">
        	<div class="head-box1">
            <h1><a class="logo" href="index.php">logo</a></h1>
            <div id="tel-header">
                <span>060/4480659</span>
            </div>
            <div class="head-box2">
                <div class="clear"></div>
                <a href="http://sr-rs.facebook.com/jevtic.nekretnine" target="_blank" class="link1"><img src="images/soc-fb.png" width="39" alt="Dodajte nas na Fejsbuku!"></a>
                <a href="http://twitter.com/Jevticnekretine" target="_blank" class="link1"><img src="images/soc-tw.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="http://rs.linkedin.com/pub/jevtic-nekretnine/65/aa1/57a" target="_blank" class="link1"><img src="images/soc-li.png" width="39" alt="Nađite nas na Linkedin-u!"></a>
            </div>
            <div id="sat">
<!-- Begin of localTimes.info script --> <div align="center" style="margin:15px 0px 0px 0px"> <noscript> <div align="center" style="width:140px; border:1px solid #ccc; background: #; color: #E2A616; font-weight:bold;"> <a style="font-size:13px; line-height:16px; padding:2px 0px; font-family:arial; text-decoration: none; color: #E2A616;" href="http://localtimes.info/Europe/Serbia/Belgrade/"><img src="http://localtimes.info/images/countries/rs.png" border=0 style="border:0;margin:0;padding:0">&nbsp;&nbsp;Belgrade Time</a></div> </noscript> <script type="text/javascript" src="http://localtimes.info/clock.php?cp3_Hex=FFB200&cp2_Hex=FFFFFF&cp1_Hex=E2A616&fwdt=128&ham=1&hbg=1&hfg=1&sid=0&mon=0&wek=0&wkf=0&sep=0&continent=Europe&country=Serbia&city=Belgrade&widget_number=1004"></script>
</div> <!-- End of localTimes.info script --> 
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
                    <li><a href="izdavanje.php">Izdavanje</a>
                          <ul>
                             <li><a href="izdavanje.php?tip=Stan">Stanovi</a></li>
                            <li><a href="izdavanje.php?tip=Kuća">Kuće</a></li>
                            <li><a href="izdavanje.php?tip=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?tip=Magacin">Magacini</a></li>
                            <li><a href="izdavanje.php?tip=Lokal">Lokali</a></li>
                            <li><a href="izdavanje.php?tip=Garaža">Garaže</a></li>
                            <li><a href="izdavanje.php?tip=Apartman+na+dan">Apartmani na dan</a></li>
                            </ul></li>
                    <li><a class="active" href="prodaja.php">Prodaja</a>
                            <ul>
                            <li><a href="prodaja.php?tip=Stan">Stanovi</a></li>
                            <li><a href="prodaja.php?tip=Kuće">Kuće</a></li>
                            <li><a href="prodaja.php?tip=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="prodaja.php?tip=Magacin">Magacini</a></li>
                            <li><a href="prodaja.php?tip=Lokal">Lokali</a></li>
                            <li><a href="prodaja.php?tip=Garaža">Garaže</a></li>
                            </ul></li>
                    <li><a href="slanje.php"><SPAN STYLE="font-size: 9pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a href="trazimozavas.php">Tražimo za Vas</a></li>
                    <li><a href="onama.php">O nama</a></li>
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
                            echo '<center><a href="prodaja.php?tip=Stan"><img src="images/pro-stanovi.jpg" alt="Stanovi" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="prodaja.php?tip=Kuća"><img src="images/pro-kuce.jpg" alt="Kuće" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="prodaja.php?tip=Poslovni+prostor"><img src="images/pro-posprost.jpg" alt="Poslovni prostori" /></a>';
                            echo '<br /><br /><a href="prodaja.php?tip=Magacin"><img src="images/pro-magacini.jpg" alt="Magacini" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="prodaja.php?tip=Lokal"><img src="images/pro-lokali.jpg" alt="Lokali" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="prodaja.php?tip=Garaža"><img src="images/pro-garaze.jpg" alt="Garaže" /></a></center>';
                        }
// OTVORIO PHP    ============================================================================================          
                        else { ?>
                       <div id="sforma">
                           <form id="pretraga" action="prodaja.php" method="get">
                       <h3 class="title" >Pretraga nekretnina: Prodaja</h3>
                       <div id="pozicija1" style="position:relative; float:left;">
                           <table>
                               <tr>
                                   <th>Tip:</th>
                                   <td>
                                <select id="tip" name="tip" class="sforma_select">
                                    <option value="">Izaberite...</option>
                                    <option value="Stan">Stan</option>
                                    <option value="Kuća">Kuća</option>
                                    <option value="Poslovni prostor">Poslovni prostor</option>
                                    <option value="Magacin">Magacin</option>
                                    <option value="Lokal">Lokal</option>
                                    <option value="Garaža">Garaža</option>
                                </select>
                                   </td>
                           </tr>
                            <tr>
                                <th>Struktura</th>
                                <td>
                                    <select id="stan_tip" name="stan_tip" class="sforma_select">
                                        <option value="">Izaberite...</option>
                                        <option value="Garsonjera">Garsonjera</option>
                                        <option value="Jednosoban">Jednosoban</option>
                                        <option value="Jednoiposoban">Jednoiposoban</option>
                                        <option value="Dvosoban">Dvosoban</option>
                                        <option value="Dvoiposoban">Dvoiposoban</option>
                                        <option value="Trosoban">Trosoban</option>
                                        <option value="Troiposoban">Troiposoban</option>
                                        <option value="Četvorosoban">Četvorosoban</option>
                                        <option value="Četvoroiposoban">Četvoroiposoban</option>
                                        <option value="Petosoban i veći">Petosoban i veći</option>
                                    </select>
                                </td>
                            </tr>  
                           <tr>
                               <th>Lokacija</th>
                                <td>
                                <select id="opstina" name="opstina" class="sforma_select">
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
                                <td>        <select id="grejanje" name="grejanje" class="sforma_select">
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
                                    <select id="namestenost" name="namestenost" class="sforma_select">
                                        <option value="">Izaberite...</option>
                                        <option value="Namešten">Namešten</option>
                                        <option value="Nenamešten">Nenamešten</option>
                                    </select>
                                </td>
                                </tr>
                                    <tr>
                                        <th>Sprat:</th>
                                        <td><select id="sprat" name="sprat" class="sforma_select">
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
                        <td><select id="povOD" name="povOD" class="select_m" style="margin-left:10px;">
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
                    <select id="povDO" name="povDO" class="select_m">
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
                    <td><select id="cenaOD" name="cenaOD" class="select_m" style="margin-left:10px;">
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
                    <select id="cenaDO" name="cenaDO" class="select_m">
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
                       <div id="napredna">
                            <table>
                                <tr style="background-color:#f3f3f3;">
                                <td style="width: 153px;"><label><input type="checkbox" name="kablovska" >Kablovska/Sat</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="tv">TV</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="klima">Klima</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="internet" >Internet</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="ima_telefon" >Telefon</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="frizider" >Frižider</label></td>
                                </tr>    
                                <tr>
                                <td><label><input type="checkbox" name="sporet" >Šporet</label></td>
                                <td><label><input type="checkbox" name="vesmasina" >Veš mašina</label></td>
                                <td><label><input type="checkbox" name="kuhinjskielementi" >Kuhinjski elementi</label></td>
                                <td><label><input type="checkbox" name="plakari" >Plakari</label></td>
                                <td><label><input type="checkbox" name="interfon" >Interfon</label></td>
                                <td><label><input type="checkbox" name="lift" >Lift</label></td>   
                                </tr>
                                <tr style="background-color:#f3f3f3;">
                                <td><label><input type="checkbox" name="bazen" >Bazen</label></td>
                                <td><label><input type="checkbox" name="garaza" >Garaža</label></td>
                                <td><label><input type="checkbox" name="parking" >Parking</label></td>
                                <td><label><input type="checkbox" name="dvoriste" >Dvorište</label></td>
                                <td><label><input type="checkbox" name="potkrovlje" >Potkrovlje</label></td>
                                <td><label><input type="checkbox" name="terasa" >Terasa</label></td> 
                                </tr>
                                <tr>
                                <td><label><input type="checkbox" name="novogradnja" >Novogradnja</label></td>
                                <td><label><input type="checkbox" name="renovirano" >Renovirano</label></td>
                                <td><label><input type="checkbox" name="lux" >Lux</label></td>   
                                <td><label><input type="checkbox" name="penthaus" >Penthaus</label></td>
                                <td><label><input type="checkbox" name="salonski" >Salonski</label></td>
                                <td><label><input type="checkbox" name="lodja" >Lođa</label></td>
                                </tr>
                                <tr style="background-color:#f3f3f3;">
                                <td><label><input type="checkbox" name="duplex" >Duplex</label></td>
                                <td><label><input type="checkbox" name="nov_namestaj" >Nov nameštaj</label></td>
                                <td><label><input type="checkbox" name="kompjuterska_mreza" >Kmpjuterska mreža</label></td>
                                <td><label><input type="checkbox" name="dva_kupatila" >Dva kupatila</label></td>
                                <td><label><input type="checkbox" name="vise_telefonskih_linija" >Više telefonskih linija</label></td>
                                <td><label><input type="checkbox" name="vertikala" >Vertikala</label></td>
                                </tr>
                                <tr>
                                <td><label><input type="checkbox" name="horizontala" >Horizontala</label></td>
                                <td><label><input type="checkbox" name="stan_u_kuci" >Stan u kući</label></td>
                                </tr>
                            </table>
                       </div>
                       <div id="hideshowctrl" style="padding-left:5px; clear:both; width:100%; text-align: center;">
                           <a href="#" class="show_hide" rel="#napredna">Napredna pretraga</a>
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
                       <div id="rezultati">
                      <div id="brojrez" style="padding-left:10px;">
                               <?php 
                               if(isset($_GET['tip'])){
                                   if($broj_stanova[0] > 0){
                                    echo '<span>Broj rezultata: ' . $broj_stanova[0] . '</span>';
                               }
                               else echo '<span>Nema rezultata.</span>';
                               }
                               ?>
                       </div>                           
                           <?php 
                           if(isset($stanovi)){
                            foreach($stanovi as $stan){
                                echo '<div class="stan_polje" onclick="location.href=\'detalji.php?id=' . $stan[0] . '\';" style="cursor:pointer;">';
                                if($stan['hot_offer']) { echo '<div class="stan_hot"><img src="images/hot.png" width="43" /></div>'; }
                                $slika_thumb = prikaziSlikuThumb($stan[0]);
                                echo '<div class="stan_slika"><a href="detalji.php?id=' . $stan[0] . '"><img src="admin/slike/thumb_' . $slika_thumb['naziv'] . '" alt="" width="120" /></a></div>';
                                echo '<div class="stan_info_naslov"><a href="detalji.php?id=' . $stan[0] . '">#' . $stan[0] . ' ' . $stan['opstina'] .  '</a></div>';
                                echo '<div class="stan_info_text">';
                                echo $stan['tip'];
                                if($stan['tip']=='Stan') {echo ': ' . $stan['stan_tip']; }
                                echo '<br /><br />Površina: ' . $stan['kvadratura'] . ' m²';
                                echo '<br />Cena: ' . $stan['cena'] . ' €';
                                echo '</div><div class="stan_info_detaljnije"><a href="detalji.php?id=' . $stan[0] . '">DETALJJ</a></div></div>';
                            }
                            echo '<div class="clear"></div><div class="stan_polje_border"></div><div class="stan_polje_border"></div><div class="stan_polje_border"></div>';
                            echo '<div class="clear"></div>';
                            echo '<div id="stranice">';
                            $strmax = ceil($broj_stanova[0] / 18);
                            if ($strmax==0){ $strmax = 1; }
                                    if($str==1){
                                        echo '<img src="images/p_prev_d.png" alt="Prethodna strana">';
                                        }
                                    else {
                                        echo '<a href="' . $url . '&str=' . ($str-1) . '"><img src="images/p_prev.png" alt="Prethodna strana"></a>';
                                    }
                                    echo '<span>&nbsp;&nbsp;&nbsp;' . $str . '&nbsp;/&nbsp;' . $strmax . '&nbsp;&nbsp;&nbsp;</span>';
                                    if($str==$strmax){
                                        echo '<img src="images/p_next_d.png" alt="Sledeća strana">';
                                    }
                                    else {
                                        echo '<a href="' . $url . '&str=' . ($str+1) . '"><img src="images/p_next.png" alt="Sledeća strana"></a>';
                                    }
                            echo '</div>';
                           }
                           ?>
                       </div>
                </article>
            </div>
        </div>
    </section>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38500514-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>   
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>