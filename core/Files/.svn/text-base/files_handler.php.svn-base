<?php
/**
 * This has 
 * @author ssola
 *
 */
interface Files_Handler {
	public function add( $resource, $id );
	public function get ( $id );
	public function delete ( $id );
	public function connect ( $config );
	public function addBucket ( $name, $options );
}

interface Files_Observer {
	public function notify($observer, $args, $id);
}

abstract class Files_Observable {
	protected $observers = array();

	public function __construct() {
		$this->observers = array();
	}
	
	public function attach(Files_Observer $observer) {
		if ( !in_array($observer, $this->observers ) ) {
			$this->observers[] = $observer;
		}
	}
	
    public function detach(Files_Observer $observer) {
    	if ( in_array ( $observer, $this->observers ) ) {
    		$key = array_search($observer, $this->observers);
    		unset($this->observers[$key]);
    	}
    }	
}
?>