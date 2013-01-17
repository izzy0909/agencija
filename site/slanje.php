<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Moving</title>
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
            <h1><a class="logo" href="index.html">logo</a></h1>
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
                    <li><a href="izdavanje.php">Izdavanje</a></li>
                    <li><a href="prodaja.php">Prodaja</a></li>
                    <li><a class="active" href="slanje.php">Pošaljite Nekretninu</a></li>
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
                	<h3 class="title">Pošaljite vašu nekretninu</h3>
                    <form id="form3" class="jqtransform p5" method="get">
                              	<div class="inner7">
                                <span class="text2">Select move type</span>
                                	 <select name="adult1"><option></option></select>
                                 <span class="text2">Move size</span>
                                	 <select name="adult2"><option></option></select>                                
                                </div>
                                <div class="inner8">
                                <span class="text2">Move date</span>
                                <div class="clear"></div>
                                	 <div class="a1"><select name="adult1"><option>December</option></select></div>
                                     <div class="a1"><select name="adult1"><option>05</option></select></div>
                                     <div class="fleft"><select name="adult1"><option>2012</option></select></div>
                                     <div class="clear"></div>
                                </div>
                                  <div class="clear"></div>         				
                                <a onClick="document.getElementById('form3').submit()" class="button1 fright p12">Search</a>
                                <div class="clear"></div>
                            </form>
    <form id="pro_form1" class="jqtransform p5">
        <label><span class="pro_text-form">First Name:</span><input type="text"></label>
        ...
        <label>
            <span class="pro_text-form fleft">Country:</span>
            <select>
                <option>United States</option>
                <option>United States</option>
            </select>
        </label>
        <label>
            <div class="pro_text-form">Message:</div>
            <textarea></textarea>
        </label>
        <div class="pro_wrapper">
            <input type="radio" name="group1"><div class="pro_text-form2 fleft">Male</div>
        </div>
        <div class="pro_wrapper">
            <input type="radio" name="group1"><div class="pro_text-form2 fleft">Female</div>
        </div>
        <div class="pro_wrapper">
            <input type="checkbox"><div class="pro_text-form3 fleft">Sign me up for your newsletter</div>
        </div>
        <a class="pro_btn">Send</a>
    </form>

                </article>
  
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
        
</body>
</html>