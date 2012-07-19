<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/tickets/index.php */
function haanga_275a249590388c7f4bdcebf8bb8fdc0b8a7c3f77($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Entrada: ').' '.$ticket_data->name.'</h2> <p>'.__('Vea desde este panel toda la información de su entrada').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/venues/view/'.$ticket_data->venue_id.'" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/venues/add?venue='.$ticket_data->venue_id.'" title="'.__('Nuevo Entrada').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($ticket_data) {
        echo ' <div class="simplebox grid740"> <div class="titleh"><h3>'.__('Acciones').'</h3></div> <div class="body padding20"> <a href="/panel/tickets/edit/'.$ticket_data->id.'" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>'.__('Editar Entrada').'</span></a> <a href="/panel/coupons/new?ticket='.$ticket_data->id.'" class="icon-button"><img src="/static/img/icons/button/price-tag.png" width="18" height="18" alt="icon"/><span>'.__('Crear cupones descuento').'</span></a> <a href="#" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>'.__('Eliminar').'</span></a> </div> </div> <div class="simplebox grid360-left"> <div class="titleh"><h3>'.__('Estadísticas ventas').'</h3></div> <div class="body padding20"> Estadísticas </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Informació de la entrada').'</h3></div> <div class="body padding20"> <ul class="list-arrow"> <li>'.__('Nombre').': '.$ticket_data->name.'</li> <li>'.__('Caduca su venta').': '.date('H:i:s d/m/Y', $event_data->starts).'</li> <li>'.__('Precio').': '.$ticket_data->price.'&euro;</li> <li>'.__('Número de enetradas disponibles').': '.$ticket_data->number.'</li> </ul> </div> </div> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este evento no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/events/" class="button">'.__('Volver atrás').'</a><a href="/panel/events/add/" class="button">'.__('Crear Evento').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks).' ';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}