<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/general/options.php */
function haanga_6c5713135d746bb4ed1a76acf5c049321d868d63($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <div id="my-modal" class="modal hide fade" style="text-align:left;"><div class="modal-header"> <a href="#" class="close">&times;</a> <h3>'.__('Localization').'</h3> </div> <div class="modal-body"> <div id="options-content"> ... loading ... </div> <div class="modal-footer"> <a href="#" class="btn secondary">Close</a> </div> </div> </div>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}