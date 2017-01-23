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
                  <h1 class="site__title"><?=$lang['navigation.career']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content">
                      <article class="article article--list article--details">
                        <div class="article__body">
                        <img src="/<?=$tempurl?>assets/img/dolladollabillyall.jpg" alt="">
                          <p><strong>Ukoliko želite da se priključite timu mladih i ambicioznih ljudi motivisanih ka vrhunskim rezultatima, možete konkurisati za sledeće pozicije:</strong></p>
                          <h3>AGENT ZA PROMET NEPOKRETNOSTI</h3>
                          <p><strong>OPIS POSLA:</strong><br />Posao je kombinacija kancelarijsko-terenskog rada i zasniva se na poznavanju psihologije rada u prodaji i veštini efikasne komunikacije. Posao je dinamičan, omogućava kvalitetne kontakte, brzo napredovanje, stalnu edukaciju i dobru zaradu.</p>
                          <ul>
                            <li>Konstantno informisanje o tržištu nekretnina</li>
                            <li>Zakazivanje sastanaka između klijenata</li>
                            <li>Pokazivanje nekretnina</li>
                            <li>Pregovaranje o ceni nekretnine</li>
                            <li>Obezbeđivanje potpisivanja ugovora</li>
                          </ul>
                          <br /><br />
                          <h3>OPERATER-KOORDINATOR</h3>
                          <p><strong>OPIS POSLA:</strong><br />Posao je kancelarijskog tipa I zasniva se na poznavanju psihologije rada u prodaji i veštini efikasne komunikacije. Posao je dinamičan, omogućava kvalitetne kontakte, brzo napredovanje, stalnu edukaciju i dobru zaradu.</p>
                          <ul>
                            <li>Svakodnevni kontak sa klijentima</li>
                            <li>Prezentovanje usluga</li>
                            <li>Zakazivanje sastanaka između klijenata</li>
                            <li>Pregovaranje o ceni nekretnine</li>
                            <li>Informisanost o aktuelnoj ponudi</li>
                          </ul>
                          <br /><br />
                          <h4>Ukoliko ste zainteresovani, pošaljite CV na <strong><a href="mailto:info@jevticnekretnine.rs">info@jevticnekretnine.rs</a></strong></h4>
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