<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/klijentiDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}

if (isset ($_POST['izmeni_klijenta'])){
	
        $id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;
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
        $ponudjeno = isset($_POST['ponudjeno']) ? $_POST['ponudjeno'] : null;

        $interfon = isset($_REQUEST['interfon']) ? '1' : '0';
        $kablovska = isset($_REQUEST['kablovska']) ? '1' : '0';
        $klima = isset($_REQUEST['klima']) ? '1' : '0';
        $internet = isset($_REQUEST['internet']) ? '1' : '0';
        $ima_telefon = isset($_REQUEST['ima_telefon']) ? '1' : '0';
        $kuhinjskielementi = isset($_REQUEST['kuhinjski_elementi']) ? '1' : '0';
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

        $zavrseno = isset($_POST['zavrseno']) ? $_POST['zavrseno'] : null;
        $gde = isset($_POST['gde']) ? $_POST['gde'] : null;
        $agent_uselio = isset($_POST['agent_uselio']) ? $_POST['agent_uselio'] : null;
        $cena_zavrsetka = ($_POST['cena_zavrsetka'] != 0) ? $_POST['cena_zavrsetka'] : null;
	    if(!empty($_POST['datum_zavrsetka'])){
	        $timestamp = DateTime::createFromFormat('d-m-Y', $_POST['datum_zavrsetka']);
	        $datum_zavrsetka = $timestamp->format('Y-m-d');
	    }
	    else $datum_zavrsetka = null;
        
	izmeniKlijenta($id, $ime, $telefon, $email, $kategorija, $tip, $stan_tip, $lokacija_id, $grejanje, $namestenost, $cena_od, $cena_do, $kvadratura_od, $kvadratura_do, $agent, $sekretarica, $napomena, $ponudjeno, $zavrseno, $gde, $agent_uselio, $cena_zavrsetka, $datum_zavrsetka, $interfon, $kablovska, $klima, $internet, $ima_telefon, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice);
	}
 
if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = prikaziKlijenta($id);
	$row = prikaziSveOpstine();
} 
                     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jevtić Nekretnine</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="icon" href="images/kuca.png" type="image/x-icon" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

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


