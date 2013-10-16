<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
 
if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = prikaziStanZaAdmina($id);
	$tagovi = ispisiDodatneTagove($id);

        $slike = prikaziSlike($id, 'velika');
	
} 
                     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jevtic Nekretnine</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="icon" href="images/kuca.png" type="image/x-icon" />
<!-- <link rel="stylesheet" href="css/lightbox-screen.css" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
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

		<ul class="current"><li><a href="dodaj_stan.php"><b>Stanovi</b><!--[if IE 7]><!--></a><!--<![endif]-->
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

		<ul class="current"><li><a href="imenik.php"><b>Imenik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

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

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Izmeni Podatke</h1>
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
			<div class="step-dark-left"><a href="">Podaci o stanu</a></div>
			
		</div>
		<!--  end step-holder -->

		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <tr>
			<th valign="top">Id:</th>
			<td><input type="hidden" class="inp-form" name="id" value="<?php echo $stan[0];?>" /><?php echo '<strong>' . $stan[0] . '</strong>';?></td>
			<td>

			</td>
		</tr>
		<tr>
			<th valign="top">Datum dodavanja:</th>
			<td><?php echo date("d-m-Y", strtotime($stan['datum_dodavanja']));?></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Vlasnik:</th>
			<td><?php echo $stan['vlasnik'];?></td>
			<td>
			
			</td>
		</tr>
                <tr>
			<th valign="top">Telefon:</th>
			<td><?php echo $stan['telefon'];?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">E-mail:</th>
			<td><?php echo $stan['email'];?></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Kategorija:</th>
			<td><?php echo $stan['kategorija'];?></td>
			<td></td>
		</tr>
			<th valign="top">Tip:</th>
			<td><?php echo $stan['tip'];?></td>
			<td></td>
		</tr>
			<th valign="top"></th>
			<td><?php echo $stan['stan_tip'];?></td>
			<td></td>
		</tr> 
		<tr>
			<th valign="top">Ulica i broj:</th>
			<td><?php echo $stan['ulica'];?> <?php echo $stan['br'];?></td>
			<td>

			</td>
		</tr>
                <tr>
			<th valign="top">Sprat:</th>
			<td><?php echo $stan['sprat'];?></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Lokacija:</th>
		<td>
          <?php echo $stan['opstina'];?>     
		
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Podlokacija:</th>
		<td>
          <?php echo $stan['podlokacija'];?>     
		
		</td>
		<td></td>
		</tr>
		<tr>
			<th valign="top">Grejanje:</th>
			<td><?php echo $stan['grejanje'];?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Nameštenost:</th>
			<td><?php echo $stan['namestenost'];?></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Kvadratura:</th>
			<td><?php echo $stan['kvadratura'];?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Cena:</th>
			<td><?php echo $stan['cena'];?></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Stan dodao:</th>
			<td><?php echo $stan['dodao'];?></td>
			<td></td>
		</tr>
		
		<!--<tr>
		<th valign="top">Select a date:</th>
		<td class="noheight">

			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<form id="chooseDateForm" action="#">

				<select id="d" class="styledselect-day">
					<option value="">dd</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				</td>
				<td>
					<select id="m" class="styledselect-month">
						<option value="">mmm</option>
						<option value="1">Jan</option>
						<option value="2">Feb</option>
						<option value="3">Mar</option>
						<option value="4">Apr</option>
						<option value="5">May</option>
						<option value="6">Jun</option>
						<option value="7">Jul</option>
						<option value="8">Aug</option>
						<option value="9">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
				</td>
				<td>
					<select  id="y"  class="styledselect-year">
						<option value="">yyyy</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
					</select>
					</form>
				</td>
				<td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table>

		</td>
		<td></td>
	</tr>-->
                        <tr>
                                <th valign="top">Opis:</th>
                                <td><?php echo $stan['opis'];?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <th valign="top">Dodatna informacija:</th>
                                <td><?php echo $stan['dodatna_informacija'];?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <th valign="top">Slike:</th>
                                <td>
                                    <div id="slike">
                                    <div class="imageRow">
                                <?php

                                    foreach ($slike as $slike_stanova)
                                    {
                                        echo '<div class="single"><a class="single_a" href="slike/watermark_' . $slike_stanova['naziv'] . '" rel="lightbox"><img src="slike/thumb_' . $slike_stanova['naziv'] . '" alt="" width="100px" /></a>';
                                        echo '</div>';


                                    }
                                ?>

                                    </div>
                                    </div>
                                </td>
