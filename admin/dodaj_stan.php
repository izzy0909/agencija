<?php
include 'upload.php';
include_once '../data_base_access/slikeDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';

if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
    
    
   $row = prikaziSveOpstine();

   $username = $_SESSION['username'];
//var_dump($row);
                        
                        
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
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
				<li class="sub_show"><a href="dodaj_stan.php">Dodaj stan</a></li>
				<li><a href="spisak_stanova.php">Spisak stanova</a></li>
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
				<li><a href="podsetnik.php">Spisak poruka</a></li>
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

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Dodaj Stan</h1>
	</div>
	<!-- end page-heading -->
        <form id="dodaj_stan" action="dodaj_stan.php" method="post" enctype="multipart/form-data">
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
			<th valign="top">Vlasnik:</th>
			<td><input type="text" class="inp-form" name="vlasnik" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">Telefon:</th>
			<td><input type="text" class="inp-form" name="telefon" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">E-mail:</th>
			<td><input type="text" class="inp-form" name="email" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top" >Kategorija:</th>
                        <td><select name="kategorija" class="styledselect_form_1">
                                <option value="izdavanje">Izdavanje</option>
                                <option value="prodaja">Prodaja</option>
                            </select></td>
			<td></td>
                </tr>
		<tr>
			<th valign="top">Tip:</th>
			<td><select name="tip" class="styledselect_form_1">
                                <option value="Stan">Stan</option>
                                <option value="Kuća">Kuća</option>
                                <option value="Poslovni prostor">Poslovni prostor</option>
                                <option value="Magacin">Magacin</option>
                                <option value="Lokal">Lokal</option>
                                <option value="Garaža">Garaža</option>
                                <option value="Apartman na dan">Apartman na dan</option>
                            </select></td>
			<td>
			</td>
		</tr>
		<tr>
			<th></th>
			<td><select name="stan_tip" class="styledselect_form_1">
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
                            </select></td>
			<td>
			</td>
		</tr>

		</tr>                    
		<tr>
			<th valign="top">Ulica i broj:</th>
			<td><input type="text" class="inp-formV" name="ulica" /><input type="text" class="inp-formM" name="br" /></td>
			<td>
			
			</td>
		</tr>
        <tr>
			<th valign="top">Sprat:</th>
                        <td><select name="sprat" class="styledselect_form_1">
                                <option value="Suteren">Suteren</option>
                                <option value="Prizemlje">Prizemlje</option>
                                <option value="Visoko prizemlje">Visoko prizemlje</option>
                                <option value="1. sprat">1. sprat</option>
                                <option value="2. sprat">2. sprat</option>
                                <option value="3. sprat">3. sprat</option>
                                <option value="4. sprat">4. sprat</option>
                                <option value="5. sprat">5. sprat</option>
                                <option value="6. sprat">6. sprat</option>
                                <option value="7. sprat">7. sprat</option>
                                <option value="8. sprat">8. sprat</option>
                                <option value="9. sprat">9. sprat</option>
                                <option value="10. sprat">10. sprat</option>
                                <option value="11. sprat">11. sprat</option>
                                <option value="12. sprat">12. sprat</option>
                                <option value="13. sprat">13. sprat</option>
                                <option value="14. sprat">14. sprat</option>
                                <option value="15. sprat">15. sprat</option>
                                <option value="16. sprat">16. sprat</option>
                                <option value="17. sprat">17. sprat</option>
                                <option value="18. sprat">18. sprat</option>
                                <option value="19. sprat">19. sprat</option>
                                <option value="20. sprat i više">20. sprat i više</option>
                            </select></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Lokacija:</th>
		<td>
                  
		<select  class="styledselect_form_1" name="opstina">
                 <?php

                        foreach($row as $opstina){
                          echo '<option value="'.$opstina['id'].'">'.$opstina['opstina'].'</option>';
                          
                        }
                 ?>
			
		</select>
		</td>
		<td></td>
		</tr>
                <tr>
                <th>Grejanje:</th>
                <td>        <select name="grejanje" class="styledselect_form_1">
                                <option value="CG">CG</option>
                                <option value="EG">EG</option>
                                <option value="TA">TA</option>
                                <option value="PG">PG</option>
                                <option value="Klima uređaj">Klima&nbsp;uređaj</option>
                            </select></td>
                </tr>
               <th>Nameštenost:</th>
                <td>        <select name="namestenost" class="styledselect_form_1">
                                <option value="Namešten">Namešten</option>
                                <option value="Nenamešten">Nenamešten</option>
                            </select></td>
                </tr>
                <tr>
			<th valign="top">Kvadratura:</th>
			<td><input type="text" class="inp-form" name="kvadratura" /></td>
			<td></td>
		</tr>                    
		<tr>
			<th valign="top">Cena:</th>
			<td><input type="text" class="inp-form" name="cena" /></td>
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
		<td><textarea rows="" cols="" class="form-textarea" name="opis"></textarea></td>
		<td></td>
	</tr>
		<tr>
			<th valign="top" >Vidljivost:</th>
                        <td><select name="vidljivost" class="styledselect_form_1">
                                <option value="0">Nevidljiv</option>
                                <option value="1">Vidljiv</option>
                            </select></td>
			<td></td>
                </tr>                            

