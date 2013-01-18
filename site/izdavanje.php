<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Buying</title>
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
            	<span>1-800-555-1234</span>
                <div class="clear"></div>
                <a class="link1" href="#">realestate@demolink.org</a>
            </div>
            <div class="clear"></div>
            </div>            
        </div>
        <div class="clear"></div>
        <div class="head-box3">
        	<div class="main">
            	<nav>
                <ul class="sf-menu">
                    <li><a href="index.php">Početna</a>
                    	<ul>
                            <li><a href="more.html">Homes for Sale</a></li>
                            <li><a href="more.html">New Homes for Sale</a></li>
                            <li><a href="more.html">Foreclosures</a></li>
                            <li><a href="more.html">Rentals</a></li>
                            <li><a class="last3" href="more.html">Properties</a>
                            	<ul>
                                    <li><a href="more.html">Bedrooms</a></li>
                                    <li><a href="more.html">New Homes </a></li>
                                    <li><a href="more.html">House Description</a></li>
                                    <li><a href="more.html">Latest News</a></li>
                                    <li><a class="last3" href="more.html">Our Contacts</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="active" href="izdavanje.php">Izdavanje</a></li>
                    <li><a href="prodaja.php">Prodaja</a></li>
                    <li><a href="slanje.php">Pošaljite Nekretninu</a></li>
                    <li><a href="onama.php">O nama</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                </ul>
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
                   <article class="grid_4">
                	<h3 class="p19">Pretraga nekretnina</h3>
                    <div class="page3-box1">
                    <form id="form3" class="jqtransform" method="get">
                              	<div class="inner7 p20">
                                <span class="text2">Enter a city</span>
                                	 <select name="adult1"><option></option></select>
                                 <span class="text2">Min. price</span>
                                	 <select name="adult2"><option></option></select>
                                 <span class="text2">Beds</span>
                                	 <select name="adult3"><option></option></select>  
                                </div>
                                <div class="inner7">
                                <span class="text2">State / prov.</span>
                                	 <select name="adult4"><option></option></select>
                                 <span class="text2">Max. price</span>
                                	 <select name="adult5"><option></option></select>
                                 <span class="text2">Baths</span>
                                	 <select name="adult6"><option></option></select>  
                                </div>
                                  <div class="clear"></div>  
                                  <a class="link8" href="more.html">More search options</a>            				
                                <a onClick="document.getElementById('form3').submit()" class="button1 fright p12">Search</a>
                                <div class="clear"></div>
                            </form>
                            </div>
                </article>
            	<article class="grid_8">
                	
                            <h3 class="p14">Prostor za ispis</h3>

                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>