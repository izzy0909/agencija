<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'home';
$areas = prikaziSveOpstine();

$recent = getRecent();
$featured = getFeatured();
$stats = getStats();

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>

      <div class="site-wrap js-site-wrap">
        <div class="widget js-widget">
          <div class="widget__content">
            <div class="banner js-banner banner--wide">
              <div style="background-image: url(&quot;assets/img/banner-1.jpg&quot;);" class="banner__item">
                <div class="container">
                  <div class="row">
                    <div class="banner__caption">
                      <h1 class="banner__title"><?=$lang['home.slider.title']?></h1>
                      <h3 class="banner__subtitle"><?=$lang['home.slider.subtitle']?></h3><span class="banner__btn">Get started</span>
                      <div class="banner__arrow-circle">•</div>
                      <svg class="banner__arrow-end js-arrow-end">
                        <use xlink:href="#icon-arrow-end"></use>
                      </svg>
                      <div class="banner__arrow">
                        <svg id="banner-line" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 774 284" enable-background="new 0 0 774 284" xml:space="preserve">
                          <path  fill="none" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="0,2004.009" d="M220.6,239.6
                          c-3.6-15.5-17.5-27.1-34.1-27.1h-150c-19.3,0-35,15.7-35,35c0,19.3,15.7,35,35,35c0,0,88,0,150,0c169,0,244.9-7.5,291-19
                          c41.3-10.2,114.1-33.7,118-83c4.2-53.5-59.4-67.5-102-54c-47.2,15-52.3,78.2,1,90c58.1,12.9,169.6-53.6,274.7-210"/>
                        </svg>
                      </div>
                    </div>
                    <div class="banner__search">
                      <h4 class="banner__sidebar-title"><?=$lang['home.slider.title']?></h4>
                      <!-- BEGIN SEARCH-->
                      <form id="quick-search" action="/<?=$tempurl?>izdavanje/" method="POST" class="form form--flex form--search js-search-form form--banner-sidebar">
                        <div class="row">
                          <div class="form-group">
                            <label for="cat-id" class="control-label"><?=$lang['search.form.cat-id']?></label>
                            <input type="text" id="cat-id" name="cat-id" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="in-contract-type" class="control-label"><?=$lang['search.form.category']?></label>
                            <select id="in-contract-type" data-placeholder="<?=$lang['search.form.category.rent']?>" class="form-control">
                              <option label=" "></option>
                              <option value="izdavanje" selected><?=$lang['search.form.category.rent']?></option>
                              <option value="prodaja"><?=$lang['search.form.category.sell']?></option>
                            </select>
                          </div>
                          <div class="form-group"><span class="control-label"><?=$lang['search.form.type']?></span>
                            <div class="dropdown dropdown--select">
                              <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn">---</button>
                              <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_type_1" name="type[]" type="checkbox" value="Stan" class="in-checkbox" >
                                  <label for="checkbox_type_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.stan']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_2" name="type[]" type="checkbox" value="Kuća" class="in-checkbox">
                                  <label for="checkbox_type_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.kuca']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_3" name="type[]" type="checkbox" value="Poslovni prostor" class="in-checkbox">
                                  <label for="checkbox_type_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovniprostor']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_4" name="type[]" type="checkbox" value="Magacin" class="in-checkbox">
                                  <label for="checkbox_type_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.magacin']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_5" name="type[]" type="checkbox" value="Lokal" class="in-checkbox">
                                  <label for="checkbox_type_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.lokal']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_6" name="type[]" type="checkbox" value="Garaža" class="in-checkbox">
                                  <label for="checkbox_type_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.garaza']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_7" name="type[]" type="checkbox" value="Poslovna zgrada" class="in-checkbox">
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
                                    <input id="checkbox_structure_1" name= "structure[]" type="checkbox" value="Garsonjera" class="in-checkbox">
                                    <label for="checkbox_structure_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.garsonjera']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_2" name= "structure[]" type="checkbox" value="Jednosoban" class="in-checkbox">
                                    <label for="checkbox_structure_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednosoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_3" name= "structure[]" type="checkbox" value="Jednoiposoban" class="in-checkbox">
                                    <label for="checkbox_structure_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednoiposoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_4" name= "structure[]" type="checkbox" value="Dvosoban" class="in-checkbox">
                                    <label for="checkbox_structure_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvosoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_5" name= "structure[]" type="checkbox" value="Dvoiposoban" class="in-checkbox">
                                    <label for="checkbox_structure_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvoiposoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_6" name= "structure[]" type="checkbox" value="Trosoban" class="in-checkbox">
                                    <label for="checkbox_structure_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.trosoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_7" name= "structure[]" type="checkbox" value="Troiposoban" class="in-checkbox">
                                    <label for="checkbox_structure_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.troiposoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_8" name= "structure[]" type="checkbox" value="Četvorosoban" class="in-checkbox">
                                    <label for="checkbox_structure_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvorosoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_9" name= "structure[]" type="checkbox" value="Četvoroiposoban" class="in-checkbox">
                                    <label for="checkbox_structure_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvoroiposoban']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_structure_10" name= "structure[]" type="checkbox" value="Petosoban i veći" class="in-checkbox">
                                    <label for="checkbox_structure_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.petosobaniveci']?></label>
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
                                    <input id="checkbox_setup_1" type="checkbox" name="setup[]" value="Namešten" class="in-checkbox">
                                    <label for="checkbox_setup_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.yes']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_setup_3" type="checkbox" name="setup[]" value="Polunamešten" class="in-checkbox">
                                    <label for="checkbox_setup_3" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.no']?></label>
                                  </li>
                                  <li>
                                    <input id="checkbox_setup_2" type="checkbox" name="setup[]" value="Nenamešten" class="in-checkbox">
                                    <label for="checkbox_setup_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.half']?></label>
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
                          <div class="form-group">
                            <label for="range_price" class="control-label"><?=$lang['search.form.price']?></label>
                            <div class="search-price-size">
                              <input type="text" name="price_from" id="in-price-from" placeholder="<?=$lang['search.form.from']?>" data-input-type="from" class="form-control" style="margin-right:10px;" value="<?php if(isset($price_from)){echo $price_from; }?>">
                              <input type="text" name="price_to" id="in-price-to" placeholder="<?=$lang['search.form.to']?>" data-input-type="to" class="form-control" style="margin-left:10px;" value="<?php if(isset($price_to)){echo $price_to; }?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="range_area" class="control-label"><?=$lang['search.form.size']?></label>
                            <div class="search-price-size">
                              <input type="text" name="size_from" id="in-area-from" placeholder="<?=$lang['search.form.from']?>" data-input-type="from" class="form-control" style="margin-right:10px;" value="<?php if(isset($size_from)){echo $size_from; }?>" >
                              <input type="text" name="size_to" id="in-area-to" placeholder="<?=$lang['search.form.to']?>" data-input-type="to" class="form-control" style="margin-left:10px;" value="<?php if(isset($size_to)){echo $size_to; }?>">
                            </div>
                          </div>
                          <div class="form__buttons">
                          <input type="hidden" name="pretraga" value="1" />
                            <button name="search" type="submit" class="form__submit"><?=$lang['search.form.search']?></button>
                          </div>
                        </div>
                      </form>
                      <!-- end of block-->
                      <!-- END SEARCH-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="widget js-widget widget--landing widget--gray">
          <div class="widget__header">
            <h2 class="widget__title"><?=$lang['home.title']?></h2>
            <h5 class="widget__headline"><?=$lang['home.subtitle']?></h5>
          </div>
          <div class="widget__content">
            <!-- BEGIN PROPERTIES INDEX-->
            <div class="tab tab--properties">
              <!-- Nav tabs-->
              <ul role="tablist" class="nav tab__nav">
                <li class="active"><a href="#tab-recent" aria-controls="tab-recent" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab"><?=$lang['recent']?></a></li>
                <li><a href="#tab-featured" aria-controls="tab-featured" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab"><?=$lang['featured']?></a></li>
              </ul>
              <!-- Tab panes-->
              <div class="tab-content">
                <div id="tab-recent" class="tab-pane in active">
                  <div class="listing listing--grid">

                  <?php 

                  foreach($recent as $item){
                    $thumb = prikaziSlikuThumb($item[0]);
                    echo '<div class="listing__item">';
                    echo    '<div class="properties properties--grid">';
                    echo        '<div class="properties__thumb"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" class="item-photo"><div class="thumb-div" style="background-image:url(../admin/slike/watermark_' . $thumb['naziv'] . ');">';
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
                <div id="tab-featured" class="tab-pane">
                  <div class="listing listing--grid">

                  <?php 

                  foreach($featured as $item){
                    $thumb = prikaziSlikuThumb($item[0]);
                    echo '<div class="listing__item">';
                    echo    '<div class="properties properties--grid">';
                    echo        '<div class="properties__thumb"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" class="item-photo"><div class="thumb-div" style="background-image:url(../admin/slike/watermark_' . $thumb['naziv'] . ');">';
                    echo        '<figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">' . $item['kvadratura'] . ' m²</span><span class="properties__intro">' . kratakOpis($item['opis']) . '...</span>
                            </figure>';
                    echo        '</div></a><span class="properties__ribon">' . $item['kategorija'] . '</span><span class="hot__ribon2">' . $lang['hot'] . '</span></div>';
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
         <div class="widget__header">
            <h2 class="widget__title">Aktuelna ponuda</h2>
          </div>
        </div>
        <div class="widget js-widget widget--landing widget--achievement">
          <div class="widget__content">
            <!-- BEGIN SECTION ACHIEVEMENT-->
            <div class="achievement">
              <div class="container">
                <div class="row">
                  <div data-sr="enter right move 0 over 0 wait 0s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-window"></use>
                    </svg>
                    <div data-count-end="<?=$stats['stanovi']?>" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter"><?=$stats['stanovi']?></div>
                    <div class="achievement__name"><?=$lang['count.stanovi']?></div>
                  </div>
                  <div data-sr="enter right move 0 over 0 wait 0.5s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-transactions"></use>
                    </svg>
                    <div data-count-end="<?=$stats['poslovniprostori']?>" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter"><?=$stats['poslovniprostori']?></div>
                    <div class="achievement__name"><?=$lang['count.poslovniprostori']?></div>
                  </div>
                  <div data-sr="enter right move 0 over 0 wait 1s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-garage"></use>
                    </svg>
                    <div data-count-end="<?=$stats['kuce']?>" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter"><?=$stats['kuce']?></div>
                    <div class="achievement__name"><?=$lang['count.kuce']?></div>
                  </div>
                  <div data-sr="enter right move 0 over 0 wait 1s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-agency"></use>
                    </svg>
                    <div data-count-end="<?=$stats['kuce']?>" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter"><?=$stats['poslovnezgrade']?></div>
                    <div class="achievement__name"><?=$lang['count.poslovnezgrade']?></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END SECTION ACHIEVEMENT-->
          </div>
        </div>
        <div class="widget js-widget">
          <div class="widget__content">
            <!-- BEGIN BLOCK GO SUBMIT-->
            <div data-sr="flip 45deg over 0.5s" class="gosubmit">
              <div class="container">
                <div class="gosubmit__title">
                  <div class="gosubmit__title__row gosubmit__title__row--first"><?=$lang['home.submit.1']?></div>
                  <div class="gosubmit__title__row gosubmit__title__row--second"><span class="gosubmit__title__option"><?=$lang['home.submit.2']?></span> <?=$lang['home.submit.3']?> <span class="gosubmit__title__option"><?=$lang['home.submit.4']?></span></div>
                  <div class="gosubmit__title__row gosubmit__title__row--third"><?=$lang['home.submit.5']?></div>
                </div>
                <!-- end of block .gosubmit__title--><a href="submit.php" class="gosubmit__btn"><?=$lang['home.submit.button']?></a>
              </div>
            </div>
            <!-- END BLOCK GO SUBMIT-->
          </div>
        </div>
        <div class="widget js-widget widget--landing">
          <div class="widget__header">
            <h2 class="widget__title"><?=$lang['navigation.references']?></h2>
            <!-- <h5 class="widget__headline">At RS, our partners make great digital experiences possible by offering our products, consulting expertise and the products of our technology partners</h5> -->
          </div>
          <div class="widget__content">
            <!-- BEGIN PARTNERS-->
            <div id="partners-slider" class="partners">
              <div class="partners__slider js-slick-slider">
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_komora.jpg" alt=""><span class="partners__name">Privredna komora Srbije</span></a>
                <!-- <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_firma.jpg" alt=""><span class="partners__name">Firma od poverenja</span></a> -->
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_jungle.jpg" alt=""><span class="partners__name">Jungle Tribe</span></a>
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_meda.jpg" alt=""><span class="partners__name">Meda</span></a>
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_medicinska.jpg" alt=""><span class="partners__name">Srednja medicinska škola Beograd</span></a>
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_tethyan.jpg" alt=""><span class="partners__name">Tethyan Resources</span></a>
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_tpservis.jpg" alt=""><span class="partners__name">TP Servis</span></a>
                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_fonlider.jpg" alt=""><span class="partners__name">Fonlider</span></a>
              </div>
              <div class="partners__controls">
                <button class="partners__arrow partners__arrow--prev js-partners-prev"></button>
                <button class="partners__arrow partners__arrow--next js-partners-next"></button>
              </div>
              <!-- end of block .partners__controls-->
            </div>
            <!-- end of block .partners-->
          </div>
        </div>
        <!-- END PARTNERS-->
        <div class="center">
          <div class="container">
          </div>
        </div>
        <!-- END CENTER SECTION-->

<?php 

include_once 'parts/footer.php';
include_once 'parts/html-close.php';



?>