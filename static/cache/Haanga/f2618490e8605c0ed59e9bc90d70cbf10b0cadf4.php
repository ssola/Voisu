<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/venues/view.php */
function haanga_f2618490e8605c0ed59e9bc90d70cbf10b0cadf4($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user, $current_controller;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' '.Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <!-- Main content --> <div class="container_12"> <div class="destacados"> <h1>'.$venue_data->name.'</h1> <div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=178072415655271"; fjs.parentNode.insertBefore(js, fjs); }(document, \'script\', \'facebook-jssdk\'));</script> <!-- Description --> <section class="description results_wide grid_12"> <a href="'.getImage($venue_data->path, '').'" class="main_image fancybox"><img width="300px" height="200px" src="'.getImage($venue_data->path, 'medium').'" alt="" /></a> <div> <span> <span class="boxed"><a href="#">'.utf8_encode($venue_data->poblacion).'</a></span> </span> <span>Wellness</span> <span>Golf</span> </div> <p>'.$venue_data->description.'</p> <p> <div class="fb-like boxed" data-href="http://www.klubme.com/venue/view/'.$venue_data->id.'" data-send="true" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"> </div> </p> </section> ';
    if ($gallery) {
        echo ' <!-- Image gallery --> <section class="gallery grid_12"> <!-- Slider navigation --> <nav class="slider_nav"> <a href="#" class="left">&nbsp;</a> <a href="#" class="right">&nbsp;</a> </nav> <!-- Slider --> <div class="slider_wrapper"> <!-- Slider content --> <div class="slider_content"> ';
        foreach ($gallery as  $image) {
            echo ' <a href="'.getImage($image->path, '').'"> <img width="150px" height="110px" src="'.getImage($image->path, 'thumb').'" alt="" /> </a> ';
        }
        echo ' </div> </div> </section> ';
    }
    echo ' </div> ';
    if ($events) {
        echo ' <section class="similar_hotels grid_4"> <h2 class="section_heading">'.__('Próximos eventos').'</h2> <ul> ';
        foreach ($events as  $event) {
            echo ' <li> <a href="#" class="thumb"><img width="40px" height="40px" src="'.getImage($event->path, 'thumb').'" alt="" /></a> <h3><a href="#">'.$event->name.'</a></h3> <div> <span><a href="#">'.utf8_encode($event->poblacion).'</a></span> ';
            if ($event->price) {
                echo ' <span><strong>'.$event->price.' €</strong></span> ';
            }
            echo ' </div> </li> ';
        }
        echo ' </ul> </section> ';
    }
    echo ' <!-- Map --> <section class="map grid_4"> ';
    if ($url_map) {
        echo ' <img src="'.$url_map.'"> ';
    }
    echo ' </section> <section class="similar_hotels grid_4"> <h2 class="section_heading">'.__('Datos de contacto').'</h2> <ul> <li>'.__('Web').': '.$venue_data->web.'</li> <li>'.__('Email').': '.$venue_data->email.'</li> <li>'.__('Teléfono').': '.$venue_data->telephone.'</li> <li>'.__('País').': '.getCountryName($venue_data->country_id).'</li> <li>'.__('Ciudad').': '.getEstateName($venue_data->estate_id).'</li> <li>'.__('Provincia').': '.getCityName($venue_data->city_id).'</li> <li>'.__('Dirección').': '.$venue_data->address.'</li> </ul> </section> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}