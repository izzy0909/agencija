<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/klijentiDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}

if (isset ($_POST['dodaj_klijenta'])){

        $ime = isset($_POST['ime']) ? $_POST['ime'] : null;
        $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $kategorija = isset($_POST['kategorija']) ? $_POST['kategorija'] : null;
        $tip = isset($_POST['tip']) ? $_POST['tip'] : null;
        $stan_tip = isset($_POST['stan_tip']) ? $_POST['stan_tip'] : null;
        $lokacija_id = isset($_POST['opstina']) ? $_POST['opstina'] : null;
        $grejanje = isset($_POST['grejanje']) ? $_POST['grejanje'] : null;
        $namestenost = isset($_POST['namestenost']) ? $_POST['namestenost'] : null;
        $cena_od = isset($_POST['cena_od']) ? $_POST['cena_od'] : null;
        $cena_do = isset($_POST['cena_do']) ? $_POST['cena_do'] : null;
        $kvadratura_od = isset($_POST['kvadratura_od']) ? $_POST['kvadratura_od'] : null;
        $kvadratura_do = isset($_POST['kvadratura_do']) ? $_POST['kvadratura_do'] : null;
        $agent = isset($_POST['agent']) ? $_POST['agent'] : null;
        $sekretarica = isset($_POST['sekretarica']) ? $_POST['sekretarica'] : null;
        $napomena = isset($_POST['napomena']) ? $_POST['napomena'] : null;

        $interfon = isset($_REQUEST['interfon']) ? '1' : '0';
        $kablovska = isset($_REQUEST['kablovska']) ? '1' : '0';
        $klima = isset($_REQUEST['klima']) ? '1' : '0';
        $internet = isset($_REQUEST['internet']) ? '1' : '0';
        $ima_telefon = isset($_REQUEST['ima_telefon']) ? '1' : '0';
        $kuhinjskielementi = isset($_REQUEST['kuhinjskielementi']) ? '1' : '0';
        $plakari = isset($_REQUEST['plakari']) ? '1' : '0';
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
        $stan_u_kuci = isset($_REQUEST['stan_u_kuci']) ? '1' : '0';
        $samostojeca_kuca = isset($_REQUEST['samostojeca_kuca']) ? '1' : '0';
        $kuca_s_dvoristem = isset($_REQUEST['kuca_s_dvoristem']) ? '1' : '0';
        $kucni_ljubimci = isset($_REQUEST['kucni_ljubimci']) ? '1' : '0';
        $balkon = isset($_REQUEST['balkon']) ? '1' : '0';
        $video_nadzor = isset($_REQUEST['video_nadzor']) ? '1' : '0';
        $alarm = isset($_REQUEST['alarm']) ? '1' : '0';
        $basta = isset($_REQUEST['basta']) ? '1' : '0';
        $pomocni_objekti = isset($_REQUEST['pomocni_objekti']) ? '1' : '0';
        $ostava = isset($_REQUEST['ostava']) ? '1' : '0';
        $podrum = isset($_REQUEST['podrum']) ? '1' : '0';
        $opticki_kabl = isset($_REQUEST['opticki_kabl']) ? '1' : '0';
        $open_space = isset($_REQUEST['open_space']) ? '1' : '0';
        $pristup_za_invalide = isset($_REQUEST['pristup_za_invalide']) ? '1' : '0';
        $lokal_na_ulici = isset($_REQUEST['lokal_na_ulici']) ? '1' : '0';
        $pravno_lice = isset($_REQUEST['pravno_lice']) ? '1' : '0';



        
	$ajdi = dodajKlijenta($ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $grejanje, $namestenost, $cena_od, $cena_do, $kvadratura_od, $kvadratura_do, $agent, $sekretarica, $napomena
		, $interfon, $kablovska, $klima, $internet, $ima_telefon, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice
		);
	header('Location: spisak_klijenti.php');
	}
 
 $row = prikaziSveOpstine();
                     
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

