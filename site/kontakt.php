<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Jevtić Nekretnine :: Izdavanje i prodaja nekretnina Beograd</title>
  	<meta charset="utf-8">
    <meta name="description" content="Izdavanje i prodaja stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">
    <meta name="keywords" content="nekretnine, stanovi, kuce, izdavanje, prodaja, beograd, srbija, belgrade, serbia, real estate, apartment, house, rent, sale, kuće, lokal, magacin, garaza, garaža, poslovni prostor">
    <meta name="author" content="Web Refresh">
    <link rel="icon" href="images/kuca.png" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
        <script type="text/javascript">
            $(window).load(function(){
                $('#form1').forms({
                    ownerEmail:'info@jevticnekretnine.rs',
                    successShow:2000
                })
            })
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
                    <li><a class="active" href="kontakt.php" >Kontakt</a>
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
                            if(isset($_GET['slanje'])){
                                if ($_GET['slanje'] == 'Uspesno'){
                                    echo 'Poruka uspešno poslata!';
                                }
                                if ($_GET['slanje'] == 'Neuspesno'){
                                    echo 'Greška! Poruka nije poslata.';
                                }
                            }
                            
                        ?>
                    </article>
            	<article class="grid_8">
                	<h3>Kako do nas</h3>
                    <figure class="page6-img1">
                            <iframe width="600" height="307" src="https://maps.google.com/maps?&amp;q=Bokeljska 7,Beograd,Srbija&amp;output=embed">
                            </iframe>
                        </figure>
                        <div class="clear"></div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem.</p>
                         <dl class="dl1 p30">
                            <dt>8901 Marmora Road, Glasgow, D04 89GR.</dt>   
                            <dd><span>Freephone:</span>  +1 800 559 6580</dd>                                  
                            <dd><span>Telephone:</span>  +1 800 603 6035</dd> 
                            <dd><span>FAX:</span>   +1 800 889 9898</dd>                                
                            <dd>E-mail: <a href="#">mail@demolink.org</a></dd>
                        </dl>
                        <dl class="dl1 p30">
                            <dt>9863 - 9867 Mill Road, Cambridge, MG09 99HT.</dt>   
                            <dd><span>Freephone:</span>  +1 800 559 6580</dd>                                  
                            <dd><span>Telephone:</span>  +1 800 603 6035</dd> 
                            <dd><span>FAX:</span>   +1 800 889 9898</dd>                                
                            <dd>E-mail: <a href="#">mail@demolink.org</a></dd>
                        </dl>
                </article>
                <article class="grid_4">
                	<h3>Kontakt forma</h3>
                     <form id="form1">
                        <div class="success">Uspešno ste poslali poruku!<strong> Ubrzo ćemo odgovoriti.</strong></div>
                          <fieldset>
                              <label class="name">
                                    <input type="text" value="Ime:">
                                    <span class="error">*Pogrešan unos.</span> <span class="empty">*Ovo polje je obavezno.</span> 
                                </label>                                        
                                <label class="email">
                                    <input type="text" value="E-mail:">
                                    <span class="error">*Ova e-mail adresa nije validna.</span> <span class="empty">*Ovo polje je obavezno.</span> 
                                </label> 
                                 <label class="phone">
                                    <input type="tel" value="Telefon:">
                                    <span class="error">*Broj telefona nije validan.</span> <span class="empty">*Ovo polje je obavezno.</span> 
                                </label>                                                                    
                               <label class="message">
                              <textarea>Poruka</textarea>
                              <span class="error">*Poruka je prekratka.</span> <span class="empty">*Ovo polje je obavezno.</span> </label>
                              <div class="clear"></div>
                              <div class="link-form"> 
                                <a class="button1" href="#" data-type="reset">Obriši</a>                              
                                <a class="button1 p33" href="#" data-type="submit">Pošalji</a>                              
                              </div>
                          </fieldset>           
                      </form>
                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>