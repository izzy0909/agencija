<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}

    $row = prikaziSveOpstine();
    $red = prikaziSvePodlokacije();
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
<title>Jevtić Nekretnine</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="icon" href="images/kuca.png" type="image/x-icon" />
<!-- <link rel="stylesheet" href="css/lightbox-screen.css" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<style>
  	#id-form .ui-helper-hidden-accessible {
  		position: static !important;
  		margin-right: 2px;
  	}
	#related-act-inner input[type="checkbox"] {
		width: 13px;
		height: 13px;
	}
</style>

<!--  jquery core -->
<!-- <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script> -->
<!-- za slike -->
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<!-- <script src="js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script> -->
<script src="js/jquery.smooth-scroll.min.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
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


}); 
</script>
<!--  jquery core 
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script> -->

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
        <form id="izmeni_stan" action="izmeni_stan.php" method="post" enctype="multipart/form-data">
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form" >
		<tr>
			<th valign="top">Id:</th>
			<td><input type="hidden" class="inp-form" name="id" value="<?php echo $stan[0];?>" /><?php echo '<strong>' . $stan[0] . '</strong>' ;?></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Dostupnost:</th>
			<td><select id="izdat" name="izdat" class="styledselect_form_1">
                                <option value="0" <?php if(!$stan['izdat']){echo 'selected';} ?>>Nije izdat</option>
                                <option value="1" <?php if($stan['izdat']){echo 'selected';} ?>>Izdat</option>
                            </select></td>
			<td></td>
		</tr>  
		<tr>
			<th valign="top">Vlasnik:</th>
			<td><input type="text" class="inp-form" name="vlasnik" value="<?php echo $stan['vlasnik'];?>"/></td>
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
			<td><select id="kategorija" name="kategorija" class="styledselect_form_1">
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
			<th valign="top"></th>
			<td><select id="stan_tip" name="stan_tip" class="styledselect_form_1">
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
			<th valign="top">Ulica i broj:</th>
			<td><input type="text" class="inp-formV" name="ulica" value="<?php echo $stan['ulica'];?>"/><input type="text" class="inp-formM" name="br" value="<?php echo $stan['br'];?>"/></td>
			<td>
			
			</td>
		</tr>
                <tr>
			<th valign="top">Sprat:</th>
                        <td><select id="sprat" name="sprat" class="styledselect_form_1">
                                <option value="Suteren" <?php if($stan['sprat']=='Suteren'){echo 'selected';} ?>>Suteren</option>
                                <option value="Prizemlje" <?php if($stan['sprat']=='Prizemlje'){echo 'selected';} ?>>Prizemlje</option>
                                <option value="Visoko prizemlje" <?php if($stan['sprat']=='Visoko prizemlje'){echo 'selected';} ?>>Visoko prizemlje</option>
                                <option value="1. sprat" <?php if($stan['sprat']=='1. sprat'){echo 'selected';} ?>>1. sprat</option>
                                <option value="2. sprat" <?php if($stan['sprat']=='2. sprat'){echo 'selected';} ?>>2. sprat</option>
                                <option value="3. sprat" <?php if($stan['sprat']=='3. sprat'){echo 'selected';} ?>>3. sprat</option>
                                <option value="4. sprat" <?php if($stan['sprat']=='4. sprat'){echo 'selected';} ?>>4. sprat</option>
                                <option value="5. sprat" <?php if($stan['sprat']=='5. sprat'){echo 'selected';} ?>>5. sprat</option>
                                <option value="6. sprat" <?php if($stan['sprat']=='6. sprat'){echo 'selected';} ?>>6. sprat</option>
                                <option value="7. sprat" <?php if($stan['sprat']=='7. sprat'){echo 'selected';} ?>>7. sprat</option>
                                <option value="8. sprat" <?php if($stan['sprat']=='8. sprat'){echo 'selected';} ?>>8. sprat</option>
                                <option value="9. sprat" <?php if($stan['sprat']=='9. sprat'){echo 'selected';} ?>>9. sprat</option>
                                <option value="10. sprat" <?php if($stan['sprat']=='10. sprat'){echo 'selected';} ?>>10. sprat</option>
                                <option value="11. sprat" <?php if($stan['sprat']=='11. sprat'){echo 'selected';} ?>>11. sprat</option>
                                <option value="12. sprat" <?php if($stan['sprat']=='12. sprat'){echo 'selected';} ?>>12. sprat</option>
                                <option value="13. sprat" <?php if($stan['sprat']=='13. sprat'){echo 'selected';} ?>>13. sprat</option>
                                <option value="14. sprat" <?php if($stan['sprat']=='14. sprat'){echo 'selected';} ?>>14. sprat</option>
                                <option value="15. sprat" <?php if($stan['sprat']=='15. sprat'){echo 'selected';} ?>>15. sprat</option>
                                <option value="16. sprat" <?php if($stan['sprat']=='16. sprat'){echo 'selected';} ?>>16. sprat</option>
                                <option value="17. sprat" <?php if($stan['sprat']=='17. sprat'){echo 'selected';} ?>>17. sprat</option>
                                <option value="18. sprat" <?php if($stan['sprat']=='18. sprat'){echo 'selected';} ?>>18. sprat</option>
                                <option value="19. sprat" <?php if($stan['sprat']=='19. sprat'){echo 'selected';} ?>>19. sprat</option>
                                <option value="20. sprat i više" <?php if($stan['sprat']=='20. sprat i više'){echo 'selected';} ?>>20. sprat i više</option>
                            </select></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Opština:</th>
		<td>
                  
		<select id="opstina" class="styledselect_form_1" name="opstina">
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
		<th valign="top">Podlokacija:</th>
		<td>
                  
		<select id="podlokacija" class="styledselect_form_1" name="podlokacija">
                 <?php

                        foreach($red as $podlokacija){
                          echo '<option value="'.$podlokacija['id'].'"'; if($stan['podlokacija']==$podlokacija['podlokacija']){echo ' selected';} echo '>'.$podlokacija['podlokacija'].'</option>';
                          
                        }
                 ?>
			
		</select>
		</td>
                <tr></tr>
		</tr>
            <tr>
                <th valign="top">Lokacija:</th>
                <td><textarea rows="" cols="" class="form-textarea" name="opis_lokacije"><?php echo $stan['opis_lokacije'];?></textarea></td>
                <td></td>
            </tr>
                <tr>
			<th valign="top">Grejanje:</th>
                <td>        <select id="grejanje" name="grejanje" class="styledselect_form_1">
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
                                <option value="Namešten" <?php if($stan['namestenost']=='Namešten'){echo 'selected';} ?>>Namešten</option>
                                <option value="Polunamešten" <?php if($stan['namestenost']=='Polunamešten'){echo 'selected';} ?>>Polunamešten</option>
                                <option value="Nenamešten" <?php if($stan['namestenost']=='Nenamešten'){echo 'selected';} ?>>Nenamešten</option>
                            </select></td>
			<td></td>
		</tr>                                
                <tr>
			<th valign="top">Kvadratura:</th>
			<td><input type="text" class="inp-form" name="kvadratura" value="<?php echo $stan['kvadratura'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Cena:</th>
			<td><input type="text" class="inp-form" name="cena" value="<?php echo $stan['cena'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Provizija:</th>
			<td><input type="text" class="inp-form" style="width:25px;" name="provizija" value="<?php echo $stan['provizija'];?>"/><span style="margin-left:10px;">%</span></td>
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
		<td><textarea rows="" cols="" class="form-textarea" name="opis"><?php echo $stan['opis'];?></textarea></td>
		<td></td>
	</tr>
	<tr>
		<th valign="top">Dodatna informacija:</th>
		<td><textarea rows="" cols="" class="form-textarea" name="dodatna_informacija"><?php echo $stan['dodatna_informacija'];?></textarea></td>
		<td></td>
	</tr>
	<tr>
		<th valign="top">Youtube:</th>
		<td><input type="text" class="inp-form" name="youtube" value="<?php echo $stan['youtube'];?>" /></td></td>
		<td></td>
	</tr>
	<tr>
			<th valign="top" >Zonski parking:</th>
                        <td><select name="zonski_parking" class="styledselect_form_1">
                        		<option value="Nije zonirano" >Nije zonirano</option>
                                <option value="Zona 1" <?php if($stan['zonski_parking']=='Zona 1'){echo 'selected';} ?>>Zona 1</option>
                                <option value="Zona 2" <?php if($stan['zonski_parking']=='Zona 2'){echo 'selected';} ?>>Zona 2</option>
                                <option value="Zona 3" <?php if($stan['zonski_parking']=='Zona 3'){echo 'selected';} ?>>Zona 3</option>
                            </select></td>
			<td></td>
    </tr>  
	<tr>
		<th valign="top">Br. parking mesta:</th>
		<td><input type="text" class="inp-form" name="br_parking_mesta" value="<?php echo $stan['br_parking_mesta'];?>" /></td></td>
		<td></td>
	</tr>
	<tr>
    	<th>Vidljiv do:</th>
    	<td><input type="text" class="inp-form" id="datepicker" name="vidljiv_do" value="<?php if($stan['vidljiv_do'] != null) { echo date('d-m-Y', strtotime($stan['vidljiv_do'])); } ?>"></td>
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
                                        if($slike_stanova['glavna']!=1) {echo '<div style="padding-left:20px;"><a href="glavna_slika.php?slika_id=' . $slike_stanova['id'] . '&stan_id='.  $stan[0] .'">Glavna</a> | <a href="obrisi_sliku.php?slika_naziv=' . $slike_stanova['naziv'] . '">Obriši</a></div>'; }
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
                        <input type="submit" value="Izmeni" class="form-submit" name="izmeni_stan" id="izmeni_stan" />
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
                                                
                                                <td style="width:153px; "><input  type="checkbox" name="interfon" <?php if($tagovi['interfon']){ echo ' checked';}?>/>Interfon</td>
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
                                                <td><input  type="checkbox" name="stan_u_kuci" <?php if($tagovi['stan_u_kuci']){ echo ' checked';}?>/>Stan u kući</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="samostojeca_kuca" <?php if($tagovi['samostojeca_kuca']){ echo ' checked';}?>/>Samostojeća kuća</td>
                                                <td><input  type="checkbox" name="kuca_s_dvoristem" <?php if($tagovi['kuca_s_dvoristem']){ echo ' checked';}?>/>Kuća s dvorištem</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="kucni_ljubimci" <?php if($tagovi['kucni_ljubimci']){ echo ' checked';}?>/>Kućni ljubimci</td>
                                                <td><input  type="checkbox" name="balkon" <?php if($tagovi['balkon']){ echo ' checked';}?>/>Balkon</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="video_nadzor" <?php if($tagovi['video_nadzor']){ echo ' checked';}?>/>Video nadzor</td>
                                                <td><input  type="checkbox" name="alarm" <?php if($tagovi['alarm']){ echo ' checked';}?>/>Alarm</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="basta" <?php if($tagovi['basta']){ echo ' checked';}?>/>Bašta</td>
                                                <td><input  type="checkbox" name="pomocni_objekti" <?php if($tagovi['pomocni_objekti']){ echo ' checked';}?>/>Pomoćni objekti</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="ostava" <?php if($tagovi['ostava']){ echo ' checked';}?>/>Ostava</td>
                                                <td><input  type="checkbox" name="podrum" <?php if($tagovi['podrum']){ echo ' checked';}?>/>podrum</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="opticki_kabl" <?php if($tagovi['opticki_kabl']){ echo ' checked';}?>/>Optički kabl</td>
                                                <td><input  type="checkbox" name="open_space" <?php if($tagovi['open_space']){ echo ' checked';}?>/>Open space</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pristup_za_invalide" <?php if($tagovi['pristup_za_invalide']){ echo ' checked';}?>/>Pristup za invalide</td>
                                                <td><input  type="checkbox" name="lokal_na_ulici" <?php if($tagovi['lokal_na_ulici']){ echo ' checked';}?>/>Lokal na ulici</td>
                                        </tr>
                                        <tr>
                                                <td><input  type="checkbox" name="pravno_lice" <?php if($tagovi['pravno_lice']){ echo ' checked';}?>/>Pravno lice</td>
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
