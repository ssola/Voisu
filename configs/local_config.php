<?php
	/**
	 * United Kingdom version
	 */

	global $_config;
	
	define("SITE_CLOSED", true);
	
	/**
	 * Config file: Spanish version
	 */
	define ( "DOMAIN_BASE", "klubme.loc" );
	define("SUBDOMAINS_ACTIVE", false );
	$_config['domain_base'] = DOMAIN_BASE;
	$_config['config_version'] = 'local_config';
	$_config['base_url'] = "http://".DOMAIN_BASE."/";
	$_config['subdomain_url'] = ".".DOMAIN_BASE."/";
	$_config['base_controller'] = "index";
	$_config['base_action'] = "index";
	$_config['debug'] = true;
	$_config['rewrite'] = true;
	$_config['controller_name'] = "_Controller";
	
	/**
	 * Set default localization config
	 */
	$_config['version'] = 'es';
	$_config['version_name'] = "Spain";
	$_config['version_default_city'] = "Barcelona";
	$_config['version_default_estate'] = "Barcelona";
	$_config['version_default_country'] = "ESP";
	$_config['default_language'] = "es_ES";
	$_config['default_currency'] = "euro";

	/**
	 * Config localization
	 */
	$_config['i18n'] = array(
		'handler' => 'gettext',
		'localization' => 'es_ES',
		'locale' => 'es',
		'currency' => 'euro'
	);

	/**
	 * Data Base config
	 */
	define ( "DB_USER", "root" );
	define ( "DB_PASS","PASSWORD" );
	define ( "DB_DATABASE", "klubme" );
	define ( "DB_HOST", "localhost" );
	define ( "DB_PORT", "" );

	/**
	 * Geolocalization
	 */
	define ( "GEOIP_API_KEY", "" );
	
		/**
	 * Basic configuration
	 */
	define ( "SAVE_LOG", true );
	define ( "SHOW_PHP_ERRORS", true );
	define ( "AUTODETECT_MOD_REWRITE", true );
	define ( "ERROR_ACTION", "error" );
	define ( "ERROR_CONTROLLER_NOT_FOUND", "notFound" );
	define ( "TIME_ZONE", "Europe/Madrid" ); // check for time zone supported: http://www.php.net/manual/en/timezones.php
	define ( "TEXT_ENCODE", "UTF-8" );
	define ( "DEFAULT_CURRENCY", "Euro" );
	define ( "DEFAULT_LOCALIZATION", "es_ES" );
	define ( "LOCALIZATION_NAME", "app_lang" );
	define ( "CHECK_USER_BEHIND_PROXY", false );
	define ( "PROFILER_ACTIVE", false );
	//define ( "")
	
	/**
	 * Ajax Configuration
	 */
	define ( "AJAX_DETECT_IS_AJAX_REQUEST", false );
	define ( "AJAX_SET_LIMIT_CALLS_BY_ACTION", false ); // set a limit calls per action and user
	
		/**
	 * Salts for crypt
	 */
	define ( "SECRET_SALT", "�berSecret@Salt_CrEaTeD_By()s0m30n3");
	
	/**
	 * Amazon S3
	 */
	define ( "AMAZON_ACCESS_KEY", "" );
	define ( "AMAZON_SECRET_KEY", "" );

	/**
	* Geo IP
	*/
	$_config['geo_ip_api_key'] = "08aba45fb5dbc5c24800ab144ec8025542d65ce7e23ad5a38d7d2435deff78b0";

	/*
	 * Facebook
	 */	
	$_config['facebook_config'] = array(
		"appId" => "APPID",
		"secret" => "SECRET",
		"nextUrl" => $_config['base_url'],
		"scope" => "email,user_about_me,user_birthday,user_relationships,publish_stream,offline_access"
	);
		
	/**
	 * Sessions
	 */
	define( "win_session_save_path", "c:\\temp" );
	define( "linux_session_save_path", "/tmp" );
	
	/**
	 * Last FM API
	 */
	define ( "LASTFM_APIKEY", "" );
	define ( "LASTFM_SECRETKEY", "" );
	define ( "LASTFM_APIURL", "http://ws.audioscrobbler.com/2.0/" );
	
	/**
	 * Thumbnails sizes
	 */
	$_config['thumb_sizes'] = array ( 
								"thumb" => array ( 50, 50 ),
								"medium" => array(200,200)
							);S
	
	require_once 'translations.php';
?>
