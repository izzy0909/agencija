<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Izdavanje</title>
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
                    <li><a href="slanje.php"><SPAN STYLE="font-size: 10pt;">Ponudite Nekretninu</SPAN></a></li>
                    <li><a href="onama.php">O nama</a></li>
                    <li><a href="trazimozavas.php"><SPAN STYLE="font-size: 8pt;">Tražimo nekretninu za Vas</SPAN></a></li>
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
                        if (!isset($_GET['kategorija'])){
                            echo '<center><a href="izdavanje.php?kategorija=stanovi"><img src="images/izd-stanovi.jpg" alt="Stanovi" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?kategorija=kuce"><img src="images/izd-kuce.jpg" alt="Kuće" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?kategorija=poslovni_prostori"><img src="images/izd-poslovniprostori.jpg" alt="Poslovni prostori" /></a>';
                            echo '<br /><br /><a href="izdavanje.php?kategorija=magacini"><img src="images/izd-magacini.jpg" alt="Magacini" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="izdavanje.php?kategorija=lokali"><img src="images/izd-lokali.jpg" alt="Lokali" /></a></center>';
                        }
                        else { echo '<h3 class="p19">Pretraga nekretnina</h3>';}
                      ?>
                	

                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>