<?php 

include_once '../data_base_access/dodatniTagoviDA.php';
include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
include_once '../data_base_access/ponudeDA.php';

require_once 'lang/' . checkLang() . '.php';

$active = 'submit';
$areas = prikaziSveOpstine();

$msg = 0;

if(isset($_REQUEST['submitform'])){

  if(isset($_REQUEST['terms'])){

    if(isset($_POST['g-recaptcha-response'])) {
      $captcha = $_POST['g-recaptcha-response'];
    }
    $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfLHgkUAAAAAJcMJAWpfnhsF6h9LF_lRS929gLs&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    if($response['success'] == true) {
      $kategorija = $_REQUEST['category'];
      $tip = $_REQUEST['type'];
      $stan_tip = $_REQUEST['structure'];
      $namestenost = $_REQUEST['setup'];
      $grejanje = $_REQUEST['heat'];
      $sprat = $_REQUEST['floor'];
      $lokacija_id = $_REQUEST['location'];
      $ulica = $_REQUEST['street'];
      $br = $_REQUEST['street-no'];
      $kvadratura = $_REQUEST['size'];
      $cena = $_REQUEST['price'];
      $opis = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;

      $vlasnik = $_REQUEST['name'];
      $telefon = $_REQUEST['phone'];
      $email = $_REQUEST['email'];

      $kablovska = isset($_REQUEST['kablovska']) ? '1' : '0';
      $tv = isset($_REQUEST['tv']) ? '1' : '0';
      $klima = isset($_REQUEST['klima']) ? '1' : '0';
      $internet = isset($_REQUEST['internet']) ? '1' : '0';
      $ima_telefon = isset($_REQUEST['ima_telefon']) ? '1' : '0';
      $frizider = isset($_REQUEST['frizider']) ? '1' : '0';
      $sporet = isset($_REQUEST['sporet']) ? '1' : '0';
      $vesmasina = isset($_REQUEST['vesmasina']) ? '1' : '0';
      $kuhinjskielementi = isset($_REQUEST['kuhinjskielementi']) ? '1' : '0';
      $plakari = isset($_REQUEST['plakari']) ? '1' : '0';
      $interfon = isset($_REQUEST['interfon']) ? '1' : '0';
      $lift = isset($_REQUEST['lift']) ? '1' : '0';
      $bazen = isset($_REQUEST['bazen']) ? '1' : '0';
      $garaza = isset($_REQUEST['garaza']) ? '1' : '0';
      $parking = isset($_REQUEST['parking']) ? '1' : '0';
      $dvoriste = isset($_REQUEST['dvoriste']) ? '1' : '0';
      $potkrovlje = isset($_REQUEST['potkrovlje']) ? '1' : '0';
      $terasa = isset($_REQUEST['terasa']) ? '1' : '0';
      $novogradnja = isset($_REQUEST['novogradnja']) ? '1' : '0';
      $renovirano = isset($_REQUEST['renovirano']) ? '1' : '0';
      $lux = isset($_REQUEST['lux']) ? '1' : '0';
      $penthaus = isset($_REQUEST['penthaus']) ? '1' : '0';
      $salonski = isset($_REQUEST['salonski']) ? '1' : '0';
      $lodja = isset($_REQUEST['lodja']) ? '1' : '0';
      $duplex = isset($_REQUEST['duplex']) ? '1' : '0';
      $nov_namestaj = isset($_REQUEST['nov_namestaj']) ? '1' : '0';
      $kompjuterska_mreza = isset($_REQUEST['kompjuterska_mreza']) ? '1' : '0';
      $dva_kupatila = isset($_REQUEST['dva_kupatila']) ? '1' : '0';
      $vise_telefonskih_linija = isset($_REQUEST['vise_telefonskih_linija']) ? '1' : '0';
      $stan_u_kuci = isset($_REQUEST['stan_u_kuci']) ? '1' : '0';
      $samostojeca_kuca = isset($_REQUEST['samostojeca_kuca']) ? '1' : '0';
      $kuca_s_dvoristem = isset($_REQUEST['kuca_s_dvoristem']) ? '1' : '0';
      $kucni_ljubimci = isset($_REQUEST['kucni_ljubimci']) ? '1' : '0';
      $balkon = isset($_REQUEST['balkon']) ? '1' : '0';
      $video_nadzor = isset($_REQUEST['video_nadzor']) ? '1' : '0';
      $alarm = isset($_REQUEST['alarm']) ? '1' : '0';
      $basta = isset($_REQUEST['basta']) ? '1' : '0';
      $pomocni_objekti = isset($_REQUEST['pomocni_objekti']) ? '1' : '0';
      $ostava = isset($_REQUEST['ostava']) ? '1' : '0';
      $podrum = isset($_REQUEST['podrum']) ? '1' : '0';
      $opticki_kabl = isset($_REQUEST['opticki_kabl']) ? '1' : '0';
      $open_space = isset($_REQUEST['open_space']) ? '1' : '0';
      $pristup_za_invalide = isset($_REQUEST['pristup_za_invalide']) ? '1' : '0';
      $lokal_na_ulici = isset($_REQUEST['lokal_na_ulici']) ? '1' : '0';
      $pravno_lice = isset($_REQUEST['pravno_lice']) ? '1' : '0';

      $stan_id = dodajPonudu($kategorija, $tip, $stan_tip, $vlasnik, $lokacija_id, $ulica, $br, $telefon, $email, $grejanje, $cena, $sprat, $kvadratura, $namestenost, $opis, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja, $duplex, $nov_namestaj, $kompjuterska_mreza, $dva_kupatila, $vise_telefonskih_linija, $stan_u_kuci, $samostojeca_kuca, $kuca_s_dvoristem, $kucni_ljubimci, $balkon, $video_nadzor, $alarm, $basta, $pomocni_objekti, $ostava, $podrum, $opticki_kabl, $open_space, $pristup_za_invalide, $lokal_na_ulici, $pravno_lice);

      $msg = 1;
    }
  }
}