<tr>  
	<td>
            
	<label>Files
    <span class="small"><a href="#" id="AddMoreFileBox">Add More Files</a></span>
    </label>
    <div id="AddFileInputBox"><input id="fileInputBox" style="margin-bottom: 5px;" type="file"  name="file[]"/></div>
    <div class="sep_s"></div>
	</td>
</tr>

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
                        <!--<input type="submit" value="Dodaj" name="dodaj_stan" id="dodaj_stan" />-->
                        <input type="submit" value="Dodaj" class="form-submit" name="dodaj_stan" id="dodaj_stan" />
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
		<div id="related-act-top">
		<img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->

		<!--  start related-act-bottom -->
		<div id="related-act-bottom">

			<!--  start related-act-inner -->
			<div id="related-act-inner">

				<div class="left"><a href=""></a></div>
				<div class="right">
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="font-size:13px;">
                                        <tr>
                                                <td style="width:100px;"><input  type="checkbox" name="interfon" />Interfon</td>
                                                <td><input  type="checkbox" name="kablovska" />Kablovska</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="tv" />TV</td>
                                                <td><input  type="checkbox" name="klima" />Klima</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="internet" />Internet</td>
                                                <td><input  type="checkbox" name="ima_telefon" />Telefon</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="frizider" />Frižider</td>
                                                <td><input  type="checkbox" name="sporet" />Šporet</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="vesmasina" />Veš mašina</td>
                                                <td><input  type="checkbox" name="kuhinjskielementi" />Kuh. elementi</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="plakari" />Plakari</td>
                                                <td><input  type="checkbox" name="lift" />Lift</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="bazen" />Bazen</td>
                                                <td><input  type="checkbox" name="garaza" />Garaža</td>
                                        </tr>               
					<tr>
                                                <td><input  type="checkbox" name="parking" />Parking</td>
                                                <td><input  type="checkbox" name="dvoriste" />Dvorište</td>
                                        </tr>              
					<tr>
                                                <td><input  type="checkbox" name="potkrovlje" />Potkrovlje</td>
                                                <td><input  type="checkbox" name="terasa" />Terasa</td>
                                        </tr>                     
					<tr>
                                                <td><input  type="checkbox" name="novogradnja" />Novogradnja</td>
                                                <td><input  type="checkbox" name="renovirano" />Renovirano</td>
                                        </tr>
					<tr>
                                                <td><input  type="checkbox" name="lux" />Lux</td>
                                                <td><input  type="checkbox" name="penthaus" />Penthaus</td>
                                        </tr>                                        
					<tr>
                                                <td><input  type="checkbox" name="salonski" />Salonski</td>
                                                <td><input  type="checkbox" name="lodja" />Lođa</td>
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

</body>
</html>
<?php

if (isset ($_POST['dodaj_stan'])){
	
    $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $kategorija = isset($_POST['kategorija']) ? $_POST['kategorija'] : null;
    $tip = isset($_POST['tip']) ? $_POST['tip'] : null;
    $stan_tip = isset($_POST['stan_tip']) ? $_POST['stan_tip'] : null;
    $ulica = isset($_POST['ulica']) ? $_POST['ulica'] : null;
    $br = isset($_POST['br']) ? $_POST['br'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $grejanje = isset($_POST['grejanje']) ? $_POST['grejanje'] : null;
    $namestenost = isset($_POST['namestenost']) ? $_POST['namestenost'] : null;
    
    $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
    $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
    $opis = isset($_POST['opis']) ? $_POST['opis'] : null;
    $vidljivost = isset($_POST['vidljivost']) ? $_POST['vidljivost'] : null;
    
    
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
    $interfon = isset($_POST['interfon']) ? '1' : '0';
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

    $stan_id = dodajStan($kategorija, $tip, $stan_tip, $vlasnik, $opstina, $ulica, $br, $sprat, $telefon, $email, $cena, $kvadratura, $grejanje, $namestenost, $opis, $vidljivost, $username);
    
    dodajDodatneTagove($stan_id, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja);

    //var_dump($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    //echo $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis . '<br /><br />';
    //echo $stan_id . '///' . $klima . '///' . $tv . '///' . $lodja;

    
    upload($_FILES, $stan_id);


}