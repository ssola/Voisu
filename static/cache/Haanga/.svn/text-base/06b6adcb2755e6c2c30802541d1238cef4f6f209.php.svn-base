<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/payments/index.php */
function haanga_06b6adcb2755e6c2c30802541d1238cef4f6f209($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/menu.php', $vars, TRUE, $blocks).' <div class="main_content"> <div id="col_left"> <div class="info_index"> <img src="'.$_config['img_url'].'/payments.png"> <h2>'.__('Payments').'</h2> <p>'.__('Here you will find a history of all the payments registered to you. As well you will find here all your recipes and pending paids.').'</p> <p>If you have any trouble with payments, please read the support page or send us an email as soon as possible.</a> </div> <div class="payment_row"> <div class="payment_row_left"> Alta De Empresa ( 5.45€ ) </div> <div class="payment_row_right"> <strong>PAGADO</strong> </div> <div class="payment_row_right" style="margin-left:10px"> <a href="'.setLink('bills', 'pdf', 1).'"><img src="'.$_config['img_url'].'/icons/page_white_acrobat.png"></a> </div> </div> <div class="payment_row" style="background:#FFABA8"> <div class="payment_row_left"> <strong>Alta De Empresa ( 5.45€ )</strong> </div> <div class="payment_row_right"> <strong>SIN PAGAR</strong> </div> <div class="payment_row_right" style="margin-left:10px"> <img src="'.$_config['img_url'].'/icons/creditcards.png"> </div> </div> <div class="payment_row"> <div class="payment_row_left"> Recibo mes de mayo ( 234.23€ ) </div> <div class="payment_row_right"> <strong>PAGADO</strong> </div> <div class="payment_row_right" style="margin-left:10px"> <img src="'.$_config['img_url'].'/icons/page_white_acrobat.png"> </div> </div> </div> <div id="col_right"> <div class="alert_ad"> <h2><img src="'.$_config['img_url'].'/icons/info.png"> '.__('Remember').'</h2> <p>'.__('Each end of month we will set here a request for a payment, so each end of month you will have to paid us the recipes.').'.</p> </div> </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}