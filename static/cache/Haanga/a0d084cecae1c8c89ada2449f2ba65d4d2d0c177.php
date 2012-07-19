<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/admin/general/footer.php */
function haanga_a0d084cecae1c8c89ada2449f2ba65d4d2d0c177($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <footer> <p>&copy; Hausu 2012</p> </footer> </div> <!-- /container --> <script src="/static/js/jquery.js"></script> <script src="/static/js/bootstrap-dropdown.js"></script> </body> </html>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}