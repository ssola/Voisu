<?php
class Panel_Login_Controller extends Controller {
	public function __construct() {
		parent::__construct();
		$this->_load = loadClasses(array('sessions','securecookie'));
		$this->login_model = loadModel("Login");
	}
	
	public function index() {
		if ( $this->formSent("post") ) {
			$data['email'] = $this->get("post","email");
			$data['password'] = $this->get("post","password");
			$user = get_user_logged_in();
			if ( $user = $this->login_model->isLogin($data['email'], $data['password']) ) {
				$this->saveLoguedUser ( $user );
				$url = "/panel/dashboard";
				redirectTo($url);
			} else {
				echo "No logueado";
			}
		}

		$title = __("Acceso para negocios");
		$vars = compact('title','data');
		Haanga::Load("/login/login.php",$vars);
	}
	
	public function saveLoguedUser( $user, $cookie = true ) {
		global $_load, $session;
		$_load['securecookie']->SetCookie( 'key',$user->user_key );
		$_SESSION['current_user'] = $user;
	}
	
	public function logout() {
		// nos cargamos todos los datos del usuario...
		global $_load, $session;

		$_load['securecookie']->Del('key'); // cookie eliminada
		//$session->unsetAll();				// clean all sessions of this user
		unset($_SESSION['current_user']);
		session_destroy(); // drop all sessions
		$action = loadModel("Actions");
		$data = array(
			"action" => "logout",
			"user_id" => $this->current_user->id,
			"ip" => getUserIp(true),
			"created" => time()
		);
		
		$action->saveAction($data);

		redirectTo('/panel/login');
	}
}