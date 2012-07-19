<?php
class Login_Controller extends Controller {
	private $_load;
	private $_model_name = "Login_Model";
	private $_model;
	private $oAuth;

	public function __construct() {
		global $_load;
		parent::__construct();
		$this->_load = loadClasses(array('sessions','securecookie'));
		$this->_model = new $this->_model_name();
		$this->oAuth->fb = (object)loadClass("FB");
	}

	public function index() {
		global $_load;
		
		$url = setLink("login","doLogin");
		$title = __("Acceso");
		$user = get_user_logged_in();
		$user_logged = ( $user != null ? true : false );
		$tries = ( $user_logged ) ? $this->_model->getAccess( $user->id ) : null;
		$message = $_load['uri']->getURISegment(3);

		/**
		 * set breadcrumb
		 */
		$breadcrumb = array (
			__('Inicio') => setLink("index"),
			__('Acceso') => ""
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'message', 'breadcrumb', 'tries', 'fb_login');
		Haanga::Load('login/login.php', $vars );
	}
	
	/**
	 * Recommend to your friends enjoy hausu
	 */
	public function recommends() {
		global $_load;
		
		$facebook = (object)loadClass("FB");
		$friends = $facebook->FB->getFriends();
		
		/**
		 * set breadcrumb
		 */
		$breadcrumb = array (
		__('Inicio') => setLink("index"),
		__('Acceso') => setLink("login"),
		__('Invite friends') => ""
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();
		
		$title = __('Recommend Hausu to your friends - Hausu.co.uk');

		$vars = compact('title','breadcrumb', 'friends');
		Haanga::Load("login/recommends.php", $vars);
	}
	
	public function ajax_sendInvitation() {
		global $_load;
		
		$uid = $_POST['uid'];
		$args = array(
		    'message'   => __('Discover Hausu.co.uk'),
		    'link'      => __('http://www.hausu.co.uk'),
		    'caption'   => __('Discover the easiest way to find your new home in UK, look for rooms in London, Liverpool, Manchester, etc...')
		);
		
		// save to database this invitation
		$invitation = array(
			'id_sender' => $this->current_user->id,
			'id_receiver' => $uid,
			'created' => time()
		);
		
		$invitations = loadModel("Invitations");
		$invitations->save($invitation);
		
		$facebook = (object)loadClass("FB");
		$facebook->FB->postWallTo($uid, $args);
		
		die;
	}
	
	public function ajax_getLoginForm() {
		global $_load;

		$url = setLink("login", "doLogin");
		
		$action = loadModel("Actions");
		$data = array(
			"action" => "ajax_login",
			"user_id" => $this->current_user->id,
			"ip" => getUserIp(true),
			"created" => time()
		);
		$action->saveAction($data);
		
		$vars = compact('url', 'fb_login');
		Haanga::Load("login/login_popup.php", $vars);
		die;
	}

	public function recover() {
		global $_load;

		$email = $_load['input']->pGetData('email');
		if ( !empty ( $email ) ) {
			// reset password in model
			if ( ( $newPass = $this->_model->recoverPass($email) ) != false ) {

			} else {
				// no ok
			}
		}

		$title = "Recuperar contrase&ntilde;a - voisu";
		$user = get_user_logged_in();
		$user_logged = ( $user != null ? true : false );

		$breadcrumb = array (
		__('Inicio') => setLink("index"),
		__('Acceso') => setLink('login'),
		__('Recuperar contraseña') => ''
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact ( 'title', 'user', 'user_logged', 'breadcrumb' );
		Haanga::Load('login/recover.tpl', $vars );
	}
	
	public function _before_doLogin() {
		$action = loadModel("Actions");
		$data = array(
			"action" => "do_login",
			"user_id" => $this->current_user->id,
			"ip" => getUserIp(true),
			"created" => time()
		);
		$action->saveAction($data);		
	}

	public function doLogin() {
		$_get_form = array ( "email" => $this->_load['input']->pGetData('email'), "password" => $this->_load['input']->pGetData('password') );
		if ( $user = $this->_model->isLogin ( $_get_form['email'], $_get_form['password']) ) {
			$this->saveLoguedUser ( $user );
			if ( $this->_load['input']->pGetData('redirect_to') ) {
			} else {
				// user has been logged, but we don't have any url to redirect... redirect to events
				redirect("events");
			}
		} else {
			redirect("login", "index", array( "logged"=>"false" ) ); // redirect to login again, please
		}
	}

	public function saveLoguedUser( $user, $cookie = true ) {
		global $_load, $session;
		
		$_load['securecookie']->SetCookie( 'key',$user->user_key );
		$_SESSION['current_user'] = $user;
	}

	public function _before_logout() {
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
	}

	public function logout() {
		global $_load;

		redirect("login");
	}
}
?>