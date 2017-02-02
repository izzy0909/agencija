<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'rent';
$areas = prikaziSveOpstine();

if(isset($_REQUEST['pretraga'])){

    $id = isset($_REQUEST['cat-id']) ? $_REQUEST['cat-id'] : null;
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : null;
    $structure = isset($_REQUEST['structure']) ? $_REQUEST['structure'] : null;
    $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
    $heat = isset($_REQUEST['heat']) ? $_REQUEST['heat'] : null;
    $setup = isset($_REQUEST['setup']) ? $_REQUEST['setup'] : null;
    $floor = isset($_REQUEST['floor']) ? $_REQUEST['floor'] : null;
    $price_from = isset($_REQUEST['price_from']) ? $_REQUEST['price_from'] : null;
    $price_to = isset($_REQUEST['price_to']) ? $_REQUEST['price_to'] : null;
    $size_from = isset($_REQUEST['size_from']) ? $_REQUEST['size_from'] : null;
    $size_to = isset($_REQUEST['size_to']) ? $_REQUEST['size_to'] : null;

    $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 1;

    $items =      getItems     ('izdavanje', $id, $type, $structure, $location, $heat, $setup, $floor, $price_from, $price_to, $size_from, $size_to, $order, 0);
    $itemsCount = getItemsCount('izdavanje', $id, $type, $structure, $location, $heat, $setup, $floor, $price_from, $price_to, $size_from, $size_to, $order, 0);
}
else{
    $items =      getItems     ('izdavanje', null, null, null, null, null, null, null, null, null, null, null, 1, 0);
    $itemsCount = getItemsCount('izdavanje', null, null, null, null, null, null, null, null, null, null, null, 1, 0);
}

// var_dump($items);

function echoArray($name){
    if(isset($_REQUEST[$name])){
    $array = $_REQUEST[$name];
    $n = count($array);
        for($i=0; $i<$n; $i++){
            echo $array[$i];
            if($i<$n-1){
                echo ', ';
            }
        }
    }
    else echo '---';
}

