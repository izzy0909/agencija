<?php

include_once 'data_base_access/stanoviDA.php';
include_once 'data_base_access/trazimoDA.php';

    
    
   $row = prikaziSveOpstine();


//var_dump($row);

   
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
            <div class="head-box2">
                <div class="clear"></div>
                <a href="#" class="link1"><img src="images/soc-fb.png" width="39" alt="Lajkujte nas na Fejsbuku!"></a>
                <a href="#" class="link1"><img src="images/soc-tw.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="#" class="link1"><img src="images/soc-ms.png" width="39" alt="Pratite nas na Tviteru!"></a>
                <a href="#" class="link1"><img src="images/soc-li.png" width="39" alt="Nađite nas na Linkedin-u!"></a>
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
                    <li><a href="prodaja.php">Prodaja</a>
                            <ul>
                            <li><a href="prodaja.php?tip=Stan">Stanovi</a></li>
                            <li><a href="prodaja.php?tip=Kuće">Kuće</a></li>
                            <li><a href="prodaja.php?tip=Poslovni+prostor">Poslovni prostori</a></li>
                            <li><a href="prodaja.php?tip=Magacin">Magacini</a></li>
                            <li><a href="prodaja.php?tip=Lokal">Lokali</a></li>
                            <li><a href="prodaja.php?tip=Garaža">Garaže</a></li>
                            </ul></li>
                    <li><a href="slanje.php"><SPAN STYLE="font-size: 9pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a class="active" href="trazimozavas.php">Tražimo za Vas</a></li>
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
                	<h3>Mi tražimo nekretninu za vas!</h3>
                 <div id="sforma">
                <form id="dodaj_trazimo" action="trazimozavas.php" method="post">
                <div id="pos1">
		<table>
                    <tr>
                        
                        <th>Usluga:</th>
                        <td style="width:155px; padding: 2px;">
                            <label><input type="radio" style="margin:2px 3px 20px 10px;" name="kategorija" value="izdavanje" checked>Izdavanje</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" style="margin:2px 3px 20px 10px;" name="kategorija" value="prodaja">Prodaja</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Tip:</th>
                        <td><select name="tip" class="sforma_select">
                                <option value="Stan">Stan</option>
                                <option value="Kuća">Kuća</option>
                                <option value="Poslovni prostor">Poslovni prostor</option>
                                <option value="Magacin">Magacin</option>
                                <option value="Lokal">Lokal</option>
                                <option value="Garaža">Garaža</option>
                                <option value="Apartman na dan">Apartman na dan</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th></th>
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
                </table>                  
                </div>
                    <div id="drugired" style="float:left; margin-left:40px;">
                        <table>
                                    <tr>
			<th>Sprat:</th>
			<td><select name="sprat" class="sforma_select">
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
		<tr>
                    <th>Lokacija:</th>
                    <td>
                    <select name="opstina" class="sforma_select">
                                     <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
                </select>
                    </td>
               
                <tr>
                <th>Grejanje:</th>
                <td>        <select name="grejanje" class="sforma_select">
                                <option value="CG">CG</option>
                                <option value="EG">EG</option>
                                <option value="TA">TA</option>
                                <option value="PG">PG</option>
                                <option value="Klima uređaj">Klima uređaj</option>
                            </select></td>
                </tr>
                        </table>
                        </div>
                            
                    <div id="trecired" style="float:left; margin-left:40px;">
                        <table>
                        <tr>
                        <th>Nameštenost:</th>
                        <td>
                            <select name="namestenost" class="sforma_select">
                                <option value="Namešten">Namešten</option>
                                <option value="Nenamešten">Nenamešten</option>
                            </select>
                        </td>
                        </tr>                             
                        <tr>
                        <th>Površina:</th>
                        <td><select name="pov_od" class="select_m" style="margin-left:10px;">
                        <option value="20">od 20 m²</option>
                        <option value="40">od 40 m²</option>
                        <option value="60">od 60 m²</option>
                        <option value="80">od 80 m²</option>
                        <option value="100">od 100 m²</option>
                        <option value="150">od 150 m²</option>
                        <option value="200">od 200 m²</option>
                        <option value="300">od 300 m²</option>
                    </select>&nbsp;&nbsp;-&nbsp;
                    <select name="pov_do" class="select_m">
                        <option value="40">do 40 m²</option>
                        <option value="60">do 60 m²</option>
                        <option value="80">do 80 m²</option>
                        <option value="100">do 100 m²</option>
                        <option value="150">do 150 m²</option>
                        <option value="200">do 200 m²</option>
                        <option value="300">do 300 m²</option>
                        <option value="300v">više od 300 m²</option>                        
                    </select></td>
                    </tr>  
                    <tr>
                    <th>Cena:</th>
                    <td><select name="cena_od" class="select_m" style="margin-left:10px;">
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
                    <select name="cena_do" class="select_m">
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
                        <option value="3000v">više od 3000 €</option>
                    </select></td>
                </tr>  
                        </table>
                    </div>                      
                    <div id="informacije" style="float:left; margin-top:25px;">
                    <table>
                    <tr>
                        <th>Ime i prezime:</th>
                            <td><input type="text" name="ime" class="sforma_input"></td>
                    </tr>
                    <tr>
                         <th>Telefon:</th>
                         <td><input type="text" name="telefon" class="sforma_input"/></td>
                    </tr>
                    <tr>
                         <th>E-mail:</th>
                         <td><input type="text" name="email" class="sforma_input"/></td>
                    </tr>  
                    </table>
                    </div>
                    
                    <div id="pos2"><table>
                        <tr><th>Dodatne informacije (napomene)</th></tr>
                    <tr><td><textarea style="resize: none;" name="opis"></textarea>
                    </td></tr>
                    </table>
                    </div>

                                <div class="dugmad">
                                        <input type="submit" value="Pošalji" class="sforma_button" name="dodaj_trazimo" id="dodaj_trazimo" />
                                        <input type="reset" value="Obriši" class="sforma_button" /></div>
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

<?php

    if (isset ($_POST['dodaj_trazimo'])){
	
    $kategorija = isset($_POST['kategorija']) ? $_POST['kategorija'] : null;
    $tip = isset($_POST['tip']) ? $_POST['tip'] : null;
    $stan_tip = isset($_POST['stan_tip']) ? $_POST['stan_tip'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $ime = isset($_POST['ime']) ? $_POST['ime'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $grejanje = isset($_POST['grejanje']) ? $_POST['grejanje'] : null;
    $namestenost = isset($_POST['namestenost']) ? $_POST['namestenost'] : null;
    $povrsina_od = isset($_POST['pov_od']) ? $_POST['pov_od'] : null;
    $povrsina_do = isset($_POST['pov_do']) ? $_POST['pov_do'] : null;
    $cena_od = isset($_POST['cena_od']) ? $_POST['cena_od'] : null;
    $cena_do = isset($_POST['cena_do']) ? $_POST['cena_do'] : null;
    $opis = isset($_POST['opis']) ? $_POST['opis'] : null;
    

    dodajTrazimo($kategorija, $tip, $stan_tip, $opstina, $ime, $telefon, $email, $sprat, $grejanje, $namestenost, $povrsina_od, $povrsina_do, $cena_od, $cena_do, $opis);


}
?>