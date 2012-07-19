<?php

/**
 * Function to translate
 */
function __($string) {
	global $lng;
	
	return $lng->_($string);
}

/**
 * Return hash from text, we can change easily what type of hash use
 */
function makeHash ( $string ) {
	return sha1( $string );
}

/**
 * get privacy status
 * 1 - public
 * 2 - private
 * 3 - closed
 * 4 - expired
 */
function getPrivacyStatus($name, $id, $selected ) {
	$html = '<select name="'.$name.'" id="'.$id.'">';
		$html .= '<option value="1">'.__('Público').'</option>';
		$html .= '<option value="2">'.__('Privado').'</option>';
		$html .= '<option value="1">'.__('Cerrado').'</option>';
	$html .= '</select>';
	
	return $html;
}

function getRoomTypes($name, $id, $selected ) {
	$html = '<select name="'.$name.'" id="'.$id.'">';
		$html .= '<option value="Double Room">'.__('Double Room').'</option>';
		$html .= '<option value="Single Room">'.__('Single Room').'</option>';
		$html .= '<option value="Group Room">'.__('Group Room').'</option>';
	$html .= '</select>';
	
	return $html;	
}

/**
 * Search tweets
 */
function searchTweets($q, $num=5) {
	if ( !empty ( $q ) ) {
		$twitter_api = loadClass('twitter');
		$twitter_api['twitter']->setKeyword($q);
		$buffer = $twitter_api['twitter']->getSearchTweets();
		$buffer = json_decode ( $buffer );
		if ( $buffer != null ) {
			$i = 0;
			$tmp_arr = array();
			foreach ( $buffer->results as $tweets ) {
				if ( $i == $num )
					break;
				$tmp_arr[] = $tweets;
				$i++;
			}

			return (object)$tmp_arr;
		}
	} 
	
	return null;
}

/**
 * Get time select
 */
function getTimeSelect($init, $end, $id, $name, $selected ) {
	$html = '<select name="'.$name.'" id="'.$id.'">';
		for ( $i=$init; $i < $end; $i++ ) {
			$value = "";
			if ( $i == $selected ) {
				$value = "selected";
			}
			
			$html .= '<option value="'.cleanNumber($i).'" '.$value.'>'.cleanNumber($i).'</option>';
		}
	$html .= '</select>';
	
	return $html;
}

/**
 * Clean numbers
 */
function cleanNumber($num) {
	if ( $num < 10 ) {
		return "0".$num;
	}
	
	return $num;
}

/**
 * Load obj with user logged data
 */
function get_user_logged_in() {
	global $_load, $session;
	
	if ( !empty ( $_SESSION['current_user'] ) ) {
		$user_sessions = $_SESSION['current_user'];
		if ( empty ( $user_sessions ) ) {
			// check by cookie
			$user_key = $_load['securecookie']->Get('key');
			if ( !empty ( $user_key ) ) {
				$login = loadModel("login");
				$user = $login->logByCookie( $user_key );
				if ( $user != null ) {
					// save sessions and return user
					$_SESSION['current_user'] = $user;
					return $user;
				}
			}
		} else {
			return $user_sessions;
		}
	}

	return false; # user is not logged
}

function get_user_city() {
	global $_load, $_config;

	if (!empty ($_SESSION['city_selected'])) {
		return $_SESSION['city_selected'];
	} else {
		$current_user_city = $_load['securecookie']->Get('city_selected');
		if ( empty ( $current_user_city ) ) {
			$_config['selected_city'] = $_config['version_default_city'];
			return $_config['version_default_city'];
		} else {
			$_config['selected_city'] = $current_user_city;
			return $current_user_city;
		}
	}
}

function get_user_estate() {
	global $_load, $_config;

	if (!empty ($_SESSION['estate_selected'])) {
		return $_SESSION['estate_selected'];
	} else {
		$current_user_city = $_load['securecookie']->Get('estate_selected');
		if ( empty ( $current_user_city ) ) {
			$_config['selected_estate'] = $_config['version_default_estate'];
			return $_config['version_default_estate'];
		} else {
			$_config['selected_estate'] = $current_user_city;
			return $current_user_city;
		}
	}
}

