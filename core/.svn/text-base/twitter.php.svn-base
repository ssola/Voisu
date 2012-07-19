<?php
class Twitter {
	private $q;
	private	$buffer;
	static 	$instance;
	private $url_search = 'http://search.twitter.com/search.json?&q=';
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Set keywords to search
	 */
	public function setKeyword( $key ) {
		if ( !empty ( $key ) ) {
			$this->q = trim($key);
		}
	}
	
	/**
	 * Search for tweets
	 */
	public function getSearchTweets() {
		if ( !empty ( $this->q ) ) {
			$url_to_look = $this->url_search.$this->q;
			
			// set time out
			$ctx = stream_context_create(array( 
			    'http' => array( 
			        'timeout' => 5 
			        ) 
			    ) 
			);
			
			// get buffer stream
			$this->buffer = file_get_contents ( $url_to_look, 0, $ctx );
			if ( !empty ( $this->buffer ) ) {
				return $this->buffer;
			}
		}
		
		return null;
	}
}
?>