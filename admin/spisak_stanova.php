<?php

include_once '../data_base_access/stanoviDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}else{         
                $username = $_SESSION['username'];
                if (isset ($_GET['pretrazi'])){
                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
                    $namestenost = isset($_GET['namestenost']) ? $_GET['namestenost'] : null;
                    $povrsina_od = isset($_GET['povOD']) ? $_GET['povOD'] : null;
                    $povrsina_do = isset($_GET['povDO']) ? $_GET['povDO'] : null;
                    $telefon = isset($_GET['telefon']) ? $_GET['telefon'] : null;
                    $ulica = isset($_GET['ulica']) ? $_GET['ulica'] : null;
                    $stan_tip = isset($_GET['stan_tip']) ? $_GET['stan_tip'] : null;
                    $opstina = isset($_GET['opstina']) ? $_GET['opstina'] : null;
                    $cena_od = isset($_GET['cenaOD']) ? $_GET['cenaOD'] : null;
                    $cena_do = isset($_GET['cenaDO']) ? $_GET['cenaDO'] : null;

                    $kablovska = isset($_REQUEST['kablovska']) ? '1' : '0';
                    $tv = isset($_REQUEST['tv']) ? '1' : '0';
                    $klima = isset($_REQUEST['klima']) ? '1' : '0';
                    $internet = isset($_REQUEST['internet']) ? '1' : '0';
                    $ima_telefon = isset($_REQUEST['ima_telefon']) ? '1' : '0';
                    $frizider = isset($_REQUEST['frizider']) ? '1' : '0';
                    $sporet = isset($_REQUEST['sporet']) ? '1' : '0';
                    $vesmasina = isset($_REQUEST['vesmasina']) ? '1' : '0';
                    $kuhinjskielementi = isset($_REQUEST['kuhinjskielementi']) ? '1' : '0';
                    $plakari = isset($_REQUEST['plakari']) ? '1' : '0';
                    $interfon = isset($_REQUEST['interfon']) ? '1' : '0';
                    $lift = isset($_REQUEST['lift']) ? '1' : '0';
                    $bazen = isset($_REQUEST['bazen']) ? '1' : '0';
                    $garaza = isset($_REQUEST['garaza']) ? '1' : '0';
                    $parking = isset($_REQUEST['parking']) ? '1' : '0';
                    $dvoriste = isset($_REQUEST['dvoriste']) ? '1' : '0';
                    $potkrovlje = isset($_REQUEST['potkrovlje']) ? '1' : '0';
                    $terasa = isset($_REQUEST['terasa']) ? '1' : '0';
                    $novogradnja = isset($_REQUEST['novogradnja']) ? '1' : '0';
                    $renovirano = isset($_REQUEST['renovirano']) ? '1' : '0';
                    $lux = isset($_REQUEST['lux']) ? '1' : '0';
                    $penthaus = isset($_REQUEST['penthaus']) ? '1' : '0';
                    $salonski = isset($_REQUEST['salonski']) ? '1' : '0';
                    $lodja = isset($_REQUEST['lodja']) ? '1' : '0';
                    $duplex = isset($_REQUEST['duplex']) ? '1' : '0';
                    $nov_namestaj = isset($_REQUEST['nov_namestaj']) ? '1' : '0';
                    $kompjuterska_mreza = isset($_REQUEST['kompjuterska_mreza']) ? '1' : '0';
                    $dva_kupatila = isset($_REQUEST['dva_kupatila']) ? '1' : '0';
                    $vise_telefonskih_linija = isset($_REQUEST['vise_telefonskih_linija']) ? '1' : '0';
                    $vertikala = isset($_REQUEST['vertikala']) ? '1' : '0';
                    $horizontala = isset($_REQUEST['horizontala']) ? '1' : '0';
                    $stan_u_kuci = isset($_REQUEST['stan_u_kuci']) ? '1' : '0';
                    
                    
                    $stanovi = pretraziStanove($id, $tip, $namestenost, $povrsina_od, $povrsina_do, $telefon, $ulica, $stan_tip, $opstina, $cena_od, $cena_do, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $vertikala, $horizontala, $stan_u_kuci);
                }else{
                    $broj = ukupanBrojStanova();

                    $num_rows = $broj['broj'];
                    $items = 20;

                    $nrpage_amount = $num_rows/$items;
                    $page_amount = ceil($num_rows/$items);
                    $page = @$_GET['stranica'];
                    if($page < "1"){
                            $page = "1";
                    }
                    $p_num = $items*($page - 1);
                    $stanovi = prikaziSveStanove($p_num, $items);
                }
		
		
		
                $row = prikaziSveOpstine();
                $red = prikaziSvePodlokacije();
}
                        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jevtić Nekretnine</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="icon" href="images/kuca.png" type="image/x-icon" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>


