<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/general/sidebar.php */
function haanga_13c7c5d20ec8cbb3f0886342a79da7fed128af7b($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <!-- START SIDEBAR --> <div id="sidebar"> <!-- start searchbox --> <div id="searchbox"> <div class="in"> <form id="form1" name="form1" method="post" action=""> <input name="textfield" type="text" class="input" id="textfield" onfocus="$(this).attr(\'class\',\'input-hover\')" onblur="$(this).attr(\'class\',\'input\')" /> </form> </div> </div> <!-- end searchbox --> <!-- start sidemenu --> <div id="sidemenu"> <ul> ';
    if ($current_controller == 'dashboard') {
        echo ' <li class="active"> ';
    } else {
        echo ' <li class="subtitle"> ';
    }
    echo ' <a href="/panel/dashboard/"><img src="/static/img/icons/sidemenu/laptop.png" width="20" height="20" alt="icon"/>'.__('Inicio').'</a></li> ';
    if ($current_controller == 'venues') {
        echo ' <li class="subtitle active"> ';
    } else {
        echo ' <li class="subtitle"> ';
    }
    echo ' <a class="action" href="#"><img src="/static/img/icons/mapIcon.png" width="20" height="20" alt="icon"/>'.__('Locales').'<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a> <ul class="submenu"> <li><a href="/panel/venues/add/">'.__('Añadir nuevo').'</a></li> <li><a href="/panel/venues/">'.__('Ver todos').'</a></li> </ul> </li> ';
    if ($current_controller == 'events') {
        echo ' <li class="subtitle active"> ';
    } else {
        echo ' <li class="subtitle"> ';
    }
    echo ' <a class="action" href="#"><img src="/static/img/icons/icon_archive.png" width="20" height="20" alt="icon"/>'.__('Eventos').'<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a> <ul class="submenu"> <li><a href="/panel/events/add">'.__('Añadir nuevo').'</a></li> <li><a href="/panel/events">'.__('Ver todos').'</a></li> </ul> </li> ';
    if ($current_controller == 'billing') {
        echo ' <li class="subtitle active"> ';
    } else {
        echo ' <li class="subtitle"> ';
    }
    echo ' <a class="action" href="#"><img src="/static/img/icons/coins-icon.png" width="20" height="20" alt="icon"/>'.__('Pagos').'<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a> <ul class="submenu"> <li><a href="#">'.__('Ver historial').'</a></li> <li><a href="#">'.__('Preferencias').'</a></li> </ul> </li> </ul> </div> <!-- end sidemenu --> </div> <!-- END SIDEBAR --> ';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}