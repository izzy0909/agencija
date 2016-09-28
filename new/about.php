<?php 

require_once 'lang/' . checkLang() . '.php';

$active = 'about';

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>
      <div class="site-wrap js-site-wrap">
        <!-- BEGIN BREADCRUMBS-->
        <nav class="breadcrumbs">
          <div class="container">
            <ul>
              <li class="breadcrumbs__item"><a href="index.php" class="breadcrumbs__link">Početna</a></li>
              <li class="breadcrumbs__item"><a class="breadcrumbs__link">O nama</a></li>
            </ul>
          </div>
        </nav>
        <!-- END BREADCRUMBS-->
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
                          <p><strong><?=$lang['about.line.1']?></strong></p>
                            <img src="assets/media-demo/properties/870x480/02.jpg" alt="">
                          <p><?=$lang['about.line.2']?></p>
                          <h3><?=$lang['about.line.3']?></h3>
                          <p><?=$lang['about.line.4']?></p>
                          <ul>
                            <li><?=$lang['about.li.1']?></li>
                            <li>i<?=$lang['about.li.2']?></li>
                            <li><?=$lang['about.li.3']?></li>
                            <li><?=$lang['about.li.4']?></li>
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