<?php
	global $_config;
	
	/**
	 * Application paths config
	 */
	if ( stristr( strtolower( $_SERVER['SERVER_SOFTWARE'] ), 'win') ) {
		$_separator = "\\";
	}else{
		$_separator = "/";
	}
	
	define ( "SYSTEM_PATH", dirname ( __FILE__ ) );
	define ( "CONFIG_DIR", SYSTEM_PATH . $_separator . "configs" );
	
	$_config['config_version'] = 'local_config';
	
	/**
	 * Load local configuration
	 */
	include_once ( CONFIG_DIR.$_separator.$_config['config_version'].".php" );
	
	/**
	 * Modules to load when app starts. 
	 */
	$_config['auto_load_modules'] = array ( 'error_reporting',
											'breadcrumbs',
											'input',
											'uri',
											'errors',
											'templates',
											'validation',
											'securecookie',
											'ajax',
											'browscap',
											'geo',
											'files',
											'memcached',
											'sanitize');
	
	/**
	 * Redirects configuration
	 */
	define ( "FIRST_PARAM_IS_ACTION", true ); // check if first param is action or what else
	$_config['first_params_allowed_names'] = array ( "app", "admin", "user","panel" );
	
	/**
	 * for example:
	 * http://www.test.com/app/action/controller
	 * First param will be an identifier
	 */

	/*
		PHP ERRORS
	*/
	define("E_ERROR", 1);
	define("E_WARNING", 2);
	define("E_PARSE", 4);
	define("E_NOTICE", 8);
	define("E_CORE_ERROR", 16);
	define("E_CORE_WARNING", 32);
	define("E_USER_ERROR", 256);
	define("E_USER_WARNING", 512);
	define("E_USER_NOTICE", 1024);
	define("E_STRICT", 2048);
	define("E_RECOVERABLE_ERROR", 4096);
	define("E_ALL", 8191);
	
	/**
	 * Memcached
	 */
	$_config['memcached_servers'] = array ( "127.0.0.1:11211" );
	
	define ( "SEPARATOR", $_separator );
	
	define ( "VIEW_THEME", "frontend" );
	define ( "ADMIN_THEME", "admin" );
	define ( "BUSINESS_PANEL_THEME", "panel" );
	define ( "APP_PATH", SYSTEM_PATH . $_separator . "app" );
	define ( "VIEWS_PATH", APP_PATH . $_separator . "views" );
	define ( "COMPILED_PATH", STATIC_PATH - $_separator . "compiled" );
	define ( "CORE_PATH", SYSTEM_PATH . $_separator . "core" );
	define ( "STATIC_PATH", SYSTEM_PATH.  $_separator . "static" );
	define ( "LOG_PATH", STATIC_PATH . $_separator . "logs" );
	define ( "CACHE_PATH", STATIC_PATH . $_separator . "cache" . $_separator );
	define ( "IMAGES_PATH", STATIC_PATH . $_separator . "img" );
	define ( "CSS_PATH", STATIC_PATH . $_separator . "css" );
	define ( "JS_PATH", STATIC_PATH . $_separator . "js" );
	define ( "LANG_PATH", STATIC_PATH . $_separator . "lang" );
	define ( "TMP_PATH", STATIC_PATH . $_separator . "tmp" );
	define ( "UPLOAD_PATH", STATIC_PATH . $_separator . "uploads" );
	define ( "LIBS_PATH", SYSTEM_PATH. $_separator . "libs" );
	define ( "AUTOTEST_PATH", CORE_PATH . $_separator . "simpletest" );

	
	/**
	 * Haanga configuration
	 */
	$_config['Haanga'] = array(
	    					'template_dir' => VIEWS_PATH.'/'.VIEW_THEME.'/',
	    					'cache_dir' => CACHE_PATH .'/Haanga/',
	    					'autoload' => true,
    						'compiler' => array (
	    						'if_empty' => false,
    							'autoescape' => false,
	    						'strip_whitespace' => true,
	    						'allow_exec' => true,
	    						'global' => array ('globals', 'facebook_logout_url', '_config', '_load', 'lng', 'session', 'current_user','current_controller' )
	   					 	) 
	   					 );
	
	/**
	 * Application uris config
	 */
	define ( "BASE_URL", $_config['base_url'] );
	define ( "STATIC_URL", BASE_URL . "static/" );
	define ( "IMAGES_URL", STATIC_URL . "img/" );
	define ( "CSS_URL", STATIC_URL . "css/" );
	define ( "JS_URL", STATIC_URL . "js/" );
	define ( "UPLOAD_URL", STATIC_URL . "uploads/" );
	
	$_config['img_url'] = IMAGES_URL;
	$_config['css_url'] = CSS_URL;
	$_config['js_url'] = JS_URL;
	$_config['upload_url'] = UPLOAD_URL;
	
	/**
	 * Session Zend Handler
	 */
	define(	"ZEND_SESSION_NAMESPACE", "klumbeloc" );
	
	
	/**
	 * Exclude by navigator
	 * ------------------------------------------------
	 * Send to page with information about it browser
	 * is not valid, for example, a page with information
	 * about others browsers like Chrome, Opera, etc...
	 */
	$_config['browsers_excluded'] = array (
										'IE 6.0',	# Internet explorer 6
										'IE 7.0' 	# Internet explorer 7
									);
?>