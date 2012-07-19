<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/venues/add.php */
function haanga_e6a17301ee501f16b4108beeef6abe5ad6ea41d7($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="wrapper"> '.Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <!-- START MAIN --> <div id="main"> '.Haanga::Load('general/sidebar.php', $vars, TRUE, $blocks).' <!-- START PAGE --> <div id="page"> <!-- start page title --> <div class="page-title"> <div class="in"> <div class="titlebar"> <h2>'.__('Nuevo local').'</h2> <p>'.__('Añada un nuevo local a Klubme donde quiera hacer nuevos eventos.').'</p></div> </div> </div> <!-- START CONTENT --> <div class="content"> <!-- START SIMPLE FORM --> <div class="simplebox grid740"> <div class="titleh"> <h3>'.__('Añadir un nuevo local').'</h3> </div> <div class="body"> <form id="form2" name="form2" method="post" action="/panel/venues/add"> <div class="st-form-line"> <span class="st-labeltext">'.__('Nombre').'</span> <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="'.$fields['name'].'" /> ';
    if ($result['name']) {
        echo ' <span class="st-form-error">* '.$result['name'].'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('País').'</span> '.$countries.' ';
    if ($result['country']) {
        echo ' <span class="st-form-error">* '.$result['country'].'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Provincia').'</span> '.$estates.' ';
    if ($result['estates']) {
        echo ' <span class="st-form-error">* '.$result['estates'].'</span> ';
    }
    echo ' <div class="clear"></div> </div> '.$cities_status.' <div class="st-form-line cities_form_div"> <span class="st-labeltext">'.__('Ciudad').'</span> <div class="cities_form"> '.$cities.' ';
    if ($result['city']) {
        echo ' <span class="st-form-error">* '.$result['city'].'</span> ';
    }
    echo ' </div> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Dirección').'</span> <input name="address" type="text" class="st-forminput" id="address" style="width:300px" value="'.$fields['address'].'" /> ';
    if ($result['address']) {
        echo ' <span class="st-form-error">* '.$result['address'].'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Web').'</span> <input name="web" type="text" class="st-forminput" id="web" style="width:300px" value="'.$fields['web'].'" /> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Email').'</span> <input name="email" type="text" class="st-forminput" id="email" style="width:300px" value="'.$fields['email'].'" /> ';
    if ($result['email']) {
        echo ' <span class="st-form-error">* '.$result['email'].'</span> ';
    }
    echo ' <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Teléfono').'</span> <input name="telephone" type="text" class="st-forminput" id="telephone" style="width:300px" value="'.$fields['telephone'].'" /> <div class="clear"></div> </div> <div class="st-form-line"> <span class="st-labeltext">'.__('Descripción').'</span> <textarea name="description" class="st-forminput" id="description" style="width:300px" rows="3" cols="47">'.$fields['description'].'</textarea> <div class="clear"></div> </div> <div class="button-box"> <input type="submit" name="button" id="button" value="'.__('Guardar').'" class="st-button"/> <input type="reset" name="button" id="button2" value="'.__('Resetear').'" class="st-clear"/> </div> </form> </div> </div> <!-- END FORM ELEMENT STYLES --> </div> <!-- END CONTENT --> </div> <!-- END PAGE --> <div class="clear"></div> </div> <!-- END MAIN --> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}