function get_user_country() {
	global $_load, $_config;

	if (!empty ($_SESSION['country_selected'])) {
		return $_SESSION['country_selected'];
	} else {
		$current_user_city = $_load['securecookie']->Get('country_selected');
		if ( empty ( $current_user_city ) ) {
			$_config['selected_country'] = $_config['version_default_country'];
			return $_config['version_default_country'];
		} else {
			$_config['selected_country'] = $current_user_city;
			return $current_user_city;
		}
	}
}

function get_user_language() {
	global $_load, $_config;

	if ( !empty ( $_SESSION['language'] ) ) {
		return $_SESSION['language'];
	} else {
		$current_user_language = $_load['securecookie']->Get("language");
		if ( empty ( $current_user_language ) ) {
			$_config['i18n']['localization'] = $_config['default_language'];
			$_config['i18n']['locale'] = $_config['default_locale'];
			return $_config['default_language'];
		} else {
			$_config['i18n']['localization'] = $current_user_language;
			return $current_user_language;
		}
	}
}

function get_user_currency() {
	global $_load, $_config;

	if ( !empty ( $_SESSION['currency'] ) ) {
		return $_SESSION['currency'];
	} else {
		$current_user_currency = $_load['securecookie']->Get("currency");
		if ( empty ( $current_user_language ) ) {
			$_config['i18n']['currency'] = $_config['default_currency'];
			return $_config['default_currency'];
		} else {
			$_config['i18n']['currency'] = $current_user_currency;
			return $current_user_currency;
		}
	}
}

function get_user_ID() {
	$user = get_user_logged_in();
	if ( !empty ( $user ) ) {
		return $user->id;
	}
	
	return false;
}

/**
 * Return user local version
 */
function get_city_user_version() {
	global $_load, $_config;
	
	$user_sessions = $_load['sessions']->get('user');
	if ( empty ( $user_sessions ) ) {
		// set default city
		
	}
}

/**
 * Convierte un array a un objeto
 * http://www.richardcastera.com/2009/07/06/php-convert-array-to-object-with-stdclass/
 * 
 */
function arrayToObject($array) {
	if(!is_array($array)) {
		return $array;
	}
	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
		foreach ($array as $name=>$value) {
			$name = strtolower(trim($name));
			if (!empty($name)) {
				$object->$name = arrayToObject($value);
			}
		}
		return $object;
	}
	else {
		return FALSE;
	}
}

/**
 * Devuelve el c�digo de una plantilla
 */
function getBlock ( $tpl, $echo = true ) {
	global $_load;
	
	if ( $_load['templates']->setTemplate(VIEWS_PATH.$tpl ) ) {
		if ( $echo ) {
			$_load['templates']->getTemplate( $echo );
		} else {
			return $_load['templates']->getTemplate( $echo );
		}
	}
}

/**
 * Crea un password aleatorio
 */
function newPassword($tamano) {
    $permitidos = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $i = 0;
    $password = "";
    while ($i <= $tamano) {
        $password .= $permitidos{mt_rand(0,strlen($permitidos))};
        $i++;
    }
    return $password;
}

/**
 * Detecta si es una llamada ajax
 */
function isAjaxRequest() {
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		return true;
	}
	
	return false;
}

/**
 * Limpiamos el array POST de posibles caracteres raros
 */
function sanitizePost () {
	global $_load;
	
	if ( !empty ( $_POST ) ) {
		foreach ( $_POST as $key => $value ) {
			$_POST[$key] = $_load['sanitize']->cleanValue ( $value );
		}
	}
}

/*
 * Detect id module has been loaded
 */
function apache_is_module_loaded($mod_name) {
	$modules = apache_get_modules();
	
	return in_array($mod_name, $modules);
}

/**
 * Devuelve la URL hacia una imagen
 */
