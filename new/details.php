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
                        <li class="rrssb-whatsapp">
                          <a href="whatsapp://send?text=http://jevticnekretnine.com/detalji/<?php echo $stan[0] . '/' . $stan['kategorija'] . '-' . str_replace(' ', '-', $stan['tip']) . '-' . str_replace(' ', '-', $stan['opstina']) ?>/" data-action="share/whatsapp/share">
                            <span class="rrssb-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90"><path d="M90 43.84c0 24.214-19.78 43.842-44.182 43.842a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.63 21.415 0 45.818 0 70.223 0 90 19.628 90 43.84zM45.818 6.983c-20.484 0-37.146 16.535-37.146 36.86 0 8.064 2.63 15.533 7.076 21.61l-4.64 13.688 14.274-4.537A37.122 37.122 0 0 0 45.82 80.7c20.48 0 37.145-16.533 37.145-36.857S66.3 6.983 45.818 6.983zm22.31 46.956c-.272-.447-.993-.717-2.075-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.36-1.717-.54-2.438.536-.72 1.076-2.797 3.495-3.43 4.212-.632.72-1.263.81-2.347.27-1.082-.536-4.57-1.672-8.708-5.332-3.22-2.848-5.393-6.364-6.025-7.44-.63-1.076-.066-1.657.475-2.192.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.718.182-1.345-.09-1.884-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.793-2.436-1.793-.63 0-1.353-.09-2.075-.09-.722 0-1.896.27-2.89 1.344-.99 1.077-3.788 3.677-3.788 8.964 0 5.288 3.88 10.397 4.422 11.113.54.716 7.49 11.92 18.5 16.223 11.01 4.3 11.01 2.866 12.996 2.686 1.984-.18 6.406-2.6 7.312-5.107.9-2.513.9-4.664.63-5.112z"/></svg>
                            </span>
                            <span class="rrssb-text">Whatsapp</span>
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
                    <form id="searchForm" name="searchForm" action="<?=$stan['kategorija']?>.php" class="form form--flex form--search js-search-form form--sidebar">
                      <div class="row">
                          <div class="form-group">
                            <label for="cat-id" class="control-label"><?=$lang['search.form.cat-id']?></label>
                            <input type="text" id="cat-id" name="cat-id" class="form-control" value="<?=$stan[0]?>">
                          </div>
                        <div class="form-group">
                          <label for="in-contract-type" class="control-label"><?=$lang['search.form.category']?></label>
                          <select id="in-contract-type" data-placeholder="---" class="form-control" disabled>
                            <option label=" "></option>
                            <option value="izdavanje" <?php if($stan['kategorija']=='izdavanje'){echo 'selected';} ?> >Izdavanje</option>
                            <option value="prodaja" <?php if($stan['kategorija']=='prodaja'){echo 'selected';} ?> >Prodaja</option>
                          </select>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.type']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['tip']?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_type_1" name="type[]" type="checkbox" value="Stan" class="in-checkbox" <?php if($stan['tip']=='Stan'){echo 'checked';}?> >
                                  <label for="checkbox_type_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.stan']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_2" name="type[]" type="checkbox" value="Kuća" class="in-checkbox" <?php if($stan['tip']=='Kuća'){echo 'checked';}?> >
                                  <label for="checkbox_type_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.kuca']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_3" name="type[]" type="checkbox" value="Poslovni prostor" class="in-checkbox" <?php if($stan['tip']=='Poslovni prostor'){echo 'checked';}?> >
                                  <label for="checkbox_type_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovniprostor']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_4" name="type[]" type="checkbox" value="Magacin" class="in-checkbox" <?php if($stan['tip']=='Magacin'){echo 'checked';}?> >
                                  <label for="checkbox_type_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.magacin']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_5" name="type[]" type="checkbox" value="Lokal" class="in-checkbox" <?php if($stan['tip']=='Lokal'){echo 'checked';}?> >
                                  <label for="checkbox_type_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.lokal']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_6" name="type[]" type="checkbox" value="Garaža" class="in-checkbox" <?php if($stan['tip']=='Garaža'){echo 'checked';}?> >
                                  <label for="checkbox_type_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.garaza']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_7" name="type[]" type="checkbox" value="Poslovna zgrada" class="in-checkbox" <?php if($stan['tip']=='Poslovna zgrada'){echo 'checked';}?> >
                                  <label for="checkbox_type_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovnazgrada']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.structure']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['stan_tip'];?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_structure_1" name= "structure[]" type="checkbox" value="Garsonjera" class="in-checkbox" <?php if($stan['stan_tip']=='Garsonjera'){echo 'checked';}?> >
                                  <label for="checkbox_structure_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.garsonjera']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_2" name= "structure[]" type="checkbox" value="Jednosoban" class="in-checkbox" <?php if($stan['stan_tip']=='Jednosoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_3" name= "structure[]" type="checkbox" value="Jednoiposoban" class="in-checkbox" <?php if($stan['stan_tip']=='Jednoiposoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_4" name= "structure[]" type="checkbox" value="Dvosoban" class="in-checkbox" <?php if($stan['stan_tip']=='Dvosoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_5" name= "structure[]" type="checkbox" value="Dvoiposoban" class="in-checkbox" <?php if($stan['stan_tip']=='Dvoiposoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_6" name= "structure[]" type="checkbox" value="Trosoban" class="in-checkbox" <?php if($stan['stan_tip']=='Trosoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.trosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_7" name= "structure[]" type="checkbox" value="Troiposoban" class="in-checkbox" <?php if($stan['stan_tip']=='Troiposoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.troiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_8" name= "structure[]" type="checkbox" value="Četvorosoban" class="in-checkbox" <?php if($stan['stan_tip']=='Četvorosoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvorosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_9" name= "structure[]" type="checkbox" value="Četvoroiposoban" class="in-checkbox" <?php if($stan['stan_tip']=='Četvoroiposoban'){echo 'checked';}?> >
                                  <label for="checkbox_structure_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvoroiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_10" name= "structure[]" type="checkbox" value="Petosoban i veći" class="in-checkbox" <?php if($stan['stan_tip']=='Petosoban i veći'){echo 'checked';}?> >
                                  <label for="checkbox_structure_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.petosobaniveci']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.location']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['opstina']?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                              <?php foreach($areas as $lokacija){
                                echo '<li>';
                                echo '<input id="checkbox_location_' . $lokacija['id'] . '" type="checkbox" name="location[]"  value="' . $lokacija['opstina'] . '" class="in-checkbox"'; if($stan['opstina']==$lokacija['opstina']){echo 'checked';} echo '>';
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
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['grejanje']?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_heat_1" type="checkbox" name="heat[]" value="CG" class="in-checkbox" <?php if($stan['grejanje']=='CG'){echo 'checked';}?> >
                                  <label for="checkbox_heat_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.cg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_2" type="checkbox" name="heat[]" value="EG" class="in-checkbox" <?php if($stan['grejanje']=='EG'){echo 'checked';}?> >
                                  <label for="checkbox_heat_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.eg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_3" type="checkbox" name="heat[]" value="TA" class="in-checkbox" <?php if($stan['grejanje']=='TA'){echo 'checked';}?> >
                                  <label for="checkbox_heat_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.ta']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_4" type="checkbox" name="heat[]" navalueme="PG" class="in-checkbox" <?php if($stan['grejanje']=='PG'){echo 'checked';}?> >
                                  <label for="checkbox_heat_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.pg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_5" type="checkbox" name="heat[]" value="Klima uređaj" class="in-checkbox" <?php if($stan['grejanje']=='Klima uređaj'){echo 'checked';}?> >
                                  <label for="checkbox_heat_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.klima']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_6" type="checkbox" name="heat[]" value="Na gas" class="in-checkbox" <?php if($stan['grejanje']=='Na gas'){echo 'checked';}?> >
                                  <label for="checkbox_heat_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.gas']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_7" type="checkbox" name="heat[]" value="Na struju" class="in-checkbox" <?php if($stan['grejanje']=='Na struju'){echo 'checked';}?> >
                                  <label for="checkbox_heat_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.struja']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_8" type="checkbox" name="heat[]" value="Norveški radijatori" class="in-checkbox" <?php if($stan['grejanje']=='Norveški radijatori'){echo 'checked';}?> >
                                  <label for="checkbox_heat_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.norveski']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_9" type="checkbox" name="heat[]" value="Mermerni radijatori" class="in-checkbox" <?php if($stan['grejanje']=='Mermerni radijatori'){echo 'checked';}?> >
                                  <label for="checkbox_heat_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.mermerni']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.setup']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['namestenost']?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_setup_1" type="checkbox" name="setup[]" value="Namešten" class="in-checkbox" <?php if($stan['namestenost']=='Namešten'){echo 'checked';}?> >
                                  <label for="checkbox_setup_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.yes']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_3" type="checkbox" name="setup[]" value="Polunamešten" class="in-checkbox" <?php if($stan['namestenost']=='Polunamešten'){echo 'checked';}?> >
                                  <label for="checkbox_setup_3" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.half']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_2" type="checkbox" name="setup[]" value="Nenamešten" class="in-checkbox" <?php if($stan['namestenost']=='Nenamešten'){echo 'checked';}?> >
                                  <label for="checkbox_setup_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.no']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.floor']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?=$stan['sprat']?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_floor_1" type="checkbox" name="floor[]" value="Suteren" class="in-checkbox" <?php if($stan['sprat']=='Suteren'){echo 'checked';}?> >
                                  <label for="checkbox_floor_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.suteren']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_2" type="checkbox" name="floor[]" value="Prizemlje" class="in-checkbox" <?php if($stan['sprat']=='Prizemlje'){echo 'checked';}?> >
                                  <label for="checkbox_floor_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.prizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_25" type="checkbox" name="floor[]" value="Visoko prizemlje" class="in-checkbox" <?php if($stan['sprat']=='Visoko prizemlje'){echo 'checked';}?> >
                                  <label for="checkbox_floor_25" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.visokoprizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_3" type="checkbox" name="floor[]" value="1. sprat" class="in-checkbox" <?php if($stan['sprat']=='1. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s1']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_4" type="checkbox" name="floor[]" value="2. sprat" class="in-checkbox" <?php if($stan['sprat']=='2. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s2']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_5" type="checkbox" name="floor[]" value="3. sprat" class="in-checkbox" <?php if($stan['sprat']=='3. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s3']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_6" type="checkbox" name="floor[]" value="4. sprat" class="in-checkbox" <?php if($stan['sprat']=='4. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s4']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_7" type="checkbox" name="floor[]" value="5. sprat" class="in-checkbox" <?php if($stan['sprat']=='5. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s5']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_8" type="checkbox" name="floor[]" value="6. sprat" class="in-checkbox" <?php if($stan['sprat']=='6. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s6']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_9" type="checkbox" name="floor[]" value="7. sprat" class="in-checkbox" <?php if($stan['sprat']=='7. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s7']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_10" type="checkbox" name="floor[]" value="8. sprat" class="in-checkbox" <?php if($stan['sprat']=='8. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s8']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_11" type="checkbox" name="floor[]" value="9. sprat" class="in-checkbox" <?php if($stan['sprat']=='9. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_11" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s9']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_12" type="checkbox" name="floor[]" value="10. sprat" class="in-checkbox" <?php if($stan['sprat']=='10. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_12" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_13" type="checkbox" name="floor[]" value="11. sprat" class="in-checkbox" <?php if($stan['sprat']=='11. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_13" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_14" type="checkbox" name="floor[]" value="12. sprat" class="in-checkbox" <?php if($stan['sprat']=='12. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_14" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_15" type="checkbox" name="floor[]" value="13. sprat" class="in-checkbox" <?php if($stan['sprat']=='13. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_15" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_16" type="checkbox" name="floor[]" value="14. sprat" class="in-checkbox" <?php if($stan['sprat']=='14. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_16" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_17" type="checkbox" name="floor[]" value="15. sprat" class="in-checkbox" <?php if($stan['sprat']=='15. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_17" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_18" type="checkbox" name="floor[]" value="16. sprat" class="in-checkbox" <?php if($stan['sprat']=='16. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_18" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_19" type="checkbox" name="floor[]" value="17. sprat" class="in-checkbox" <?php if($stan['sprat']=='17. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_19" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_20" type="checkbox" name="floor[]" value="18. sprat" class="in-checkbox" <?php if($stan['sprat']=='18. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_20" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_21" type="checkbox" name="floor[]" value="19. sprat" class="in-checkbox" <<?php if($stan['sprat']=='19. sprat'){echo 'checked';}?> >
                                  <label for="checkbox_floor_21" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_22" type="checkbox" name="floor[]" value="20. sprat i više" class="in-checkbox" <?php if($stan['sprat']=='20. sprat i više'){echo 'checked';}?> >
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
                            <input type="text" name="price_from" id="in-price-from" placeholder="From" data-input-type="from" class="form-control" style="margin-right:10px;" value="">
                            <input type="text" name="price_to" id="in-price-to" placeholder="To" data-input-type="to" class="form-control" style="margin-left:10px;" value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="range_area" class="control-label"><?=$lang['search.form.size']?></label>
                          <div class="search-price-size">
                            <input type="text" name="size_from" id="in-area-from" placeholder="From" data-input-type="from" class="form-control" style="margin-right:10px;" value="" >
                            <input type="text" name="size_to" id="in-area-to" placeholder="To" data-input-type="to" class="form-control" style="margin-left:10px;" value="">
                          </div>
                        </div>
                        <div class="form__buttons form__buttons--double">
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