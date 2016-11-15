<?php 

$siteurl = 'http://localhost/agencija/new/';
$tempurl = 'agencija/new/';

?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Jevtić nekretnine - Poslovni prostor Beograd, izdavanje stanova Beograd, izdavanje poslovnog prostora u Beogradu, izdavanje kancelarija</title><!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">
    <meta name="keywords" content="nekretnine, stanovi, stan, kuća, izdavanje, prodaja, beograd, srbija, belgrade, serbia, rent, sale, kuće, lokal, magacin, garaza, garaža, poslovni prostor, house, apartment">
    <meta name="author" content="Web Refresh">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <!-- Loading Source Sans Pro font that is used in this theme-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cSource+Sans+Pro:200,400,600,700,900,400italic,700italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <!-- Boostrap and other lib styles-->
    <!-- build:cssvendor-->
    <link rel="stylesheet" href="/<?=$tempurl?>assets/css/vendor.css">
    <!-- endbuild-->
    <!-- Font-awesome lib-->
    <!-- build:cssfontawesome-->
    <link rel="stylesheet" href="/<?=$tempurl?>assets/css/font-awesome.css">
    <!-- endbuild-->
    <!-- Theme styles, please replace "default" with other color scheme from the list available in template/css-->
    <!-- build:csstheme-default-->
    <link rel="stylesheet" href="/<?=$tempurl?>assets/css/theme-blue-orange_red.css">
    <!-- endbuild-->
    <!-- Your styles should go in this file-->
    <link rel="stylesheet" href="/<?=$tempurl?>assets/css/custom.css">
    <link rel="stylesheet" href="/<?=$tempurl?>assets/css/rrssb.css" />
    <!-- Fixes for IE-->
    <!--[if lt IE 11]>
    <link rel="stylesheet" href="assets/css/ie-fix.css"><![endif]-->
    <link rel="icon" href="/<?=$tempurl?>assets/img/favicon.ico" type="image/x-icon">

<?php 
    if($active == 'details'){
        $thumb = prikaziSlikuThumb($stan[0]);
        echo '<meta property="og:title" content="[' . $stan['kategorija'] . '] ' . $stan['tip'] . ': ' . $stan['opstina'] . ', Beograd - Jevtić Nekretnine">' . "\n";
        echo '<meta property="og:description" content="kvadratura: ' . $stan['kvadratura'] . 'm&#13217;, cena: ' . $stan['cena'] . '&#x20AC;">' . "\n";
        echo '<meta property="og:image" content="http://jevticnekretnine.com/../admin/slike/watermark_' . $thumb['naziv'] . '">' . "\n";
        echo '<meta property="og:url" content="http://jevticnekretnine.com">' . "\n";
        echo '<meta property="og:type" content="website">' . "\n";

        echo '<meta name="twitter:card" content="summary">' . "\n";
        echo '<meta name="twitter:title" content="[' . $stan['kategorija'] . '] ' . $stan['tip'] . ': ' . $stan['opstina'] . ', Beograd - Jevtić Nekretnine">' . "\n";
        echo '<meta name="twitter:description" content="kvadratura: ' . $stan['kvadratura'] . 'm&#13217;, cena: ' . $stan['cena'] . '&#x20AC;">' . "\n";
        echo '<meta name="twitter:image" content="http://jevticnekretnine.com/../admin/slike/watermark_' . $thumb['naziv'] . '">' . "\n";
        echo '<meta name="twitter:url" content="http://jevticnekretnine.com">' . "\n";
    }
    else {
        echo '<meta property="og:title" content="JEVTIĆ I.M.J NEKRETNINE d.o.o.">' . "\n";
        echo '<meta property="og:description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">' . "\n";
        echo '<meta property="og:image" content="http;//jevticnekretnine.com/assets/img/logo_large.jpg">' . "\n";
        echo '<meta property="og:url" content="http://jevticnekretnine.com">' . "\n";
        echo '<meta property="og:type" content="website">' . "\n";

        echo '<meta name="twitter:card" content="summary">' . "\n";
        echo '<meta name="twitter:title" content="JEVTIĆ I.M.J NEKRETNINE d.o.o.">' . "\n";
        echo '<meta name="twitter:description" content="Izdavanje i prodaja svih vrsta nekretnina, stanova, kuća, poslovnih prostora, magacina, lokala i garaža u Beogradu">' . "\n";
        echo '<meta name="twitter:image" content="http://jevticnekretnine.com/assets/img/logo_large.jpg">' . "\n";
        echo '<meta name="twitter:url" content="http://jevticnekretnine.com">' . "\n";
    }

?>

    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body class="index menu-default hover-default scroll-animation">
    
    <div class="box js-box">