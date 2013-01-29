<?php

include_once '../data_base_access/ponudeDA.php';
include_once '../data_base_access/stanoviDA.php';

    
    
   $row = prikaziSveOpstine();


//var_dump($row);
                        
                        
?>


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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>  
<script type="text/javascript"> 
$(document).ready(function() { 
//elements
var progressbox 		= $('#progressbox'); //progress bar wrapper
var progressbar 		= $('#progressbar'); //progress bar element
var statustxt 			= $('#statustxt'); //status text element
var submitbutton 		= $("#SubmitButton"); //submit button
var myform 				= $("#UploadForm"); //upload form
var output 				= $("#output"); //ajax result output element
var completed 			= '0%'; //initial progressbar value
var FileInputsHolder 	= $('#AddFileInputBox'); //Element where additional file inputs are appended
var MaxFileInputs		= 10; //Maximum number of file input boxs

// adding and removing file input box
var i = $('#AddFileInputBox div').size() + 1;
$('#AddMoreFileBox').live('click', function() {
		if(i < MaxFileInputs)
		{
			$('<span><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/><a href="#" class="small2" id="removeFileBox"><img src="images/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder);
			i++;
		}
		return false;
});
$('#removeFileBox').live('click', function() { 
		if( i > 1 ) {
				$(this).parents('span').remove();i--;
		}
		return false;
});

$("#ShowForm").click(function () {
  $("#uploaderform").slideToggle(); //Slide Toggle upload form on click
});
	
$(myform).ajaxForm({
	beforeSend: function() { //brfore sending form
		submitbutton.attr('disabled', ''); // disable upload button
		statustxt.empty();
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text
		
	},
	uploadProgress: function(event, position, total, percentComplete) { //on progress
		progressbar.width(percentComplete + '%') //update progressbar percent complete
		statustxt.html(percentComplete + '%'); //update status text
		if(percentComplete>50)
			{
				statustxt.css('color','#fff'); //change status text to white after 50%
			}else{
				statustxt.css('color','#000');
			}
			
		},
	complete: function(response) { // on complete
		output.html(response.responseText); //update element with received data
		myform.resetForm();  // reset form
		submitbutton.removeAttr('disabled'); //enable submit button
		progressbox.hide(); // hide progressbar
		$("#uploaderform").slideUp(); // hide form after upload
	}
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
                    <li><a class="active" href="slanje.php"><SPAN STYLE="font-size: 10pt;">Ponudite Nekretninu</SPAN></a></li>
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
                	
        <!--<form id="form_send" class="jqtransform p5"> -->
                
                <div id="sforma">
                <h3 class="title">Ponudite vašu nekretninu</h3>
                <form id="ponudi_stan" action="slanje.php" method="post">
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
                        <td><select name="tip">
                                <option value="stan">Stan</option>
                                <option value="kuca">Kuća</option>
                                <option value="poslovniprostor">Poslovni prostor</option>
                                <option value="magacin">Magacin</option>
                                <option value="lokal">Lokal</option>
                            </select></td>
                    </tr>
		<tr>
			<th>Vlasnik:</th>
			<td><input type="text" name="vlasnik" class="sforma_input"></td>
		</tr>
		<tr>
			<th>Ulica i broj:</th>
			<td><input type="text" name="adresa" class="sforma_input"></td>
		</tr>
        <tr>
			<th>Sprat:</th>
			<td><input type="text" name="sprat" class="sforma_input"></td>
		</tr>
		<tr>
                    <th>Lokacija:</th>
                    <td>
                    <select name="opstina">
                                     <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
                </select>
                    </td>

                <tr>
                <th>Telefon:</th>
                <td><input type="text" name="telefon" class="sforma_input"/></td>
                </tr>    
                <tr>
                <th>Cena:</th>
                <td><input type="text" name="cena" class="sforma_input_ck"/><span style="padding:15px; font-size: 18px;">€</span></td>
                </tr>     
                <tr>
                <th>Kvadratura:</th>
                <td><input type="text" name="kvadratura" class="sforma_input_ck"/><span style="padding:15px; font-size: 18px;">m²</span></td>
                </tr>
                <tr>
                <th>Nameštenost</th>
                <td>
                    <select name="namestenost">
                        <option value="namesten">Namešten</option>
                        <option value="nenamesten">Nenamešten</option>
                    </select>
                </td>
                </tr>
                <tr>
                    
                <th>Slike1:</th>
                <td>
                <div id="AddFileInputBox" style="margin:2px 0 10px 10px; width:100px;"><input type="file"  name="file[]"/></div>
                <div class="sep_s"></div>
                </td>
                </tr>
                
                <tr>
		<th>&nbsp;</th>
		<td><div style="float:right;">
                <span class="small"><a href="#" id="AddMoreFileBox">Dodaj još</a></span></div>
		</td>
                </tr>                
                </table>
                </div>


                    <div id="tagovi">
            <table>
                <tr style="background-color:#f3f3f3;">
                <td style="width: 144px;"><input type="checkbox" name="grejanje" >Grejanje</td>
                <td style="width: 144px;"><input type="checkbox" name="kablovska" >Kablovska</td>
                <td style="width: 144px;"><input type="checkbox" name="tv">TV</td>
                <td style="width: 144px;"><input type="checkbox" name="klima">Klima</td>
                </tr>    
                <tr>
                <td><input type="checkbox" name="internet" >Internet</td>
                <td><input type="checkbox" name="ima_telefon" >Telefon</td>
                <td><input type="checkbox" name="frizider" >Frižider</td>
                <td><input type="checkbox" name="sporet" >Šporet</td>                
                </tr>
                <tr style="background-color:#f3f3f3;">
                <td><input type="checkbox" name="vesmasina" >Veš mašina</td>
                <td><input type="checkbox" name="kuhinjskielementi" >Kuhinjski elementi</td>
                <td><input type="checkbox" name="plakari" >Plakari</td>
                <td><input type="checkbox" name="lift" >Lift</td>                
                </tr>
                <tr>
                <td><input type="checkbox" name="bazen" >Bazen</td>
                <td><input type="checkbox" name="garaza" >Garaža</td>
                <td><input type="checkbox" name="parking" >Parking</td>
                <td><input type="checkbox" name="dvoriste" >Dvorište</td>                
                </tr>
                <tr style="background-color:#f3f3f3;">
                <td><input type="checkbox" name="potkrovlje" >Potkrovlje</td>
                <td><input type="checkbox" name="terasa" >Terasa</td> 
                <td><input type="checkbox" name="novogradnja" >Novogradnja</td>
                <td><input type="checkbox" name="renovirano" >Renovirano</td>                
                </tr>
                <tr>
                <td><input type="checkbox" name="lux" >Lux</td>   
                <td><input type="checkbox" name="penthaus" >Penthaus</td>
                <td><input type="checkbox" name="salonski" >Salonski</td>
                <td><input type="checkbox" name="lodja" >Lođa</td>
                </tr>
            </table>
                    </div>
                    <div id="pos2"><table>
                        <tr><th>Dodatne informacije (napomene)</th><tr>
                    <tr><td><textarea style="resize: none;" name="opis"></textarea>
                    </td></tr>
                    </table>
                    </div>

                                <div class="dugmad">
                                        <input type="submit" value="Pošalji" class="sforma_button" name="ponudi_stan" id="ponudi_stan" />
                                        <input type="reset" value="Obriši" class="sforma_button" /></div>
                </form>    
                </div>
     </article>    

            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
<?php include 'includes/footer.php'; ?>
      
</body>
</html>
<?php

if (isset ($_POST['ponudi_stan'])){
	
    $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
    $adresa = isset($_POST['adresa']) ? $_POST['adresa'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
    $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
    $opis = isset($_POST['opis']) ? $_POST['opis'] : null;
    
    $grejanje = isset($_POST['grejanje']) ? '1' : '0';
    $kablovska = isset($_POST['kablovska']) ? '1' : '0';
    $tv = isset($_POST['tv']) ? '1' : '0';
    $klima = isset($_POST['klima']) ? '1' : '0';
    $internet = isset($_POST['internet']) ? '1' : '0';
    $ima_telefon = isset($_POST['ima_telefon']) ? '1' : '0';
    $frizider = isset($_POST['frizider']) ? '1' : '0';
    $sporet = isset($_POST['sporet']) ? '1' : '0';
    $vesmasina = isset($_POST['vesmasina']) ? '1' : '0';
    $kuhinjskielementi = isset($_POST['kuhinjskielementi']) ? '1' : '0';
    $plakari = isset($_POST['plakari']) ? '1' : '0';
    $lift = isset($_POST['lift']) ? '1' : '0';
    $bazen = isset($_POST['bazen']) ? '1' : '0';
    $garaza = isset($_POST['garaza']) ? '1' : '0';
    $parking = isset($_POST['parking']) ? '1' : '0';
    $dvoriste = isset($_POST['dvoriste']) ? '1' : '0';
    $potkrovlje = isset($_POST['potkrovlje']) ? '1' : '0';
    $terasa = isset($_POST['terasa']) ? '1' : '0';
    $novogradnja = isset($_POST['novogradnja']) ? '1' : '0';
    $renovirano = isset($_POST['renovirano']) ? '1' : '0';
    $lux = isset($_POST['lux']) ? '1' : '0';
    $penthaus = isset($_POST['penthaus']) ? '1' : '0';
    $salonski = isset($_POST['salonski']) ? '1' : '0';
    $lodja = isset($_POST['lodja']) ? '1' : '0';
    
    dodajPonudu($vlasnik, $opstina, $adresa, $telefon, $cena, $sprat, $kvadratura, $opis, $grejanje, $kablovska , $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja);
    
    //var_dump($grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    //echo $vlasnik . '///' . $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;
}
?>