function getImgSrc ( $img ) {
	$load = loadClasses ( array ( "statics" ) );
	
	if ( $load['statics'] ) {
		return $load['statics']->imgSrc ( $img );
	}
	
	return null;
}

/**
 * Devuelve la URL hacia una javascript
 */
function getJSSrc ( $js ) {
	$load = loadClasses ( array ( "statics" ) );
	
	if ( $load['statics'] ) {
		return $load['statics']->jsSrc ( $js );
	}
	
	return null;
}

/**
 * Devuelve la URL hacia un css
 */
function getCSSSrc ( $css ) {
	$load = loadClasses ( array ( "statics" ) );
	
	if ( $load['statics'] ) {
		return $load['statics']->cssSrc ( $css );
	}
	
	return null;
}

function testaco(){
	return "hola";
}

/**
 * Create a link
 */
function setLink ( $controller="", $action = "", $args = array() ) {
	$load = loadClasses ( array ( "uri" ) );
	
	if ( $load['uri'] ) {
		$url = $load['uri']->setLink ( $controller, $action, $args );
		return $url;
	}
	
	return null;
}

function get_user_favourites($uid) {
	if ( $uid > 0 ) {
		$model = (OBJECT)loadModel("Users");
		return $model->getFavourites($uid);
	}
	
	return 0;
}

/**
 * Redirect to another page
 */
function redirect ( $action, $controller = "", $args = array() ) {
	$load = loadClasses ( array ( "uri" ) );
	
	if ( $load['uri'] ) {
		$load['uri']->redirect ( $action, $controller, $args );
	}
}

// IP and chec_proxy functions
function getUserIp( $toLong = true ) {
	/**
	 * Si se debe comprobar por proxy o no
	 */
	if ( CHECK_USER_BEHIND_PROXY ) {
		$_ip = check_ip_behind_proxy();
	} else {
		$_ip = $_SERVER["REMOTE_ADDR"];
	}
	
	// comprueba si se envia en int o no
	if ( $toLong ) {
		return ip2long( $_ip );
	} else {
		return $_ip;
	}
}

function isIPIn($ip,$net,$mask) {
	$lnet=ip2long($net);
	$lip=ip2long($ip);
	$binnet=str_pad( decbin($lnet),32,"0", STR_PAD_LEFT);
	$firstpart=substr($binnet,0,$mask);
	$binip=str_pad( decbin($lip),32,"0", STR_PAD_LEFT);
	$firstip=substr($binip,0,$mask);
	return(strcmp($firstpart,$firstip)==0);
}


function isPrivateIP($ip) {
	$privates = array ("127.0.0.0/24", "10.0.0.0/8", "172.16.0.0/12", "192.168.0.0/16");
	foreach ( $privates as $k ) {
		list($net,$mask)=preg_split("#/#",$k);
		if (isIPIn($ip,$net,$mask)) {
			return true;
		}
	}
	return false;
}

function check_ip_behind_load_balancer() {
	// It's similar to behind_proxy but faster and only takes in account
	// the last IP in the list.
	// Used to get the real IP behind a load balancer like Amazon ELB
	// WARN: does not check for valid IP, it must be a trusted proxy/load balancer
	if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
		$ips = preg_split('/[, ]/', $_SERVER["HTTP_X_FORWARDED_FOR"], -1, PREG_SPLIT_NO_EMPTY);
		$ip = array_pop($ips);
		if ($ip) return $ip;
	}
	return $_SERVER["REMOTE_ADDR"];
}

function check_ip_behind_proxy() {
	static $last_seen = '';
	
	if(!empty($last_seen) ) return $last_seen;
	
	if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
		$user_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else if ($_SERVER["HTTP_CLIENT_IP"]) {
		$user_ip = $_SERVER["HTTP_CLIENT_IP"];
	} else {
		$last_seen = $_SERVER["REMOTE_ADDR"];
		return $last_seen;
	}
	
	$ips = preg_split('/[, ]/', $user_ip, -1, PREG_SPLIT_NO_EMPTY);
	foreach ($ips as $last_seen) {
		if (preg_match('/^[1-9]\d{0,2}\.(\d{1,3}\.){2}[1-9]\d{0,2}$/s', $last_seen)
				&& !isPrivateIP($last_seen) ) {
			return $last_seen;
		}
	}
	
	$last_seen = $_SERVER["REMOTE_ADDR"];
	return $last_seen;
}

