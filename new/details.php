<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stan = prikaziStanZaFront($id);
    if(!$stan){
        header('Location: index.php');
      // die('aaa');

    }
    $tagovi = ispisiDodatneTagove($id);
    $slike = prikaziSlike($id, 'velika');
}
else{
  // die('bbb');
    header('Location: index.php');
}


require_once 'lang/' . checkLang() . '.php';


$active = 'details';
$areas = prikaziSveOpstine();

$similar = getSimilarProperties($stan[0], $stan['kategorija'], $stan['tip'], $stan['lokacija_id'], $stan['cena']);

$fav = 0;
if(isset($_COOKIE['jevtic_favorites'])){
  $favorites = $_COOKIE['jevtic_favorites'];
  if(stripos($favorites, ',')){        // ako ima vise id-eva

    if(stripos($favorites, $stan[0])===0 || stripos($favorites, $stan[0])>0) {
      $fav = 1;
    }
  }

  else{ // ako je samo jedan
    if($favorites == $stan[0]){
      $fav = 1;
    }
  }
}

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <!-- <ol class="indicator"></ol> -->
</div>

      <div class="site-wrap js-site-wrap">
        <div class="center">
          <div class="container">
            <div class="row">
              <div class="site site--main">
                <!-- BEGIN PROPERTY DETAILS-->
                <div class="property">
                  <h1 class="property__title">#<?php echo $stan[0] . ' - ' . $stan['opstina']; ?>
                  <span class="pdf"><a href="/<?=$tempurl?>pdf/<?=$stan[0]?>/" target="_blank"><img src="/<?=$tempurl?>assets/img/pdf.png" /></a></span>
                  </h1>
                  <div class="property__header">
                    <div>
                      <ul class="rrssb-buttons">
                        <li class="rrssb-facebook">
                          <a href="https://www.facebook.com/sharer/sharer.php?u=http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/" class="popup">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg>
                            </span>
                            <span class="rrssb-text">facebook</span>
                          </a>
                        </li>
                        <li class="rrssb-twitter">
                          <a href="https://twitter.com/intent/tweet?text=http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/"
                          class="popup">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg>
                            </span>
                            <span class="rrssb-text">twitter</span>
                          </a>
                        </li>
                        <li class="rrssb-googleplus">
                          <!-- Replace href with your meta and URL information.  -->
                          <a href="https://plus.google.com/share?url=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are%20http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/" class="popup">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"/></svg>            </span>
                            <span class="rrssb-text">google+</span>
                          </a>
                        </li>
                        <li class="rrssb-linkedin">
                          <!-- Replace href with your meta and URL information -->
                          <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/" class="popup">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M25.424 15.887v8.447h-4.896v-7.882c0-1.98-.71-3.33-2.48-3.33-1.354 0-2.158.91-2.514 1.802-.13.315-.162.753-.162 1.194v8.216h-4.9s.067-13.35 0-14.73h4.9v2.087c-.01.017-.023.033-.033.05h.032v-.05c.65-1.002 1.812-2.435 4.414-2.435 3.222 0 5.638 2.106 5.638 6.632zM5.348 2.5c-1.676 0-2.772 1.093-2.772 2.54 0 1.42 1.066 2.538 2.717 2.546h.032c1.71 0 2.77-1.132 2.77-2.546C8.056 3.593 7.02 2.5 5.344 2.5h.005zm-2.48 21.834h4.896V9.604H2.867v14.73z"/></svg>
                            </span>
                            <span class="rrssb-text">linkedin</span>
                          </a>
                        </li>
                        <li class="rrssb-viber">
                          <a href="viber://forward?text=http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/" data-action="share/viber/share">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 322 322" style="enable-background:new 0 0 322 322;" xml:space="preserve">
                              <g id="XMLID_7_">
                                <path id="XMLID_8_" d="M275.445,135.123c0.387-45.398-38.279-87.016-86.192-92.771c-0.953-0.113-1.991-0.285-3.09-0.467
                                  c-2.372-0.393-4.825-0.797-7.3-0.797c-9.82,0-12.445,6.898-13.136,11.012c-0.672,4-0.031,7.359,1.902,9.988
                                  c3.252,4.422,8.974,5.207,13.57,5.836c1.347,0.186,2.618,0.359,3.682,0.598c43.048,9.619,57.543,24.742,64.627,67.424
                                  c0.173,1.043,0.251,2.328,0.334,3.691c0.309,5.102,0.953,15.717,12.365,15.717h0.001c0.95,0,1.971-0.082,3.034-0.244
                                  c10.627-1.615,10.294-11.318,10.134-15.98c-0.045-1.313-0.088-2.555,0.023-3.381C275.429,135.541,275.444,135.332,275.445,135.123z
                                  "/>
                                <path id="XMLID_9_" d="M176.077,25.688c1.275,0.092,2.482,0.18,3.487,0.334c70.689,10.871,103.198,44.363,112.207,115.605
                                  c0.153,1.211,0.177,2.688,0.202,4.252c0.09,5.566,0.275,17.145,12.71,17.385l0.386,0.004c3.9,0,7.002-1.176,9.221-3.498
                                  c3.871-4.049,3.601-10.064,3.383-14.898c-0.053-1.186-0.104-2.303-0.091-3.281C318.481,68.729,255.411,2.658,182.614,0.201
                                  c-0.302-0.01-0.59,0.006-0.881,0.047c-0.143,0.021-0.408,0.047-0.862,0.047c-0.726,0-1.619-0.063-2.566-0.127
                                  C177.16,0.09,175.862,0,174.546,0c-11.593,0-13.797,8.24-14.079,13.152C159.817,24.504,170.799,25.303,176.077,25.688z"/>
                                <path id="XMLID_10_" d="M288.36,233.703c-1.503-1.148-3.057-2.336-4.512-3.508c-7.718-6.211-15.929-11.936-23.87-17.473
                                  c-1.648-1.148-3.296-2.297-4.938-3.449c-10.172-7.145-19.317-10.617-27.957-10.617c-11.637,0-21.783,6.43-30.157,19.109
                                  c-3.71,5.621-8.211,8.354-13.758,8.354c-3.28,0-7.007-0.936-11.076-2.783c-32.833-14.889-56.278-37.717-69.685-67.85
                                  c-6.481-14.564-4.38-24.084,7.026-31.832c6.477-4.396,18.533-12.58,17.679-28.252c-0.967-17.797-40.235-71.346-56.78-77.428
                                  c-7.005-2.576-14.365-2.6-21.915-0.06c-19.02,6.394-32.669,17.623-39.475,32.471C2.365,64.732,2.662,81.578,9.801,99.102
                                  c20.638,50.666,49.654,94.84,86.245,131.293c35.816,35.684,79.837,64.914,130.839,86.875c4.597,1.978,9.419,3.057,12.94,3.844
                                  c1.2,0.27,2.236,0.5,2.991,0.707c0.415,0.113,0.843,0.174,1.272,0.178l0.403,0.002c0.001,0,0,0,0.002,0
                                  c23.988,0,52.791-21.92,61.637-46.91C313.88,253.209,299.73,242.393,288.36,233.703z"/>
                                <path id="XMLID_11_" d="M186.687,83.564c-4.107,0.104-12.654,0.316-15.653,9.021c-1.403,4.068-1.235,7.6,0.5,10.498
                                  c2.546,4.252,7.424,5.555,11.861,6.27c16.091,2.582,24.355,11.48,26.008,28c0.768,7.703,5.955,13.082,12.615,13.082h0.001
                                  c0.492,0,0.995-0.029,1.496-0.09c8.01-0.953,11.893-6.838,11.542-17.49c0.128-11.117-5.69-23.738-15.585-33.791
                                  C209.543,88.98,197.574,83.301,186.687,83.564z"/>
                              </g>
                              </svg>
                            </span>
                            <span class="rrssb-text">Viber</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <br />
                    <div class="property__price"><strong class="property__price-value"><?=$stan['cena']?>&#8364;</strong></div>
                    <h4 class="property__commision">
                      <?=$lang['details.commision']?>:
                    <?php if(!empty($stan['provizija']) && $stan['provizija'] != 0) { ?>
                      <strong><?=$stan['provizija']?>%</strong>
                    <?php } else { ?>
                      <strong>50%</strong>
                    <?php } ?>
                    </h4>
                    <div class="property__actions">
                      <button type="button" id="setfavorite" class="btn--default" data-func="<?php if($fav){echo 'remove';} else{echo 'add';}?>" data-id="<?=$stan[0]?>"><i class="fa fa-star"></i><?php if($fav){echo $lang['details.favoriteremove'];} else{ echo $lang['details.favorite'];} ?></button>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="slajder">
                      <div id="sync1" class="owl-carousel">
                        <?php 
                            $i = 0;
                            foreach($slike as $large){
                              echo '<div class="item">';
                              echo '<a href="/' . $tempurl . '../admin/slike/watermark_' . $large['naziv'] . '" class="galleryx" ><img src="/' . $tempurl . '../admin/slike/watermark_' . $large['naziv'] . '" alt=""></a></div>';
                              $i++;
                            }

                        ?>
                      </div>
                      <div class="slajder-footer">
                      <button type="button" class="owl-arrow owl-arrow-left slider__control--prev js-slick-prev slick-arrow"></button>
                        <div id="sync2" clas="owl-carousel">
                          <?php 
                              foreach($slike as $large){
                                echo '<div class="item">';
                                echo '<img src="/' . $tempurl . '../admin/slike/thumb_' . $large['naziv'] . '" alt=""></div>';
                              }

                          ?>
                        </div>  
                      <button type="button" class="owl-arrow owl-arrow-right slider__control--next js-slick-next slick-arrow"></button>
                      </div>
                  </div>
                  <div class="property__plan">
