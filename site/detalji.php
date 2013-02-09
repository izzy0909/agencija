<?php

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';

   	if (isset ($_GET['id'])){
	$id = $_GET['id'];
        
	}
        else { header('Location: index.php'); }
    

   $row = prikaziSveOpstine();
   $stan = prikaziStan($id);
   $tagovi = ispisiDodatneTagove($id);
   


//var_dump($row);
                        
                        
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Detalji</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
            <style>

            /* Demo styles */
            html,body{background:#222;margin:0;}
            body{border-top:4px solid #000;}
            .content{color:#777;font:12px/1.4 "helvetica neue",arial,sans-serif;width:600px;margin:20px auto;}
            h1{font-size:12px;font-weight:normal;color:#ddd;margin:0;}
            p{margin:0 0 20px}
            a {color:#22BCB9;text-decoration:none;}
            .cred{margin-top:20px;font-size:11px;}

            /* This rule is read by Galleria to define the gallery height: */
            #galleria{height:400px}

        </style>

        <!-- load jQuery 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> -->
        <!-- load Galleria -->
        <script src="js/galleria-1.2.9.min.js"></script>

    
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
                    <li><a href="izdavanje.php">Izdavanje</a>
                         <ul>
                             <li><a href="izdavanje.php?kategorija=stanovi">Stanovi</a></li>
                            <li><a href="izdavanje.php?kategorija=kuce">Kuće</a></li>
                            <li><a href="izdavanje.php?kategorija=poslovni_prostori">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?kategorija=magacini">Magacini</a></li>
                            <li><a href="izdavanje.php?kategorija=lokali">Lokali</a></li>                                

                            </ul></li>
                    <li><a href="prodaja.php">Prodaja</a>
                            <ul>
                            <li><a href="prodaja.php?kategorija=stanovi">Stanovi</a></li>
                            <li><a href="prodaja.php?kategorija=kuce">Kuće</a></li>
                            <li><a href="prodaja.php?kategorija=poslovni_prostori">Poslovni prostori</a></li>
                            <li><a href="prodaja.php?kategorija=magacini">Magacini</a></li>
                            <li><a href="prodaja.php?kategorija=lokali">Lokali</a></li>     
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
                    <div id="detalji1">
                        <div id="kbr">
                        <span>KATALOŠKI BROJ: <?php echo $id; ?></span>
                        </div>
                        <div id="tip"><span><?php echo $stan['kategorija'] . ' | ' . $stan['tip'] . ' | ' . $stan['stan_tip']; ?></span>
                        </div>
                        <table style="text-align: left; width:100%;">
                            <tr>
                                <th style="width:125px;">Lokacija:</th>
                                <td style="width:125px;"><?php echo $stan['opstina']; ?></td>
                            </tr>
                            <tr>
                                <th>Ulica:</th>
                                <td><?php echo $stan['ulica']; ?></td>
                            </tr>
                            <tr>
                                <th>Cena:</th>
                                <td><?php echo $stan['cena'] . ' €'; ?></td>
                            </tr>
                            <tr>
                                <th>Površina:</th>
                                <td><?php echo $stan['kvadratura'] . ' m²'; ?></td>
                            </tr>
                            <tr>
                                <th>Nameštenost:</th>
                                <td><?php echo $stan['namestenost']; ?></td>
                            </tr>
                            <tr>
                                <th>Sprat:</th>
                                <td><?php echo $stan['sprat']; ?></td>
                            </tr>
                            <tr>
                                <th>Grejanje:</th>
                                <td><?php echo $stan['grejanje']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Dodatne informacije:</strong><br /><?php echo $stan['opis']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div id="detalji3">
                        <div id="galleria">
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Athabasca_Rail_at_Brule_Lake.jpg/800px-Athabasca_Rail_at_Brule_Lake.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Athabasca_Rail_at_Brule_Lake.jpg/100px-Athabasca_Rail_at_Brule_Lake.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Back-scattering_crepuscular_rays_panorama_1.jpg/1280px-Back-scattering_crepuscular_rays_panorama_1.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Back-scattering_crepuscular_rays_panorama_1.jpg/100px-Back-scattering_crepuscular_rays_panorama_1.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Interior_convento_3.jpg/800px-Interior_convento_3.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Interior_convento_3.jpg/120px-Interior_convento_3.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Oxbow_Bend_outlook_in_the_Grand_Teton_National_Park.jpg/800px-Oxbow_Bend_outlook_in_the_Grand_Teton_National_Park.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Oxbow_Bend_outlook_in_the_Grand_Teton_National_Park.jpg/100px-Oxbow_Bend_outlook_in_the_Grand_Teton_National_Park.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Hazy_blue_hour_in_Grand_Canyon.JPG/800px-Hazy_blue_hour_in_Grand_Canyon.JPG">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Hazy_blue_hour_in_Grand_Canyon.JPG/100px-Hazy_blue_hour_in_Grand_Canyon.JPG"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/2909_vallon_moy_res.jpg/800px-2909_vallon_moy_res.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/2909_vallon_moy_res.jpg/100px-2909_vallon_moy_res.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bohinjsko_jezero_2.jpg/800px-Bohinjsko_jezero_2.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bohinjsko_jezero_2.jpg/100px-Bohinjsko_jezero_2.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Bowling_Balls_Beach_2_edit.jpg/800px-Bowling_Balls_Beach_2_edit.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Bowling_Balls_Beach_2_edit.jpg/100px-Bowling_Balls_Beach_2_edit.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/800px-Biandintz_eta_zaldiak_-_modified2.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/100px-Biandintz_eta_zaldiak_-_modified2.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Athabasca_Rail_at_Brule_Lake.jpg/800px-Athabasca_Rail_at_Brule_Lake.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Athabasca_Rail_at_Brule_Lake.jpg/100px-Athabasca_Rail_at_Brule_Lake.jpg"
                            >
                        </a>
                        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Back-scattering_crepuscular_rays_panorama_1.jpg/1280px-Back-scattering_crepuscular_rays_panorama_1.jpg">
                            <img 
                                src="http://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Back-scattering_crepuscular_rays_panorama_1.jpg/100px-Back-scattering_crepuscular_rays_panorama_1.jpg"
                            >
                        </a>                         
                    </div>
                <script>

                // Load the classic theme
                Galleria.loadTheme('js/galleria.classic.min.js');

                // Initialize Galleria
                Galleria.run('#galleria');

                </script>


                    </div>
                    <div id="googlemapa">
                        <?php
                        //$gmap='https://maps.google.com/maps?&amp;q=' . $stan['ulica'] . ', ' . $stan['opstina'] .  ', Beograd, Serbia&amp;output=embed';
                        $gmap=$stan['ulica'] . ", " . $stan['opstina'] . ", Beograd, Serbia";
                        //echo $gmap;
                        ?>
                        <iframe width="580" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $gmap; ?>&hl=en&output=embed&iwloc=near"></iframe>
                    </div>
                    <div id="detalji2">
                        <?php
                            if($tagovi['kablovska']) echo '<span><img src="images/t.png"> Kablovska</span>';
                            if($tagovi['tv']) echo '<span><img src="images/t.png"> TV</span>';
                            if($tagovi['klima']) echo '<span><img src="images/t.png"> Klima</span>';
                            if($tagovi['internet']) echo '<span><img src="images/t.png"> Internet</span>';
                            if($tagovi['telefon']) echo '<span><img src="images/t.png"> Telefon</span>';
                            if($tagovi['frizider']) echo '<span><img src="images/t.png"> Frižider</span>';
                            if($tagovi['sporet']) echo '<span><img src="images/t.png"> Šporet</span>';
                            if($tagovi['ves_masina']) echo '<span><img src="images/t.png"> Veš mašina</span>';
                            if($tagovi['kuhinjski_elementi']) echo '<span><img src="images/t.png"> Kuhinjski elementi</span>';
                            if($tagovi['plakari']) echo '<span><img src="images/t.png"> Plakari</span>';
                            if($tagovi['interfon']) echo '<span><img src="images/t.png"> Interfon</span>';
                            if($tagovi['lift']) echo '<span><img src="images/t.png"> Lift</span>';
                            if($tagovi['bazen']) echo '<span><img src="images/t.png"> Bazen</span>';
                            if($tagovi['garaza']) echo '<span><img src="images/t.png"> Garaža</span>';
                            if($tagovi['parking']) echo '<span><img src="images/t.png"> Parking</span>';
                            if($tagovi['dvoriste']) echo '<span><img src="images/t.png"> Dvorište</span>';
                            if($tagovi['potkrovlje']) echo '<span><img src="images/t.png"> Potkrovlje</span>';
                            if($tagovi['terasa']) echo '<span><img src="images/t.png"> Terasa</span>';
                            if($tagovi['novogradnja']) echo '<span><img src="images/t.png"> Novogradnja</span>';
                            if($tagovi['renovirano']) echo '<span><img src="images/t.png"> Renovirano</span>';
                            if($tagovi['lux']) echo '<span><img src="images/t.png"> Lux</span>';
                            if($tagovi['penthaus']) echo '<span><img src="images/t.png"> Penthaus</span>';
                            if($tagovi['salonski']) echo '<span><img src="images/t.png"> Salonski</span>';
                            if($tagovi['lodja']) echo '<span><img src="images/t.png"> Lođa</span>';
                            
                        ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>