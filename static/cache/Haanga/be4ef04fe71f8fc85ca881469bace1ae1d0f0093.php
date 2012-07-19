<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/admin/users/index.php */
function haanga_be4ef04fe71f8fc85ca881469bace1ae1d0f0093($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/top.php', $vars, TRUE, $blocks).' <div class="container"> <div class="content"> <div class="page-header"> <h1>Users <small>Control the Hausu user community</small></h1> </div> <div class="row"> <div class="span10"> <h2>List of users</h2> <table class="bordered-table"> <thead> <tr> <td>uid</td> <td>User name</td> <td>Provider</td> <td>Created</td> </tr> </thead> <tbody> ';
    if ($users != $false) {
        
        foreach ($users as  $user) {
            echo ' <tr> <td>'.$user->id.'</td> <td>';
            if ($user->is_admin == '1') {
                echo ' <span class="label success">Admin</span> ';
            }
            
            if ($user->status == 'banned') {
                echo ' <span class="label error">banned</span> ';
            }
            echo ' <a href="/admin/users/view/'.$user->id.'">'.$user->name.'</a></td> <td>'.$user->oauth_provider.'</td> <td>'.date('H:i:s d/m/Y', $user->created).'</td> </tr> ';
        }
        
    }
    echo ' </tbody> </table> <div class="pagination"> <ul> ';
    foreach ($links as  $link) {
        
        if ($link['value'] == $page) {
            echo ' <li class="active"><a href="'.$link['link'].'">'.$link['value'].'</a></li> ';
        } else {
            echo ' <a href="'.$link['link'].'">'.$link['value'].'</a> ';
        }
        
    }
    echo ' </ul> </div> </div> <div class="span4"> </div> </div> </div> '.Haanga::Load('general/footer.php', $vars, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}