<!--                     <dl class="property__plan-item">
                      <dt class="property__plan-icon">
                        <svg>
                          <use xlink:href="#icon-money-save"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title"><?=$lang['search.form.price']?></dd>
                      <dd class="property__plan-value"><?=$stan['cena']?>&#8364;</dd>
                    </dl> -->
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon">
                        <svg>
                          <use xlink:href="#icon-area"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title"><?=$lang['search.form.size']?></dd>
                      <dd class="property__plan-value"><?=$stan['kvadratura']?>m²</dd>
                    </dl>
                    <dl class="property__plan-item garsonjerafix">
                      <dt class="property__plan-icon property__plan-icon--window">
                        <svg>
                          <use xlink:href="#icon-window"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title sobefix">
                      <?php
                        if($stan['stan_tip']=='Spratna kuća' || $stan['stan_tip']=='Kuća u osnovi') {echo $lang['search.form.structure'];}
                        else echo $lang['search.form.structure.brsoba'];
                        ?>
                      </dd>
                      <dd class="property__plan-value">
                      <?php
                        switch($stan['stan_tip']){
                          case 'Garsonjera': echo '0.5'; break;
                          case 'Jednosoban': echo '1.0'; break;
                          case 'Jednoiposoban': echo '1.5'; break;
                          case 'Dvosoban': echo '2.0'; break;
                          case 'Dvoiposoban': echo '2.5'; break;
                          case 'Trosoban': echo '3.0'; break;
                          case 'Troiposoban': echo '3.5'; break;
                          case 'Četvorosoban': echo '4.0'; break;
                          case 'Četvoroiposoban': echo '4.5'; break;
                          case 'Petosoban i veći': echo '5.0'; break;
                          default: echo $stan['stan_tip']; break;
                        }
                      ?>
                        
                      </dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon property__plan-icon--bathrooms">
