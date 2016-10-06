<?php 

include_once '../data_base_access/stanoviDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'contact';

include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>
      <div class="site-wrap js-site-wrap">
        <div class="map map--contacts">
          <div class="map__buttons">
            <button type="button" class="map__change-map js-map-btn"><?=$lang['contact.map']?></button>
          </div>
          <div class="map__wrap">
            <div data-infobox-theme="white" class="map__view js-map-canvas-contact"></div>
          </div>
        </div>
        <div class="center">
          <div class="container">
            <div class="widget js-widget widget--landing">
              <div class="widget__header">
                <h2 class="widget__title"><?=$lang['contact.title']?></h2>
                <h5 class="widget__headline"><?=$lang['contact.subtitle']?></h5>
              </div>
              <div class="widget__content">
                <div class="contacts">
                  <div class="row">
                    <div class="contacts__column">
                      <div class="contacts__address">
                        <address class="contacts__address-item"><span class="contacts__address-title">Beograd</span>
                          <dl class="contacts__address-column">
                            <dt class="contacts__address-column__title"><?=$lang['contact.address']?></dt>
                            <dd>Bokeljska 7<br>Beograd, 11000<br>Srbija</dd>
                          </dl>
                          <dl class="contacts__address-column">
                            <dt class="contacts__address-column__title"><?=$lang['contact.telephones']?>:</dt>
                            <dd>011/4054325<br>060/4480659</dd>
                            <dt class="contacts__address-column__title">Fax:</dt>
                            <dd>011/4054325</dd>
                          </dl>
                          <dl class="contacts__address-column">
                            <dt class="contacts__address-column__title"><?=$lang['contact.workhours']?></dt>
                            <dd><?=$lang['contact.weekdays']?> 09:00-17:00</dd>
                            <dt class="contacts__address-column__title">Email:</dt>
                            <dd><a href="mailto:info@jevticnekretnine.rs">info@jevticnekretnine.rs</a><br><br></dd>
                          </dl>
                        </address>
                      </div>
                    </div>
                    <div class="contacts__column">
                      <div class="contacts__body">
                        <h4><?=$lang['contact.contactus']?></h4>
                        <p><?=$lang['contact.info']?></p>
                      </div>
                      <div class="contacts__social">
                        <div class="social social--worker social--contacts"><span class="contacts__social-title"><?=$lang['contact.social']?>:</span><a href="http://www.facebook.com/pages/Jevtic-nekretnine-doo/542807059085029" target="_blank" class="social__item"><i class="fa fa-facebook"></i></a><a href="http://twitter.com/Jevticnekretine" target="_blank" class="social__item"><i class="fa fa-twitter"></i></a><a href="http://rs.linkedin.com/pub/jevtic-nekretnine/65/aa1/57a" target="_blank" class="social__item"><i class="fa fa-google-plus"></i></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="contacts__form">
                        <div class="alert alert-info">Attention! This form requires working php server for successful submit!</div>
                        <form action="#" method="POST" class="form form--flex js-contact-form form--contacts">
                          <div class="row">
                            <div class="form-group required">
                              <label for="in-form-name" class="control-label"><?=$lang['contact.form.name']?></label>
                              <input id="in-form-name" type="text" name="name" required class="form-control">
                            </div>
                            <div class="form-group form-group--col-6">
                              <label for="in-form-phone" class="control-label"><?=$lang['contact.form.phone']?></label>
                              <input id="in-form-phone" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group form-group--col-6 required">
                              <label for="in-form-email" class="control-label">E-mail</label>
                              <input id="in-form-email" type="email" name="email" required data-parsley-trigger="change" class="form-control">
                            </div>
                            <div class="form-group required">
                              <label for="in-form-message" class="control-label"><?=$lang['contact.form.text']?></label>
                              <textarea id="in-form-message" name="message" required data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message="You need to enter at least a 20 caracters long comment.." class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="row">
                            <button type="submit" class="form__submit"><?=$lang['contact.form.submit']?></button>
                          </div>
                        </form>
                        <!-- end of block form-->
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
<?php 

include_once 'parts/footer.php';
include_once 'parts/html-close.php';



?>