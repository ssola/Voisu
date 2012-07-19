<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/venues/index.php */
function haanga_37ed104910ae203c57f83c2914d350c0939f72db($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/menu.php', $vars, TRUE, $blocks).' <div class="main_content"> <div id="col_left"> <div class="info_index"> <img src="'.$_config['img_url'].'/venues.png"> <h2>'.__('Venues').'</h2> <p>'.__('Add all your venues. Each offer is related to your venues. So is very important to add it correctly.').'</p> <p>'.__('Remember that you must offer exactly your address, it is very important because our system can guide people to your venues efficiently.').'</p> <p><button onClick="location.href=\''.setLink('venues', 'add').'\'" class="btn btn-large"><img src="'.$_config['img_url'].'/icons/add.png"> '.__('Add your first venue').'</button></p> </div> </div> <div id="col_right"> ';
    if ($current_user->is_business == 0) {
        echo ' <div class="alert_ad"> <h2><img src="'.$_config['img_url'].'/icons/coins.png"> ¿Tienes un negocio?</h2> <p>¿Quieres ganar dinero ofreciendo ofertas? Apréta aquí y aprende como <strong>peroya</strong> puede ayudarte.</p> </div> ';
    }
    echo ' </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}