<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/peroya/trunk/app/views/theme_default/settings/options.php */
function haanga_3f24edc9f747b8b850b6efa55ad6fdf19c5a4de1($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo ' <ul class="nav nav-tabs"> <li class="active"><a href="#city" data-toggle="tab">'.__('City').'</a></li> <li><a href="#language" data-toggle="tab">'.__('Language').'</a></li> <li><a href="#currency" data-toggle="tab">'.__('Currency').'</a></li> </ul> <div class="tab-content"> <div class="tab-pane active" id="city"> <div class="sideOptions"> <div class="leftSideOptions"> <ul class="itemselection"> ';
    if ($cities != $false) {
        
        foreach ($cities as  $city) {
            
            if ($city->city == $current_city) {
                echo ' <li><strong><a href="'.setLink('settings', 'set/city', $city->city).'">'.$city->city.'</a></strong> <span class="label">'.__('selected').'</li> ';
            } else {
                echo ' <li><a href="'.setLink('settings', 'set/city', $city->city).'">'.$city->city.'</a></li> ';
            }
            
        }
        
    }
    echo ' </ul> </div> <div class="rightSideOptions"> <p>'.__('London the biggest city in UK. You can find here thousand of apartments, rooms and flats available to ret for you').'</p> </div> </div> </div> <div class="tab-pane" id="language"> <div class="sideOptions"> <div class="leftSideOptions"> <ul class="itemselection"> ';
    if ($languages != $false) {
        
        foreach ($languages as  $language) {
            
            if ($language->real_name == $current_language) {
                echo ' <li><strong><a href="'.setLink('settings', 'set/language', $language->real_name).'">'.$language->name.'</a></strong> <span class="label">'.__('selected').'</li> ';
            } else {
                
                if ($language->available == 1) {
                    echo ' <li><a href="'.setLink('settings', 'set/language', $language->real_name).'">'.$language->name.'</a></li> ';
                } else {
                    echo ' <li>'.$language->name.' <span style="font-size:10px;">'.__('coming soon!').'</li> ';
                }
                
            }
            
        }
        
    }
    echo ' </ul> </div> <div class="rightSideOptions"> <p>This site is focused on UK so by default our main language is English, but we can offer you our site in other languages.</p> </div> </div> </div> <div class="tab-pane" id="currency"> <div class="sideOptions"> <div class="leftSideOptions"> <ul class="itemselection"> ';
    if ($currencies != $false) {
        
        foreach ($currencies as  $currency) {
            
            if ($currency->real_name == $current_currency) {
                echo ' <li><strong><a href="'.setLink('settings', 'set/currency', $currency->real_name).'">'.$currency->name.'</a></strong> <span class="label">'.__('selected').'</li> ';
            } else {
                echo ' <li><a href="'.setLink('settings', 'set/currency', $currency->real_name).'">'.$currency->name.'</a></li> ';
            }
            
        }
        
    }
    echo ' </ul> </div> <div class="rightSideOptions"> <p>Pound is the current currency in UK. By default we save all the prices in pounds, but we want help you if you are foreign to know how much is it in other currencies.</p> </div> </div> </div> </div> <script> $(function () { $(\'.tabs\').tabs() }) </script>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}