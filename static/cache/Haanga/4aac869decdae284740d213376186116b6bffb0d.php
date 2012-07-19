<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/venues/index.php */
function haanga_4aac869decdae284740d213376186116b6bffb0d($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Todos sus locales').'</h2> <p>'.__('Organice desde aquí todos los locales que administra.').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/venues/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/venues/add/" title="'.__('Nuevo Local').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($user_venues) {
        
        foreach ($user_venues as  $venue) {
            echo ' <div class="simplebox grid740"> <div class="titleh"><a href="/panel/venues/view/'.$venue->id.'"><h3>'.$venue->name.' ( '.__('en').' '.getCityName($venue->city_id).' )</h3></a></div> <div class="body padding20"> <a href="/panel/venues/view/'.$venue->id.'" class="icon-button"><img src="/static/img/icons/button/info.png" width="18" height="18" alt="icon"/><span>'.__('Ver este local').'</span></a> <a href="/panel/venues/edit/'.$venue->id.'" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>'.__('Editar local').'</span></a> <a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>'.__('Estadísticas').'</span></a> <a href="/panel/events/add?venue='.$venue->id.'" class="icon-button"><img src="/static/img/icons/button/calendar.png" width="18" height="18" alt="icon"/><span>'.__('Crear nuevo evento').'</span></a> </div> </div> ';
        }
        
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('Todavía no ha añadido ningún local!').' </h2> <p>'.__('Los locales son los lugares donde podrá organizar eventos, por ello sí desea organizar un nuevo evento primero debe añadir un local. Así podrá organizar eventos y vender entradas por cada local que tenga. Recuerde además que para administrar las entradas deberá dar de alta un nuevo terminal.').'</p> <div class="padding30"><a href="/panel/venues/add/" class="button">Crear su primer local</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}