<![endif]>

<!--  styled select box script version 2 -->
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 -->
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script -->
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>

<!-- slajder za naprednu pretragu -->
    <script src="js/showHide.js" type="text/javascript"></script>
    <script type="text/javascript">

    $(document).ready(function(){


       $('.show_hide').showHide({			 
                    speed: 1000,  // speed you want the toggle to happen	
                    easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
                    changeText: 1, // if you dont want the button text to change, set this to 0
                    showText: 'Napredna pretraga',// the button text to show when a div is closed
                    hideText: 'Sakrij naprednu pretragu' // the button text to show when a div is open

            }); 


    });

    </script>

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);

var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo2.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->

	
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>

			<!--  start account-content -->
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a>
			</div>
			</div>
			<!--  end account-content -->

		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">

		<ul class="select"><li><a href="admin.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="current"><li><a href="dodaj_stan.php"><b>Stanovi</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_stan.php">Dodaj stan</a></li>
				<li class="sub_show"><a href="spisak_stanova.php">Spisak stanova</a></li>
				<!--<li><a href="#nogo">Nesto</a></li>-->
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="spisak_ponuda.php"><b>Ponude</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>     
                
		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="spisak_trazimo.php"><b>Tražimo za vas</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
                
		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="podsetnik.php"><b>Podsetnik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_podsetnik.php">Dodaj podsetnik</a></li>
				<li class="sub_show"><a href="podsetnik.php">Spisak poruka</a></li>
				<li><a href="danasnji_podsetnici.php">Danasnji Podsetnici</a></li>
			
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="imenik.php"><b>Imenik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="spisak_agencija.php">Spisak agencija</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="#nogo"><b>News</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">
    <div id="admin-pretraga">
    <form id="pretrazi" action="spisak_stanova.php" method="get">
	<!--  start page-heading -->
	<div id="page-heading">
            <div id="pozicija1">
            <table>
                <tr>
                    <th>ID</th>
                    <td><input class="admin-input-select" type="text" name="id" /></td>
                </tr>
                <tr>
                    <th>Telefon:</th>
                    <td><input class="admin-input-select" type="text" name="telefon" /></td>
                </tr>
                <tr>
                    <th>Ulica:</th>
                    <td><input class="admin-input-select" tyle="text" name="ulica" /></td>
                </tr>
            </table>
            </div>
            <div id="pozicija2">
                <table>
                    <tr>
                        <th>Tip</th>
                        <td>
                                <select class="admin-input-select" id="tip" name="tip" class="sforma_select">
                                    <option value="">Izaberi...</option>
                                    <option value="Stan">Stan</option>
                                    <option value="Kuća">Kuća</option>
                                    <option value="Poslovni prostor">Poslovni prostor</option>
                                    <option value="Magacin">Magacin</option>
                                    <option value="Lokal">Lokal</option>
                                    <option value="Garaža">Garaža</option>
                                    <option value="Apartman na dan">Apartman na dan</option>
                                </select>   
                        </td>
                    </tr>
                    <tr>
                        <th>Struktura:</th>
                        <td>
                                    <select class="admin-input-select"  name="stan_tip" class="sforma_select">
                                        <option value="">Izaberi...</option>
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
            <div id="pozicija3">
                <table>
                    <tr>
                        <th>Nameštenost:</th>
                        <td>
                                    <select class="admin-input-select"  name="namestenost">
                                        <option value="">Izaberi...</option>
                                        <option value="Namešten">Namešten</option>
                                        <option value="Nenamešten">Nenamešten</option>
                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Opština:</th>
                        <td>
                            <select class="admin-input-select"  name="opstina">
                            <option value="">Izaberi...</option>
                            <?php
                                foreach($row as $opstina){
                                echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Podlokacija:</th>
                        <td>
                            <select class="admin-input-select"  name="opstina">
                            <option value="">Izaberi...</option>
                            <?php
                                foreach($red as $podlokacija){
                                echo '<option value="'.$podlokacija['id'].'">'.$podlokacija['podlokacija'].'</option>';
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="pozicija4">
                <table>
                    <tr>
                        <th>Kvadratura:</th>
                        <td>
                            <select class="admin-input-select"  name="povOD">
                                    <option value="">Izaberi...</option>
                                    <option value="20">od 20 m²</option>
                                    <option value="40">od 40 m²</option>
                                    <option value="60">od 60 m²</option>
                                    <option value="80">od 80 m²</option>
                                    <option value="100">od 100 m²</option>
                                    <option value="150">od 150 m²</option>
                                    <option value="200">od 200 m²</option>
                                    <option value="300">od 300 m²</option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;
                            <select class="admin-input-select"  name="povDO">
                                    <option value="">Izaberi...</option>
                                    <option value="40">do 40 m²</option>
                                    <option value="60">do 60 m²</option>
                                    <option value="80">do 80 m²</option>
                                    <option value="100">do 100 m²</option>
                                    <option value="150">do 150 m²</option>
                                    <option value="200">do 200 m²</option>
                                    <option value="300">do 300 m²</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Cena:</th>
                        <td>
                            <select class="admin-input-select"  name="cenaOD">
                                    <option value="">Izaberi...</option>
                                    <option value="50">od 50 €</option>
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
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;
                                <select class="admin-input-select" name="cenaDO">
                                    <option value="">Izaberi...</option>
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
                                </select>
                        </td>
                    </tr>
                </table>
            </div>
                       <div id="napredna">
                            <table id="id-form" >
                                <tr style="background-color:#f3f3f3;">
                                <td style="width: 153px;"><label><input type="checkbox" name="kablovska" class="napredna_input"> Kablovska/Sat</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="tv"> TV</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="klima"> Klima</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="internet" > Internet</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="ima_telefon" > Telefon</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="frizider" > Frižider</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="sporet" > Šporet</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="vesmasina" > Veš mašina</label></td>
                                </tr>    
                                <tr>
                                <td><label><input type="checkbox" name="kuhinjskielementi" > Kuhinjski elementi</label></td>
                                <td><label><input type="checkbox" name="plakari" > Plakari</label></td>
                                <td><label><input type="checkbox" name="interfon" > Interfon</label></td>
                                <td><label><input type="checkbox" name="lift" > Lift</label></td>   
                                <td><label><input type="checkbox" name="bazen" > Bazen</label></td>
                                <td><label><input type="checkbox" name="garaza" > Garaža</label></td>
                                <td><label><input type="checkbox" name="parking" > Parking</label></td>
                                <td><label><input type="checkbox" name="dvoriste" > Dvorište</label></td>
                                </tr>
                                <tr style="background-color:#f3f3f3;">
                                <td><label><input type="checkbox" name="potkrovlje" > Potkrovlje</label></td>
                                <td><label><input type="checkbox" name="terasa" > Terasa</label></td> 
                                <td><label><input type="checkbox" name="novogradnja" > Novogradnja</label></td>
                                <td><label><input type="checkbox" name="renovirano" > Renovirano</label></td>
                                <td><label><input type="checkbox" name="lux" > Lux</label></td>   
                                <td><label><input type="checkbox" name="penthaus" > Penthaus</label></td>
                                <td><label><input type="checkbox" name="salonski" > Salonski</label></td>
                                <td><label><input type="checkbox" name="lodja" > Lođa</label></td>
                                </tr>
                                <tr>
                                <td><label><input type="checkbox" name="duplex" > Duplex</label></td>
                                <td><label><input type="checkbox" name="nov_namestaj" > Nov nameštaj</label></td>
                                <td><label><input type="checkbox" name="kompjuterska_mreza" > Kmpjuterska mreža</label></td>
                                <td><label><input type="checkbox" name="dva_kupatila" > Dva kupatila</label></td>
                                <td><label><input type="checkbox" name="vise_telefonskih_linija" > Više telefonskih linija</label></td>
                                <td><label><input type="checkbox" name="vertikala" > Vertikala</label></td>
                                <td><label><input type="checkbox" name="horizontala" > Horizontala</label></td>
                                <td><label><input type="checkbox" name="stan_u_kuci" > Stan u kući</label></td>
                                </tr>
                            </table>
                       </div>
                       <div id="hideshowctrl" style="padding-left:5px; clear:both; width:100%; text-align: center;">
                           <a href="#" class="show_hide" rel="#napredna">Napredna pretraga</a>
                       </div>
            <div style="clear:both; float:right;  margin:10px 10px 10px 0;">
                <input type="submit" value="Pretrazi" name="pretrazi" id="pretrazi" style="width:55px; height:25px;" />
		<input type="reset" value="Reset" style="width:55px; height:25px;" />
            </div>
	</div>
</form>
    </div>
	<!-- end page-heading -->
        
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start product-table ..................................................................................... -->
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="" >Id</a> </th>
					<th class="table-header-repeat line-left"><a href="">Kategorija</a></th>
					<th class="table-header-repeat line-left"><a href="">Tip</a></th>                                        
					<th class="table-header-repeat line-left minwidth-1"><a href="">Vlasnik</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Opstina</a></th>
                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Podlokacija</a></th>
					<th class="table-header-repeat line-left"><a href="">Ulica</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Br</a></th>
					<th class="table-header-repeat line-left"><a href="">Telefon</a></th>
					<th class="table-header-repeat line-left"><a href="">Kvadratura</a></th>
					<th class="table-header-repeat line-left"><a href="">Cena</a></th>                                        
					<th class="table-header-repeat line-left"><a href="">Vidljiv</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Hot</a></th>
					<th class="table-header-options line-left"><a href="">Opcije</a></th>
				</tr>
				<?php
					if(isset($stanovi)){
					
					foreach($stanovi as $stan){
                          
                        
				?>
				<tr>
					<td><?php echo $stan[0];?></td>
					<td><?php echo $stan['kategorija'];?></td>
                                        <td><?php echo $stan['tip'];?></td>
					<td><?php echo $stan['vlasnik'];?></td>
					<td><?php echo $stan['opstina'];?></td>
                                        <td><?php echo $stan['podlokacija'];?></td>
					<td><?php echo $stan['ulica'];?></td>
                                        <td><?php echo $stan['br'];?></td>
					<td><?php echo $stan[9];?></td>
					<td><?php echo $stan['kvadratura'];?></td>
                                        <td><?php echo $stan['cena'];?></td>
					<td><?php if($stan['vidljiv'] == '1'){echo 'Da';}else{echo 'Ne';}?></td>
                                        <td><?php if($stan['hot_offer'] == '1'){echo 'Da';}else{echo 'Ne';}?></td>
					<td class="options-width">
					<a href="izmeni.php?id=<?php echo $stan[0];?>" title="Izmeni" class="icon-1 info-tooltip"></a>
					<a href="detaljan_pregled.php?id=<?php echo $stan[0];?>" title="Detaljnije" class="icon-3 info-tooltip"></a>
					<a href="promeni_vidljivost.php?id=<?php echo $stan[0] . '&vidljiv=' . $stan['vidljiv'];?>" title="Promeni Vidljivost" class="icon-5 info-tooltip"></a>
                                        <a href="promeni_hot.php?id=<?php echo $stan[0] . '&hot=' . $stan['hot_offer'];?>" title="Postavi kao najbolje u ponudi" class="icon-6 info-tooltip"></a>
					<?php
                                        if($username == 'ivana' || $username == 'Nikola'){
                                        ?>
                                        <a href="izbrisi_stan.php?id=<?php echo $stan[0];?>" title="Obrisi" class="icon-2 info-tooltip"></a>
					<?php
                                        }
                                        ?>

                                        <!--<a href="" title="Edit" class="icon-4 info-tooltip"></a>-->
					</td>
				</tr>
								
				<?php
						}
					}
				?>
				</table>
				<!--  end product-table................................... --> 
				
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
			<?php
                        if (!isset ($_GET['pretrazi'])){
			if($page_amount != "0"){
				if($page != "0"){
					$prev = $page-1;
					//echo "<a href=\"spisak_stanova.php?q=$section&p=$prev\">Prev</a>";
					echo '<a href="spisak_stanova.php?stranica='.$prev.'" class="page-left"></a>';
				}
				 	 
					  
					  echo '<div id="page-info">Page <strong>'.$page.'</strong> / '.$page_amount.'</div>';
					 
				 
				?>
				
				<?php
				
				if($page < $page_amount){
					$next = $page+1;
					//echo "<a href=\"spisak_stanova.php?q=$section&p=$next\">Next</a>";
					echo '<a href="spisak_stanova.php?stranica='.$next.'" class="page-right"></a>';
				}
				
				
			}
                        }
			?>
			<!--<td>
				<a href="spisak_stanova.php?stranica=" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="spisak_stanova.php?stranica=" class="page-right"></a>
			</td>
			-->
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
		
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	Admin Skin &copy; Copyright Jevtic Nekretnine <a href="">www.jevticnekretnine.rs</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>


