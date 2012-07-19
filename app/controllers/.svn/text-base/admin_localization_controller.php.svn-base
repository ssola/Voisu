<?php
class Admin_Localization_Controller extends Controller {
	private $_load;
	private $_model_name = "Boroughs_Model";
	private $_model;
	private	$event_id;
	
	public function __construct() {
		parent::__construct();
		$this->_model = new $this->_model_name();
	}

	public function index() {
		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'message', 'breadcrumb', 'tries', 
			'listRooms', 'boroughs', 'cities', 'boroughs_top', 'friends', 'fb_login');
		Haanga::Load('localization/index.php', $vars );
	}
}
?>