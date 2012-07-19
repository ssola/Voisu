<?php
//require_once ( "../config.php" );

class LastFM {
	static		$instance;
	private 	$api_key;
	private		$secret_key;
	private		$api_url;
	private		$api_method;
	private 	$api_params;
	private		$api_response;
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	public function setMethod( $method ) {
		if ( !empty ( $method ) ) {
			$this->api_method = $method;
		}
	}
	
	public function setParams ( $params ) {
		if ( is_array ( $params ) && !empty ( $params ) ) {
			$this->api_params = $params;
		}
	}
	
	public function getData() {
		$call_url = $this->buildCallUrl();
		if ( !empty ( $call_url ) ) {
			// set time out
			$ctx = stream_context_create(array( 
			    'http' => array( 
			        'timeout' => 5 
			        ) 
			    ) 
			); 
			
			$call_url = str_replace(" ","%20", $call_url);
			$buffer = @file_get_contents ( $call_url, 0, $ctx );
			
			if (strpos($http_response_header[0], "200")) { 
				if ( !empty ( $buffer ) ) { 
					$this->api_response = json_decode( $buffer );
					
					if ( !empty ( $this->api_response ) ) {
						echo "--- Lastfm respondio! " . strlen($buffer)/1024 . "<br>";
						return $this->api_response;
					}
				} else {
					echo "--- Lastfm devolvio vacio<br>";
				}
			} else {
				echo " --- Error llamando a lastfm<br>";
			}
		}
		
		return null;
	}
	
	private function buildCallUrl() {
		$url = $this->api_url."?method=$this->api_method&api_key=$this->api_key";
		// set params
		if ( !empty ( $this->api_params ) ) {
			foreach ( $this->api_params as $key => $value ) {
				$url .= "&$key=$value";
			}
		}
		
		return $url;
	}
	
	public function configure() {
		$this->api_key = LASTFM_APIKEY;
		$this->secret_key = LASTFM_SECRETKEY;
		$this->api_url = LASTFM_APIURL;
	}
}

/*$lastfm = LastFM::getInstance();
$lastfm->configure();
$lastfm->setMethod("venue.search");
$lastfm->setParams(array( "venue" => "barcelona", "format" => "json" ));
echo $lastfm->getData();*/
?>