include 'parts/html-open.php'; 
include 'parts/header.php';
include 'parts/navigation.php';

?>

      <div class="site-wrap js-site-wrap">
        <div class="center">
          <div class="container">
            <div class="row">
              <?php if($msg){
                    echo '<div class="col-lg-12">';
                    echo    '<div class="alert alert-dismissable alert-success">';
                    echo        '<button type="button" data-dismiss="alert" class="close">&#215;</button><strong>Uspešno ste poslali nekretninu </strong>.';
                    echo    '</div>';
                    echo  '</div>';
                    }
              ?>
              <div class="site site--main">
                <header class="site__header">
                  <h1 class="site__title"><?=$lang['submit.title']?></h1>
                </header>
                <div class="site__main">
                  <form class="form form--flex form--property-add js-form js-form-property" actiom="submit.php" method="POST" enctype="multipart/form-data">
                    <div class="widget js-widget widget--main widget--no-margin widget--no-border widget--collapse">
                      <div class="widget__header">
                        <h2 class="widget__title"><?=$lang['submit.basicinfo']?></h2>
                        <h5 class="widget__headline"><?=$lang['submit.fillall']?>.</h5>
                      </div>
                      <div class="widget__content">
                        <div class="row">
                          <div class="form-group">
                            <label for="in-1" class="control-label"><?=$lang['search.form.category']?></label>
                            <select id="in-1" required name="category" data-placeholder="Izaberite kategoriju..." class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="izdavanje"><?=$lang['search.form.category.rent']?></option>
                              <option value="prodaja"><?=$lang['search.form.category.sell']?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="in-2" class="control-label"><?=$lang['search.form.type']?></label>
                            <select id="in-2" required name="type" data-placeholder="Izaberite vrstu..." class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="Stan"><?=$lang['search.form.type.stan']?></option>
                              <option value="Kuća"><?=$lang['search.form.type.kuca']?></option>
                              <option value="Poslovni+prostor"><?=$lang['search.form.type.poslovniprostor']?></option>
                              <option value="Magacin"><?=$lang['search.form.type.magacin']?></option>
                              <option value="Lokal"><?=$lang['search.form.type.lokal']?></option>
                              <option value="Garaža"><?=$lang['search.form.type.garaza']?></option>
                              <option value="Poslovna+zgrada"><?=$lang['search.form.type.poslovnazgrada']?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="in-5" class="control-label"><?=$lang['search.form.structure']?></label>
                            <select id="in-5" name="structure" data-placeholder="Izaberite strukturu..." required class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="Garsonjera"><?=$lang['search.form.structure.garsonjera']?></option>
                              <option value="Jednosoban"><?=$lang['search.form.structure.jednosoban']?></option>
                              <option value="Jednoiposoban"><?=$lang['search.form.structure.jednoiposoban']?></option>
                              <option value="Dvosoban"><?=$lang['search.form.structure.dvosoban']?></option>
                              <option value="Dvoiposoban"><?=$lang['search.form.structure.dvoiposoban']?></option>
                              <option value="Trosoban"><?=$lang['search.form.structure.trosoban']?></option>
                              <option value="Troiposoban"><?=$lang['search.form.structure.troiposoban']?></option>
                              <option value="Četvorosoban"><?=$lang['search.form.structure.cetvorosoban']?></option>
                              <option value="Četvoroiposoban"><?=$lang['search.form.structure.cetvoroiposoban']?></option>
                              <option value="Petosoban i veći"><?=$lang['search.form.structure.petosobaniveci']?></option>
                            </select>
                            <!-- end of block .form-property__control-->
                          </div>
                          <div class="form-group">
                            <label for="in-8" class="control-label"><?=$lang['search.form.setup']?></label>
                            <select id="in-8" name="setup" data-placeholder="Izaberite nameštenost" required class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="Namešten"><?=$lang['search.form.setup.yes']?></option>
                              <option value="Polunamešten"><?=$lang['search.form.setup.half']?></option>
                              <option value="Nenamešten"><?=$lang['search.form.setup.no']?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="in-81" class="control-label"><?=$lang['search.form.heat']?></label>
                            <select id="in-81" name="heat" data-placeholder="Izaberite grejanje..." required class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="CG"><?=$lang['search.form.heat.cg']?></option>
                              <option value="EG"><?=$lang['search.form.heat.eg']?></option>
                              <option value="TA"><?=$lang['search.form.heat.ta']?></option>
                              <option value="PG"><?=$lang['search.form.heat.pg']?></option>
                              <option value="Klima"><?=$lang['search.form.heat.klima']?></option>
                              <option value="Na gas"><?=$lang['search.form.heat.gas']?></option>
                              <option value="Na struju"><?=$lang['search.form.heat.struja']?></option>
                              <option value="Norveški radijatori"><?=$lang['search.form.heat.norveski']?></option>
                              <option value="Mermerni radijatori"><?=$lang['search.form.heat.mermerni']?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="in-9" class="control-label"><?=$lang['search.form.floor']?></label>
                            <select id="in-9" name="floor" data-placeholder="Izaberite sprat..." required class="form-control js-in-select">
                              <option label=" "></option>
                              <option value="Suteren"><?=$lang['search.form.floor.suteren']?></option>
                              <option value="Prizemlje"><?=$lang['search.form.floor.prizemlje']?></option>
                              <option value="Visoko prizemlje"><?=$lang['search.form.floor.visokoprizemlje']?></option>
                              <option value="1. sprat"><?=$lang['search.form.floor.s1']?></option>
                              <option value="2. sprat"><?=$lang['search.form.floor.s2']?></option>
                              <option value="3. sprat"><?=$lang['search.form.floor.s3']?></option>
                              <option value="4. sprat"><?=$lang['search.form.floor.s4']?></option>
                              <option value="5. sprat"><?=$lang['search.form.floor.s5']?></option>
                              <option value="6. sprat"><?=$lang['search.form.floor.s6']?></option>
                              <option value="7. sprat"><?=$lang['search.form.floor.s7']?></option>
                              <option value="8. sprat"><?=$lang['search.form.floor.s8']?></option>
                              <option value="9. sprat"><?=$lang['search.form.floor.s9']?></option>
                              <option value="10. sprat"><?=$lang['search.form.floor.s10']?></option>
                              <option value="11. sprat"><?=$lang['search.form.floor.s11']?></option>
                              <option value="12. sprat"><?=$lang['search.form.floor.s12']?></option>
                              <option value="13. sprat"><?=$lang['search.form.floor.s13']?></option>
                              <option value="14. sprat"><?=$lang['search.form.floor.s14']?></option>
                              <option value="15. sprat"><?=$lang['search.form.floor.s15']?></option>
                              <option value="16. sprat"><?=$lang['search.form.floor.s16']?></option>
                              <option value="17. sprat"><?=$lang['search.form.floor.s17']?></option>
                              <option value="18. sprat"><?=$lang['search.form.floor.s18']?></option>
                              <option value="19. sprat"><?=$lang['search.form.floor.s19']?></option>
                              <option value="20. sprat i više"><?=$lang['search.form.floor.s20']?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="in-4" class="control-label"><?=$lang['search.form.location']?></label>
                            <select id="in-4" name="location" data-placeholder="Izaberite lokaciju..." required class="form-control js-in-select">
                              <option label=" "></option>
                              <?php 
                              foreach($areas as $lokacija){
                                echo '<option value="' . $lokacija['id'] . '">' . $lokacija['opstina'] . '</option>';
                              }
                              ?>
                            </select>
                            <!-- end of block .form-property__control-->
                          </div>
                          <div class="form-group">
                            <label for="in-6" class="control-label"><?=$lang['search.form.street']?></label>
                            <div class="col-md-9 width-fix-2" style="padding:0 5px 0 0 !important;">
                              <input id="in-6" type="text" name="street" placeholder="" required class="form-control form-control--text">
                            </div>
                            <div class="col-md-3 width-fix-3" style="padding:0 0 0 5px !important;">
                              <input id="in-61" type="text" name="street-no" placeholder="" required class="form-control form-control--text">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 width-fix" style="padding:0 5px 0 0 !important;">
                              <label for="in-3" class="control-label"><?=$lang['search.form.size']?> (&#109;&#178;)</label>
                              <input id="in-3" type="number" name="size" placeholder="" required data-parsley-type="number" class="form-control">
                            </div>
                            <div class="col-md-6 width-fix" style="padding:0 0 0 5px !important;">
                              <label for="in-7" class="control-label"><?=$lang['search.form.price']?> (&#8364;)</label>
                              <input id="in-7" type="number" name="price" placeholder="" required data-parsley-type="number" class="form-control">
                            </div>
                          </div>
                          <div class="form-group form-group--col-12">
                            <label for="in-131" class="control-label"><?=$lang['search.form.description']?></label>
                            <textarea id="in-131" name="description" data-parsley-trigger="keyup" data-parsley-minlength="50" data-parsley-validation-threshold="10" data-parsley-minlength-message="You need to enter at least a 50 caracters long comment.." class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget js-widget widget--main widget--no-margin widget--no-border widget--collapse">
                      <div class="widget__header">
                        <h2 class="widget__title"><?=$lang['submit.ownerinfo']?></h2>
                      </div>
                      <div class="widget__content">
                        <div class="row">
                          <div class="form-group">
                            <label for="in-10" class="control-label"><?=$lang['search.form.name']?></label>
                            <input id="in-10" type="text" name="name" placeholder="" required class="form-control form-control--text">
                          </div>
                          <div class="form-group">
                            <label for="in-11" class="control-label"><?=$lang['search.form.phone']?></label>
                            <input id="in-11" type="text" name="phone" placeholder="" required class="form-control form-control--text">
                          </div>
                          <div class="form-group">
                            <label for="in-12" class="control-label"><?=$lang['search.form.email']?></label>
                            <input id="in-12" type="text" name="email" placeholder="" required class="form-control form-control--text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget js-widget widget--main widget--no-margin widget--no-border widget--collapse">
                      <div class="widget__header">
                        <h2 class="widget__title"><?=$lang['submit.amenities']?></h2>
                        <h5 class="widget__headline"><?=$lang['submit.fillsome']?>.</h5>
                      </div>
                      <div class="widget__content">
                        <div class="row">
                          <div class="form-group form-group--col-12">
                            <ul class="form-property__params">
                              <li>
                                <input id="option_1" name="kablovska" type="checkbox" class="in-checkbox">
                                <label for="option_1" class="in-label">Kablovska</label>
                              </li>
                              <li>
                                <input id="option_2" name="tv" type="checkbox" class="in-checkbox">
                                <label for="option_2" class="in-label">TV</label>
                              </li>
                              <li>
                                <input id="option_3" name="klima" type="checkbox" class="in-checkbox">
                                <label for="option_3" class="in-label">Klima</label>
                              </li>
                              <li>
                                <input id="option_4" name="internet" type="checkbox" class="in-checkbox">
                                <label for="option_4" class="in-label">Internet</label>
                              </li>
                              <li>
                                <input id="option_5" name="ima_telefon" type="checkbox" class="in-checkbox">
                                <label for="option_5" class="in-label">Telefon</label>
                              </li>
                              <li>
                                <input id="option_6" name="frizider" type="checkbox" class="in-checkbox">
                                <label for="option_6" class="in-label">Frižider</label>
                              </li>
                              <li>
                                <input id="option_7" name="sporet" type="checkbox" class="in-checkbox">
                                <label for="option_7" class="in-label">Šporet</label>
                              </li>
                              <li>
                                <input id="option_8" name="vesmasina" type="checkbox" class="in-checkbox">
                                <label for="option_8" class="in-label">Veš mašina</label>
                              </li>
                              <li>
                                <input id="option_9" name="kuhinjskielementi" type="checkbox" class="in-checkbox">
                                <label for="option_9" class="in-label">Kuhinjski elementi</label>
                              </li>
                              <li>
                                <input id="option_10" name="plakari" type="checkbox" class="in-checkbox">
                                <label for="option_10" class="in-label">Plakari</label>
                              </li>
                              <li>
                                <input id="option_11" name="interfon" type="checkbox" class="in-checkbox">
                                <label for="option_11" class="in-label">Interfon</label>
                              </li>
                              <li>
                                <input id="option_12" name="lift" type="checkbox" class="in-checkbox">
                                <label for="option_12" class="in-label">Lift</label>
                              </li>
                              <li>
                                <input id="option_13" name="bazen" type="checkbox" class="in-checkbox">
                                <label for="option_13" class="in-label">Bazen</label>
                              </li>
                              <li>
                                <input id="option_14" name="garaza" type="checkbox" class="in-checkbox">
                                <label for="option_14" class="in-label">Garaža</label>
                              </li>
                              <li>
                                <input id="option_15" name="parking" type="checkbox" class="in-checkbox">
                                <label for="option_15" class="in-label">Parking</label>
                              </li>
                              <li>
                                <input id="option_16" name="dvoriste" type="checkbox" class="in-checkbox">
                                <label for="option_16" class="in-label">Dvorište</label>
                              </li>
                              <li>
                                <input id="option_17" name="potkrovlje" type="checkbox" class="in-checkbox">
                                <label for="option_17" class="in-label">Potkrovlje</label>
                              </li>
                              <li>
                                <input id="option_18" name="terasa" type="checkbox" class="in-checkbox">
                                <label for="option_18" class="in-label">Terasa</label>
                              </li>
                              <li>
                                <input id="option_19" name="novogradnja" type="checkbox" class="in-checkbox">
                                <label for="option_19" class="in-label">Novogradnja</label>
                              </li>
                              <li>
                                <input id="option_21" name="renovirano" type="checkbox" class="in-checkbox">
                                <label for="option_21" class="in-label">Renovirano</label>
                              </li>
                              <li>
                                <input id="option_22" name="lux" type="checkbox" class="in-checkbox">
                                <label for="option_22" class="in-label">Lux</label>
                              </li>
                              <li>
                                <input id="option_23" name="penthaus" type="checkbox" class="in-checkbox">
                                <label for="option_23" class="in-label">Penthaus</label>
                              </li>
                              <li>
                                <input id="option_24" name="salonski" type="checkbox" class="in-checkbox">
                                <label for="option_24" class="in-label">Salonski</label>
                              </li>
                              <li>
                                <input id="option_25" name="lodja" type="checkbox" class="in-checkbox">
                                <label for="option_25" class="in-label">Lođa</label>
                              </li>
                              <li>
                                <input id="option_26" name="duplex" type="checkbox" class="in-checkbox">
                                <label for="option_26" class="in-label">Duplex</label>
                              </li>
                              <li>
                                <input id="option_27" name="nov_namestaj" type="checkbox" class="in-checkbox">
                                <label for="option_27" class="in-label">Nov nameštaj</label>
                              </li>
                              <li>
                                <input id="option_28" name="kompjuterska_mreza" type="checkbox" class="in-checkbox">
                                <label for="option_28" class="in-label">Kompjuterska mreža</label>
                              </li>
                              <li>
                                <input id="option_29" name="dva_kupatila" type="checkbox" class="in-checkbox">
                                <label for="option_29" class="in-label">Dva kupatila</label>
                              </li>
                              <li>
                                <input id="option_30" name="vise_telefonskih_linija" type="checkbox" class="in-checkbox">
                                <label for="option_30" class="in-label">Više telefonskih linija</label>
                              </li>
                              <li>
                                <input id="option_31" name="stan_u_kuci" type="checkbox" class="in-checkbox">
                                <label for="option_31" class="in-label">Stan u kući</label>
                              </li>
                              <li>
                                <input id="option_32" name="samostojeca_kuca" type="checkbox" class="in-checkbox">
                                <label for="option_32" class="in-label">Samostojeća kuća</label>
                              </li>
                              <li>
                                <input id="option_33" name="kuca_s_dvoristem" type="checkbox" class="in-checkbox">
                                <label for="option_33" class="in-label">Kuća s dvorištem</label>
                              </li>
                              <li>
                                <input id="option_34" name="kucni_ljubimci" type="checkbox" class="in-checkbox">
                                <label for="option_34" class="in-label">Kućni ljubimci</label>
                              </li>
                              <li>
                                <input id="option_35" name="balkon" type="checkbox" class="in-checkbox">
                                <label for="option_35" class="in-label">Balkon</label>
                              </li>
                              <li>
                                <input id="option_36" name="video_nadzor" type="checkbox" class="in-checkbox">
                                <label for="option_36" class="in-label">Video nadzor</label>
                              </li>
                              <li>
                                <input id="option_37" name="alarm" type="checkbox" class="in-checkbox">
                                <label for="option_37" class="in-label">Alarm</label>
                              </li>
                              <li>
                                <input id="option_38" name="basta" type="checkbox" class="in-checkbox">
                                <label for="option_38" class="in-label">Bašta</label>
                              </li>
                              <li>
                                <input id="option_39" name="pomocni_objekti" type="checkbox" class="in-checkbox">
                                <label for="option_39" class="in-label">Pomoćni objekti</label>
                              </li>
                              <li>
                                <input id="option_40" name="ostava" type="checkbox" class="in-checkbox">
                                <label for="option_40" class="in-label">Ostava</label>
                              </li>
                              <li>
                                <input id="option_41" name="podrum" type="checkbox" class="in-checkbox">
                                <label for="option_41" class="in-label">Podrum</label>
                              </li>
                              <li>
                                <input id="option_42" name="opticki_kabl" type="checkbox" class="in-checkbox">
                                <label for="option_42" class="in-label">Optički kabl</label>
                              </li>
                              <li>
                                <input id="option_43" name="open_space" type="checkbox" class="in-checkbox">
                                <label for="option_43" class="in-label">Open space</label>
                              </li>
                              <li>
                                <input id="option_44" name="pristup_za_invalide" type="checkbox" class="in-checkbox">
                                <label for="option_44" class="in-label">Pristup za invalide</label>
                              </li>
                              <li>
                                <input id="option_45" name="lokal_na_ulici" type="checkbox" class="in-checkbox">
                                <label for="option_45" class="in-label">Lokal na ulici</label>
                              </li>
                              <li>
                                <input id="option_46" name="pravno_lice" type="checkbox" class="in-checkbox">
                                <label for="option_46" class="in-label">Pravno lice</label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget js-widget widget--main widget--no-margin widget--no-border widget--collapse">
                      <div class="widget__header">
                        <h2 class="widget__title">Photos</h2>
                        <h5 class="widget__headline">Images should have maximum size 1Mb</h5>
                      </div>
                      <div class="widget__content">
                        <div class="form-property__upload"><span class="form-property__upload-title">Upload main photo:</span>
                          <div class="form-property__upload-border">
                            <input type="file" multiple class="form-property__upload-btn-choose">
                          </div>
                        </div>
                        <div action="/file-upload" class="dropzone dropzone--submit"></div>
                      </div>
                    </div>
                    <h5 class="form-property__condition">If you have filled in all the fields and are confident of the correctness of all information, click on the button below to save data</h5>
                      <input id="terms_check" name="terms" type="checkbox" required class="in-checkbox">
                      <label for="terms_check" class="in-label">Slažem se sa <a href="ugovori/opsti_uslovi_poslovanja_jevtic_nekretnine.pdf" target="_blank">uslovima korišćenja sajta</a>.</label>
                    <div class="row">
                      <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfLHgkUAAAAAPp2Wi-1TXPHvypCzqTNo3b5vv99"></div>
                    </div>
                    <div class="row">
                      <button id="submitsubmit" name="submitform" value="1" disabled class="form__submit"><?=$lang['search.form.submit']?></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="sidebar">
                <div class="widget js-widget widget--sidebar widget--dark">
                  <div class="widget__header">
                    <h2 class="widget__title">Popular estate</h2>
                    <h5 class="widget__headline">Find your apartment or house on the exact key parameters.</h5><a class="widget__btn js-widget-btn widget__btn--toggle">Show properties</a>
                  </div>
                  <div class="widget__content">
                    <div class="listing listing--sidebar">
                      <div class="listing__item">
                        <div class="properties properties--sidebar">
                          <div class="properties__thumb"><a href="property_details.html" class="item-photo item-photo--static"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View Details</span></figure></a>
                          </div>
                          <!-- end of block .properties__thumb-->
                          <div class="properties__details">
                            <div class="properties__info"><a href="property_details.html" class="properties__address">649 West Adams Boulevard, Los Angeles, CA 90007, USA</a>
                              <!--+price-->
                            </div>
                          </div>
                          <!-- end of block .properties__info-->
                        </div>
                        <!-- end of block .properties__item-->
                      </div>
                      <div class="listing__item">
                        <div class="properties properties--sidebar">
                          <div class="properties__thumb"><a href="property_details.html" class="item-photo item-photo--static"><img src="assets/img/no-image--554x360.jpg" alt=""/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View Details</span></figure></a>
                          </div>
                          <!-- end of block .properties__thumb-->
                          <div class="properties__details">
                            <div class="properties__info"><a href="property_details.html" class="properties__address">958 Dewey Avenue, Los Angeles, CA 90006, USA</a>
                              <!--+price-->
                            </div>
                          </div>
                          <!-- end of block .properties__info-->
                        </div>
                        <!-- end of block .properties__item-->
                      </div>
                      <div class="listing__item">
                        <div class="properties properties--sidebar">
                          <div class="properties__thumb"><a href="property_details.html" class="item-photo item-photo--static"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View Details</span></figure></a>
                          </div>
                          <!-- end of block .properties__thumb-->
                          <div class="properties__details">
                            <div class="properties__info"><a href="property_details.html" class="properties__address">1026 Ohio Avenue, Long Beach, CA 90804, USA</a>
                              <!--+price-->
                            </div>
                          </div>
                          <!-- end of block .properties__info-->
                        </div>
                        <!-- end of block .properties__item-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="widget js-widget widget--sidebar widget--dark">
                  <div class="widget__header">
                    <h2 class="widget__title">Our agents</h2>
                    <h5 class="widget__headline">Find your apartment or house on the exact key parameters.</h5><a class="widget__btn js-widget-btn widget__btn--toggle">Show worker</a>
                  </div>
                  <div class="widget__content">
                    <div class="listing listing--sidebar">
                      <div class="listing__item">
                        <div data-sr="enter bottom move 80px, scale(0), over 0s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--sidebar">
                          <div class="worker__photo"><a href="agent_profile.html" class="item-photo item-photo--static"><img src="assets/media-demo/workers/worker-1.jpg" alt="Christopher Pakulla" class="photo"/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View</span></figure></a></div>
                          <h3 class="worker__name fn">Christopher Pakulla</h3>
                          <div class="worker__post">Realtor, West USA Realty</div><a href="tel:+44(0)2035102390" class="worker__tel uri">+44 (0) 20 3510 2390</a>
                        </div>
                        <!-- end of block .worker-->
                      </div>
                      <div class="listing__item">
                        <div data-sr="enter bottom move 80px, scale(0), over 0.3s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--sidebar">
                          <div class="worker__photo"><a href="agent_profile.html" class="item-photo item-photo--static"><img src="assets/media-demo/workers/worker-2.jpg" alt="Lisa Wemert" class="photo"/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View</span></figure></a></div>
                          <h3 class="worker__name fn">Lisa Wemert</h3>
                          <div class="worker__post">Managing Broker/Partner, e-PRO</div><a href="tel:+44(0)203510567" class="worker__tel uri">+44 (0) 20 3510 567</a>
                        </div>
                        <!-- end of block .worker-->
                      </div>
                      <div class="listing__item">
                        <div data-sr="enter bottom move 80px, scale(0), over 0.6s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--sidebar">
                          <div class="worker__photo"><a href="agent_profile.html" class="item-photo item-photo--static"><img src="assets/media-demo/workers/worker-3.jpg" alt="Mariusz Ciesla" class="photo"/>
                              <figure class="item-photo__hover"><span class="item-photo__more">View</span></figure></a></div>
                          <h3 class="worker__name fn">Mariusz Ciesla</h3>
                          <div class="worker__post">Real Estate Professional</div><a href="tel:+44(0)203510334" class="worker__tel uri">+44 (0) 20 3510 334</a>
                        </div>
                        <!-- end of block .worker-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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