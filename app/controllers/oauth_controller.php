<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class oAuth_Controller extends Controller {
	private $oAuth;
	private $log;
	
	public function __construct() {
		global $_load;
		
		$this->oAuth = new oAuth();
		$this->log =  new Logger();
		$this->log->setLog("fb.log");
	}
	
	public function login() {
		global $_load;
		
		// get platform name
		$platform = $_load['uri']->getID();
		$this->log->log("Platform", $platform);
		if ( $this->oAuth ) {
			$this->log->log("1 IF", "oAuth exists" );
			if ( $this->oAuth->setService($platform) ) {
				$this->log->log("2 IF", "Platform exists" );
				$instance = $this->oAuth->getInstance();
				$this->instance = $instance;
				
				if ( $instance ) {
					$this->log->log("3 IF", "Instance of platform exists" );
					$session = $instance->login();
					$this->log->log("Session", $session );
					if ( $user = $this->checkUser($session, $platform) ) {
						$this->log->log("4 IF", "User exists" );
						$this->logInUser($user);
					} else {
						$this->log->log("5 IF", "User doesn¬¥t exists" );
						$userData = $instance->getUser();
						if ( !empty ( $userData ) ) {
							$invitations = loadModel("Invitations");
							$invitations->activate($session);
							$userData['oauth_userid'] = $session;
							$users = (object)loadModel("Users");

							if ( $user = (object)$users->create($userData, "oauth") ) {
								$this->logInUser($user);
								redirect("index", "index", "newUser");
							} else {
								redirect("index");
							};
						}
					}
				} else {
					$this->log->log("6 IF", "Doesn¬¥t works" );
				}
			}
		}
	}

	public function confirm() {
		global $_load;

		$platform = $_load['uri']->getID();
		if ( $this->oAuth->setService($platform) ){
			$instance = $this->oAuth->getInstance();		
			$instance->confirm();
		}
	}
	
	public function logout() {
		global $_load;
		
		$platform = $_load['uri']->getID();
		if ( $this->oAuth ) {
			if ( $this->oAuth->setService($platform) ) {
				$instance = $this->oAuth->getInstance();
				if ( $instance ) {
					$this->logoutUser();
					$instance->logout("http://voisu.loc");
				}
			}
		}
	}
	
	private function logInUser($user) {
		$login_controller = (object)loadController("Login");
		$login_controller->saveLoguedUser($user, true);
		redirect("index");
	}
	
	private function logoutUser() {
		$login_controller = (object)loadController("Login");
		$login_controller->_before_logout();
	}
	
	private function checkUser($session, $provider) {
		global $_load;

		$login = (object)loadModel("Login");
		if ( $user = $login->oAuthLogin($provider, $session) ) {
			return $user;
		} 
	}
}