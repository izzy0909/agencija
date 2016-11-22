      <!-- BEGIN HEADER-->
      <header class="header <?php if ($active=='home'){ echo 'header--overlay header--dark';} else { echo 'header--brand';}?> ">
        <div class="container">
          <div class="header__row"><a href="/<?=$tempurl?>" class="header__logo">
<!--               <svg>
                <use xlink:href="#icon-logo--mob"></use>
              </svg> -->
              <img src="/<?=$tempurl?>assets/img/logo<?php if($active!='home'){echo '3';} else echo '2';?>.png">
              </a>
            <div class="header__settings">
              <!-- end of block .header__settings-column-->
              <div class="header__settings-column">
                <div class="dropdown dropdown--header">
                  <button data-toggle="dropdown" type="button" class="dropdown-toggle dropdown__btn">
                    <svg class="header__settings-icon">
                      <use xlink:href="#icon-earth"></use>
                    </svg><?=$lang['lang']?>
                  </button>
                  <div class="dropdown__menu">
                    <ul>
                      <li class="dropdown__item"><a href="#" class="lang-rs dropdown__link">Srpski</a></li>
                      <li class="dropdown__item"><a href="#" class="lang-en dropdown__link">English</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="header__contacts">
              <a class="header__phone"><svg class="header__phone-icon"><use xlink:href="#icon-phone"></use></svg><span class="header__span">060/4480659</span></a>
            </div>
            <!-- end of block .header__contacts-->
            <div class="header__social">
              <div class="social social--header social--circles">
                <a href="/<?=$tempurl?>omiljene-nekretnine/" class="social__item"><i class="fa fa-heart<?php if(!isset($_COOKIE['jevtic_favorites'])){echo '-o';} ?>"></i></a>
              </div>
            </div>
            <div class="header__social">
              <div class="social social--header social--circles">
                <a href="http://www.facebook.com/pages/Jevtic-nekretnine-doo/542807059085029" target="_blank" class="social__item"><i class="fa fa-facebook"></i></a>
                <a href="http://twitter.com/Jevticnekretine" target="_blank" class="social__item"><i class="fa fa-twitter"></i></a>
                <a href="http://rs.linkedin.com/pub/jevtic-nekretnine/65/aa1/57a" target="_blank" class="social__item"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            <button type="button" class="header__navbar-toggle js-navbar-toggle">
              <svg class="header__navbar-show">
                <use xlink:href="#icon-menu"></use>
              </svg>
              <svg class="header__navbar-hide">
                <use xlink:href="#icon-menu-close"></use>
              </svg>
            </button>
            <!-- end of block .header__navbar-toggle-->
          </div>
        </div>
      </header>
      <!-- END HEADER-->