function getUserBrowser() {
	$browser = get_browser();
	return $browser->parent;
}

function getUserOS() {
	$browser = get_browser();
	return $browser->platform;
}

function getURI() {
	$load = loadClass("URI");
	echo $load['URI']->getURI();
}

/**
 * Translate controllers
 */
function controllerTranslation ( $controller ) {
	global $_config, $_load;

	if ( !empty ( $_config['controller_trans'][$_config['default_language']] ) ) {
		if ( is_array ( $_config['controller_trans'][$_config['default_language']] ) ) {
			foreach ( $_config['controller_trans'][$_config['default_language']] as $key => $value ) {
				if ( $_load['sanitize']->paranoid( $key ) == $controller ) {
					return $value;
				}
			}
		}	
	}
	
	return $controller;
}

/**
 * Trnslate actions
 */
function actionTranslation ( $action ) {
	global $_config, $_load;
	
	if ( !empty ( $_config['action_trans'][$_config['default_language']] ) ) {
		if ( is_array ( $_config['action_trans'][$_config['default_language']] ) ) {
			foreach ( $_config['action_trans'][$_config['default_language']] as $key => $value ) {
				if ( $_load['sanitize']->paranoid($key) == $action ) {
					return $value;
				}
			}
		}	
	}
	
	return $action;
}

function getControllerCrumb() {
	global $_config, $_load;
	
	return ucwords($_load['uri']->getController());
}

function getActionCrumb() {
	global $_config, $_load;
	return ucwords($_load['uri']->getAction());
}

function getImage( $path, $size = "thumb" ) {
	global $_config;
	
	if ( !empty ( $path ) ) {
		if ( empty ( $_config['thumb_sizes'][$size] ) ) {
			$size = "";
		} else {
			$size = "-$size";
		}
		
		$parts = explode (".", $path );
		$img_url = $_config['base_url']."static/uploads/".$parts[0].$size.".".$parts[1];
		
		return $img_url;
	}
}

function getImageFromId( $image_id, $size = 'thumb' ) {
	if ( $image_id > 0 ) {
		$image = loadClass("Images");
		$img_src = $image['Images']->getImage($image_id, $size );
		
		if ( !empty ( $img_src ) ) {
			return $img_src->url;
		}
	}
	
	return null;
}


