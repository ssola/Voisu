<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/theme_default/general/menu.php */
function haanga_e8cb6db32f8e75ba757c7af1f0a764792f2a67e9($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <div id="header"> <div id="header"> <div style="overflow:hidden;"> <div id="header-left"> <a href="/"><img src="'.$_config['img_url'].'/logo.png" alt="PeroYa" /> </a> </div> <div id="header-right"> <div id="user_bar"> ';
    if ($current_user->id > 0) {
        echo ' <img src="http://graph.facebook.com/'.$current_user->oauth_userid.'/picture?type=small" width="16px" height="16px" align="abbsmiddle" > '.__('Welcome').' <a href="'.setLink('users', 'home').'"><strong>'.$current_user->name.'</strong></a> | ';
        if ($current_user->is_business == 0) {
            echo ' <a href="'.setLink('business').'"><img src="'.$_config['img_url'].'/icons/money.png"> '.__('Are you a Business?').'</a> ';
        }
        echo ' | <a href="'.setLink('support', 'index').'">'.__('Support').'</a> | <a href="'.$facebook_logout_url.'"><span id="logout">'.__('Logout').'</span></a> ';
    } else {
        echo ' '.__('You don´t have an accout yet?').' <span class="label notice"><a href="'.setLink('login').'">'.__('Register or Login').'</a></span> ';
    }
    echo ' </div> <div> <div style="float:left;width:50%;"> <span style="font-size:22px;">'.$_config['selected_city'].'</span><span style="font-size:14;"> '.__('version').'</span> </div> <div style="float:left;width:50%;text-align:right;"> <span id="change_options"><img src="'.$_config['img_url'].'/city.png"> '.__('City / Language / Currency').'</span> </div> </div> </div> </div> </div> <div id="menu"> <div id="topbar"> <ul> <li><a href="'.setLink('index').'">'.__('Home').'</a></li> <li><a href="'.setLink('search').'">'.__('Ofertas').'</a></li> <li><a href="'.setLink('search', 'map').'">'.__('Empresas').'</a></li> ';
    if ($current_user->is_business == 1) {
        echo ' <li><a href="'.setLink('venues').'"><img src="'.$_config['img_url'].'/icons/door_open.png"> '.__('Your venues').'</a></li> <li><a href="'.setLink('search', 'map').'"><img src="'.$_config['img_url'].'/icons/tag_red.png"> '.__('Your deals').'</a></li> <li><a href="'.setLink('search', 'map').'"><img src="'.$_config['img_url'].'/icons/pencil.png"> '.__('Preferences').'</a></li> <li><a href="'.setLink('payments').'"><img src="'.$_config['img_url'].'/icons/coins.png"> '.__('Payments').'</a></li> ';
    }
    echo ' </ul> </div> ';
    if ($breadcrumb != $null) {
        echo ' <div> <ul id="crumbs"> ';
        foreach ($breadcrumb as  $items) {
            echo ' <li> ';
            if ($items['url'] != '') {
                echo ' <a href="'.$item->url.'">'.$items['title'].'</a> ';
            } else {
                echo ' '.$items['title'].' ';
            }
            echo ' </li> ';
        }
        echo ' </ul> </div> ';
    }
    echo ' </div> </div>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}