<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/venues/view.php */
function haanga_5e958063ccec59b7bff7c9042f904e0536d40da7($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Local: ').' '.$venue_data->name.'</h2> <p>'.__('Vea desde este panel toda la información de su local').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/venues/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/venues/add/" title="'.__('Nuevo Local').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($venue_data) {
        echo ' <div class="simplebox grid740"> <div class="titleh"><h3>'.__('Acciones').'</h3></div> <div class="body padding20"> <a href="/panel/venues/edit/'.$venue_data->id.'" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>'.__('Editar local').'</span></a> <a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>'.__('Estadísticas').'</span></a> <a href="/panel/events/add?venue='.$venue_data->id.'" class="icon-button"><img src="/static/img/icons/button/calendar.png" width="18" height="18" alt="icon"/><span>'.__('Crear nuevo evento').'</span></a> <a href="/panel/venues/photos/'.$venue_data->id.'" class="icon-button"><img src="/static/img/icons/button/slide.png" width="18" height="18" alt="icon"/><span>'.__('Fotografías').'</span></a> <a href="/panel/venues/delete/'.$venue_data->id.'" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>'.__('Eliminar').'</span></a> </div> </div> <div class="simplebox grid360-left"> <div class="titleh"><h3>'.__('Eventos activos').'</h3> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/events/add?venue='.$venue_data->id.'" title="'.__('Crear nuevo evento').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> <script> getEvents('.$venue_data->id.'); </script> <div class="body padding20" id="events"> <div class="loadingbox"> <img src="/static/img/loading/1.gif" width="40" height="40" alt="loading-icon" /> <h3>'.__('Cargando...').'</h3> <p>'.__('Estamos recuperando sus eventos.').'</p> </div> </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Informació del local').'</h3></div> <div class="body padding20"> <ul class="list-arrow"> <li>'.__('Nombre').': '.$venue_data->name.'</li> <li>'.__('Web').': '.$venue_data->web.'</li> <li>'.__('Email').': '.$venue_data->email.'</li> <li>'.__('Teléfono').': '.$venue_data->telephone.'</li> <li>'.__('País').': '.getCountryName($venue_data->country_id).'</li> <li>'.__('Ciudad').': '.getEstateName($venue_data->estate_id).'</li> <li>'.__('Provincia').': '.getCityName($venue_data->city_id).'</li> <li>'.__('Dirección').': '.$venue_data->address.'</li> <li>'.__('Última modificación').': '.date('H:i:s d/m/Y', $venue_data->modified).'</li> </ul> <p> ';
        if ($url_map) {
            echo ' <img src="'.$url_map.'"> ';
        }
        echo ' </p> </div> </div> <div class="simplebox grid360-left"> <div class="titleh"><h3>'.__('Logotipo').'</h3></div> <div class="body padding20"> ';
        if ($venue_logo) {
            echo ' <p><img src="'.$venue_logo.'" /></p> ';
        }
        echo ' <form action="/panel/venues/uploadlogo/" enctype="multipart/form-data" method="post"> <input type="hidden" name="venue_id" id="venue_id" value="'.$venue_data->id.'"> <div class="st-form-line" style="padding:0;margin:0;border:0;"> <span class="st-labeltext">'.__('Suba un nuevo logo').'</span> <input type="file" class="uniform" name="logo" id="logo" /> <div class="clear"></div> </div> <input type="submit" name="button" id="button" value="'.__('Subir imagen').'" class="st-button"/> </form> </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Fotogalería').'</h3></div> <div class="body"> ';
        if ($gallery) {
            echo ' <div class="imagebox"> ';
            foreach ($gallery as  $image) {
                echo ' <a href="/panel/venues/photos/'.$venue_data->id.'"><img src="'.getImage($image->path, 'thumb').'" width="46" height="38" alt="img" title="'.__('Subida el: ').date('d/m/Y H:i:s', $image->created).'" class="tips"/></a> ';
            }
            echo ' </div> ';
        } else {
            echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('Sin imágenes').' </h2> <p>'.__('Añada imágenes a la fotogalería de su local').'</p> <div class="padding30"><a href="/panel/venues/photos/'.$venue_data->id.'" class="button">'.__('Añadir imágenes').'</a></div> </div> ';
        }
        echo ' <div class="clear"></div> </div> </div> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este local no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un local que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/venues/" class="button">'.__('Volver atrás').'</a><a href="/panel/venues/add/" class="button">'.__('Crear local').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}