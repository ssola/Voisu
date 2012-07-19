<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/venues/new.php */
function haanga_c2872f7a936e1c07d6a89e59ee88916aea7b0c96($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/menu.php', $vars, TRUE, $blocks).' <div class="main_content"> <div id="col_left"> '.$initform.' <fieldset> <legend>'.__('Your new venue').'</legend> <div class="control-group"> <label class="control-label" for="name">'.__('Name').'</label> <div class="controls"> <input type="text" class="input-xlarge" id="name" name="name" /> <p class="help-block">'.__('Please set a valid name to your venue').'</p> </div> <label class="control-label" for="input01">'.__('Address').'</label> <div class="controls"> <input type="text" class="input-xlarge" id="name" name="name" /> <p class="help-block">'.__('Set a valid address, it is necessary to place your venue correctly').'</p> </div> </div> <div class="form-actions"> <button class="btn btn-inverse" type="submit">'.__('Save Venue').'</button> <a class="btn" href="'.setLink('venues').'">'.__('Cancel').'</a> </div> </fieldset> </form> </div> <div id="col_right"> ';
    if ($current_user->is_business == 0) {
        echo ' <div class="alert_ad"> <h2><img src="'.$_config['img_url'].'/icons/coins.png"> ¿Tienes un negocio?</h2> <p>¿Quieres ganar dinero ofreciendo ofertas? Apréta aquí y aprende como <strong>peroya</strong> puede ayudarte.</p> </div> ';
    }
    echo ' </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}