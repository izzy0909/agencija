<?php 
include_once '../data_base_access/stanoviDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'about';

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
                  <h1 class="site__title"><?=$lang['navigation.about.laws']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content">
                      <article class="article article--list article--details">
                        <div class="article__body">
                          <ul>
                            <li><a href="/<?=$tempurl?>zakoni/zakon_o_posredovanju_nekretninama.pdf" target="_blank"><?=$lang['laws.1']?></a></li>
                            <li><a href="/<?=$tempurl?>zakoni/oslobadjanje_od_poreza_na_prenos_apsolutnih_prava.pdf" target="_blank"><?=$lang['laws.2']?></a></li>
                            <li><a href="/<?=$tempurl?>zakoni/povracaj_poreza_pdv_za_kupce_prvog_stana.pdf" target="_blank"><?=$lang['laws.3']?></a></li>
                            <li><a href="/<?=$tempurl?>zakoni/zakon_o_javnom_beleznistvu.pdf" target="_blank"><?=$lang['laws.4']?></a></li>
                            <li><a href="/<?=$tempurl?>zakoni/tarifa_notari.pdf" target="_blank"><?=$lang['laws.5']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/Privredna_komora_letak.pdf" target="_blank"><?=$lang['laws.6']?></a></li>
                          </ul>
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