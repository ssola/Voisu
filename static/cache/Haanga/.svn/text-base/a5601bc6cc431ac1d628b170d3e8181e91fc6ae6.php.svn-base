<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/venues/edit.php */
function haanga_a5601bc6cc431ac1d628b170d3e8181e91fc6ae6($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Edición').'</h2> <p>'.__('Desde aquí podrá editar los datos básicos de su local.').'</p></div> </div> </div> <!-- START CONTENT --> <div class="content"> ';
    if ($venue_data) {
        
        if ($success != $false) {
            echo ' <div class="albox succesbox"> <b>'.__('Editado').' :</b> '.$success.' <a href="#" class="close tips" title="close">close</a> </div> ';
        }
        echo ' <!-- START SIMPLE FORM --> <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Editando:').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/venues/edit/'.$venue_data->id.'"> <div class="st-form-line"> <span class="st-labeltext">'.__('Nombre').'</span> <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="'.$fields->name.'" /> ';
        if ($result->name) {
            echo ' <span class="st-form-error">* '.$result->name.'</span> ';
        }
        echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('País').'</span> '.$countries.' ';
        if ($result->country) {
            echo ' <span class="st-form-error">* '.$result->country.'</span> ';
        }
        echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Provincia').'</span> '.$estates.' ';
        if ($result->estates) {
            echo ' <span class="st-form-error">* '.$result->estates.'</span> ';
        }
        echo ' <div class="clear"></div> </div> '.$cities_status.' <div class="st-form-line cities_form_div"> <span class="st-labeltext">'.__('Ciudad').'</span> <div class="cities_form"> '.$cities.' ';
        if ($result->city) {
            echo ' <span class="st-form-error">* '.$result->city.'</span> ';
        }
        echo ' </div> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Dirección').'</span> <input name="address" type="text" class="st-forminput" id="address" style="width:300px" value="'.$fields->address.'" /> ';
        if ($result->address) {
            echo ' <span class="st-form-error">* '.$result->address.'</span> ';
        }
        echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Web').'</span> <input name="web" type="text" class="st-forminput" id="web" style="width:300px" value="'.$fields->web.'" /> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Email').'</span> <input name="email" type="text" class="st-forminput" id="email" style="width:300px" value="'.$fields->email.'" /> ';
        if ($result->email) {
            echo ' <span class="st-form-error">* '.$result->email.'</span> ';
        }
        echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Teléfono').'</span> <input name="telephone" type="text" class="st-forminput" id="telephone" style="width:300px" value="'.$fields->telephone.'" /> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Descripción').'</span> <textarea name="description" class="st-forminput" id="description" style="width:300px" rows="3" cols="47">'.$fields->description.'</textarea> <div class="clear"></div> </div> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Editar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> <!-- END FORM ELEMENT STYLES --> ';
    } else {
        echo ' <div class="error-page"> <img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" /> <h2 class="red">'.__('Local no encontrado').' </h2> <a href="/panel/venues/" class="button">'.__('Volver atrás').'</a> </div> ';
    }
    echo ' </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}