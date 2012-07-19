<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/events/conditions.php */
function haanga_943611888bb5a7f110c1de1d62610815fd654e55($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Condiciones del evento').'</h2> <p>'.__('Aquí podrá especificar las condiciones de su evento que los clientes deberán aceptar.').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/events/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/events/add/" title="'.__('Nuevo Local').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> <blockquote style="margin-bottom:10px">'.__('Estás serán las condiciones que sus clientes deberán aceptar para comprar sus entradas. Así que indique claramente por ejemplo requisitos de vestimenta, edad, etc...').'</blockquote> ';
    if ($event_data) {
        echo ' <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Añadir Condiciones').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/events/conditions/'.$event_data->id.'"> <textarea name="content" id="wysiwyg" class="st-forminput" rows="5" cols="47" style="width:96.5%;">'.$content->content.'</textarea> <p style="padding:10px">'.__('La última modificación fue: ').' '.date('d/m/Y H:i:s', $content->modified).'</p> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Guardar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este evento no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/events/" class="button">'.__('Volver atrás').'</a><a href="/panel/events/add/" class="button">'.__('Crear evento').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}