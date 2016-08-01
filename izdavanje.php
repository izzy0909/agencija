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
              
              if (!empty($_GET)){                    // if (isset ($_GET['pretrazi'])){
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
                    
             //       echo $tip[0] . ' ' . $tip[1];
                    $stanovi = pretragaStanovaZaIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start);
                    $broj_stanova = brojRezultataIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost);
             //       echo $broj_stanova[0];
}
        /*      else {
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
                    
                    $stanovi = pretragaStanovaZaIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost, $start);
                    $broj_stanova = brojRezultataIzdavanje($tip, $stan_tip, $opstina, $povrsina_od, $povrsina_do, $sprat, $cena_od, $cena_do, $grejanje, $namestenost);
                    echo $broj_stanova;
                  }
              }  */
                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Jevtić nekretnine - Poslovni prostor Beograd, izdavanje stanova Beograd, izdavanje poslovnog prostora u Beogradu, izdavanje kancelarija</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">
    <meta name="keywords" content="nekretnine, stanovi, kuce, izdavanje, prodaja, beograd, srbija, belgrade, serbia, real estate, apartment, house, rent, sale, kuće, lokal, magacin, garaza, garaža, poslovni prostor">
    <meta name="author" content="Web Refresh">
    <link rel="icon" href="images/kuca.png" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
<!--    <link href="css/jquery.multiSelect.css" rel="stylesheet" type="text/css" /> -->
    <script src="js/jquery-1.7.2.min.js"></script>
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

<!-- multiselect -->    
<link rel="stylesheet" type="text/css" href="multi/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="multi/prettify.css" />
<link rel="stylesheet" type="text/css" href="multi/jquery-ui-1.9.2.custom.css" />
<!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="multi/prettify.js"></script>
<script type="text/javascript" src="multi/jquery.multiselect.js"></script>
<script type="text/javascript">
$(function(){
	$("select").multiselect({
   selectedList: 2, 
   noneSelectedText: "Izaberite...",
   selectedText: "selektovano: #",
   height: 137,
   checkAllText: "Odaberi sve",
   uncheckAllText: "Isključi sve"
});
});

$(function(){
    $("#namestenost").multiselect({
        height: 55
    });
});

</script>

