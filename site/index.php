<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Početna</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    
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
        <div id="slide">
            <div class="slider">
            <div class="banner-bg"></div>
                <ul class="items">
                    <li><img src="images/slide-1.jpg" alt="NE RADI SLIKA" /><div class="banner"><span>We can satisfy any taste</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-2.jpg" alt="NE RADI" /><div class="banner"><span>Your perfect partner for your life’s bloom</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-3.jpg" alt="NE RADI" /><div class="banner"><span>You are almost at home</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-4.jpg" alt="NE RADI" /><div class="banner"><span>Attractive home purchase offers</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                    <li><img src="images/slide-5.jpg" alt="NE RADI" /><div class="banner"><span>Every day we help people buy a home</span><p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.</p></div></li>
                </ul>
            </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content" class="p13">
            <div class="container_12">
                	<h4 class="p6">Featured <span>Listings</span></h4>
                    <div class="border1">
                    <div class="car-wrapper">
                        <div class="carousel">
                              <ul>
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
                                  </li>
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
                            <li><a href="izdavanje.php?kategorija=stanovi">Stanovi</a></li>
                            <li><a href="izdavanje.php?kategorija=kuce">Kuće</a></li>
                            <li><a href="izdavanje.php?kategorija=poslovni_prostori">Poslovni prostori</a></li>
                            <li><a href="izdavanje.php?kategorija=magacini">Magacini</a></li>
                            <li><a href="izdavanje.php?kategorija=lokali">Lokali</a></li>
                            </ul>
                            <div class="clear"></div>
                            <br/>
                            <div id="idpretraga">
                            <input type="text" class="sforma_input" onfocus="if(this.value =='PRETRAGA PO ID-u') this.value=''" onblur="if(this.value=='') this.value='PRETRAGA PO ID-u'" value="PRETRAGA PO ID-u" name="idpretraga" />
                            <a class="button1" href="#">Traži</a>
                            </div>
                            
                            <div class="clear"></div>
                    </article>
                    <article class="grid_4">
                    	<h3>Welcome</h3>
                        <figure class="page1-img3"><img src="images/page1-img10.jpg" alt=""></figure>
                        <span class="text1">Lorem ipsum doloa ettuing esent</span>
                        <p class="p9">Integer dapibus est porttitor lorem pretium nons it tempus ligula feugiat. Sed libero ligula, cursus id sollicitudin sit amet, auctor in sem. </p>
                        <p class="p10">Praesent tellus dui, pulvinar quis mattis vitae, is at  feugiat ut erat. Morbi sollicitudin nulla a urna all ten vehicula sit amet porta metus luctus.     </p>
                        <a class="button1" href="more.html">read more</a>
                    </article>
                    <article class="grid_4">
                    	<h3 class="title">Quick search</h3>
                        <form id="form2" class="jqtransform" method="get">
                              	<div class="inner2">
                                    <span class="text2">Price per month</span>
                                    <input type="text" onfocus="if(this.value =='Price in dollars') this.value=''" onblur="if(this.value=='') this.value='Price in dollars'" value="Price in dollars" name="name" />
                                    <span class="text3">to</span>
                                    <input type="text" name="name1" />
                                </div>                               
                                  <div class="clear"></div>
                                  <div class="inner3">
                                    <span class="text2">Location</span>
                                    <input type="text" onfocus="if(this.value =='Address, City, Zip') this.value=''" onblur="if(this.value=='') this.value='Address, City, Zip'" value="Address, City, Zip" name="name2" />                                   
                                </div>                               
                                  <div class="clear"></div>  
                                  <div class="inner4 p11">
                                  	 <span class="text2">Min bedrooms</span>
                                  	 <select name="adult1"><option>Any number</option></select>
                                     <span class="text2">Availability</span>
                                  	 <select name="adult2"><option>Any type</option></select>
                                  </div>  
                                  <div class="inner4">
                                  	 <span class="text2">Property type</span>
                                  	 <select name="adult3"><option>Any type</option></select>
                                     <span class="text2">Furnished</span>
                                  	 <select name="adult4"><option>Any type</option></select>
                                  </div>   
                                  <div class="clear"></div>              				
                                <a onClick="document.getElementById('form2').submit()" class="button1 fright p12">Search</a>
                                <div class="clear"></div>
                                <div class="inner5">
                                <span class="text4">Need more criteria?</span>
                                <a class="link3" href="more.html">Advanced search</a>
                                </div>
                                <div class="clear"></div>
                            </form>
                    </article>
                </div>
            </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
</body>
</html>