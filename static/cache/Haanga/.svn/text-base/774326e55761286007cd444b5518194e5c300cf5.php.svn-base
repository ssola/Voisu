<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/general/header.php */
function haanga_774326e55761286007cd444b5518194e5c300cf5($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <!-- Header --> <header style="background-image:url(/static/img/party.jpg);"> <div class="container_12"> <!-- Title and navigation panel --> <div id="panel" class="grid_12"> <!-- Title --> <h1><img src="/static/img/logo_small.png"></h1> <!-- Navigation --> <nav> <ul> <li> <a href="browse.html">'.__('Fiestas').'</a> <ul> <li><a href="browse.html">'.__('Destacadas').'</a></li> <li><a href="browse_hotels.html">'.__('Ver todas').'</a></li> </ul> </li> <li> <a href="faq.html">'.__('Discotecas').'</a> <ul> <li><a href="browse.html">'.__('Destacadas').'</a></li> <li><a href="browse_hotels.html">'.__('Ver todas').'</a></li> <li><a href="browse_hotels.html">'.__('Servicios para empresas').'</a></li> </ul> </li> ';
    if ($current_user->id) {
        echo ' <li> <a href="blog.html">'.__('Tus compras').'</a> <ul> <li><a href="blog.html">'.__('Entradas compradas').'</a></li> </ul> </li> ';
    }
    echo ' <li> <a href="blog.html">Blog</a> <ul> <li><a href="blog.html">Blog</a></li> <li><a href="blogpost.html">Blogpost</a></li> </ul> </li> <li> <a href="contact.html">Contact</a> </li> </ul> <!-- Search --> <form action="#" class="black"> <input name="search" type="text" placeholder="Search..." /> <input type="submit" /> </form> </nav> </div> <div class="location grid_12"> <div style="float:left;width:50%">'.__('Está viendo eventos de la provincia de ').' <strong>'.get_user_estate().'</strong> ('.get_user_country().') '.__(' | Cambiar').'</div> ';
    if ($current_user->id) {
        echo ' <div style="float:left;width:50%;text-align:right;">Bienvenido <strong>'.$current_user->name.'</strong> | Salir ';
    } else {
        echo ' <div style="float:left;width:50%;text-align:right;">'.__('¿Quieres comprar antes que nadie entradas para las mejores fiestas?').' &nbsp; <a href="/oauth/login/facebook"><span class="fb_login">'.__('Login con Facebook').'</span></a></div> ';
    }
    echo ' </div> </div> </header>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}