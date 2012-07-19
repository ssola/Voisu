<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/tickets/add.php */
function haanga_dc4b4774895d82391c7ca92c34e15f6724a357e6($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Nueva Entrada').'</h2> <p>'.__('Crea aquí las entradas para tus eventos, diferentes entradas diferentes privilegios.').'</p></div> </div> </div> <!-- START CONTENT --> <div class="content"> <!-- START SIMPLE FORM --> <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Añadir un nueva entrada').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/tickets/add?event='.$event_id.'"> <input type="hidden" value="'.$event_id.'" id="event_id" name="event_id"> <div class="st-form-line"> <span class="st-labeltext">'.__('Nombre').'</span> <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="'.$fields->name.'" /> ';
    if ($result->name) {
        echo ' <span class="st-form-error">* '.$result->name.'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Descripción').'</span> <textarea name="description" class="st-forminput" id="description" style="width:300px" rows="3" cols="47">'.$fields->description.'</textarea> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Precio').'</span> <input name="price" type="text" class="st-forminput" id="price" style="width:100px" value="'.$fields->price.'" /> &euro; ';
    if ($result->price) {
        echo ' <span class="st-form-error">* '.$result->price.'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Caducidad').'</span> <!-- start default date picker --> <script type="text/javascript"> $(function() { $( "#expires" ).datepicker({ minDate: +0 }); }); </script> <input type="text" id="expires" name="expires" class="datepicker-input" style="width:180px;" /> <div class="clear"></div> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Número de entradas disponible').'</span> <input name="number" type="text" class="st-forminput" id="number" style="width:100px" value="'.$fields->number.'" /> ';
    if ($result->number) {
        echo ' <span class="st-form-error">* '.$result->number.'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Guardar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> <!-- END FORM ELEMENT STYLES --> </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}