<!--  jquery core 
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script> -->
<!-- za slike -->
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.smooth-scroll.min.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>

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

		<ul class="select"><li><a href="dodaj_stan.php"><b>Stanovi</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
                <div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_stan.php">Dodaj stan</a></li>
				<li><a href="spisak_stanova.php">Spisak stanova</a></li>
				
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

		<ul class="current"><li><a href="spisak_klijenti.php"><b>Klijenti</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="sub_show"><a href="dodaj_klijenta.php">Dodaj klijenta</a></li>
				<li ><a href="spisak_klijenti.php">Spisak klijenata</a></li>
			</ul>
		</div>
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

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Izmeni Podatke</h1>
	</div>
	<!-- end page-heading -->
        <form id="dodaj_klijenta" action="dodaj_klijenta.php" method="POST">
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
	<!--  start content-table-inner -->
	<div id="content-table-inner">

	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>


		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="#">Podaci o klijentu</a></div>
			
		</div>
		<!--  end step-holder -->

		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">Ime:</th>
			<td><input type="text" class="inp-form" name="ime" value=""/></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Telefon:</th>
			<td><input type="text" class="inp-form" name="telefon" value=""/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">E-mail:</th>
			<td><input type="text" class="inp-form" name="email" value=""/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Kategorija:</th>
                        <td><select name="kategorija" class="styledselect_form_1">
                                <option value="izdavanje" >Izdavanje</option>
                                <option value="prodaja" >Prodaja</option>
                            </select></td>
			<td></td>
		</tr>   
			<th valign="top">Tip:</th>
			<td><select id="tip" name="tip" class="styledselect_form_1">
                                <option value="Stan" >Stan</option>
                                <option value="Kuća" >Kuća</option>
                                <option value="Poslovni prostor">Poslovni prostor</option>
                                <option value="Magacin" >Magacin</option>
                                <option value="Lokal" >Lokal</option>
                                <option value="Garaža" >Garaža</option>
                                <option value="Poslovna zgrada" >Poslovna zgrada</option>
                            </select></td>
			<td></td>
		</tr>    
			<th valign="top"></th>
			<td><select id="stan_tip" name="stan_tip" class="styledselect_form_1">
								<option value="" ></option>
                                <option value="Garsonjera" >Garsonjera</option>
                                <option value="Jednosoban">Jednosoban</option>
                                <option value="Jednoiposoban" >Jednoiposoban</option>
                                <option value="Dvosoban" >Dvosoban</option>
                                <option value="Dvoiposoban" >Dvoiposoban</option>
                                <option value="Trosoban" >Trosoban</option>
                                <option value="Troiposoban" >Troiposoban</option>
                                <option value="Četvorosoban" >Četvorosoban</option>
                                <option value="Četvoroiposoban" >Četvoroiposoban</option>
                                <option value="Petosoban i veći" >Petosoban i veći</option>
                                <option value="Kuća u osnovi">Kuća u osnovi</option>
                                <option value="Spratna kuća">Spratna kuća</option>
                            </select></td>
			<td></td>
		</tr>        
				<tr>
		<th valign="top">Opština:</th>
		<td>
                  
		<select id="opstina" class="styledselect_form_1" name="opstina">
			<option value="" ></option>
                 <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'"'; echo '>'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
			
		</select>
		</td>
		<td></td>
		</tr>
                <tr>
                <th>Grejanje:</th>
                <td>        <select name="grejanje" class="styledselect_form_1">
                				<option value=""></option>
                                <option value="CG">CG</option>
                                <option value="CG (gas)">CG (gas)</option>
                                <option value="CG (kalorimetri)">CG (kalorimetri)</option>
                                <option value="ET (struja)">ET (struja)</option>
                                <option value="EG">EG</option>
                                <option value="TA">TA</option>
                                <option value="PG">PG</option>
                                <option value="Klima uređaj">Klima&nbsp;uređaj</option>
                                <option value="Na gas">Na gas</option>
                                <option value="Na struju">Na struju</option>
                                <option value="Norveški radijatori">Noverški radijatori</option>
                                <option value="Mermerni radijatori">Mermerni radijatori</option>
                            </select></td>
                </tr>
                <tr>
               <th>Nameštenost:</th>
                <td>        <select name="namestenost" class="styledselect_form_1">
                				<option value=""></option>
                                <option value="Namešten">Namešten</option>
                                <option value="Polunamešten">Polunamešten</option>
                                <option value="Nenamešten">Nenamešten</option>
                            </select></td>
                </tr>
        <tr>
			<th valign="top">Kvadratura:</th>
			<td>od <input style="width:80px;" type="text" class="inp-form" name="kvadratura_od" value=""/> do <input style="width:80px;" type="text" class="inp-form" name="kvadratura_do" value=""/></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Cena:</th>
			<td>od <input style="width:80px;" type="text" class="inp-form" name="cena_od" value=""/> do <input style="width:80px;" type="text" class="inp-form" name="cena_do" value=""/></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Agent:</th>
			<td><input type="text" class="inp-form" name="agent" value=""/></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Sekretarica:</th>
			<td><input type="text" class="inp-form" name="sekretarica" value=""/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Napomena:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="napomena"></textarea></td>
			<td></td>
		</tr>

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
                        <!--<input type="submit" value="Dodaj" name="dodaj_stan" id="dodaj_stan" />-->
                        <input type="submit" value="Izmeni" class="form-submit" name="dodaj_klijenta" id="dodaj_klijenta" />
			<input type="reset" value="reset" class="form-reset" />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>
	
        <!--  start related-activities -->
	<div id="related-activities">

		<!--  start related-act-top -->
		<!--  start related-act-top -->
		<div id="step-holder">
			<div class="step-no"></div>
			<div class="step-dark-left"><a href="">Dodatni tagovi</a></div>

		</div>
		<!-- end related-act-top -->

		<!--  start related-act-bottom -->
		<div id="related-act-bottom">

			<!--  start related-act-inner -->
			<div id="related-act-inner">

				<div class="left"><a href=""></a></div>
				<div class="right">
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="font-size:13px;width: 100%;">
                                        <tr>
                                                <td style="width:100px;"><input  type="checkbox" name="interfon" /> Interfon</td>
                                                <td style="width:100px;"><input  type="checkbox" name="kablovska" /> Kablovska</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="klima" /> Klima</td>
                                                <td><input  type="checkbox" name="internet" /> Internet</td>
                                        </tr>
                    <tr>
                                                <td><input  type="checkbox" name="ima_telefon" /> Telefon</td>
                                                <td><input  type="checkbox" name="kuhinjskielementi" /> Kuh. elementi</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="plakari" /> Plakari</td>
                                                <td><input  type="checkbox" name="lift" /> Lift</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="bazen" /> Bazen</td>
                                                <td><input  type="checkbox" name="garaza" /> Garaža</td>
                                        </tr>               
					<tr>
                                                <td><input  type="checkbox" name="parking" /> Parking</td>
                                                <td><input  type="checkbox" name="dvoriste" /> Dvorište</td>
                                        </tr>              
					<tr>
                                                <td><input  type="checkbox" name="potkrovlje" /> Potkrovlje</td>
                                                <td><input  type="checkbox" name="terasa" /> Terasa</td>
                                        </tr>                     
					<tr>
                                                <td><input  type="checkbox" name="novogradnja" /> Novogradnja</td>
                                                <td><input  type="checkbox" name="renovirano" /> Renovirano</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="lux" /> Lux</td>
                                                <td><input  type="checkbox" name="penthaus" /> Penthaus</td>
                                        </tr>                                        
					<tr>
                                                <td><input  type="checkbox" name="salonski" /> Salonski</td>
                                                <td><input  type="checkbox" name="lodja" /> Lođa</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="duplex" /> Duplex</td>
                                                <td><input  type="checkbox" name="nov_namestaj" /> Nov nameštaj</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="kompjuterska_mreza" /> Komp. mreža</td>
                                                <td><input  type="checkbox" name="dva_kupatila" /> Dva kupatila</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="vise_telefonskih_linija" /> Više tel. linija</td>
                                                <td><input  type="checkbox" name="stan_u_kuci" /> Stan u kući</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="samostojeca_kuca" /> Samostojeća kuća</td>
                                                <td><input  type="checkbox" name="kuca_s_dvoristem" /> Kuća s dvorištem</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="kucni_ljubimci" /> Kućni ljubimci</td>
                                                <td><input  type="checkbox" name="balkon" /> Balkon</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="video_nadzor" /> Video nadzor</td>
                                                <td><input  type="checkbox" name="alarm" /> Alarm</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="basta" /> Bašta</td>
                                                <td><input  type="checkbox" name="pomocni_objekti" /> Pomoćni objekti</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="ostava" /> Ostava</td>
                                                <td><input  type="checkbox" name="podrum" /> Podrum</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="opticki_kabl" /> Optički kabl</td>
                                                <td><input  type="checkbox" name="open_space" /> Open space</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pristup_za_invalide" /> Pristup za invalide</td>
                                                <td><input  type="checkbox" name="lokal_na_ulici" /> Lokal na ulici</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pravno_lice" /> Pravno lice</td>
                                        </tr>
                                    </table>
				</div>

				<div class="clear"></div>
				

				

				<div class="clear"></div>
				

				
				

			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>

		</div>
		<!-- end related-act-bottom -->

	</div>
	<!-- end related-activities -->
		

		

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>

<div class="clear"></div>


</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>


			</div>
			<!--  end table-content  -->

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
        </form>
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
<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });
  </script>
</body>
</html>
