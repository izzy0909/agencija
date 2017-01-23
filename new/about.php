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
                  <h1 class="site__title"><?=$lang['about.title']?></h1>
                </header>
                <div class="site__main">
                  <div class="widget js-widget widget--main widget--no-margin">
                    <div class="widget__content">
                      <article class="article article--list article--details">
                        <div class="article__body">
                          <img src="/<?=$tempurl?>assets/img/about_01.jpg" alt="" style="float:left; margin-right:20px">
                          <p><strong><?=$lang['about.line.1']?></strong>
                          <p><?=$lang['about.line.2']?></p></p>
                          <div class="clearfix"></div>
                          <h3><?=$lang['about.subtitle.1']?></h3>
                          <ul>
                            <li><?=$lang['about.sub1.li.1']?></li>
                            <li><?=$lang['about.sub1.li.2']?></li>
                            <li><?=$lang['about.sub1.li.3']?></li>
                          </ul>
                          <h3><?=$lang['about.subtitle.2']?></h3>
                          <ul>
                            <li><?=$lang['about.sub2.li.1']?></li>
                            <li><?=$lang['about.sub2.li.2']?></li>
                            <li><?=$lang['about.sub2.li.3']?></li>
                            <li><?=$lang['about.sub2.li.4']?></li>
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