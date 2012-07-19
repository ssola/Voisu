<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/ajax/get_events.php */
function haanga_5bb52a1f92618b98eca5ad187f2896e44fa4db57($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    if ($results) {
        echo ' <ul class="statistics"> ';
        foreach ($results as  $result) {
            echo ' <li><a href="/panel/events/view/'.$result->id.'">'.$result->name.'</a> - <span class="blue">'.date('H:i:s d/m/Y', $result->starts).'</span> </p> </li> ';
        }
        echo ' </ul> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('¿Aún sin eventos?').' </h2> <div class="padding30"><a href="/panel/events/add/" class="button">'.__('Crear Evento Ahora!').'</a></div> </div> ';
    }
    if ($return == TRUE) {
        return ob_get_clean();
    }
}