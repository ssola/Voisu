<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/general/footer.php */
function haanga_b506c0770e6c8d0f39ae244b4ef8141e2fe62f12($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <!-- START FOOTER --> <div id="footer"> <div class="left-column">&copy; Copyright <?php echo date("Y"); ?> - '.__('Todos los derechos reservados').'</div> <div class="right-column">'.__('Klubme - Ayudando al ocio nocturno').'</div> </div> <!-- END FOOTER --> </div> </body> </html>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}