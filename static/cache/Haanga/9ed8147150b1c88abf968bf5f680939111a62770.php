<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/general/footer.php */
function haanga_9ed8147150b1c88abf968bf5f680939111a62770($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <div id="footer"> Footer </div> </div> <script type="text/javascript" src="/static/js/functions.js"></script> </body> </html>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}