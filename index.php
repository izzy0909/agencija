<?php

    include_once 'data_base_access/stanoviDA.php';
    include_once 'data_base_access/slikeDA.php';
    $stanovi = prikaziPoslednjeStanove();
    $row = prikaziSveOpstine();
    
    $hot = prikaziHotOfferStanove();

 /*   $br_stan = prikaziBrojZaTip('Stan');
    $br_kuca = prikaziBrojZaTip('Kuća');
    $br_poslpro = prikaziBrojZaTip('Poslovni prostor');
    $br_magacin = prikaziBrojZaTip('Magacin');
    $br_lokal = prikaziBrojZaTip('Lokal'); */
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Jevtić nekretnine - Poslovni prostor Beograd, izdavanje stanova Beograd, izdavanje poslovnog prostora u Beogradu, izdavanje kancelarija</title>
  	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">
    <meta name="keywords" content="nekretnine, stanovi, stan, kuća, izdavanje, prodaja, beograd, srbija, belgrade, serbia, rent, sale, kuće, lokal, magacin, garaza, garaža, poslovni prostor, house, apartment">
    <meta name="author" content="Web Refresh">
    <link rel="icon" href="images/kuca.png" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/demo.css">
 <!--   <link href="css/jquery.multiSelect.css" rel="stylesheet" type="text/css" /> -->
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/script.js"></script>

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
<meta name="google-translate-customization" content="c67d062680181750-572105164184dfe9-gd53bc459627b01ea-17"></meta>
	<!--	<script src="js/jquery.bgiframe.min.js" type="text/javascript"></script>
		<script src="js/jquery.multiSelect.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             $("#tip, #stan_tip, #opstina").multiSelect({ oneOrMoreSelected: '*', noneSelected: 'Izaberite...' });
        });
    </script>     -->
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
            <div class="clear"></div>
            </div>
           <div id="sat">
