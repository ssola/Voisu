<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/business/index.php */
function haanga_eccb6e9b1e5bcdc48e8607df5adff8d64b26ad3d($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/menu.php', $vars, TRUE, $blocks).' <div class="main_content"> <div id="col_left"> <p><img src="'.$_config['img_url'].'/business.png"></p> <p>Convierte tu cuenta en una cuenta empresarial por sólo <strong>'.$products_data->final_price.'€</strong></p> <a href="'.setLink('payments', 'product', $products_data->id).'"><p id="alta_empresa">Darme de alta ahora <strong>por sólo '.$products_data->final_price.'€</strong>! <img src="'.$_config['img_url'].'/cc.png"></p></a> </div> <div id="col_right"> <div class="alert_ad"> <h2> Vetanajas:</h2> <p>Ofertas en tiempo real</p> <p>Segmentación de usuarios avanzada</p>º <p>Estadísticas completas de tus ventas</p> <p>Cobro por uso</p> </div> </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}