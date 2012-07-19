<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/events/edit.php */
function haanga_793d3267640dc517b57e52f5ee5f038e8d0b96c2($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Editando Evento').'</h2> <p>'.__('Edite sus eventos cuando quiera.').'</p></div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($event_data) {
        
        if ($success != $false) {
            echo ' <div class="albox succesbox"> <b>'.__('Editado').' :</b> '.$success.' <a href="#" class="close tips" title="close">close</a> </div> ';
        }
        echo ' <!-- START SIMPLE FORM --> <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Editar evento').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/events/edit/'.$event_data->id.'"> <div class="st-form-line"> <span class="st-labeltext">'.__('Nombre').'</span> <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="'.$fields->name.'" /> ';
        if ($result->name) {
            echo ' <span class="st-form-error">* '.$result->name.'</span> ';
        }
        echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Descripción').'</span> <textarea name="description" class="st-forminput" id="description" style="width:300px" rows="3" cols="47">'.$fields->description.'</textarea> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Local').'</span> '.getUserVenues('venue_id', 'venue_id', $fields->venue_id).' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Fecha de inicio y hora').'</span> <!-- start default date picker --> <script type="text/javascript"> $(function() { $( "#starts" ).datepicker({ minDate: +0 }); }); </script> <input type="text" id="starts" name="starts" class="datepicker-input" style="width:180px;" value="'.date('m/d/Y', $fields->starts).'" /> '.getTimeSelect(0, 25, 'starts_hour', 'starts_hour', 22).':'.getTimeSelect(0, 60, 'starts_minutes', 'starts_minutes', 0).' <div class="clear"></div> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Fecha final y hora').'</span> <!-- start default date picker --> <script type="text/javascript"> $(function() { $( "#ends" ).datepicker({ minDate: +0, }); }); </script> <input type="text" id="ends" name="ends" class="datepicker-input" style="width:180px;" value="'.date('m/d/Y', $fields->final).'" /> '.getTimeSelect(0, 25, 'ends_hour', 'ends_hour', 22).':'.getTimeSelect(0, 60, 'ends_minutes', 'ends_minutes', 0).' <div class="clear"></div> <div class="clear"></div> </div> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Editar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> <!-- END FORM ELEMENT STYLES --> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Evento no encontrado').' </h2> <a href="/panel/events/" class="button">'.__('Volver atrás').'</a> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}