<!-- DATEPICKER -->
  <link rel="stylesheet" href="js/date/jquery-ui.css">
  <link rel="stylesheet" href="js/date/jquery-ui.theme.css">

  <style>
  	#id-form .ui-helper-hidden-accessible {
  		position: static !important;
  	}
	#related-act-inner input[type="checkbox"] {
		width: 13px;
		height: 13px;
	}

	.ui-checkbox {
		margin-right:5px;
	}
  </style>
  
  <script src="js/date/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy'});
  } );
  </script>

  <style>
  #ui-datepicker-div{
  	line-height: 1em !important;
  }
  </style>

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
        <form id="izmeni_klijenta" action="izmeni_klijenta.php?id=<?=$stan[0]?>" method="POST">
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
		<input type="hidden" class="inp-form" name="klijent_id" value="<?php echo $stan[0];?>"/>

		<tr>
			<th valign="top">Datum i vreme:</th>
			<td><?php echo date('d.m.Y. - H:i', strtotime($stan['timestamp'])); ?></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Ime:</th>
			<td><input type="text" class="inp-form" name="ime" value="<?php echo $stan['ime'];?>"/></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Telefon:</th>
			<td><input type="text" class="inp-form" name="telefon" value="<?php echo $stan['telefon'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">E-mail:</th>
			<td><input type="text" class="inp-form" name="email" value="<?php echo $stan['email'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Kategorija:</th>
                        <td><select name="kategorija" class="styledselect_form_1">
                                <option value="izdavanje" <?php if($stan['kategorija']=='izdavanje'){echo 'selected';} ?>>Izdavanje</option>
                                <option value="prodaja" <?php if($stan['kategorija']=='prodaja'){echo 'selected';} ?>>Prodaja</option>
                            </select></td>
			<td></td>
		</tr>   
		<tr>
			<th valign="top">Tip:</th>
			<td><select id="tip" name="tip" class="styledselect_form_1">
                                <option value="Stan" <?php if($stan['tip']=='Stan'){echo 'selected';} ?>>Stan</option>
                                <option value="Kuća" <?php if($stan['tip']=='Kuća'){echo 'selected';} ?>>Kuća</option>
                                <option value="Poslovni prostor" <?php if($stan['tip']=='Poslovni prostor'){echo 'selected';} ?>>Poslovni prostor</option>
                                <option value="Magacin" <?php if($stan['tip']=='Magacin'){echo 'selected';} ?>>Magacin</option>
                                <option value="Lokal" <?php if($stan['tip']=='Lokal'){echo 'selected';} ?>>Lokal</option>
                                <option value="Garaža" <?php if($stan['tip']=='Garaža'){echo 'selected';} ?>>Garaža</option>
                                <option value="Poslovna zgrada" <?php if($stan['tip']=='Poslovna zgrada'){echo 'selected';} ?>>Poslovna zgrada</option>
                            </select></td>
			<td></td>
		</tr>    
		<tr>
			<th valign="top"></th>
			<td><select id="stan_tip" name="stan_tip" class="styledselect_form_1">
								<option value="" ></option>
                                <option value="Garsonjera" <?php if($stan['stan_tip']=='Garsonjera'){echo 'selected';} ?>>Garsonjera</option>
                                <option value="Jednosoban" <?php if($stan['stan_tip']=='Jednosoban'){echo 'selected';} ?>>Jednosoban</option>
                                <option value="Jednoiposoban" <?php if($stan['stan_tip']=='Jednoiposoban'){echo 'selected';} ?>>Jednoiposoban</option>
                                <option value="Dvosoban" <?php if($stan['stan_tip']=='Dvosoban'){echo 'selected';} ?>>Dvosoban</option>
                                <option value="Dvoiposoban" <?php if($stan['stan_tip']=='Dvoiposoban'){echo 'selected';} ?>>Dvoiposoban</option>
                                <option value="Trosoban" <?php if($stan['stan_tip']=='Trosoban'){echo 'selected';} ?>>Trosoban</option>
                                <option value="Troiposoban" <?php if($stan['stan_tip']=='Troiposoban'){echo 'selected';} ?>>Troiposoban</option>
                                <option value="Četvorosoban" <?php if($stan['stan_tip']=='Četvorosoban'){echo 'selected';} ?>>Četvorosoban</option>
                                <option value="Četvoroiposoban" <?php if($stan['stan_tip']=='Četvoroiposoban'){echo 'selected';} ?>>Četvoroiposoban</option>
                                <option value="Petosoban i veći" <?php if($stan['stan_tip']=='Petosoban i veći'){echo 'selected';} ?>>Petosoban i veći</option>
                                <option value="Kuća u osnovi" <?php if($stan['stan_tip']=='Kuća u osnovi'){echo 'selected';} ?>>Kuća u osnovi</option>
                                <option value="Spratna kuća" <?php if($stan['stan_tip']=='Spratna kuća'){echo 'selected';} ?>>Spratna kuća</option>
                            </select></td>
			<td></td>
		</tr>        
				<tr>
		<th valign="top">Opština:</th>
		<td>
                  
		<select id="opstina" class="styledselect_form_1" name="opstina">
				<option value=""></option>
                 <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'"'; if($stan['opstina']==$opstina['opstina']){echo ' selected';} echo '>'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
			
		</select>
		</td>
		<td></td>
		</tr>
                <tr>
			<th valign="top">Grejanje:</th>
                <td>        <select id="grejanje" name="grejanje" class="styledselect_form_1">
                				<option value="" ></option>
                                <option value="CG" <?php if($stan['grejanje']=='CG'){echo 'selected';} ?>>CG</option>
                                <option value="CG (gas)" <?php if($stan['grejanje']=='CG (gas)'){echo 'selected';} ?>>CG (gas)</option>
                                <option value="CG (kalorimetri)" <?php if($stan['grejanje']=='CG (kalorimetri)'){echo 'selected';} ?>>CG (kalorimetri)</option>
                                <option value="ET (struja)" <?php if($stan['grejanje']=='ET (struja)'){echo 'selected';} ?>>ET (struja)</option>
                                <option value="EG" <?php if($stan['grejanje']=='EG'){echo 'selected';} ?>>EG</option>
                                <option value="TA" <?php if($stan['grejanje']=='TA'){echo 'selected';} ?>>TA</option>
                                <option value="PG" <?php if($stan['grejanje']=='PG'){echo 'selected';} ?>>PG</option>
                                <option value="Klima uređaj" <?php if($stan['grejanje']=='Klima uređaj'){echo 'selected';} ?>>Klima uređaj</option>
                                <option value="Na gas" <?php if($stan['grejanje']=='Na gas'){echo 'selected';} ?>>Na gas</option>
                                <option value="Na struju" <?php if($stan['grejanje']=='Na struju'){echo 'selected';} ?>>Na struju</option>
                                <option value="Norveški radijatori" <?php if($stan['grejanje']=='Norveški radijatori'){echo 'selected';} ?>>Norveški radijatori</option>
                                <option value="Mermerni radijatori" <?php if($stan['grejanje']=='Mermerni radijatori'){echo 'selected';} ?>>Mermerni radijatori</option>
                            </select></td>
			<td></td>
		</tr>  
                <tr>
			<th valign="top">Nameštenost:</th>
                <td>        <select id="namestenost" name="namestenost" class="styledselect_form_1">
                				<option value="" ></option>
                                <option value="Namešten" <?php if($stan['namestenost']=='Namešten'){echo 'selected';} ?>>Namešten</option>
                                <option value="Polunamešten" <?php if($stan['namestenost']=='Polunamešten'){echo 'selected';} ?>>Polunamešten</option>
                                <option value="Nenamešten" <?php if($stan['namestenost']=='Nenamešten'){echo 'selected';} ?>>Nenamešten</option>
                            </select></td>
			<td></td>
		</tr>  
        <tr>
			<th valign="top">Kvadratura:</th>
			<td>od <input style="width:80px;" type="text" class="inp-form" name="kvadratura_od" value="<?php echo $stan['kvadratura_od'];?>"/> do <input style="width:80px;" type="text" class="inp-form" name="kvadratura_do" value="<?php echo $stan['kvadratura_do'];?>"/></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Cena:</th>
			<td>od <input style="width:80px;" type="text" class="inp-form" name="cena_od" value="<?php echo $stan['cena_od'];?>"/> do <input style="width:80px;" type="text" class="inp-form" name="cena_do" value="<?php echo $stan['cena_do'];?>"/></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Agent:</th>
			<td><input type="text" class="inp-form" name="agent" value="<?php echo $stan['agent'];?>"/></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Sekretarica:</th>
			<td><input type="text" class="inp-form" name="sekretarica" value="<?php echo $stan['sekretarica'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Napomena:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="napomena"><?php echo $stan['napomena'];?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Ponuđene nekretnine:</th>
			<td><textarea rows="3" cols="" class="form-textarea" name="ponudjeno"><?php echo $stan['ponudjeno'];?></textarea></td>
			<td></td>
		</tr>

		<tr><th></th><td></td><td></td></tr>
		<tr><th></th><td></td><td></td></tr>
		<tr><th></th><td></td><td></td></tr>
		<tr><th></th><td></td><td></td></tr>
		<tr><th></th><td></td><td></td></tr>
		<tr><th></th><td></td><td></td></tr>

		<tr>
			<th valign="top">Završeno:</th>
                        <td><select name="zavrseno" class="styledselect_form_1">
                        		<option value=""></option>
                                <option value="Mi uselili" <?php if($stan['zavrseno']=='Mi uselili'){echo 'selected';} ?>>Mi uselili</option>
                                <option value="Našao sam" <?php if($stan['zavrseno']=='Našao sam'){echo 'selected';} ?>>Našao sam</option>
                            </select></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Gde je useljen:</th>
			<td><input type="text" class="inp-form" name="gde" value="<?php echo $stan['gde'];?>"/></td>
		</tr>  
		<tr>
			<th valign="top">Agent uselio:</th>
			<td><input type="text" class="inp-form" name="agent_uselio" value="<?php echo $stan['agent_uselio'];?>"/></td>
		</tr>
		<tr>
			<th valign="top">Datum zavrsetka:</th>
			<td><input type="text" class="inp-form" id="datepicker" name="datum_zavrsetka" value="<?php if($stan['datum_zavrsetka'] != null) { echo date('d-m-Y', strtotime($stan['datum_zavrsetka'])); } ?>"></td>
		</tr>
		<tr>
			<th valign="top">Zavrseno po ceni:</th>
			<td><input type="text" class="inp-form" name="cena_zavrsetka" value="<?php echo $stan['cena_zavrsetka'];?>"/></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
                        <!--<input type="submit" value="Dodaj" name="dodaj_stan" id="dodaj_stan" />-->
                        <input type="submit" value="Izmeni" class="form-submit" name="izmeni_klijenta" id="izmeni_klijenta" />
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
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="font-size:13px; width:100%;">
									
                                        <tr>
                                                
                                                <td style="width:153px; "><input  type="checkbox" name="interfon" <?php if($stan['t_interfon']){ echo ' checked';}?>/>Interfon</td>
                                                <td><input  type="checkbox" name="kablovska" <?php if($stan['t_kablovska']){ echo ' checked';}?>/>Kablovska</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="klima" <?php if($stan['t_klima']){ echo ' checked';}?>/>Klima</td>
                                                <td><input  type="checkbox" name="internet" <?php if($stan['t_internet']){ echo ' checked';}?>/>Internet</td>
                                        </tr>                                                                             
                                        <tr>
                                        		<td><input  type="checkbox" name="ima_telefon" <?php if($stan['t_telefon']){ echo ' checked';}?>/>Telefon</td>
                                                <td><input  type="checkbox" name="kuhinjski_elementi" <?php if($stan['t_kuhinjskielementi']){ echo ' checked';}?>/>Kuh. elementi</td>
                                        </tr>                                              
                                        <tr>
                                                <td><input  type="checkbox" name="plakari" <?php if($stan['t_plakari']){ echo ' checked';}?>/>Plakari</td>
                                                <td><input  type="checkbox" name="lift" <?php if($stan['t_lift']){ echo ' checked';}?>/>Lift</td>
                                        </tr>       
                                        <tr>
                                                <td><input  type="checkbox" name="bazen" <?php if($stan['t_bazen']){ echo ' checked';}?>/>Bazen</td>
                                                <td><input  type="checkbox" name="garaza" <?php if($stan['t_garaza']){ echo ' checked';}?>/>Garaža</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="parking" <?php if($stan['t_parking']){ echo ' checked';}?>/>Parking</td>
                                                <td><input  type="checkbox" name="dvoriste" <?php if($stan['t_dvoriste']){ echo ' checked';}?>/>Dvorište</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="potkrovlje" <?php if($stan['t_potkrovlje']){ echo ' checked';}?>/>Potkrovlje</td>
                                                <td><input  type="checkbox" name="terasa" <?php if($stan['t_terasa']){ echo ' checked';}?>/>Terasa</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="novogradnja" <?php if($stan['t_novogradnja']){ echo ' checked';}?>/>Novogradnja</td>
                                                <td><input  type="checkbox" name="renovirano" <?php if($stan['t_renovirano']){ echo ' checked';}?>/>Renovirano</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="lux" <?php if($stan['t_lux']){ echo ' checked';}?>/>Lux</td>
                                                <td><input  type="checkbox" name="penthaus" <?php if($stan['t_penthaus']){ echo ' checked';}?>/>Penthaus</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="salonski" <?php if($stan['t_salonski']){ echo ' checked';}?>/>Salonski</td>
                                                <td><input  type="checkbox" name="lodja" <?php if($stan['t_lodja']){ echo ' checked';}?>/>Lođa</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="duplex" <?php if($stan['t_duplex']){ echo ' checked';}?>/>Duplex</td>
                                                <td><input  type="checkbox" name="nov_namestaj" <?php if($stan['t_novnamestaj']){ echo ' checked';}?>/>Nov nameštaj</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="kompjuterska_mreza" <?php if($stan['t_kompmreza']){ echo ' checked';}?>/>Komp. mreža</td>
                                                <td><input  type="checkbox" name="dva_kupatila" <?php if($stan['t_dvakupatila']){ echo ' checked';}?>/>Dva kupatila</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="vise_telefonskih_linija" <?php if($stan['t_viselinija']){ echo ' checked';}?>/>Više tel. linija</td>
                                                <td><input  type="checkbox" name="stan_u_kuci" <?php if($stan['t_stanukuci']){ echo ' checked';}?>/>Stan u kući</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="samostojeca_kuca" <?php if($stan['t_samostojecakuca']){ echo ' checked';}?>/>Samostojeća kuća</td>
                                                <td><input  type="checkbox" name="kuca_s_dvoristem" <?php if($stan['t_kucasdvoristem']){ echo ' checked';}?>/>Kuća s dvorištem</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="kucni_ljubimci" <?php if($stan['t_kucniljubimci']){ echo ' checked';}?>/>Kućni ljubimci</td>
                                                <td><input  type="checkbox" name="balkon" <?php if($stan['t_balkon']){ echo ' checked';}?>/>Balkon</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="video_nadzor" <?php if($stan['t_videonadzor']){ echo ' checked';}?>/>Video nadzor</td>
                                                <td><input  type="checkbox" name="alarm" <?php if($stan['t_alarm']){ echo ' checked';}?>/>Alarm</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="basta" <?php if($stan['t_basta']){ echo ' checked';}?>/>Bašta</td>
                                                <td><input  type="checkbox" name="pomocni_objekti" <?php if($stan['t_pomocniobjekti']){ echo ' checked';}?>/>Pomoćni objekti</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="ostava" <?php if($stan['t_ostava']){ echo ' checked';}?>/>Ostava</td>
                                                <td><input  type="checkbox" name="podrum" <?php if($stan['t_podrum']){ echo ' checked';}?>/>podrum</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="opticki_kabl" <?php if($stan['t_optickikabl']){ echo ' checked';}?>/>Optički kabl</td>
                                                <td><input  type="checkbox" name="open_space" <?php if($stan['t_openspace']){ echo ' checked';}?>/>Open space</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pristup_za_invalide" <?php if($stan['t_pristupzainvalide']){ echo ' checked';}?>/>Pristup za invalide</td>
                                                <td><input  type="checkbox" name="lokal_na_ulici" <?php if($stan['t_lokalnaulici']){ echo ' checked';}?>/>Lokal na ulici</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pravno_lice" <?php if($stan['t_pravnolice']){ echo ' checked';}?>/>Pravno lice</td>
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