<script type='text/javascript'>//<![CDATA[ 
$(document).ready(function(){
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
                <span>060/4480659 * 011/4054325</span>
            </div>
            <div class="head-box2">
                <div class="clear"></div>
                <a href="http://www.facebook.com/pages/Jevtic-nekretnine-doo/542807059085029" target="_blank" class="link1"><img src="images/soc-fb.png" width="39" alt="Dodajte nas na Fejsbuku!"></a>
                <a href="http://twitter.com/Jevticnekretine" target="_blank" class="link1"><img src="images/soc-tw.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="http://rs.linkedin.com/pub/jevtic-nekretnine/65/aa1/57a" target="_blank" class="link1"><img src="images/soc-li.png" width="39" alt="Nađite nas na Linkedin-u!"></a>
            </div>
            <div id="sat">
<!-- Begin of localTimes.info script --> <div align="center" style="margin:15px 0px 0px 0px"> <noscript> <div align="center" style="width:140px; border:1px solid #ccc; background: #; color: #E2A616; font-weight:bold;"> <a style="font-size:13px; line-height:16px; padding:2px 0px; font-family:arial; text-decoration: none; color: #E2A616;" href="http://localtimes.info/Europe/Serbia/Belgrade/"><img src="http://localtimes.info/images/countries/rs.png" border=0 style="border:0;margin:0;padding:0">&nbsp;&nbsp;Belgrade Time</a></div> </noscript> <script type="text/javascript" src="http://localtimes.info/clock.php?cp3_Hex=FFB200&cp2_Hex=FFFFFF&cp1_Hex=E2A616&fwdt=128&ham=1&hbg=1&hfg=1&sid=0&mon=0&wek=0&wkf=0&sep=0&continent=Europe&country=Serbia&city=Belgrade&widget_number=1004"></script>
</div> <!-- End of localTimes.info script --> 
            </div>
            <span style="clear:both; float:left; margin-left:25px">Broj posrednika u registru: 150</span>
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
                             <li><a href="izdavanje.php?tip[]=Stan">Stanovi</a></li>
                            <li><a href="izdavanje.php?tip[]=Kuća">Kuće</a></li>
                            <li><a href="izdavanje.php?tip[]=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?tip[]=Magacin">Magacini</a></li>
                            <li><a href="izdavanje.php?tip[]=Lokal">Lokali</a></li>
                            <li><a href="izdavanje.php?tip[]=Garaža">Garaže</a></li>
                            <li><a href="izdavanje.php?tip[]=Apartman+na+dan">Apartmani na dan</a></li>
                            </ul></li>
                    <li><a href="prodaja.php">Prodaja</a>
                            <ul>
                            <li><a href="prodaja.php?tip[]=Stan">Stanovi</a></li>
                            <li><a href="prodaja.php?tip[]=Kuće">Kuće</a></li>
                            <li><a href="prodaja.php?tip[]=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="prodaja.php?tip[]=Magacin">Magacini</a></li>
                            <li><a href="prodaja.php?tip[]=Lokal">Lokali</a></li>
                            <li><a href="prodaja.php?tip[]=Garaža">Garaže</a></li>
                            </ul></li>
     <!--                <li><a href="slanje.php"><SPAN STYLE="font-size: 9pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a href="trazimozavas.php">Tražimo za Vas</a></li>
     -->                <li><a href="onama.php">O nama</a>
                      <!--      <ul>
                                <li><a href="uslovi_poslovanja.php">Uslovi poslovanja</a></li>
                            </ul>     -->
                    </li>
                    <li><a href="kontakt.php" >Kontakt</a></li>
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
                        if (!isset($_GET['tip']) && !isset($_GET['pretrazi']) && !isset($_GET['povOD']) && !isset($_GET['cenaOD']) ){
                            echo '<center><a href="izdavanje.php?tip[]=Stan"><img src="images/izd-stanovi.jpg" alt="Stanovi" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip[]=Kuća"><img src="images/izd-kuce.jpg" alt="Kuće" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip[]=Poslovni+prostor"><img src="images/izd-poslovniprostori.jpg" alt="Poslovni prostori" /></a>';
                            echo '<br /><br /><a href="izdavanje.php?tip[]=Magacin"><img src="images/izd-magacini.jpg" alt="Magacini" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip[]=Lokal"><img src="images/izd-lokali.jpg" alt="Lokali" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?tip[]=Garaža"><img src="images/izd-garaze.jpg" alt="Garaže" /></a>';
                            echo '<br /><br /><a href="izdavanje.php?tip[]=Apartman+na+dan"><img src="images/izd-apartmani.jpg" alt="Apartmani na dan" /></a></center>';
                        }
// OTVORIO PHP    ============================================================================================          
                        else { ?>
                       <div id="sforma">
                           <form id="pretraga" action="izdavanje.php" method="get">
                       <h3 class="title" >Pretraga nekretnina: Izdavanje</h3>
                       <div id="pozicija1" style="position:relative; float:left;">
                           <table>
                               <tr>
                                   <th>Tip:</th>
                                   <td style="padding-left:7px;">
                                <select id="tip" name="tip[]" multiple="multiple" class="sforma_select2">
                                    <option value="Stan" <?php if(isset($_GET['tip']) && in_array('Stan', $_GET['tip'])) echo 'selected="selected"'; ?>>Stan</option>
                                    <option value="Kuća" <?php if(isset($_GET['tip']) && in_array('Kuća', $_GET['tip'])) echo 'selected="selected"'; ?>>Kuća</option>
                                    <option value="Poslovni prostor" <?php if(isset($_GET['tip']) && in_array('Poslovni prostor', $_GET['tip'])) echo 'selected="selected"'; ?>>Poslovni prostor</option>
                                    <option value="Magacin" <?php if(isset($_GET['tip']) && in_array('Magacin', $_GET['tip'])) echo 'selected="selected"'; ?>>Magacin</option>
                                    <option value="Lokal" <?php if(isset($_GET['tip']) && in_array('Lokal', $_GET['tip'])) echo 'selected="selected"'; ?>>Lokal</option>
                                    <option value="Garaža" <?php if(isset($_GET['tip']) && in_array('Garaža', $_GET['tip'])) echo 'selected="selected"'; ?>>Garaža</option>
                                    <option value="Apartman na dan" <?php if(isset($_GET['tip']) && in_array('Apartman na dan', $_GET['tip'])) echo 'selected="selected"'; ?>>Apartman na dan</option>
                                </select>    
                                   </td>
                           </tr>
                            <tr>
                                <th>Struktura:</th>
                                <td style="padding-left:7px;">
                                    <select id="stan_tip" name="stan_tip[]" multiple="multiple" class="sforma_select2">
                                        <option value="Garsonjera" <?php if(isset($_GET['stan_tip']) && in_array('Garsonjera', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Garsonjera</option>
                                        <option value="Jednosoban" <?php if(isset($_GET['stan_tip']) && in_array('Jednosoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Jednosoban</option>
                                        <option value="Jednoiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Jednoiposoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Jednoiposoban</option>
                                        <option value="Dvosoban" <?php if(isset($_GET['stan_tip']) && in_array('Dvosoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Dvosoban</option>
                                        <option value="Dvoiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Dvoiposoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Dvoiposoban</option>
                                        <option value="Trosoban" <?php if(isset($_GET['stan_tip']) && in_array('Trosoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Trosoban</option>
                                        <option value="Troiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Troiposoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Troiposoban</option>
                                        <option value="Četvorosoban" <?php if(isset($_GET['stan_tip']) && in_array('Četvorosoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Četvorosoban</option>
                                        <option value="Četvoroiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Četvoroiposoban', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Četvoroiposoban</option>
                                        <option value="Petosoban i veći" <?php if(isset($_GET['stan_tip']) && in_array('Petosoban i veći', $_GET['stan_tip'])) echo 'selected="selected"'; ?>>Petosoban i veći</option>
                                    </select>
                                </td>
                            </tr>  
                           <tr>
                               <th>Lokacija:</th>
                                <td style="padding-left:7px;">
                                <select id="opstina" name="opstina[]" multiple="multiple" class="sforma_select2">
                                    <?php
                                    foreach($row as $opstina){
                                    echo '<option value="'.$opstina['id'].'"'; if(isset($_GET['opstina']) && in_array($opstina['id'], $_GET['opstina'])){ echo 'selected="selected"';} echo '>'.$opstina['opstina'].'</option>';
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
                                <td style="padding-left:7px;">        <select id="grejanje" name="grejanje[]" multiple="multiple" class="sforma_select2">
                                                <option value="CG" <?php if(isset($_GET['grejanje']) && in_array('CG', $_GET['grejanje'])) echo 'selected="selected"'; ?>>CG</option>
                                                <option value="EG" <?php if(isset($_GET['grejanje']) && in_array('EG', $_GET['grejanje'])) echo 'selected="selected"'; ?>>EG</option>
                                                <option value="TA" <?php if(isset($_GET['grejanje']) && in_array('TA', $_GET['grejanje'])) echo 'selected="selected"'; ?>>TA</option>
                                                <option value="PG" <?php if(isset($_GET['grejanje']) && in_array('PG', $_GET['grejanje'])) echo 'selected="selected"'; ?>>PG</option>
                                                <option value="Klima uređaj"  <?php if(isset($_GET['grejanje']) && in_array('Klima uređaj', $_GET['grejanje'])) echo 'selected="selected"'; ?>>Klima uređaj</option>
                                            </select></td>
                                </tr>
                                <tr>
                                <th>Nameštenost:</th>
                                <td style="padding-left:7px;">
                                    <select id="namestenost" name="namestenost[]" multiple="multiple" class="sforma_select2">
                                        <option value="Namešten" <?php if(isset($_GET['namestenost']) && in_array('Namešten', $_GET['namestenost'])) echo 'selected="selected"'; ?>>Namešten</option>
                                        <option value="Nenamešten" <?php if(isset($_GET['namestenost']) && in_array('Nenamešten', $_GET['namestenost'])) echo 'selected="selected"'; ?>>Nenamešten</option>
                                    </select>
                                </td>
                                </tr>
                                    <tr>
                                        <th>Sprat:</th>
                                        <td style="padding-left:7px;"><select id="sprat" name="sprat[]" multiple="multiple" class="sforma_select2">
                                                <option value="Suteren" <?php if(isset($_GET['sprat']) && in_array('Suteren', $_GET['sprat'])) echo 'selected="selected"'; ?>>Suteren</option>
                                                <option value="Prizemlje" <?php if(isset($_GET['sprat']) && in_array('Prizemlje', $_GET['sprat'])) echo 'selected="selected"'; ?>>Prizemlje</option>
                                                <option value="Visoko prizemlje" <?php if(isset($_GET['sprat']) && in_array('Visoko prizemlje', $_GET['sprat'])) echo 'selected="selected"'; ?>>Visoko prizemlje</option>
                                                <option value="1. sprat" <?php if(isset($_GET['sprat']) && in_array('1. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>1. sprat</option>
                                                <option value="2. sprat" <?php if(isset($_GET['sprat']) && in_array('2. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>2. sprat</option>
                                                <option value="3. sprat" <?php if(isset($_GET['sprat']) && in_array('3. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>3. sprat</option>
                                                <option value="4. sprat" <?php if(isset($_GET['sprat']) && in_array('4. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>4. sprat</option>
                                                <option value="5. sprat" <?php if(isset($_GET['sprat']) && in_array('5. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>5. sprat</option>
                                                <option value="6. sprat" <?php if(isset($_GET['sprat']) && in_array('6. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>6. sprat</option>
                                                <option value="7. sprat" <?php if(isset($_GET['sprat']) && in_array('7. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>7. sprat</option>
                                                <option value="8. sprat" <?php if(isset($_GET['sprat']) && in_array('8. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>8. sprat</option>
                                                <option value="9. sprat" <?php if(isset($_GET['sprat']) && in_array('9. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>9. sprat</option>
                                                <option value="10. sprat" <?php if(isset($_GET['sprat']) && in_array('10. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>10. sprat</option>
                                                <option value="11. sprat" <?php if(isset($_GET['sprat']) && in_array('11. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>11. sprat</option>
                                                <option value="12. sprat" <?php if(isset($_GET['sprat']) && in_array('12. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>12. sprat</option>
                                                <option value="13. sprat" <?php if(isset($_GET['sprat']) && in_array('13. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>13. sprat</option>
                                                <option value="14. sprat" <?php if(isset($_GET['sprat']) && in_array('14. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>14. sprat</option>
                                                <option value="15. sprat" <?php if(isset($_GET['sprat']) && in_array('15. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>15. sprat</option>
                                                <option value="16. sprat" <?php if(isset($_GET['sprat']) && in_array('16. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>16. sprat</option>
                                                <option value="17. sprat" <?php if(isset($_GET['sprat']) && in_array('17. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>17. sprat</option>
                                                <option value="18. sprat" <?php if(isset($_GET['sprat']) && in_array('18. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>18. sprat</option>
                                                <option value="19. sprat" <?php if(isset($_GET['sprat']) && in_array('19. sprat', $_GET['sprat'])) echo 'selected="selected"'; ?>>19. sprat</option>
                                                <option value="20. sprat i više" <?php if(isset($_GET['sprat']) && in_array('20. sprat i više', $_GET['sprat'])) echo 'selected="selected"'; ?>>20. sprat i više</option>
                                            </select></td>
                                </tr>                                
                           </table>
                       </div>
                       <div id="pozicija3" style="float:left; margin-left:40px;">
                           <table>
                       <tr>
                        <th style="padding-top:5px;">Površina od:</th>
                        <td>
                        <input type="text" id="povOD" name="povOD" class="sforma_input_ck" style="width:40px;">
                        <span style="margin: -2px 0px 0px 10px; font-weight: bold; display:inline-block">do</span>
                        <input type="text" id="povDO" name="povDO" class="sforma_input_ck" style="width:40px; float: none;">
                        <span style="margin: -2px 6px 0px 5px; font-weight:bold; display: inline-block;">m²</span>
                        </td>
                    </tr> 
                    <tr>
                    <th style="padding-top:5px";>Cena od:</th>
                    <td>
                        <input type="text" id="cenaOD" name="cenaOD" class="sforma_input_ck" style="width:40px;">
                        <span style="margin: -2px 0px 0px 10px; font-weight: bold; display:inline-block;">do</span>
                        <input type="text" id="cenaDO" name="cenaDO" class="sforma_input_ck" style="width:40px; float: none;">
                        <span style="margin: -2px 6px 0px 5px; font-weight:bold; display: inline-block;">€</span>
                    </td>
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
                       <div id="rezultati">
                      <div id="brojrez" style="padding-left:10px;">
                               <?php 
                               if(isset($_GET['tip'])){
                                   if($broj_stanova[0] > 0){
                                    echo '<span>Broj rezultata: ' . $broj_stanova[0] . '</span>';
                                        }
                                    else { echo '<span>Nema rezultata.</span>'; }
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
                                echo '</div><div class="stan_info_detaljnije"><a href="detalji.php?id=' . $stan[0] . '">DETALJI</a></div></div>';
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
                           //             echo $url . '</br>';
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
