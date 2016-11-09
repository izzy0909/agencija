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
                  <h1 class="site__title"><?=$lang['navigation.about.contracts']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content">
                      <article class="article article--list article--details">
                        <div class="article__body">
                          <ul>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_2016.pdf" target="_blank"><?=$lang['contracts.1']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_kupac_fizicko_lice.pdf" target="_blank"><?=$lang['contracts.2']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o-posredovanju_kupac_pravno_lice.pdf" target="_blank"><?=$lang['contracts.3']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_pl_2016.pdf" target="_blank"><?=$lang['contracts.4']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_sa_zakupcem_fizicko_lice.pdf" target="_blank"><?=$lang['contracts.5']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_sa_zakupcem_pravno_lice.pdf" target="_blank"><?=$lang['contracts.6']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_vlasnik_pravno_lice.pdf" target="_blank"><?=$lang['contracts.7']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/ugovor_o_posredovanju_sa_vlasnikom_o_prodaji_nepokretnosti.pdf" target="_blank"><?=$lang['contracts.8']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/zakon_o_posredovanju_u_prometu_i_zakupu_nepokretnosti" target="_blank"><?=$lang['contracts.9']?></a></li>
                            <li><a href="/<?=$tempurl?>ugovori/Privredna_komora_letak.pdf" target="_blank"><?=$lang['contracts.10']?></a></li>
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