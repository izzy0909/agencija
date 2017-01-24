<?php


include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
// require_once '/lang/rs.php';
if(isset($_COOKIE['jevtic_lang']) && $_COOKIE['jevtic_lang']=='en'){
    $lang['hot'] = 'Hot offer';
}
else{
    $lang['hot'] = 'Preporuka';
}

$tempurl = 'agencija/new/';


if(isset($_REQUEST['category'])){
	$category = $_REQUEST['category'];
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : null;
    $structure = isset($_REQUEST['structure']) ? $_REQUEST['structure'] : null;
    $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
    $heat = isset($_REQUEST['heat']) ? $_REQUEST['heat'] : null;
    $setup = isset($_REQUEST['setup']) ? $_REQUEST['setup'] : null;
    $floor = isset($_REQUEST['floor']) ? $_REQUEST['floor'] : null;
    $price_from = isset($_REQUEST['price_from']) ? $_REQUEST['price_from'] : null;
    $price_to = isset($_REQUEST['price_to']) ? $_REQUEST['price_to'] : null;
    $size_from = isset($_REQUEST['size_from']) ? $_REQUEST['size_from'] : null;
    $size_to = isset($_REQUEST['size_to']) ? $_REQUEST['size_to'] : null;
    $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 1;

    $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 1;

    $items =      getItems     ($category, $id, $type, $structure, $location, $heat, $setup, $floor, $price_from, $price_to, $size_from, $size_to, $order, $start);

    $append = '';

                        foreach($items as $item){
                            $thumb = prikaziSlikuThumb($item[0]);

                            $append .= '<div class="listing__item">';
                            $append .=   '<div class="properties properties--grid">';
                            $append .=    '<div class="properties__thumb"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" target="_blank" class="item-photo"><div class="thumb-div" style="background-image:url(/' . $tempurl . '../admin/slike/watermark_' . $thumb['naziv'] . ');"></div></a>';
                                  if($item['hot_offer']){ $append .= '<span class="hot__ribon">' . $lang['hot'] . '</span>';} 
                            $append .=    '</div>';
                            //    <!-- end of block .properties__thumb-->
                            $append .=    '<div class="properties__details">';
                            $append .=      '<div class="properties__info"><a href="/' . $tempurl . 'detalji/' . $item[0] . '/' . $item['kategorija'] . '-' . str_replace(' ', '-', $item['tip']) . '-' . str_replace(' ', '-', $item['opstina']) . '" target="_blank" class="properties__address"><span class="properties__address-street">#' . $item[0] . ' - ' . $item['opstina'] .'</span><span class="properties__address-city">' . $item['namestenost'] . '</span></a>';
                            $append .=	      '<div class="properties__offer">';
                            $append .=        		'<div class="properties__offer-column">';
                            $append .=		          	'<div class="properties__offer-label">' . ($item['tip'] == 'Stan' ? $item['stan_tip'] : '&nbsp;') . '</div>';
                            $append .=				  	'<div class="properties__offer-value"><strong'; if($item['tip']=='Poslovni prostor' || $item['tip']=='Poslovna zgrada'){$append .= ' style="font-size:18px"';} $append .= '>' . $item['tip'] . '</strong></div>';
                            $append .=          	'</div>';
                            $append .=              '<div class="properties__offer-column">';
                            $append .=		              '<div class="properties__offer-value"><strong>' . $item['cena'] . '</strong><span class="properties__offer-period">&#8364;</span></div>';
                            $append .=              '</div>';
                            $append .=        '</div>';
                            $append .=      '</div>';
                            $append .=    '</div>';
                            // <!-- end of block .properties__info-->
                            $append .=  '</div>';
                            //  <!-- end of block .properties__item-->
                            $append .= '</div>';

						}
	echo $append;						
}
elseif(isset($_REQUEST['add_favorite'])){
	if(isset($_COOKIE['jevtic_favorites'])){
		$newcookie = $_COOKIE['jevtic_favorites'] . ',' . $_REQUEST['id'];
		setcookie('jevtic_favorites', $newcookie, time() + (86400 * 30));
		echo '1';
	}
	else{
		setcookie('jevtic_favorites', $_REQUEST['id'], time() + (86400 * 30));
		echo '1';
	}
}
elseif(isset($_REQUEST['remove_favorite'])){
	$oldcookie = $_COOKIE['jevtic_favorites'];
	if(stripos($oldcookie, ',')){
		if(stripos($oldcookie, $_REQUEST['id']))
		{
			$newcookie = str_replace(',' . $_REQUEST['id'], '', $oldcookie);
		}
		else{
			$newcookie = str_replace($_REQUEST['id'] . ',', '', $oldcookie);
		}
		setcookie('jevtic_favorites', $newcookie, time() + (86400 * 30));
		echo '2';
	}
	else{
		setcookie('jevtic_favorites', '1', time() - 3600);
		echo '2';
	}
}

else {

	echo '<div id="TEST">NESTO NE RADI</div>';

}