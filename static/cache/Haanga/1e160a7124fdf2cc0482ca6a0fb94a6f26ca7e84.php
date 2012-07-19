<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/events/view.php */
function haanga_1e160a7124fdf2cc0482ca6a0fb94a6f26ca7e84($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Evento: ').' '.$event_data->name.'</h2> <p>'.__('Vea desde este panel toda la información de su evento').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/events/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/events/add/" title="'.__('Nuevo Evento').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($event_data) {
        echo ' <div class="simplebox grid740"> <div class="titleh"><h3>'.__('Acciones').'</h3></div> <div class="body padding20"> <a href="/panel/events/edit/'.$event_data->id.'" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>'.__('Editar Evento').'</span></a> <a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>'.__('Estdísticas').'</span></a> <a href="/panel/events/conditions/'.$event_data->id.'" class="icon-button"><img src="/static/img/icons/button/lock.png" width="18" height="18" alt="icon"/><span>'.__('Editar condiciones del evento').'</span></a> <a href="/panel/events/photos/'.$event_data->id.'" class="icon-button"><img src="/static/img/icons/button/slide.png" width="18" height="18" alt="icon"/><span>'.__('Fotografías').'</span></a> <a href="#" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>'.__('Eliminar').'</span></a> </div> </div> <div class="simplebox grid360-left"> <div class="titleh"><h3>'.__('Entradas').'</h3> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/tickets/add?event='.$event_data->id.'" title="'.__('Crear nuevas entradas').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> <div class="body padding20"> ';
        if ($tickets_result) {
            echo ' <ul class="statistics"> ';
            foreach ($tickets_result as  $result) {
                echo ' <li><a href="/panel/tickets/view/'.$result->id.'">'.$result->name.' ( '.$result->price.'&euro; )</a> - <span class="blue">'.date('H:i:s d/m/Y', $result->created).'</span> </p> </li> ';
            }
            echo ' </ul> <blockquote>'.__('Recuerde de especificar correctamente en la descripción las condiciones de las entradas.').'</blockquote> ';
        } else {
            echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('Todavía no ha creado entradas').' </h2> <a href="/panel/tickets/add?event='.$event_data->id.'" class="button">'.__('Crear Entradas!').'</a> </div> ';
        }
        echo ' </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Informació del evento').'</h3></div> <div class="body padding20"> <ul class="list-arrow"> <li>'.__('Nombre').': '.$event_data->name.'</li> <li>'.__('Empieza').': '.date('H:i:s d/m/Y', $event_data->starts).'</li> <li>'.__('Edad mínima: 18 años').'</li> </ul> </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Cartel').'</h3></div> <div class="body padding20"> ';
        if ($event_logo) {
            echo ' <p><img src="'.$event_logo.'" /></p> ';
        }
        echo ' <form action="/panel/events/uploadlogo/" enctype="multipart/form-data" method="post"> <input type="hidden" name="event_id" id="event_id" value="'.$event_data->id.'"> <div class="st-form-line" style="padding:0;margin:0;border:0;"> <span class="st-labeltext">'.__('Suba el cartel del evento').'</span> <input type="file" class="uniform" name="logo" id="logo" /> <div class="clear"></div> </div> <input type="submit" name="button" id="button" value="'.__('Subir cartel').'" class="st-button"/> </form> </div> </div> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este evento no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/events/" class="button">'.__('Volver atrás').'</a><a href="/panel/events/add/" class="button">'.__('Crear Evento').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}