function buildCalendar($data="", $link)
{
  $time = time();
  $go = $_GET['go'];
  /* Capture the current month/year of the calendar.
     If this is the first run, then use the current timestamp */
  $month            = ( empty ( $_GET['m'] ) ? date('n',$time) : (int)$_GET['m'] );
  $year             = ( empty ( $_GET['y'] ) ? date('Y',$time) : (int)$_GET['y'] );
  $day              = date('j',$time);

  /* Change the calendar based on the click of the user */
  if($go=='prev' && $month==1)
  {
    $month          = 12;
    $year--;          
  }
  else if($go=='prev' && $month>1)
  {
    $month          = $month - 1;
  }
  else if($go=='next' && $month==12)
  {
  	echo "hello";
    $month          = 1;
    $year++;          
  }
  else if($go=='next' && $month<12)
  {
    $month          = $month + 1;
  }
  
  /* Determine Preview and Next Months */
  $previousMonth    = $month==1?12:$month-1;
  $nextMonth        = $month==12?1:$month+1;
  
  /* Build the components of the Calendar */
  $monthName        = array(1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
  $dayNames         = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  
  /* The epoch of the first day of the month allows us to know
     how many days from the previous month to display AND how
     much epoch time to discount for the days counter */
  $epochFirstDay    = mktime(0,0,0,$month,1,$year);
  
  /* Know what day of week the first of the month is, you can
     determine how many days before the first exist */
  $dayOfWeekEFD     = date('w', $epochFirstDay);
  
  /* This is the discount calculation. */
  $previousMultiple = $dayOfWeekEFD * 86400;
  
  /* Get the epoch time for the day to show in the first box */
  $startCalendar    = $epochFirstDay - ( $previousMultiple -(60*60*24) );

  /* HTML for Calendar */
  $html             = 
                      '<table cellspacing="0" id="cal"><tr>'.
                      '<th><a href="'.$link.'?m='.$month.'&y='.$year.'&go=prev">&laquo;' . substr($monthName[$previousMonth],0,3) . '</a></th>'.
                      '<th colspan="5" id="title">'.$monthName[$month].' '.$year.'</th>'.
                      '<th><a href="'.$link.'?m='.$month.'&y='.$year.'&go=next">' . substr($monthName[$nextMonth],0,3) . '&raquo;</a></th>'.
                      '</tr><tr>';
  
  for($i=0;$i <35;$i++)
  {
    $html   .= '<td abbr="' . $startCalendar . '" title="'. date('l, n/j/Y',$startCalendar) . '"';
    
    if(date('n',$startCalendar) != $month) $html .= ' class="fade" ';
    if($startCalendar == mktime(0,0,0,date('m',time()),date('d',time()),date('Y',time()))) $html .= ' class="today" ';
    
    $html .= '>';
    $current_day = date("d", $startCalendar); $current_month = date("m", $startCalendar); $current_year = date("Y", $startCalendar);
    
    if ( !empty ( $data[$current_day] ) ) {
    	$html .= "<span>$current_day</span>";
    	foreach ( $data[$current_day] as $event ) {
    		$html .= "<p class='loadEvent' title='"._('Información del concierto')."' id='$event->id'>$event->title</p>";
    	}
    	$html .= '</td>';
    } else {
    	$html .= date('j',$startCalendar) . '</td>'; 
    }
    
    /* Increment the epoch counter */
    $startCalendar = $startCalendar + 86400;
    
    /* Structure of Calendar is static, so we know the row breaks */
    if($i == 6 || $i == 13 || $i == 20 || $i == 27 || $i == 34) $html .= '</tr><tr>';
  }
  
  $html .= '</tr></table>';
  
  return $html;
}

// facebook button
function getFButton($dataAllowed = "" ) {
	if ( empty ( $dataAllowed ) ) {
		$dataAllowed = array();
	}
	
	$html = '<iframe allowtransparency="true" frameborder="no" height="600" scrolling="auto" src="http://www.facebook.com/plugins/registration.php?
					client_id=183620578322567&
					redirect_uri=http://example.com/store_user_data.php?&
					fields=[
					{"name":"name"},
					{"name":"email"},
					{"name":"password"},
					{"name":"gender"},
					{"name":"birthday"},
					{"name":"captcha"}
					]"
					scrolling="auto"
					frameborder="no" 
					style="border: none;" 
					width="500"
					height="600">
					</iframe>';
	return $html;
}

function doAction($instance, $method, $args) {
	$model = loadModel($instance);
	$model->$method($args);
}

function getCountriesList($id, $name, $selected) {
	$_db = loadClass("model");
	
	$countries = $_db['model']->_db->get_results('select * from Country');
	echo $sql;
	if ( !empty ( $countries ) ) {
		$html = '<select name="'.$name.'" id="'.$id.'">';
			foreach ( $countries as $country ) {
				$selected_code = "";
				if ( $country->Code == $selected ) {
					$selected_code = " selected";
				}
				
				$html .= '<option value='.$country->Code.' '.$selected_code.'>'.utf8_encode($country->LocalName).'</option>';
			}
		$html .= '</select>';
	}
	
	return $html;
}

function getEstatesList($id, $name, $country_id, $selected) {
	$_db = loadClass("model");
	
	$estates = $_db['model']->_db->get_results(sprintf("select * from provincia where id_country = '%s' order by provincia asc", mysql_real_escape_string($country_id)));
	if ( !empty ( $estates ) ) {
		$html = '<select name="'.$name.'" id="'.$id.'">';
			$html .= "<option value='--'>---</option>";
			foreach ( $estates as $estate ) {
				$selected_code = "";
				if ( $estate->idprovincia == $selected ) {
					$selected_code = " selected";
				}
				
				$html .= '<option value='.$estate->idprovincia.' '.$selected_code.'>'.utf8_encode($estate->provincia).'</option>';
			}
		$html .= '</select>';
	}
	
	return $html;
}

function getCitiesList($id, $name, $estate_id, $selected) {
	$_db = loadClass("model");
	
	$cities = $_db['model']->_db->get_results(sprintf("select * from poblacion where idprovincia = %d", intval($estate_id)));
	if ( !empty ( $cities ) ) {
		$html = '<select name="'.$name.'" id="'.$id.'">';
			foreach ( $cities as $city ) {
				$selected_code = "";
				if ( $city->idpoblacion == $selected ) {
					$selected_code = " selected";
				}
				
				$html .= '<option value='.$city->idpoblacion.' '.$selected_code.'>'.utf8_encode($city->poblacion).'</option>';
			}
		$html .= '</select>';
	}
	
	return $html;
}

function getUserVenues($id, $name, $selected) {
	$_db = loadClass("model");
	
	$venues = $_db['model']->_db->get_results(sprintf("select * from venues where owner_id = %d", intval(get_user_ID())));
	if ( !empty ( $venues ) ) {
		$html = '<select name="'.$name.'" id="'.$id.'">';
			foreach ( $venues as $venue ) {
				$selected_code = "";
				if ( $venue->id == $selected ) {
					$selected_code = " selected";
				}
				
				$html .= '<option value='.$venue->id.' '.$selected_code.'>'.utf8_encode($venue->name).'</option>';
			}
		$html .= '</select>';
	}
	return $html;
}

function getCountryName($id) {
	if ( !empty ( $id ) ) {
		$_db = loadClass("model");
		$country = $_db['model']->_db->get_results(sprintf("select * from Country where Code = '%s'", $id));
		return utf8_encode($country[0]->LocalName);
	}
}

function getEstateName($id) {
	if ( !empty ( $id ) ) {
		$_db = loadClass("model");
		$estate = $_db['model']->_db->get_results(sprintf("select * from provincia where idprovincia = %d", $id));
		return utf8_encode($estate[0]->provincia);
	}
}

function getCityName($id) {
	if ( !empty ( $id ) ) {
		$_db = loadClass("model");
		$city = $_db['model']->_db->get_results(sprintf("select * from poblacion where idpoblacion = %d", $id));
		return utf8_encode($city[0]->poblacion);
	}
}

function setKeyName($key) {
	global $_config;
	
	$key = $_config['version'].".".strtolower(get_user_city()).".".$key;
	return $key;
}

function string2array($string) {
	if ( !empty ( $string ) ) {
		$tmpArr = array();
		$parts = explode("&", $string);
		if ( !empty ( $parts ) ) {
			$numParts = count($parts);
			for ( $i = 0; $i < $numParts; $i++ ) {
				$subParts = explode("=", $parts[$i] );
				if ( !empty ($subParts) ) {
					$tmpArr[$subParts[0]] = $subParts[1];
				}
			}
			
			return $tmpArr;
		}
	}
}

function getUserClusters($id) {
	if ( !empty ( $id ) ) {
		$mongos = new Mongo_Wrapper();
		$mongos->setDatabase("uk");
		$mongos->setCollection("London");
		$handler = $mongos->collection;
	
		$query = array(
			"user_id" => $id
		);
		
		$clusters = $handler->find();
		print_r ( $clusters );
		if ( $mongos->has_results ) {
			return $clusters;
		}
	}
	
	return null;
}

function calculateDistance($lat1, $lon1, $lat2=51.507222, $lon2=-0.1275) {
	$distance = (3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180);
	return round($distance,2);		
}

function redirectTo($url) {
	if ( !empty ( $url ) ) {
		header("Location: " . $url );
	}
}
?>