        <!-- BEGIN FOOTER-->
        <footer class="footer">
          <div class="container">
            <div class="footer__wrap">
              <div class="footer__col footer__col--first">
                <div class="widget js-widget widget--footer">
                  <div class="widget__header">
                    <h2 class="widget__title"><?=$lang['footer.menu']?></h2>
                  </div>
                  <div class="widget__content">
                    <nav class="nav nav--footer">
                    <a href="/<?=$tempurl?>"><?=$lang['navigation.home']?></a>
                    <a href="/<?=$tempurl?>izdavanje-izaberite/"><?=$lang['navigation.rent']?></a>
                    <a href="/<?=$tempurl?>prodaja-izaberite/"><?=$lang['navigation.sell']?></a>
                    <a href="<?=$tempurl?>dodajte-nekretninu/"><?=$lang['navigation.submit']?></a>
                    <a href="/<?=$tempurl?>o-nama/"><?=$lang['navigation.about']?></a>
                    <a href="/<?=$tempurl?>biznis-paket-plus/"><?=$lang['navigation.biznis']?></a>
                    <a href="/<?=$tempurl?>karijera/"><?=$lang['navigation.career']?></a>
                    <a href="/<?=$tempurl?>reference/"><?=$lang['navigation.references']?></a>
                    <a href="/<?=$tempurl?>kontakt/"><?=$lang['navigation.contact']?></a>
                    </nav>
                    <!-- end of block .nav-footer-->
                  </div>
                </div>
              </div>
              <!-- end of block .footer__col-first-->
              <div class="footer__col footer__col--second">
                <div class="widget js-widget widget--footer">
                  <div class="widget__header">
                    <h2 class="widget__title"><?=$lang['footer.contact']?></h2>
                  </div>
                  <div class="widget__content">
                    <section class="address address--footer">
                      <address class="address__main"><span>Bokeljska 7, Beograd.</span><a href="mailto:info@jevticnekretnine.rs">info@jevticnekretnine.rs</a><a>011/4054325</a><a>060/4480659</a></address>
                    </section>
                    <!-- end of block .address-->
                  </div>
                </div>
              </div>
              <!--end of block .footer__col-second-->
              <div class="footer__col footer__col--third">
                <div class="widget js-widget widget--footer">
                  <div class="widget__header">
                    <h2 class="widget__title"><?php // echo $lang['footer.social']; ?></h2>
                  </div>
<!--                   <div class="widget__content">
                    <div class="social social--footer"><a href="http://www.facebook.com/pages/Jevtic-nekretnine-doo/542807059085029" target="_blank" class="social__item"><i class="fa fa-facebook"></i></a><a href="https://plus.google.com/112809676147441559550" target="_blank" class="social__item"><i class="fa fa-google-plus"></i></a><a href="http://rs.linkedin.com/pub/jevtic-nekretnine/65/aa1/57a" target="_blank" class="social__item"><i class="fa fa-linkedin"></i></a></div>
                    <div class="clearfix"></div>
                    <div style="margin-top:30px;">
                      <span>Broj posrednika u registru: 150</span>
                    </div>
                  </div> -->
                  <div class="widget__content" style="text-align: center;">
                    <img src="/<?=$tempurl?>assets/img/firma_od_poverenja.png" style="padding-right:5px;"/>
                    <img src="/<?=$tempurl?>assets/img/partner_komora.jpg" />
                    <div style="padding-top:10px;">
                      <span>Broj posrednika u registru: 150</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of block .footer__col-third-->
              <div class="clearfix"></div><span class="footer__copyright">&copy;<?=date('Y') . ' ' . $lang['footer.copyright']; ?><br />Created by <a href="http://www.web-refresh.com" target="_blank">Web.Refresh</a></span>
              <!-- end of block .footer__copyright-->
            </div>
          </div>
        </footer>
        <!-- end of block .footer-->
        <!-- END FOOTER-->