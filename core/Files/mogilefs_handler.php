<?php
class MogileFS_Handler implements Files_Handler {
	private static $instance;
	private static $connection;
	
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
	
	public final function add( $resource, $id ) {
		
	}
	
	public final function get( $id ) {
		
	}
	
	public final function delete( $id ) {
		
	}
}
?>