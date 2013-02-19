<?php

    include_once 'data_base_access/stanoviDA.php';
    include_once 'data_base_access/slikeDA.php';
    $stanovi = prikaziPoslednjeStanove();
    $row = prikaziSveOpstine();
    
    $hot = prikaziHotOfferStanove();

    $br_stan = prikaziBrojZaTip('Stan');
    $br_kuca = prikaziBrojZaTip('Kuća');
    $br_poslpro = prikaziBrojZaTip('Poslovni prostor');
    $br_magacin = prikaziBrojZaTip('Magacin');
    $br_lokal = prikaziBrojZaTip('Lokal');
    
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
    <link rel="stylesheet" href="css/demo.css">
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
<div style="display:none">
    
            <audio id="intro" autoplay>
            <source src="audio/intro.mp3">
            <source src="audio/intro.ogg">
            </audio>    
    
</div>
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
                    <li><a href="izdavanje.php" class="last3" >Izdavanje</a>
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
        <div id="slide">
            <div class="slider">
            <div class="banner-bg"></div>
                <ul class="items">
                    <li><img src="images/slide-1.jpg" /><div class="banner"><span>We can satisfy any taste</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-2.jpg" /><div class="banner"><span>Your perfect partner for your life’s bloom</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-3.jpg" /><div class="banner"><span>You are almost at home</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-4.jpg" /><div class="banner"><span>Attractive home purchase offers</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-5.jpg" /><div class="banner"><span>Every day we help people buy a home</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
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
                                      echo '<a href="detalji.php?id=' . $stan[0] . '"><figure class="page1-img1"><img src="admin/slike/thumb_' . $slika_thumb['naziv'] . '" alt="" ></figure></a><strong> Cena:&nbsp; ' . $stan['cena'] . ' €</strong>';
                                      echo '<ul class="list1">';
                                      echo '<li>Tip:<span>' . $stan['tip'] . '</span></li>';
                                      if($stan['tip']=='Stan') {echo '<li><span>' . $stan['stan_tip'] . '</span></li>'; };
                                      echo '<li>Lokacija:<span>' . $stan['opstina'] . '</span></li>';
                                      echo '</ul></li>';
                                  }
                                  ?>
                            <!--      <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img1.jpg" alt=""></figure></a>
                                    <strong> Cena:&nbsp; $370 000 </strong>
                                    <ul class="list1">
                                        <li>Tip:<span>Stan</span></li>
                                        <li>Lokacija:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li>
                                   <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img2.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $500 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li>
                                   <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img3.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $904 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li> <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img4.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $220 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li>
                                  <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img1.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $370 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li>
                                   <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img2.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $500 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li>
                                   <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img3.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $904 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li> <li>
                                  	<a href="more.html"><figure class="page1-img1"><img src="images/page1-img4.jpg" alt=""></figure></a>
                                    <strong> Cost:&nbsp; $220 000 </strong>
                                    <ul class="list1">
                                        <li>House size:<span>2,700 Sq Ft</span></li>
                                        <li>Lot size:<span>0.19 Acres</span></li>
                                    </ul>
                                  </li> -->
                              </ul>
                        </div>
                        <a class="prev1 car-button" data-type="prevPage"></a>
                    <a class="next1 car-button" data-type="nextPage"></a>                    
                    </div>
                    <div class="clear"></div>
                    </div>  
                <div class="wrapper">
                	<article class="grid_4">
                    	<h3 class="p7">Katalog ponude</h3>
                            <ul class="list8">
                            <li><a href="izdavanje.php?tip=Stan">Stanovi (<?php echo $br_stan[0]; ?>)</a></li>
                            <li><a href="izdavanje.php?tip=Kuća">Kuće (<?php echo $br_kuca[0]; ?>)</a></li>
                            <li><a href="izdavanje.php?tip=Poslovni+prostor">Poslovni prostori (<?php echo $br_poslpro[0]; ?>)</a></li>
                            <li><a href="izdavanje.php?tip=Magacin">Magacini (<?php echo $br_magacin[0]; ?>)</a></li>
                            <li><a href="izdavanje.php?tip=Lokal">Lokali (<?php echo $br_lokal[0]; ?>)</a></li>
                            </ul>
                            <div class="clear"></div>
                            <br/>
                            <div id="idpretraga">
                                <form id="traziID" action="#" method="post">
                                    <h6 class="title">Pretraga po kataloškom broju:</h6>
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
                    </article>
                    
                    <article class="grid_4">
                    	<h3>Najbolje u ponudi!</h3>
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
                        <div id="sforma">
                    	<h3 class="title">Brza pretraga</h3>
                        <form id="brzapretraga" action="izdavanje.php" method="get">
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
                                <th>Struktura</th>
                                <td>
                                    <select name="stan_tip" class="sforma_select">
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
                                 <th>Površina:</th>
                                 <td><select name="povOD" class="select_m" style="margin-left:10px;">
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
                             <select name="povDO" class="select_m">
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
                             <td><select name="cenaOD" class="select_m" style="margin-left:10px;">
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
                             <select name="cenaDO" class="select_m">
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