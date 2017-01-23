<?php 
include_once '../data_base_access/stanoviDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'career';

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>
      <div class="site-wrap js-site-wrap">
        <div class="center">
          <div class="container">
            <div class="row">
              <!-- BEGIN site-->
                <header class="site__header">
                  <h1 class="site__title"><?=$lang['navigation.references']?></h1>
                </header>
                <div class="site__main">
                                            <br />
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content" style="background-color:white; padding-top:10px; padding-bottom:10px;">
                      <article class="article article--list article--details">
                        <div class="article__body">
                          <div class="widget__content">
                            <div id="partners-slider" class="partners">
                              <div class="partners__slider js-slick-slider">
                                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_komora.jpg" alt=""><span class="partners__name">Privredna komora Srbije</span></a>
                                <a class="partners__item"><img src="/<?=$tempurl?>assets/img/partner_firma.jpg" alt=""><span class="partners__name">Firma od poverenja</span></a>
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
                          </div>
                        </div>
                      </article>
                    </div>
                  </div>
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