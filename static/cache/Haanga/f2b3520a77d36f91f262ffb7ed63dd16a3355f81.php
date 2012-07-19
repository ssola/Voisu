<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/events/add.php */
function haanga_f2b3520a77d36f91f262ffb7ed63dd16a3355f81($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Nuevo Evento').'</h2> <p>'.__('Organize un nuevo evento en uno de sus locales.').'</p></div> </div> </div> <!-- START CONTENT --> <div class="content"> <!-- START SIMPLE FORM --> <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Añadir un nuevo evento').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/events/add"> <div class="st-form-line"> <span class="st-labeltext">'.__('Nombre').'</span> <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="'.$fields['name'].'" /> ';
    if ($result->name) {
        echo ' <span class="st-form-error">* '.$result->name.'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Descripción').'</span> <textarea name="description" class="st-forminput" id="description" style="width:300px" rows="3" cols="47">'.$fields['description'].'</textarea> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Local').'</span> '.getUserVenues('venue_id', 'venue_id', $venue_id).' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Fecha de inicio y hora').'</span> <!-- start default date picker --> <script type="text/javascript"> $(function() { $( "#starts" ).datepicker({ minDate: +0 }); }); </script> <input type="text" id="starts" name="starts" class="datepicker-input" style="width:180px;" /> '.getTimeSelect(0, 25, 'starts_hour', 'starts_hour', 22).':'.getTimeSelect(0, 60, 'starts_minutes', 'starts_minutes', 0).' <div class="clear"></div> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Fecha final y hora').'</span> <!-- start default date picker --> <script type="text/javascript"> $(function() { $( "#ends" ).datepicker({ minDate: +0 }); }); </script> <input type="text" id="ends" name="ends" class="datepicker-input" style="width:180px;" /> '.getTimeSelect(0, 25, 'ends_hour', 'ends_hour', 22).':'.getTimeSelect(0, 60, 'ends_minutes', 'ends_minutes', 0).' <div class="clear"></div> <div class="clear"></div> </div> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Guardar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> <!-- END FORM ELEMENT STYLES --> </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}