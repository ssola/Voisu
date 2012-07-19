<?php
$HAANGA_VERSION  = '1.0.4';
/* Generated from /Users/ssola/Documents/workspace/klubme-webapp/app/views/panel/login/login.php */
function haanga_b5fd186139317123929b93a8e113eb4d65c792f6($vars, $return=FALSE, $blocks=array())
{
    global $globals, $facebook_logout_url, $_config, $_load, $lng, $session, $current_user;
    extract($vars);
    if ($return == TRUE) {
        ob_start();
    }
    echo Haanga::Load('general/header.php', $vars, TRUE, $blocks).' <div class="loginform"> <div class="title"> <img src="/static/img/logo.png" width="112" height="35" /></div> <div class="body"> <form id="form1" name="form1" method="post" action="/panel/login/"> <label class="log-lab">'.__('Email').'</label> <input name="email" type="text" class="login-input-user" id="email" value="'.$data['email'].'"/> <label class="log-lab">'.__('Password').'</label> <input name="password" type="password" class="login-input-pass" id="password" value="'.$data['password'].'"/> <input type="submit" name="button" id="button" value="'.__('Acceder').'" class="button"/> </form> </div> </div> </div> </body> </html>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}