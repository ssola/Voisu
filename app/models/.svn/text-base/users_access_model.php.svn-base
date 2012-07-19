<?php
/**
 * SQL:
 * CREATE TABLE `users_access` (
  `user_id` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `navigator` varchar(255) NOT NULL,
  `os` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 */
class Users_Access_Model extends Model {
	private $_validation;
	private $_scheme = array(
							array (
								"field" => "user_id",
								"empty" => "",
								"number" => ""
							)
						);
	//private $_load;
	
	public function __construct() {
		parent::__construct('users_access');
		$this->_validation = new Validation();	
	}
	
	/**
	 * Guarda los intentos de logind e los usuarios
	 */
	public function saveLoginAttempt( $user_id, $logged = 1 ) {
		global $_load;
		
		$user_local_data = $_load['geo']->callApi();
		//$browser = $_load['browscap']->getBrowser();
		$item = array ( "user_id" => $user_id, "ip" => getUserIp(), "time" => time(), 
						//"navigator" => $browser->Browser, "os" => $browser->Platform, 
						"logged" => $logged, "country" => $_load['geo']->getUserCountryISO(),
						"city" => $_load['geo']->getUserCity(),
						//"navigator_version" => $browser->Version,
						"was_logged" => ( get_user_logged_in() != null ) ? 1 : 0 );
		$this->_validation->setElements ( $this->_scheme, $item );
		
		if ( $this->_validation->Validate() ) {
			parent::save($item);
		} else {
			$_load = loadClasses ( array ( "Logger" ) );
		}
	}

	public function getLastAttempsFromUser($uid) {
		if ( !empty ( $uid ) ) {
			parent::setLimit('0,10');
			parent::setOrder("order by time desc");
			$results = parent::findByKey("user_id", $uid);
			if ( $results ) {
				return $results;
			}
		}
	}
}
?>