<!-- Begin of localTimes.info script --> <div align="center" style="margin:15px 0px 0px 0px"> <noscript> <div align="center" style="width:140px; border:1px solid #ccc; background: #; color: #E2A616; font-weight:bold;"> <a style="font-size:13px; line-height:16px; padding:2px 0px; font-family:arial; text-decoration: none; color: #E2A616;" href="http://localtimes.info/Europe/Serbia/Belgrade/"><img src="http://localtimes.info/images/countries/rs.png" border=0 style="border:0;margin:0;padding:0">&nbsp;&nbsp;Belgrade Time</a></div> </noscript> <script type="text/javascript" src="http://localtimes.info/clock.php?cp3_Hex=FFB200&cp2_Hex=FFFFFF&cp1_Hex=E2A616&fwdt=128&ham=1&hbg=1&hfg=1&sid=0&mon=0&wek=0&wkf=0&sep=0&continent=Europe&country=Serbia&city=Belgrade&widget_number=1004"></script>
</div> <!-- End of localTimes.info script --> 
            </div>
        </div>
        <div class="clear"></div>
        <div class="head-box3">
        	<div class="main">
            	<nav>
                <ul id="sndmenu" class="sf-menu">
                    <li><a class="active" href="index.php">Početna</a>
                        <audio style="display:none;" id="beep-two" preload="auto">
                            <source src="audio/klik1.mp3">
                            <source src="audio/klik1.ogg">
                        </audio>
                    </li>
                     <li><a href="izdavanje.php">Izdavanje</a>
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
                    <li><a href="slanje.php"><SPAN STYLE="font-size: 9pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a href="trazimozavas.php">Tražimo za Vas</a></li>
                    <li><a href="onama.php">O nama</a>
                       <!--     <ul>
                                <li><a href="uslovi_poslovanja.php">Uslovi poslovanja</a></li>
                            </ul> -->
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
        <div id="slide">
            <div class="slider">
            <div class="banner-bg"></div>
                <ul class="items">
                    <li><img src="images/slide-1.jpg" /><div class="banner"><span>Pozovite nas zato što mi zaista razumemo kakvu nekretninu tražite.</span><p>Izdavanje stanova i poslovnih prostora u Beogradu.</p></div></li>
                    <li><img src="images/slide-2.jpg" /><div class="banner"><span>Pružite nam poverenje jer ste sa nama na pragu željene nekretnine.</span><p>Izdavanje stanova i poslovnih prostora u Beogradu.</p></div></li>
                    <li><img src="images/slide-3.jpg" /><div class="banner"><span>Jevtić nekretnine- Kraći put do Vašeg doma.</span><p>Izdavanje stanova i poslovnih prostora u Beogradu.</p></div></li>
                    <li><img src="images/slide-4.jpg" /><div class="banner"><span>Pronašli ste pravog partnera u svetu nekretnina.</span><p>Izdavanje luksuznih stanova, kuća i poslovnih prostora u Beogradu.</p></div></li>
                    <li><img src="images/slide-5.jpg" /><div class="banner"><span>Tražite stan, kuću ili poslovni prostor u Beogradu? Pozovite nas.</span><p>Izdavanje luksuznih stanova, poslovnih prostora i kuća u Beogradu.</p></div></li>
                </ul>
            </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content" class="p13">
            <div class="container_12">
                	<h4 class="p6">Najnovije <span>Nekretnine</span></h4>
                    <div class="border1">
                    <div class="car-wrapper">
                        <div class="carousel">
                              <ul>
                                  <?php 
                                  foreach ($stanovi as $stan){
                                      echo '<li>';
                                      $slika_thumb = prikaziSlikuThumb($stan[0]);
                                      echo '<figure class="page1-img1"><a href="detalji.php?id=' . $stan[0] . '"><img src="admin/slike/thumb_' . $slika_thumb['naziv'] . '" alt="" ></a></figure><strong> Cena:&nbsp; ' . $stan['cena'] . ' €</strong>';
                                      echo '<ul class="list1">';
                                      echo '<li>Tip:<span>' . $stan['tip'] . '</span></li>';
                                      if($stan['tip']=='Stan') {echo '<li><span>' . $stan['stan_tip'] . '</span></li>'; };
                                      echo '<li>Lokacija:<span>' . $stan['opstina'] . '</span></li>';
                                      echo '</ul></li>';
                                  }
                                  ?>
                              </ul>
                        </div>
                        <a class="prev1 car-button" data-type="prevPage"></a>
                    <a class="next1 car-button" data-type="nextPage"></a>                    
                    </div>
                    <div class="clear"></div>
                    </div>  
                <div class="wrapper">
                	<article class="grid_4">
                            <div id="idpretraga">
                                <form id="traziID" action="#" method="post">
                                    <h6 class="title">PRETRAGA PO KATALOŠKOM BROJU:</h6>
                            <input id="idinput" type="text" class="sforma_input_ul" onfocus="if(this.value =='UNESITE BROJ') this.value=''" onblur="if(this.value=='') this.value='UNESITE BROJ'" value="UNESITE BROJ" name="idpretraga" />
                            <input type="submit" value="Traži" class="sforma_button_T" name="trazi_id" id="trazi_id" />
                                </form>
                                <script>
                                    $('#traziID').submit(function(){
                                      var iid = $('#idinput').val();
                                      $(this).attr('action', "detalji.php?id=" + iid);
                                    }); 
                                </script>
                            </div>
                            <div class="clear"></div>
                            <br/>
                    	<h3 class="p7">KATALOG PONUDE</h3>
                            <ul class="list8">
                            <li><a href="izdavanje.php?tip[]=Stan">Stanovi</a></li>
                            <li><a href="izdavanje.php?tip[]=Kuća">Kuće</a></li>
                            <li><a href="izdavanje.php?tip[]=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?tip[]=Magacin">Magacini</a></li>
                            <li><a href="izdavanje.php?tip[]=Lokal">Lokali</a></li>
                            <li><a href="izdavanje.php?tip[]=Garaža">Garaže</a></li>
                            <li><a href="izdavanje.php?tip[]=Apartman+na+dan">Apartmani na dan</a></li>
                            </ul>

                            <div class="clear"></div>
                    </article>
                    
                    <article class="grid_4">
                    	<h3><span style="color:#e2a616">NAJBOLJE</span><span style="color:red"> U PONUDI!</span></h3>
                        <?php   echo '<div class="hot_polje">';
                                $slika_thumb = prikaziSlikuThumb($hot[0]);
                                echo '<div class="hot_slika"><a href="detalji.php?id=' . $hot[0] . '"><img src="admin/slike/thumb_' . $slika_thumb['naziv'] . '" alt="" width="230" height="154" /></a></div>';
                                echo '<div class="hot_info_naslov"><span>' . $hot['tip'] . ' | ' . $hot['opstina'] . ' | ' . $hot['kategorija'] .  '</span></div>';
                                echo '<div class="hot_info_text">Površina: ' . $hot['kvadratura'] . ' m²';
                                echo '<br />Cena: ' . $hot['cena'] . ' €';
                                echo '<br />' . $hot['opis'];
                                echo '</div><br /><a class="button1" href="detalji.php?id=' . $hot[0] . '">Detaljnije</a></div>';
                        ?>
