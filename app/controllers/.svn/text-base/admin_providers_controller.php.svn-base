<?php
class Admin_Providers_Controller extends Controller {
	private $_load;
	private $_model_name = "Providers_Model";
	private $_model;
	
	public function __construct() {
		parent::__construct();
		$this->_model = new $this->_model_name();
	}

	public function index() {
		$providers = $this->_model->getAll();
		$vars = compact ( 'providers', 'title', 'user_logged', 'user', 'message', 'breadcrumb', 'tries', 
				'listRooms', 'links', 'numPages', 'page', 'friends', 'fb_login');
		Haanga::Load('providers/index.php', $vars );
	}
}
?>