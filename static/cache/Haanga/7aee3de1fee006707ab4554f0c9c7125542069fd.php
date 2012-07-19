<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/index.php */
function haanga_7aee3de1fee006707ab4554f0c9c7125542069fd($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/menu.php', $vars, TRUE, $blocks).' <div class="main_content"> <div id="col_left"> <img src="'.$_config['img_url'].'/oferta.png"> </div> <div id="col_right"> ';
    if ($current_user->is_business == 0) {
        echo ' <div class="alert_ad"> <h2><img src="'.$_config['img_url'].'/icons/coins.png"> ¿Tienes un negocio?</h2> <p>¿Quieres ganar dinero ofreciendo ofertas? Apréta aquí y aprende como <strong>peroya</strong> puede ayudarte.</p> </div> ';
    }
    echo ' </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}