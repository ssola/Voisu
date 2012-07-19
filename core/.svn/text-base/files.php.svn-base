<?php
/**
 * TODO
 * - MongoDB qe use GridFS
 *  - That upload automatically the file to the mongodb infrastructure.
 */
/**
 * define errors
 */
define ( "SERVICE_NOT_EXISTS", 101 );
define ( "SERVICE_UNAVAILABLE", 102 );

require_once ( "Files/files_handler.php" );
require_once ( "Files/files_error_handler.php" );

/**
 * Facade pattern to ser with which file service to work, MogiloFS or MongoDB.
 */
class Files extends Files_Observable {
	private static		$selected_service = "file"; // ( mogilofs or mongodb );
	private	static		$available_services = array ( "mogilefs", "mongodb", "file" );
	protected static 	$instance;
	private static		$show_errors = true;
	private	static		$handler;
	
	public final function __construct() {}
	public function __clone() {}
	
	/**
	 * Return just one instance for this class
	 */
	public final static function getInstance() {
		if ( !isset( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Set the service handler to use to manage files.
	 * @param unknown_type $service
	 */
	public final function setService ( $service ) {
		if ( !empty ( $service ) ) {
			if ( in_array( $service, self::$available_services ) ) {
				self::$selected_service = $service;
				// check if this service is installed in this server
				switch ( self::$selected_service ) {
					case 'mogilefs':
						// check if mogie has been installed
						if ( class_exists( "MogileFs" ) ) {
							// ok, call to MogileFs handler
							self::$handler = /*Factory::load("MogileFS_Handler");*/ MogileFS_Handler::getInstance();
						} else {
							throw new Files_Error_Handler( "MogileFS has not been installed in this server see that: http://projects.usrportage.de/index.fcgi/php-mogilefs/wiki/documentation", SERVICE_NOT_EXISTS );
						}
						break;
					case 'mongodb':	// using GridFS
						if ( class_exists( "Mongo" ) ) {
							require_once ( "Files/mongodb_handler.php" );
							self::$handler = new MongoDB_Handler();
						} else {
							throw new Files_Error_Handler ( "MongoDB has not been installed in this server", SERVICE_NOT_EXISTS );
						}
 						break;
					case 'file':
						if ( file_exists ( CORE_PATH.SEPARATOR."Files/file_handler.php" ) ) {
							require_once ( "Files/file_handler.php" );
							self::$handler = new File_Handler();
						} else {
							throw new Files_Error_Handler ( "File class has not been installed", SERVICE_NOT_EXISTS );
						}
						break;
				}
			}
		}
	}
	
	/**
	 * Public functions
	 */
	public final function add( $resource, $id="" ) {
		return self::$handler->add( $resource, $id );
	}
	
	public final function connect ( $config ) {
		return self::$handler->connect ( $config );
	}
	
	public final function get ( $id ) {
		return self::$handler->get ( $id );
	}
	
	public final function addBucket( $name, $options="" ) {
		return self::$handler->addBucket($name, $options);
	}
	
    public function notify($message, $id) {
        foreach($this->observers as $observer) {
            $observer->notify($this, $message, $id);
        }
    }
}

/**
$files_handler = Files::getInstance();

try {
	$files_handler->setService('file');
	$config = array ( "host" => "localhost", "table" => "files" );
	$files_handler->connect ( $config );
} catch ( Files_Error_Handler $e ) {
	if ( $e->getCode() == SERVICE_NOT_EXISTS ) {
		print_r ( $e );
	} 
}**/
?>