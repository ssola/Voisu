<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/venues/delete.php */
function haanga_c4b3ebc263321af4499e22d5e4fcd77e9d29f16a($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Eliminar local').'</h2> <p>'.__('Aquí podrá dar de baja su local.').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/venues/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/venues/add/" title="'.__('Nuevo Local').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($venue_data) {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('¿Está seguro que quiere eliminar el local ').' '.$venue_data->name.' '.__('?').'</h2> <p>'.__('Recuerde que sí da de baja este local no podrá recuperarlo. Los datos serán eliminados automáticamente, todos sus datos. Los pagos pendientes a esta cuenta serán abonados en la fecha que sea indicada igualmente.').'</p> <div class="padding30"><a href="/panel/venues/" class="button-green">'.__('Volver atrás').'</a><a href="/panel/venues/add/" class="button-red">'.__('Eliminar local').'</a></div> </div> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este local no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un local que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/venues/" class="button">'.__('Volver atrás').'</a><a href="/panel/venues/add/" class="button">'.__('Crear local').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}