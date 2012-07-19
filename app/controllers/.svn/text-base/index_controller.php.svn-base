<?php
session_start();
class Index_Controller extends Controller {
	private $instances;
	private $notifications;
	private $has_notifications;
	
	public function __construct() {
		parent::__construct();
		$this->model = loadModel("Users");
	}
	
	public function index() {
		global $_load, $_config, $current_user;
		
		$title = __("Klubme - La nueva forma de disfrutar de la noche");
		$events_model = loadModel("Events");
		$events = $events_model->getEventsSpecial(8);

		$vars = compact ( 'url', 'title', 'current_city','events');
		Haanga::Load('index.php', $vars );
	}
}
?>