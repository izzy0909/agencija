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
                  <h1 class="site__title"><?=$lang['about.team.title']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main">
                    <div class="widget__content">
                      <div class="listing listing--grid">
                        <div class="listing__item">
                          <div data-sr="enter bottom move 80px, scale(0), over 0s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--grid">
                            <div class="worker__photo"><a class="item-photo item-photo--static"><img src="/<?=$tempurl?>assets/media-demo/workers/marko.jpg" alt="Christopher Pakulla" class="photo"/></a></div>
                            <div class="worker__intro">
                              <h3 class="worker__name fn"><?=$lang['about.team.member1']?></h3>
                              <div class="worker__post"><?=$lang['about.team.member1.pos']?></div>
                              <!-- end of block .worker__listings-->
                            </div>
                            <!-- end of block .worker__descr-->
                          </div>
                          <!-- end of block .worker-->
                        </div>
                        <div class="listing__item">
                          <div data-sr="enter bottom move 80px, scale(0), over 0s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--grid">
                            <div class="worker__photo"><a class="item-photo item-photo--static"><img src="/<?=$tempurl?>assets/media-demo/workers/ivana.jpg" alt="Christopher Pakulla" class="photo"/></a></div>
                            <div class="worker__intro">
                              <h3 class="worker__name fn"><?=$lang['about.team.member2']?></h3>
                              <div class="worker__post"><?=$lang['about.team.member2.pos']?></div>
                              <!-- end of block .worker__listings-->
                            </div>
                            <!-- end of block .worker__descr-->
                          </div>
                          <!-- end of block .worker-->
                        </div>
                        <div class="listing__item">
                          <div data-sr="enter bottom move 80px, scale(0), over 0s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--grid">
                            <div class="worker__photo"><a class="item-photo item-photo--static"><img src="/<?=$tempurl?>assets/media-demo/workers/adriana.jpg" alt="Christopher Pakulla" class="photo"/></a></div>
                            <div class="worker__intro">
                              <h3 class="worker__name fn"><?=$lang['about.team.member4']?></h3>
                              <div class="worker__post"><?=$lang['about.team.member4.pos']?></div>
                              <!-- end of block .worker__listings-->
                            </div>
                            <!-- end of block .worker__descr-->
                          </div>
                          <!-- end of block .worker-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
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