<!--                         <svg>
                          <use xlink:href="#icon-bathrooms"></use>
                        </svg> -->
                        <img style="margin-top:25px; margin-bottom:4px;" src="/<?=$tempurl?>assets/img/parking.png" />
                      </dt>
                      <dd class="property__plan-title"><?=$lang['search.form.zoneparking']?></dd>
                      <dd class="property__plan-value">
                      <?php 
                      switch($stan['zonski_parking']){
                        case "Zona 1": echo '1'; break;
                        case "Zona 2": echo '2'; break;
                        case "Zona 3": echo '3'; break;
                        default: echo '/';
                      }
                      ?>
                        
                      </dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon">
<!--                         <svg>
                          <use xlink:href="#icon-garage"></use>
                        </svg> -->
                        <img style="margin-top:25px; margin-bottom:4px;" src="/<?=$tempurl?>assets/img/parking.png" />
                      </dt>
                      <dd class="property__plan-title"><?=$lang['search.form.parkingspots']?></dd>
                      <dd class="property__plan-value"><?php if(isset($stan['br_parking_mesta']) && $stan['br_parking_mesta']>0) echo $stan['br_parking_mesta']; else echo '/'; ?></dd>
                    </dl>
                  </div>
                  <div class="property__info">
                    <div class="property__info-item"><?=$lang['details.id']?>: <strong> #<?=$stan[0]?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.location']?>: <strong> <?=$stan['opstina']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.type2']?>: <strong> <?=$stan['tip']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.floor']?>: <strong> <?=$stan['sprat']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.setup']?>: <strong> <?=$stan['namestenost']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.size']?>: <strong> <?=$stan['kvadratura']?> m²</strong></div>
                    <div class="property__info-item"><?=$lang['search.form.heat']?>: <strong> <?=$stan['grejanje']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.price']?>: <strong> <?=$stan['cena']?> €</strong></div>
                    <div class="property__info-item"></div>
                    <div class="property__info-item"><?=$lang['details.commision']?>: <strong><?=$stan['provizija']?>%</strong></div>
                    
                    
                  </div>
                  <div class="property__params">
                    <h4 class="property__subtitle"><?=$lang['details.amenities']?></h4>
                    <ul class="property__params-list property__params-list--options">
                      <?php
                            if($tagovi['kablovska']) echo '<li> Kablovska</li>';
                            if($tagovi['tv']) echo '<li> TV</li>';
                            if($tagovi['klima']) echo '<li> Klima</li>';
                            if($tagovi['internet']) echo '<li> Internet</li>';
                            if($tagovi['telefon']) echo '<li> Telefon</li>';
                            if($tagovi['ves_masina']) echo '<li> Veš mašina</li>';
                            if($tagovi['kuhinjski_elementi']) echo '<li> Kuhinjski elementi</li>';
                            if($tagovi['plakari']) echo '<li> Plakari</li>';
                            if($tagovi['interfon']) echo '<li> Interfon</li>';
                            if($tagovi['lift']) echo '<li> Lift</li>';
                            if($tagovi['bazen']) echo '<li> Bazen</li>';
                            if($tagovi['garaza']) echo '<li> Garaža</li>';
                            if($tagovi['parking']) echo '<li> Parking</li>';
                            if($tagovi['dvoriste']) echo '<li> Dvorište</li>';
                            if($tagovi['potkrovlje']) echo '<li> Potkrovlje</li>';
                            if($tagovi['terasa']) echo '<li> Terasa</li>';
                            if($tagovi['novogradnja']) echo '<li> Novogradnja</li>';
                            if($tagovi['renovirano']) echo '<li> Renovirano</li>';
                            if($tagovi['lux']) echo '<li> Lux</li>';
                            if($tagovi['penthaus']) echo '<li> Penthaus</li>';
                            if($tagovi['salonski']) echo '<li> Salonski</li>';
                            if($tagovi['lodja']) echo '<li> Lođa</li>';
                            if($tagovi['duplex']) echo '<li> Duplex</li>';
                            if($tagovi['nov_namestaj']) echo '<li> Nov nameštaj</li>';
                            if($tagovi['kompjuterska_mreza']) echo '<li> Komp. mreža</li>';
                            if($tagovi['dva_kupatila']) echo '<li> Dva kupatila</li>';
                            if($tagovi['vise_telefonskih_linija']) echo '<li> Više tele. linija</li>';
                            if($tagovi['stan_u_kuci']) echo '<li> Stan u kući</li>';
                            if($tagovi['samostojeca_kuca']) echo '<li> Samostojeća kuća</li>';
                            if($tagovi['kuca_s_dvoristem']) echo '<li> Kuća s dvorištem</li>';
                            if($tagovi['kucni_ljubimci']) echo '<li> Kućni ljubimci</li>';
                            if($tagovi['video_nadzor']) echo '<li> Video nadzor</li>';
                            if($tagovi['alarm']) echo '<li> Alarm</li>';
                            if($tagovi['basta']) echo '<li> Bašta</li>';
                            if($tagovi['pomocni_objekti']) echo '<li> Pomoćni objekti</li>';
                            if($tagovi['ostava']) echo '<li> Ostava</li>';
                            if($tagovi['podrum']) echo '<li> Podrum</li>';
                            if($tagovi['opticki_kabl']) echo '<li> Optički kabl</li>';
                            if($tagovi['open_space']) echo '<li> Open space</li>';
                            if($tagovi['pristup_za_invalide']) echo '<li> Pristup za invalide</li>';
                            if($tagovi['lokal_na_ulici']) echo '<li> Lokal na ulici</li>';
                            if($tagovi['pravno_lice']) echo '<li> Pravno lice</li>';
                      ?>
                    </ul>
                  </div>
                  <div class="property__description js-unhide-block">
                    <h4 class="property__subtitle"><?=$lang['search.form.description']?></h4>
                    <div class="">
                      <p><?=$stan['opis']?>
                      </p>
                    </div>
                    <button type="button" class="property__btn-more js-unhide"><?=$lang['details.moreinfo']?></button>
                  </div>
                  <?php
                  if(isset($stan['youtube']) && $stan['youtube']!=''){
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $stan['youtube'], $matches);
                    $embed = $matches[1];

                    echo '<div class="widget js-widget widget--details">';
                    echo    '<div class="widget__content">';
                    echo        '<div class="property__youtube">';
                    echo            '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $embed . '?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
                    echo        '</div>';
                    echo    '</div>';
                    echo '</div>';
                  }
                  ?>
                  <div class="widget js-widget widget--details">
                    <div class="widget__content">
                      <div class="map map--properties">
                        <div class="map__buttons">
                          <button type="button" class="map__change-map js-map-btn active"><?=$lang['details.map']?></button>
                          <button type="button" class="map__change-panorama js-panorama-btn">Street view</button>
                        </div>
                        <div class="map__wrap">
                          <div data-type="map" class="map__view js-map-canvas"></div>
                          <div data-type="panorama" class="map__view map__view--panorama js-map-canvas"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of block .property-->
                <!-- END PROPERTY DETAILS-->
              </div>
              <!-- BEGIN SIDEBAR-->
              <div class="sidebar">
                <div class="widget js-widget widget--sidebar">
                  <div class="widget__header">
                    <h2 class="widget__title"><?=$lang['search.title']?></h2>
                    <h5 class="widget__headline"><?=$lang['search.subtitle']?>.</h5><a class="widget__btn js-widget-btn widget__btn--toggle"><?=$lang['search.showfilter']?></a>
                  </div>
                  <div class="widget__content">
                    <!-- BEGIN SEARCH-->
                    <form id="searchForm" name="searchForm" action="/<?php echo $tempurl . $stan['kategorija'];?>/" method="POST" class="form form--flex form--search js-search-form form--sidebar">
                      <div class="row">
                          <div class="form-group">
                            <label for="cat-id" class="control-label"><?=$lang['search.form.cat-id']?></label>
                            <input type="text" id="cat-id" name="cat-id" class="form-control">
                          </div>
                        <div class="form-group">
                          <label for="in-contract-type" class="control-label"><?=$lang['search.form.category']?></label>
                          <select id="in-contract-type" data-placeholder="---" class="form-control catfix">
                            <option value="izdavanje" <?php if($stan['kategorija']=='izdavanje'){echo 'selected';} ?> >Izdavanje</option>
                            <option value="prodaja" <?php if($stan['kategorija']=='prodaja'){echo 'selected';} ?> >Prodaja</option>
                          </select>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.type']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_type_1" name="type[]" type="checkbox" value="Stan" class="in-checkbox">
                                  <label for="checkbox_type_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.stan']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_2" name="type[]" type="checkbox" value="Kuća" class="in-checkbox" >
                                  <label for="checkbox_type_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.kuca']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_3" name="type[]" type="checkbox" value="Poslovni prostor" class="in-checkbox" >
                                  <label for="checkbox_type_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovniprostor']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_4" name="type[]" type="checkbox" value="Magacin" class="in-checkbox" >
                                  <label for="checkbox_type_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.magacin']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_5" name="type[]" type="checkbox" value="Lokal" class="in-checkbox">
                                  <label for="checkbox_type_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.lokal']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_6" name="type[]" type="checkbox" value="Garaža" class="in-checkbox" >
                                  <label for="checkbox_type_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.garaza']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_7" name="type[]" type="checkbox" value="Poslovna zgrada" class="in-checkbox" >
                                  <label for="checkbox_type_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovnazgrada']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.structure']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_structure_1" name= "structure[]" type="checkbox" value="Garsonjera" class="in-checkbox" >
                                  <label for="checkbox_structure_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.garsonjera']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_2" name= "structure[]" type="checkbox" value="Jednosoban" class="in-checkbox" >
                                  <label for="checkbox_structure_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_3" name= "structure[]" type="checkbox" value="Jednoiposoban" class="in-checkbox" >
                                  <label for="checkbox_structure_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_4" name= "structure[]" type="checkbox" value="Dvosoban" class="in-checkbox" >
                                  <label for="checkbox_structure_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_5" name= "structure[]" type="checkbox" value="Dvoiposoban" class="in-checkbox" >
                                  <label for="checkbox_structure_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_6" name= "structure[]" type="checkbox" value="Trosoban" class="in-checkbox" >
                                  <label for="checkbox_structure_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.trosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_7" name= "structure[]" type="checkbox" value="Troiposoban" class="in-checkbox" >
                                  <label for="checkbox_structure_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.troiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_8" name= "structure[]" type="checkbox" value="Četvorosoban" class="in-checkbox" >
                                  <label for="checkbox_structure_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvorosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_9" name= "structure[]" type="checkbox" value="Četvoroiposoban" class="in-checkbox" >
                                  <label for="checkbox_structure_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvoroiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_10" name= "structure[]" type="checkbox" value="Petosoban i veći" class="in-checkbox" >
                                  <label for="checkbox_structure_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.petosobaniveci']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.location']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                              <?php foreach($areas as $lokacija){
                                echo '<li>';
                                echo '<input id="checkbox_location_' . $lokacija['id'] . '" type="checkbox" name="location[]"  value="' . $lokacija['opstina'] . '" class="in-checkbox">';
                                echo '<label for="checkbox_location_' . $lokacija['id'] . '" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label">' . $lokacija['opstina'] . '</label>';
                                echo '</li>';
                              };
                              ?>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.heat']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_heat_1" type="checkbox" name="heat[]" value="CG" class="in-checkbox" >
                                  <label for="checkbox_heat_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.cg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_2" type="checkbox" name="heat[]" value="EG" class="in-checkbox" >
                                  <label for="checkbox_heat_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.eg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_3" type="checkbox" name="heat[]" value="TA" class="in-checkbox" >
                                  <label for="checkbox_heat_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.ta']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_4" type="checkbox" name="heat[]" navalueme="PG" class="in-checkbox" >
                                  <label for="checkbox_heat_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.pg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_5" type="checkbox" name="heat[]" value="Klima uređaj" class="in-checkbox" >
                                  <label for="checkbox_heat_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.klima']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_6" type="checkbox" name="heat[]" value="Na gas" class="in-checkbox" >
                                  <label for="checkbox_heat_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.gas']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_7" type="checkbox" name="heat[]" value="Na struju" class="in-checkbox" >
                                  <label for="checkbox_heat_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.struja']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_8" type="checkbox" name="heat[]" value="Norveški radijatori" class="in-checkbox" >
                                  <label for="checkbox_heat_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.norveski']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_9" type="checkbox" name="heat[]" value="Mermerni radijatori" class="in-checkbox" >
                                  <label for="checkbox_heat_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.mermerni']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.setup']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_setup_1" type="checkbox" name="setup[]" value="Namešten" class="in-checkbox" >
                                  <label for="checkbox_setup_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.yes']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_3" type="checkbox" name="setup[]" value="Polunamešten" class="in-checkbox" >
                                  <label for="checkbox_setup_3" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.half']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_2" type="checkbox" name="setup[]" value="Nenamešten" class="in-checkbox" >
                                  <label for="checkbox_setup_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.no']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.floor']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_floor_1" type="checkbox" name="floor[]" value="Suteren" class="in-checkbox" >
                                  <label for="checkbox_floor_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.suteren']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_2" type="checkbox" name="floor[]" value="Prizemlje" class="in-checkbox" >
                                  <label for="checkbox_floor_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.prizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_25" type="checkbox" name="floor[]" value="Visoko prizemlje" class="in-checkbox" >
                                  <label for="checkbox_floor_25" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.visokoprizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_3" type="checkbox" name="floor[]" value="1. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s1']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_4" type="checkbox" name="floor[]" value="2. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s2']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_5" type="checkbox" name="floor[]" value="3. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s3']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_6" type="checkbox" name="floor[]" value="4. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s4']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_7" type="checkbox" name="floor[]" value="5. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s5']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_8" type="checkbox" name="floor[]" value="6. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s6']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_9" type="checkbox" name="floor[]" value="7. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s7']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_10" type="checkbox" name="floor[]" value="8. sprat" class="in-checkbox"  >
                                  <label for="checkbox_floor_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s8']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_11" type="checkbox" name="floor[]" value="9. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_11" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s9']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_12" type="checkbox" name="floor[]" value="10. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_12" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_13" type="checkbox" name="floor[]" value="11. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_13" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_14" type="checkbox" name="floor[]" value="12. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_14" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_15" type="checkbox" name="floor[]" value="13. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_15" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_16" type="checkbox" name="floor[]" value="14. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_16" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_17" type="checkbox" name="floor[]" value="15. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_17" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_18" type="checkbox" name="floor[]" value="16. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_18" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_19" type="checkbox" name="floor[]" value="17. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_19" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_20" type="checkbox" name="floor[]" value="18. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_20" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_21" type="checkbox" name="floor[]" value="19. sprat" class="in-checkbox" >
                                  <label for="checkbox_floor_21" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_22" type="checkbox" name="floor[]" value="20. sprat i više" class="in-checkbox" >
                                  <label for="checkbox_floor_22" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="range_price" class="control-label"><?=$lang['search.form.price']?></label>
                          <div class="search-price-size">
                            <input type="text" name="price_from" id="in-price-from" placeholder="<?=$lang['search.form.from']?>" data-input-type="from" class="form-control" style="margin-right:10px;" value="">
                            <input type="text" name="price_to" id="in-price-to" placeholder="<?=$lang['search.form.to']?>" data-input-type="to" class="form-control" style="margin-left:10px;" value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="range_area" class="control-label"><?=$lang['search.form.size']?></label>
                          <div class="search-price-size">
                            <input type="text" name="size_from" id="in-area-from" placeholder="<?=$lang['search.form.from']?>" data-input-type="from" class="form-control" style="margin-right:10px;" value="" >
                            <input type="text" name="size_to" id="in-area-to" placeholder="<?=$lang['search.form.to']?>" data-input-type="to" class="form-control" style="margin-left:10px;" value="">
                          </div>
                        </div>
                        <div class="form__buttons form__buttons--double">
                        <input type="hidden" name="pretraga" value="1" />
                          <button type="button" class="form__reset js-form-reset"><?=$lang['search.form.reset']?></button>
                          <button type="submit" name="search" value="1" class="form__submit"><?=$lang['search.form.search']?></button>
                        </div>
                      </div>
                    </form>
                    <input type="hidden" class="map-address" data-address="<?php echo $stan['ulica'] . ', ' . $stan['opstina']; ?>">
                    <input type="hidden" class="map-info" data-info="<?php echo ucfirst($stan['kategorija']) . ', ' . $stan['tip'] . ', ', $stan['opstina'] . ', ' . $stan['ulica']; ?>">
                    <!-- end of block-->
                    <!-- END SEARCH-->
                  </div>
                </div>
              </div>
              <!-- END SIDEBAR-->
              <div class="clearfix"></div>
              <div class="container">
                <div class="widget js-widget widget--landing widget--collapsing">
                  <div class="widget__header">
                    <h2 class="widget__title"><?php if(!empty($similar)){echo $lang['details.similar']; }?></h2><a class="widget__btn js-widget-btn widget__btn--toggle"><?php if(!empty($similar)){echo $lang['details.showsimilar']; }?></a>
                  </div>
                  <div class="widget__content">
                    <div class="listing listing--grid listing--lg-4">


                  <?php 

                  foreach($similar as $item){
                    $thumb = prikaziSlikuThumb($item[0]);
                    echo '<div class="listing__item">';
                    echo    '<div class="properties properties--grid">';
                    echo        '<div class="properties__thumb"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" class="item-photo"><div class="thumb-div" style="background-image:url(/../admin/slike/watermark_' . $thumb['naziv'] . ');">';
                    echo        '<figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">' . $item['kvadratura'] . ' m²</span><span class="properties__intro">' . kratakOpis($item['opis']) . '...</span></figure>';
                    echo        '</div></a><span class="properties__ribon">' . $item['kategorija'] . '</span></div>';
                    //    <!-- end of block .properties__thumb-->
                    echo        '<div class="properties__details">';
                    echo            '<div class="properties__info"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" class="properties__address"><span class="properties__address-street">#' . $item['0'] . ' - ' . $item['opstina'] .'</span><span class="properties__address-city">' . $item['namestenost'] . '</span></a>';
                    echo                '<div class="properties__offer">';
                    echo                    '<div class="properties__offer-column">';
                    echo                        '<div class="properties__offer-label">' . ($item['tip'] == 'Stan' ? $item['stan_tip'] : '&nbsp;') . '</div>';
                    echo                        '<div class="properties__offer-value"><strong>' . $item['tip'] . '</strong></div>';
                    echo                    '</div>';
                    echo                    '<div class="properties__offer-column">';
                    echo                        '<div class="properties__offer-value"><strong>' . $item['cena'] . '</strong><span class="properties__offer-period">&#8364;</span></div>';
                    echo                    '</div>';
                    echo                '</div>';
                    echo           '</div>';
                    echo        '</div>';
                    // <!-- end of block .properties__info-->
                    echo    '</div>';
                    //  <!-- end of block .properties__item-->
                    echo '</div>';
                  }
                  ?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END CENTER SECTION-->
        <!-- BEGIN AFTER CENTER SECTION-->
        <!-- END AFTER CENTER SECTION-->
        <!-- BEGIN FOOTER-->

<?php 

include_once 'parts/footer.php';
include_once 'parts/html-close.php';



?>