<?php

include_once '../data_base_access/stanoviDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}else{         
                $username = $_SESSION['username'];
                if (isset ($_GET['pretrazi'])){
                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                    $kategorija = isset($_GET['kategorija']) ? $_GET['kategorija'] : null;
                    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
                    $namestenost = isset($_GET['namestenost']) ? $_GET['namestenost'] : null;
                    $povrsina_od = isset($_GET['povOD']) ? $_GET['povOD'] : null;
                    $povrsina_do = isset($_GET['povDO']) ? $_GET['povDO'] : null;
                    $telefon = isset($_GET['telefon']) ? $_GET['telefon'] : null;
                    $ulica = isset($_GET['ulica']) ? $_GET['ulica'] : null;
                    $stan_tip = isset($_GET['stan_tip']) ? $_GET['stan_tip'] : null;
                    $opstina = isset($_GET['opstina']) ? $_GET['opstina'] : null;
                    $podlokacija = isset($_GET['podlokacija']) ? $_GET['podlokacija'] : null;
                    $cena_od = isset($_GET['cenaOD']) ? $_GET['cenaOD'] : null;
                    $cena_do = isset($_GET['cenaDO']) ? $_GET['cenaDO'] : null;
                    $grejanje = isset($_GET['grejanje']) ? $_GET['grejanje'] : null;
                    $sprat = isset($_GET['sprat']) ? $_GET['sprat'] : null;
                    $izdat = isset($_GET['izdat']) ? $_GET['izdat'] : null;

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
                    $stan_u_kuci = isset($_REQUEST['stan_u_kuci']) ? '1' : '0';
                    $samostojeca_kuca = isset($_REQUEST['samostojeca_kuca']) ? '1' : '0';
                    $kuca_s_dvoristem = isset($_REQUEST['kuca_s_dvoristem']) ? '1' : '0';
                    $kucni_ljubimci = isset($_REQUEST['kucni_ljubimci']) ? '1' : '0';
                    $balkon = isset($_REQUEST['balkon']) ? '1' : '0';
                    $video_nadzor = isset($_REQUEST['alarm']) ? '1' : '0';
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
                    
                    
                    $stanovi = pretraziStanove($id, $kategorija, $tip, $namestenost, $povrsina_od, $povrsina_do, $telefon, $ulica, $stan_tip, $opstina, $podlokacija, $cena_od, $cena_do, $sprat, $grejanje, $izdat, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice);
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
<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<!--<script src="js/jquery/ui.core.js" type="text/javascript"></script>
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
</script>-->

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
                    showText: 'NAPREDNA PRETRAGA',// the button text to show when a div is closed
                    hideText: 'SAKRIJ NAPREDNU PRETRAGU' // the button text to show when a div is open

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

<script language="javascript">
function brisanje(id) {

   var answer = confirm("Da li ste sigurni da želite da obrišete nekretninu redni broj " + id + "?");

   if (answer){

      window.location = "izbrisi_stan.php?id=" + id;

   }
}
</script>

<!-- multiselect -->    
    <!--<script src="../js/jquery-1.7.2.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="multi/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="multi/prettify.css" />
<link rel="stylesheet" type="text/css" href="multi/jquery-ui-1.9.2.custom.css" />
<!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="multi/prettify.js"></script>
<script type="text/javascript" src="multi/jquery.multiselect.js"></script>
<script type="text/javascript">
$(function(){
	$("select").multiselect({
   selectedList: 1, 
   noneSelectedText: "Izaberite...",
   selectedText: "selektovano: #",
   height: 146,
   checkAllText: "Traži sve",
   uncheckAllText: "Isključi",
   minWidth: 180
});
});

$(function(){
    $("#kategorija, #izdat").multiselect({
        height: 48
    });
    $("#namestenost").multiselect({
    	height: 72
    });
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

		<ul class="select"><li><a href="spisak_klijenti.php"><b>Klijenti</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_klijenta.php">Dodaj klijenta</a></li>
				<li class="sub_show"><a href="spisak_klijenti.php">Spisak klijenata</a></li>
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
    <div id="admin-pretraga">
    <form id="pretrazi" action="spisak_stanova.php" method="get">
	<!--  start page-heading -->
	<div id="page-heading">
            <div id="pozicija1">
            <table>
                <tr>
                    <th>ID:</th>
                    <td><input class="admin-input-select" type="text" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];} ?>" /></td>
                </tr>
                <tr>
                    <th>Telefon:</th>
                    <td><input class="admin-input-select" type="text" name="telefon" value="<?php if(isset($_GET['telefon'])){ echo $_GET['telefon'];} ?>" /></td>
                </tr>
                <tr>
                    <th>Ulica:</th>
                    <td><input class="admin-input-select" tyle="text" name="ulica" value="<?php if(isset($_GET['ulica'])){ echo $_GET['ulica'];} ?>" /></td>
                </tr>
            </table>
            </div>
            <div id="pozicija2">
                <table>
                    <tr>
                        <th>Kategorija:</th>
                        <td style="padding: 5px 0 5px 5px;">
                                <select id="kategorija" name="kategorija[]" class="admin-input-select"  multiple="multiple">
                                    <option value="izdavanje" <?php if(isset($_GET['kategorija']) && in_array('izdavanje', $_GET['kategorija'])) echo 'selected'; ?> >Izdavanje</option>
                                    <option value="prodaja" <?php if(isset($_GET['kategorija']) && in_array('prodaja', $_GET['kategorija'])) echo 'selected'; ?> >Prodaja</option>
                                </select>   
                        </td>
                    </tr>
                    <tr>
                        <th>Tip:</th>
                        <td style="padding: 5px 0 5px 5px;">
                                <select id="tip" name="tip[]" class="admin-input-select"  multiple="multiple">
                                    <option value="Stan" <?php if(isset($_GET['tip']) && in_array('Stan', $_GET['tip'])) echo 'selected'; ?> >Stan</option>
                                    <option value="Kuća" <?php if(isset($_GET['tip']) && in_array('Kuća', $_GET['tip'])) echo 'selected'; ?> >Kuća</option>
                                    <option value="Poslovni prostor" <?php if(isset($_GET['tip']) && in_array('Poslovni prostor', $_GET['tip'])) echo 'selected'; ?> >Poslovni prostor</option>
                                    <option value="Magacin" <?php if(isset($_GET['tip']) && in_array('Magacin', $_GET['tip'])) echo 'selected'; ?> >Magacin</option>
                                    <option value="Lokal" <?php if(isset($_GET['tip']) && in_array('Lokal', $_GET['tip'])) echo 'selected'; ?> >Lokal</option>
                                    <option value="Garaža" <?php if(isset($_GET['tip']) && in_array('Garaža', $_GET['tip'])) echo 'selected'; ?> >Garaža</option>
                                    <option value="Poslovna zgrada" <?php if(isset($_GET['tip']) && in_array('Poslovna zgrada', $_GET['tip'])) echo 'selected'; ?> >Poslovna zgrada</option>
                                </select>   
                        </td>
                    </tr>
                    <tr>
                        <th>Struktura:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                                    <select class="admin-input-select" multiple="multiple" name="stan_tip[]" id="stan_tip">
                                        <option value="Garsonjera" <?php if(isset($_GET['stan_tip']) && in_array('Garsonjera', $_GET['stan_tip'])) echo 'selected'; ?> >Garsonjera</option>
                                        <option value="Jednosoban" <?php if(isset($_GET['stan_tip']) && in_array('Jednosoban', $_GET['stan_tip'])) echo 'selected'; ?> >Jednosoban</option>
                                        <option value="Jednoiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Jednoiposoban', $_GET['stan_tip'])) echo 'selected'; ?> >Jednoiposoban</option>
                                        <option value="Dvosoban" <?php if(isset($_GET['stan_tip']) && in_array('Dvosoban', $_GET['stan_tip'])) echo 'selected'; ?> >Dvosoban</option>
                                        <option value="Dvoiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Dvoiposoban', $_GET['stan_tip'])) echo 'selected'; ?> >Dvoiposoban</option>
                                        <option value="Trosoban" <?php if(isset($_GET['stan_tip']) && in_array('Trosoban', $_GET['stan_tip'])) echo 'selected'; ?> >Trosoban</option>
                                        <option value="Troiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Troiposoban', $_GET['stan_tip'])) echo 'selected'; ?> >Troiposoban</option>
                                        <option value="Četvorosoban" <?php if(isset($_GET['stan_tip']) && in_array('Četvorosoban', $_GET['stan_tip'])) echo 'selected'; ?> >Četvorosoban</option>
                                        <option value="Četvoroiposoban" <?php if(isset($_GET['stan_tip']) && in_array('Četvoroiposoban', $_GET['stan_tip'])) echo 'selected'; ?> >Četvoroiposoban</option>
                                        <option value="Petosoban i veći" <?php if(isset($_GET['stan_tip']) && in_array('Petosoban i veći', $_GET['stan_tip'])) echo 'selected'; ?> >Petosoban i veći</option>
                                        <option value="Kuća u osnovi" <?php if(isset($_GET['stan_tip']) && in_array('Kuća u osnovi', $_GET['stan_tip'])) echo 'selected'; ?> >Kuća u osnovi</option>
                                        <option value="Spratna kuća" <?php if(isset($_GET['stan_tip']) && in_array('Spratna kuća', $_GET['stan_tip'])) echo 'selected'; ?> >Spratna kuća</option>
                                    </select>
                        </td>
                    </tr>

                </table>
            </div>
            <div id="pozicija3">
                <table>
                    <tr>
                        <th>Spratnost:</th>
                        <td style="padding: 5px 0 5px 5px;">
			<select class="admin-input-select" multiple="multiple" name="sprat[]" id="sprat">
                                <option value="Suteren" <?php if(isset($_GET['sprat']) && in_array('Suteren', $_GET['sprat'])) echo 'selected'; ?> >Suteren</option>
                                <option value="Prizemlje" <?php if(isset($_GET['sprat']) && in_array('Prizemlje', $_GET['sprat'])) echo 'selected'; ?> >Prizemlje</option>
                                <option value="Visoko prizemlje" <?php if(isset($_GET['sprat']) && in_array('Visoko prizemlje', $_GET['sprat'])) echo 'selected'; ?> >Visoko prizemlje</option>
                                <option value="1. sprat" <?php if(isset($_GET['sprat']) && in_array('1. sprat', $_GET['sprat'])) echo 'selected'; ?> >1. sprat</option>
                                <option value="2. sprat" <?php if(isset($_GET['sprat']) && in_array('2. sprat', $_GET['sprat'])) echo 'selected'; ?> >2. sprat</option>
                                <option value="3. sprat" <?php if(isset($_GET['sprat']) && in_array('3. sprat', $_GET['sprat'])) echo 'selected'; ?> >3. sprat</option>
                                <option value="4. sprat" <?php if(isset($_GET['sprat']) && in_array('4. sprat', $_GET['sprat'])) echo 'selected'; ?> >4. sprat</option>
                                <option value="5. sprat" <?php if(isset($_GET['sprat']) && in_array('5. sprat', $_GET['sprat'])) echo 'selected'; ?> >5. sprat</option>
                                <option value="6. sprat" <?php if(isset($_GET['sprat']) && in_array('6. sprat', $_GET['sprat'])) echo 'selected'; ?> >6. sprat</option>
                                <option value="7. sprat" <?php if(isset($_GET['sprat']) && in_array('7. sprat', $_GET['sprat'])) echo 'selected'; ?> >7. sprat</option>
                                <option value="8. sprat" <?php if(isset($_GET['sprat']) && in_array('8. sprat', $_GET['sprat'])) echo 'selected'; ?> >8. sprat</option>
                                <option value="9. sprat" <?php if(isset($_GET['sprat']) && in_array('9. sprat', $_GET['sprat'])) echo 'selected'; ?> >9. sprat</option>
                                <option value="10. sprat" <?php if(isset($_GET['sprat']) && in_array('10. sprat', $_GET['sprat'])) echo 'selected'; ?> >10. sprat</option>
                                <option value="11. sprat" <?php if(isset($_GET['sprat']) && in_array('11. sprat', $_GET['sprat'])) echo 'selected'; ?> >11. sprat</option>
                                <option value="12. sprat" <?php if(isset($_GET['sprat']) && in_array('12. sprat', $_GET['sprat'])) echo 'selected'; ?> >12. sprat</option>
                                <option value="13. sprat" <?php if(isset($_GET['sprat']) && in_array('13. sprat', $_GET['sprat'])) echo 'selected'; ?> >13. sprat</option>
                                <option value="14. sprat" <?php if(isset($_GET['sprat']) && in_array('14. sprat', $_GET['sprat'])) echo 'selected'; ?> >14. sprat</option>
                                <option value="15. sprat" <?php if(isset($_GET['sprat']) && in_array('15. sprat', $_GET['sprat'])) echo 'selected'; ?> >15. sprat</option>
                                <option value="16. sprat" <?php if(isset($_GET['sprat']) && in_array('16. sprat', $_GET['sprat'])) echo 'selected'; ?> >16. sprat</option>
                                <option value="17. sprat" <?php if(isset($_GET['sprat']) && in_array('17. sprat', $_GET['sprat'])) echo 'selected'; ?> >17. sprat</option>
                                <option value="18. sprat" <?php if(isset($_GET['sprat']) && in_array('18. sprat', $_GET['sprat'])) echo 'selected'; ?> >18. sprat</option>
                                <option value="19. sprat" <?php if(isset($_GET['sprat']) && in_array('19. sprat', $_GET['sprat'])) echo 'selected'; ?> >19. sprat</option>
                                <option value="20. sprat i više" <?php if(isset($_GET['sprat']) && in_array('20. sprat i više', $_GET['sprat'])) echo 'selected'; ?> >20. sprat i više</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Opština:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                            <select class="admin-input-select"  name="opstina[]" id="opstina" multiple="multiple">
                            <?php
                                foreach($row as $opstina){
                                echo '<option value="'. $opstina['id'] . '"'; if(isset($_GET['opstina']) && in_array($opstina['id'], $_GET['opstina'])){ echo ' selected "';} echo '>' . $opstina['opstina'] . '</option>';
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Podlokacija:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                            <select class="admin-input-select"  name="podlokacija[]" id="podlokacija" multiple="multiple">
                            <option value="">Izaberi...</option>
                            <?php
                                foreach($red as $podlokacija){
                                echo '<option value="'.$podlokacija['id'].'"'; if(isset($_GET['podlokacija']) && in_array($podlokacija['id'], $_GET['podlokacija'])){ echo ' selected "';} echo '>'.$podlokacija['podlokacija'].'</option>';
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
                        <th>Nameštenost:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                                    <select class="admin-input-select"  name="namestenost[]" id="namestenost" multiple="multiple">
                                        <option value="Namešten" <?php if(isset($_GET['namestenost']) && in_array('Namešten', $_GET['namestenost'])) echo 'selected'; ?> >Namešten</option>
                                        <option value="Polunamešten" <?php if(isset($_GET['namestenost']) && in_array('Polunamešten', $_GET['namestenost'])) echo 'selected'; ?> >Polunamešten</option>
                                        <option value="Nenamešten" <?php if(isset($_GET['namestenost']) && in_array('Nenamešten', $_GET['namestenost'])) echo 'selected'; ?> >Nenamešten</option>
                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Grejanje:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                            <select name="grejanje[]" id="grejanje" multiple="multiple" class="admin-input-select">
                                <option value="">Izaberi...</option>
                                <option value="CG" <?php if(isset($_GET['grejanje']) && in_array('CG', $_GET['grejanje'])) echo 'selected'; ?> >CG</option>
                                <option value="CG (gas)" <?php if(isset($_GET['grejanje']) && in_array('CG (gas)', $_GET['grejanje'])) echo 'selected'; ?> >CG (gas)</option>
                                <option value="CG (kalorimetri)" <?php if(isset($_GET['grejanje']) && in_array('CG (kalorimetri)', $_GET['grejanje'])) echo 'selected'; ?> >CG (kalorimetri)</option>
                                <option value="ET (struja)" <?php if(isset($_GET['grejanje']) && in_array('ET (struja)', $_GET['grejanje'])) echo 'selected'; ?> >ET (struja)</option>
                                <option value="EG" <?php if(isset($_GET['grejanje']) && in_array('EG', $_GET['grejanje'])) echo 'selected'; ?> >EG</option>
                                <option value="TA" <?php if(isset($_GET['grejanje']) && in_array('TA', $_GET['grejanje'])) echo 'selected'; ?> >TA</option>
                                <option value="PG" <?php if(isset($_GET['grejanje']) && in_array('PG', $_GET['grejanje'])) echo 'selected'; ?> >PG</option>
                                <option value="Klima uređaj" <?php if(isset($_GET['grejanje']) && in_array('Klima uređaj', $_GET['grejanje'])) echo 'selected'; ?> >Klima uređaj</option>
                                <option value="Na gas" <?php if(isset($_GET['grejanje']) && in_array('Na gas', $_GET['grejanje'])) echo 'selected'; ?> >Na gas</option>
                                <option value="Na struju" <?php if(isset($_GET['grejanje']) && in_array('Na struju', $_GET['grejanje'])) echo 'selected'; ?> >Na struju</option>
                                <option value="Norveški radijatori" <?php if(isset($_GET['grejanje']) && in_array('Norveški radijatori', $_GET['grejanje'])) echo 'selected'; ?> >Norveški radijatori</option>
                                <option value="Mermerni radijatori" <?php if(isset($_GET['grejanje']) && in_array('Mermerni radijatori', $_GET['grejanje'])) echo 'selected'; ?> >Mermerni radijatori</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Dostupnost:</th>
                        <td style="padding: 5px 0 5px 5px; height: 25px;">
                            <select name="izdat[]" id="izdat" multiple="multiple" class="admin-input-select">
                                <option value="0" <?php if(isset($_GET['izdat']) && in_array('0', $_GET['izdat'])) echo 'selected'; ?> >Nije izdat</option>
                                <option value="1" <?php if(isset($_GET['izdat']) && in_array('1', $_GET['izdat'])) echo 'selected'; ?> >Izdat</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="pozicija5">
                <table>
                	<tr>
                        <th style="width:30px;">Kvadratura:</th>
                        <td>
	                        <input type="text" name="povOD" class="admin-input-select" style="width:54px;" value="<?php if(isset($_GET['povOD'])){ echo $_GET['povOD'];} ?>" >
	                        <span style="margin: 0px 0px 0px 5px; font-weight: bold; display: inline-block;">do</span>
	                        <input type="text" name="povDO" class="admin-input-select" style="width:54px;" value="<?php if(isset($_GET['povDO'])){ echo $_GET['povDO'];} ?>" >
                        </td>
                	</tr>
                       <tr>
                       <th style="width:30px;">Cena:</th>
                        <td>
                            <input type="text" name="cenaOD" class="admin-input-select" style="width:54px;" value="<?php if(isset($_GET['cenaOD'])){ echo $_GET['cenaOD'];} ?>" >
                            <span style="margin: 0px 0px 0px 5px; font-weight: bold; display: inline-block;">do</span>
                            <input type="text" name="cenaDO" class="admin-input-select" style="width:54px;" value="<?php if(isset($_GET['cenaDO'])){ echo $_GET['cenaDO'];} ?>" >
                        </td>
                    </tr> 
                </table>
            </div>
                       <div id="napredna">
                            <table id="id-form" >
                                <tr style="background-color:#f3f3f3;">
                                <td style="width: 153px;"><label><input type="checkbox" name="kablovska" class="napredna_input" <?php if(isset($_GET['kablovska'])){echo 'checked';} ?> > Kablovska/Sat</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="tv" <?php if(isset($_GET['tv'])){echo 'checked';} ?> > TV</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="klima" <?php if(isset($_GET['klima'])){echo 'checked';} ?> > Klima</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="internet"  <?php if(isset($_GET['internet'])){echo 'checked';} ?> > Internet</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="ima_telefon" <?php if(isset($_GET['ima_telefon'])){echo 'checked';} ?> > Telefon</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="vesmasina"  <?php if(isset($_GET['vesmasina'])){echo 'checked';} ?> > Veš mašina</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="kuhinjskielementi"  <?php if(isset($_GET['kuhinjskielementi'])){echo 'checked';} ?> > Kuhinjski elementi</label></td>
                                <td style="width: 153px;"><label><input type="checkbox" name="plakari" <?php if(isset($_GET['plakari'])){echo 'checked';} ?> > Plakari</label></td>
                                </tr>    
                                <tr>
                                <td><label><input type="checkbox" name="interfon" > Interfon</label></td>
                                <td><label><input type="checkbox" name="lift" > Lift</label></td>   
                                <td><label><input type="checkbox" name="bazen" > Bazen</label></td>
                                <td><label><input type="checkbox" name="garaza" > Garaža</label></td>
                                <td><label><input type="checkbox" name="parking" > Parking</label></td>
                                <td><label><input type="checkbox" name="dvoriste" > Dvorište</label></td>
                                <td><label><input type="checkbox" name="potkrovlje" > Potkrovlje</label></td>
                                <td><label><input type="checkbox" name="terasa" > Terasa</label></td> 
                                </tr>
                                <tr style="background-color:#f3f3f3;">
                                <td><label><input type="checkbox" name="novogradnja" > Novogradnja</label></td>
                                <td><label><input type="checkbox" name="renovirano" > Renovirano</label></td>
                                <td><label><input type="checkbox" name="lux" > Lux</label></td>   
                                <td><label><input type="checkbox" name="penthaus" > Penthaus</label></td>
                                <td><label><input type="checkbox" name="salonski" > Salonski</label></td>
                                <td><label><input type="checkbox" name="lodja" > Lođa</label></td>
                                <td><label><input type="checkbox" name="duplex" > Duplex</label></td>
                                <td><label><input type="checkbox" name="nov_namestaj" > Nov nameštaj</label></td>
                                </tr>
                                <tr>
                                <td><label><input type="checkbox" name="kompjuterska_mreza" > Kmpjuterska mreža</label></td>
                                <td><label><input type="checkbox" name="dva_kupatila" > Dva kupatila</label></td>
                                <td><label><input type="checkbox" name="vise_telefonskih_linija" > Više telefonskih linija</label></td>
                                <td><label><input type="checkbox" name="stan_u_kuci" > Stan u kući</label></td>
                                <td><label><input type="checkbox" name="samostojeca_kuca" > Samostojeća kuća</label></td>
                                <td><label><input type="checkbox" name="kuca_s_dvoristem" > Kuća s dvorištem</label></td>
                                <td><label><input type="checkbox" name="kucni_ljubimci" > Kućni ljubimci</label></td>
                                <td><label><input type="checkbox" name="balkon" > Balkon</label></td>
                                </tr>
                                <tr style="background-color:#f3f3f3;">
                                <td><label><input type="checkbox" name="video_nadzor" > Video nadzor</label></td>
                                <td><label><input type="checkbox" name="alarm" > Alarm</label></td>
                                <td><label><input type="checkbox" name="basta" > Bašta</label></td>
                                <td><label><input type="checkbox" name="basta" > Pomoćni objekti</label></td>
                                <td><label><input type="checkbox" name="ostava" > Ostava</label></td>
                                <td><label><input type="checkbox" name="podrum" > Podrum</label></td>
                                <td><label><input type="checkbox" name="opticki_kabl" > Optički kabl</label></td>
                                <td><label><input type="checkbox" name="open_space" > Open space</label></td>
                                </tr>
                                <tr>
                                <td><label><input type="checkbox" name="pristup_za_invalide" > Pristup za invalide</label></td>
                                <td><label><input type="checkbox" name="lokal_na_ulici" > Lokal na ulici</label></td>
                                <td><label><input type="checkbox" name="pravno_lice" > Pravno lice</label></td>
                                </tr>
                            </table>
                       </div>
                       <div id="hideshowctrl" style="padding-left:5px; clear:both; width:100%; text-align: center;">
                           <a href="#" class="show_hide" rel="#napredna">NAPREDNA PRETRAGA</a>
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
					<th class="table-header-repeat line-left minwidth-1"><a href="">Dodatno</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Opstina</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Lokacija</a></th>
					<th class="table-header-repeat line-left"><a href="">Ulica</a></th>
					<th class="table-header-repeat line-left"><a href="">Telefon</a></th>
					<th class="table-header-repeat line-left"><a href="">Kvadratura</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Namešt.</a></th>
					<th class="table-header-repeat line-left"><a href="">Spratnost</a></th>
					<th class="table-header-repeat line-left"><a href="">Cena</a></th>                                        
		<!--			<th class="table-header-repeat line-left"><a href="">Vidljiv</a></th>   -->
                <!--                        <th class="table-header-repeat line-left"><a href="">Hot</a></th>    -->
					<th class="table-header-options line-left"><a href="">Opcije</a></th>
				</tr>
				<?php
					if(isset($stanovi)){
					
					foreach($stanovi as $stan){
                          
                        
				?>
				<tr style="<?php if($stan['izdat']) { echo 'background-color:#f4dbdb';} ?>" >
					<td><?php echo '<strong>' . $stan[0] . '</strong>';?></td>
					<td><?php echo $stan['kategorija'];?></td>
                                        <td><?php echo $stan['tip'];?></td>
					<td style="word-wrap: break-word;"><?php echo $stan['dodatna_informacija'];?></td>
					<td><?php echo $stan['opstina'];?></td>
                                        <td><?php echo $stan['opis_lokacije'];?></td>
					<td><?php echo $stan['ulica'];?></td>
					<td><?php echo $stan[11];?></td>
					<td><?php echo $stan['kvadratura'] . ' m&#178';?></td>
					<td><?php echo $stan['namestenost'];?></td>
					<td><?php echo $stan['sprat'];?></td>
                                        <td><?php echo $stan['cena'] . ' €';?></td>
		<!--			<td><?php if($stan['vidljiv'] == '1'){echo 'Da';}else{echo 'Ne';}?></td>      -->
                <!--                    <td><?php if($stan['hot_offer'] == '1'){echo 'Da';}else{echo 'Ne';}?></td>    -->
					<td class="options-width">
					<a href="izmeni.php?id=<?php echo $stan[0];?>" title="Izmeni" class="icon-1 info-tooltip"></a>
					<a href="detaljan_pregled.php?id=<?php echo $stan[0];?>" title="Detaljnije" class="icon-3 info-tooltip"></a>
					<a href="promeni_vidljivost.php?id=<?php echo $stan[0] . '&vidljiv=' . $stan['vidljiv'];?>" title="Promeni Vidljivost" class="<?php if($stan['vidljiv']) echo 'icon-5a'; else echo 'icon-5';?> info-tooltip"></a>
                                        <a href="promeni_hot.php?id=<?php echo $stan[0] . '&hot=' . $stan['hot_offer'];?>" title="Postavi kao najbolje u ponudi" class="<?php if($stan['hot_offer']) echo 'icon-6a'; else echo 'icon-6';?> info-tooltip"></a>
                                        <a href="promeni_izdat.php?id=<?php echo $stan[0] . '&izdat=' . $stan['izdat'];?>" title="Promeni dostupnost stana" class="<?php if($stan['izdat']) echo 'icon-7a'; else echo 'icon-7';?> info-tooltip"></a>
					<?php
                                        if($username == 'Ivana'){
                                        ?>
                                        <a href="#" onclick="brisanje(<?php echo $stan[0]; ?>);" title="Obrisi" class="icon-2 info-tooltip"></a>
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
                            <?php if(isset($page_amount) != 0){ ?>
                            <td style="padding-left:15px">
                            <form id="frmidinastr" action="#" method="post">
                                Skok na stranu: <input type="text" id="idinastr" style="width:20px;"/><input type="submit" value="Go" id="idinastrgo"/>
                            </form>
                                <script>
                                    $('#frmidinastr').submit(function(){
                                      var sstr = $('#idinastr').val();
                                      $(this).attr('action', "spisak_stanova.php?stranica=" + sstr);
                                    }); 
                                </script>
                            </td>
                            <?php } ?>
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