<!--                        <figure class="page1-img3"><img src="images/page1-img10.jpg" alt=""></figure>
                        <span class="text1">Lorem ipsum doloa ettuing esent</span>
                        <p class="p9">Integer dapibus est porttitor lorem pretium nons it tempus ligula feugiat. Sed libero ligula, cursus id sollicitudin sit amet, auctor in sem. </p>
                        <p class="p10">Praesent tellus dui, pulvinar quis mattis vitae, is at  feugiat ut erat. Morbi sollicitudin nulla a urna all ten vehicula sit amet porta metus luctus.     </p>
                        <a class="button1" href="more.html">Detaljnije</a>   -->
                    </article>
                    
                    <article class="grid_4">
                        <div id="sforma1">
                    	<h3 class="title">BRZA PRETRAGA</h3>
                        <form id="brzapretraga" action="izdavanje.php" method="get">
                           <div id="pozicija1" style="position:relative; float:left;">
                           <table>
                           <tr>
                                   <th>Tip:</th>
                                   <td style="padding-left:7px;">
                                <select name="tip[]" id="tip" multiple="multiple" class="sforma_select2" size="5">
                                    <option value="Stan">Stan</option>
                                    <option value="Kuća">Kuća</option>
                                    <option value="Poslovni+prostor">Poslovni prostor</option>
                                    <option value="Magacin">Magacin</option>
                                    <option value="Lokal">Lokal</option>
                                </select>
                                   </td>
                           </tr>
                            <tr>
                                <th>Struktura</th>
                                <td style="padding-left:7px;">
                                    <select name="stan_tip[]" id="stan_tip" multiple="multiple" class="sforma_select2">
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
                                    <td style="padding-left:7px;">
                                    <select name="opstina[]" id="opstina" multiple="multiple "class="sforma_select2">
                                        <?php
                                        foreach($row as $opstina){
                                          echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                                        }
                                 ?>
                            </select>
                                </td>
                           </tr>
                                <tr>
                                    <th>Nameštenost:</th>
                                    <td style="padding-left:7px;">
                                        <select name="namestenost[]" id="namestenost" multiple="multiple" class="sforma_select2">
                                            <!--<option value="">Izaberite...</option>-->
                                            <option value="Namešten">Namešten</option>
                                            <option value="Nenamešten">Nenamešten</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                 <th style="padding-top:5px;">Površina od:</th>
                             <td>
                             <input type="text" name="povOD" class="sforma_input_ck" style="width:40px;">
                             <span style="margin: -2px 6px 0px 15px; display: inline-block; font-weight:bold;">do</span>
                             <input type="text" name="povDO" class="sforma_input_ck" style="width:40px; float: none;">      
                             <span style="margin: -2px 6px 0px 5px; display: inline-block; font-weight:bold;">m²</span>
                             </td>
                             </tr> 
                             <tr>
                             <th style="padding-top:5px;">Cena od:</th>
                             <td>
                             <input type="text" name="cenaOD" class="sforma_input_ck" style="width:40px;">
                             <span style="margin: -2px 6px 0px 15px; display: inline-block; font-weight:bold;">do</span>
                             <input type="text" name="cenaDO" class="sforma_input_ck" style="width:40px; float: none;">
                             <span style="margin: -2px 6px 0px 5px; display: inline-block; font-weight:bold;">€</span>
                             </td>
                         </tr>
                         <tr>
                             <th></th>
                             <td>
                                 <div style="padding-left:12px">
                                        <input class="sforma_button" type="submit" value="Pretraži" name="pretrazi" id="pretrazi" />
                                        <input class="sforma_button" type="reset" value="Resetuj"  />
                                 </div>  
                             </td>
                         </tr>
                               </table>
                       
                       </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    <div id="widget" style="margin-left:auto; margin-right: auto; padding-left:30px; margin-top:40px; text-align: center;">
                    <div style="text-align:left; font-size: 12px; font-family: Arial, sans-serif !important; color:#333333 !important; line-height: 16px; background:#fff; width:228px; padding: 8px 10px; border:solid 1px #dbdbd9;"><a href="http://www.nadjidom.com/"><img src="http://www.nadjidom.com/images/template_2/nadjidom_logo_w70.png"  title="Nekretnine Srbija - NadjiDom.com" style="float:left; margin: 0 12px 0 0px; width: 70px;" /></a><span>Oglašavamo se na</span> <br/><span style="font-weight: bold;">NadjiDom <a href="http://www.nadjidom.com/" style="color:#A4B817; font-weight: bold;">nekretnine</a></span></div>
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