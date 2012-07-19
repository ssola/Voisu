<?php
class MongoDB_Handler implements Files_Handler {
	private static $instance;
	private static $connection;
	private static $grid;
	private static $path;
	private $connected = false;
	
	public final function __construct() {}
	public function __clone() {}
	
	public static function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
			
			// ok, now connect with MogileFS
			self::$connection = new MogileFS();
		}
		
		return self::$instance;
	}
	
	/**
	 * Personalized configuration for MongoDB handler
	 * @param $config
	 */
	public final function connect( $config ) {
		if ( is_array ( $config ) ) {
			if ( isset ( $config['host'] ) ) {
				if ( !isset ( self::$connection ) ) {
					if ( self::$connection = new Mongo($config['host']) ) {
						if ( !empty ( $config['table'] ) ) {
							self::$connection = self::$connection->{$config['table']}; // collection setted, now create a GridFS connection
							self::$grid = self::$connection->getGridFS();
							self::$path = IMAGES_PATH;
							$this->connected = true;
						} else {
							throw new Files_Error_Handler("Talbe has not been setted");
						}
					}
				}
			} else {
				throw new Files_Error_Handler("Host has not been setted");
			}
		} else {
			throw new Files_Error_handler( "Config array is empty" );
		}
		
		return false;
	}
	
	public final function add( $resource, $id ) {
		if ( $this->connected ) {
			$file_to_upload = self::$path.$resource;
			if ( file_exists ( $file_to_upload ) ) {
				echo "Hi";
				$file_id = self::$grid->storeFile($file_to_upload, array( "metadata"=> array( "filename" => $resource ) ) );
				echo $file_id;
			} else {
				echo "no";
				throw new Files_Error_Handler ( "Files $file_to_upload not exists" );
			}
		}
	}
	
	public final function get( $id ) {
		if ( !empty ( $id ) ) {
			$item = self::$grid->findOne( self::$path."/button.png" );
			header("Content-type: image/png" );
			echo $item->getBytes();
			die;
		}
	}
	
	public final function delete( $id ) {
		
	}
}
?>