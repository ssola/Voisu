<?php
	// set encoding to UTF-8
	session_start();
	header('Content-Type: text/html;charset=utf-8');	$_start_time = microtime(true);
	global $_load, $session, $current_user, $lng;
	include ( "config.php" );
	
	/**
	 * Set text encode, default UTF-8
	 */
	mb_internal_encoding( TEXT_ENCODE );
	include ( "helpers/utils_helper.php");
	include ( "helpers/load_helper.php");
	include ( "factory.class.php");
	
	set_include_path(CORE_PATH);
	ZendLoadModules(array('Translate','Locale'));

	// set localization config
	$lng = new Zend_Translate(
	    array(
	        'adapter' => $_config['i18n']['handler'],
	        'content' => LANG_PATH.SEPARATOR.$_config['i18n']['localization'].SEPARATOR."app.mo",
	        'locale'  => $_config['i18n']['locale']
	    )
	);

	// Load classes
	$_load = loadClasses( $_config['auto_load_modules'] );

	include ( "ajax_calls.php" ); // load all ajax calls
	$_load['uri']->convertURI();
	
	// including Haanga template system
	require CORE_PATH . "/Haanga.php";
	$controllerAdmin = false;
	if ( $_load['uri']->getFirstArg() == "admin" ) {
		$controllerAdmin = true;
		$_config['Haanga']['template_dir'] = VIEWS_PATH.'/'.ADMIN_THEME.'/';
	} elseif( $_load['uri']->getFirstArg() == "panel" ) {
		$isBusinessPanel = true;
		$_config['Haanga']['template_dir'] = VIEWS_PATH.'/'.BUSINESS_PANEL_THEME.'/';		
	}

	Haanga::configure( $_config['Haanga'] );
	
	// set cooki global handler
	//$_load['securecookie']->init(SECRET_SALT,'app_user',time()+3600,'/','.'.DOMAIN_BASE);

	/**
	 * Check if this browser has been excluded
	 */
	/*if ( !empty ( $_config['browsers_excluded'] ) ) { 
		$browser = $_load['browscap']->getBrowser();
		if ( in_array($browser->Parent, $_config['browsers_excluded'] ) ) {
			//echo "Please update your browser!";
		}
	}*/
	
	/**
	 * Get action, controller and extra params
	 */
	$_c = $_load['uri']->getController(); // Controller
	$_a = $_load['uri']->getAction(); // Actions
	$_d = $_load['uri']->getParams(); // Data like ID or something...
	
	//Set default values
	$_c = ( empty ( $_c ) ) ? $_config['base_controller'] : $_load['sanitize']->paranoid( $_c );
	$_c = controllerTranslation ( $_c );
	
	// get action
	$_a = ( empty ( $_a ) ) ? $_config['base_action'] : $_load['sanitize']->paranoid( $_a );
	if ( is_numeric ( $_a ) ) {
		$_a = "view";
	} else {
		$_a = actionTranslation ( $_a ); // check for translation
	}

	if ( $controllerAdmin ) {
		$_c = "Admin_".$_c;
	}
	
	if ( $isBusinessPanel ) {
		$_c = "Panel_".$_c;
	}

	//Route to controller and action
	$_route = new AutoInit($_c.$_config['controller_name']);
	
	if ( $_route ) {
		//There are any param to pass by reference?
		if ( !empty ($_d) )
			$_route->setArgs($_d);
		if ( @$_route->setMethod($_a) ) {
			$_route->startInstance();
		} else {
			// If we haven't found the method, redirect to 404 page please
			//redirect ( ERROR_ACTION, ERROR_CONTROLLER_NOT_FOUND );
		}
	} else {
		//redirect ( ERROR_ACTION, ERROR_MODEL_NOT_FOUND ); // 404
	}
	
	/**
	 * end Bench, and show debug
	 */
	$_end_time = microtime(true);
	if ( $_config['debug'] ) {
		$_time = $_end_time - $_start_time;
		$memory_usage = memory_get_usage()/1024;
		echo "<p>Controller: $_c - Action: $_a - Params: ".@implode(",", $_d)." - Time: ".$_time." seconds, memory usage: $memory_usage</p>";
	}
?>