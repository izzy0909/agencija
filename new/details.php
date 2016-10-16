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

      <div class="site-wrap js-site-wrap">
        <div class="center">
          <div class="container">
            <div class="row">
              <div class="site site--main">
                <!-- BEGIN PROPERTY DETAILS-->
                <div class="property">
                  <h1 class="property__title">#<?php echo $stan[0] . ' - ' . $stan['opstina']; ?><span class="property__city"><?php echo $stan['kategorija'] . ' / ' . $stan['tip'] . ' / ' . $stan['stan_tip']; ?></span></h1>
                  <div class="property__header">
                    <div class="property__price"><strong class="property__price-value"><?=$stan['cena']?>&#8364;</strong></div>
                    <h4 class="property__commision"><?=$lang['details.commision']?>: <strong><?=$stan['provizija']?>%</strong></h4>
                    <div class="property__actions">
                      <button type="button" id="setfavorite" class="btn--default" data-func="<?php if($fav){echo 'remove';} else{echo 'add';}?>" data-id="<?=$stan[0]?>"><i class="fa fa-star"></i><?php if($fav){echo $lang['details.favoriteremove'];} else{ echo $lang['details.favorite'];} ?></button>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="property__slider">
                    <div class="hot__ribon" style="z-index:20;"><?=$lang['hot']?></div>
                                    <div id="properties-thumbs" class="slider slider--small js-slider-thumbs">
                                      <div class="slider__block js-slick-slider">
                                     <?php
                                        $i= 0; 
                                        foreach($slike as $large){
                                          echo '<div class="slider__item slider__item--0">';
                                          echo    '<a href="../admin/slike/watermark_' . $large['naziv'] . '" data-size="1740x960" data-gallery-index="' . $i . '" class="slider__img js-gallery-item">';
                                          echo      '<img data-lazy="../admin/slike/watermark_' . $large['naziv'] . '" src="assets/img/lazy-image.jpg" alt="">';
                                          echo    '</a>';
                                          echo '</div>';
                                          $i++;
                                        }
                                      ?>
                                      </div>
                                    </div>
                                    <div class="slider slider--thumbs">
                                      <div class="slider__wrap">
                                        <div class="slider__block js-slick-slider">
                                        <?php
                                        $i = 0;
                                        foreach($slike as $thumb){
                                          echo '<div data-slide-rel="' . $i . '" class="slider__item slider__item--0  img-width-fix">';
                                          echo '<div class="slider__img"><img data-lazy="../admin/slike/thumb_' . $thumb['naziv'] . '" src="assets/img/lazy-image.jpg" alt=""></div>';
                                          echo '</div>';
                                          $i++;
                                        }
                                        ?>
                                        </div>
                                        <button type="button" class="slider__control slider__control--prev js-slick-prev">
                                          <svg class="slider__control-icon">
                                            <use xlink:href="#icon-arrow-left"></use>
                                          </svg>
                                        </button>
                                        <button type="button" class="slider__control slider__control--next js-slick-next">
                                          <svg class="slider__control-icon">
                                            <use xlink:href="#icon-arrow-right"></use>
                                          </svg>
                                        </button>
                                      </div>
                                    </div>
                  </div>
                  <div class="property__info">
                    <div class="property__info-item"><?=$lang['details.id']?>: <strong> #<?=$stan[0]?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.location']?>: <strong> <?=$stan['opstina']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.type']?>: <strong> <?=$stan['tip']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.streetonly']?>: <strong> <?=$stan['ulica']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.structure']?>: <strong> <?=$stan['stan_tip']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.floor']?>: <strong> <?=$stan['sprat']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.setup']?>: <strong> <?=$stan['namestenost']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.size']?>: <strong> <?=$stan['kvadratura']?> m²</strong></div>
                    <div class="property__info-item"><?=$lang['search.form.heat']?>: <strong> <?=$stan['grejanje']?></strong></div>
                    <div class="property__info-item"><?=$lang['search.form.price']?>: <strong> <?=$stan['cena']?> €</strong></div>
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
                            if($tagovi['frizider']) echo '<li> Frižider</li>';
                            if($tagovi['sporet']) echo '<li> Šporet</li>';
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
                  if(isset($stan['youtube'])){
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
                            <input type="text" name="price_from" id="in-price-from" placeholder="From" data-input-type="from" class="form-control" style="margin-right:10px;" value="<?=$stan['cena']?>">
                            <input type="text" name="price_to" id="in-price-to" placeholder="To" data-input-type="to" class="form-control" style="margin-left:10px;" value="<?=$stan['cena']?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="range_area" class="control-label"><?=$lang['search.form.size']?></label>
                          <div class="search-price-size">
                            <input type="text" name="size_from" id="in-area-from" placeholder="From" data-input-type="from" class="form-control" style="margin-right:10px;" value="<?=$stan['kvadratura']?>" >
                            <input type="text" name="size_to" id="in-area-to" placeholder="To" data-input-type="to" class="form-control" style="margin-left:10px;" value="<?=$stan['kvadratura']?>">
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