function checked($value, $get){
    if(isset($_REQUEST[$get]) && in_array($value, $_REQUEST[$get])){
        echo 'checked';
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
              <!-- BEGIN site-->
              <div class="site site--main">
                <header class="site__header">
                  <h1 class="site__title"><?=$lang['rent.title']?></h1>
                  <h5 class="site__headline"><?=$lang['results']?>: <strong id="itemsCount"><?=$itemsCount?></strong></h5>
                </header>
                <button type="button" data-goto-target=".js-search-form" class="widget__btn--goto js-goto-btn"><?=$lang['search.showfilter']?></button>
                <div class="site__panel">
                  <div class="listing__sort">
                    <div class="form-group">
                      <label for="in-listing-sort" class="control-label"><?=$lang['search.sort']?>:</label>
                      <div class="form-control--select">
                        <select id="sortiranje" name="order" form="searchForm" class="form-control js-in-select">
                          <option value="1" ><?=$lang['search.sort.newest']?></option>
                          <option value="2" <?php if(isset($order)&&($order==2)){echo 'selected';}?> ><?=$lang['search.sort.oldest']?></option>
                          <option value="3" <?php if(isset($order)&&($order==3)){echo 'selected';}?> ><?=$lang['search.sort.priceasc']?></option>
                          <option value="4" <?php if(isset($order)&&($order==4)){echo 'selected';}?> ><?=$lang['search.sort.pricedes']?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end of block .listing__param-->
                <div class="site__main">
                  <div class="widget js-widget widget--main">
                    <div class="widget__content">
                      <div id="lista" data-page="1" class="listing listing--grid js-properties-list">

                      <?php
                        foreach($items as $item){
                            $thumb = prikaziSlikuThumb($item[0]);
                            echo '<div class="listing__item">';
                            echo   '<div class="properties properties--grid">';
                            echo    '<div class="properties__thumb"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" target="_blank" class="item-photo"><div class="thumb-div" style="background-image:url(/' . $tempurl . '../admin/slike/watermark_' . $thumb['naziv'] . ');">';
                            echo        '<figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">' . $item['kvadratura'] . ' m²</span><span class="properties__intro">' . kratakOpis($item['opis']) . '...</span></figure>';
                            echo    '</div></a>'; if($item['hot_offer']){ echo '<span class="hot__ribon">' . $lang['hot'] . '</span>';} echo '</div>';
                            //    <!-- end of block .properties__thumb-->
                            echo    '<div class="properties__details">';
                            echo      '<div class="properties__info"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" target="_blank" class="properties__address"><span class="properties__address-street">#' . $item[0] . ' - ' . $item['opstina'] .'</span><span class="properties__address-city">' . $item['namestenost'] . '</span></a>';
                            echo                '<div class="properties__offer">';
                            echo                    '<div class="properties__offer-column">';
                            echo                        '<div class="properties__offer-label">' . ($item['tip'] == 'Stan' ? $item['stan_tip'] : '&nbsp;') . '</div>';
                            echo                        '<div class="properties__offer-value"><strong'; if($item['tip']=='Poslovni prostor' || $item['tip']=='Poslovna zgrada'){echo ' style="font-size:18px"';} echo '>' . $item['tip'] . '</strong></div>';
                            echo                    '</div>';
                            echo                    '<div class="properties__offer-column">';
                            echo                        '<div class="properties__offer-value"><strong>' . $item['cena'] . '</strong><span class="properties__offer-period">&#8364;</span></div>';
                            echo                    '</div>';
                            echo                '</div>';
                          //  echo                '<div class="properties__params--mob"><a href="details.php?id=' . $item[0] . '" class="properties__more">' . $lang['details'] . '</a></div>';
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
                  <?php if($itemsCount > 9){echo '<div class="widget__footer"><a id="loadmore" href="#" class="widget__more js-properties-more">' . $lang['loadmore'] . '</a></div>';}
                        else { echo '<div class="widget__footer disabled"><a id="loadmore" class="widget__more js-properties-more">- / -</a></div>'; }
                  ?>
                </div>
              </div>
              <!-- END site-->
              <!-- BEGIN SIDEBAR-->
              <div class="sidebar">
                <div class="widget js-widget widget--sidebar">
                  <div class="widget__header">
                    <h2 class="widget__title"><?=$lang['search.title']?></h2>
                    <h5 class="widget__headline"><?=$lang['search.subtitle']?>.</h5><a class="widget__btn js-widget-btn widget__btn--toggle"><?=$lang['search.showfilter']?></a>
                  </div>
                  <div class="widget__content">
                    <!-- BEGIN SEARCH-->
                    <form id="searchForm" name="searchForm" data-cat="izdavanje" action="/<?=$tempurl?>izdavanje/" method="POST" class="form form--flex form--search js-search-form form--sidebar" enctype="multipart/form-data">
                      <div class="row">
                          <div class="form-group">
                            <label for="cat-id" class="control-label"><?=$lang['search.form.cat-id']?></label>
                            <input type="text" name="cat-id" id="cat-id" class="form-control" value="<?php if(isset($id)){echo $id; }?>">
                          </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.type']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('type');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_type_1" name="type[]" type="checkbox" value="Stan" class="in-checkbox" <?php checked('Stan','type'); ?>>
                                  <label for="checkbox_type_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.stan']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_2" name="type[]" type="checkbox" value="Kuća" class="in-checkbox" <?php checked('Kuća','type'); ?>>
                                  <label for="checkbox_type_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.kuca']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_3" name="type[]" type="checkbox" value="Poslovni prostor" class="in-checkbox" <?php checked('Poslovni prostor','type'); ?>>
                                  <label for="checkbox_type_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovniprostor']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_4" name="type[]" type="checkbox" value="Magacin" class="in-checkbox" <?php checked('Magacin','type'); ?>>
                                  <label for="checkbox_type_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.magacin']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_5" name="type[]" type="checkbox" value="Lokal" class="in-checkbox" <?php checked('Lokal','type'); ?>>
                                  <label for="checkbox_type_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.lokal']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_6" name="type[]" type="checkbox" value="Garaža" class="in-checkbox" <?php checked('Garaža','type'); ?>>
                                  <label for="checkbox_type_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.garaza']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_type_7" name="type[]" type="checkbox" value="Poslovna zgrada" class="in-checkbox" <?php checked('Poslovna zgrada','type'); ?>>
                                  <label for="checkbox_type_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.type.poslovnazgrada']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.structure']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('structure');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_structure_1" name= "structure[]" type="checkbox" value="Garsonjera" class="in-checkbox" <?php checked('Garsonjera','structure'); ?>>
                                  <label for="checkbox_structure_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.garsonjera']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_2" name= "structure[]" type="checkbox" value="Jednosoban" class="in-checkbox" <?php checked('Jednosoban','structure'); ?>>
                                  <label for="checkbox_structure_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_3" name= "structure[]" type="checkbox" value="Jednoiposoban" class="in-checkbox" <?php checked('Jednoiposoban','structure'); ?>>
                                  <label for="checkbox_structure_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.jednoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_4" name= "structure[]" type="checkbox" value="Dvosoban" class="in-checkbox" <?php checked('Dvosoban','structure'); ?>>
                                  <label for="checkbox_structure_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_5" name= "structure[]" type="checkbox" value="Dvoiposoban" class="in-checkbox" <?php checked('Dvoiposoban','structure'); ?>>
                                  <label for="checkbox_structure_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.dvoiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_6" name= "structure[]" type="checkbox" value="Trosoban" class="in-checkbox" <?php checked('Trosoban','structure'); ?>>
                                  <label for="checkbox_structure_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.trosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_7" name= "structure[]" type="checkbox" value="Troiposoban" class="in-checkbox" <?php checked('Troiposoban','structure'); ?>>
                                  <label for="checkbox_structure_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.troiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_8" name= "structure[]" type="checkbox" value="Četvorosoban" class="in-checkbox" <?php checked('Četvorosoban','structure'); ?>>
                                  <label for="checkbox_structure_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvorosoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_9" name= "structure[]" type="checkbox" value="Četvoroiposoban" class="in-checkbox" <?php checked('Četvoroiposoban','structure'); ?>>
                                  <label for="checkbox_structure_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.cetvoroiposoban']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_structure_10" name= "structure[]" type="checkbox" value="Petosoban i veći" class="in-checkbox" <?php checked('Petosoban i veći','structure'); ?>>
                                  <label for="checkbox_structure_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.structure.petosobaniveci']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.location']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('location');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                              <?php foreach($areas as $lokacija){
                                echo '<li>';
                                echo '<input id="checkbox_location_' . $lokacija['id'] . '" type="checkbox" name="location[]"  value="' . $lokacija['opstina'] . '" class="in-checkbox"'; checked($lokacija['opstina'], 'location'); echo '>';
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
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('heat');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_heat_1" type="checkbox" name="heat[]" value="CG" class="in-checkbox" <?php checked('CG','heat'); ?>>
                                  <label for="checkbox_heat_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.cg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_2" type="checkbox" name="heat[]" value="EG" class="in-checkbox" <?php checked('EG','heat'); ?>>
                                  <label for="checkbox_heat_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.eg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_3" type="checkbox" name="heat[]" value="TA" class="in-checkbox" <?php checked('TA','heat'); ?>>
                                  <label for="checkbox_heat_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.ta']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_4" type="checkbox" name="heat[]" navalueme="PG" class="in-checkbox" <?php checked('PG','heat'); ?>>
                                  <label for="checkbox_heat_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.pg']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_5" type="checkbox" name="heat[]" value="Klima uređaj" class="in-checkbox" <?php checked('Klima uređaj','heat'); ?>>
                                  <label for="checkbox_heat_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.klima']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_6" type="checkbox" name="heat[]" value="Na gas" class="in-checkbox" <?php checked('Na gas','heat'); ?>>
                                  <label for="checkbox_heat_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.gas']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_7" type="checkbox" name="heat[]" value="Na struju" class="in-checkbox" <?php checked('Na struju','heat'); ?>>
                                  <label for="checkbox_heat_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.struja']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_8" type="checkbox" name="heat[]" value="Norveški radijatori" class="in-checkbox" <?php checked('Norveški radijatori','heat'); ?>>
                                  <label for="checkbox_heat_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.norveski']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_heat_9" type="checkbox" name="heat[]" value="Mermerni radijatori" class="in-checkbox" <?php checked('Mermerni radijatori','heat'); ?>>
                                  <label for="checkbox_heat_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.heat.mermerni']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.setup']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('setup');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_setup_1" type="checkbox" name="setup[]" value="Namešten" class="in-checkbox" <?php checked('Namešten','setup'); ?>>
                                  <label for="checkbox_setup_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.yes']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_3" type="checkbox" name="setup[]" value="Polunamešten" class="in-checkbox" <?php checked('Polunamešten','setup'); ?>>
                                  <label for="checkbox_setup_3" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.half']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_setup_2" type="checkbox" name="setup[]" value="Nenamešten" class="in-checkbox" <?php checked('Nenamešten','setup'); ?>>
                                  <label for="checkbox_setup_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.setup.no']?></label>
                                </li>
                              </ul>
                              <!-- end of block .dropdown-menu-->
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><span class="control-label"><?=$lang['search.form.floor']?></span>
                          <div class="dropdown dropdown--select">
                            <button type="button" data-toggle="dropdown" data-placeholder="---" class="dropdown-toggle js-select-checkboxes-btn"><?php echoArray('floor');?></button>
                            <div class="dropdown-menu js-dropdown-menu js-select-checkboxes">
                              <ul>
                                <li>
                                  <input id="checkbox_floor_1" type="checkbox" name="floor[]" value="Suteren" class="in-checkbox" <?php checked('Suteren','floor'); ?>>
                                  <label for="checkbox_floor_1" data-toggle="tooltip" data-placement="left" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.suteren']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_2" type="checkbox" name="floor[]" value="Prizemlje" class="in-checkbox" <?php checked('Prizemlje','floor'); ?>>
                                  <label for="checkbox_floor_2" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.prizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_25" type="checkbox" name="floor[]" value="Visoko prizemlje" class="in-checkbox" <?php checked('Visoko prizemlje','floor'); ?>>
                                  <label for="checkbox_floor_25" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.visokoprizemlje']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_3" type="checkbox" name="floor[]" value="1. sprat" class="in-checkbox" <?php checked('1. sprat','floor'); ?>>
                                  <label for="checkbox_floor_3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s1']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_4" type="checkbox" name="floor[]" value="2. sprat" class="in-checkbox" <?php checked('2. sprat','floor'); ?>>
                                  <label for="checkbox_floor_4" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s2']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_5" type="checkbox" name="floor[]" value="3. sprat" class="in-checkbox"<?php checked('3. sprat','floor'); ?>>
                                  <label for="checkbox_floor_5" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s3']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_6" type="checkbox" name="floor[]" value="4. sprat" class="in-checkbox"<?php checked('4. sprat','floor'); ?>>
                                  <label for="checkbox_floor_6" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s4']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_7" type="checkbox" name="floor[]" value="5. sprat" class="in-checkbox"<?php checked('5. sprat','floor'); ?>>
                                  <label for="checkbox_floor_7" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s5']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_8" type="checkbox" name="floor[]" value="6. sprat" class="in-checkbox" <?php checked('6. sprat','floor'); ?>>
                                  <label for="checkbox_floor_8" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s6']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_9" type="checkbox" name="floor[]" value="7. sprat" class="in-checkbox" <?php checked('7. sprat','floor'); ?>>
                                  <label for="checkbox_floor_9" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s7']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_10" type="checkbox" name="floor[]" value="8. sprat" class="in-checkbox" <?php checked('8. sprat','floor'); ?>>
                                  <label for="checkbox_floor_10" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s8']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_11" type="checkbox" name="floor[]" value="9. sprat" class="in-checkbox" <?php checked('9. sprat','floor'); ?>>
                                  <label for="checkbox_floor_11" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s9']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_12" type="checkbox" name="floor[]" value="10. sprat" class="in-checkbox" <?php checked('10. sprat','floor'); ?>>
                                  <label for="checkbox_floor_12" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_13" type="checkbox" name="floor[]" value="11. sprat" class="in-checkbox" <?php checked('11. sprat','floor'); ?>>
                                  <label for="checkbox_floor_13" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_14" type="checkbox" name="floor[]" value="12. sprat" class="in-checkbox" <?php checked('12. sprat','floor'); ?>>
                                  <label for="checkbox_floor_14" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_15" type="checkbox" name="floor[]" value="13. sprat" class="in-checkbox" <?php checked('13. sprat','floor'); ?>>
                                  <label for="checkbox_floor_15" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_16" type="checkbox" name="floor[]" value="14. sprat" class="in-checkbox" <?php checked('14. sprat','floor'); ?>>
                                  <label for="checkbox_floor_16" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_17" type="checkbox" name="floor[]" value="15. sprat" class="in-checkbox" <?php checked('15. sprat','floor'); ?>>
                                  <label for="checkbox_floor_17" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_18" type="checkbox" name="floor[]" value="16. sprat" class="in-checkbox" <?php checked('16. sprat','floor'); ?>>
                                  <label for="checkbox_floor_18" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_19" type="checkbox" name="floor[]" value="17. sprat" class="in-checkbox" <?php checked('17. sprat','floor'); ?>>
                                  <label for="checkbox_floor_19" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_20" type="checkbox" name="floor[]" value="18. sprat" class="in-checkbox" <?php checked('18. sprat','floor'); ?>>
                                  <label for="checkbox_floor_20" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_21" type="checkbox" name="floor[]" value="19. sprat" class="in-checkbox" <?php checked('19. sprat','floor'); ?>>
                                  <label for="checkbox_floor_21" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top" class="in-label"><?=$lang['search.form.floor.s10']?></label>
                                </li>
                                <li>
                                  <input id="checkbox_floor_22" type="checkbox" name="floor[]" value="20. sprat i više" class="in-checkbox" <?php checked('20. sprat','floor'); ?>>
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
                        <div class="form__buttons form__buttons--double">
                          <input type="hidden" name="pretraga" value="1" />
                          <button type="button" class="form__reset js-form-reset"><?=$lang['search.form.reset']?></button>
                          <button type="submit" name="search" value="1" class="form__submit"><?=$lang['search.form.search']?></button>
                        </div>
                      </div>
                    </form>
                    <!-- end of block-->
                    <!-- END SEARCH-->
                  </div>
                </div>
              </div>
              <!-- END SIDEBAR-->
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- END CENTER SECTION-->
        <!-- BEGIN AFTER CENTER SECTION-->
        <!-- END AFTER CENTER SECTION-->

<?php 

include_once 'parts/footer.php';
include_once 'parts/html-close.php';



?>