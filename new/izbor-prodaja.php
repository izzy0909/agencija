<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'sell';

include 'parts/html-open.php';
include 'parts/header.php';
include 'parts/navigation.php';

?>


      <div class="site-wrap js-site-wrap">
        <div class="center">
          <div class="container">
            <div class="row">
              <!-- BEGIN site-->
              <div class="site">
                <header class="site__header">
                  <h1 class="site__title"><?=$lang['sell.title']?></h1>
                  <hr class="divider divider--solid-light">
                </header>
                <!--end of block .listing__param-->

                <div class="site__body">
                  <div class="cat-select">
                    <a class="cat-link" href="#" data-type="Stan"><img src="/<?=$tempurl?>../images/pro-stanovi.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Kuća"><img src="/<?=$tempurl?>../images/pro-kuce.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Poslovni prostor"><img src="/<?=$tempurl?>../images/pro-posprost.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Magacin"><img src="/<?=$tempurl?>../images/pro-magacini.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Lokal"><img src="/<?=$tempurl?>../images/pro-lokali.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Garaža"><img src="/<?=$tempurl?>../images/pro-garaze.jpg" /></a>
                    <a class="cat-link" href="#" data-type="Poslovna zgrada"><img src="/<?=$tempurl?>../images/pro-poslovnezgrade.jpg" /></a>
                  </div>
                </div>
                <form id="quick-search" action="/<?=$tempurl?>prodaja/" method="POST" style="display:none;">
                  <input type="hidden" name="pretraga" value="1" />
                  <input id="type" type="hidden" name="type[]" value="" />
                  <button name="search" type="submit" class="form__submit"><?=$lang['search.form.search']?></button>
                </form>
              </div>
              <!-- END site-->
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