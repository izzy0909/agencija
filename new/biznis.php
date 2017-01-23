<?php 
include_once '../data_base_access/stanoviDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'biznis';

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
                  <h1 class="site__title"><?=$lang['biznis.title']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content">
                      <article class="article article--list article--details">
                        <div class="article__body">
                        <img src="/<?=$tempurl?>assets/img/biznis.jpg" alt="">
                          <p><?=$lang['biznis.line.1']?></p>
                          <ul>
                            <li><?=$lang['biznis.li.1']?></li>
                            <li><?=$lang['biznis.li.2']?></li>
                            <li><?=$lang['biznis.li.3']?></li>
                            <li><?=$lang['biznis.li.4']?></li>
                            <li><?=$lang['biznis.li.5']?></li>
                            <li><?=$lang['biznis.li.6']?></li>
                            <li><?=$lang['biznis.li.7']?></li>
                            <li><?=$lang['biznis.li.8']?></li>
                            <li><?=$lang['biznis.li.9']?></li>
                            <li><?=$lang['biznis.li.10']?></li>
                            <li><?=$lang['biznis.li.11']?></li>
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