<!--                                <div class="imageRow">
                                      <div class="single">
                                              <a href="images/examples/image-1.jpg" rel="lightbox"><img src="images/examples/thumb-1.jpg" alt="" /></a>
                                      </div>
                                      <div class="single">
                                              <a href="images/examples/image-2.jpg" rel="lightbox" title="Optional caption."><img src="images/examples/thumb-2.jpg" alt="" /></a>
                                      </div>
                                </div>        -->

                        </tr>
	
		<th>&nbsp;</th>
		<td valign="top">
          
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
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">

                                        <tr>

                                                <td style="width:110px; "><input  type="checkbox" name="interfon" <?php if($tagovi['interfon']){ echo ' checked';}?>/>Interfon</td>
                                                <td><input  type="checkbox" name="kablovska" <?php if($tagovi['kablovska']){ echo ' checked';}?>/>Kablovska</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="tv" <?php if($tagovi['tv']){ echo ' checked';}?>/>TV</td>
                                                <td><input  type="checkbox" name="klima" <?php if($tagovi['klima']){ echo ' checked';}?>/>Klima</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="internet" <?php if($tagovi['internet']){ echo ' checked';}?>/>Internet</td>
                                                <td><input  type="checkbox" name="ima_telefon" <?php if($tagovi['telefon']){ echo ' checked';}?>/>Telefon</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="frizider" <?php if($tagovi['frizider']){ echo ' checked';}?>/>Frižider</td>
                                                <td><input  type="checkbox" name="sporet" <?php if($tagovi['sporet']){ echo ' checked';}?>/>Šporet</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="ves_masina" <?php if($tagovi['ves_masina']){ echo ' checked';}?>/>Veš mašina</td>
                                                <td><input  type="checkbox" name="kuhinjski_elementi" <?php if($tagovi['kuhinjski_elementi']){ echo ' checked';}?>/>Kuh. elementi</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="plakari" <?php if($tagovi['plakari']){ echo ' checked';}?>/>Plakari</td>
                                                <td><input  type="checkbox" name="lift" <?php if($tagovi['lift']){ echo ' checked';}?>/>Lift</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="bazen" <?php if($tagovi['bazen']){ echo ' checked';}?>/>Bazen</td>
                                                <td><input  type="checkbox" name="garaza" <?php if($tagovi['garaza']){ echo ' checked';}?>/>Garaža</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="parking" <?php if($tagovi['parking']){ echo ' checked';}?>/>Parking</td>
                                                <td><input  type="checkbox" name="dvoriste" <?php if($tagovi['dvoriste']){ echo ' checked';}?>/>Dvorište</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="potkrovlje" <?php if($tagovi['potkrovlje']){ echo ' checked';}?>/>Potkrovlje</td>
                                                <td><input  type="checkbox" name="terasa" <?php if($tagovi['terasa']){ echo ' checked';}?>/>Terasa</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="novogradnja" <?php if($tagovi['novogradnja']){ echo ' checked';}?>/>Novogradnja</td>
                                                <td><input  type="checkbox" name="renovirano" <?php if($tagovi['renovirano']){ echo ' checked';}?>/>Renovirano</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="lux" <?php if($tagovi['lux']){ echo ' checked';}?>/>Lux</td>
                                                <td><input  type="checkbox" name="penthaus" <?php if($tagovi['penthaus']){ echo ' checked';}?>/>Penthaus</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="salonski" <?php if($tagovi['salonski']){ echo ' checked';}?>/>Salonski</td>
                                                <td><input  type="checkbox" name="lodja" <?php if($tagovi['lodja']){ echo ' checked';}?>/>Lođa</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="duplex" <?php if($tagovi['duplex']){ echo ' checked';}?>/>Duplex</td>
                                                <td><input  type="checkbox" name="nov_namestaj" <?php if($tagovi['nov_namestaj']){ echo ' checked';}?>/>Nov nameštaj</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="kompjuterska_mreza" <?php if($tagovi['kompjuterska_mreza']){ echo ' checked';}?>/>Komp. mreža</td>
                                                <td><input  type="checkbox" name="dva_kupatila" <?php if($tagovi['dva_kupatila']){ echo ' checked';}?>/>Dva kupatila</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="vise_telefonskih_linija" <?php if($tagovi['vise_telefonskih_linija']){ echo ' checked';}?>/>Više tel. linija</td>
                                                <td><input  type="checkbox" name="vertikala" <?php if($tagovi['vertikala']){ echo ' checked';}?>/>Vertikala</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="horizontala" <?php if($tagovi['horizontala']){ echo ' checked';}?>/>Horizontala</td>
                                                <td><input  type="checkbox" name="stan_u_kuci" <?php if($tagovi['stan_u_kuci']){ echo ' checked';}?>/>Stan u kući</td>
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
