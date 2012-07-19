<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/general/footer.php */
function haanga_23298f284734c3c1a9be2cb633cad1aaa61d7143($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <!-- Footer --> <footer><div class="container_12"> <nav class="grid_8"> <a href="#">Home</a> <a href="#">Catalogue</a> <a href="#">Blog</a> <a href="#">Contact</a> <a href="#">FAQ</a> </nav> <p class="address grid_4"> <strong>Travel Agency Inc.</strong><br /> <span>123 Wall Street , New York</span><br /> <span><a href="mailto:contact@travelagency.com">contact@travelagency.com</a></span> </p> <p class="copyright grid_8"> © 2011 Travel Agency </p> </div></footer> ';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}