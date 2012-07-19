<?php
class oAuth {
	private $allowedServices = array(
		"facebook",
		"twitter",
		"google"
	);
	
	private $currentService;
	private $endName = "_oAuth";
	private $instances = array();
	private $currentInstance;
	
	public function __construct() {}
	
	public function setService ( $service ) {
		if ( !empty ( $service ) ) {
			if ( in_array ( $service, $this->allowedServices ) ) {
				$this->currentService = $service;
				$this->currentInstance = $this->loadInstance();
				return true;
			}
		}
		
		return false;
	}
	
	public function getInstance() {
		if ( $this->currentInstance ) {
			return $this->currentInstance;
		}
	}
	
	private function loadInstance() {
		global $_config;
		
		require_once 'oAuth/oAuth_Interface.php';
		
		if ( $this->currentService ) {
			$platformName = ucwords($this->currentService).$this->endName;
			require_once 'oAuth/'.$platformName.".php";
			
			if ( $this->instances[$this->currentService] ) {
				return $this->instances[$this->currentService];
			} else {
				$config = (object)$_config[$this->currentService.'_config'];
				$this->instances[$this->currentService] = new $platformName($config);
				return $this->instances[$this->currentService];
			}
		}
	}
}
?>