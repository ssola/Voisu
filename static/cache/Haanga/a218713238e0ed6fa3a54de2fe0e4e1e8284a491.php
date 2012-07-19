<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/events/photos.php */
function haanga_a218713238e0ed6fa3a54de2fe0e4e1e8284a491($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Fotografías del evento').'</h2> <p>'.__('Añada aquí las fotografías del evento, aquí también verá las fotos subidas por los usuarios.').'</p></div> <div class="shortcuts-icons"> <a class="shortcut tips" href="/panel/events/" title="'.__('Refrescar').'"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a> <a class="shortcut tips" href="/panel/events/add/" title="'.__('Nuevo Evento').'"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a> </div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($success) {
        echo ' <div class="albox succesbox"> <b>'.__('Imagen subida').' :</b> '.$success.' <a href="#" class="close tips" title="close">close</a> </div> ';
    }
    
    if ($error) {
        echo ' <div class="albox errorbox"> <b>'.__('Imagen no subida').' :</b> '.$error.' <a href="#" class="close tips" title="close">close</a> </div> ';
    }
    
    if ($event_data) {
        echo ' <div style="overflow:hidden;height:auto;"> <div class="simplebox grid360-left"> <div class="titleh"><h3>'.__('Suba una nueva imagen').'</h3></div> <div class="body padding20"> <form action="/panel/events/photos/'.$event_data->id.'" enctype="multipart/form-data" method="post"> <div class="st-form-line" style="padding:0;margin:0;border:0;"> <input type="file" class="uniform" name="image" id="image" /> <div class="clear"></div> </div> <input type="submit" name="button" id="button" value="'.__('Subir imagen').'" class="st-button"/> </form> </div> </div> <div class="simplebox grid360-right"> <div class="titleh"><h3>'.__('Requisitos de la imagen').'</h3></div> <div class="body padding20"> <blockquote>'.__('La imagen no puede ocupar más de 1MB, y sólo se aceptan gif, jpg y png, e imágenes que sean de su propiedad intelectual.').'</blockquote> </div> </div> </div> <!-- Start Important prettyPhoto Js Codde --> <script type="text/javascript"> $(document).ready(function(){ $("area[rel^=\'prettyPhoto\']").prettyPhoto(); $(".get-photo a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'normal\',theme:\'light_square\',slideshow:3000, autoplay_slideshow: true}); $(".get-photo a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'fast\',slideshow:10000, hideflash: true}); $("#custom_content a[rel^=\'prettyPhoto\']:first").prettyPhoto({ custom_markup: \'<div id="map_canvas" style="width:260px; height:265px"></div>\', changepicturecallback: function(){ initialize(); } }); $("#custom_content a[rel^=\'prettyPhoto\']:last").prettyPhoto({ custom_markup: \'<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>\', changepicturecallback: function(){ _bsap.exec(); } }); }); </script> <!-- End Important prettyPhoto Js Codde --> <!-- Start Photos --> <div class="grid740"> <div class="simpletitle"> <h3>'.__('Sus imágenes').'</h3> </div> ';
        if ($gallery) {
            
            foreach ($gallery as  $image) {
                echo ' <div class="get-photo" id="'.$image->id.'"> <div class="buttons"> <a href="#" class="mini-delete" action="photo_events" actionid="'.$image->id.'">Delete</a> <div class="clear"></div></div> <a href="'.getImage($image->path, '').'" rel="prettyPhoto" title=""><img src="'.getImage($image->path, 'medium').'" width="175" height="110" alt="'.__('Subida el: ').date('d/m/Y H:i:s', $image->created).'"/></a><p>'.date('d/m/Y H:i:s', $image->created).'</p> </div> ';
            }
            
        } else {
            echo ' <div class="error-page"> <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" /> <h2 class="blue">'.__('Sin imágenes').' </h2> <p>'.__('Ops! Todavía no ha subido ninguna imagen, por favor suba imágenes de su evento, así la gente podrá saber que se encontrará una vez qué llegue. Ya sabes, una imagen vale más que mil palabras.').'</p> </div> ';
        }
        echo ' <div class="clear"></div> </div> <!-- End Photos --> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Este evento no existe').' </h2> <p>'.__('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!').'</p> <div class="padding30"><a href="/panel/events/" class="button">'.__('Volver atrás').'</a><a href="/panel/events/add/" class="button">'.__('Crear local').'</a></div> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}